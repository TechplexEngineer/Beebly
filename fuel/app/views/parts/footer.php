<?php
/*
 *    Document   : footer.php
 *    Created on : Jan 26, 2012, 10:42:28 PM
 *    Author     : Techplex Engineer <Techplex.Engineer@gmail.com>
 *    Description: Purpose of the document as follows.
 */
?>
<footer>
    <div class="row">
	<p class="span8">
	    <small>Beebly v:<?php echo e(Beebly::VERSION); ?> Based on <a href="http://fuelphp.com">FuelPHP</a> v:<?php echo e(Fuel::VERSION); ?></small> 

	</p>

	<p class="span8" style="text-align: right;">
	    <small>Page rendered in {exec_time}s using {mem_usage}mb of memory.</small><br/>
	    <?php
	    if (Auth::check()){
		echo  (Uri::segment(1) !== 'admin' ) ? Html::anchor('admin', "admin") ." | " : '';
		echo Html::anchor('admin/logout', "logout");
		echo (isset($id)) ? " | " . Html::anchor('admin/pages/edit/' . $id, "edit") : '';	
	    }
	    else if(Uri::segment(2) !== 'login' ) //Don't show on login page
		echo Html::anchor('admin', "Admin login");
	    ?>
	</p>
    </div>
</footer>