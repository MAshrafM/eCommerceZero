<div class="upperbar">
  <div class="container">
    <?php 
      // show action if member
      if(isset($_SESSION['MemberName'])){
    ?>
      <span class="pull-right"><?php echo $_SESSION['MemberName']; ?></span> |
      <a href="profile.php">My Profile</a> | 
      <a href="newad.php">New Ad</a> | 
      <a href="logout.php">Logout</a> .
    <?php
        $userStatus = checkUserStatus($_SESSION['MemberName']);
        if($userStatus == 1){
          echo 'Waiting Admin Approval.'
        }
      } else {
    ?>
    <a href="login.php">
      <span class="pull-right">Login</span>
    </a>
    <?php 
      }
    ?>
  </div>
</div>
<nav class="navbar navbar-inverse">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="navcollapse" aria-expanded="false">
        <span class="sr-only">Toggle Nav</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="./"><?php echo lang('BRAND'); ?></a>
    </div>
    <div class="collapse navbar-collapse" id="navcollapse">
      <ul class="nav navbar-nav navbar-right">
        <?php 
          foreach(getAll('categories') as $cat){
        ?>
          <li><a href="categories.php?cid=<?php echo $cat['ID']; ?>&cname=<?php echo str_replace(" ", "-", $cat["Name"]); ?>"><?php echo $cat['Name']; ?></a></li>
        <?php
          }
        ?>
      </ul>
    </div>
  </div>
</nav>
<main>