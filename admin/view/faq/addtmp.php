<?php include_once('../../check_login.php'); ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Admin | FAQ</title>
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
      <h1><b>FAQ</b></h1>
      <form id="jvalidate" role="form" class="form-horizontal" enctype="multipart/form-data" method="post" action="../../controller/product/productadd.php">
    <span class="alert-danger" id="included_error_tour" <?php if(isset($_GET['Error_Code']) && $_GET['Error_Code'] == 'dup'){ ?> style="display:block;"  <?php }else{ ?> style="display:none" <?php } ?> onClick="alertDisappear();">This Faq Title Exist, Please Try Another</span>
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
                <td><div class="form-group2">
                    <input class="form-control" name="notice_title" id="notice_title" type="text">
                  </div></td>
              </tr>
              <tr>
                <th class="gray">Date</th>
                <td><div class='form-group2 start_date ContractDate' >
                    <input type='text' class="form-control" id='notice_date' style="width:10%;" name="notice_date" value="<?php echo date('d/m/Y'); ?>" />
                    <i class="fa custom_icon"><img src="../../dist/img/calendar_icon.png" alt="" title=""></i>
                   
                </div></td>
              </tr>
              <tr>
                <th class="gray">Contents</th>
                <td><div name="notice_content" style="height:600px;" id="editor"></td><input type="file" name="notice_file" id="notice_file" class="form-control multi" style="display:none;"/>
              </tr>
            </table>
          </div>
          <div class="row footer_btn">
            <div class="col-sm-4">
              <div class="pull-left"> <a href="list.php" class="btn btn-outline">Back to List</a> </div>
            </div>
            <div class="col-sm-8">
            <input type="hidden" name="first_form" value="first_form" />
              <div class="pull-right"><button class="btn btn-info" type="submit" name="editsubmit" value="editsubmit">Done</button></div>
            </div>
          </div>
        </div>
      </div>
      </form>
    </section>
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
	
	// header, footer and left part attachment
	/*jQuery("#main_header").load("inc/header.html");
	jQuery("#main_sidebar").load("inc/LeftSidebar.html");
	jQuery("#main_footer").load("inc/footer.html");
	
	// Menu active function
	jQuery(".sidebar-menu > li").click(function() {
	  // remove classes from all
	  jQuery(".sidebar-menu > li").removeClass("active");
	  // add class to the one we clicked
	  jQuery(this).addClass("active");
	});*/
	$(".sidebar-menu > li").removeClass("active");
	 $('.treeview').removeClass('active');
     $("#nlist").addClass('treeview active'); 
	 $("#nlista").css("text-decoration","underline");
	
	
	
	// Date function
	$("#notice_date").datepicker({
		dateFormat: 'dd/mm/yy'
	});
	
	
	// Calender function
	
	
// Input file function
	

        });
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
  <script src="https://cdn.quilljs.com/1.2.3/quill.min.js" type="text/javascript"></script> 
 <script>
 function alertDisappear() {
	$("#included_error_tour").css("display", "none");
}
	
	
			

	
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
	    /* var fileValidate = validateFileName();
		 if (fileValidate) {
		  }else {
			return false;
		  }*/
				e.preventDefault();

              
	
				var length = quill.getLength();
				var delta = quill.getContents(0,length);
				 var htmlabc = quill.root.innerHTML;
	var dataString = JSON.stringify(delta);
	
    var formData = new FormData($(this)[0]);
	//alert(formData);

    $.ajax({
        url: "../../controller/faq/notice.php",
        type: 'POST',
        data: formData,
        success: function (data) {
			//alert(data);
			if (data == "Error_Code=dup") {
				$("#included_error_tour").css("display", "block");
			}else {
$.ajax({
						url: "../../controller/faq/notice.php",
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


				/*$.ajax({
						url: "../../controller/notice/notice.php",
						type: "POST",
						
						

						data:{notice_content:dataString,notice_title:noticeTitle,notice_date:noticeDate},
												
						success: function(data){
							console.log(data);

							}, error: function(c){
            console.log(c.message);
        }
 
										   
						       
				   });*/

				
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
</html>
