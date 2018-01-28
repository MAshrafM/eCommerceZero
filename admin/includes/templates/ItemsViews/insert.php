<?php
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // get var from form
    $name = $_POST['name'];
    $desc = $_POST['description'];
    $price = $_POST['price'];
    $country = $_POST['country'];
    $status = $_POST['status'];
    // validate form
    $formErrors = array();
    if(empty($name)){$formErrors[] = 'Item Name can not be empty';}
    if(empty($desc)){$formErrors[] = 'Item Description can not be empty';}
    if(empty($price)){$formErrors[] = 'Item Price can not be empty';}
    if(empty($country)){$formErrors[] = 'Item country can not be empty';}
?>
<div class="container">
  <h1 class="text-center">Update Item</h1>
  <?php 
    if(empty($formErrors)){  
      // Insert Category
      $stmt = $db->prepare("INSERT INTO items(Name, Description, Price, Country_Made, Status, Add_Date) VALUES(:name, :desc, :price, :country, :status, now()) ");
      $stmt->execute(array(
        'name' => $name,
        'desc' => $desc,
        'price' => $price,
        'country' => $country,
        'status' => $status
      ));
      $Msg = "<div class='alert alert-success'>Item Added</div>";
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
    $errorMsg = "<div class='alert alert-danger'>You Can not Brows This Page Directly.</div>";
    redirectLink($errorMsg, 6);
  }
?>
