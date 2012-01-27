<h2>Viewing #<?php echo $setting->id; ?></h2>

<p>
	<strong>Name:</strong>
	<?php echo $setting->name; ?></p>
<p>
	<strong>Value:</strong>
	<?php echo $setting->value; ?></p>
<p>
	<strong>Description:</strong>
	<?php echo $setting->description; ?></p>

<?php echo Html::anchor('admin/settings/edit/'.$setting->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/settings', 'Back'); ?>