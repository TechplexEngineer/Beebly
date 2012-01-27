<?php echo Form::open(array('class' => 'form-stacked')); ?>

<fieldset>
    <div class="clearfix">
	<?php echo Form::label('Username', 'username'); ?>

	<div class="input">
	    <?php echo Form::input('username', Input::post('username', isset($user) ? $user->username : ''), array('class' => 'span6')); ?>

	</div>
    </div>
    <div class="clearfix">
	<?php echo Form::label('Group', 'group'); ?>

	<div class="input">
	    <?php echo Form::input('group', Input::post('group', isset($user) ? $user->group : ''), array('class' => 'span6')); ?>

	</div>
    </div>
    <div class="clearfix">
	<?php echo Form::label('Email', 'email'); ?>

	<div class="input">
	    <?php echo Form::input('email', Input::post('email', isset($user) ? $user->email : ''), array('class' => 'span6')); ?>

	</div>
    </div>
    <div class="actions">
	<?php echo Form::submit('submit', 'Save', array('class' => 'btn primary')); ?>

    </div>
</fieldset>
<?php echo Form::close(); ?>