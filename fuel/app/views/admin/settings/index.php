<h2>Listing of Settings</h2>
<br>
<?php if ($settings): ?>
<table class="zebra-striped">
	<thead>
		<tr>
			<th>Name</th>
			<th>Value</th>
			<th>Description</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($settings as $setting): ?>		<tr>

			<td><?php echo $setting->name; ?></td>
			<td><?php echo $setting->value; ?></td>
			<td><?php echo $setting->description; ?></td>
			<td>
				<?php echo Html::anchor('admin/settings/view/'.$setting->id, 'View'); ?> |
				<?php echo Html::anchor('admin/settings/edit/'.$setting->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/settings/delete/'.$setting->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Settings.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/settings/create', 'Add new Setting', array('class' => 'btn success')); ?>

</p>
