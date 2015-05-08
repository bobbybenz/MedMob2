<?php 
  $title = "MEDMOB | จัดการข้อมูล";
  $page = "symptom";
?>
<?php include('header_dash.php');?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            รายการลักษณะอาการ
            <!-- <small>Optional description</small> -->
          </h1>
          <ol class="breadcrumb">
            <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">รายการลักษณะอาการ</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          
          <!-- Your Page Content Here -->

          <div class="row">
            <div class="col-md-12">
              <div class="box">
               <!-- Content Page -->

  <?php
    include('../connectAzure.php');
    //*** Add Condition ***//
    if(isset($_POST["hdnCmd"])){
      if($_POST["hdnCmd"] == "Add")
      {
        $strSQL = "INSERT INTO symptom ";
        $strSQL .="(name,flowNumber,partOfBody) ";
        $strSQL .="VALUES ";
        $strSQL .="('".$_POST["txtAddName"]."','".$_POST["txtAddFlowNumber"]."','".$_POST["txtAddPartOfBody"]."')";
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
        $strSQL = "UPDATE symptom SET ";
        
        $strSQL .="name = '".$_POST["txtEditName"]."' ";
        $strSQL .=",flowNumber = '".$_POST["txtEditFlowNumber"]."' ";
        $strSQL .=",partOfBody = '".$_POST["txtEditPartOfBody"]."' ";
        $strSQL .="WHERE symptomID = '".$_POST["txtEditsymptomID"]."' ";
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
        $strSQL = "DELETE FROM symptom ";
        $strSQL .="WHERE symptomID = '".$_GET["SymID"]."' ";
        $objQuery = mysql_query($strSQL);
        if(!$objQuery)
        {
          echo "Error Delete [".mysql_error()."]";
        }
      }
    }

    $strSQL = "SELECT * FROM symptom";
    $objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
  ?>


  

  <div class="box-body">
    <form name="symptomMN" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
      <input type="hidden" name="hdnCmd" value="">
      <table id="data-sym" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th > <div align="center">Symptom ID </div></th>
          <th > <div align="center">Symptom Name </div></th>
          <th > <div align="center">Flow Number</div></th>
          <th > <div align="center">Part Of Body</div></th>
          <th > <div align="center">Edit </div></th>
          <th > <div align="center">Delete </div></th>
        </tr>
        </thead>
        <tbody>
    <?php
      while($objResult = mysql_fetch_array($objQuery))
      {
    ?>
      
      <?php
      if(isset($_GET["SymID"]) and isset($_GET["Action"])){
        if($objResult["symptomID"] == $_GET["SymID"] and $_GET["Action"] == "Edit")
        {
      ?>
      <tr>
          <td><div align="center">
          <input type="hidden" name="txtEditsymptomID" size="5" value="<?php echo $objResult["symptomID"];?>"><?php echo $objResult["symptomID"];?></td>
          <td><input type="text" name="txtEditName" class="form-control" autofocus value="<?php echo $objResult["name"];?>"></td>
          <td><input type="text" name="txtEditFlowNumber" class="form-control" value="<?php echo $objResult["flowNumber"];?>"></td>
          <td>   
            <select name = "txtEditPartOfBody" class="selectpicker">
              <option value = "head" <?php if($objResult["partOfBody"]=="head") echo "selected";?> >Head</option>
              <option value = "body" <?php if($objResult["partOfBody"]=="body") echo "selected";?> >Body</option>
              <option value = "arm_leg" <?php if($objResult["partOfBody"]=="arm_leg") echo "selected";?>>Arm / Leg</option>
              <option value = "skin" <?php if($objResult["partOfBody"]=="skin") echo "selected";?>>Skin</option>
            </select>
          </td>
          <td colspan="2" align="right"><div align="center">
            <input name="btnUpdate" class="btn btn-info" type="button" id="btnUpdate" value="Update" OnClick="symptomMN.hdnCmd.value='Update';symptomMN.submit();">
            <input name="btnCancel" class="btn btn-default" type="button" id="btnCancel" value="Cancel" OnClick="window.location='<?php echo $_SERVER["PHP_SELF"];?>';">
          </div></td>
          <td style="display:none;"></td>
      </tr> 
      <?php
        }
        else{
      ?>
        <tr id="<?php echo $objResult['symptomID'];?>">
          <td><div align="center"><?php echo $objResult["symptomID"];?></div></td>
          <td><?php echo $objResult["name"];?></td>
          <td><?php echo $objResult["flowNumber"];?></td>
          <td><div align="center"><?php echo $objResult["partOfBody"];?></div></td>
         <!--  <td align="center"><a href="<?php echo $_SERVER["PHP_SELF"];?>?Action=Edit&SymID=<?php echo $objResult["symptomID"];?>">Edit</a></td> -->
          <td><a style="cursor: pointer;" onclick="changeRow('<?php echo $objResult["symptomID"];?>','<?php echo $objResult['name'];?>','<?php echo $objResult['flowNumber'];?>','<?php echo $objResult["partOfBody"];?>');">Edit</a></td>
          <td align="center"><a href="JavaScript:if(confirm('Confirm Delete?')==true){window.location='<?php echo $_SERVER["PHP_SELF"];?>?Action=Del&SymID=<?php echo $objResult["symptomID"];?>';}">Delete</a></td>
        </tr>
        <?php
        }// Else of have GET variable
      }//isset GET Variable
      else// Don't have GET variable
      {
      ?>
   
        <tr id="<?php echo $objResult['symptomID'];?>">
          <td><div align="center"><?php echo $objResult["symptomID"];?></div></td>
          <td><?php echo $objResult["name"];?></td>
          <td><?php echo $objResult["flowNumber"];?></td>
          <td><div align="center"><?php echo $objResult["partOfBody"];?></div></td>
          <!-- <td align="center"><a href="<?php echo $_SERVER["PHP_SELF"];?>?Action=Edit&SymID=<?php echo $objResult["symptomID"];?>">Edit</a></td> -->
          <td><a style="cursor: pointer;" onclick="changeRow('<?php echo $objResult["symptomID"];?>','<?php echo $objResult['name'];?>','<?php echo $objResult['flowNumber'];?>','<?php echo $objResult["partOfBody"];?>');">Edit</a></td>
          <td align="center"><a href="JavaScript:if(confirm('Confirm Delete?')==true){window.location='<?php echo $_SERVER["PHP_SELF"];?>?Action=Del&SymID=<?php echo $objResult["symptomID"];?>';}">Delete</a></td>
        </tr>
      
      <?php
         }
      ?>
    <?php
     
    }
    ?>
        <tr>
          <td><div align="center"><input type= "hidden" name="txtAddsymptomID" size="5"></div></td>
          <td><input type="text" name="txtAddName" class="form-control"></td>
          <td><input type="text" name="txtAddFlowNumber" class="form-control"></td>
          <td>
            <select name = "txtAddPartOfBody" class="selectpicker">
              <option value = "head">Head</option>
              <option value = "body">Body</option>
              <option value = "arm_leg">Arm / Leg</option>
              <option value = "skin">Skin</option>
            </select>
          </td>
          <td colspan="2" align="right">
            <div align="center">
              <input name="btnAdd" type="button" id="btnAdd" value="Add" class="btn btn-success" OnClick="symptomMN.hdnCmd.value='Add';symptomMN.submit();">
            </div>
          </td>
          <td style="display:none;"></td>
        </tr>
        </tbody>
      </table>
    </form>
  </div><!--container-->
    <?php
    mysql_close($objConnect);

    ?>

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

  $('#data-sym').dataTable({
    "iDisplayLength": 25
  });
 

});


