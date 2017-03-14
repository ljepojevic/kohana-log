<?php echo Form::open(); ?>
   <?php echo Form::label('username', 'Username')?>
   <?php echo Form::input('username'); ?>
   <div class='break'></div>
   <?php echo Form::label('password', 'Password')?>
   <?php echo Form::password('password'); ?>
   <div class='break'></div>
   <?php echo Form::submit('submit', 'Login'); ?>
<?php echo Form::close(); ?>