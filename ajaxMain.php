<?php include('connectAzure.php');?>

<?php
	$action = $_POST['action'];

	if($action == "listDisease"){
		//$provinceID = $_POST['provinceID'];
		//$year = $_POST['year'];
		//$provinceID = 1;
		//$year = 2015;
		$diseaseSys = $_POST['diseaseSys'];
		//$diseaseSys = "โรคหู";
		// $sqlStr = "SELECT name,type,count(*) AS amount ,
		// 	(SELECT count(*) FROM (((patientdata AS pd JOIN patientdisease AS pdi ON pd.dataID = pdi.dataID) JOIN disease AS d ON d.diseaseID = pdi.diseaseID) JOIN province p ON pd.province = p.PROVINCE_NAME) JOIN geography AS g ON p.geo_id=g.geo_id WHERE p.province_id = ".$provinceID." AND year(timeSave) = ".$year.") AS allAmount
		// 	FROM (((patientdata AS pd JOIN patientdisease AS pdi ON pd.dataID = pdi.dataID) JOIN disease AS d ON d.diseaseID = pdi.diseaseID) JOIN province p ON pd.province = p.PROVINCE_NAME) JOIN geography AS g ON p.geo_id=g.geo_id WHERE p.province_id = ".$provinceID." AND year(timeSave) = ".$year." GROUP BY name ORDER BY amount DESC";

		$sqlStr = "SELECT d.name,count(*) AS amount FROM (patientdata AS pd JOIN patientdisease AS pds ON pd.dataID = pds.dataID) JOIN disease AS d ON d.diseaseID = pds.diseaseID WHERE d.type = '".$diseaseSys."' GROUP BY d.name ORDER BY amount DESC";
		$sqlQuery = mysql_query($sqlStr) or die ("Error Query [".$sqlStr."]");
					
		$sqlStr2 = "SELECT count(*) AS Allamount FROM (patientdata AS pd JOIN patientdisease AS pds ON pd.dataID = pds.dataID) JOIN disease AS d ON d.diseaseID = pds.diseaseID WHERE d.type = '".$diseaseSys."'";
		$sqlQuery2 = mysql_query($sqlStr2) or die ("Error Query [".$sqlStr2."]");
		$sqlResult2= mysql_fetch_array($sqlQuery2);
		$allAmount = $sqlResult2['Allamount'];
		//$allAmount =12;
	?>

		<table class="table">
		    <thead>
		      <tr>
		        <th>#</th>
		        <th>โรคที่พบมาก</th>
		        <th>จำนวน(คน)</th>
		        <th>เปอร์เซนต์(%)</th>
	          </tr>
	        </thead>
	        <tbody>
	 <?php
	 		$count = 1;
	 		while($sqlResult= mysql_fetch_array($sqlQuery)) {
	 			$percent = sprintf ("%.2f", ($sqlResult['amount']*100)/$allAmount) ;
	 			

	?>
			<tr>
				<td><?php echo $count;?></td>
				<td><?php echo $sqlResult['name'];?></td>
				<td style="text-align: center;"><?php echo $sqlResult['amount'];?></td>
				<td style="text-align: center;"><?php echo $percent;?></td>
			</tr>

	<?php
			if($count == 5){break;}
				$count++;
	 		}//while($sqlResult= mysql_fetch_array($sqlQuery)))
	 ?>
		</tbody>
	</table>

	<?php

	}//if(action = list Disease
	else if($action == "chart"){


	}
?>