<?php
//header('Content-Type: application/json');
include_once("../include/config.php");
include_once(INCLUDE_ROOT . "bll/treemgt.php");
session_start();
if(!isset($_REQUEST['output']))
{
	echo "No Data Found!";
	exit;
}

$connects = $_POST['output'];
$checkouType = 0; // 0: save only, 1: save and continue
$checkoutType = $connects[0]['checktype'];
$tree = new treemgt();
if(count($connects) > 0)
{
    // validate whether existing familyid connection exist in database
	$fid = $connects[0]['familyid'];
	
	if($fid > 0)
	{
		if($tree->validate("treerelationships", array('familyid' => $fid)))
		{
			// record exist
			// delete all older records before saving new one
		   $tree->delete("treerelationships", array('familyid' => $fid));
		}
	}
	foreach($connects as $connect)
	{	
		if($connect['isdeleted'] == "")
		{
			$connectItem = array();
			$connectItem['familyid'] = $connect['familyid'];
			$connectItem['selementid'] = $connect['source'];
			$connectItem['delementid'] = $connect['dest'];
			$connectItem['sconnectpos'] = $connect['sourcepos'];
			$connectItem['dconnectpos'] = $connect['destpos'];
			$connectItem['relation'] = $connect['relation'];
			$connectItem['sname'] = $connect['sname'];
			$connectItem['dname'] = $connect['dname'];
			// store node
			$tree->add('treerelationships', $connectItem);
		}
	}
}
//echo var_dump($connects);
//exit;

if(isset($_SESSION['temp_username']))
  echo SITE_DOMAIN . 'register.php';
else if($checkoutType == 0)
{
	echo ""; // save only
	exit;
}
else if($checkoutType == 1)
{
	// save and continue
	echo SITE_DOMAIN . 'order_page.php';
} 
?>