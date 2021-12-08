<?php
require_once __DIR__ . "/../../partials/nav.php";
if (!is_logged_in()) {
  flash("You don't have permission to access this page");
  redirect("login.php");
}

$db = getDB();
$user = get_user_id();
$stmt = $db->prepare(
  "SELECT Accounts.id, account_number, account_type, balance, last_updated FROM Accounts JOIN Users ON Accounts.user_id = Users.id WHERE Users.id = :q ORDER BY Accounts.id"
);
$r = $stmt->execute([":q" => $user]);
if ($r) {
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
  $results = [];
  flash("There was a problem fetching the results");
}

?>
<div class="mt-4">
    <?php if (count($results) > 0): ?>
      <?php foreach ($results as $r): ?>
      <div class="card mb-4">
        <div class="card-header">Account: <b><?php echo($r["account_number"]); ?></b></div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">Type: <?php echo(ucfirst($r["account_type"])); ?></li>
          <li class="list-group-item">Balance: $<?php echo($r["balance"]); ?></li>
        </ul>
            <?php
                $t = $t_stmt->execute([ ":q" => $r['id'] ]);
                if ($t) {
                    $transactions = $t_stmt->fetchAll(PDO::FETCH_ASSOC);
                } else {
                    flash("There was a problem fetching the results");
                }
                ?>
                <?php if (count($transactions) > 0): ?>
                <table class="table table-bordered table-striped table-sm">
                    <tr>
                        <th>Date</th>
                        <th>Type</th>
                        <th>Amount</th>
                        <th>Expected Total</th>
                        <th>Memo</th>
                        <th>From/To</th>
                    </tr>
                <?php foreach ($transactions as $t): ?>
                    <tr>
                        <td><?php echo($t["created"]); ?></td>
                        <td><?php echo($t["action_type"]); ?></td>
                        <td>$<?php echo($t["amount"]); ?></td>
                        <td>$<?php echo($t["expected_total"]); ?></td>
                        <td><?php echo($t["memo"]); ?></td>
                        <td><?php echo($t["account_number"]); ?></td>
                    </tr>
                <?php endforeach; ?>
                </table>
                <?php endif; ?>
      </div>
      <?php endforeach; ?>
    <?php else: ?>
      <p>You don't have any accounts.</p>
    <?php endif; ?>
    </div>

<?php require __DIR__ . "/../../partials/flash.php"; ?>