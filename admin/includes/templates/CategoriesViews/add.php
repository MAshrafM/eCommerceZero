<h1 class="text-center">Add Category</h1>
<div class="container">
  <form class="form-horizontal" action="?v=Insert" method="POST">
    <!-- name field -->
    <div class="form-group">
      <label class="col-sm-2 control-label">Name</label>
      <div class="col-sm-10">
        <input type="text" name="name" class="form-control" autocomplete="off" required="required" />
      </div>
    </div>
    <!-- Description field -->
    <div class="form-group">
      <label class="col-sm-2 control-label">Description</label>
      <div class="col-sm-10">
        <textarea type="text" name="description" class="form-control"></textarea>
      </div>
    </div>
    <!-- Ordering field -->
    <div class="form-group">
      <label class="col-sm-2 control-label">Ordering</label>
      <div class="col-sm-10">
        <input type="text" name="ordering" class="form-control" />
      </div>
    </div>
    <!-- Type Field -->
    <div class="form-group">
      <label class="col-sm-2 control-label">Parent ?</label>
      <div class="col-sm-10">
        <select name="parent">
          <option value="0">None</option>
          <?php 
            $allCats = get("*", "categories", "WHERE parent = 0", "ID");
            foreach($allCats as $cat){
          ?>
            <option value="<?php echo $cat['ID'];?>"><?php echo $cat['Name'];?></option>
            <?php } ?>
        </select>
      </div>
    </div>
    <!-- Visible field -->
    <div class="form-group">
      <label class="col-sm-2 control-label">Visible</label>
      <div class="col-sm-10">
        <div>
          <input id="vis-yes" type="radio" name="visible" value="0" checked />
          <label for="vis-yes">Yes</label>
        </div>
        <div>
          <input id="vis-no" type="radio" name="visible" value="1" />
          <label for="vis-no">No</label>
        </div>
      </div>
    </div> 
    <!-- Visible field -->
    <div class="form-group">
      <label class="col-sm-2 control-label">Allow Comments</label>
      <div class="col-sm-10">
        <div>
          <input id="com-yes" type="radio" name="commenting" value="0" checked />
          <label for="com-yes">Yes</label>
        </div>
        <div>
          <input id="com-no" type="radio" name="commenting" value="1" />
          <label for="com-no">No</label>
        </div>
      </div>
    </div>  
    <!-- Visible field -->
    <div class="form-group">
      <label class="col-sm-2 control-label">Allow Ads</label>
      <div class="col-sm-10">
        <div>
          <input id="ads-yes" type="radio" name="ads" value="0" checked />
          <label for="ads-yes">Yes</label>
        </div>
        <div>
          <input id="ads-no" type="radio" name="ads" value="1" />
          <label for="ads-no">No</label>
        </div>
      </div>
    </div>    
    <!-- submit field -->
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <input type="submit" value="Add Category" class="btn btn-primary" />
      </div>
    </div>
  </form>
</div>