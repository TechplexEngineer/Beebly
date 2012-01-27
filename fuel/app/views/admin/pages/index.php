<h2>Listing Pages</h2>
<br>
<?php if ($pages): ?>
    <table class="zebra-striped">
        <thead>
    	<tr>
    	    <th>ID</th>
    	    <th>Title</th>
    	    <th>Slug</th>
    	    <th>Description</th>
    	    <th>Meta</th>
    	    <th>Body</th>
    	    <th></th>
    	</tr>
        </thead>
        <tbody>
	    <?php foreach ($pages as $page): ?>		<tr>
		    <td><?php echo $page->id; ?></td>
		    <td><?php echo $page->title; ?></td>
		    <td><?php echo $page->slug; ?></td>
		    <td><?php echo $page->description; ?></td>
		    <td><?php echo $page->meta; ?></td>
		    <td><?php echo $page->body; ?></td>
		    <td>
			<?php echo Html::anchor('page/view/' . $page->slug, 'View'); ?> |
			<?php echo Html::anchor('admin/pages/edit/' . $page->id, 'Edit'); ?> |
			<?php echo Html::anchor('admin/pages/delete/' . $page->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

		    </td>
		</tr>
	    <?php endforeach; ?>	</tbody>
    </table>

<?php else: ?>
    <p>No Pages.</p>

<?php endif; ?><p>
    <?php echo Html::anchor('admin/pages/create', 'Add new Page', array('class' => 'btn success')); ?>

</p>
