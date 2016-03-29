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
	$nodes = $_POST['output'];
	$tree = new treemgt();
	$familyid = $nodes[0]['familyid'];
	$checkouType = 0; // 0: save only, 1: save and continue
    $checkoutType = $nodes[0]['checktype'];
	if($familyid == 0)
	{
		// Step I:
		// create new family id
		$treeItem = array();
		$treeItem['dateadded'] =  date("Y-m-d H:i:s");
		$uName = $nodes[0]['username'];		
		$treeItem['name'] = $uName.' Tree';
		$addRecord = true;
		$familyid = 0;
		$treeItem['user_id'] = 3; 
		if($uName == "")
		{
			$uName = mt_rand(0,mt_getrandmax());
			$_SESSION['temp_username'] = $uName;
		} else {
	
			if(isset($_SESSION['temp_username']))
			{
				//  get temp username tree id
				$item = $tree->fetch_values("tree", array('username' => $_SESSION['temp_username']), true);
				if(count($item) > 0)
				{
					// update tree record
					$familyid = $item->familyid;
					$tree->update('tree', array('username' => $uName), array('username' => $_SESSION['temp_username']));
				}
				unset($_SESSION['temp_username']);
				$addRecord = false;
			}
		}
		if($addRecord)
		{
			$treeItem['username'] = $uName; // fixed for time being
			$familyid = $tree->add('tree', $treeItem);
			if($familyid == 0)
			{
				echo "-1";
				exit;
			}
		}
		$_SESSION['family_id'] = $familyid;
	}
	else {
		// familyid > 0
		if($tree->validate("nodes", array('familyid' => $familyid)))
		{
			// record exist
			// delete all older records before saving new one
		   $tree->delete("nodes", array('familyid' => $familyid));
		}
	}
	// Step II: Store all family node information in database
	if(count($nodes) > 0)
	{	
		foreach($nodes as $node)
		{
			if($node['isdeleted'] == "")
			{
				$nodeItem = array();
				$nodeItem['familyid'] = $familyid;
				$nodeItem['elementid'] = $node['nodeid'];
				$nodeItem['toppos'] = $node['tpost'];
				$nodeItem['leftpos'] = $node['lpost'];
				$nodeItem['nodecaption'] = $node['nodeinfo'];
				$nodeItem['firstname'] = $node['fname'];
				$nodeItem['surname'] = $node['sname'];
				$nodeItem['gender'] = $node['gender'];
				if($node['dob'] != "")
				   $nodeItem['birthdate'] = $node['dob'];
				else
					$nodeItem['birthdate'] = "";
					
				$nodeItem['photo'] = $node['photourl'];
				$nodeItem['isliving'] = $node['isliving'];
				if($node['deathdate'] != "")
				   $nodeItem['deathdate'] = $node['deathdate'];
				else
					$nodeItem['deathdate'] = "";
				$nodeItem['email'] = $node['email'];
		
				$nodeItem['website'] = $node['website'];
				$nodeItem['hometel'] = $node['tel'];
				$nodeItem['mobile'] = $node['mobile'];
				$nodeItem['birthplace'] = $node['birthplace'];
		  
				$nodeItem['deathplace'] = $node['deathplace'];
				$nodeItem['profession'] = $node['profession'];
				$nodeItem['company'] = $node['company'];
				$nodeItem['interests'] = $node['interests'];
				$nodeItem['bionotes'] = $node['bio'];
				$nodeItem['isauthor'] = $node['isauthor'];
				// store node
				$tree->add('nodes', $nodeItem);
			}
		}
	}
	echo $familyid;
	exit;
?>