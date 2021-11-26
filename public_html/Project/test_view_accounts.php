<?php require_once __DIR__ . "/../../partials/nav.php";
if (!has_role("Admin")) {
  flash("You don't have permission to access this page");
  die(header("Location: ../login.php"));
}
if (isset($_GET["id"])) {
  $id = $_GET["id"];
}

$result = [];
if (isset($id)) {
  $db = getDB();
  $stmt = $db->prepare(
    "SELECT Accounts.id, account_number, account_type, opened_date, last_updated, balance, username, email FROM Accounts JOIN Users ON Accounts.user_id = Users.id WHERE Accounts.id = :id"
  );
  $r = $stmt->execute([":id" => $id]);
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  if (!$result) {
    $e = $stmt->errorInfo();
    flash($e[2]);
  }
}
?>