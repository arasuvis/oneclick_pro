<script type="text/javascript">
  var dn = '<?= SITE_DOMAIN ?>';
  var hd = 'tree/handler.php';
  var sconnects = 'tree/savecon.php';
  var lhandler = 'tree/load.php';
  var chandler = 'tree/lconnects.php';
  var strokeColor = '#005b0f';
  var hoverPaintStyle = '#ff0000';
  var strokeLineWidth = 1;
  var hoverstrokeLineWidth = 2;
  var connectStyle = '<?= $connectStyle ?>'; // Bezier, StateMachine, Flowchart,
  var offsetdiff = 20; // horizontal space between two nodes
  var defaultUName = '<?= $userName; ?>';
  var defaultFName = '<?= $firstName; ?>';
  var defaultSName = '<?= $lastName; ?>';
  var redirectPageName = '<?= $pageName ?>';
  var familyID = '<?= $familyID ?>';
  var msgLabel = 'treemsg';
  <?php 
	   if($smoothScroll)
		  echo "var smoothScroll = true;\n";
		else
		  echo "var smoothScroll = false;\n";
		  
		if($readOnly)
		   echo "var readOnly = true;\n";
		else if (!$isEditable)
		   echo "var readOnly = true;\n";
		else
		   echo "var readOnly = false;\n";
  ?>
</script>