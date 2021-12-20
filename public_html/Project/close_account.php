<?php
require_once __DIR__ . "/../../partials/nav.php";
if (!is_logged_in()) {
  flash("You don't have permission to access this page");
  redirect("login.php");
}

$user = get_user_id();
$db = getDB();

$stmt = $db->prepare("SELECT id, account_number, account_type, balance FROM Accounts WHERE user_id = :id AND active = 1 ORDER BY id ASC");
$stmt->execute([':id' => $user]);
$accounts = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (isset($_POST["save"])) {
    $id = $_POST["account"];
  
    $stmt = $db->prepare('SELECT balance, account_number FROM Accounts WHERE id = :q');
    $stmt->execute([ ":q" => $id ]);
    $account = $stmt->fetch(PDO::FETCH_ASSOC);
    if($account["balance"] != 0) {
      flash("Balance has to be $0 before closing.");
      redirect("close_account.php");
    }
  
    $user = get_user_id();
    $stmt = $db->prepare(
      "UPDATE Accounts SET active = 0 WHERE id = :id"
    );
    $r = $stmt->execute([ ":id" => $id ]);
    if ($r) {
      flash("Account ".$account["account_number"]." successfully closed.");
      redirect("accounts.php");
    } else {
      flash("Error closing account!");
    }
  }
?>