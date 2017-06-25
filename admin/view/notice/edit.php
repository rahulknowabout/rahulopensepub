<?php include_once('../../check_login.php');
include('../../modal/notice/notice.php');
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
  <title>Admin | Notice</title>
  <link href="../../dist/img/favicon.ico" rel="icon" type="/ico" />  
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.css">
  <!-- Main style -->
  <link rel="stylesheet" href="../../dist/css/style.css">
   
       
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../../plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="../../plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../../plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="../../plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../../plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
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
      <h1><b>Notice</b></h1>
  <form id="jvalidate" role="form" class="form-horizontal" enctype="multipart/form-data" method="post" action="../../controller/notice/notice_edit.php">
                                
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
				<input class="form-control" name="notice_title" id="notice_title" value="<?php echo $noticeContent['notice_title'];  ?>">
			</div>
		</td>
	  </tr>
	  <tr>
		<th class="gray">Date</th>
		<td>
			<div class="form-group2 start_date ContractDate">
				
					<input name="notice_date" id="notice_date" value="<?php echo $noticeContent['notice_date']; ?>" class="form-control" placeholder="DD/MM/YYYY" />
					<i class="fa custom_icon"><img src="../../dist/img/calendar_icon.png" alt="" title=""></i>
				
			</div>
		</td>
	  </tr>
	  <tr>
		<th class="gray">File</th>
		<td>
			<div class="form-group2 upload row">
				<div class="col-md-6 col-sm-7">
						<input name="notice_file" id="notice_file" class="inputfile inputfile-1 multi" onChange="programsetfilename(this.value,'first')" type="file">
					<span  class="btn btn-default btn-block file-btn" name="program_button_first" onclick="document.getElementById('notice_file').click();">Upload </span><span id="program_file_span_first" style="margin-left:2px;margin-right:2px; padding-left:0px; padding-right:0px;"><span style="padding-left:2px;padding-right:2px;"><?php $pos = strpos($noticeContent['notice_file'],'_'); if($pos) {$noticeContent['notice_file']= substr_replace($noticeContent['notice_file'],'',0,$pos+1);} echo $noticeContent['notice_file']; ?><span style="color:hsla(359,81%,53%,1.00);"><i class="fa fa-times-circle" onClick="clearSpan('program_file_span_first','notice_file')"></i></span></span></span>
					
				</div>
			</div>
            <input type="hidden" name="notice_file_before" value="<?php echo $noticeContent['notice_file']; ?>" />
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
       <input type="hidden" name="notice_id" value="<?php echo $_GET['notice_id']; ?>" />
       <button class="btn btn-info" type="submit" name="editsubmit" value="editsubmit">Done</button>
	  </form>
  </div>
  				
</div>
</div>
</div>		  
		</div> 			
 
    </section>
    <!-- /.content -->
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
  <!-- /.content-wrapper -->
 
<footer id="main_footer" class="main-footer"><?php include_once('../footer/footert.php') ?></footer>
  <!-- change level Modal -->
  
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
<script src="https://cdn.quilljs.com/1.2.3/quill.min.js" type="text/javascript"></script> 

<script type="text/javascript"> 
jQuery(document).ready(function(){
 /* jQuery("#main_header").load("inc/header.html"); 
  jQuery("#main_sidebar").load("inc/LeftSidebar.html"); 
  jQuery("#main_footer").load("inc/footer.html"); */
  
  $(".sidebar-menu > li").removeClass("active");
	 $('.treeview').removeClass('active');
     $("#nlist").addClass('treeview active'); 
	 $("#nlista").css("text-decoration","underline");
	
	
	$('select:focus').prev().css('background-color', '#eee');
});
</script>

    <script type="text/javascript">
        $(document).ready(function() {

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


<!-- FastClick -->
<script src="../../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/app.min.js"></script>
<!-- Sparkline -->
<script src="../../plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="../../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="../../plugins/chartjs/Chart.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../../dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
 
<link type="text/css" rel="stylesheet" href="../../dist/css/jquery-ui.css">
<script src="../../dist/js/jquery-ui.min.js" type="text/javascript"></script>

<!-- Bootstrap WYSIHTML5 -->
<script src="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script>
	
		//$("#jvalidate").validate();
		
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
	var noticeContent = <?php echo $noticeContentA ?>;
			//var noticeContent = {"ops":[{"insert":{"image":"../../storage/image/editor_1491897229.jpg"}},{"insert":"TESTTEST"},{"insert":{"image":"../../storage/image/editor_1491897229.jpg"}},{"insert":"TESTTEST"},{"insert":{"image":"../../storage/image/editor_1491897229.jpg"}},{"insert":""}]};			
	//alert(noticeContent);
	quill.setContents(noticeContent);
	
			$('#jvalidate').submit(function(e) {
				var noticeTitle = $("#notice_title").val();
				var noticeDate = $("#notice_date").val();
				var noticeFile = $('#notice_file').prop('files')[0]; 
				if ( $.trim ( noticeTitle ).length == 0 ) {
					$("#message_box").text("Title Required");
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

              //alert(form_data);
				//alert(noticeFile);
							//console.log(form_data);

				//alert("hello");
	
				var length = quill.getLength();
				var delta = quill.getContents(0,length);
				 var htmlabc = quill.root.innerHTML;
	var dataString = JSON.stringify(delta);
	
    var formData = new FormData($(this)[0]);
	console.log(formData);

    $.ajax({
        url: "../../controller/notice/notice_edit.php",
        type: 'POST',
        data: formData,
        success: function (data) {
			//alert(data);
			if (data == "Error_Code=dup") {
				$("#included_error_tour").css("display", "block");
			}else {
$.ajax({
						url: "../../controller/notice/notice_edit.php",
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

var delta = quill.getContents();
function hideModal() {
	$('#Email_sucess').hide();
	//location.reload();
	//$('#ChangePassword').hide();
}
</script>
</body>
</html>
