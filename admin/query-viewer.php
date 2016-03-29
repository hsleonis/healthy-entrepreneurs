<?php
/**
 * Dashboard User file
 * @author Shahriar
 * @version 1.0.1
*/

if(!isset($_SESSION['dbname']))
echo "<script>var a=confirm('Please select a database first.'); if(typeof a!=='undefined') window.self.location = 'page/dashboard';</script>";

if(isset($_SESSION['type']) && $_SESSION['type']==0) :
?>
        <div id="page-wrapper" ng-controller="queryController">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Query Builder</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Add New Query
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="alert alert-success" ng-show="creationMsg">
                                        {{creationMsg}}
                                    </div>
                                    <form role="form" name="regForm" id="regForm">
                                        <div class="input-group col-xs-12">
                                            <div class="form-group col-lg-6">
                                            <label>Gerant ID</label><img src="resources/img/tooltip.png" class="tooltip" title="ID / Username of gerant you want to be selected for the query. Can be multiple if given comma separated values. i.e. 1000,1002, Giving this value means any other gerant selection value (Gerant Area, Gerant ID Pattern will be ignored for the query) " />
                                            <input id="gerantid" class="form-control" placeholder="Gerant ID" ng-model="query.gerantid" name="gerantid" value="">
                                        </div><!-- gerant id -->
                                            <div class="form-group col-lg-6">
                                            <label>Gerant Area</label><img src="resources/img/tooltip.png" class="tooltip" title="Select the Area in which you want to limit the query. This will include gerants from only selected area. Cannot be Multiple. " />
                                            <input id="areaselector" class="form-control" ng-model="query.areaselector" name="areaselector" placeholder="Gerant Area" />
                                                <!--<option value=""></option>
                                                <option ng-repeat="item in areaList" value="{{item.id}}">{{item.name}}</option>
                                            </select>-->
                                        </div><!-- gerant area -->
                                            <div class="form-group col-lg-6">
                                            <label>Gerant ID pattern</label><img src="resources/img/tooltip.png" class="tooltip" title="Gerant ID Pa ttenr can be used to make a selection of Gerants. This can be like > 1000, < 2000 ; > 1000 AND < 2000, Basic AND / OR condition is expected to work. If this is applied, Other Gerant Selection Fields should be left blank. 
To enable screen reader support, press shortcut Ctrl+Alt+Z. To learn about keyboard shortcuts, press shortcut Ctrl+slash.
" />
                                            <input class="form-control" name="starflow" placeholder="Gerant ID pattern matching" ng-model="query.gerant_pattern">
                                        </div><!-- gerant id pattern -->
                                            <!--<div class="form-group col-lg-6">
                                                <label>Make available to user</label>
                                                <input type="checkbox" ng-model="query.gerant_user" name="gerant_user" />
                                            </div>--><!-- Gerant to user -->
                                        </div><!-- Gerant selection -->
                                        <div class="input-group col-xs-12">
                                        <div class="form-group col-sm-4">
                                            <label>Start date</label><img src="resources/img/tooltip.png" class="tooltip" title="The Date from when you want to include in Report. " />
                                            <input class="form-control date-picker" type="text" placeholder="Start date" ng-model="query.start_date" name="startdate" required>
                                        </div><!-- start date -->
                                        <div class="form-group col-sm-4">
                                            <label>End date</label><img src="resources/img/tooltip.png" class="tooltip" title="The Date till when you want to include in Report. " />
                                            <input class="form-control date-picker" type="text" placeholder="End date" ng-model="query.end_date" name="enddate" required>
                                        </div><!-- end date -->
                                        
                                            
                                            
                                        <?php if(isset($_SESSION['dbname']) && $_SESSION['dbname']=='Business Manager'): ?>
                                        <div class="form-group col-sm-4">
                                            <label for="reportaction">Report Action *</label>
                                            <select id="reportaction" class="form-control" ng-model="query.action" name="reportaction" required>
                                                <option ng-repeat="item in actionList" value="{{item.id}}">{{item.name}}</option>
                                            </select>
                                        </div><!-- Report action -->
                                        <div class="form-group col-lg-6">
                                            <label>Make available to user</label>
                                            <input type="checkbox" ng-model="query.date_user" name="date_user" />
                                        </div><!-- Date to user -->
                                        </div><!-- General selection -->
                                        
                                        <div class="input-group col-sm-12">
                                            <div class="form-group col-lg-6">
                                                <label>Product ID</label>
                                                <input id="productid" class="form-control" placeholder="Product ID" ng-model="query.productid" name="productid" value="">
                                            </div><!-- Product ID -->
                                            <div class="form-group col-lg-6">
                                                <label>Category ID</label>
                                                <input id="categoryid" class="form-control" placeholder="Category ID" ng-model="query.categoryid" name="categoryid" value="">
