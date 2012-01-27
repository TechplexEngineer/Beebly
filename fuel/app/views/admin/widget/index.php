<h2>Listing Widgets</h2>
<br>
<?php if ($widgets): ?>
    <table class="zebra-striped">
        <thead>
    	<tr>
    	    <th>ID</th>
    	    <th>Name</th>
    	    <th>Description</th>
    	    <th>Code</th>
<!--    	    <th>Page ID</th>-->
	    <th></th>
    	</tr>
        </thead>
        <tbody>
	    <?php foreach ($widgets as $widget): ?>		<tr>
		    <td><?php echo $widget->id; ?></td>
		    <td><?php echo $widget->name; ?></td>
		    <td><?php echo $widget->description; ?></td>
		    <td><?php echo $widget->code; ?></td>
		    <td>
			<?php echo Html::anchor('admin/widget/view/' . $widget->id, 'View'); ?> |
			<?php echo Html::anchor('admin/widget/edit/' . $widget->id, 'Edit'); ?> |
			<?php echo Html::anchor('admin/widget/delete/' . $widget->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

		    </td>
		</tr>
	    <?php endforeach; ?>	</tbody>
    </table>

<?php else: ?>
    <p>No Widgets.</p>

<?php endif; ?><p>
    <?php echo Html::anchor('admin/widget/create', 'Add new Widget', array('class' => 'btn success')); ?>

</p>
