<?php
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // get var from form
    $id = $_POST['itemid'];
    $name = $_POST['name'];
    $desc = $_POST['description'];
    $price = $_POST['price'];
    $country = $_POST['country'];
    $status = $_POST['status'];
    $member = $_POST['member'];
    $category = $_POST['category'];
    // validate form
    $formErrors = array();
    if(empty($name)){$formErrors[] = 'item Name can not be empty';}
    if(empty($price)){$formErrors[] = 'item price can not be empty';}
    if(empty($country)){$formErrors[] = 'item country can not be empty';}
   
?>
<div class="container">
  <h1 class="text-center">Update Item</h1>
  <?php 
    if(empty($formErrors)){
      // update query
      $stmt = $db->prepare("UPDATE items SET Name = ?, Description = ?, Price = ?, Country_Made = ?, Status = ?, Member_ID = ?, Cat_ID = ? WHERE Item_ID = ?");
      $stmt->execute(array($name, $desc, $price, $country, $status, $member, $category, $id)); 
      $Msg = "<div class='alert alert-success'>Item Updated</div>";
      redirectLink($Msg, 'back', 4);
      
    } else {
    // Show Errors
  ?>
    <div class="alert alert-danger">
      <ul>
      <?php foreach($formErrors as $error) { ?>
        <li><?php echo $error; ?></li>
      <?php } ?>
      </ul>
    </div>
  <?php
    }
  ?>
</div>
<?php 
  } else {
    $errorMsg = "<div class='alert alert-danger'>You Can not Browse This Page Directly.</div>";
    redirectLink($errorMsg, 6);
  }
?>
