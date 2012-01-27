<?php if (Session::get_flash('success')): ?>
    <div class="alert-message success">
        <p>
	    <?php echo implode('</p><p>', (array) Session::get_flash('success')); ?>
        </p>
    </div>
<?php endif; ?>
<?php if (Session::get_flash('error')): ?>
    <div class="alert-message error">
        <p>
	    <?php echo implode('</p><p>', (array) Session::get_flash('error')); ?>
        </p>
    </div>
<?php endif; ?>