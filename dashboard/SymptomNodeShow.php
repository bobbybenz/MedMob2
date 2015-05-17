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
            รายการคำถามของอาการ
            <!-- <small>ปวดท้อง</small> -->
          </h1>
          <ol class="breadcrumb">
            <li><a href="dashboard.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">รายการคำถามของอาการ</li>
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
    
    //check ID
    if(isset($_GET['symptomID'])){
        if($_GET['symptomID']!=""){
            $sqlCheck = "SELECT count(*) FROM symptom WHERE symptomID =".$_GET['symptomID'];
            $objQueryCheck = mysql_query($sqlCheck) or die ("Error Query [".$sqlCheck."]");
            $dataArray = mysql_fetch_array($objQueryCheck);
            $exist  = $dataArray['count(*)'];
            //echo($exist);
            if($exist == '0'){
        ?>
                <script>window.location = "SymptomNodeShow.php"</script>
    <?php
            }
      }//End: if($_GET['symptomID']!=""
    }//End: isset($_GET['symptomID'])
   
?>
<?php
    $strSQLsymptom = "SELECT * FROM symptom";
    $objQuerysymptom = mysql_query($strSQLsymptom) or die ("Error Query [".$strSQLsymptom."]");
    $showName = NULL;
?>
        <div class="row">
            <div class="col-md-12">
            <div class="searchSynptom" align="right">
            <form id="symptom-update" method="GET">
                <select id="symptom-list" title="เลือกอาการ" class="selectpicker" data-live-search="true" name="symptomID">
                    <option data-hidden="true" value=""></option>
                <?php while($objResultSymptom= mysql_fetch_array($objQuerysymptom)){?>
                      <option value="<?php echo $objResultSymptom['symptomID'];?>" 
                        <?php //keep the recent selector
                        if(isset($_GET['symptomID'])){
                            if($_GET['symptomID']==$objResultSymptom['symptomID']) {
                            echo "selected";
                            $symptomID = $objResultSymptom['symptomID'];
                            $showName = $objResultSymptom['name'];
                            }
                        }
                        ?>>
                        <?php echo $objResultSymptom['name'];?></option>
                <?php }//while($objQuerysymptom= mysql_fetch_array($objQuery))?>
                </select>
                <!-- <input type="submit" class="btn btn-primary" value="ค้นหา"> -->
            </form>
            </div><!-- class="searchSynptom" -->
            </div><!-- class="col-md-12" -->
        </div><!-- class="row" -->

        <div class="row">
            <div class="col-md-12">
                <h3>อาการ: <i><?php if($showName!=NULL){echo $showName;}else{echo "-";}?></i></h3>
                <hr/>
            </div>

        </div>

<?php
    //Create Array
    $DataArray = array();
    $TreeArray = array();
?>

    <div class="row"><!-- Show Tree -->
        <div class="col-md-12">
    <?php
    if(isset($_GET['symptomID'])){
       if($_GET['symptomID']!=""){
       

        $strSQL = "SELECT * FROM symptomnode WHERE symptomID = ".$_GET['symptomID']." ORDER BY isYesNode DESC";
        $objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
        $count =-1;
        $existData = 0;
        //echo "Test :".$objQuery."<br>";
    while($objResult= mysql_fetch_array($objQuery)){
        $existData = 1;
        
        ?>
        <!-- <span  class="glyphicon glyphicon-edit" style="cursor: pointer;" Onclick="openModal('<?php echo $objResult['symptomNodeID'];?>')"></span> -->
        <?php
        // $count++;
        $DataArray[] = array(
            'symptomNodeID' => $objResult['symptomNodeID'],
            'symptomID' => $objResult['symptomID'],
            'isRoot' => $objResult['isRoot'],
            'isYesNode' => $objResult['isYesNode'],
            'isNoNode' => $objResult['isNoNode'],
            'question' => $objResult['question'],
            'yesNodeID' => $objResult['yesNodeID'],
            'noNodeID' => $objResult['noNodeID'],
            'parentNodeID' => $objResult['parentNodeID'],
            'haveAdditionData' => $objResult['haveAdditionData'],
            'typeAdditionData' => $objResult['typeAdditionData']
            );
        $TreeArray[$objResult['symptomNodeID']] = $objResult['parentNodeID'];
        
       
        }//while($objResult= mysql_fetch_array($objQuery))
    if($existData==0){
        ?>
        <input type='button' value='Add Root Node' 
            Onclick='JavaScript:
            location.href = "SymptomNodeAddRoot.php?symptomID=<?php echo $symptomID;?>";
            '>
        <?php
        }//END:if($existData==0)
        else{
            echo("<div id='bitree'>");
                printtree(parseTree($TreeArray,$TreeArray),$DataArray);
            echo("</div>");
        }
    }//END:$_GET['symptomID']!=""
}//Isset Get
else{//Donothing
    //echo "string";
}
  ?>
    </div>
