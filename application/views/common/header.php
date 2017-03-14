

<p id="account">

<?php if (Auth::instance()->logged_in() && $user = Auth::instance()->get_user()) : ?>
Logged in as <?php echo $user->username; echo " - ".HTML::anchor('logout', 'Logout'); ?>

<?php else: ?>

<ul id="main_nav">
   <li><a href="<?php echo URL::site('login'); ?>">Login</a></li>
   <li><a href="<?php echo URL::site('signup'); ?>">Register</a></li>
</ul>



<?php endif; ?>
</p>