<?php 
if (isset($post)){ 
//echo var_dump($post);
}
else {
  $post = array(
          "username" => "",
          "password" => "",
          "email" => "",
          "password_confirm" => "",
          );
}
?>

<?php 
echo Form::open(); ?>
       <div class="form-field">
             <?php if (isset($errors)) : ?>
                <div class="hint"><?php echo $errors["username"]; ?></div>
             <?php endif; ?>        
             <?php echo Form::label('username', 'Username')?>
             <?php echo Form::input('username',$post["username"]); ?>
  
       </div>
       <div class='break'></div>
       <div class="form-field">
             <?php if (isset($errors)) : ?>
                <div class="hint"><?php echo $errors["email"]; ?></div>
             <?php endif; ?>        
              <?php echo Form::label('email', 'Email Address')?>
              <?php echo Form::input('email',$post["email"]); ?>
            
       </div>
       <div class='break'></div>
       <div class="form-field">
             <?php echo Form::label('password', 'Password')?>
             <?php echo Form::password('password',$post["password"]); ?>
       </div>
      <div class="form-field">
      <div class='break'></div>
               <?php echo Form::label('password_confirm', 'Confirm Password')?>
               <?php echo Form::password('password_confirm',$post["password_confirm"]); ?>
      </div>
      <div class='break'></div>
      <div class="form-field">
              <?php echo Form::submit('submit', 'Create new account'); ?>
      </div>
<?php echo Form::close(); ?>
<div class='break'></div>