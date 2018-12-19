<!DOCTYPE html>
<html class="no-js">
	<head>	
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Taktii | Back To Basics</title>
	<link rel="shortcut icon" href="<?= base_url()?>assest/img/logo-dark4.png" sizes="16x16" >
	<meta name="description" content="Taktii - HTML5 Bootstrap App Landing Page">
	<meta name="keywords" content="Taktii, Bootstrap, Landing page, HTML5 Template, App landing page, App, Mobile">
	<meta name="author" content="Oscodo">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="<?= base_url()?>assest/css/main.css">
	<link rel="stylesheet" href="<?= base_url()?>assest/css/teacherbatch.css">
</head>
<body>
<div class="navbar navbar-default navbar-fixed-top" style="height:70px;">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navscroll"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
				<a class="navbar-brand" href="#home" title="Dove - Modern Start Up landing Page"><img src="<?= base_url()?>assest/img/logo-dark2.png" width="82" height="40" alt="Dove"></a> </div>
			<div class="navbar-collapse collapse navscroll">
				<div class="navbar-form navbar-right"> <a href="https://play.google.com/store/apps/details?id=com.takktistudentapp" title="Download App Now" class="btn btn-default download-link"><i class="icon_cloud-download_alt"></i> Download Taktii App</a> </div>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="teacherabout.html">About</a></li>
					<li><a href="<?= base_url()?>home_controller/teacher_running_batch_detail/<?php echo $batchinfo["id"]?>">Running Batches</a></li>
					<li><a href="teacherUpcomingBatch.html">Upcoming Batches</a></li>
					<li><a href="teacherTreasureBox.html">Tresure Box</a></li>
					<li><a href="teacherStarAchievers.html">Star Achievers</a></li>
					<li><a href="index.html">Back to Taktii</a></li>
				</ul>
			</div>
		</div>
	</div>