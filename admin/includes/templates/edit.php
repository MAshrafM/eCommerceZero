<h1 class="text-center"><?php echo lang('EDIT').' '.lang('MEMBERS'); ?></h1>
<div class="container">
  <form class="form-horizontal">
    <!-- username field -->
    <div class="form-group">
      <label class="col-sm-2 control-label"><?php echo lang('USERLOGIN'); ?></label>
      <div class="col-sm-10">
        <input type="text" name="username" class="form-control" autocomplete="off" />
      </div>
    </div>
    <!-- fullname field -->
    <div class="form-group">
      <label class="col-sm-2 control-label"><?php echo lang('FULLNAME'); ?></label>
      <div class="col-sm-10">
        <input type="text" name="FullName" class="form-control" />
      </div>
    </div>
    <!-- Email field -->
    <div class="form-group">
      <label class="col-sm-2 control-label"><?php echo lang('EMAIL'); ?></label>
      <div class="col-sm-10">
        <input type="email" name="email" class="form-control" />
      </div>
    </div>
    <!-- password field -->
    <div class="form-group">
      <label class="col-sm-2 control-label"><?php echo lang('PASSLOGIN'); ?></label>
      <div class="col-sm-10">
        <input type="password" name="password" class="form-control" autocomplete="new-password" />
      </div>
    </div>   
    <!-- submit field -->
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <input type="submit" value="<?php echo lang('SAVE'); ?>" class="btn btn-primary" />
      </div>
    </div>
  </form>
</div>