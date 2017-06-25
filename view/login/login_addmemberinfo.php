<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="initial-scale=1, minimal-ui" />    
  <title>Opens</title>
  <link href="images/favicon.ico" rel="icon" type="image/ico" />
  <script type="text/javascript" src="js/jquery-1.10.2.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <link href="css/bootstrap.min.css" type="text/css" rel="stylesheet" />
  <link href="css/animate.css" type="text/css" rel="stylesheet" />
  <link href="css/style.css" type="text/css" rel="stylesheet" />
<script type="text/javascript"> 
$(document).ready(function(){
  $("#top_part").load("inc/top_part.html");
  $("#main_header").load("inc/header.html"); 
  $("#main_footer").load("inc/footer.html"); 
});
</script>    
</head>
<body>
<section id="top_part"></section>
<header id="main_header"></header>
<section class="main-content">
    <div class="container">
        <div class="member_page">
            <h1>Add member <b>information input</b></h1>
            <p>Your membership has been changed to "Level 3 member". Please enter your company information.</p>
            <div class="Form_Inside">
            <form role="form" class="form-horizontal">
                <h2>My info</h2>
                <div class="form-group">
                  <label class="col-sm-4 col-md-3 col-lg-2" for="inputName">Name</label>
                  <div class="col-md-4 col-sm-7"><input type="text" class="form-control" id="inputName" placeholder="John Smith"></div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 col-md-3 col-lg-2" for="inputEmail1">Email</label>
                  <div class="col-md-4 col-sm-7"><input type="email" class="form-control" id="inputEmail1" placeholder="johnsmith@email.com"></div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 col-md-3 col-lg-2" for="country">Country</label>
                    <div class="col-md-4 col-sm-7">
                    <select class="form-control" id="country">
                    <option>South Korea</option>
                    <option>America</option>
                    <option>India</option>
                    <option>Australia</option>
                  </select>
                </div>
                </div>
                <div style="height:20px;"></div>
                <h2>Company info</h2>
                <div class="form-group">
                  <label class="col-sm-4 col-md-3 col-lg-2" for="Cname">Company name</label>
                  <div class="col-sm-7"><input type="text" class="form-control" id="Cname" placeholder="Company name"></div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 col-md-3 col-lg-2" for="Caddress">Company address</label>
                  <div class="col-sm-7"><input type="text" class="form-control" id="Caddress" placeholder="Company address"></div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 col-md-3 col-lg-2" for="CPnumber">Company phone number</label>
                  <div class="col-sm-4 col-md-7"><input type="text" class="form-control" id="CPnumber" placeholder="International phone number country code required (ex: + 82-2-430-7267)"></div>
                </div> 
                <div style="height:70px;" class="Mobile_space"></div>
                <div class="form-group text-center">
                  <div class="btns_list">
                   <a href="#" class="btn btn-info btn-outline">Cancel</a>
                  </div>
                  <div class="btns_list">
                      <a href="#" class="btn btn-info">Done</a>
                  </div>                    
                </div>
              </form> 
            </div>
        </div>
    </div>
</section>    
<footer id="main_footer" class="main-footer"></footer>
</body>
</html>