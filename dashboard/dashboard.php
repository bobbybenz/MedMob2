<?php 
  $title = "MEDMOB | Dashboard";
  $page = "dashboard";
  //Go to Symptom Manage Page
  header("Location:SymptomManage.php");
  die();
?>
<?php include('header_dash.php');?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Page Header
            <!-- <small>Optional description</small> -->
          </h1>
          <ol class="breadcrumb">
            <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">here</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          
          <!-- Your Page Content Here -->

          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="" style = "width:400px;height: 700px"></div>
              </div><!-- box -->
            </div><!-- col-md-12 -->

          </div><!-- row -->
     




        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

     
    </div><!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->
    
    <!-- jQuery 2.1.3 -->
    <script src="../plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/app.min.js" type="text/javascript"></script>
    
    <!-- Optionally, you can add Slimscroll and FastClick plugins. 
          Both of these plugins are recommended to enhance the 
          user experience -->
  </body>
</html>