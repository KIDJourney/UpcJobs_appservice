<?php
/**
 * Created by PhpStorm.
 * User: kidjourney
 * Date: 4/26/15
 * Time: 9:33 PM
 */
require_once("db_common.php");

class loginClass 
{
    private $sqliworker;
    private $mail;
    private $passwd;
    private $remember;
    
    public function __construct()
    {   
        if (isset($_SESSION['user_info']))
            redirect();//logined then redirect

        $this->sqliworker = sqliconnect();
        if ($this->sqliworker->connect_errno){
            # make log
            die("Connect failed , please try again");
        }

        $this->login_process();
    
    }

    public function login_process(){
        if (isset($_COOKIE['u_mail'])){
            $result = $this->db_search($_COOKIE['u_mail']);
            if ($_COOKIE['cookie'] == $result['u_cookie'] and $_COOKIE['u_mail']==$result['u_mail']){
                $this->finishlogin($result,True);
            }                   //Cookie existed , check cookie.
        } else {
            $this->showloginpage();
            $result = $this->db_search($this->mail);
            if ($result['password'] == $this->passwd)
                $this->finishlogin($result,$this->remember);            
        }                       //else , check the form , if remember , updatecheck

        die("User or password error");
    
    }

    public function db_search($mail)
    {
        $mail = trim($mail);

        if ($p_query=$this->sqliworker->prepare("SELECT * FROM manager WHERE managerID=?")){
            $p_query->bind_param("s",$mail);
            $p_query->execute();

            $meta = $p_query->result_metadata();
            $temp = array();
            $tempResult = array();
            while($field = $meta->fetch_field()){
                $temp[] = &$tempResult[$field->name];
            }

            call_user_func_array(array($p_query,"bind_result"),$temp);
            $p_query->fetch();
            $result = $tempResult;
            $p_query->close();

            return $result;
        }
    }

    public function finishlogin($result,$cookie){
        if ($cookie){
            $this->updatecookie($result);
        }
        $user_info['status'] = True;
        $user_info['u_mail'] = $result['managerID'];
        $user_info['u_nick'] = $result['name'];  
        $_SESSION['user_info'] = $user_info; 
        redirect();
        die();
    }

    public function updatecookie($result){

        $cookie = $result['u_mail'] . $_SERVER['REMOTE_ADDR'] . md5(DB_SALT);
        $cookie = md5($cookie);

        $query = "UPDATE user set u_cookie='$cookie' WHERE u_id=" . $result['u_id'];
        $this->sqliworker->query($query);
        setcookie("u_mail",$result['u_mail'],time()+3600*72);
        setcookie("cookie",$cookie,time()+3600*72);
    }

    public function showloginpage(){
        if (isset($_POST['mail']) && isset($_POST['pass'])){
        } else {
            require_once("template/login/login.php");
            die();
        } //no direct access right

        $this->mail = trim($_POST['mail']);
        $this->passwd = trim($_POST['pass']);
        // $this->passwd = trim($_POST['pass']) . md5(DB_SALT);
        // $this->passwd = md5($this->passwd);// md5(pass + md5(salt))  # don't need salt in this application , I don't care however .
        $this->remember = isset($_POST['remember']);
    }
}