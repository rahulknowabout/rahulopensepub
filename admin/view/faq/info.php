<?php include_once('../../check_login.php'); 
 include('../../modal/faq/notice.php');
	 if (isset($_GET['notice_id']) && $_GET['notice_id']!=""){
	    $noticeContent = noticeReadByid($_GET['notice_id']);
	    $noticeContentA = $noticeContent['notice_content'];
	 }else{
		 $noticeContent = "";
	    $noticeContentA = "";
	 }
?>
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
    </section>
    
    <!-- Main content -->
    <section class="content"> 
      <!-- Small boxes (Stat box) -->
      
      <div class="Form_Inside management_page">
        <div class="member_page accordion_style notice_table">
          <div class="table-responsive">
            <table class="table">
              <tr>
                <th class="gray">Title</th>
                <td><?php echo $noticeContent['notice_title'];   ?></td>
              </tr>
              <tr>
                <th class="gray">Date</th>
                <td><?php echo $noticeContent['notice_date'];   ?></td>
              </tr>
             <!-- <tr>
                <th class="gray">File</th>
                <td><div name="notice_content" style="height:600px;" id="editor"></div></td>
              </tr>-->
              <tr>
                <th class="gray">Contents</th>
                <td><div name="notice_content" style="height:600px;" id="editor"></div>
                  </td>
              </tr>
            </table>
          </div>
          <div class="row footer_btn">
            <div class="col-sm-4">
              <div class="pull-left"> <a href="list.php" class="btn btn-outline">Back to List</a> </div>
            </div>
            <div class="col-sm-8">
              <div class="pull-right"><a href="../../controller/faq/notice_delete.php?notice_id=<?php echo $_GET['notice_id']; ?>&del=del" onClick="return Delete_Permission()"><button class="btn btn-default" name="button_notice_delete" type="button">Delete</button></a>
                               <a href="edit.php?notice_id=<?php echo $_GET['notice_id']; ?>"><button class="btn btn-info" type="button" name="editsubmit">Edit</button></a><!-- <a href="#" class="btn btn-info">Edit</a> --></div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content --> 
  </div>
  <!-- /.content-wrapper -->
  
  <footer id="main_footer" class="main-footer"><?php include_once('../footer/footert.php') ?></footer>
  <!-- change level Modal --> 
  <div class="modal fade in" id="Email_sucess_transfer" role="dialog"  style="display:none;">
<div class="modal-dialog">
  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header text-center">
        <div class="modal-pp out_space">
        <p class="sucess_msg" id="transfer_confirmation_message_box">Do you really want to delete it?</p>
        </div>
        <div style="height:20px;"></div>
        
    <button type="button" class="btn-info btn-lg" style="margin-right:5px;" onClick="tranferMemberShipfun('yes')">Yes</button>
   
    <button type="button" class="btn-info btn-lg" onClick="tranferMemberShipfun('no')">No</button>
  
                   
                               
                 
      <!--<button class="btn btn-info" onClick="hideModal()">OK</button>-->
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
	 $("#flista").css("text-decoration","underline");
	
	$('select:focus').prev().css('background-color', '#eee');
	
	// Date function
	
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
<script src="https://cdn.quilljs.com/1.2.3/quill.min.js" type="text/javascript"></script> 
<script>
$(document).ready(function(){
	//alert("hello");
	var noticeContent = <?php echo $noticeContentA ?>;
			//var noticeContent = {"ops":[{"insert":{"image":"../../storage/image/editor_1491897229.jpg"}},{"insert":"TESTTEST"},{"insert":{"image":"../../storage/image/editor_1491897229.jpg"}},{"insert":"TESTTEST"},{"insert":{"image":"../../storage/image/editor_1491897229.jpg"}},{"insert":""}]};			
	//alert(noticeContent);
	quill.setContents(noticeContent);
	
			$('#jvalidate').submit(function(e) {
				var noticeTitle = $("#notice_title").val();
				var noticeDate = $("#notice_date").val();
				var noticeFile = $('#notice_file').prop('files')[0]; 
				if ( $.trim ( noticeTitle ).length == 0 ) {
					return false;	
				}
	     var fileValidate = validateFileName();
		 if (fileValidate) {
		  }else {
			return false;
		  }
				e.preventDefault();

              //alert(form_data);
				//alert(noticeFile);
							//console.log(form_data);

				//alert("hello");
	
				var length = quill.getLength();
				var delta = quill.getContents(0,length);
				 
	var dataString = JSON.stringify(delta);
	
    var formData = new FormData($(this)[0]);

    $.ajax({
        url: "../../controller/notice/notice.php",
        type: 'POST',
        data: formData,
        success: function (data) {
			alert(data);
			if (data == "Error_Code=dup") {
				$("#included_error_tour").css("display", "block");
			}else {
$.ajax({
						url: "../../controller/notice/notice.php",
						type: "POST",
						
						

						data:{notice_content:dataString,update_id:data},
												
						success: function(data){
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
            // dropdown with defaults from theme
 
  

                                          // remove formatting button
];
var quill = new Quill('#editor', {
  modules: {
	
   toolbar:toolbarOptions  },
  placeholder: 'Compose an epic...',
  theme: 'snow' // or 'bubble'
  

});
quill.enable(false);
var delta = quill.getContents();

function Delete_Permission(delete_user_id) {
	$('#Email_sucess_transfer').show();
	
	
		return false;
	
}
function tranferMemberShipfun(inquiry) {
		$('#Email_sucess_transfer').hide();
		if(inquiry == 'no') {
			 
		}else {
			window.location.href = "../../controller/faq/notice_delete.php?notice_id=<?php echo $_GET['notice_id']; ?>&del=del";
		}
	}

</script>
</body>
</html>
