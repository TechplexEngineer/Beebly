<h2>Listing of Users</h2>
<br>
<?php if ($users): ?>
    <table class="zebra-striped">
        <thead>
    	<tr>
    	    <th>ID</th>
    	    <th>Username</th>
    	    <th>Group</th>
    	    <th>Email</th>
	    <th>Last Login</th>
<!--    	    <th>Page ID</th>-->
	    <th></th>
    	</tr>
        </thead>
        <tbody>
	    <?php foreach ($users as $user): ?>		<tr>
		    <td><?php echo $user->id; ?></td>
		    <td><?php echo $user->username; ?></td>
		    <td><?php echo $user->group; ?></td>
		    <td><?php echo $user->email; ?></td>
		    <td><?php echo $user->last_login; ?></td>
		    <td>
			<?php echo Html::anchor('admin/users/view/' . $user->id, 'View'); ?> |
			<?php echo Html::anchor('admin/users/edit/' . $user->id, 'Edit'); ?> |
			<?php echo Html::anchor('admin/users/delete/' . $user->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

		    </td>
		</tr>
	    <?php endforeach; ?>	</tbody>
    </table>

<?php else: ?>
    <p>No Users.</p>

<?php endif; ?><p>
    <?php echo Html::anchor('admin/users/create', 'Add new User', array('class' => 'btn success')); ?>

</p>
