<h2>Viewing #<?php echo $widgetpage->id; ?></h2>

<p>
	<strong>Widget id:</strong>
	<?php echo $widgetpage->widget_id; ?></p>
<p>
	<strong>Page id:</strong>
	<?php echo $widgetpage->page_id; ?></p>

<?php echo Html::anchor('admin/widgetpage/edit/'.$widgetpage->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/widgetpage', 'Back'); ?>