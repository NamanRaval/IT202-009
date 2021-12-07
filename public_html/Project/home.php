<?php
require(__DIR__ . "/../../partials/nav.php");
?>
<h1>Home</h1>
<?php

if (is_logged_in(true)) {
    echo "Welcome home, " . get_username();
    //comment this out if you don't want to see the session variables
    //echo "<pre>" . var_export($_SESSION, true) . "</pre>";
}

?>
<div class="jumbotron mt-4 text-center">
      <h1 class="display-4">Welcome, <?php echo $_SESSION["user"]['username']; ?>!</h1>
      <hr class="my-4">
      <p class="lead">What would you like to do today?</p>
      <p>
        <a class="btn btn-primary" href="<?php echo get_url('create_account.php');?>" role="button"></i> Create Account</a>
        <a class="btn btn-primary" href="<?php echo get_url('accounts.php');?>" role="button"></i> My Accounts</a>
        <a class="btn btn-primary" href="<?php echo get_url('transaction.php?type=deposit');?>" role="button"></i> Deposit</a>
        <a class="btn btn-primary" href="<?php echo get_url('transaction.php?type=withdraw');?>" role="button"></i> Withdraw</a>
        <a class="btn btn-primary" href="<?php echo get_url('transaction.php?type=transfer');?>" role="button"></i> Transfer</a>
        <a class="btn btn-primary" href="<?php echo get_url('profile.php');?>" role="button"></i> Profile</a>
      </p>
    </div>
<?php
require(__DIR__ . "/../../partials/flash.php");
?>