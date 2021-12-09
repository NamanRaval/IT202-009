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
