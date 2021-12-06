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

<?php if (isset($result) && !empty($result)): ?>
    <div class="card">
        <div class="card-title">
            <?php echo($result["id"]); ?>
        </div>
        <div class="card-body">
            <div>
                <p>Information</p>
                <div>Account Src: <?php echo($result["act_src_id"]); ?></div>
                <div>Account Dest: <?php echo($result["act_dest_id"]); ?></div>
                <div>Amount: $<?php echo($result["amount"]); ?></div>
                <div>Type: <?php echo($result["action_type"]); ?></div>
                <div>Memo: <?php echo($result["memo"]); ?></div>
                <div>Expected Total: $<?php echo($result["expected_total"]); ?></div>
                <div>Created: <?php echo($result["created"]); ?></div>
            </div>
        </div>
    </div>
<?php else: ?>
    <p>Error looking up id...</p>
<?php
endif;
require __DIR__ . "/../../partials/flash.php";
?>

