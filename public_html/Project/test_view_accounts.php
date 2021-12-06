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

<?php if (isset($result) && !empty($result)): ?>
    <div class="card">
        <div class="card-title">
            <?php echo($result["id"]); ?>
        </div>
        <div class="card-body">
            <div>
                <p>Information</p>
                <div>Account Number: <?php echo($result["account_number"]); ?></div>
                <div>Account Type: <?php echo($result["account_type"]); ?></div>
                <div>Balance: $<?php echo($result["balance"]); ?></div>
                <div>Last Updated: <?php echo($result["last_updated"]); ?></div>
                <div>Owned by: <?php echo($result["username"]); ?> (<?php echo($result["email"]); ?>)</div>
                <div>Opened: <?php echo($result["opened_date"]); ?></div>
            </div>
        </div>
    </div>
<?php else: ?>
    <p>Error looking up id...</p>
<?php
endif;
require __DIR__ . "/../../partials/flash.php";
?>
