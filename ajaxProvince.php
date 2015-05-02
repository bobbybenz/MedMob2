<?php include('connectAzure.php');?>

<?php
	$action = $_POST['action'];

	if($action == "listDisease"){
$provinceID = $_POST['provinceID'];
	$year = $_POST['year'];
	$sqlStr = "SELECT name,type,count(*) AS amount ,
		(SELECT count(*) FROM (((patientdata AS pd JOIN patientdisease AS pdi ON pd.dataID = pdi.dataID) JOIN disease AS d ON d.diseaseID = pdi.diseaseID) JOIN province p ON pd.province = p.PROVINCE_NAME) JOIN geography AS g ON p.geo_id=g.geo_id WHERE p.province_id = ".$provinceID." AND year(timeSave) = ".$year.") AS allAmount
		FROM (((patientdata AS pd JOIN patientdisease AS pdi ON pd.dataID = pdi.dataID) JOIN disease AS d ON d.diseaseID = pdi.diseaseID) JOIN province p ON pd.province = p.PROVINCE_NAME) JOIN geography AS g ON p.geo_id=g.geo_id WHERE p.province_id = ".$provinceID." AND year(timeSave) = ".$year." GROUP BY name ORDER BY amount DESC";

	$sqlQuery = mysql_query($sqlStr) or die ("Error Query [".$sqlStr."]");
				
?>

	<table class="table">
        <thead>
          <tr>
            <th style="text-align:center;">#</th>
            <th style="text-align:center;">โรค</th>
            <th style="text-align:center;">ประเภท</th>
            <th style="text-align:center;">จำนวน(คน)</th>
            <th style="text-align:center;">เปอร์เซนต์(%)</th>
          </tr>
        </thead>
        <tbody>
 <?php
 		$count = 1;
 		while($sqlResult= mysql_fetch_array($sqlQuery)) {
 			$percent = sprintf ("%.2f", ($sqlResult['amount']*100)/$sqlResult['allAmount']) ;


?>
		<tr>
			<td><?php echo $count;?></td>
			<td><?php echo $sqlResult['name'];?></td>
			<td><?php echo $sqlResult['type'];?></td>
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

?>
