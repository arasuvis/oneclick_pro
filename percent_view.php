<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title></title>
</head>
<body>
<form method="POST" action="percent_add.php">
<div class="container">

	<!-- <label>Select Property</label> -->
	<select name="property" id="property">
		<option value="-1">Please Select</option>
		<option value="1">Land1</option>
		<option value="2">Land2</option>
		<option value="3">Land3</option>
		<option value="4">Land4</option>
	</select>

	<input type="button" id="btnClone" value="Add" />
	
	<br><br>

	<!-- <label>Select Member</label> -->
	<select onchange="myFunction(this)" name="spouse_0" id="spouse_0">
		<option  value="+1">Please Select</option>
		<option  value="1">Spouse1</option>
		<option  value="2">Spouse2</option>
		<option  value="3">Spouse3</option>
		<option  value="4">Spouse4</option>
	</select>

	<!-- <label>Add Percentage</label>--><input type="text" id="thiru_0" class="fam_class" name="thiru_0">
	
</div>

<div id="container">
</div>

<br><br>

<button type="submit" id="submit" style="display:none">Submit</button>
</form>

<script type="text/javascript" src="http://localhost/oneclick/trunk/js/jquery.min.js"></script>
<script type="text/javascript">
	function myFunction(data)
	{
		//console.log($(data).attr("selected",true).val());
		
	}
   $(function () {
	 



        $("#btnClone").bind("click", function () {
			
            var select = $("#container select").length + 1;
			var select1 = $("#container select").length;
            var input = $("#container input").length + 1;
			//var input1 = $("#container input").length+1;
			//alert(select);
			
            //Clone the DropDownList
            //var ddl = $("#property").clone();
            var dd2 = $("#spouse_" + select1).clone();
			var dd3 = $("#thiru_0").clone();
			
            
            //Set the ID and Name
	
			dd2.attr("id", "spouse_" + select);
			dd2.attr("name", "spouse_" + select);
			
			dd3.attr("id", "thiru_" + input);
			dd3.attr("name", "thiru_" + input);
			
			//alert("spouse_" + select+" option:selected");
			//$("spouse_" + select+" option:selected").remove();
			
			
			//[OPTIONAL] Copy the selected value
			var selectedValue = $("#spouse_" + select1+" option:selected").val();
			//alert(selectedValue);
			//ddl.find("option[value = '" + selectedValue + "']").attr("selected", "selected");
			dd2.find("option[value = '" + selectedValue + "']").remove();
			//$("#spouse_0").find("option[value = '" + selectedValue + "']").remove();
			
			var array = [];
		
			for(var i=0;i<input;i++)
			{
				p = parseInt($("#thiru_"+i).val());
			}
			for(var j=0;j<select;j++)
			{
				s = parseInt($("#spouse_"+j).val());
			}
			
			var t = 0;
			for(var i=0;i<input;i++)
			{
				t = t + parseInt($("#thiru_"+i).val());
			}
			
			if(t < 100)
			{
			
				//Append to the DIV.
				$("#container").append(dd2);
				$("#container").append(dd3);
				$( "#thiru_" + input).val('');
				
				//alert("#spouse_" + select1);
				$( "#spouse_" + select1).prop('disabled','disabled');
				$("#container").append("<br /><br />");
				array.push({per:p,mem:s,sum:t});
				console.log(array);
				
			}
			else if(t == 100 )
			{
				array.push({per:p,mem:s,sum:t});
				console.log(array);
				$("#btnClone").hide();
				$("#submit").show();
			}
			else if(Number.isNaN(t))
			{
				alert('Empty rows');
			}
			else if(t > 100)
			{
				alert('Above 100');
			}
			
        });
		
	});
	
</script>
</body>
</html>