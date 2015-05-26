<?php 
  $title = "MEDMOB | Main";
  $page = "MAIN";
?>
<?php include('header.php');?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <!--   <h1>
            แสดงแนวโน้มของโรคตามระบบในแต่ละภาค
            <small>Optional description</small>
          </h1> -->
          <div class="row">
            <div class="col-md-6">
              <h3>แสดงแนวโน้มของโรคตามระบบในแต่ละภาค</h3>
            </div>
            <div class="col-md-6"></div>
             <div class="col-md-6">
              <select id="disease-select" style="margin-top: 25px;" class="form-control">
              <option value = "โรคระบบทางเดินหายใจและโรคติดต่อโดยทางเดินหายใจ">โรคระบบทางเดินหายใจและโรคติดต่อโดยทางเดินหายใจ</option>
              <option value = "โรคระบบทางเดินอาหารและโรคติดต่อโดนทางเดินอาหาร">โรคระบบทางเดินอาหารและโรคติดต่อโดนทางเดินอาหาร</option>
              <option value = "โรคระบบประสาทและสมอง">โรคระบบประสาทและสมอง</option>
              <option value = "โรคระบบไหลเวียนโลหิตและโรคเลือด">โรคระบบไหลเวียนโลหิตและโรคเลือด</option>
              <option value = "โรคระบบกระดูกและกล้ามเนื้อ">โรคระบบกระดูกและกล้ามเนื้อ</option>
              <option value = "โรคระบบต่อมไร้ท่อและโภชนาการ">โรคระบบต่อมไร้ท่อและโภชนาการ</option>
              <option value = "โรคระบบทางเดินปัสสาวะ">โรคระบบทางเดินปัสสาวะ</option>
