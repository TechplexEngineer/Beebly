<h2>Editing Widget</h2>
<br>

<?php echo render('admin/widget/_form'); ?>
<p>
	<?php echo Html::anchor('admin/widget/view/'.$widget->id, 'View'); ?> |
	<?php echo Html::anchor('admin/widget', 'Back'); ?>
</p>
