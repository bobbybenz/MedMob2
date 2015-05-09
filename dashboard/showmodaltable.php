<?php
	include('../connectAzure.php');
	$symptomID = $_POST['data'];
	//echo "rest";
?>
	
	<table id="modal-table" class="table table-bordered table-hover">
    	<thead>
    		<tr>
    			<th style="text-align: center;">ID</th>
    			<th style="text-align: center;">Question</th>
    		</tr>
    	</thead>
    	<tbody>
    <?php

    	$strSQLSymptomNode="SELECT * FROM symptomnode WHERE symptomID = '".$_POST['data']."'";
    	$objQuerySymptomNode=mysql_query($strSQLSymptomNode) or die ("Error Query [".$strSQLSymptomNode."]");
    	//$objQuery = mysql_query($strSQLDisease) or die ("Error Query [".$strSQLDisease."]");
    	while ($objResultSymptomNode=mysql_fetch_array($objQuerySymptomNode)) {

    		# code...
    	
    ?>
    		<tr>
    			<td style="text-align: center;">
    				<a href="javascript:void(0);" class="choose-button"><?php echo 
    				$objResultSymptomNode['symptomNodeID']; ?></a>
    			</td>
    			<td class="<?php echo $objResultSymptomNode['symptomNodeID']?> question"><?php echo $objResultSymptomNode['question']; ?></td>
    			<!-- <td class="001 remarks">none</td> -->
    		</tr>

    <?php
    	}//while ($objResultDisease=mysql_fetch_array($objQueryDisease))
   
    ?>
		</tbody>
	</table>
    <script>
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
    </script>
