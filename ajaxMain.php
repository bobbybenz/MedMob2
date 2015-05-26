<?php include('connectAzure.php');?>

<?php
	$action = $_POST['action'];

	if($action == "listDisease"){
		$section = $_POST['section'];
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
		$diseaseSys = $_POST['diseaseSys'];
		$section = $_POST['section'];
	 	if($section == "central"){
          $geo_id =2 ;
        }
        else if($section == "north"){
          $geo_id = 1;
        }
        else if($section == "south"){
          $geo_id = 6;
        }
        else if($section == "east"){
          $geo_id = 5;
        }
        else if($section == "west"){
          $geo_id = 4;
        }
        else if($section == "northEast"){
          $geo_id = 3;
        }

		$sqlStr = "";
		if($diseaseSys=='โรคระบบทางเดินหายใจและโรคติดต่อโดยทางเดินหายใจ'){
			$sqlStr = "SELECT sys1 AS valueSys,year FROM diseaseTrend WHERE geoID = '".$geo_id."' ORDER BY year DESC ";
		}
		else if($diseaseSys=='โรคระบบทางเดินอาหารและโรคติดต่อโดนทางเดินอาหาร'){
			$sqlStr = "SELECT sys2 AS valueSys,year FROM diseaseTrend WHERE geoID = '".$geo_id."' ORDER BY year DESC";
		}
		else if($diseaseSys=='โรคระบบประสาทและสมอง'){
			$sqlStr = "SELECT sys3 AS valueSys,year FROM diseaseTrend WHERE geoID = '".$geo_id."' ORDER BY year DESC";
		}
		else if($diseaseSys=='โรคระบบไหลเวียนโลหิตและโรคเลือด'){
			$sqlStr = "SELECT sys4 AS valueSys,year FROM diseaseTrend WHERE geoID = '".$geo_id."' ORDER BY year DESC";
		}
		else if($sdiseaseSys=='โรคระบบกระดูกและกล้ามเนื้อ'){
			$sqlStr = "SELECT sys5 AS valueSys,year FROM diseaseTrend WHERE geoID = '".$geo_id."' ORDER BY year DESC";
		}
		else if($diseaseSys=='โรคระบบต่อมไร้ท่อและโภชนาการ'){
			$sqlStr = "SELECT sys6 AS valueSys,year FROM diseaseTrend WHERE geoID = '".$geo_id."' ORDER BY year DESC";
		}
		else if($diseaseSys=='โรคระบบทางเดินปัสสาวะ'){
			$sqlStr = "SELECT sys7 AS valueSys,year FROM diseaseTrend WHERE geoID = '".$geo_id."' ORDER BY year DESC";
		}
		else if($diseaseSys=='โรคหู'){
			$sqlStr = "SELECT sys8 AS valueSys,year FROM diseaseTrend WHERE geoID = '".$geo_id."' ORDER BY year DESC";
		}
		else if($diseaseSys=='โรคตา'){
			$sqlStr = "SELECT sys9 AS valueSys,year FROM diseaseTrend WHERE geoID = '".$geo_id."' ORDER BY year DESC";
		}
		else if($diseaseSys=='โรคผิวหนัง'){
			$sqlStr = "SELECT sys10 AS valueSys,year FROM diseaseTrend WHERE geoID = '".$geo_id."' ORDER BY year DESC";
		}
		else if($diseaseSys=='โรคติดต่อทางเพศสัมพันธ์'){
			$sqlStr = "SELECT sys11 AS valueSys,year FROM diseaseTrend WHERE geoID = '".$geo_id."' ORDER BY year DESC";
		}
		else if($diseaseSys=='โรคที่เกิดจากอุบัติเหตุ สารพิษ และสัตว์พิษ'){
			$sqlStr = "SELECT sys12 AS valueSys,year FROM diseaseTrend WHERE geoID = '".$geo_id."' ORDER BY year DESC";
		}
		else if($diseaseSys=='โรคติดเชื้อ'){
			$sqlStr = "SELECT sys13 AS valueSys,year FROM diseaseTrend WHERE geoID = '".$geo_id."' ORDER BY year DESC";
		}
		else if($diseaseSys=='โรคพยาธิ'){
			$sqlStr = "SELECT sys14 AS valueSys,year FROM diseaseTrend WHERE geoID = '".$geo_id."' ORDER BY year DESC";
		}
		else if($diseaseSys=='โรคมะเร็ง'){
			$sqlStr = "SELECT sys15 AS valueSys,year FROM diseaseTrend WHERE geoID = '".$geo_id."' ORDER BY year DESC";
		}
		else if($diseaseSys=='โรคติดเชื้ออุบัติใหม่'){
			$sqlStr = "SELECT sys16 AS valueSys,year FROM diseaseTrend WHERE geoID = '".$geo_id."' ORDER BY year DESC";
		}		

		$arrayData = array();
		$sqlQuery = mysql_query($sqlStr) or die ("Error Query [".$sqlStr."]");
		while($sqlResult= mysql_fetch_array($sqlQuery)) {
			$arrayData[$sqlResult['year']] = $sqlResult['valueSys'];
		}//while
		print json_encode($arrayData);
		
	}//if($action == "chart")
?>