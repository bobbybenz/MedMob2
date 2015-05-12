<?php 
  $title = "MEDMOB | จัดการข้อมูล";
  $page = "question";
?>
<?php include('header_dash.php');?>
<?php
    $_GET['symptomNodeID'];
    $_GET['type'];
  ?>

  <?php

  include('../connectAzure.php');
    //*** Add Condition ***//
      if(isset($_POST["hdnCmd"])){
        if($_POST["hdnCmd"] == "Add")
        {
          $strSQL = "INSERT INTO diseaseofsymptom ";
          $strSQL .="(symptomNodeID,diseaseID) ";
          $strSQL .="VALUES ";
          $strSQL .="('".$_GET['symptomNodeID']."','".$_POST["txtAddDiseaseID"]."')";
          $objQuery = mysql_query($strSQL);
          if(!$objQuery)
          {
            echo "Error Save [".mysql_error()."]";
          }
        }
      }

  
      //*** Delete Condition ***//
      if(isset($_GET["Action"])){
        if($_GET["Action"] == "Del")
        {
          $strSQL = "DELETE FROM diseaseofsymptom ";
          $strSQL .="WHERE diseaseOfSymptomID = '".$_GET["DosID"]."' ";
          $objQuery = mysql_query($strSQL);
          if(!$objQuery)
          {
            echo "Error Delete [".mysql_error()."]";
          }
        }
      }
    //Have data
      if(isset($_GET["symptomNodeID"])){

        $strSQL = "SELECT * FROM (diseaseofsymptom AS dos JOIN disease AS d ON dos.diseaseID = d.diseaseID) JOIN 
        symptomnode AS sn ON sn.symptomNodeID = dos.symptomNodeID WHERE dos.symptomNodeID = ".$_GET["symptomNodeID"]; 
        
        $objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
        
    ?>
  <?php   $strSQLSymptomNode = "SELECT * FROM symptomnode WHERE symptomNodeID=".$_GET['symptomNodeID'];
      $objQuerySymptomNode = mysql_query($strSQLSymptomNode);
      $result = mysql_fetch_array($objQuerySymptomNode);
      $symptomID = $result['symptomID'];
  ?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            เพิ่มโรคในการวินิจฉัย
            <!-- <small>ปวดท้อง</small> -->
          </h1>
          <ol class="breadcrumb">
            <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"><a href="SymptomNodeShow.php?symptomID=<?php echo $symptomID;?>">รายการคำถามของอาการ</a></li>
            <li class="active">เพิ่มโรคในการวินิจฉัย</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          
          <!-- Your Page Content Here -->

          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-body">
  

    <!-- <h1>Symptom Node ID : <?php echo $_GET['symptomNodeID'];?></h1> -->
    <div class="form-group">
      <label>คำถามสุดท้ายก่อนการวินิจฉัย:</label> 
      <textarea class="form-control" style="resize:none;font-size:16px" readonly row="2"><?php echo $result['question'];?></textarea>
    </div>

    <h4>รายการโรค</h4>
    <form name = "dosMN" method="post" action="<?php echo $_SERVER["PHP_SELF"]."?symptomNodeID="
    .$_GET['symptomNodeID']."&type=".$_GET['type'];?>">
      <input type="hidden" name="hdnCmd" value="">
      <table class="table table-bordered table-hover">
        <thead>
        <tr>
          <th style="width: 20%;"><div align="center">Disease of symptom ID</div></th>
          <th style="width: 20%;"><div align="center">Disease ID</div></th>
          <th><div align="center">Disease Name</div></th>
          <th><div align="center">Delete</div></th>
        </tr>
        </thead>
        <tbody>
    <?php
      while ($objResult = mysql_fetch_array($objQuery)) {
        
    ?>     
      <tr>
        <td style="text-align: center;"><?php echo $objResult['diseaseOfSymptomID'];?></td>
        <td style="text-align: center;"><?php echo $objResult['diseaseID'];?></td>
        <td><?php echo $objResult['name'];?></td>
        <td style="text-align: center;"><a href="JavaScript:
          if(confirm('Confirm Delete?')==true){
          window.location='
          <?php echo $_SERVER["PHP_SELF"]."?symptomNodeID=".$_GET['symptomNodeID']."&type=".$_GET['type'];?>&Action=Del&DosID=<?php echo $objResult['diseaseOfSymptomID'];?>';}">Delete</a>
        </td>
      </tr>
  
      <?php
       
      }//while ($objResult = mysql_fetch_array($objQuery))
      ?>
          <tr>
            <td><input type= "hidden" name="txtAddDosID" ></td>
            <td><input class="form-control" type="text" name="txtAddDiseaseID" readonly id="disease-id-value"></td>
            <!-- <td><textarea name = "txtAddDetail" ></textarea></td> -->

            <td>
              <div class="row">
                <div class="col-sm-10">
                  <input class="form-control" type="text" name="txtAddDisease" readonly id="disease-value">
                </div>
                <div class="col-sm-2">
                  <input class="btn btn-default" type="button" value="..." data-toggle="modal" data-target="#list-of-disease-modal">  
                </div>
              </div>
              
            </td>
            <td align="right">
              <div align="center">
                <input class="btn btn-success" name="btnAdd" type="button" id="btnAdd" value="Add" OnClick="
                  var chkID=document.getElementById('disease-id-value').value;
                  if(chkID==''){
            alert('Please select Diease!!!');
          }else{
            dosMN.hdnCmd.value='Add';
            dosMN.submit();
          }
                ">
              </div>
            </td>
          </tr>
          </tbody>
        </table>
    </form>

    <?php
      
    }//Have get Variable----- if(isset($_GET["diseaseID"]))
    else{ // Don't Have ID
      ?>
      <h1>Don't Have Detail2</h1>
      <?php

      }//else Don't Have ID"?
    ?>
    <input class="btn btn-default" type="button" value="<<Back" Onclick = "location.href ='SymptomNodeShow.php?symptomID=<?php echo $symptomID;?>'">


                </div><!-- box-body -->
              </div><!-- box -->
            </div><!-- col-md-12 -->

          </div><!-- row -->
     




        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

     
    </div><!-- ./wrapper -->

  <!-- Modal -->
  <div class="modal fade" id="list-of-disease-modal" tabindex="-1" role="dialog" >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">รายการโรค</h4>
        </div>  <!-- modal-header -->
        <div class="modal-body">
          <table id="modal-table" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th style="text-align: center;">ID</th>
                <th style="text-align: center;">Disease Name</th>
                <!-- <th>Remarks</th> -->
              </tr>
            </thead>
            <tbody>
          <?php
            $strSQLDisease="SELECT * FROM disease";
            $objQueryDisease=mysql_query($strSQLDisease) or die ("Error Query [".$strSQLDisease."]");
            //$objQuery = mysql_query($strSQLDisease) or die ("Error Query [".$strSQLDisease."]");
            while ($objResultDisease=mysql_fetch_array($objQueryDisease)) {

              # code...
            
          ?>
              <tr>
                <td style="text-align: center;">
                  <a href="javascript:void(0);" class="choose-button"><?php echo 
                  $objResultDisease['diseaseID']; ?></a>
                </td>
                <td class="<?php echo $objResultDisease['diseaseID']?> diseaseName"><?php echo $objResultDisease['name']; ?></td>
                <!-- <td class="001 remarks">none</td> -->
              </tr>
            <!--  <tr>
                <td>
                  <a href="javascript:void(0);" class="choose-button">002</a>
                </td>
                <td class="002 diseaseName">Syndrome</td>
                <td class="002 remarks">-</td>
              </tr> -->

          <?php
            }//while ($objResultDisease=mysql_fetch_array($objQueryDisease))
            mysql_close($objConnect);
          ?>
            </tbody>
          </table>
        </div>  <!-- modal-body -->
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
        </div>  <!-- modal-footer -->
      </div>
    </div>
  </div>

    <!-- REQUIRED JS SCRIPTS -->
    
    <!-- jQuery 2.1.3 -->
    <script src="../plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/app.min.js" type="text/javascript"></script>
    
    <!-- DATA TABLES -->
    <script src="../plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="../plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>

    <!-- Select picker -->
    <script type="text/javascript" src="../plugins/selectpicker/js/bootstrap-select.js"></script>


<script>
  $(document).ready(function(){
    //Modal
    $('.choose-button').click(function(){
      var id = $(this).html();
      var disease = $('.'+id+'.diseaseName').html();
      //var remarks = $('.'+id+'.remarks').html();
      $('#disease-id-value').val(id);
      $('#disease-value').val(disease);
      $('#list-of-disease-modal').modal('hide');
    });

    $('#modal-table').dataTable();
  });
</script>
    <!-- Optionally, you can add Slimscroll and FastClick plugins. 
          Both of these plugins are recommended to enhance the 
          user experience -->
  </body>
</html>