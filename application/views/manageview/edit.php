<link href="../../../static/css/edit.css" rel="stylesheet">
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">编辑 <?php echo $type?></div>
                <div class="panel-body">

<!--                    @if (count($errors) > 0)-->
<!--                    <div class="alert alert-danger">-->
<!--                        <strong>Whoops!</strong> There were some problems with your input.<br><br>-->
<!--                        <ul>-->
<!--                            @foreach ($errors->all() as $error)-->
<!--                            <li>{{ $error }}</li>-->
<!--                            @endforeach-->
<!--                        </ul>-->
<!--                    </div>-->
<!--                    @endif-->

                    <form action="<?php echo current_url();?>" method="POST">
                        <input name="_method" type="hidden" value="PUT">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="text" name="title" class="form-control" required="required" >
                        <br>
                        <textarea name="body" rows="10" class="form-control" required="required"></textarea>
                        <br>
                        <button class="btn btn-lg btn-info">编辑 Page</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>