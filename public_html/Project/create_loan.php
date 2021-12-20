<?php
require_once __DIR__ . "/../../partials/nav.php";
if (!is_logged_in()) {
  flash("You don't have permission to access this page");
  redirect("login.php");
}

$user = get_user_id();
$db = getDB();

$stmt = $db->prepare("SELECT * FROM Accounts WHERE user_id = :id AND account_type NOT LIKE 'loan' ORDER BY id ASC");
$stmt->execute([':id' => $user]);
$accounts = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (isset($_POST["save"])) {
    $check = $db->prepare('SELECT account_number FROM Accounts WHERE account_number = :q');
    do {
      $account_number = rand(100000000000, 999999999999);
      $check->execute([':q' => $account_number]);
    } while ( $check->rowCount() > 0 );
    