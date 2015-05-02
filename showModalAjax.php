<?php include('connectAzure.php');?>
<?php

//List Disease Modal
$action = $_POST['action'];
if($action = "listDisease"){
	if($_POST['typeData']=="data-chart"){
		//Fetch Data from Database
	$diseaseID = $_POST['diseaseID'];
	$year =$_POST['year'];

	
	$sqlStr = "SELECT count(*) AS AllData,
		(SELECT count(*) 
		FROM patientdata AS pd JOIN patientdisease AS pdi ON pd.dataID = pdi.dataID WHERE pdi.diseaseID = ".$diseaseID." AND year(timeSave) = ".$year." AND gender = 'ชาย') AS Male,
		(SELECT count(*) 
		FROM patientdata AS pd JOIN patientdisease AS pdi ON pd.dataID = pdi.dataID WHERE pdi.diseaseID = ".$diseaseID." AND year(timeSave) = ".$year." AND gender = 'หญิง') AS Female,
		(SELECT count(*) 
		FROM patientdata AS pd JOIN patientdisease AS pdi ON pd.dataID = pdi.dataID WHERE pdi.diseaseID = ".$diseaseID." AND year(timeSave) = ".$year." AND age >1 AND age <=15 ) AS age1,
		(SELECT count(*) 
		FROM patientdata AS pd JOIN patientdisease AS pdi ON pd.dataID = pdi.dataID WHERE pdi.diseaseID = ".$diseaseID." AND year(timeSave) = ".$year." AND age >15 AND age <=24 ) AS age2,
		(SELECT count(*) 
		FROM patientdata AS pd JOIN patientdisease AS pdi ON pd.dataID = pdi.dataID WHERE pdi.diseaseID = ".$diseaseID." AND year(timeSave) = ".$year." AND age >24 AND age <=50 ) AS age3,
		(SELECT count(*) 
		FROM patientdata AS pd JOIN patientdisease AS pdi ON pd.dataID = pdi.dataID WHERE pdi.diseaseID = ".$diseaseID." AND year(timeSave) = ".$year." AND age >50 ) AS age4

		FROM patientdata AS pd JOIN patientdisease AS pdi ON pd.dataID = pdi.dataID WHERE pdi.diseaseID = ".$diseaseID." AND year(timeSave) = ".$year."";
	
	$sqlQuery = mysql_query($sqlStr) or die ("Error Query [".$sqlStr."]");
	
	$sqlResult = mysql_fetch_array($sqlQuery);

	$arrayData = array('AllData' => $sqlResult['AllData'], 'Male' => $sqlResult['Male'],'Female' => $sqlResult['Female'],'age1' => $sqlResult['age1'],'age2' => $sqlResult['age2'],'age3' => $sqlResult['age3'],'age4' => $sqlResult['age4']);
	//echo $sqlResult['AllData'].$sqlResult['Male'].$sqlResult['Female'].$sqlResult['age1'].$sqlResult['age2'].$sqlResult['age3'].$sqlResult['age4'];
	print json_encode($arrayData);

	}else if($_POST['typeData']=="data-table"){
		$diseaseID = $_POST['diseaseID'];
		$year =$_POST['year'];
		$sqlStr = "SELECT province,count(*) AS amount ,
		(SELECT count(*) FROM (((patientdata AS pd JOIN patientdisease AS pdi ON pd.dataID = pdi.dataID) JOIN disease AS d ON d.diseaseID = pdi.diseaseID) JOIN province p ON pd.province = p.PROVINCE_NAME) JOIN geography AS g ON p.geo_id=g.geo_id WHERE d.diseaseID = ".$diseaseID." AND year(timeSave) = ".$year.") AS allAmount
		FROM (((patientdata AS pd JOIN patientdisease AS pdi ON pd.dataID = pdi.dataID) JOIN disease AS d ON d.diseaseID = pdi.diseaseID) JOIN province p ON pd.province = p.PROVINCE_NAME) JOIN geography AS g ON p.geo_id=g.geo_id WHERE d.diseaseID = ".$diseaseID." AND year(timeSave) = ".$year." GROUP BY province ORDER BY amount DESC";
		$sqlQuery = mysql_query($sqlStr) or die ("Error Query [".$sqlStr."]");
				
?>

	<table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>จังหวัด</th>
            <th style="text-align: center;">จำนวน(คน)</th>
            <th style="text-align: center;">เปอร์เซนต์(%)</th>
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
			<td><?php echo $sqlResult['province'];?></td>
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
		//$sqlResult = mysql_fetch_array($sqlQuery);

	}
 }//listDisease

?>