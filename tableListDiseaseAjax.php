<?php include('connectAzure.php');?>
<?php
//Define Varible
// $year = "2015";
// $diseaseSystem = "โรคระบบประสาทและสมอง";
$year = $_POST['year'];
$diseaseSystem = $_POST['diseaseSystem'];
// echo $year."<br>";
// echo $diseaseSystem."<br>";

// $sqlStr = "SELECT d.diseaseID, d.name,count(d.name) AS all_amount FROM (((patientdata AS pd JOIN patientdisease AS pdi ON pd.dataID = pdi.dataID) JOIN disease AS d ON d.diseaseID = pdi.diseaseID) JOIN province p ON pd.province = p.PROVINCE_NAME) JOIN geography AS g ON p.geo_id=g.geo_id GROUP BY d.name ORDER BY all_amount DESC";

$sqlStr = "SELECT d1.diseaseID, d1.name,count(d1.name) AS Sum, 
(SELECT count(*) FROM (((patientdata AS pd JOIN patientdisease AS pdi ON pd.dataID = pdi.dataID) JOIN disease AS d ON d.diseaseID = pdi.diseaseID) JOIN province p ON pd.province = p.PROVINCE_NAME) JOIN geography AS g ON p.geo_id=g.geo_id WHERE p.geo_id = '2' and d.name = d1.name AND year(timeSave) = '".$year."') AS Centra ,
(SELECT count(*) FROM (((patientdata AS pd JOIN patientdisease AS pdi ON pd.dataID = pdi.dataID) JOIN disease AS d ON d.diseaseID = pdi.diseaseID) JOIN province p ON pd.province = p.PROVINCE_NAME) JOIN geography AS g ON p.geo_id=g.geo_id WHERE p.geo_id = '1' and d.name = d1.name AND year(timeSave) = '".$year."') AS North ,
(SELECT count(*) FROM (((patientdata AS pd JOIN patientdisease AS pdi ON pd.dataID = pdi.dataID) JOIN disease AS d ON d.diseaseID = pdi.diseaseID) JOIN province p ON pd.province = p.PROVINCE_NAME) JOIN geography AS g ON p.geo_id=g.geo_id WHERE p.geo_id = '6' and d.name = d1.name AND year(timeSave) = '".$year."') AS South,
(SELECT count(*) FROM (((patientdata AS pd JOIN patientdisease AS pdi ON pd.dataID = pdi.dataID) JOIN disease AS d ON d.diseaseID = pdi.diseaseID) JOIN province p ON pd.province = p.PROVINCE_NAME) JOIN geography AS g ON p.geo_id=g.geo_id WHERE p.geo_id = '5' and d.name = d1.name AND year(timeSave) = '".$year."') AS East,
(SELECT count(*) FROM (((patientdata AS pd JOIN patientdisease AS pdi ON pd.dataID = pdi.dataID) JOIN disease AS d ON d.diseaseID = pdi.diseaseID) JOIN province p ON pd.province = p.PROVINCE_NAME) JOIN geography AS g ON p.geo_id=g.geo_id WHERE p.geo_id = '4' and d.name = d1.name AND year(timeSave) = '".$year."') AS West,
(SELECT count(*) FROM (((patientdata AS pd JOIN patientdisease AS pdi ON pd.dataID = pdi.dataID) JOIN disease AS d ON d.diseaseID = pdi.diseaseID) JOIN province p ON pd.province = p.PROVINCE_NAME) JOIN geography AS g ON p.geo_id=g.geo_id WHERE p.geo_id = '3' and d.name = d1.name AND year(timeSave) = '".$year."') AS NorthEast
FROM ((patientdata AS pd1 JOIN patientdisease AS pdi1 ON pd1.dataID = pdi1.dataID) JOIN disease AS d1 ON d1.diseaseID = pdi1.diseaseID) WHERE d1.type = '".$diseaseSystem."' AND year(timeSave) = '".$year."' GROUP BY d1.name ORDER BY Sum DESC";
$sqlQuery = mysql_query($sqlStr) or die ("Error Query [".$sqlStr."]");
$i=1;
?>
<table class="table table-bordered">
	<thead>
	  <tr>
	    <th style="width:6%;text-align: center; vertical-align: middle;" rowspan="2">#</th>
	    <th style="text-align: center; vertical-align: middle;" rowspan="2">โรคที่พบมาก</th>
	    <th style="text-align: center;" colspan="6">ภาค</th>
	    
	    <th style="width:15%;text-align: center; vertical-align: middle;" rowspan="2">รวม(คน)</th>
	    <!-- <th style="width:15%;text-align: center; vertical-align: middle;" rowspan="2">เปอร์เซนต์รวม(%)</th> -->
	  </tr>
	  <tr>

	    <th style="width:8%;text-align: center;">กลาง</th>
	    <th style="width:8%;text-align: center;">เหนือ</th>
	    <th style="width:8%;text-align: center;">ใต้</th>
	    <th style="width:8%;text-align: center;">ออก</th>
	    <th style="width:8%;text-align: center;">ตก</th>
	    <th style="width:8%;text-align: center;">อีสาน</th>

	  </tr>
	</thead>
	<tbody>
<?php
	while($objResult = mysql_fetch_array($sqlQuery))
    {
?>
	<tr class = "show-md">
		<td style="text-align: center;"><input class="diseaseRow" type = "hidden" value = "<?php echo $objResult['diseaseID']?>"><?php echo $i;?></td>
		<td><input type = "hidden" value = ""><span style="cursor: pointer;" id="<?php echo $objResult['diseaseID']?>"><a><?php echo $objResult['name'];?></a></span></td>
		<td style="text-align: center;"><?php echo $objResult['Centra'];?></td>
	    <td style="text-align: center;"><?php echo $objResult['North'];?></td>
	    <td style="text-align: center;"><?php echo $objResult['South'];?></td>
	    <td style="text-align: center;"><?php echo $objResult['East'];?></td>
	    <td style="text-align: center;"><?php echo $objResult['West'];?></td>
	    <td style="text-align: center;"><?php echo $objResult['NorthEast'];?></td>
	    <td style="text-align: center;"><?php echo $objResult['Sum'];?></td>

	</tr>
<?php
	$i++;
	}
?>
<!-- 	  <tr>
	    <td style="text-align: center;">1</td>
	    <td><span style="cursor: pointer;" id="disease-1"><a>ไข้หวัดใหญ่</a></span></td>
	    <td style="text-align: center;">10</td>
	    <td style="text-align: center;">10</td>
	    <td style="text-align: center;">10</td>
	    <td style="text-align: center;">10</td>
	    <td style="text-align: center;">10</td>
	    <td style="text-align: center;">10</td>
	    <td style="text-align: center;">20</td>

	  </tr> -->
	
	</tbody>
</table>

<script>
	document.ready(function(){

		//Open Modal Detail of each disease
	    $('#disease-1').click(function(){
	      //alert('test');
	    $('#myModal').modal('show');

	});
	    

       
</script>