</div>



<?php
    //Function Create Tree 
    function parseTree($tree,$temp, $root = 0) {
 
    $return = array();
    # Traverse the tree and search for direct children of the root
    foreach($tree as $child => $parent) {
        # A direct child is found
        if($parent == $root) {
           
            # Append the child into result array and parse its children
            $return[] = array(
                'name' => $child,
                'index' => array_search($child,array_keys($temp)), 
                'children' => parseTree($tree,$temp, $child)
            );
            # Remove item from tree (we don't need to traverse this again)
            unset($tree[$child]);
        }
    }
    return empty($return) ? null : $return;    
}

function printtree($tree,$DataArray) {
    if(!is_null($tree) && count($tree) > 0) {
        echo '<ul>';
        foreach($tree as $node) {
            //echo '<li>'.$node['name']."-index:".$node['index'];
    ?>
        <li>
            <?php if($DataArray[$node['index']]['isYesNode']==1){echo '<img src="../dist/img/yesIcon.png" style="width: 22px; margin-bottom: 5px;"/> ';}?>
            <?php if($DataArray[$node['index']]['isNoNode']==1){echo '<img src="../dist/img/noIcon.png" style="width: 22px; margin-bottom: 5px;"/>';}?>
            <span  class="glyphicon glyphicon-edit" style="cursor: pointer;" Onclick="openModal('<?php echo $DataArray[$node['index']]['symptomNodeID'];?>');"></span>
            <span id='<?php echo $DataArray[$node['index']]['symptomNodeID'];?>'><?php echo $DataArray[$node['index']]['question'];?></span>
            <input id="haveAdditionData<?php echo $DataArray[$node['index']]['symptomNodeID'];?>" type="hidden" value="<?php echo $DataArray[$node['index']]['haveAdditionData'];?>">
            <input id="typeAdditionData<?php echo $DataArray[$node['index']]['symptomNodeID'];?>" type="hidden" value="<?php echo $DataArray[$node['index']]['typeAdditionData'];?>">
    <?php
        //Check Add Yes Node
        if($DataArray[$node['index']]['yesNodeID'] ==null){
            // echo "<input type='button' value='Yes Node' Onclick='JavaScript:alert(".$objResult['symptomNodeID'].")' >";  
        ?>
            <button style ="height:30;margin:3px;" class="btn btn-success" type="button" Onclick='JavaScript:
            goToSymptomNodeAdd("yesNode","<?php echo $DataArray[$node['index']]['symptomNodeID'];?>");
            '><span class="glyphicon glyphicon-ok-circle"></span> Yes Node</button>
           <!--  <input class="" type='button' value='Yes Node' 
            Onclick='JavaScript:
            goToSymptomNodeAdd("yesNode","<?php echo $DataArray[$node['index']]['symptomNodeID'];?>");
            '> -->
        <?php
        }//if($DataArray[$node['index']['yesNodeID'] ==null)

        //Check Add No Node
        if($DataArray[$node['index']]['noNodeID'] ==null){
        ?>
            
            <button style ="height:30;margin:3px" class="btn btn-danger" type="button" Onclick='JavaScript:
            goToSymptomNodeAdd("noNode","<?php echo $DataArray[$node['index']]['symptomNodeID'];?>");
            '><span class="glyphicon glyphicon-remove-circle"></span> No Node</button>
   

        <?php
        }//if($DataArray[$node['index']['noNodeID'] ==null)
        
        //if Last No of Symptom, I will be added disease.
        if($DataArray[$node['index']]['yesNodeID'] ==null && $DataArray[$node['index']]['noNodeID'] ==null){
            $strSQLCheck = "SELECT * FROM diseaseofsymptom WHERE symptomNodeID=".$DataArray[$node['index']]['symptomNodeID'];
            $objQueryCheck = mysql_query($strSQLCheck);
            $result = mysql_fetch_array($objQueryCheck);           

            if($result==null){
                       
    ?>
        <a href = "DiseaseOfSymptomNodeManage.php?symptomNodeID=<?php echo $DataArray[$node['index']]['symptomNodeID'];?>&type=Add" >เพิ่มโรค</a> |
        <a onclick="if(confirm('คุณแน่ใจที่จะลบคำถามนี้?')==true){
            deleteNode('<?php echo $DataArray[$node['index']]['symptomNodeID'];?>','<?php echo $DataArray[$node['index']]['symptomID'];?>');
        }
        " style="cursor: pointer; color: red;">ลบคำถาม</a>
    
    <?php
        }//if($result==null)
        else{
        ?>
            <a href = "DiseaseOfSymptomNodeManage.php?symptomNodeID=<?php echo $DataArray[$node['index']]['symptomNodeID'];?>&type=Add" > แก้ไขโรค </a>|
        <a onclick="if(confirm('คุณแน่ใจที่จะลบคำถามนี้?')==true){
            deleteNode('<?php echo $DataArray[$node['index']]['symptomNodeID'];?>','<?php echo $DataArray[$node['index']]['symptomID'];?>');
        }
        " style="cursor: pointer; color: red;">ลบคำถาม</a>

        <?php }
        }//if($DataArray[$node['index']['yesNodeID'] ==null && $objResult['noNodeID'] ==null)

            //Recursive Print Tree
            printtree($node['children'],$DataArray);
            echo '</li>';
        }
        echo '</ul>';
    }
}



