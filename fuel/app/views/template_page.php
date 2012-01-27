<!DOCTYPE html>
<html>
    <head>
	<meta charset="utf-8">
	<?php
//@TODO should validate meta tags to prevent errors
	echo @$meta;

	if (isset($descritpion)) {
	    echo '<meta name="description" content="' . $descritpion . '">';
	}
	?>
	<title><?php echo $title; ?></title>
	<?php echo Asset::css('bootstrap.css'); ?>
	<link type="text/plain" rel="author" href="<?php echo Asset::find('humans.txt'); ?>" />
	<style>
	    body { margin: 50px; }
	</style>
	<?php
	echo Asset::js(array(
	    'http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js',
	    'bootstrap.js'
	));
	?>
	<script>
	    $(function(){ $('.topbar').dropdown(); });
	</script>
    </head>
    <body>



	<div class="container">
	    <div class="row">
		<div class="span16">
		    <?php if (isset($title)): ?>
    		    <h1><?php echo $title; ?></h1>
    		    <hr/>
		    <?php endif; ?>
		    <!--Messages Go here-->
		    <?php  echo View::forge('parts/messages');  ?>
		</div>
		<div class="span16">
		    <?php echo $content; ?>
		</div>
	    </div>
	<?php  echo View::forge('parts/footer',array('id'=>@$id));  ?>
	</div>
    </body>
</html>
