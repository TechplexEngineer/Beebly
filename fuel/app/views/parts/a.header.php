<?php if (isset($current_user)): ?>
    <div class="topbar">
        <div class="fill">
    	<div class="container">
    	    <h3><?php echo Html::anchor('/', 'My Site', array('title' => 'View the Site')) ?></h3>
    	    <ul>
    		<li class="<?php echo Uri::segment(1) == 'admin' ? 'active' : '' ?>">
			<?php echo Html::anchor('admin', 'Dashboard') ?>
    		</li>

		    <?php foreach (glob(APPPATH . 'classes/controller/admin/*.php') as $controller): ?>

			<?php
			$section_segment = basename($controller, '.php');
			$section_title = Inflector::humanize($section_segment);
			?>

			<li class="<?php echo Uri::segment(2) == $section_segment ? 'active' : '' ?>">
			    <?php echo Html::anchor('admin/' . $section_segment, $section_title) ?>
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