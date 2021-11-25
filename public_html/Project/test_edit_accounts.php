<?php
require_once __DIR__ . "/partials/nav.php";
if (!has_role("Admin")) {
  flash("You don't have permission to access this page");
  die(header("Location: login.php"));
}

if (isset($_GET["id"])) {
    $id = $_GET["id"];
  }
  
  if (isset($_POST["save"])) {
    $account_number = $_POST["account_number"];
    $account_type = $_POST["account_type"];
    $balance = $_POST["balance"];
    $user = get_user_id();
    $db = getDB();
    if (isset($id)) {
          $stmt = $db->prepare(
              "UPDATE Accounts SET account_number=:account_number, account_type=:account_type, balance=:balance WHERE id=:id"
          );
          $r = $stmt->execute([
              ":account_number" => $account_number,
              ":account_type" => $account_type,
              ":balance" => $balance,
              ":id" => $id,
          ]);
      if ($r) {
        flash("Updated successfully with id: " . $id);
      } else {
        $e = $stmt->errorInfo();
        flash("Error updating: " . var_export($e, true));
      }
    } else {
      flash("ID isn't set, we need an ID in order to update");
    }
  }
  
  $result = [];
  if (isset($id)) {
    $id = $_GET["id"];
    $db = getDB();
    $stmt = $db->prepare("SELECT * FROM Accounts WHERE id = :id");
    $r = $stmt->execute([":id" => $id]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
  }
  ?>