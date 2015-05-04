<?php 
  $title = "MEDMOB | จำนวนผู้ป่วยในแต่ละโรค";
  $page = "Table";
?>

<?php include('header.php');?>
<style>
.modal-wide .modal-dialog {
  width: 80%; /* or whatever you wish */
}

.med-side-nav{
  position: fixed;
  margin-top: -146px;
  width: 17.5%;    
}


/*.nav >li> a{
  position: relative;
  display: block;
  padding: 3px 15px;
}*/
</style>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="row">
            <div class="col-md-7">
              <h3>
                แสดงจำนวนผู้ป่วยในแต่ละโรค
               <!--  <small></small> -->
              </h3>
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
          </div>
        
     <!--      <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
            <li class="active">Here</li>
          </ol> -->
        </section>
        <hr style="border: 3px outset #595955;margin-bottom: 0px;margin-top: 10px;">
        <!-- Main content -->
        <section class="content">
          
          <!-- Your Page Content Here -->
        <div class="row" id="show-disease">
          <div class="col-md-9">
            <div class="row" id="list-disease1">
            <div class="col-md-12">
              <div class="box">
                <!-- Accordion List -->
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                      <div class="panel-heading" role="tab" id="heading1">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1" aria-expanded="true" aria-controls="collapse1">
                            โรคระบบทางเดินหายใจและโรคติดต่อโดยทางเดินหายใจ
                          </a>
                        </h4>
                      </div>
                      <div id="collapse1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading1">
                        <div class="panel-body">
                         
                            <div id="table-disease1">
                              <!-- Return Ajax file: tableListDiseaseAjax.php -->

                            </div><!-- /.box-body -->
                     
                        </div>
                      </div>
                    </div><!-- panel panel-default -->

                    <div class="panel panel-default">
                      <div class="panel-heading" role="tab" id="heading2">
                        <h4 class="panel-title">
                          <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse2" aria-expanded="false" aria-controls="collapse2">
                            โรคระบบทางเดินอาหารและโรคติดต่อโดนทางเดินอาหาร
                          </a>
                        </h4>
                      </div>
                      <div id="collapse2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading2">
                        <div class="panel-body">

                           <div id="table-disease2">
                              <!-- Return Ajax file: tableListDiseaseAjax.php -->

                            </div><!-- /.box-body -->
                     
                        </div>
                      </div>
                    </div><!-- class="panel panel-default" -->
                    
                    <div class="panel panel-default">
                      <div class="panel-heading" role="tab" id="heading3">
                        <h4 class="panel-title">
                          <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse3" aria-expanded="false" aria-controls="collapse3">
                            โรคระบบประสาทและสมอง
                          </a>
                        </h4>
                      </div>
                      <div id="collapse3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading3">
                        <div class="panel-body">

                           <div id="table-disease3">
                              <!-- Return Ajax file: tableListDiseaseAjax.php -->

                            </div><!-- /.box-body -->
                     
                        </div>
                      </div>
                    </div><!-- class="panel panel-default" -->

                    <div class="panel panel-default">
                      <div class="panel-heading" role="tab" id="heading4">
                        <h4 class="panel-title">
                          <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse4" aria-expanded="false" aria-controls="collapse4">
                            โรคระบบไหลเวียนโลหิตและโรคเลือด
                          </a>
                        </h4>
                      </div>
                      <div id="collapse4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading4">
                        <div class="panel-body">

                           <div id="table-disease4">
                              <!-- Return Ajax file: tableListDiseaseAjax.php -->

                            </div><!-- /.box-body -->
                     
                        </div>
                      </div>
                    </div><!-- class="panel panel-default" -->

                    <div class="panel panel-default">
                      <div class="panel-heading" role="tab" id="heading5">
                        <h4 class="panel-title">
                          <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse5" aria-expanded="false" aria-controls="collapse5">
                            โรคระบบกระดูกและกล้ามเนื้อ
                          </a>
                        </h4>
                      </div>
                      <div id="collapse5" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading5">
                        <div class="panel-body">

                           <div id="table-disease5">
                              <!-- Return Ajax file: tableListDiseaseAjax.php -->

                            </div><!-- /.box-body -->
                     
                        </div>
                      </div>
                    </div><!-- class="panel panel-default" -->

                    <div class="panel panel-default">
                      <div class="panel-heading" role="tab" id="heading6">
                        <h4 class="panel-title">
                          <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse6" aria-expanded="false" aria-controls="collapse6">
                            โรคระบบต่อมไร้ท่อและโภชนาการ
                          </a>
                        </h4>
                      </div>
                      <div id="collapse6" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading6">
                        <div class="panel-body">

                           <div id="table-disease6">
                              <!-- Return Ajax file: tableListDiseaseAjax.php -->

                            </div><!-- /.box-body -->
                     
                        </div>
                      </div>
                    </div><!-- class="panel panel-default" -->

                    <div class="panel panel-default">
                      <div class="panel-heading" role="tab" id="heading7">
                        <h4 class="panel-title">
                          <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse7" aria-expanded="false" aria-controls="collapse7">
                            โรคระบบทางเดินปัสสาวะ
                          </a>
                        </h4>
                      </div>
                      <div id="collapse7" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading7">
                        <div class="panel-body">

                           <div id="table-disease5">
                              <!-- Return Ajax file: tableListDiseaseAjax.php -->

                            </div><!-- /.box-body -->
                     
                        </div>
                      </div>
                    </div><!-- class="panel panel-default" -->                    
                  </div><!-- class="panel-group" id="accordion" -->


              </div><!--box-->
            </div><!-- "col-md-12" -->
            </div><!-- list-disease -->

            <!-- <hr style="border-color:#958F8F -moz-use-text-color -moz-use-text-color"> -->


          <div class="row" id="list-disease2">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">โรคระบบทางเดินอาหารและโรคติดต่อโดนทางเดินอาหาร</h3>
                </div><!-- /.box-header -->
                <div class="box-body" id="table-disease2">
                  <!-- Return Ajax file: tableListDiseaseAjax.php -->
                </div><!-- /.box-body -->
              </div><!--box-->
            </div>
          </div><!-- list-disease -->
          
          <!-- <hr style="border-color:#958F8F -moz-use-text-color -moz-use-text-color"> -->
          <div class="row" id="list-disease3">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">โรคระบบประสาทและสมอง</h3>
                </div><!-- /.box-header -->
                <div class="box-body" id="table-disease3">
                  <!-- Return Ajax file: tableListDiseaseAjax.php -->
                </div><!-- /.box-body -->
              </div><!--box-->
            </div>
          </div><!-- list-disease -->

          <!-- <hr style="border-color:#958F8F -moz-use-text-color -moz-use-text-color"> -->
          <div class="row" id="list-disease4">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">โรคระบบไหลเวียนโลหิตและโรคเลือด</h3>
                </div><!-- /.box-header -->
                <div class="box-body" id="table-disease4">
                  <!-- Return Ajax file: tableListDiseaseAjax.php -->
                </div><!-- /.box-body -->
              </div><!--box-->
            </div>
          </div><!-- list-disease -->

          <!-- <hr style="border-color:#958F8F -moz-use-text-color -moz-use-text-color"> -->
          <div class="row" id="list-disease5">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">โรคระบบกระดูกและกล้ามเนื้อ</h3>
                </div><!-- /.box-header -->
                <div class="box-body" id="table-disease5">
                  <!-- Return Ajax file: tableListDiseaseAjax.php -->
                </div><!-- /.box-body -->
              </div><!--box-->
            </div>
          </div><!-- list-disease -->

          <!-- <hr style="border-color:#958F8F -moz-use-text-color -moz-use-text-color"> -->
          <div class="row" id="list-disease6">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">โรคระบบต่อมไร้ท่อและโภชนาการ</h3>
                </div><!-- /.box-header -->
                <div class="box-body" id="table-disease6">
                  <!-- Return Ajax file: tableListDiseaseAjax.php -->
                </div><!-- /.box-body -->
              </div><!--box-->
            </div>
          </div><!-- list-disease -->

          <!-- <hr style="border-color:#958F8F -moz-use-text-color -moz-use-text-color"> -->
          <div class="row" id="list-disease7">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">โรคระบบทางเดินปัสสาวะ</h3>
                </div><!-- /.box-header -->
                <div class="box-body" id="table-disease7">
                  <!-- Return Ajax file: tableListDiseaseAjax.php -->
                </div><!-- /.box-body -->
              </div><!--box-->
            </div>
          </div><!-- list-disease -->

          <!-- <hr style="border-color:#958F8F -moz-use-text-color -moz-use-text-color"> -->
          <div class="row" id="list-disease8">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">โรคหู</h3>
                </div><!-- /.box-header -->
                <div class="box-body" id="table-disease8">
                  <!-- Return Ajax file: tableListDiseaseAjax.php -->
                </div><!-- /.box-body -->
              </div><!--box-->
            </div>
          </div><!-- list-disease -->

          <!-- <hr style="border-color:#958F8F -moz-use-text-color -moz-use-text-color"> -->
          <div class="row" id="list-disease9">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">โรคตา</h3>
                </div><!-- /.box-header -->
                <div class="box-body" id="table-disease9">
                  <!-- Return Ajax file: tableListDiseaseAjax.php -->
                </div><!-- /.box-body -->
              </div><!--box-->
            </div>
          </div><!-- list-disease -->

          <!-- <hr style="border-color:#958F8F -moz-use-text-color -moz-use-text-color"> -->
          <div class="row" id="list-disease10">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">โรคผิวหนัง</h3>
                </div><!-- /.box-header -->
                <div class="box-body" id="table-disease10">
                  <!-- Return Ajax file: tableListDiseaseAjax.php -->
                </div><!-- /.box-body -->
              </div><!--box-->
            </div>
          </div><!-- list-disease -->



          </div><!--Content table col-md9-->

          <div class="col-md-3">
            <div class="box" id="nav-disease">
              <div class="box-body">
                <nav style="" class="med-side-na">
                  <ul class="nav bs-docs-sidenav">
                    <li class=""><a href="#list-disease1" style="padding: 3px 15px;">โรคระบบทางเดินหายใจและโรคติดต่อโดยทางเดินหายใจ</a></li>
                    <li class=""><a href="#list-disease2" style="padding: 3px 15px;">โรคระบบทางเดินอาหารและโรคติดต่อโดนทางเดินอาหาร</a></li>
                    <li class=""><a href="#list-disease3" style="padding: 3px 15px;">โรคระบบประสาทและสมอง</a></li>
                    <li class=""><a href="#list-disease4" style="padding: 3px 15px;">โรคระบบไหลเวียนโลหิตและโรคเลือด</a></li>
                    <li class=""><a href="#list-disease5" style="padding: 3px 15px;">โรคระบบกระดูกและกล้ามเนื้อ</a></li>
                    <li class=""><a href="#list-disease6" style="padding: 3px 15px;" >โรคระบบต่อมไร้ท่อและโภชนาการ</a></li>
                    <li class=""><a href="#list-disease7" style="padding: 3px 15px;">โรคระบบทางเดินปัสสาวะ</a></li>
                 <!--    <li class=""><a href="#list-disease8" style="padding: 3px 15px;">โรคระบบอวัยวะสืบพันธุ์ชาย</a></li>
                    <li class=""><a href="#list-disease9" style="padding: 3px 15px;">โรคระบบอวัยวะสืบพันธุ์หญิงและการตั้งครรภ์</a></li> -->
                    <li class=""><a href="#list-disease10" style="padding: 3px 15px;">โรคหู</a></li>
                    <li class=""><a href="#list-disease11" style="padding: 3px 15px;">โรคตา</a></li>
                    <li class=""><a href="#list-disease12" style="padding: 3px 15px;">โรคผิวหนัง</a></li>
                    <li class=""><a href="#list-disease13" style="padding: 3px 15px;">โรคติดต่อทางเพศสัมพันธ์</a></li>
                    <li class=""><a href="#list-disease14" style="padding: 3px 15px;">โรคที่เกิดจากอุบัติเหตุ สารพิษ และสัตว์พิษ</a></li>
                    <li class=""><a href="#list-disease15" style="padding: 3px 15px;">โรคติดเชื้อ</a></li>
                    <li class=""><a href="#list-disease16" style="padding: 3px 15px;">โรคพยาธิ</a></li>
                    <li class=""><a href="#list-disease17" style="padding: 3px 15px;">โรคมะเร็ง</a></li>
                    <li class=""><a href="#list-disease18" style="padding: 3px 15px;">โรคติดเชื้ออุบัติใหม่</a></li>
                  </ul>
                </nav>                
              </div><!-- box-body -->
            </div><!-- box -->

          </div><!--Nav barcol-md-3-->
        </div><!--row layout-->

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


