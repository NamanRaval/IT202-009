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
    "SELECT * FROM Transactions WHERE id = :id"
  );
  $r = $stmt->execute([":id" => $id]);
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  if (!$result) {
    $e = $stmt->errorInfo();
    flash($e[2]);
  }
}
?>
