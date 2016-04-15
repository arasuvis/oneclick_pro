<?php 

$fname = $id[0][0]['fname'];
$mname = $id[0][0]['mname'];
$surname = $id[0][0]['surname'];
$email = $id[0][0]['email'];

$age = $id[0][0]['age'];
$gender = $id[0][0]['gender'];
$marital_status = $id[0][0]['marital_status'];
$address = $id[0][0]['address'];
$city = $id[0][0]['city'];
$mobile = $id[0][0]['mobile'];
$date = $id[0][0]['date'];
$dateValue = strtotime($date);
$yr = date("Y",$dateValue)." ";
$mon = date("m",$dateValue)." ";
$dd = date("d",$dateValue)." ";

$value = $id[1];

//print_r($rel);exit;
//echo "<pre>";
//print_r($id);exit;
//foreach()
$name_of_father;
$father_status;
$relation_id;


foreach($rel as $r)
			{
			if($r->name== 'Father')
				{
					$relation_id = $r->rel_id;
				}
			}
			for($i = 0 ; $i < count($value) ; $i++)
				{
					if($value[$i]['relationship'] == $relation_id)
					{
						$name_of_father = $value[$i]['name'];
						$father_status = $value[$i]['status'];
					}
				}
?>
<center></center><p>This is the last and final will and  testament executed at <b><?php echo $city;?></b> on this <b><?php echo $dd;?></b> day of  <b><?php echo $mon;?></b>, <b><?php echo $yr;?></b> BY <b><?php echo $fname;?></b>  <b><?php echo $surname;?></b> 

<?php  if($gender == 'M')
	{			
			if($father_status == 'Alive'){
			echo ' <b>S/o '.$name_of_father.'</b>'; }
			else { echo ' <b>S/o Late '.$name_of_father.'</b>';  }
	} 

	else if( $gender == 'F' && $marital_status == 'Married'  )
	{

	}
	
	else 
	{ 
		if($father_status == 'Alive'){
			echo ' <b>D/o '.$name_of_father.'</b>'; }
			else { echo ' <b>D/o Late '.$name_of_father.'</b>';  }
	} 

?> 

, R/o <b><?php echo $address;?></b> here in after called the Testator voluntarily and while in sound state of mind and understand the contents of this document.</p>
<p>Life is uncertain. God knows when it may come to an end. At present I am in sound mind. I fully understand that what is right and wrong. I wish to make the following WILL in order to avoid litigation and unpleasantness after my demise. The present WILL which is being executed is to be relied upon for all intents and purposes, more so with regard to the inheritance of my movable and immovable property(ies) and I have the absolute power of disposal over the same; no other person has any interest in the properties hereto.</p>


<?php 

$data = $id[2];

for($i = 0 ; $i < count($data) ; $i++)
{
	$address = $data[$i]['address'];
	$municipal_number = $data[$i]['municipal_number'];
	$name_id = $data[$i]['name'];
	$area = $data[$i]['area'];
	$year_of_purchase = $data[$i]['year_of_purchase'];
	$name;
				foreach($prop as $pro)
				{
					if($name_id == $pro->prop_id)
					{
						$name = $pro->prop_name;
					}
				}
?>
<p>That I am the absolute owner and in possession of property bearing No.<b><?php echo $municipal_number ?></b> at address <b><?php echo $address ?></b> That I became the owner of <b><?php echo $name ?></b> of area <b><?php echo $area ?></b> in the year <b><?php echo $year_of_purchase  ?></b>. This is my self-acquired property.<p>

<?php 
} 
?>






<?php 
$data = $id[3];
?>
<p>That I am the absolute owner and in possession of various immovable assets like <b>
<?php 
for($i = 0 ; $i < count($data) ; $i++)
{
	echo $address = $data[$i]['comments'];
	if($i < count($data)-1){
	echo " , ";
	}
	else {
	echo "  ";	
	}
} 
?>
</b></p>
<?php die(); ?>