<!-- Modal -->
<div class="modal fade modal-wide" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><div id="nameHead"></div></h4>
      </div>
      <div class="modal-body">

          <!-- Display Data -->
          <div class="row">
            <div class="col-md-6">
       <!--          <h4>อัตราส่วนระหว่างเพศ</h4>
                <hr/> -->
                <div id="piechart" style="width: 500px; height: 350px;"></div>
            </div>
            <div class="col-md-6">
              <!-- <h4>จำนวนวัยผู้ป่วย</h4>
              <hr/> -->
              <div id="age-chart" style="width: 500px; height: 350px;margin-top:20px;margin-left:-25px"></div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <h4>จังหวัดที่พบผู้ป่วยมาก</h4>
              <hr/>
                <div class="show-table">
                  
                </div><!-- show-table -->
               
            </div>
            <div class="col-md-6">
              <h4>เปรียบเทียบผู้ป่วย5ภาค</h4>
              <hr/>
                <div id="section-chart" style="width: 500px; height: 350px;margin-top:-93px"></div>
            </div>
          </div>

      </div><!-- modal-body -->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div><!-- Modal -->



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

    $(document).ready(function(){
        
        // $(window).on("scroll", function(e){
        //   console.log(this.scrollTop);
        //   if (this.scrollTop > 50) {
        //     $('#nav-disease').addClass("med-side-nav");
        //     alert("test");
        //   } else {
        //     $('#nav-disease').removeClass("med-side-nav");
        //   }
        // });
        // 
        $(window).scroll(function(){
          // console.log($(this).scrollTop());
          var margin_top = $(this).scrollTop();
          if(margin_top >= 146)
          {
            $('#nav-disease').addClass("med-side-nav");
          }
          else $('#nav-disease').removeClass("med-side-nav");
        });

        //Open Modal Detail of each disease
        // $('#disease-1').click(function(){
        //   //alert('test');
        //   $('#myModal').modal('show');
        //   alert("test");

        // });
        
      

        //Table Disease
        updateAllTableDisease();
        //Update when year is changed
        $('#sel-year').change(function(){
          updateAllTableDisease();
          alert($('#sel-year').val());
        });
    });


    //Show Table in Each disease System
    function showTalbeDisease(year,diseaseSystem,tableid){
      $.ajax({
        type:"POST",
        url: "tableListDiseaseAjax.php",
        data: {year: year,diseaseSystem:diseaseSystem},
        beforeSend: function(){
              // $('#'+tableid).html("<img src='dist/img/loading.gif' style='margin-left:37%' >");
              $('#'+tableid).html("<div style='margin-left:50%' >loading...</div>");
        },
        success: function(result) {
            //alert("result : "+result);
            $('#'+tableid).html(result);
        }
      
      });//ajax
    }

    //Update Table All disease
    function updateAllTableDisease(){
      var year = $('#sel-year').val();
      //alert(year);
      showTalbeDisease(year,'โรคระบบตทางเดินหายใจและโรคติดต่อโดยทางเดินหายใจ','table-disease1');
      showTalbeDisease(year,'โรคระบบทางเดินอาหารและโรคติดต่อโดนทางเดินอาหาร','table-disease2');
      showTalbeDisease(year,'โรคระบบประสาทและสมอง','table-disease3');
      // showTalbeDisease(year,'โรคระบบไหลเวียนโลหิตและโรคเลือด','table-disease4');
      // showTalbeDisease(year,'โรคระบบกระดูกและกล้ามเนื้อ','table-disease5');
      // showTalbeDisease(year,'โรคระบบต่อมไร้ท่อและโภชนาการ','table-disease6');
      // showTalbeDisease(year,'โรคระบบทางเดินปัสสาวะ ','table-disease7');
      // showTalbeDisease(year,'โรคหู','table-disease8');
      // showTalbeDisease(year,'โรคตา','table-disease9');
      // showTalbeDisease(year,'โรคผิวหนัง','table-disease10');

    }


    $(document).on("click", ".show-md td a", function(){
        // $('#myModal').modal('show');
        var parent = $(this).parents(".show-md");
        //diseaseID
        var diseaseRow = $(parent).children().eq(0);
        var diseaseValue = diseaseRow[0].childNodes[0].defaultValue;
        var year = $('#sel-year').val();
        // Section Value
        var central = $(parent).children().eq(2).text();
        var north = $(parent).children().eq(3).text();
        var south = $(parent).children().eq(4).text();
        var east = $(parent).children().eq(5).text();
        var west = $(parent).children().eq(6).text();
        var northEast = $(parent).children().eq(7).text();
        //alert(year+ diseaseValue);
        //alert($(central).text()+ $(north).text()+$(south).text() + $(east).text()+ $(west).text()+ $(northEast).text());
   
        $.ajax({
          type:"POST",
          url: "showModalAjax.php",
          data: {action: "listDisease" ,typeData: "data-chart", diseaseID: diseaseValue,year:year},
          success: function(data) {
              //alert("result : "+result);
              var dataArray = $.parseJSON(data);
              var allData = dataArray['AllData'];
              var male = dataArray['Male'];
              var female = dataArray['Female'];
              var age1 = dataArray['age1'];
              var age2 = dataArray['age2'];
              var age3 = dataArray['age3'];
              var age4 = dataArray['age4'];
              drawAge(parseInt(age1),parseInt(age2),parseInt(age3),parseInt(age4));
              drawGender(parseInt(male),parseInt(female));
              drawSection(parseInt(central),parseInt(north),parseInt(south),parseInt(east),parseInt(west),parseInt(northEast));
              $("#nameHead").html($(parent).children().eq(1).text());
              $('#myModal').modal('show');
            }
          });//ajax


          $.ajax({
          type:"POST",
          url: "showModalAjax.php",
          data: {action: "listDisease" ,typeData: "data-table", diseaseID: diseaseValue,year:year},
          beforeSend: function(){
              $('.show-table').html("Loading...");
            },
          success: function(data) {
              //alert("result : "+result);
              //alert(data);
              $(".show-table").html(data);
            }
          
          });//ajax
        //drawAge(10,24,52,15);
        //drawGender(10,5);
        
      });

