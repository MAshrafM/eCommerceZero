<?php
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // get var from form
    $id = $_POST['comid'];
    $comment = $_POST['comment'];
    // validate form
    $formErrors = array();
    if(empty($comment)){$formErrors[] = 'comment can not be empty';}  
?>
<div class="container">
  <h1 class="text-center">Update Comment</h1>
  <?php 
    if(empty($formErrors)){
      // update query
      $stmt = $db->prepare("UPDATE comments SET Comment = ? WHERE ComID = ?");
      $stmt->execute(array($comment, $id)); 
      $Msg = "<div class='alert alert-success'>Comment Updated</div>";
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
