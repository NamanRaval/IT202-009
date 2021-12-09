<?php
require_once __DIR__ . "/../../partials/nav.php";
if (!is_logged_in()) {
  flash("You don't have permission to access this page");
  redirect("login.php");
}

if (isset($_GET["type"])) {
    $type = $_GET["type"];
  } else {
    $type = 'deposit';
}

$user = get_user_id();
$db = getDB();

$stmt = $db->prepare('SELECT * FROM Accounts WHERE user_id = :id ORDER BY id ASC');
$stmt->execute([':id' => $user]);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (isset($_POST["save"])) {
    $account_src = $_POST["account_src"];
    $balance = $_POST["balance"];
    $memo = $_POST["memo"];
  
    $last_name = $_POST["last_name"];
    $last_four = $_POST["last_four"];
  
    if(strlen($last_four) != 4){
      flash("Please enter last 4 digits of the destination account.");
      redirect("transaction_out.php");
    }
    
    $stmt = $db->prepare('SELECT Accounts.id, Users.username FROM Accounts JOIN Users ON Accounts.user_id = Users.id WHERE Users.last_name = :last_name AND Accounts.account_number LIKE :last_four');
    $stmt->execute([
      ':last_name' => $last_name,
      ':last_four' => "%$last_four"
    ]);
    $account_dest = $stmt->fetch(PDO::FETCH_ASSOC);
  
    if($account_src == $account_dest["id"] || $account_dest["username"] == get_username()) {
      flash("Cannot transfer to the same user!");
      die(header("Location: transaction_out.php"));
    }
    $stmt = $db->prepare('SELECT balance FROM Accounts WHERE id = :id');
    $stmt->execute([':id' => $account_src]);
    $acct = $stmt->fetch(PDO::FETCH_ASSOC);
    if($acct["balance"] < $balance) {
      flash("Not enough funds to transfer!");
      die(header("Location: transaction.php?type=transfer"));
    }
    $r = changeBalance($db, $account_src, $account_dest["id"], 'ext-transfer', $balance, $memo);
  
    if ($r) {
      flash("Successfully executed transaction.");
    } else {
      flash("Error doing transaction!");
    }
  }
  
  ?>