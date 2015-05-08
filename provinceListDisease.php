<?php 
  $title = "MEDMOB | Province List Disease";
  $page = "Area";
?>
<?php include('header.php');?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="row">
            <div class="col-md-12">
              <h3>
                แสดงโรคในแต่ละจังหวัด
               <!--  <small></small> -->
              </h3>
            </div>
          </div>
        
         <!--  <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
            <li class="active">Here</li>
          </ol> -->
        </section>
        <hr style="border: 3px outset #595955;margin-bottom: 0px;margin-top: 10px;">
        <!-- Main content -->
        <section class="content">
          
          <!-- Your Page Content Here -->

          <div id="row-filter">
            <div class="col-md-4">
              <select name="province" id="province-id" class="form-control">
                <!-- <option value=""></option> -->
                <?php
                  $sqlProvince = "SELECT * FROM province ORDER BY PROVINCE_NAME ASC";
                  $sqlProvinceQuery = mysql_query($sqlProvince);
                  while($sqlProvinceResult = mysql_fetch_array($sqlProvinceQuery))
                    {
                      echo "<option value='".$sqlProvinceResult['PROVINCE_ID']."'>".$sqlProvinceResult['PROVINCE_NAME']."</option>";
                    }

                ?>
              </select>
            </div>
            <div class="col-md-1"></div>          
            <div class="col-md-1" style="text-align: right;"><h4>ปี :</h4></div>
            <div class="col-md-3">
              <select class="form-control" id="sel-year">
                <option value="2015">2558</option>
                <option value="2014">2557</option>
                <option value="2013">2556</option>
                <option value="2012">2555</option>
              </select>
            </div>
          </div><!-- row-filter -->
        
          <!-- Show Chart --> 
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">ภาพรวมของกลุ่มโรค</h3>
                </div><!-- /.box-header -->
                <div class="box-body">             
                 <!--  <div id="chart_div" style="width: 950px; height: 500px;"></div> -->
                  <div id="curve_chart" align="center" style="" ></div>
                </div><!-- /.box-body -->
              </div><!--box-->
            </div>
          </div>

          <!-- Table --> 
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">ภาพรวมของกลุ่มโรค</h3>
                </div><!-- /.box-header -->  
                <div class="box-body" id="table-1"> 
             
                </div><!-- /.box-body -->
              </div><!--box-->
            </div>
          </div>


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

<script>
$(document).ready(function() {
    //console.log( "ready!" );
    //drawBasic();
    drawChart();
    updateValue()
    $('#province-id').change(function(){
      updateValue()

    });

    $('#sel-year').change(function(){
      updateValue()

    });

});

function updateValue(){
  var provinceID = $('#province-id').val();
  var year = $('#sel-year').val();

  //alert(provinceID+year);
  $.ajax({
        type:"POST",
        url: "ajaxProvince.php",
        data: {action: "listDisease" ,typeData: "data-table", provinceID: provinceID,year:year},
        success: function(data) {
            //alert("result : "+result);
            //alert(data);
            $("#table-1").html(data);
          }

      });//ajax
}


</script>


<!-- google chart -->
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">

  google.load('visualization', '1', {packages: ['corechart', 'bar']});
  //google.setOnLoadCallback(drawBasic);

function drawBasic() {

      var data = google.visualization.arrayToDataTable([
        ['City', '2010 Population',],
        ['New York City, NY', 8175000],
        ['Los Angeles, CA', 3792000],
        ['Chicago, IL', 2695000],
        ['Houston, TX', 2099000],
        ['Philadelphia, PA', 1526000],
        ['New York City, NY', 8175000],
        ['New York City, NY', 8175000],
        ['Los Angeles, CA', 3792000],
        ['Chicago, IL', 2695000],
        ['Houston, TX', 2099000],
        ['Philadelphia, PA', 1526000],
        ['New York City, NY', 8175000],
        ['New York City, NY', 8175000],
        ['Los Angeles, CA', 3792000],
        ['Chicago, IL', 2695000],
        ['Houston, TX', 2099000],
        ['Philadelphia, PA', 1526000],
        ['New York City, NY', 8175000]

      ]);

      var options = {
        title: '',
        bar: {groupWidth: "70%"},
        chartArea: {width: '60%',
        height: '90%'},
        hAxis: {
          title: '',
          minValue: 0
        },
        vAxis: {
          title: ''
        }
      };

      var chart = new google.visualization.BarChart(document.getElementById('chart_div'));

      chart.draw(data, options);
    }


    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["โรค", "จำนวน"],
        ["ระบบทางเดินหายใจ", 80],
        ["ระบบทางเดินอาหาร", 49],
        ["ระบบประศาทและสมอง", 30],
        ["ระบบไหลเวียนโลหิต", 45],
        ["ระบบกระดูก", 74],
        ["ระบบต่อมไร้ท่อ", 49],
        ["ระบบทางเดินปัสสาวะ", 30],
        ["โรคหู", 43],
        ["โรคตา", 88],
        ["โรคผิวหนัง", 49],
        ["ติดต่อทาเพศสัมพันธ์", 30],
        ["สารพิษ และสัตว์พิษ", 45],
        ["โรคติดเชื้อ", 78],
        ["โรคพยาธิ", 49],
        ["โรคมะเร็ง", 30],
        ["โรคติดเชื้อุบัติใหม่", 49]
      ]);


      var options = {
        title: "",
        width: 1100,
        height: 500,
        bar: {groupWidth: "65%"},
        legend: { position: "none" },
        hAxis: {titleTextStyle: {color: 'black'}, count: -1, viewWindowMode: 'pretty', slantedText: true}
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("curve_chart"));
      chart.draw(data, options);
  }
   
</script>

<?php include('footer.php');?>