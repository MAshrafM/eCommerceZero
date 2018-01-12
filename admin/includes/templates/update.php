<h1 class="text-center">Update Member</h1>
<?php
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // get var from form
    $id = $_POST['userid'];
    $username = $_POST['username'];
    $full = $_POST['FullName'];
    $email = $_POST['email'];
    empty($_POST['newpassword']) ? $pass = $_POST['oldpassword'] : $pass = sha1($_POST['newpassword']);
    // update query
    $stmt = $db->prepare("UPDATE users SET Username = ?, Email = ?, FullName = ?, Password = ? WHERE UserID = ?");
    $stmt->execute(array($username, $email, $full, $pass, $id)); 
    // success
    echo '<p> Member Updated</p>';
  }
?>
