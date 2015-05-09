<?php 
  $title = "MEDMOB | จัดการข้อมูล";
  $page = "question";
?>
<?php include('header_dash.php');?>


      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            เพิ่มข้อมูลคำถาม
            <!-- <small>ปวดท้อง</small> -->
          </h1>
          <ol class="breadcrumb">
            <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active"><a href="SymptomNodeShow.php">รายการคำถามของอาการ</a></li>
            <li class="active">เพิ่มข้อมูลคำถาม</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          
          <!-- Your Page Content Here -->

          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header">
                    <!-- <h3 class="box-title">เพิ่มข้อมูลคำถามที่ตอบ: ใช่</h3> -->
                    <h3 class="box-title">เพิ่มคำถามแรกของอาการ</h3>
                  </div><!-- /.box-header -->
                  <div class="box-body" id="">
 <?php                   
    include('../connectAzure.php');
    $strSQL = "SELECT * FROM Symptom WHERE symptomID=".$_GET['symptomID'];
    $objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
    $objResult = mysql_fetch_array($objQuery);

?>

  <div class="row">
    <div class="col-md-12">
    <form method="POST" id="form-add-node" action="SymptomNodeCompute.php">
      <div class="form-group">
        <input type="hidden" name="hidTypeNode" value="rootNode">
        <input type="hidden" name="hidAddRoot" value="addRoot">
        <input type="hidden" name="hidSymptomID" value="<?php echo $objResult['symptomID'];?>">
        <label for="systomNameTxt">Symptom Name</label>
        <input type="text" readonly class="form-control" id="systomNameTxt" value="<?php echo $objResult['name'];?>">
      </div>
      <div class="form-group">
        <label for="questionTxt">Question</label>
        <!-- <input type="text" class="form-control" id="questionTxt" name="questionTxt"> -->
        <textarea class="form-control" id="questionTxt" name="questionTxt" row="2"></textarea>
      </div>

      <div class="checkbox">
        <label>
      <!-- <input class="have-addition-data" type = "checkbox" name = "chkAdditionData">Have Addition Data
      </label>
      <div id="type-addition-data">
        Type Addition Data: 
        <select name="slcTypeAdditionData">
          <option>อุณหภูมิ</option>
          <option>ความดัน</option>
          <option>เพศชาย</option>
          <option>เพศหญิง</option>
          <option>ชีพจร</option>
        </select>
      </div><!-- type-addition-data -->
      <input class="have-addition-data" type = "checkbox" name = "chkAdditionData">ข้อมูลเพิ่มเติม
      <br>
      <div id="type-addition-data">
        ประเภทของข้อมูลเพิ่มเติม: 
        <select name="slcTypeAdditionData" class="selectpicker">
          <option>อุณหภูมิ</option>
          <option>ความดัน</option>
          <option>เพศชาย</option>
          <option>เพศหญิง</option>
          <option>ชีพจร</option>  
        </select>
      </div><!-- End: type-addition-data -->
      </div><!-- checkbox -->


      <input type="button" class="btn btn-success" value="เพิ่ม" onclick="questionCheck();">
      <input type = "button" class="btn btn-danger" value ="Back" Onclick = "location.href ='SymptomNodeShow.php'">
    </form>
    </div>
  </div>
  



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
    
    <!-- Select picker -->
    <script type="text/javascript" src="../plugins/selectpicker/js/bootstrap-select.js"></script>

<script>
  $(document).ready(function(){
    $('#type-addition-data').hide();
    $('.have-addition-data').click(function(){
      if($('.have-addition-data').prop('checked')){
        $('#type-addition-data').show();
      }else{
        $('#type-addition-data').hide();
      }
    });

    $('#questionTxt').focus();
  });

  function questionCheck(){
    if($('#questionTxt').val() == ""){
      alert("กรุณาเพิ่มข้อมูลคำถาม");
    }else{
      $('form#form-add-node').submit();
    }
  }
</script>
    <!-- Optionally, you can add Slimscroll and FastClick plugins. 
          Both of these plugins are recommended to enhance the 
          user experience -->
  </body>
</html>