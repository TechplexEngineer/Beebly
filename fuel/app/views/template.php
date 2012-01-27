<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $ptitle; ?></title>
	<?php echo Asset::css('bootstrap.css'); ?>
	<link type="text/plain" rel="author" href="<?php echo Asset::find('humans.txt'); ?>" />
	<style>
		body { margin: 50px; }
	</style>
	<?php echo Asset::js(array(
		'http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js',
		'bootstrap.js'
	)); ?>
	<script>
		$(function(){ $('.topbar').dropdown(); });
	</script>
</head>
<body>
	
	<?php if (isset($current_user)): ?>
	<div class="topbar">
	    <div class="fill">
	        <div class="container">
	            <h3><?php echo Html::anchor('/', 'My Site', array('title' => 'View the Site')) ?></h3>
	            <ul>
	                <li class="<?php echo Uri::segment(1) == 'admin' ? 'active' : '' ?>">
						<?php echo Html::anchor('admin', 'Dashboard') ?>
					</li>
	                
					<?php foreach (glob(APPPATH.'classes/controller/admin/*.php') as $controller): ?>
						
						<?php
						$section_segment = basename($controller, '.php');
						$section_title = Inflector::humanize($section_segment);
						?>
						
	                <li class="<?php echo Uri::segment(2) == $section_segment ? 'active' : '' ?>">
						<?php echo Html::anchor('admin/'.$section_segment, $section_title) ?>
					</li>
					<?php endforeach; ?>
	          </ul>

	          <ul class="nav secondary-nav">
	            <li class="menu">
	                <a href="#" class="menu"><?php echo $current_user->username ?></a>
	                <ul class="menu-dropdown">
	                    <li><?php echo Html::anchor('admin/logout', 'Logout') ?></li>
	                </ul>
	            </li>
	          </ul>
	        </div>
	    </div>
	</div>
	<?php endif; ?>
	
	<div class="container">
		<div class="row">
			<div class="span16">
<?php if (isset($title)): ?>
				<h1><?php echo $title; ?></h1>
				<hr/>
<?php endif; ?>
<?php if (Session::get_flash('success')): ?>
				<div class="alert-message success">
					<p>
					<?php echo implode('</p><p>', (array) Session::get_flash('success')); ?>
					</p>
				</div>
<?php endif; ?>
<?php if (Session::get_flash('error')): ?>
				<div class="alert-message error">
					<p>
					<?php echo implode('</p><p>', (array) Session::get_flash('error')); ?>
					</p>
				</div>
<?php endif; ?>
			</div>
			<div class="span16">
<?php echo $content; ?>
			</div>
		</div>
		<?php  echo View::forge('parts/footer',array('id'=>@$id));  ?>
	</div>
</body>
</html>
