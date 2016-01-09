<?php
/**
 * Dashboard Login File
 * @author Shahriar
 * @version 1.0.1
*/
	
	session_start();
	if(isset($_SESSION['logged'])) header('location: page/dashboard');
	
/*	if(isset($_POST['login'])){
        $_SESSION['logged']=1;
        header('location: page/dashboard');
	}*/
    

    require_once('admin/header.php');
?>
    <div class="">
                <div class="col-lg-12">
                    <h1 class="login-page-header"><img class="loginlogo" src="resources/img/logo_dashboard.jpg" /></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
    <div class="" ng-controller="loginController">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading login-heading">
                            LOGIN
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <form role="form">
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control" placeholder="Email" name="email" ng-model="email">
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" placeholder="Password" name="password" class="form-control" ng-model="password">
                                        </div>
                                        <!--<div class="form-group">
                                            <p>Do not have account? <a href="register">Register</a></p>
                                        </div>-->
                                        <input type="submit" class="btn btn-default" ng-click="login()" value="Login">
                                        <button type="reset" class="btn btn-default">Reset</button>
                                    </form>
                                </div>
                                <!-- /.col-md-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
<?
    require_once('admin/footer.php');