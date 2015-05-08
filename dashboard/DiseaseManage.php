<?php 
  $title = "MEDMOB | จัดการข้อมูล";
  $page = "disease";
?>
<?php include('header_dash.php');?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            รายการโรค
            <!-- <small>Optional description</small> -->
          </h1>
          <ol class="breadcrumb">
            <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">รายการโรค</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          
          <!-- Your Page Content Here -->

          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-body">
                  <!-- Content Page -->

<?php
     include('../connectAzure.php'); 
?>
<?php
  //*** Add Condition ***//
    if(isset($_POST["hdnCmd"])){
      if($_POST["hdnCmd"] == "Add")
      {
        $strSQL = "INSERT INTO disease ";
        $strSQL .="(name,type) ";
        $strSQL .="VALUES ";
        $strSQL .="('".$_POST["txtAddName"]."','".$_POST["txtAddTypeOfSymptom"]."')";
        $objQuery = mysql_query($strSQL);
        if(!$objQuery)
        {
          echo "Error Save [".mysql_error()."]";
        }
      }
    } 

    //*** Update Condition ***//
    if(isset($_POST["hdnCmd"])){
      if($_POST["hdnCmd"] == "Update")
      {
        $strSQL = "UPDATE disease SET ";
        
        $strSQL .="name = '".$_POST["txtEditName"]."' ";
        $strSQL .=",type = '".$_POST["txtEditTypeOfSymptom"]."' ";
        $strSQL .="WHERE diseaseID = '".$_POST["txtEditdiseaseID"]."' ";
        $objQuery = mysql_query($strSQL);
        if(!$objQuery)
        {
          echo "Error Update [".mysql_error()."]";
        }
      }
    }
    //*** Delete Condition ***//
    if(isset($_GET["Action"])){
      if($_GET["Action"] == "Del")
      {
        $strSQL = "DELETE FROM disease ";
        $strSQL .="WHERE diseaseID = '".$_GET["DisID"]."' ";
        $strSQLdelTreat = "DELETE FROM treatment WHERE diseaseID =".$_GET["DisID"];
        $objQuery = mysql_query($strSQL);
        $objQuerydelTreat = mysql_query($strSQLdelTreat);
        if(!$objQuery)
        {
          echo "Error Delete [".mysql_error()."]";
        }
        if(!$objQuerydelTreat)
        {
          echo "Error Delete [".mysql_error()."]";
        }
      }
    }

    $strSQL = "SELECT * FROM disease";
  $objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");

  ?>

  

