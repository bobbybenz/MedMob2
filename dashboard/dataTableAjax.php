<?php
	$action = $_POST['action'];
	if($action == "diseaseManageEdit"){
		$diseaseID = $_POST['diseaseID'];
		$diseaseName = $_POST['diseaseName'];
		$type = $_POST['type'];
?>
	
		<td><input name = "txtEditdiseaseID" type = "hidden" value = "<?php echo $diseaseID;?>"><?php echo $diseaseID;?></td>
		<td><input name = "txtEditName" type = "text" class="form-control" autofocus value ="<?php echo $diseaseName;?>"></td>
		<td>
            <select name = "txtEditTypeOfSymptom" class="form-control">
              <option value = "โรคระบบตทางเดินหายใจและโรคติดต่อโดยทางเดินหายใจ" <?php if($type=="โรคระบบตทางเดินหายใจและโรคติดต่อโดยทางเดินหายใจ") echo "selected";?>>โรคระบบตทางเดินหายใจและโรคติดต่อโดยทางเดินหายใจ</option>
              <option value = "โรคระบบทางเดินอาหารและโรคติดต่อโดนทางเดินอาหาร" <?php if($type=="โรคระบบทางเดินอาหารและโรคติดต่อโดนทางเดินอาหาร") echo "selected";?>>โรคระบบทางเดินอาหารและโรคติดต่อโดนทางเดินอาหาร</option>
              <option value = "โรคระบบประสาทและสมอง" <?php if($type=="โรคระบบประสาทและสมอง") echo "selected";?>>โรคระบบประสาทและสมอง</option>
              <option value = "โรคระบบไหลเวียนโลหิตและโรคเลือด" <?php if($type=="โรคระบบไหลเวียนโลหิตและโรคเลือด") echo "selected";?>>โรคระบบไหลเวียนโลหิตและโรคเลือด</option>
              <option value = "โรคระบบกระดูกและกล้ามเนื้อ" <?php if($type=="โรคระบบกระดูกและกล้ามเนื้อ") echo "selected";?>>โรคระบบกระดูกและกล้ามเนื้อ</option>
              <option value = "โรคระบบต่อมไร้ท่อและโภชนาการ" <?php if($type=="โรคระบบต่อมไร้ท่อและโภชนาการ") echo "selected";?>>โรคระบบต่อมไร้ท่อและโภชนาการ</option>
              <option value = "โรคระบบทางเดินปัสสาวะ" <?php if($type=="โรคระบบทางเดินปัสสาวะ") echo "selected";?>>โรคระบบทางเดินปัสสาวะ</option>
              <option value = "โรคระบบอวัยวะสืบพันธุ์ชาย" <?php if($type=="โรคระบบอวัยวะสืบพันธุ์ชาย") echo "selected";?>>โรคระบบอวัยวะสืบพันธุ์ชาย</option>
              <option value = "โรคระบบอวัยวะสืบพันธุ์หญิงและการตั้งครรภ์" <?php if($type=="โรคระบบอวัยวะสืบพันธุ์หญิงและการตั้งครรภ์") echo "selected";?>>โรคระบบอวัยวะสืบพันธุ์หญิงและการตั้งครรภ์</option>
              <option value = "โรคหู" <?php if($type=="โรคหู") echo "selected";?>>โรคหู</option>
              <option value = "โรคตา" <?php if($type=="โรคตา") echo "selected";?>>โรคตา</option>
              <option value = "โรคผิวหนัง" <?php if($type=="โรคผิวหนัง") echo "selected";?>>โรคผิวหนัง</option>
              <option value = "โรคติดต่อทางเพศสัมพันธ์" <?php if($type=="โรคติดต่อทางเพศสัมพันธ์") echo "selected";?>>โรคติดต่อทางเพศสัมพันธ์</option>
              <option value = "โรคที่เกิดจากอุบัติเหตุ สารพิษ และสัตว์พิษ" <?php if($type=="โรคที่เกิดจากอุบัติเหตุ สารพิษ และสัตว์พิษ") echo "selected";?>>โรคที่เกิดจากอุบัติเหตุ สารพิษ และสัตว์พิษ</option>
              <option value = "โรคติดเชื้อ" <?php if($type=="โรคติดเชื้อ") echo "selected";?>>โรคติดเชื้อ</option>
              <option value = "โรคพยาธิ" <?php if($type=="โรคพยาธิ") echo "selected";?>>โรคพยาธิ</option>
              <option value = "โรคมะเร็ง" <?php if($type=="โรคมะเร็ง") echo "selected";?>>โรคมะเร็ง</option>
              <option value = "โรคติดเชื้ออุบัติใหม่" <?php if($type=="โรคติดเชื้ออุบัติใหม่") echo "selected";?>>โรคติดเชื้ออุบัติใหม่</option>
            </select>

        </td>
        <td colspan="2" align="right"><div align="center">
            <input name="btnUpdate" class="btn btn-info" type="button" id="btnUpdate" value="Update" OnClick="diseaseMN.hdnCmd.value='Update';diseaseMN.submit();">
           	<input name="btnCancel" class="btn btn-default" type="button" id="btnCancel" value="Cancel" OnClick="window.location='<?php echo 'DiseaseManage.php';?>';">
        </div></td>
        <td style="display:none;"></td>
<?php
	}//$action == "diseaseManageEdit"
	else if($action == "symptomManageEdit"){
		$symptomID = $_POST['symptomID'];
		$name = $_POST['name'];
		$flowNumber =$_POST['flowNumber'];
		$partOfBody = $_POST['partOfBody'];

?>
		 <td><div align="center">
      		<input type="hidden" name="txtEditsymptomID" size="5" value="<?php echo $symptomID;?>"><?php echo $symptomID;?></td>
          <td><input type="text" name="txtEditName" class="form-control" autofocus value="<?php echo $name;?>"></td>
          <td><input type="text" name="txtEditFlowNumber" class="form-control" value="<?php echo $flowNumber;?>"></td>
          <td>   
            <select name = "txtEditPartOfBody" class="form-control">
              <option value = "head" <?php if($partOfBody=="head") echo "selected";?> >Head</option>
              <option value = "body" <?php if($partOfBody=="body") echo "selected";?> >Body</option>
              <option value = "arm_leg" <?php if($partOfBody=="arm_leg") echo "selected";?>>Arm / Leg</option>
              <option value = "skin" <?php if($partOfBody=="skin") echo "selected";?>>Skin</option>
            </select>
          </td>
          <td colspan="2" align="right"><div align="center">
            <input name="btnUpdate" class="btn btn-info" type="button" id="btnUpdate" value="Update" OnClick="symptomMN.hdnCmd.value='Update';symptomMN.submit();">
            <input name="btnCancel" class="btn btn-default" type="button" id="btnCancel" value="Cancel" OnClick="window.location='<?php echo "SymptomManage.php";?>';">
          </div></td>
          <td style="display:none;"></td>
<?php


	}

?>