//print_r(parseTree($TreeArray));
?>

<!-- Modal -->
<div class="modal fade" id="testModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">แก้ไขคำถาม</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label>คำถาม:</label>
            <!-- <input type="text" class="form-control" id="edit-question"></input> -->
            <textarea id="edit-question" class="form-control" rows="3"></textarea>
            <input type="hidden" id="hid-id"/>
        </div>
        <input id="check-add" class="have-addition-data" type = "checkbox" name = "chkAdditionData">ข้อมูลเพิ่มเติม
        <br>
        <div id="type-addition-data">
            <div class="row">
                <div class="col-md-4">
                    ประเภทของข้อมูลเพิ่มเติม: 
                </div>
                <div class="col-md-3">
                    <select name="slcTypeAdditionData" id ="data-add" class="form-control">
                      <option value = "อุณหภูมิ">อุณหภูมิ</option>
                      <option value = "ความดัน">ความดัน</option>
                      <option value = "เพศชาย">เพศชาย</option>
                      <option value = "เพศหญิง">เพศหญิง</option>
                      <option value = "ชีพจร">ชีพจร</option>  
                    </select>
                </div>
            </div>
            
            
          </div><!-- End: type-addition-data -->
      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="button-update">Update</button>
      </div>
    </div>
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
    
      <!-- DATA TABLES -->
    <script src="../plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="../plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>

    <!-- Select picker -->
    <script type="text/javascript" src="../plugins/selectpicker/js/bootstrap-select.js"></script>

      <script>
        function goToSymptomNodeAdd(typeNode, symptomNodeID){
            //alert("typeNode:"+typeNode+"symptomNodeID:"+symptomNodeID);
            window.location="SymptomNodeAdd.php?typeNode="+typeNode+"&symptomNodeID="+symptomNodeID;
        }

        function openModal(symptomNodeID){

            //Test attrbute
            //$('.have-addition-data').removeAttr('checked');
            var nodeid = symptomNodeID;
            var nodequestion = document.getElementById(nodeid).innerHTML;
            //alert('Onclick: '+nodequestion);
            $('#testModal').modal('show');

            $('#edit-question').val(nodequestion);
            $('#hid-id').val(nodeid);
            var havaData = $('#haveAdditionData'+nodeid).val();
            var typeData = $('#typeAdditionData'+nodeid).val();
            //alert(typeof(havaData)+havaData+typeof(typeData)+typeData);
            if(havaData == '1'){
                
              
                $( "#check-add").prop('checked', true);
                //$('.have-addition-data').prop('checked');
                $('#type-addition-data').show();
                var data = typeData;
                $("#data-add option[value='" + data + "']").prop("selected",true);
            }
            else if(havaData=='0'){

                $('.have-addition-data').attr( "checked", false );
                $('#type-addition-data').hide();
                $("#data-add :selected").prop('selected', false);
            }
        }


        function deleteNode(nodeid,symptomid){
            //alert(nodeid+"----"+symptomid);
            return $.ajax({
                type: "POST",
                url: "SymptomNodeUpdate.php",
                data: {type:"delete",nodeID:nodeid},
                success: function(result) {
                    //alert("result : "+result); 
                    window.location="SymptomNodeShow.php?symptomID="+symptomid;         
                }
            });//ajax

            
        }
        //Query data when selector was changed 
        $(document).ready(function(){
            // Show Decision Tree
            $('#symptom-list').change(function(){
                $('#symptom-update').submit();
         
            });

            //Edit Question
            $('#button-update').click(function(){
                var data = $('#edit-question').val();
                var idNode = $('#hid-id').val();

                var typeAdditionData = $('#data-add').val();
                var haveAdditionData;
                if($('#check-add').prop('checked')){
                    //is(':checked')){
                    haveAdditionData = 1;
                }
                else{
                    haveAdditionData =0 ;
                }
                //alert(haveAdditionData+typeAdditionData);

                 $.ajax({
                    type: "POST",
                    url: "SymptomNodeUpdate.php",
                    data: {data: data,type: "update",idnode:idNode,haveAddition:haveAdditionData,typeAddition:typeAdditionData},
                    success: function(result) {
                        //alert("result : "+result);
                        $('#'+idNode).html(result);
                        if(haveAdditionData == 1){
                            $('#haveAdditionData'+idNode).val('1');
                            $('#typeAdditionData'+idNode).val(typeAdditionData);
                        }
                        else{
                            $('#haveAdditionData'+idNode).val('0');
                            $('#typeAdditionData'+idNode).val(null);
                        }
                       
                        //alert( "Hava"+ $('#haveAdditionData'+idNode).val()+"---"+$('#typeAdditionData'+idNode).val());
                        $('#testModal').modal('hide');

                    }
                });
            });

            //clear value in Modal
            $('#testModal').on('hidden.bs.modal', function () {
                // do something…
                $("#data-add").find('option:selected').removeAttr("selected");
            })

            //Addition Data 
            $('#type-addition-data').hide();
            $('.have-addition-data').click(function(){
                if($(this).prop('checked')){
                    //is(':checked')){
                    $('#type-addition-data').show();
                }
                else{
                    $('#type-addition-data').hide();
            }

        });



    });//Document.ready

    </script>

    <!-- Optionally, you can add Slimscroll and FastClick plugins. 
          Both of these plugins are recommended to enhance the 
          user experience -->
  </body>
</html>