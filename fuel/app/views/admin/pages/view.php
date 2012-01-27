<h2>Viewing #<?php echo $page->id; ?></h2>

<p>
	<strong>Title:</strong>
	<?php echo $page->title; ?></p>
<p>
	<strong>Slug:</strong>
	<?php echo $page->slug; ?></p>
<p>
	<strong>Description:</strong>
	<?php echo $page->description; ?></p>
<p>
	<strong>Meta:</strong>
	<?php echo $page->meta; ?></p>
<p>
	<strong>Body:</strong>
	<?php echo $page->body; ?></p>

<?php echo Html::anchor('admin/pages/edit/'.$page->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/pages', 'Back'); ?>