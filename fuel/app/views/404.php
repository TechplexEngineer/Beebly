<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Error 404 - Page not found</title>
	<?php echo Asset::css('bootstrap.css'); ?>
	<style>
		#logo{
			display: block;
			background-image: url(<?php echo Asset::find('FuelLogo.png'); ?>);
			width: 179px;
			height: 45px;
			position: relative;
			top: 15px;
		}
		#header{
			background-image: url(<?php echo Asset::find('bg.jpg'); ?>);
			height: 75px;
			width: 100%;
			margin-bottom: 40px;
		}
		#header .row{
			width: 940px;
			margin: 0 auto;
		}
		a{
			color: #883ced;
		}
		a:hover{
			color: #af4cf0;
		}
		.btn.primary{
			color:#ffffff!important;
			background-color:#883ced;
			background-repeat:repeat-x;
			background-image:-khtml-gradient(linear, left top, left bottom, from(#fd6ef7), to(#883ced));
			background-image:-moz-linear-gradient(top, #fd6ef7, #883ced);
			background-image:-ms-linear-gradient(top, #fd6ef7, #883ced);
			background-image:-webkit-gradient(linear, left top, left bottom, color-stop(0%, #fd6ef7), color-stop(100%, #883ced));
			background-image:-webkit-linear-gradient(top, #fd6ef7, #883ced);
			background-image:-o-linear-gradient(top, #fd6ef7, #883ced);
			background-image:linear-gradient(top, #fd6ef7, #883ced);
			filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#fd6ef7', endColorstr='#883ced', GradientType=0);
			text-shadow:0 -1px 0 rgba(0, 0, 0, 0.25);
			border-color:#883ced #883ced #003f81;
			border-color:rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);}
		body { 
			margin: 0px 0px 40px 0px; 
		}
		.large{
			font-size: 54px;
		}
	</style>
</head>
<body>
	<div id="header">
		<div class="row">
			<div id="logo"></div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="span16">
				<h1><?php echo e($subTitle); ?> <small>We can't find that!</small></h1>
				<hr>
				<span class="large">404 </span><span> This error has been recorded.</span>
				<p><?php echo Html::anchor('/', 'Go back Home')?></p>
			</div>
		</div>
		<footer>
			<p class="pull-right">Page rendered in {exec_time}s using {mem_usage}mb of memory.</p>
			<p>
				<a href="http://fuelphp.com">FuelPHP</a> is released under the MIT license.<br>
				<small>Version: <?php echo e(Fuel::VERSION); ?></small>
			</p>
		</footer>
	</div>
</body>
</html>
