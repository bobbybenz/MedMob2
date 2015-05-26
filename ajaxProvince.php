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
	else if($action =="graphDisease" ){
		$provinceID = $_POST['provinceID'];
		$year = $_POST['year'];
		$sys1 =0;
		$sys2 =0;
		$sys3 =0;
		$sys4 =0;
		$sys5 =0;
		$sys6 =0;
		$sys7 =0;
		$sys8 =0;
		$sys9 =0;
		$sys10 =0;
		$sys11 =0;
		$sys12 =0;
		$sys13 =0;
		$sys14 =0;
		$sys15 =0;
		$sys16 =0;

		$sqlStr = "SELECT p.type,count(p.type) AS amount FROM ((patientdata AS pd JOIN patientdisease AS pds ON pd.dataID = pds.dataID) JOIN disease AS p ON pds.diseaseID = p.diseaseID) JOIN province AS pv ON pd.province = pv.PROVINCE_NAME WHERE year(timeSave) = '".$year."' AND pv.PROVINCE_ID = '".$provinceID."' GROUP BY p.type";
		$sqlQuery = mysql_query($sqlStr) or die ("Error Query [".$sqlStr."]");

		while($sqlResult= mysql_fetch_array($sqlQuery)) {
			if($sqlResult['type']=='โรคระบบทางเดินหายใจและโรคติดต่อโดยทางเดินหายใจ'){
				$sys1 = $sqlResult['amount'];
			}
			else if($sqlResult['type']=='โรคระบบทางเดินอาหารและโรคติดต่อโดนทางเดินอาหาร'){
				$sys2 = $sqlResult['amount'];
			}
			else if($sqlResult['type']=='โรคระบบประสาทและสมอง'){
				$sys3 = $sqlResult['amount'];
			}
			else if($sqlResult['type']=='โรคระบบไหลเวียนโลหิตและโรคเลือด'){
				$sys4 = $sqlResult['amount'];
			}
			else if($sqlResult['type']=='โรคระบบกระดูกและกล้ามเนื้อ'){
				$sys5 = $sqlResult['amount'];
			}
			else if($sqlResult['type']=='โรคระบบต่อมไร้ท่อและโภชนาการ'){
				$sys6 = $sqlResult['amount'];
			}
			else if($sqlResult['type']=='โรคระบบทางเดินปัสสาวะ'){
				$sys7 = $sqlResult['amount'];
			}
			else if($sqlResult['type']=='โรคหู'){
				$sys8 = $sqlResult['amount'];
			}
			else if($sqlResult['type']=='โรคตา'){
				$sys9 = $sqlResult['amount'];
			}
			else if($sqlResult['type']=='โรคผิวหนัง'){
				$sys10 = $sqlResult['amount'];
			}
			else if($sqlResult['type']=='โรคติดต่อทางเพศสัมพันธ์'){
				$sys11 = $sqlResult['amount'];
			}
			else if($sqlResult['type']=='โรคที่เกิดจากอุบัติเหตุ สารพิษ และสัตว์พิษ'){
				$sys12 = $sqlResult['amount'];
			}
			else if($sqlResult['type']=='โรคติดเชื้อ'){
				$sys13 = $sqlResult['amount'];
			}
			else if($sqlResult['type']=='โรคพยาธิ'){
				$sys14 = $sqlResult['amount'];
			}
			else if($sqlResult['type']=='โรคมะเร็ง'){
				$sys15 = $sqlResult['amount'];
			}
			else if($sqlResult['type']=='โรคติดเชื้ออุบัติใหม่'){
				$sys16 = $sqlResult['amount'];
			}
			
		}//while

		//echo (string)$sys1.(string)$sys2.(string)$sys3.(string)$sys4.(string)$sys5.(string)$sys6.(string)$sys7.(string)$sys8.(string)$sys9. (string)$sys10. (string)$sys11. (string)$sys12. (string)$sys13. (string)$sys14. (string)$sys15. (string)$sys16;

		$arrayData = array('sys1' => $sys1,'sys2' => $sys2,'sys3' => $sys3,'sys4' => $sys4,'sys5' => $sys5,'sys6' => $sys6,'sys7' => $sys7,'sys8' => $sys8,'sys9' => $sys9,'sys10' => $sys10,'sys11' => $sys11,'sys12' => $sys12,'sys13' => $sys13,'sys14' => $sys14,'sys15' => $sys15,'sys16' => $sys16 );
		print json_encode($arrayData);

	}//if($action =="graphDisease" )
?>
