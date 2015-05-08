<?php session_start();?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
  <head>
    <meta charset="UTF-8">
    <title><?php echo $title;?></title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
     <link href="dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

<script>
  //$(document).on("click", "#login-submit", function(){
  // $('#login-submit').click(function(){
  //   alert();
  // });


  function login(){
    //alert();
    //$('#alert-login').hide();
    //$('form[name="loginForm"]').submit();
      var user = $('#txtUsername').val();
      var password = $('#txtPassword').val();
     $.ajax({
          type:"POST",
          url: "check_login.php",
          data: {txtUsername: user ,txtPassword: password},
          success: function(data) {
              
              //alert(data);
              if(data =="connect"){
                window.location.href = "dashboard/SymptomManage.php";
              }
              else{
                  alert("กรุณาใส่ชื่อผู้ใช้และรหัสให้ถูกต้อง");
              }
            }
          
          });//ajax
  }


</script>
  </head>
  <!--
  BODY TAG OPTIONS:
  =================
  Apply one or more of the following classes to get the 
  desired effect
  |---------------------------------------------------------|
  | SKINS         | skin-blue                               |
  |               | skin-black                              |
  |               | skin-purple                             |
  |               | skin-yellow                             |
  |               | skin-red                                |
  |               | skin-green                              |
  |---------------------------------------------------------|
  |LAYOUT OPTIONS | fixed                                   |
  |               | layout-boxed                            |
  |               | layout-top-nav                          |
  |               | sidebar-collapse                        |  
  |---------------------------------------------------------|
  
  -->
  <?php include('connectAzure.php');?>
  <body class="skin-yellow">
    <div class="wrapper">

      <!-- Main Header -->
      <header class="main-header">

        <!-- Logo -->
        <a href="" class="logo">MEDMOB</a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
<?php if(isset($_SESSION['userID'])){?>
        <!-- Navbar Right Menu Admin-->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                  <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image"/>
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="hidden-xs"><b>ผู้ดูแลระบบ</b></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li class="user-header">
                    <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
                    <p>
                      
                      <big>Admin</big>
                    </p>
                  </li>
      
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="dashboard/dashboard.php" class="btn btn-default btn-flat">Dashboard</a>
                    </div>
                    <div class="pull-right">
                      <a href="dashboard/logout.php" class="btn btn-default btn-flat">Log out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div><!-- navbar-custom-menu -->

<?php 
}
else{
  ?>
           <!-- Navbar Right Menu Normal-User-->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                  <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image"/>
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                  <span class="hidden-xs"><b>ผู้ใช้งานทั่วไป</b></span>
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li class="user-header">
                    <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
                    <p>
                      กรุณา log in เพื่อเข้าสู่หมวด
                      <big>Admin</big>
                    </p>
                  </li>
      
                  <!-- Menu Footer-->
                  <li class="user-footer">
                
                    <div class="pull-right">
                      <a href="#" class="btn btn-default btn-flat" data-toggle="modal" data-target="#LoginModal">Log in</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div><!-- navbar-custom-menu -->
<?php }?>

        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

<?php if(isset($_SESSION['userID'])){?>
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p>ผู้ดูแลระบบ</p>
              <!-- Status -->
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>

<?php }?>
          <!-- Sidebar Menu -->
          <ul class="sidebar-menu">
