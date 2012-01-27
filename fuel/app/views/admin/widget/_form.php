<?php echo Form::open(array('class' => 'form-stacked')); ?>

	<fieldset>
		<div class="clearfix">
			<?php echo Form::label('Name', 'name'); ?>

			<div class="input">
				<?php echo Form::input('name', Input::post('name', isset($widget) ? $widget->name : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Description', 'description'); ?>

			<div class="input">
				<?php echo Form::input('description', Input::post('description', isset($widget) ? $widget->description : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Code', 'code'); ?>

			<div class="input">
				<?php echo Form::textarea('code', Input::post('code', isset($widget) ? $widget->code : ''), array('class' => 'span10', 'rows' => 8)); ?>

			</div>
		</div>
<!--		<div class="clearfix">
			<?php echo Form::label('Page', 'page_id'); ?>
		    <small>What page does this widget go on</small>
			<div class="input">
				<?php //echo Form::input('user_id', Input::post('user_id', isset($post) ? $post->user_id : ''), array('class' => 'span6')); ?>
				<?php echo Form::select('page_id', Input::post('page_id', isset($post) ? Model_Page::find($post->page_id) : ''), $pages, array('class' => 'span6')); ?>

			</div>
		</div>-->
		<div class="actions">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn primary')); ?>

		</div>
	</fieldset>
<?php echo Form::close(); ?>