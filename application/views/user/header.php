<html>
<head>
<title></title>
<link rel = "Stylesheet" type="text/css" href="<?php  echo base_url('css/bootstrap.min.css'); ?>" > 

</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo base_url(); ?>">Home Page</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
	<ul class="nav navbar-nav">
	 <li class=""><a href="<?php echo base_url(); ?>family">Family</a></li>
	</ul>
	<ul class="nav navbar-nav">
	 <li class=""><a href="?php echo base_url(); ?>lawyers">Lawyers</a></li>
	</ul>
	<ul class="nav navbar-nav">
	 <li class=""><a href="?php echo base_url(); ?>doctor">Doctor</a></li>
	</ul>
      <ul class="nav navbar-nav">
      <li class="dropdown">
     <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="true">Property <span class="caret"></span></a>
        <ul class="dropdown-menu" role="menu">
          <li><a href="<?php echo base_url(); ?>display_immov">List of Immovable Property</a></li>
          <li><a href="<?php echo base_url(); ?>display_mov">List of Movable Property</a></li>
          <li><a href="<?php echo base_url(); ?>credentials">Allocate Immovable Property</a></li>
          <li><a href="<?php echo base_url(); ?>credentials">Allocate Movable Property</a></li>
          <li><a href="<?php echo base_url(); ?>credentials">Non allocated Property</a></li>
        </ul>
      </li>
 	</ul>

 	<?php  if(isset($this->session->userdata['is_userlogged_in']['email'])) { ?>

    <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo base_url(); ?>logout">SignOut</a></li>
    </ul>
      
    <ul class="nav navbar-nav navbar-right">
    	<li><a href="<?php echo base_url('user/change_pass'); ?> ">Change Password</a></li>
	</ul>

    <?php } ?>
    
    </div>
  </div>
</nav>
