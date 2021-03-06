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
      <ul class="nav navbar-nav">
        <li>
          <a href="./dashboard.php"><?php echo lang('HOME'); ?></a>
        </li>
        <li>
          <a href="./categories.php"><?php echo lang('CAT'); ?></a>
        </li>
        <li>
          <a href="./items.php"><?php echo lang('ITEMS'); ?></a>
        </li>
        <li>
          <a href="./members.php"><?php echo lang('MEMBERS'); ?></a>
        </li>
        <li>
          <a href="./comments.php"><?php echo lang('COMMENTS'); ?></a>
        </li>
        <li>
          <a href="#"><?php echo lang('STATISTICS'); ?></a>
        </li>
        <li>
          <a href="#"><?php echo lang('LOGS'); ?></a>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <?php echo $_SESSION['Username']; ?> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="../index.php">Show Live</a></li>
            <li><a href="members.php?v=Edit&uid=<?php echo $_SESSION['ID']; ?>"><?php echo lang('EDIT'); ?></a></li>
            <li><a href="#"><?php echo lang('SETTING'); ?></a></li>
            <li><a href="logout.php"><?php echo lang('LOGOUT'); ?></a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
<main>