<!--               <option value = "8">โรคระบบอวัยวะสืบพันธุ์ชาย</option>
              <option value = "9">โรคระบบอวัยวะสืบพันธุ์หญิงและการตั้งครรภ์</option> -->
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
            </div><!-- col-md-6-->  
          </div>
          <!-- <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
            <li class="active">Here</li>
          </ol> -->
        </section>
        <hr style="border: 3px outset #595955;margin-bottom: 0px;margin-top: 10px;">
        <!-- Main content -->
        <section class="content">     
          <!-- Your Page Content Here -->
      

      
          
          <div class="row">
            <div class="col-md-12">
              <!-- <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#fa-icons" data-toggle="tab">ภาคกลาง</a></li>
                  <li><a href="#glyphicons" data-toggle="tab">ภาคเหนือ</a></li>
                  <li><a href="#glyphicons" data-toggle="tab">ภาคใต้</a></li>
                  <li><a href="#glyphicons" data-toggle="tab">ภาคตะวันออก</a></li>
                  <li><a href="#glyphicons" data-toggle="tab">ภาคตะวันตก</a></li>
                  <li><a href="#glyphicons" data-toggle="tab">อีสาน</a></li>
                </ul>
              </div>nav-tabs-custom
              
              <div class="tab-content">
                <div class="tab-pane active" id="fa-icons" >
                  <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">โรคระบบต่อมไร้ท่อและโภชนาการ</h3>
                    </div><!-- /.box-header
                    <div class="box-body" id="table-disease6">
                    <!-- Return Ajax file: tableListDiseaseAjax.php
                    </div><!-- /.box-body
                  </div><!--box-->
                </div>
              </div><!-- tab-content -->

              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#central-pane" data-toggle="tab">ภาคกลาง</a></li>
                  <li><a href="#north-pane" data-toggle="tab">ภาคเหนือ</a></li>
                  <li><a href="#south-pane" data-toggle="tab">ภาคใต้</a></li>
                  <li><a href="#east-pane" data-toggle="tab">ภาคตะวันออก</a></li>
                  <li><a href="#west-pane" data-toggle="tab">ภาคตะวันตก</a></li>
                  <li><a href="#northEast-pane" data-toggle="tab">ภาคอีสาน</a></li>
                </ul>

                <!-- Check tag-pane -->
                <input id="tag-pane" type="hidden" value="central">

                <div class="tab-content">
                  <!-- Central Pane-->
                  <div class="tab-pane active" id="central-pane">
                    <div class="box">
                      <div class="box-header">
                        <h3 class="box-title">แสดงแนวโน้มของโรคตามระบบในภาคกลาง</h3>
                      </div><!-- /.box-header -->
                      <div class="box-body" id="">
                      <!-- Return Ajax file: tableListDiseaseAjax.php -->
                      <!-- Content Each Graph -->
                        <div class="row" id="">   
                          <div class="col-md-7">
                            <div id="curve_chart1" style="width: 650px; height: 400px"></div>
                          </div>
                          <div class="col-md-5">
                            <h4>รายการโรคที่พบบ่อย</h4>
                            <div id="table-central"></div>
                            <!--table Content-->
                          </div>
                        </div><!-- trend-chart-central -->

                      </div><!-- /.box-body-->
                    </div><!--box-->
                  </div><!-- contral-pane -->
                  
                  <!-- North-Pane -->
                  <div class="tab-pane" id="north-pane">
                    <div class="box">
                      <div class="box-header">
                        <h3 class="box-title">แสดงแนวโน้มของโรคตามระบบในภาคเหนือ</h3>
                      </div><!-- /.box-header -->
                      <div class="box-body" id="">
                      <!-- Return Ajax file: tableListDiseaseAjax.php -->
                      <!-- Content Each Graph -->
                        <div class="row" id="">   
                          <div class="col-md-7">
                            <div id="curve_chart2" style="width: 650px; height: 400px"></div>
                          </div>
                          <div class="col-md-5">
                            <h4>รายการโรคที่พบบ่อย</h4>
                            <div id="table-north"></div>
                            <!--table Content-->
                          </div>
                        </div><!-- trend-chart-central -->

                      </div><!-- /.box-body-->
                    </div><!--box-->
                  </div><!-- north-pane -->

                   <!-- North-Pane -->
                  <div class="tab-pane" id="south-pane">
                    <div class="box">
                      <div class="box-header">
                        <h3 class="box-title">แสดงแนวโน้มของโรคตามระบบในภาคใต้</h3>
                      </div><!-- /.box-header -->
                      <div class="box-body" id="">
                      <!-- Return Ajax file: tableListDiseaseAjax.php -->
                      <!-- Content Each Graph -->
                        <div class="row" id="">   
                          <div class="col-md-7">
                            <div id="curve_chart3" style="width: 650px; height: 400px"></div>
                          </div>
                          <div class="col-md-5">
                            <h4>รายการโรคที่พบบ่อย</h4>
                            <div id="table-south"></div>
                            <!--table Content-->
                          </div>
                        </div><!-- trend-chart-central -->

                      </div><!-- /.box-body-->
                    </div><!--box-->
                  </div><!-- south-pane -->

                   <!-- North-Pane -->
                  <div class="tab-pane" id="east-pane">
                    <div class="box">
                      <div class="box-header">
                        <h3 class="box-title">แสดงแนวโน้มของโรคตามระบบในตะวันออก</h3>
                      </div><!-- /.box-header -->
                      <div class="box-body" id="">
                      <!-- Return Ajax file: tableListDiseaseAjax.php -->
                      <!-- Content Each Graph -->
                        <div class="row" id="">   
                          <div class="col-md-7">
                            <div id="curve_chart4" style="width: 650px; height: 400px"></div>
                          </div>
                          <div class="col-md-5">
                            <h4>รายการโรคที่พบบ่อย</h4>
                            <div id="table-east"></div>
                            <!--table Content-->
                          </div>
                        </div><!-- trend-chart-central -->

                      </div><!-- /.box-body-->
                    </div><!--box-->
                  </div><!-- east-pane -->

                   <!-- North-Pane -->
                  <div class="tab-pane" id="west-pane">
                    <div class="box">
                      <div class="box-header">
                        <h3 class="box-title">แสดงแนวโน้มของโรคตามระบบในตะวันตก</h3>
                      </div><!-- /.box-header -->
                      <div class="box-body" id="">
                      <!-- Return Ajax file: tableListDiseaseAjax.php -->
                      <!-- Content Each Graph -->
                        <div class="row" id="">   
                          <div class="col-md-7">
                            <div id="curve_chart5" style="width: 650px; height: 400px"></div>
                          </div>
                          <div class="col-md-5">
                            <h4>รายการโรคที่พบบ่อย</h4>
                            <div id="table-west"></div>
                            <!--table Content-->
                          </div>
                        </div><!-- trend-chart-central -->

                      </div><!-- /.box-body-->
                    </div><!--box-->
                  </div><!-- west-pane -->

                   <!-- North-Pane -->
                  <div class="tab-pane" id="northEast-pane">              
                    <div class="box">
                      <div class="box-header">
                        <h3 class="box-title">แสดงแนวโน้มของโรคตามระบบในตะวันออกเฉียงเหนือ</h3>
                      </div><!-- /.box-header -->
                      <div class="box-body" id="">
                      <!-- Return Ajax file: tableListDiseaseAjax.php -->
                      <!-- Content Each Graph -->
                        <div class="row" id="">   
                          <div class="col-md-7">
                            <div id="curve_chart6" style="width: 650px; height: 400px"></div>
                          </div>
                          <div class="col-md-5">
                            <h4>รายการโรคที่พบบ่อย</h4>
                            <div id="table-northEast"></div>
                            <!--table Content-->
                          </div>
                        </div><!-- trend-chart-central -->

                      </div><!-- /.box-body-->
                    </div><!--box-->
                  </div><!-- northEast-pane -->




                </div><!-- tab-content -->
              </div><!-- nav-tabs-custom -->

            </div><!-- col-md-12 -->
          </div><!-- row -->
          



        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <!-- Main Footer -->
      <!-- <footer class="main-footer"> -->
        <!-- To the right -->
        <!-- <div class="pull-right hidden-xs"> -->
         
        <!-- </div> -->
        <!-- Default to the left --> 
      <!-- </footer> -->

    </div><!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->
    
    <!-- jQuery 2.1.3 -->
    <script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js" type="text/javascript"></script>
    
    <!-- Optionally, you can add Slimscroll and FastClick plugins. 
          Both of these plugins are recommended to enhance the 
          user experience -->