</script>
<!-- google chart -->
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">

      google.load("visualization", "1", {packages:["corechart"]});
      //google.setOnLoadCallback(drawChart);
      function drawGender(male,female) {

        var data = google.visualization.arrayToDataTable([
          ['เพศ', 'จำนวนผู้ป่วย'],
          ['ชาย',     male],
          ['หญิง',     female]
        ]);


        var options = {
          title: 'อัตราส่วนระหว่างเพศ',
          width:'500',
          height:'400'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
        //var chart1 = new google.visualization.PieChart(document.getElementById('piechart1'));
        chart.draw(data, options);
        //chart1.draw(data, options);
      }

      
      //Age Chart

      //google.load('visualization', '1', {packages: ['corechart', 'bar']});
      //google.setOnLoadCallback(drawBasic);

    function drawAge(age1,age2,age3,age4) {
      var data = google.visualization.arrayToDataTable([
        ['วัย', 'จำนวนผู้ป่วย',],
        ['วัยเด็ก(0-15)', age1],
        ['วัยรุ่น(16-24)', age2],
        ['วัยทำงาน(25-50)', age3],
        ['วัยสูงอายุ(51ขึ้นไป)', age4]
      ]);

      var options = {
        title: 'จำนวนผู้ป่วยแต่ละวัย',
        legend: { position: 'bottom', alignment: 'center' },
        width:'500',
        height:'300',
        chartArea: {width: '50%'},
        hAxis: {
          title: '',
          minValue: 0
        },
        vAxis: {
          title: ''
        }
      };

      var chart = new google.visualization.BarChart(document.getElementById('age-chart'));

      chart.draw(data, options);
    }


  //Compare 6 sections 
    function drawSection(central,north,south,east,west,northEast) {
      var data = google.visualization.arrayToDataTable([
        ["ภาค", "จำนวน"],
        ["กลาง", central],
        ["เหนือ", north],
        ["ใต้", south],
        ["ออก", east],
        ["ตก", west],
        ["อีสาน", northEast],
        // ["กลาง", 0],
        // ["เหนือ", 0],
        // ["ใต้", 0],
        // ["ออก", 0],
        // ["ตก", 0],
        // ["อีสาน", 0]
  
      ]);


      var options = {
        title: "เปรียบเทียบผู้ป่วย6ภาค",
        width: 450,
        height: 370,
        legend: { position: 'bottom', alignment: 'center' },
        bar: {groupWidth: "70%"},
        legend: { position: "none" },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("section-chart"));
      chart.draw(data, options);
  }
    </script>
<?php include('footer.php');?>
