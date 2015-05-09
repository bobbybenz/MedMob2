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
                    <h3 class="box-title">เพิ่มข้อมูลคำถามที่ตอบ:<i><?php if($_GET['typeNode']=="yesNode"){echo "ใช่";}else if($_GET['typeNode']=="noNode"){echo "ไม่ใช่";}?></i></h3>
                    <!-- <h3 class="box-title">เพิ่มคำถามแรกของอาการ</h3> -->
                  </div><!-- /.box-header -->
                  <div class="box-body" id="">
                                        
  

<?php
    include('../connectAzure.php');

    $strSQL = "SELECT * FROM symptomnode AS sn JOIN symptom AS s ON sn.symptomID=s.symptomID 
    WHERE symptomNodeID=".$_GET['symptomNodeID'];
    $objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
    //echo count($objQuery);
    $objResult = mysql_fetch_array($objQuery);
    $typeNode;

    if($_GET['typeNode']== "yesNode"){
      $typeNode="yesNode";
    }
    else if ($_GET['typeNode']== "noNode") {
      $typeNode="noNode";
    }
    else if ($_GET['typeNode']== "rootNode") {
      $typeNode="rootNode";
    }
    $parentNodeID = $objResult['symptomNodeID'];
    $parentNodeQuestion = $objResult['question'];
    $symptomID=$objResult['symptomID'];
    $symptomName=$objResult['name'];
  

?>

  <form class="form-horizontal" id="form-add-node" name = "symptomNodeAdd" method="post" action="SymptomNodeCompute.php">
    <div class="row"><!--Row Header -->
      <div class="col-md-12"><!--Col Header -->


        <input type="hidden" name="hidSymptomID" value=<?php echo $symptomID;?>>
        <input type="hidden" name="hidTypeNode" value=<?php echo $typeNode;?>>
        

    <!--    <div class="form-group" style="margin-top:30px;">
          <label for="InputSymptomName">Symptom Name : </label>
          <input id="InputSymptomName" type="text" name="txtAddSymptom" class="form-control" readonly value=<?php echo $symptomName?>>
        </div> -->  

        <div class="form-group" style="margin-top:30px;">
            <label for="InputSymptomName" class="col-sm-2 control-label" style="text-align:left;">Symptom Name : </label>
            <div class="col-sm-3">
              <input id="InputSymptomName" type="text" name="txtAddSymptom" class="form-control" readonly value=<?php echo $symptomName?>>
            </div>
            <label  class="col-sm-2 control-label">Parent ID: </label>
            <div class="col-sm-2">
              <input class="form-control" input type="text" readonly value=<?php echo $parentNodeID?>>
              <input type="hidden" name="txtAddParentID" value=<?php echo $parentNodeID?>>
            </div>
        </div>
        <!-- Parent ID:<input type="text" readonly value=<?php echo $parentNodeID?>>
        <input type="hidden" name="txtAddParentID" value=<?php echo $parentNodeID?>>
        <br> -->

        <div class="form-group">
          <label class="col-sm-2 control-label" style="text-align:left;">Parent Question:</label>
          <div class="col-sm-5">
            <textarea class="form-control" readonly name="txtAddParentQuestion" row="3" ><?php echo $parentNodeQuestion?></textarea>
          </div>
        </div>
      <!--  Parent Question:<input type="text" readonly name="txtAddParentQuestion" value=<?php echo $parentNodeQuestion?>>
        <br>   -->
      </div><!--End: Col Header -->
      
    </div><!--End: Row Header -->
    
    <input class="check-node-data new-node-data" type="radio" name="chkAddNewType" checked value="newNodeData"><span style="font-size: 18px; font-weight: bold;"> ข้อมูลใหม่</span>
    <hr/>
    <div id="new-node-data-panel">
      <div class="row"><!-- Add data Row-->
        <div class="col-md-1"></div>
        <div class="col-md-10">
          <div class="form-group">
            <label>คำถาม: </label>
            <textarea id="questionID" class="form-control" name ="txtAddQuestion" rows="4"></textarea>
          </div>
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

        </div>  
      </div><!--End: Add data Row -->
    </div><!--End: new-node-data-panel -->
    <hr/>
    <!-- <input type="radio" name="chkAddNewType" value="NodeData">test -->
    <input class="check-node-data have-node-data" type="radio" name="chkAddNewType" value="haveNodeData"><span style="font-size: 18px; font-weight: bold;"> เชื่อมข้อมูลจากโหนดอื่น</span>
    <hr/>
    <div id="have-node-data-panel">
      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">

          <div class="form-group">
            <!-- Value from list of value -->
            <label>คำถามจากรายการ:</label>
            <textarea class="form-control col-sm-5" style="resize:none;" value="" readonly id="question-value" row="2"></textarea>
            <!-- Question: <input type = "text" readonly id="question-value"> -->
            <input class="btn btn-link" type="button" value="คำถาม..." data-toggle="modal" data-target="#list-of-symptomNode-modal">
            <input id="id-link-node" type = "hidden" name ="idLinkNode">
          </div>

        </div>
      </div><!-- row -->
    </div><!-- have-node-data-panel -->
    <hr/>
    <input class="btn btn-success" type="button" name="btnAddSymptomNode" value="เพิ่ม" onclick="questionCheck();">
    <input class="btn btn-danger" type = "button" value ="ยกเลิก" Onclick = "location.href ='SymptomNodeShow.php?symptomID=<?php echo $symptomID;?>'">
  </form>
  


                  </div><!-- box-body -->
              </div><!-- box -->
            </div><!-- col-md-12 -->

          </div><!-- row -->
     




        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

     
    </div><!-- ./wrapper -->


  <!-- Modal for List Symptom Node -->
  <div class="modal fade" id="list-of-symptomNode-modal" tabindex="-1" role="dialog" >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <div class="row">
            <div class="col-md-5">
              
              <h4 class="modal-title" id="myModalLabel">รายการคำถามอาการ: </h4><!-- <span id="sym">-</span> -->
            </div><!-- class="col-md-6" -->
