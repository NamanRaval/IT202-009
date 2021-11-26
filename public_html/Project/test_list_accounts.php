<?php
require_once __DIR__ . "/../../partials/nav.php";
if (!has_role("Admin")) {
  flash("You don't have permission to access this page");
  die(header("Location: ../login.php"));
}

$query = "";
$results = [];
if (isset($_POST["query"])) {
  $query = $_POST["query"];
}
if (isset($_POST["search"]) && !empty($query)) {
  $db = getDB();
  $stmt = $db->prepare(
    "SELECT Accounts.id, account_number, user_id, account_type, opened_date, last_updated, balance FROM Accounts JOIN Users ON Accounts.user_id = Users.id WHERE Users.username LIKE :q LIMIT 10"
  );
  $r = $stmt->execute([":q" => "%$query%"]);
  if ($r) {
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
  } else {
    flash("There was a problem fetching the results");
  }
}
?>