<?php
error_reporting(1);

include("connection.php");
//include("../../includes/authenticate.php");

use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

require_once ('./vendor/autoload.php');

$dest_path = "AdityaBirlaTarrif.xlsx";

$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
$spreadsheet = $reader->load($dest_path);
$sheetData = $spreadsheet->getActiveSheet()->toArray();

for($i=8; $i<count($sheetData); $i++) {
	
    print_r($sheetData[$i]);
	$tpa = 18;
	$dept_id = $sheetData[$i][0];
	$subcat = trim($sheetData[$i][1]); 
	$inclusion = trim($sheetData[$i][2]); 
	$exclusion = trim($sheetData[$i][3]); 
	$created_by = 1;
	$created_on = date("Y-m-d h:i:s");
	$updated_by = 1;
	$updated_on = date("Y-m-d h:i:s");
	$status = 1;
	
	$insert_qry = "INSERT INTO `manage_tpa` (`tpa`, `dept`, `subcat`, `inclusion`, `exclusion`, `created_by`, `created_on`, `updated_by`, `updated_on`, `status`) VALUES ('$tpa', '$dept_id', '$subcat', '$inclusion', '$exclusion', '$created_by', '$created_on', '$updated_by', '$updated_on', '$status');";

    $exec_qry = mysqli_query($connect, $insert_qry);

}

?>