<!-- <div class="box-body"> -->

  <form name = "diseaseMN" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
    <input type="hidden" name="hdnCmd" value="">
    <table id="test" class="table table-bordered table-hover">
      <thead>
      <tr>
        <th style="width: 10%;"><div align="center">Disease ID</div></th>
        <th><div align="center">Disease Name</div></th>
        <th><div align="center">Type of Disease</div></th>
        <th style="width: 10%;"><div align="center">Edit</div></th>
        <th style="width: 10%;"><div align="center">Delete</div></th>
      </tr>
      </thead>
      <tbody>
  <?php
    while ($objResult = mysql_fetch_array($objQuery)) {
      
  ?>
  <?php
  //Check Edit Mode
      if(isset($_GET["DisID"]) and isset($_GET["Action"])){
        if($objResult["diseaseID"] == $_GET["DisID"] and $_GET["Action"] == "Edit")
        {
      ?>
      <tr>
        
        <td><input name = "txtEditdiseaseID" type = "hidden" value = "<?php echo $objResult['diseaseID'];?>"><?php echo $objResult['diseaseID'];?></td>
        <td><input name = "txtEditName" type = "text" class="form-control" autofocus value ="<?php echo $objResult['name'];?>"></td>
        <td>
            <select name = "txtEditTypeOfSymptom" class="form-control">
              <option value = "โรคระบบตทางเดินหายใจและโรคติดต่อโดยทางเดินหายใจ" <?php if($objResult["type"]=="โรคระบบตทางเดินหายใจและโรคติดต่อโดยทางเดินหายใจ") echo "selected";?>>โรคระบบตทางเดินหายใจและโรคติดต่อโดยทางเดินหายใจ</option>
              <option value = "โรคระบบทางเดินอาหารและโรคติดต่อโดนทางเดินอาหาร" <?php if($objResult["type"]=="โรคระบบทางเดินอาหารและโรคติดต่อโดนทางเดินอาหาร") echo "selected";?>>โรคระบบทางเดินอาหารและโรคติดต่อโดนทางเดินอาหาร</option>
              <option value = "โรคระบบประสาทและสมอง" <?php if($objResult["type"]=="โรคระบบประสาทและสมอง") echo "selected";?>>โรคระบบประสาทและสมอง</option>
              <option value = "โรคระบบไหลเวียนโลหิตและโรคเลือด" <?php if($objResult["type"]=="โรคระบบไหลเวียนโลหิตและโรคเลือด") echo "selected";?>>โรคระบบไหลเวียนโลหิตและโรคเลือด</option>
              <option value = "โรคระบบกระดูกและกล้ามเนื้อ" <?php if($objResult["type"]=="โรคระบบกระดูกและกล้ามเนื้อ") echo "selected";?>>โรคระบบกระดูกและกล้ามเนื้อ</option>
              <option value = "โรคระบบต่อมไร้ท่อและโภชนาการ" <?php if($objResult["type"]=="โรคระบบต่อมไร้ท่อและโภชนาการ") echo "selected";?>>โรคระบบต่อมไร้ท่อและโภชนาการ</option>
              <option value = "โรคระบบทางเดินปัสสาวะ" <?php if($objResult["type"]=="โรคระบบทางเดินปัสสาวะ") echo "selected";?>>โรคระบบทางเดินปัสสาวะ</option>
              <option value = "โรคระบบอวัยวะสืบพันธุ์ชาย" <?php if($objResult["type"]=="โรคระบบอวัยวะสืบพันธุ์ชาย") echo "selected";?>>โรคระบบอวัยวะสืบพันธุ์ชาย</option>
              <option value = "โรคระบบอวัยวะสืบพันธุ์หญิงและการตั้งครรภ์" <?php if($objResult["type"]=="โรคระบบอวัยวะสืบพันธุ์หญิงและการตั้งครรภ์") echo "selected";?>>โรคระบบอวัยวะสืบพันธุ์หญิงและการตั้งครรภ์</option>
              <option value = "โรคหู" <?php if($objResult["type"]=="โรคหู") echo "selected";?>>โรคหู</option>
              <option value = "โรคตา" <?php if($objResult["type"]=="โรคตา") echo "selected";?>>โรคตา</option>
              <option value = "โรคผิวหนัง" <?php if($objResult["type"]=="โรคผิวหนัง") echo "selected";?>>โรคผิวหนัง</option>
              <option value = "โรคติดต่อทางเพศสัมพันธ์" <?php if($objResult["type"]=="โรคติดต่อทางเพศสัมพันธ์") echo "selected";?>>โรคติดต่อทางเพศสัมพันธ์</option>
              <option value = "โรคที่เกิดจากอุบัติเหตุ สารพิษ และสัตว์พิษ" <?php if($objResult["โรคที่เกิดจากอุบัติเหตุ สารพิษ และสัตว์พิษ"]=="head") echo "selected";?>>โรคที่เกิดจากอุบัติเหตุ สารพิษ และสัตว์พิษ</option>
              <option value = "โรคติดเชื้อ" <?php if($objResult["type"]=="โรคติดเชื้อ") echo "selected";?>>โรคติดเชื้อ</option>
              <option value = "โรคพยาธิ" <?php if($objResult["type"]=="โรคพยาธิ") echo "selected";?>>โรคพยาธิ</option>
              <option value = "โรคมะเร็ง" <?php if($objResult["type"]=="โรคมะเร็ง") echo "selected";?>>โรคมะเร็ง</option>
              <option value = "โรคติดเชื้ออุบัติใหม่" <?php if($objResult["type"]=="โรคติดเชื้ออุบัติใหม่") echo "selected";?>>โรคติดเชื้ออุบัติใหม่</option>
            </select>

        </td>
        <td colspan="2" align="right"><div align="center">
            <input name="btnUpdate" class="btn btn-info" type="button" id="btnUpdate" value="Update" OnClick="diseaseMN.hdnCmd.value='Update';diseaseMN.submit();">
            <input name="btnCancel" class="btn btn-default" type="button" id="btnCancel" value="Cancel" OnClick="window.location='<?php echo $_SERVER["PHP_SELF"];?>';">
        </div></td>
        <td style="display:none;"></td>
      </tr>
  <?php
        }//Edit Mode
        else{//if not edit mode but have Get Variable
      ?>
    <tr id="<?php echo $objResult["diseaseID"];?>">
      <td><?php echo $objResult['diseaseID'];?></td>
      <td><a href = "TreatmentManage.php?diseaseID=<?php echo $objResult['diseaseID'];?>&diseaseName=<?php echo $objResult['name'];?>" > <?php echo $objResult['name'];?></a></td>
      <td><?php echo $objResult['type'];?></td>
     <!--  <td><a href = "<?php echo $_SERVER["PHP_SELF"];?>?Action=Edit&DisID=<?php echo $objResult["diseaseID"];?>">Edit</a></td> -->
      <td><a style="cursor: pointer;" onclick="changeRow('<?php echo $objResult["diseaseID"];?>','<?php echo $objResult['name'];?>','<?php echo $objResult['type'];?>');">Edit</a></td>
      <td><a href="JavaScript:if(confirm('Confirm Delete?')==true){window.location='<?php echo $_SERVER["PHP_SELF"];?>?Action=Del&DisID=<?php echo $objResult["diseaseID"];?>';}">Delete</a></td>
      
    </tr>
  <?php
        }// Else of have GET variable
      }//isset GET Variable
      else// Don't have GET variable
      {
      ?>
    <tr id="<?php echo $objResult["diseaseID"];?>">
      <td><?php echo $objResult['diseaseID'];?></td>
      <td><a href = "TreatmentManage.php?diseaseID=<?php echo $objResult['diseaseID'];?>&diseaseName=<?php echo $objResult['name'];?>" > <?php echo $objResult['name'];?></a></td>
      <td><?php echo $objResult['type'];?></td>
      <!-- <td><a href = "<?php echo $_SERVER["PHP_SELF"];?>?Action=Edit&DisID=<?php echo $objResult["diseaseID"];?>">Edit</a></td> -->
      <td><a style="cursor: pointer;" onclick="changeRow('<?php echo $objResult["diseaseID"];?>','<?php echo $objResult['name'];?>','<?php echo $objResult['type'];?>');">Edit</a></td>
      <td><a href="JavaScript:if(confirm('Confirm Delete?')==true){window.location='<?php echo $_SERVER["PHP_SELF"];?>?Action=Del&DisID=<?php echo $objResult["diseaseID"];?>';}">Delete</a></td>

    </tr>
    <?php
         }
      ?>
    <?php
     
    }
    ?>
        <tr>
          <td><input type= "hidden" name="txtAddDiseaseID" size="5"></td>
          <td><input type="text" class="form-control" name="txtAddName"></td>
          <td>
             <select name = "txtAddTypeOfSymptom" class="form-control">
              <option value = "โรคระบบตทางเดินหายใจและโรคติดต่อโดยทางเดินหายใจ">โรคระบบตทางเดินหายใจและโรคติดต่อโดยทางเดินหายใจ</option>
              <option value = "โรคระบบทางเดินอาหารและโรคติดต่อโดนทางเดินอาหาร">โรคระบบทางเดินอาหารและโรคติดต่อโดนทางเดินอาหาร</option>
              <option value = "โรคระบบประสาทและสมอง">โรคระบบประสาทและสมอง</option>
              <option value = "โรคระบบไหลเวียนโลหิตและโรคเลือด">โรคระบบไหลเวียนโลหิตและโรคเลือด</option>
              <option value = "โรคระบบกระดูกและกล้ามเนื้อ">โรคระบบกระดูกและกล้ามเนื้อ</option>
              <option value = "โรคระบบต่อมไร้ท่อและโภชนาการ">โรคระบบต่อมไร้ท่อและโภชนาการ</option>
              <option value = "โรคระบบทางเดินปัสสาวะ">โรคระบบทางเดินปัสสาวะ</option>
              <option value = "โรคระบบอวัยวะสืบพันธุ์ชาย">โรคระบบอวัยวะสืบพันธุ์ชาย</option>
              <option value = "โรคระบบอวัยวะสืบพันธุ์หญิงและการตั้งครรภ์">โรคระบบอวัยวะสืบพันธุ์หญิงและการตั้งครรภ์</option>
              <option value = "โรคหู">โรคหู</option>
              <option value = "โรคตา">โรคตา</option>
              <option value = "โรคผิวหนัง">โรคผิวหนัง</option>
              <option value = "โรคติดต่อทางเพศสัมพันธ์">โรคติดต่อทางเพศสัมพันธ์</option>
              <option value = "โรคที่เกิดจากอุบัติเหตุ สารพิษ และสัตว์พิษ">โรคที่เกิดจากอุบัติเหตุ สารพิษ และสัตว์พิษ</option>
              <option value = "โรคติดเชื้อ">โรคติดเชื้อ</option>
              <option value = "โรคพยาธิ">โรคพยาธิ</option>
              <option value = "โรคมะเร็ง">โรคมะเร็ง</option>
              <option value = "โรคติดเชื้ออุบัติใหม่">โรคติดเชื้ออุบัติใหม่</option>
            </select>
          </td>
          <td colspan="2" align="right">
            <div align="center">
              <input name="btnAdd" type="button" class="btn btn-success" id="btnAdd" value="Add" OnClick="diseaseMN.hdnCmd.value='Add';diseaseMN.submit();">
            </div>
          </td>
          <td style="display:none;"></td>
        </tr>
      </tbody>
      </table>
  </form>