<?php if(isset($_SESSION['userID'])){?>
            <li class="header">Dashboard</li>
            <li><a href="dashboard/dashboard.php"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
<?php }?>
            <li class="header">MEDMOB Statistic</li>
            <!-- Optionally, you can add icons to the links -->
            <li <?php if($page == "MAIN"){echo "class='active'";}?>><a href="Main.php"><span>แนวโน้มของโรคตามระบบ</span></a></li>
            <!-- <li <?php if($page == "Table"){echo "class='active'";}?>><a href="ListDisease.php"><span>สถิติผู้ป่วยในแต่ละโรค</span></a></li> -->
            <li <?php if($page == "Area"){echo "class='active'";}?>><a href="provinceListDisease.php"><span>สถิติโรคแต่ละจังหวัด</span></a></li>
            <li <?php if($page == "Table"){echo "class='treeview active'";}else{echo "class='treeview'";}?>>
              <a href="ListDisease.php"><span>สถิติผู้ป่วยในแต่ละโรค</span> <i class="fa fa-angle-left pull-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="ListDisease.php"><i class="fa fa-circle-o"></i>ระบบทางเดินหายใจ</a></li>
                <li><a href="ListDisease.php#heading2"><i class="fa fa-circle-o"></i>ระบบทางเดินอาหาร</a></a></li>
                <li><a href="ListDisease.php#collapse3"><i class="fa fa-circle-o"></i>ระบบประสาทและสมอง</a></li>
                <li><a href="ListDisease.php#list-disease4"><i class="fa fa-circle-o"></i>ระบบไหลเวียนโลหิตและโรคเลือด</a></li>
                <li><a href="ListDisease.php#list-disease5"><i class="fa fa-circle-o"></i>ระบบกระดูกและกล้ามเนื้อ</a></li>
                <li><a href="ListDisease.php#list-disease6"><i class="fa fa-circle-o"></i>ระบบต่อมไร้ท่อและโภชนาการ</a></li>
                <li><a href="ListDisease.php#list-disease7"><i class="fa fa-circle-o"></i>ระบบทางเดินปัสสาวะ</a></li>
                <li><a href="ListDisease.php#list-disease10"><i class="fa fa-circle-o"></i>โรคหู</a></li>
                <li><a href="ListDisease.php#list-disease11"><i class="fa fa-circle-o"></i>โรคตา</a></li>
                <li><a href="ListDisease.php#list-disease12"><i class="fa fa-circle-o"></i>โรคผิวหนัง</a></li>
                <li><a href="ListDisease.php#list-disease13"><i class="fa fa-circle-o"></i>โรคติดต่อทางเพศสัมพันธ์</a></li>
                <li><a href="ListDisease.php#list-disease14"><i class="fa fa-circle-o"></i>โรคที่เกิดจากอุบัติเหตุ สารพิษ และสัตว์พิษ</a></li>
                <li><a href="ListDisease.php#list-disease15"><i class="fa fa-circle-o"></i>โรคติดเชื้อ</a></li>
                <li><a href="ListDisease.php#list-disease16"><i class="fa fa-circle-o"></i>โรคพยาธิ</a></li>
                <li><a href="ListDisease.php#list-disease17"><i class="fa fa-circle-o"></i>โรคมะเร็ง</a></li>
                <li><a href="ListDisease.php#list-disease18"><i class="fa fa-circle-o"></i>โรคติดเชื้ออุบัติใหม่</a></li>

              </ul>
            </li>
          </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>

<!-- Modal -->
<div class="modal fade" id="LoginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">เข้าสู่ระบบ</h4>
      </div>
      <div class="modal-body">
        <!-- Content -->
        <div class="row">
          <div class="col-md-12">
            <!-- form start -->
            
            <form role="form" name="loginForm" method="post" action="check_login.php">
              <div class="box-body">
                <!-- Check Alert -->
                <!-- <div class="check-alert">รหัสผิดพลาด กรุณา log inใหม่อีกครั้ง</div> -->
                <div class="form-group">
                  <label>ชื่อผู้ใช้งาน</label>
                  <input type="text" class="form-control" name="txtUsername" id="txtUsername" placeholder="Username">
                </div>
                <div class="form-group">
                  <label>รหัสผ่าน</label>
                  <input type="password" class="form-control" name="txtPassword" id="txtPassword" placeholder="Password">
                </div>
              </div><!-- /.box-body -->

              <div class="box-footer">
                
              </div>
            </form>
          </div><!-- col-md-12 -->
        </div><!-- row -->



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="login-submit" onclick="login();">Submit</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>