</div><!-- Category ID -->
                                            <div class="form-group col-lg-6">
                                                <label>Search string</label><img src="resources/img/tooltip.png" class="tooltip" title="Refers to string which were used to search products in product catalog. i.e. Men, Helmet, etc. " />
                                                <input class="form-control" placeholder="Search string" ng-model="query.search_string" name="search_string" value="">
</div><!-- Search string -->
                                            <div class="form-group col-lg-6">
                                                <label>Tag</label>
                                                <input id="taglist" class="form-control" placeholder="Tag" ng-model="query.tag" name="tag" value="">
</div><!-- Tag -->
                                            <div class="form-group col-lg-6">
                                                <label>Number of sales</label><img src="resources/img/tooltip.png" class="tooltip" title="Refers to number of sales per selected product. This field can be used to see products that were sold at a particular number or a number greater than given or lower than given. i.e. 200, > 200, < 150 " />
                                                <input class="form-control" placeholder="Number of sales" ng-model="query.no_sales" name="no_sales" value="">
</div><!-- Sales -->
                                        </div>
                                        <?php endif; ?>
                                        
                                        
                                        <?php if(isset($_SESSION['dbname']) && $_SESSION['dbname']=='Sensibilization'): ?>
                                        <div class="form-group col-sm-4">
                                            <label for="reportaction">Report Action *</label><img src="resources/img/tooltip.png" class="tooltip" title="Must Be Selected for any result. This is the main determiner of what report you are trying to bring. Selecting appropriate report action and giving parameter in at least necessary field is required. " />
                                            <select id="reportaction" class="form-control" ng-model="query.action" name="reportaction" required>
                                                <option ng-repeat="item in actionList" data-index="{{$index}}" value="{{item.id}}">{{item.name}}</option>
                                            </select>
                                        </div><!-- Report action -->
                                        <div class="form-group col-lg-12">
                                            <label>Make available to user</label>
                                            <input type="checkbox" ng-model="query.date_user" name="date_user" />
                                        </div><!-- Date to user -->
                                        </div><!-- General selection -->
                                    
                                        <!-- accordian -->
                                        <div class="panel-group" id="accordion">
                                          <div class="panel panel-default">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">                                               <div class="panel-heading">
                                                  <h4 class="panel-title">
                                                    Stratify variables
                                                  </h4>
                                              </div>
                                            </a>
                                            <div id="collapse1" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <div class="form-group col-lg-12">
                                                        <label>Make available to user</label>
                                                        <input type="checkbox" ng-model="query.stratify_user" name="stratify_user" />
                                                    </div><!-- Avial to user -->
                                                    <div class="form-group col-lg-6">
                                                        <label>Age</label>
                                                        <select class="form-control" ng-model="query.age" name="age">
                                                    <option value=""></option>
                                                    <option value="Between 15 to 19">Between 15 to 19</option>
                                                    <option value="Younger than 10">Younger than 10</option>
                                                    <option value="Older than 24">Older than 24</option>
                                                    <option value="Between 20 to 24">Between 20 to 24</option>
                                                    <option value="Between 10 to 14">Between 10 to 14</option>
                                                    <option value="all">All</option>
                                                            
                                                        </select>
                                                    </div><!-- age -->
                                                    <div class="form-group col-lg-6">
                                                        <label>Gender</label>
                                                        <select class="form-control" ng-model="query.gender" name="gender">
                                                            <option value=""></option>
                                                            <option value="male">Male</option>
                                                            <option value="female">Female</option>
                                                            <option value="other">Other</option>
                                                            <option value="all">All</option>
                                                        </select>
                                                    </div><!-- gender -->
                                                    <div class="form-group col-lg-6">
                                                        <label>Marital status</label>
                                                        <select class="form-control" ng-model="query.marital_status" name="marital_status">
                                                            <option value=""></option>
                                                            <option value="Single">Single</option>
                                                            <option value="Partnered">Partnered</option>
                                                            <option value="all">All</option>
                                                        </select>
                                                    </div><!-- marital -->
                                                    <div class="form-group col-lg-6">
                                                        <label>Partner present</label>
                                                        <select class="form-control" ng-model="query.partnered" name="partnered">
                                                            <option value=""></option>
                                                            <option value="yes">Yes</option>
                                                            <option value="no">No</option>
                                                            <option value="all">All</option>
                                                        </select>
                                                    </div><!--partnered -->
                                                    <!--<div class="form-group col-lg-6">
                                                        <label>No of audience</label><img src="resources/img/tooltip.png" class="tooltip" title="This refers to No. of people attended a session. you can use this to query How many people saw a flow / video together in a tab / session at the same time. " />
                                                        <input type="number" min="0" class="form-control" placeholder="No of audience" ng-model="query.no_of_audience" name="no_of_audience" value="">
                                                    </div>--><!-- audience -->
                                                    <div class="form-group col-lg-6">
                                                        <label>School going audience</label>
                                                        <select class="form-control" ng-model="query.schooling" name="schooling">
                                                            <option value=""></option>
                                                            <option value="yes">Yes</option>
                                                            <option value="no">No</option>
                                                            <option value="all">All</option>
                                                        </select>
                                                    </div><!--schooling -->
                                                    <div class="form-group col-lg-6">
                                                        <label>Repeated audience</label><img src="resources/img/tooltip.png" class="tooltip" title="This refers if the flow was seen repeated time by the user(s) or by the tab audience or session. " />
                                                        <select class="form-control" ng-model="query.repeated" name="repeated">
                                                            <option value=""></option>
                                                            <option value="yes">Yes</option>
                                                            <option value="no">No</option>
                                                            <option value="all">All</option>
                                                        </select>
                                                    </div><!-- repeated -->
                                                </div>
                                            </div>
                                          </div>
                                          <div class="panel panel-default">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">                                               <div class="panel-heading">
                                                  <h4 class="panel-title">
                                                    Alternative options
                                                  </h4>
                                              </div>
                                            </a>
                                            <div id="collapse2" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <div class="form-group col-lg-6">
                                                        <label>Alternate ID</label>
                                                        <input id="alternateid" class="form-control" placeholder="Alternate ID" ng-model="query.alternateid" name="alternateid" value="">