<!--   </div> --><!-- box-body -->
  <?php
    mysql_close($objConnect);
  ?>




                </div><!-- box-body -->
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
    <!-- DATA TABLES -->
    <script src="../plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="../plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>

    <!-- Select picker -->
    <script type="text/javascript" src="../plugins/selectpicker/js/bootstrap-select.js"></script>

<script>
$(document).ready(function(){
  var table = $('#test').dataTable({
    "iDisplayLength": 25

  });

});

function changeRow(diseaseID,diseaseName,type){
  //alert(diseaseID+diseaseName+type);
  //$('#'+diseaseID).html("<td><input name = 'txtEditdiseaseID' type = 'hidden' value='"+diseaseID+"'>"+diseaseID+"</td><td><input name = 'txtEditName' type = 'text' class='form-control' autofocus value ='"+diseaseName+"'></td><td><select name = 'txtEditTypeOfSymptom' class='form-control'><option value=''>test</option><option value = 'โรคระบบทางเดินหายใจและโรคติดต่อโดยทางเดินหายใจ'"if(type=='โรคระบบตทางเดินหายใจและโรคติดต่อโดยทางเดินหายใจ') document.write('selected');+">โรคระบบตทางเดินหายใจและโรคติดต่อโดยทางเดินหายใจ</option></select></td><td><input type='text' value='Test'></td><td><input type='text' value='Test'></td>");
$.ajax({
        type: "POST",
        url: "dataTableAjax.php",
        data: {diseaseID: diseaseID,diseaseName:diseaseName,type:type,action:"diseaseManageEdit"},
        success: function(result) {
            //alert("result : "+result);
            //$('#'+idNode).html(result);
            //$('#testModal').modal('hide');
            $('#'+diseaseID).html(result);
        }
    });

}
</script>

  </body>
</html>