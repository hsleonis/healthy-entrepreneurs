<?php
/**
 * Dashboard User file
 * @author Shahriar
 * @version 1.0.1
*/
?>
        <div id="page-wrapper" ng-controller="userController">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">User Management</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Add New User
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="alert alert-success" ng-show="creationMsg">
                                        {{creationMsg}}
                                    </div>
                                    <form id="regForm" role="form" name="regForm">
                                        <div class="form-group col-lg-6">
                                            <label>Name</label>
                                            <input class="form-control" placeholder="Username" ng-model="user.name">
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label>Email</label>
                                            <input class="form-control" placeholder="Email" ng-model="user.username" required>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label>Password</label>
                                            <input class="form-control" placeholder="Password" type="password" ng-model="user.password" required>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label>Area</label>
                                            <input id="areaselector" class="form-control" ng-model="user.areacode" name="areaselector" placeholder="Area" />
                                            <!--<select class="form-control" ng-model="user.areacode">
                                                <option value=""></option>
                                                <option ng-repeat="item in areaList" value="{{item.id}}">{{item.name}}</option>
                                            </select>-->
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label>User Type</label>
                                            <select class="form-control" ng-model="user.usertype">
                                                <option ng-value="0" ng-selected="true">Admin</option>
                                                <option ng-value="1">User</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <button type="button" ng-click="regForm.$valid && createUser()" class="btn btn-default">Create User</button>
                                            <button type="reset" class="btn btn-default">Reset</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.col-md-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            All User
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="preloader">
                                <div class="preload-img"><img src="resources/img/loader.gif" /></div>
                            </div>
                            <div class="dataTable_wrapper">
                                <table id="data-table" class="table table-striped table-bordered table-hover" ng-user-table></table>
                            </div>
                            <!-- /.table-responsive -->
                            <!-- /Data Table -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            
            <div class="modal fade" tabindex="-1" id="edit-user-modal" role="dialog" editUserModal>
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Update {{ed[1]}}</h4>
                  </div>
                  <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="alert alert-success" ng-show="creationMsg">
                                        {{updateMsg}}
                                    </div>
                                    <form id="edForm" role="form" name="edForm">
                                        <div class="form-group col-lg-6">
                                            <label>Name</label>
                                            <input class="form-control" placeholder="Username" ng-model="eduser.name" ng-value="ed[1]">
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label>Email</label>
                                            <input class="form-control" placeholder="Email" ng-model="eduser.username" ng-value="ed[2]" required>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label>Password</label>
                                            <input class="form-control" placeholder="Leave empty if you don't want change" type="password" ng-model="eduser.password" value="">
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label>Area</label>
                                            <input id="areaselector2" class="form-control" ng-model="eduser.areacode" name="areaselector" placeholder="Area" ng-value="ed[3]" />
                                            <!--<select class="form-control" ng-model="eduser.areacode">
                                                <option value=""></option>
                                                <option ng-repeat="item in areaList" ng-selected="item.id==ed[3]" value="{{item.id}}">{{item.name}}</option>
                                            </select>-->
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label>User Type</label>
                                            <select class="form-control" ng-model="eduser.usertype">
                                                <option ng-selected="ed[4]=='Admin'" ng-value="0">Admin</option>
                                                <option ng-selected="ed[4]=='User'" ng-value="1">User</option>
                                            </select>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.col-md-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" ng-click="edForm.$valid && upUser(eduser, ed)">Save changes</button>
                  </div>
                </div><!-- /.modal-content -->
              </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        </div>
        <!-- /#page-wrapper -->