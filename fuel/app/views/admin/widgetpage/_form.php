<?php echo Form::open(array('class' => 'form-stacked')); ?>

	<fieldset>
		<div class="clearfix">
			<?php echo Form::label('Widget id', 'widget_id'); ?>

			<div class="input">
				<?php echo Form::input('widget_id', Input::post('widget_id', isset($widgetpage) ? $widgetpage->widget_id : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="clearfix">
			<?php echo Form::label('Page id', 'page_id'); ?>

			<div class="input">
				<?php echo Form::input('page_id', Input::post('page_id', isset($widgetpage) ? $widgetpage->page_id : ''), array('class' => 'span6')); ?>

			</div>
		</div>
		<div class="actions">
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn primary')); ?>

		</div>
	</fieldset>
<?php echo Form::close(); ?>