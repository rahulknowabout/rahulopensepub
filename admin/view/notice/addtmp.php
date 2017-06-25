<?php include_once('../../check_login.php'); 
include('../../modal/notice/notice.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Admin | Notice</title>
<link href="../../dist/img/favicon.ico" rel="icon" type="/ico" />
<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- Bootstrap 3.3.6 -->
<link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="../../font-awesome/css/font-awesome.min.css">

<!-- Theme style -->
<link rel="stylesheet" href="../../dist/css/AdminLTE.css">
<!-- Main style -->
<link rel="stylesheet" href="../../dist/css/style.css">
<link rel="stylesheet" href="../../dist/css/skins/_all-skins.css">
<!-- iCheck -->
<link rel="stylesheet" href="../../plugins/iCheck/flat/blue.css">
<!-- jqueryUI -->
<link type="text/css" rel="stylesheet" href="../../dist/css/jquery-ui.css">
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="../../plugins/iCheck/all.css">

<link rel="stylesheet" href="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
<link href="https://cdn.quilljs.com/1.2.3/quill.snow.css" rel="stylesheet">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<style>
datepicker-orient-left {
left: auto !important;
right: 15px !important; // specify the px of your content
}
</style>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
 <!-- Header -->
<header id="main_header" class="main-header"><?php include_once('../header/headert.php') ?></header>
  <!-- Left Sidebar -->
  <aside id="main_sidebar" class="main-sidebar"><?php include_once('../header/LeftSidebar.php') ?></aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1><b>Notice</b></h1>
  <form id="jvalidate" role="form" class="form-horizontal" enctype="multipart/form-data" method="post" action="../../controller/product/productadd.php">
    <span class="alert-danger" id="included_error_tour" <?php if(isset($_GET['Error_Code']) && $_GET['Error_Code'] == 'dup'){ ?> style="display:block;"  <?php }else{ ?> style="display:none" <?php } ?> onClick="alertDisappear();">This Notice Title Exist, Please Try Another</span>
             
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
 
	<div class="Form_Inside management_page">
	<div class="member_page accordion_style notice_table edit_data">
	<div class="table-responsive">
	  <table class="table">
	  <tr>
		<th class="gray">Title</th>
		<td>
			<div class="form-group2">
				<!--<input class="form-control" id="inputName" type="text">--><input type="text" class="form-control" name="notice_title" id="notice_title" value="<?php //echo $singleCustomer['user_name']; ?>" />
			</div>
		</td>
	  </tr>
	  <tr>
		<th class="gray">Date</th>
		<td>
			<div class="form-group2" >
				<!--<div class="start_date ContractDate">
					 <input id="notice_date4" name="notice_date" class="form-control datepicker-custom" placeholder="DD/MM/YYYY" value="<?php echo date('d/m/Y'); ?>"  data-provide='datepicker' data-date-container='#myModalId'/>
					<i class="fa custom_icon"><img src="../../dist/img/calendar_icon.png" alt="" title=""></i>
				</div>-->
               <!-- <div class='input-group date' >
                    <input type='text' class="form-control" id='notice_date' />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>-->  
                 <div class='form-group2 start_date ContractDate' >
                    <input type='text' class="form-control" id='notice_date' style="width:10%;" name="notice_date" value="<?php echo date('d/m/Y'); ?>" />
                    <i class="fa custom_icon"><img src="../../dist/img/calendar_icon.png" alt="" title=""></i>
                   
                </div>
			</div>
            
		</td>
	  </tr>
	  <tr>
		<th class="gray">File</th>
		<td>
			<div class="form-group2 upload row">
				<div class="col-md-6 col-sm-12">
						<input name="notice_file" id="notice_file" class="inputfile inputfile-1 multi" onChange="programsetfilename(this.value,'first')" type="file">
					<span  class="btn btn-default btn-block file-btn" name="program_button_first" onclick="document.getElementById('notice_file').click();">Upload </span><span id="program_file_span_first" style="margin-left:2px;margin-right:2px; padding-left:0px; padding-right:0px;"></span>
					
				</div>
			</div>
           
                
              </div>
            </div>
		</td>
	  </tr>	
	  <tr>
		<th class="gray">Contents</th>
		<td>
			<div name="notice_content" style="height:600px;" id="editor"></div>
           
		</td>
	  </tr>	
 	  
	</table>
	</div>
<div class="row footer_btn">
<div class="col-sm-4">
  <div class="pull-left">
   <a href="list.php" class="btn btn-outline">Back to List</a>
  </div>
  </div>
  <div class="col-sm-8">
  <div class="pull-right">
  <input type="hidden" name="first_form" value="first_form" />
	  <button class="btn btn-info" type="submit" name="editsubmit" value="editsubmit">Done</button> <!--<a href="notice_edit.html" class="btn btn-info">Edit</a>-->
  </div>				
</div>
</div>
</div>		  
		</div> 			
 
    </section>
     </form>  
     <div id="myModalId">
     </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
<footer id="main_footer" class="main-footer"><?php include_once('../footer/footert.php') ?></footer>
  <!-- change level Modal -->
  <div class="modal fade in" id="Email_sucess" role="dialog"  style="display:none;">
<div class="modal-dialog">
  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header text-center">
        <div class="modal-pp out_space">
        <p class="sucess_msg" id="message_box">Email sent.</p>
        </div>
        <div style="height:20px;"></div> 
      <button class="btn btn-info" onClick="hideModal()">OK</button>
    </div>
  </div>
</div>
</div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 --> 
<script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script> 
<!-- Bootstrap 3.3.6 --> 
<script src="../../bootstrap/js/bootstrap.min.js"></script> 
<script type="text/javascript">
$(document).ready(function() {
	
	
	 $(".sidebar-menu > li").removeClass("active");
	 $('.treeview').removeClass('active');
     $("#nlist").addClass('treeview active'); 
	 $("#nlista").css("text-decoration","underline");
	
	
	$('select:focus').prev().css('background-color', '#eee');
	
	
	
// Input file function
$("#notice_date").datepicker({
		 
		dateFormat: 'dd/mm/yy'
		
		
		 
		
	});

        });
function bytesToSize(bytes) {
   var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
   if (bytes == 0) return '0 Byte';
   var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
   return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
};
function programsetfilename(val,idprefix)
  {
    var fileName = val.substr(val.lastIndexOf("\\")+1, val.length);
	var filesize = $("#notice_file")[0].files[0].size;
	//alert(filesize);
	var filesize = bytesToSize(filesize);
	//alert(filesize);
    document.getElementById("program_file_span_"+idprefix).innerHTML  = '<span style="padding-left:2px;padding-right:2px;">'+fileName+' ( '+filesize+' )<span style="color:hsla(359,81%,53%,1.00);"><i class="fa fa-times-circle" onClick=\"clearSpan(\'program_file_span_'+idprefix+'\',\'program_file_'+idprefix+'\')\"></i></span></span>';
  }		
	function clearSpan(id,fileid) {
	 /* con = confirm("Are you sure!");
	  if(con) {
	 		document.getElementById(id).innerHTML ="";
	 		$("#"+fileid).val('');
	  }*/
	  document.getElementById(id).innerHTML ="";
	 		$("#"+fileid).val('');
  }	
</script> 

<!-- AdminLTE App --> 
<script src="../../dist/js/app.min.js"></script> 

<!-- SlimScroll 1.3.0 --> 
<script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script> 
<!-- iCheck 1.0.1 --> 
<script src="../../plugins/iCheck/icheck.min.js"></script> 
<!-- AdminLTE for demo purposes --> 
<script src="../../dist/js/demo.js"></script> 
<script src="../../dist/js/jquery-ui.min.js" type="text/javascript"></script>

<!-- Bootstrap WYSIHTML5 -->
<script src="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script type='text/javascript' src='../../js/plugins/validationengine/languages/jquery.validationEngine-en.js'></script>
        <script type='text/javascript' src='../../js/plugins/validationengine/jquery.validationEngine.js'></script>  
        <script type='text/javascript' src='../../js/plugins/jquery-validation/jquery.validate.js'></script>
         <script type='text/javascript' src='../../js/plugins/jquery-validation/jquery.validate.hooks.js'></script> 
        <script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>
         <script type="text/javascript" src="../../js/plugins.js"></script>        
        <script type="text/javascript" src="../../js/actions.js"></script>
        <script src="https://cdn.quilljs.com/1.2.3/quill.min.js" type="text/javascript"></script>
        <script> 
	
		//$("#jvalidate").validate();
		
function alertDisappear() {
	$("#included_error_tour").css("display", "none");
}
	
	
			
 $("#jvalidate").validate({
  rules: {
    notice_title: {
		required: true
	 },
	         notice_file: {
            required: true 
            
        }

	
  }
	});
	
	function validateFileName() {
    $check = true;
    $(".multi").each(function(){
       var files = $(this).val(); 

        if(files=='') { 
          // alert("No document file selected");
           $check = false;
           return false; // You don't want to loop, so exit each loop
        }
    });

    return $check;
}
	
$(document).ready(function(){
	//alert("hello");
	//var noticeContent = <?php echo $noticeContentA ?>;
			//var noticeContent = {"ops":[{"insert":{"image":"../../storage/image/editor_1491897229.jpg"}},{"insert":"TESTTEST"},{"insert":{"image":"../../storage/image/editor_1491897229.jpg"}},{"insert":"TESTTEST"},{"insert":{"image":"../../storage/image/editor_1491897229.jpg"}},{"insert":""}]};			
	//alert(noticeContent);
	//quill.setContents(noticeContent);
	
			$('#jvalidate').submit(function(e) {
				var noticeTitle = $("#notice_title").val();
				var noticeDate = $("#notice_date").val();
				var noticeFile = $('#notice_file').prop('files')[0]; 
				if ( $.trim ( noticeTitle ).length == 0 ) {
					$("#message_box").text("Title required");
				//changePasswordError = 1; 
				$('#Email_sucess').show();
					return false;	
				}
	     var fileValidate = validateFileName();
		 if (fileValidate) {
		  }else {
			  $("#message_box").text("Upload file");
				//changePasswordError = 1; 
				$('#Email_sucess').show();
			return false;
		  }
				e.preventDefault();

              //alert(form_data);
				//alert(noticeFile);
							//console.log(form_data);

				
	
				var length = quill.getLength();
				var delta = quill.getContents(0,length);
				var htmlabc = quill.root.innerHTML;
				 //console.log(htmlabc)
	var dataString = JSON.stringify(delta);
	
    var formData = new FormData($(this)[0]);
	//alert(formData);

    $.ajax({
        url: "../../controller/notice/notice.php",
        type: 'POST',
        data: formData,
        success: function (data) {
			//alert(data);
			if (data == "Error_Code=dup") {
				$("#included_error_tour").css("display", "block");
			}else {
$.ajax({
						url: "../../controller/notice/notice.php",
						type: "POST",
						
						

						data:{notice_content:dataString,update_id:data,notice_content_html:htmlabc},
												
						success: function(data){
							window.location.href = 'list.php';
							console.log(data);

							}, error: function(c){
            console.log(c.message);
        }
 
										   
						       
				   });  }      },
        cache: false,
        contentType: false,
        processData: false
    });


				

				
    });
});

</script>  



<!-- Initialize Quill editor -->
<script>


var toolbarOptions = [
 // custom dropdown
  [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
[{ 'header': 1 }, { 'header': 2 }],
 [{ 'font': [] }],
  ['bold', 'italic', 'underline'],        // toggled buttons


                 // custom button values
  [{ 'list': 'ordered'}, { 'list': 'bullet' }],
  [{ 'align': [] }],
  
        // superscript/subscript
  [{ 'indent': '-1'}, { 'indent': '+1' }],
  [{ 'script': 'sub'}, { 'script': 'super' }],
   ['link','image'],          // outdent/indent
                           // text direction  



  [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
 
  

                                          // remove formatting button
];
var quill = new Quill('#editor', {
  modules: {
	
   toolbar:toolbarOptions  },
  placeholder: 'Compose an epic...',
  theme: 'snow' // or 'bubble'
  

});
//quill.enable(false);
var delta = quill.getContents();
 function hideModal() {
	$('#Email_sucess').hide();
	//location.reload();
	//$('#ChangePassword').hide();
}
</script>
</body>
 
</html>
