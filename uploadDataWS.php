<meta charset="utf-8">
<?php

	include('connectAzure.php');
	//Get data from Android
	$gender =$_POST["gender"];
	$age=$_POST["age"];
	$height=$_POST["height"];
	$weight=$_POST["weight"];
	$bmi=$_POST["bmi"];
	$bloodPressure=$_POST["bloodPressure"];
	$congenitalDisease=$_POST["congenitalDisease"];
	$latitude =$_POST["latitude"];
	$longitude=$_POST["longitude"];
	$jsonPDisease=$_POST["jsonPDisease"];
	$jsonPSymptom=$_POST["jsonPSymptom"];
	$province = NULL;
	$province = getProvince($latitude,$longitude,"AIzaSyDJGylP0DHMCBbM0ZyzFbh1HqTw5CycLj4");
	$objPDisease = json_decode($jsonPDisease,true);
	$objPSymptom = json_decode($jsonPSymptom,true);
	insertPatientData($gender,$age,$height,$weight,$bmi,$bloodPressure,$congenitalDisease,$latitude,$longitude,$province);
	$Newid = mysql_insert_id();//Ner patient ID after INSERT data
	//echo $Newid."<br>";
	foreach ($objPSymptom as $arrs) {
		$symptomID = $arrs["ID"];
		$symptomName = $arrs["Data"];
		insertPatientSymptom($Newid,$symptomID,$symptomName);
		
	}
	foreach ($objPDisease as $arrs) {
		$diseaseID = $arrs["ID"];
		$diseaseName = $arrs["Data"];
		insertPatientDisease($Newid,$diseaseID,$diseaseName);
	}


	returnJsonPatientData();

	function insertPatientData($gender,$age,$height,$weight,$bmi,$bloodPressure,$congenitalDisease,$latitude,$longitude,$province){
	$strSQLinsert = "INSERT INTO patientdata(gender, age,height,weight,bmi,bloodPressure,congenitalDisease,latitude,longitude,province) VALUES ('".$gender."','".$age."','".$height."','".$weight."','".$bmi."','".$bloodPressure."','".$congenitalDisease."','".$latitude."','".$longitude."','".$province."')";
	$objQuery = mysql_query($strSQLinsert) or die ("Error Query [".$strSQLinsert."]");
	
	}

	function insertPatientDisease($dataID,$diseaseID,$diseaseName){
		$strSQLPD = "INSERT INTO patientdisease(dataID,diseaseID,diseaseName) VALUES ('".$dataID."','".$diseaseID."','".$diseaseName."')";
		$objQuery = mysql_query($strSQLPD) or die ("ERROR Query [".$strSQLPD."]");
	}

	function insertPatientSymptom($dataID,$symptomID,$symptomName){
		$strSQLPS = "INSERT INTO patientsymptom(dataID,symptomID,symptomName) VALUES('".$dataID."','".$symptomID."','".$symptomName."')";
		$objQuery = mysql_query($strSQLPS) or die ("ERROR Query [".$strSQLPS."]");
	}

	//Return json ----------------------------------------------
	function returnJsonPatientData(){
		$strSQL = "SELECT * FROM patientdata";

		$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
		$intNumField = mysql_num_fields($objQuery);
		$resultArray = array();
		while($obResult = mysql_fetch_array($objQuery))
		{
			$arrCol = array();
			for($i=0;$i<$intNumField;$i++)
			{
				$arrCol[mysql_field_name($objQuery,$i)] = $obResult[$i];
			} 
			array_push($resultArray,$arrCol);
		
		}
		echo json_encode($resultArray);
	}

	//Get Porvince Data from GoogleMapApi
	function getProvince($lat,$long,$apikey){
		$fullurl = "https://maps.googleapis.com/maps/api/geocode/json?latlng=".$lat.",".$long."&key=".$apikey."&language=th";
		$string = file_get_contents($fullurl); // get json content
		$json = json_decode($string, true); //json decoder
		//echo $json['status']."<br>";
		//echo $json['results'][0]["address_components"][5]["long_name"]."<br>";
		$compareValue = array("administrative_area_level_1", "political");
		$i=0;
		//$haveData = 0;
		//check Type of json Map
		$province = NULL;
		if($json['status']=="OK"){
			foreach ($json['results'][0]["address_components"] as $key ) {
				# code...
				if($key['types'] == $compareValue){
	 				$province = $key['short_name'];
	 				//echo $province;			
				}
			}
		}
	
		return $province;
	}//End: getProvince


	mysql_close($objConnect);
?>