<?php
    $strSQLsymptom = "SELECT * FROM symptom";
    $objQuerysymptom = mysql_query($strSQLsymptom) or die ("Error Query [".$strSQLsymptom."]");
    $showName = NULL;
?>
            <div class="col-md-7">
              <div align="right">
              <select id="select-sym" title="เลือกอาการ" class="selectpicker" data-live-search="true" name="symptomID">
                      <option data-hidden="true" value=""></option>
                  <?php while($objResultSymptom= mysql_fetch_array($objQuerysymptom)){?>
                        <option value="<?php echo $objResultSymptom['symptomID'];?>" >
                          <?php echo $objResultSymptom['name'];?></option>
                  <?php }//while($objQuerysymptom= mysql_fetch_array($objQuery))?>
                  </select>
              <!-- <input type="button" class="btn btn-primary" id="search-btn" value="ค้นหา"> -->
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div><!-- align="right" -->
            </div><!-- class="col-md-6" -->
          </div><!-- class="row" -->
        </div>  <!-- modal-header -->
        <div class="modal-body">
          <div class="show-table">
              
          </div><!-- class="show-table" -->
        </div>  <!-- modal-body -->
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
    <!-- Optionally, you can add Slimscroll and FastClick plugins. 
          Both of these plugins are recommended to enhance the 
          user experience -->


    <script>
      $(document).ready(function(){
        
        //$('#new-node-data-panel').hide();
        $('#have-node-data-panel').hide();
        $('#new-node-data-panel #type-addition-data').hide();

      $('.check-node-data').click(function(){
        if($('.check-node-data.new-node-data').prop('checked')){
          $('#have-node-data-panel').hide();
          $('#new-node-data-panel').fadeIn(500);
          
        }
        else if($('.check-node-data.have-node-data').prop('checked')){
          $('.have-addition-data').removeProp('checked');
          $('#new-node-data-panel #type-addition-data').hide();
          $('#new-node-data-panel').hide();
          $('#have-node-data-panel').fadeIn(500);
          
        } 
      });



      $('.have-addition-data').click(function(){
          if($(this).prop('checked')){
            //is(':checked')){
            $('#type-addition-data').show();
          }
          else{
            $('#type-addition-data').hide();
          }
          
        });

      $('#questionID').focus();

      //Modal 
      $('.choose-button').click(function(){
        var id = $(this).html();
        var disease = $('.'+id+'.question').html();
        //$('#id-link-node').val(id);
        $('input[name="idLinkNode"]').attr('value',id);
        $('#question-value').val(disease);
        $('#list-of-symptomNode-modal').modal('hide');

      });
      $('#modal-table').dataTable();

      //Select madal
    
      // $('#search-btn').click(function(){
      //           // $('#sym').html($('#select-sym').val());
      //           displayModalTable();
      // });


      $(document).on("change","#select-sym", function(){
        displayModalTable();
      });
      
      // if(tempSelect != $('.select-sym').val()){
      //  tempSelect = $('.select-sym').val();
      //  displayModalTable();
      // }

        //    if($('#symptom-list').val() != "a"){
       //                  alert("No data");
       //                  displayModalTable();
       //              }
    
      });//(document).ready

    function questionCheck(){
          
          var q1 = $('#questionID').val();
          var q2 = $('#question-value').val();
          //alert("value"+q1 +" and "+ q2)
          if($('#questionID').val()== "" && $('#question-value').val()== ""){
            alert("กรุณาเพิ่มข้อมูลคำถาม");
          }else{
            $('#form-add-node').submit();
          }

        }

    function displayModalTable(){
        var value = $('#select-sym').val();
        //alert(value);
        $.ajax({
                  type: "POST",
                  url: "showmodaltable.php",
                  data: {data: value},
                  success: function(result) {
                      //alert("result : "+result);
                      $('.show-table').html(result);

                  }
              });
      }
    
    </script>
  </body>
</html>