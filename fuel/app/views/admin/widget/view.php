<h2>Viewing #<?php echo $widget->id; ?></h2>

<p>
	<strong>Name:</strong>
	<?php echo $widget->name; ?></p>
<p>
	<strong>Description:</strong>
	<?php echo $widget->description; ?></p>
<p>
	<strong>Code:</strong>
	<?php echo $widget->code; ?></p>

<?php echo Html::anchor('admin/widget/edit/'.$widget->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/widget', 'Back'); ?>