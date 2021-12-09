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
<h3 class="text-center mt-4 mb-4">Accounts</h3>
    <?php if (count($results) > 0): ?>
      <table class="table">
        <thead>
          <tr>  
            <th scope="col">Account Number</th>
            <th scope="col">Account Type</th>
            <th scope="col">Balance</th>
            <th scope="col">History</th>
          </tr>
        </thead>
        <tbody>
      <?php foreach ($results as $r): ?>
        <tr>
            <th scope="row"><?php echo($r["account_number"]); ?></th>
            <td><?php echo(ucfirst($r["account_type"])); ?></td>
            <td>$<?php echo($r["balance"]); ?><br><small>As of <?php echo($r["last_updated"]); ?></small></td>
            <td><a href="view_transactions.php?id=<?php echo($r["id"]); ?>" class="btn btn-success">Transactions</a></td>
          </tr>
      <?php endforeach; ?>
        </tbody>
      </table>
    <?php else: ?>
      <p>You don't have any accounts.</p>
    <?php endif; ?>

<?php require __DIR__ . "/../../partials/flash.php"; ?>