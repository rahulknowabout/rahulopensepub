<!DOCTYPE html>
<html lang="en">
     <?php include('../header/header.php'); ?>
    <body>
    <style>
	.modal {
  text-align: center;
  padding: 0!important;
}

.modal:before {
  content: '';
  display: inline-block;
  height: 100%;
  vertical-align: middle;
  margin-right: -4px;
}

.modal-dialog {
  display: inline-block;
  text-align: left;
  vertical-align: middle;
}
	</style>
        <!-- START PAGE CONTAINER -->
        <div class="page-container">
            
            <!-- START PAGE SIDEBAR -->
            <?php include('../header/page_sidebar.php'); ?>
            <!-- END PAGE SIDEBAR -->
            
            <!-- PAGE CONTENT -->
            <div class="page-content">
                
                <!-- START X-NAVIGATION VERTICAL -->
                <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
                    <!-- TOGGLE NAVIGATION -->
                    <li class="xn-icon-button">
                        <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
                    </li>
                    <!-- END TOGGLE NAVIGATION -->                    
                </ul>
                <!-- END X-NAVIGATION VERTICAL -->                     
                
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Link</a></li>                    
                    <li class="active">Active</li>
                </ul>
                <!-- END BREADCRUMB -->                
                
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Page Title</h2>
                </div>                   
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                
                    <div class="row">
                        <div class="col-md-12">

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Panel Title</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                        
                        <div class="col-md-6">                        

                            <!-- START JQUERY VALIDATION PLUGIN -->
                            <div class="block">
                                <h4>Edit Customer</h4>
                                <form id="jvalidate" role="form" class="form-horizontal" enctype="multipart/form-data" method="post" action="../../controller/customer/updatecustomer.php">
                                <div class="panel-body"> 
                                    <div class="form-group">
                                        <label class="col-md-3 control-label"><span>* </span>Register Date:</label>  
                                        <div class="col-md-9">
                                            <input type="text" class="form-control datepicker" name="user_reg_date"/>
                                            
                                        </div>
                                    </div>
                                    <div class="form-group">                                        
                                        <label class="col-md-3 control-label"><span>* </span>Name:</label>          
                                        <div class="col-md-9">
                                            <input type="text" class="form-control" name="user_name"/>                                        
                                            
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label"><span>* </span>Email(ID):</label>
                                        <div class="col-md-9">
                                            <input type="text" value="" name="user_email" class="form-control"/>                                        
                                            
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Password:</label>                                        
                                        <div class="col-md-9">
                                            <input type="button" class="btn btn-md btn-primary" name="user_password" id="password2" value="Change Password" data-toggle="modal" data-target="#myModalHorizontal"/>                                        
                                            
                                        </div>
                                    </div>                    
                                    <!--<div class="form-group">
                                        <label class="col-md-3 control-label">Confirm Password:</label>                                       
                                        <div class="col-md-9">
                                            <input type="password" class="form-control" name="re-password"/>
                                            
                                        </div>
                                    </div>       -->        
                                    
                                     
                                     
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Country:</label>
                                        <div class="col-md-9">
                                            <input type="text" value="" name="user_country" class="form-control"/>                                        
                                            <!--<span class="help-block">required Company Name</span>-->
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Level:</label> 
                                        
                                        <div class="col-md-9">
                                           <span style="font-size:18px; margin:10px;"><strong>L1</strong></span> <input type="button" class="btn btn-md btn-primary" name="user_password" id="password2" value="Change Level" data-toggle="modal" data-target="#myModalNorm"/>                                        
                                            
                                        </div>
                                                                            
                                    </div>                    
                               





<!-- Button trigger modal -->
                                    <div class="btn-group pull-right">
                                      
                                        <button class="btn btn-primary" type="submit">Submit</button>
                                    </div>                                                                                                                          
                                </div>                                               
                                </form>
                             
    Launch Horizontal Form
</button> -->

<!-- Modal -->
<div class="modal fade" id="myModalHorizontal" tabindex="-1" role="dialog" 
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" 
                   data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    Modal title
                </h4>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                
                <form class="form-horizontal" name="changePassword" id="changePassword" role="form" method="post" action="../../controller/customer/changepassword.php">
                  <div class="form-group">
                    <label  class="col-sm-2 control-label"
                              for="inputEmail3">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" 
                        id="inputEmail3" name="inputEmail3" placeholder="Email"/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label"
                          for="inputPassword3" >Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control"
                            id="inputPassword3"  name="inputPassword3" placeholder="Password"/>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <div class="checkbox">
                        <label>
                            <input type="checkbox"/> Remember me
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-default">Sign in</button>
                    </div>
                  </div>
                
                
                
                
                
                
                
            </div>
            
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default"
                        data-dismiss="modal">
                            Close
                </button>
                <button type="submit" class="btn btn-primary">
                    Save changes
                </button>
                </form>
            </div>
        </div>
    </div>
</div>
                               <!-- <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModalNorm">
    Launch Normal Form
</button> -->

<!-- Modal -->
<div class="modal fade" id="myModalNorm" tabindex="-1" role="dialog" 
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" 
                   data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">
                    Modal title
                </h4>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                
                <form role="form">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                      <input type="email" class="form-control"
                      id="exampleInputEmail1" placeholder="Enter email"/>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                      <input type="password" class="form-control"
                          id="exampleInputPassword1" placeholder="Password"/>
                  </div>
                  <div class="checkbox">
                    <label>
                        <input type="checkbox"/> Check me out
                    </label>
                  </div>
                  <button type="submit" class="btn btn-default">Submit</button>
                </form>
                
                
            </div>
            
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default"
                        data-dismiss="modal">
                            Close
                </button>
                <button type="button" class="btn btn-primary">
                    Save changes
                </button>
            </div>
        </div>
    </div>
</div>





<!-- Post Info -->


                            <!-- END JQUERY VALIDATION PLUGIN -->
                            </div>
                        </div>
                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                
                </div>
                <!-- END PAGE CONTENT WRAPPER -->                
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->

        <!-- MESSAGE BOX-->
        <!-- Button trigger modal -->



        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to log out?</p>                    
                        <p>Press No if youwant to continue work. Press Yes to logout current user.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a href="pages-login.html" class="btn btn-success btn-lg">Yes</a>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->

        <!-- START PRELOADS -->
       <!-- <audio id="audio-alert" src="audio/alert.mp3" preload="auto"></audio>
        <audio id="audio-fail" src="audio/fail.mp3" preload="auto"></audio>-->
        <!-- END PRELOADS -->                 
        
    <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        <script type="text/javascript" src="../../js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="../../js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="../../js/plugins/bootstrap/bootstrap.min.js"></script>   
        <script type='text/javascript' src='../../js/plugins/bootstrap/bootstrap-datepicker.js'></script> 
           
        <script type="text/javascript" src="../../js/plugins/bootstrap/bootstrap-timepicker.min.js"></script>
        <script type="text/javascript" src="../../js/plugins/bootstrap/bootstrap-colorpicker.js"></script>
          <script type="text/javascript" src="../../js/plugins/bootstrap/bootstrap-file-input.js"></script>
        <script type='text/javascript' src='../../js/plugins/bootstrap/bootstrap-select.js'></script>      
        <!-- END PLUGINS -->

        <!-- THIS PAGE PLUGINS -->

        <!-- END PAGE PLUGINS -->         

        <!-- START TEMPLATE -->
        <script type="text/javascript" src="../../js/plugins.js"></script>        
        <script type="text/javascript" src="../../js/actions.js"></script>        
        <!-- END TEMPLATE -->
    <!-- END SCRIPTS -->         
    </body>
</html>






