<h2>Viewing User ID#<?php echo $user->id; ?></h2>

<p>
    <strong>Name:</strong>
    <?php echo $user->username; ?>
</p>
<p>
    <strong>Group:</strong>
    <?php echo $user->group; ?>
</p>
<p>
    <strong>Email:</strong>
    <?php echo $user->email; ?>
</p>
<p>
    <strong>last_login:</strong>
    <?php echo $user->last_login; ?>
</p>

<?php echo Html::anchor('admin/users/edit/' . $user->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/users', 'Back'); ?>