<!-- Google Chart -->
<script type="text/javascript"
          src="https://www.google.com/jsapi?autoload={
            'modules':[{
              'name':'visualization',
              'version':'1',
              'packages':['corechart']
            }]
          }"></script>

    <script type="text/javascript">
      //google.setOnLoadCallback(drawChart);

      function drawChart(curve_chartID,diseaseSys,year1,year2,year3,year4,year5) {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'จำนวนคนป่วย(คน)'],
          ['2553',  year1],
          ['2554',  year2],
          ['2555',  year3],
          ['2556',  year4],
          ['2557',  year5]
        ]);
        var disease = diseaseSys
        var options = {
          title: 'แนวโน้ม'+disease,
          width: 650,
          height: 400,
          //backgroundColor: '#ECF0F5',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart1 = new google.visualization.LineChart(document.getElementById(curve_chartID));
        chart1.draw(data, options);

      }
    </script>
<script>

  $(document).ready(function(){
      //Change Tab Section
      //drawChart('curve_chart1',"โรคระบบทางเดินหายใจและโรคติดต่อโดยทางเดินหายใจ",1000,1170,660,1030,900);
      var disease1 = $("#disease-select").val();
      updateAllGraph(disease1);
      updateTable("central","table-central");

      $('#disease-select').change(function(){
        //alert($('#disease-select').val());
        //updateTable();
        var disease = $('#disease-select').val();
        var pane = $("#tag-pane").val();
        updateTable(pane,"table-"+pane);
        updateAllGraph(disease);
      });

  });

  function updateTable(section,tableID){
    var diseaseSys = $('#disease-select').val();
    var section = $('#tag-pane').val();
    $.ajax({
      type:"POST",
      url : "ajaxMain.php",
      data : {action:"listDisease", diseaseSys : diseaseSys, section,section},
      success: function(data) {
          //alert("result : "+result);
          //alert(data);
          $("#"+tableID).html(data);
        }
    });

  }

  function updateAllGraph(diseaseSys){
    //var sys = $('#disease-select').val();
    //call Ajax for get Value Graph
    var section = $('#tag-pane').val();
    $.ajax({
        type:"POST",
        url: "ajaxMain.php",
        data: {action: "chart" , diseaseSys: diseaseSys,section:section},
        success: function(data) {
            //alert(data);
            var dataArray = $.parseJSON(data);
            var chartID;
            if(section == "central"){
              chartID = 'curve_chart1';
            }
            else if(section == "north"){
              chartID = "curve_chart2";
            }
            else if(section == "south"){
              chartID = "curve_chart3";
            }
            else if(section == "east"){
              chartID = "curve_chart4";
            }
            else if(section == "west"){
              chartID = "curve_chart5";
            }
            else if(section == "northEast"){
              chartID = "curve_chart6";
            }
            drawChart(chartID,diseaseSys,parseInt(dataArray['2553']),parseInt(dataArray['2554']),parseInt(dataArray['2555']),parseInt(dataArray['2556']),parseInt(dataArray['2557']));
            // drawChart('curve_chart3',diseaseSys,700,1170,660,1030,900);
            // drawChart('curve_chart4',diseaseSys,600,1170,660,1030,900);
            // drawChart('curve_chart5',diseaseSys,500,1170,660,1030,900);
            // drawChart('curve_chart6',diseaseSys,400,1170,660,1030,900);
          }

    });//ajax

    
  }

 
  $(document).on("click",".nav.nav-tabs li a",function(){
    var sectionA  = $(this);
    var diseaseSys = $('#disease-select').val();
    //alert(sectionA[0].hash);
    if(sectionA[0].hash=="#central-pane"){
      $("#tag-pane").val("central");
      updateTable("central","table-central");
      //drawChart('curve_chart1',diseaseSys,1000,333,1111,130,900);
    }
    else if(sectionA[0].hash=="#north-pane"){
      $("#tag-pane").val("north");
      updateTable("north","table-north");
      //drawChart('curve_chart2',diseaseSys,1000,1170,660,1030,900);

    }
    else if(sectionA[0].hash=="#south-pane"){
      $("#tag-pane").val("south");
      updateTable("south","table-south");
      //drawChart('curve_chart3',diseaseSys,700,770,660,730,700);
    }
    else if(sectionA[0].hash=="#east-pane"){
      $("#tag-pane").val("east");
      updateTable("east","table-east");
      //drawChart('curve_chart4',diseaseSys,1200,1170,660,1030,900);
    }
    else if(sectionA[0].hash=="#west-pane"){
      $("#tag-pane").val("west");
      updateTable("west","table-west");
      //drawChart('curve_chart5',diseaseSys,1000,910,660,930,900);
    }
    else if(sectionA[0].hash=="#northEast-pane"){
      $("#tag-pane").val("northEast");
      updateTable("northEast","table-northEast");
      //drawChart('curve_chart6',diseaseSys,1000,1170,760,1030,900);
    }
    updateAllGraph(diseaseSys);
    //alert($("#tag-pane").val());

  });
</script>

<?php include('footer.php');?>