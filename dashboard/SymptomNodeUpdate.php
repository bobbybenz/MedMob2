<?php
	include('../connectAzure.php');
	if(isset($_POST['type'])){
		if($_POST['type']=="update"){
			//Udate Edit data on Database
			$idnode = $_POST['idnode'];
			$datanode = $_POST['data'];
			$haveAdditionData = $_POST['haveAddition'];

			if($haveAdditionData ==1){
				$typeAdditionData = $_POST['typeAddition'];	
			}
			else{
				$typeAdditionData = null;
			}
			$strSQL = "UPDATE symptomnode SET question = '".$datanode."',haveAdditionData = '".$haveAdditionData."',typeAdditionData ='".$typeAdditionData."' WHERE symptomNodeID = '".$idnode."'";
			$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
			//echo $typeAdditionData;
			echo $datanode;

		}else if($_POST['type']=="delete"){
			$idnode = $_POST['nodeID'];
			echo $idnode;


			//Delete Node on Database
			//$strSQL = "DELETE FROM symptomnode WHERE symptomNodeID = '".$idnode."'";
			//$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
			
			//Update Yes-No Value of parent node is NULL
			//$strSQLSelectParent = "SELECT * FROM symptomnode WHERE yesNodeID = '".$idnode."' OR noNodeID = '".$idnode."'";
			// $objQuerySelectParent = mysql_query($strSQLSelectParent) or die ("Error Query [".$strSQLSelectParent."]");
			// $objResultSelectParent = mysql_fetch_array($objQuerySelectParent);
			// while($objResultSelectParent = mysql_fetch_array($objQuery)){
			// 	$parentSymptomNodeID = $objResultSelectParent['sysmptomNodeID'];
			// 	if($objResultSelectParent['yesNodeID']==$idnode){
			// 		$strSQL2 = "UPDATE symptomnode SET yesNodeID = NULL WHERE symptomNodeID = '".$idnode."'";
			// 		$objQuery2 = mysql_query($strSQL2) or die ("Error Query [".$strSQL2."]");
			// 	}
			// 	if($objResultSelectParent['noNodeID']==$idnode){
			// 		$strSQL3 = "UPDATE symptomnode SET noNodeID = NULL WHERE symptomNodeID = '".$idnode."'";
			// 		$objQuery3 = mysql_query($strSQL3) or die ("Error Query [".$strSQL3."]");
			// 	}

			// }

			//Udate Parent Node Value of child node is NULL
			//.....

			//echo "Complete";
		}

	}
?>