</div><!-- alternate -->
                                                </div>
                                            </div>
                                          </div>
                                          <div class="panel panel-default">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                                            <div class="panel-heading">
                                              <h4 class="panel-title">
                                                General variables
                                              </h4>
                                            </div>
                                            </a>
                                            <div id="collapse3" class="panel-collapse collapse">
                                              <div class="panel-body">
                                                    <div class="form-group col-lg-6">
                                                        <label>Next post</label><img src="resources/img/tooltip.png" class="tooltip" title="This is to identify which post was accessed as next post by the 'clicknext' event. For example, you can query if POST ID 10,12 was accessed as next post or not. " />
                                                        <input id="nextpost" class="form-control" placeholder="Next post" ng-model="query.nextpost" name="nextpost" value="">
                                                    </div><!-- next post -->
                                                    <div class="form-group col-lg-6">
                                                        <label>Previous post</label><img src="resources/img/tooltip.png" class="tooltip" title="This is to identify which post was accessed as previous post by the 'clicknext' event. For example, you can query if POST ID 10,12 was accessed as previous post or not. " />
                                                        <input id="prevpost" class="form-control" placeholder="Previous post" ng-model="query.prevpost" name="prevpost" value="">
</div><!-- prev post -->
                                                    <div class="form-group col-lg-6">
                                                    <label>Flow ID</label>
                                                    <input id="flowid" class="form-control" placeholder="Flow ID" ng-model="query.flowid" name="flowid" value="">
                                                </div><!-- flow id -->
                                                    <div class="form-group col-lg-6">
                                                    <label>Category ID</label>
                                                    <input id="categoryid" class="form-control" placeholder="Category ID" ng-model="query.categoryid" name="categoryid" value="">
                                                </div><!-- category -->
                                                    <div class="form-group col-lg-6">
                                                    <label>Post ID</label>
                                                    <input id="postid" class="form-control" placeholder="Post ID" ng-model="query.postid" name="postid" value="">
                                                </div><!-- post ID -->
                                                    <div class="form-group col-lg-6">
                                                    <label>Button/Answer ID</label>
                                                    <input id="answer" class="form-control" placeholder="Button/Answer ID" ng-model="query.answerid" name="answerid" value="">
                                                </div><!-- answer ID -->
                                                    <div class="form-group col-lg-6">
                                                    <label>Movie &lt;File Name&gt;</label><img src="resources/img/tooltip.png" class="tooltip" title="You have to write down exact movie file name including file extension. Multiple file can be included in query by comma separated values. i.e. 3-FR.mp4, 3-EN.mp4" />
                                                    <input class="form-control" placeholder="Movie Name" ng-model="query.movie" name="movie" value="">
                                                </div><!-- movie -->
                                              </div>
                                            </div>
                                            </div>
                                        </div> 
                                        <!-- /accordian -->
                                        <?php endif; ?>
                                        
                                        <div class="form-group col-lg-6">
                                            <input type="hidden" ng-model="query.db" name="db" value="<?php echo isset($_SESSION['dbname'])?$_SESSION['dbname']:''; ?>">
                                        </div><!-- dbname -->
                                        
                                        <div class="form-group col-lg-6">
                                            <div class="tooltip-div"><button type="button" ng-click="regForm.$valid && createQuery(query)" class="btn btn-default">Create Query</button><img src="resources/img/tooltip.png" class="tooltip" title="Tries to run the query and generate valied result. If possible to get valid result then shown in table below and you can get a chance to save that query from there. " /></div>
                                            <button type="reset" class="btn btn-default">Reset</button>
                                        </div><!-- submit & reset -->
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
                            Query Result
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="preloader">
                                <div class="preload-img"><img src="resources/img/loader.gif" /></div>
                            </div>
                            <div class="dataTable_wrapper">
                                <div class="row show-btn">
                                    <span>{{querySavedMsg}}</span>
                                    <div class="tooltip-div">
                                    <button class="btn btn-default" data-ng-click="saveQuery()">Save Query</button><img src="resources/img/tooltip.png" class="tooltip" title="Saves the current query which is showing result in table now. Saving the query allows you to assing the query to users. " />
                                    </div>
                                    <div class="tooltip-div">
                                    <a href="page/query-manager"><button class="btn btn-default">Assign To</button></a><img src="resources/img/tooltip.png" class="tooltip" title="Assigns current / saved query to chosen user(s)" />
                                    </div>
                                    <form class="csvbtn tooltip-div" action="getCSV.php" method="post" target="_blank"> 
                                        <input type="hidden" name="csv_text" id="csv_text" />
                                        <input class="btn btn-default" type="submit" value="Download as CSV" onclick="getCSVData()" /><img src="resources/img/tooltip.png" class="tooltip" title="Allows you to download the result table in CSV format. That can be later used in excel or other CSV manipulating applications. This downloads a exact output of the current table in view." />
                                    </form>
                                </div>
                                <table id="data-table" class="table table-striped table-bordered table-hover" ng-query-table></table>
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
            <table id="csv-table" style="display:none;" ng-query-table></table>
        </div>
        <!-- /#page-wrapper -->
<?php endif;