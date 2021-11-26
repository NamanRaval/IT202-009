<?php
require_once __DIR__ . "/../../partials/nav.php";
if (!has_role("Admin")) {
  //this will redirect to login and kill the rest of this script (prevent it from executing)
  flash("You don't have permission to access this page");
  die(header("Location: ../login.php"));
}

$user = get_user_id();
$db = getDB();

$stmt = $db->prepare('SELECT * FROM Accounts WHERE user_id = :id ORDER BY id ASC');
$stmt->execute([':id' => $user]);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (isset($_POST["save"])) {
  $account_src = $_POST["account_src"];
  $account_dest = $_POST["account_dest"];
  $transaction_type = $_POST["transaction_type"];
  $balance = $_POST["balance"];
  $memo = $_POST["memo"];

  $r = changeBalance($db, $account_src, $account_dest, $transaction_type, $balance, $memo);

  if ($r) {
    flash("Created successfully with id: " . $db->lastInsertId());
  } else {
    $e = $r->errorInfo();
    flash("Error creating: " . var_export($e, true));
  }
}
?>
