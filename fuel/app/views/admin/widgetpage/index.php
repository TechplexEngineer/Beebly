<h2>Listing Widgetpages</h2>
<br>
<?php if ($widgetpages): ?>
<table class="zebra-striped">
	<thead>
		<tr>
			<th>Widget id</th>
			<th>Page id</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($widgetpages as $widgetpage): ?>		<tr>

			<td><?php echo $widgetpage->widget_id; ?></td>
			<td><?php echo $widgetpage->page_id; ?></td>
			<td>
				<?php echo Html::anchor('admin/widgetpage/view/'.$widgetpage->id, 'View'); ?> |
				<?php echo Html::anchor('admin/widgetpage/edit/'.$widgetpage->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/widgetpage/delete/'.$widgetpage->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Widgetpages.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/widgetpage/create', 'Add new Widgetpage', array('class' => 'btn success')); ?>

</p>