function changeRow(symptomID,name,flowNumber,partOfBody){
  //alert(symptomID+name+flowNumber,partOfBody);
  //$('#'+diseaseID).html("<td><input name = 'txtEditdiseaseID' type = 'hidden' value='"+diseaseID+"'>"+diseaseID+"</td><td><input name = 'txtEditName' type = 'text' class='form-control' autofocus value ='"+diseaseName+"'></td><td><select name = 'txtEditTypeOfSymptom' class='form-control'><option value=''>test</option><option value = 'โรคระบบทางเดินหายใจและโรคติดต่อโดยทางเดินหายใจ'"if(type=='โรคระบบตทางเดินหายใจและโรคติดต่อโดยทางเดินหายใจ') document.write('selected');+">โรคระบบตทางเดินหายใจและโรคติดต่อโดยทางเดินหายใจ</option></select></td><td><input type='text' value='Test'></td><td><input type='text' value='Test'></td>");
$.ajax({
        type: "POST",
        url: "dataTableAjax.php",
        data: {symptomID: symptomID,name:name,flowNumber:flowNumber,partOfBody:partOfBody,action:"symptomManageEdit"},
        success: function(result) {
            //alert("result : "+result);
            //$('#'+idNode).html(result);
            //$('#testModal').modal('hide');
            $('#'+symptomID).html(result);
        }
    });

}

</script>

  </body>
</html>