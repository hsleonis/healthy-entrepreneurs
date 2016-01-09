<?php
/**
 * Dashboard Login File
 * @author Shahriar
 * @version 1.0.1
*/
	
	session_start();
	if(isset($_SESSION['logged'])) header('location: page/dashboard');

    require_once('admin/header.php');
?>
    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Login</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row" ng-controller="regController">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Register
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="alert alert-success" ng-show="msg">
                                        {{msg}}
                                    </div>
                                    <form role="form" name="regForm">
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input class="form-control" placeholder="Username" ng-model="user.username">
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class="form-control" placeholder="Email" ng-model="user.email">
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input class="form-control" type="password" ng-model="user.password">
                                        </div>
                                        <div class="form-group">
                                            <label>Retype Password</label>
                                            <input class="form-control" type="password" ng-model="user.password2">
                                        </div>
                                        <div class="form-group">
                                            <p>Already have account? <a href="login">Login</a></p>
                                        </div>
                                        <button type="button" ng-click="reg()" class="btn btn-default">Register</button>
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