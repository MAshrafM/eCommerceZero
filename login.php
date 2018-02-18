<?php
  include 'init.php';
  
  
?>
<div class="container login-page">
  <h4 class="text-center">
    <span class="login">Login</span> | <span class="signup">Signup</span>
  </h4>
  <form class="login">
    <input class="form-control" type="text" name="user" placeholder="<?php echo lang('USERLOGIN'); ?>" autocomplete="off" />
    <input class="form-control" type="password" name="password" placeholder="<?php echo lang('PASSLOGIN'); ?>" autocomplete="new-password" />
    <input class="btn btn-primary btn-block" type="submit" value="<?php echo lang('LOGIN'); ?>" />
  </form>
  <form class="signup">
    <input class="form-control" type="text" name="user" placeholder="<?php echo lang('USERLOGIN'); ?>" autocomplete="off" />
    <input class="form-control" type="password" name="password" placeholder="<?php echo lang('PASSLOGIN'); ?>" autocomplete="new-password" />
    <input class="form-control" type="password" name="password2" placeholder="Repeat <?php echo lang('PASSLOGIN'); ?>" autocomplete="new-password" />
    <input class="form-control" type="email" name="email" placeholder="<?php echo lang('EMAIL'); ?>" autocomplete="new-password" />
    <input class="btn btn-success btn-block" type="submit" value="Signup" />
  </form> 
  
</div>
<?php include $tpl."footer.php"; ?>