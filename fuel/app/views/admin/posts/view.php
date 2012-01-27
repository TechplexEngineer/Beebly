<h2><?php echo $post->title ?></h2>
 
<p>
   <strong>Posted: </strong><?php echo date('nS F, Y', $post->created_at) ?> (<?php echo Date::time_ago($post->created_at)?>)
   by <?php echo $post->user->username ?>
</p>
 
<p><?php echo nl2br($post->body) ?></p>



<?php if(false): ?>
<h2>Viewing #<?php echo $post->id; ?></h2>

<p>
	<strong>Title:</strong>
	<?php echo $post->title; ?></p>
<p>
	<strong>Slug:</strong>
	<?php echo $post->slug; ?></p>
<p>
	<strong>Summary:</strong>
	<?php echo $post->summary; ?></p>
<p>
	<strong>Body:</strong>
	<?php echo $post->body; ?></p>
<p>
	<strong>User id:</strong>
	<?php echo $post->user_id; ?></p>

<?php echo Html::anchor('admin/posts/edit/'.$post->id, 'Edit'); ?> |
<?php echo Html::anchor('admin/posts', 'Back'); ?>
<?php endif; ?>