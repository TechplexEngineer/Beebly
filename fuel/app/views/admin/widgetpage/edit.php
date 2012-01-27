<h2>Editing Widgetpage</h2>
<br>

<?php echo render('admin/widgetpage/_form'); ?>
<p>
	<?php echo Html::anchor('admin/widgetpage/view/'.$widgetpage->id, 'View'); ?> |
	<?php echo Html::anchor('admin/widgetpage', 'Back'); ?></p>
