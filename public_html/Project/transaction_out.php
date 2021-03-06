<?php
require_once __DIR__ . "/../../partials/nav.php";
if (!is_logged_in()) {
  flash("You don't have permission to access this page");
  redirect("login.php");
}

if (isset($_GET["type"])) {
    $type = $_GET["type"];
  } else {
    $type = 'deposit';
}

$user = get_user_id();
$db = getDB();

$stmt = $db->prepare("SELECT * FROM Accounts WHERE user_id = :id AND Accounts.account_type NOT LIKE 'loan' AND active = 1 ORDER BY id ASC");
$stmt->execute([':id' => $user]);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (isset($_POST["save"])) {
    $account_src = $_POST["account_src"];
    $balance = $_POST["balance"];
    $memo = $_POST["memo"];
  
    $last_name = $_POST["last_name"];
    $last_four = $_POST["last_four"];
  
    if(strlen($last_four) != 4){
      flash("Please enter last 4 digits of the destination account.");
      redirect("transaction_out.php");
    }

    $stmt = $db->prepare('SELECT Accounts.id, Users.username FROM Accounts JOIN Users ON Accounts.user_id = Users.id WHERE Users.last_name = :last_name AND Accounts.account_number LIKE :last_four AND active = 1');
    $stmt->execute([
      ':last_name' => $last_name,
      ':last_four' => "%$last_four"
    ]);
    $account_dest = $stmt->fetch(PDO::FETCH_ASSOC);
  
    if($account_src == $account_dest["id"] || $account_dest["username"] == get_username()) {
      flash("Cannot transfer to the same user!");
      redirect("transaction_out.php");
    }
    if($account_dest["account_type"] == "loan") {
      flash("Cannot transfer to a loan account!");
      redirect("transaction_out.php");
    }
    $stmt = $db->prepare('SELECT balance FROM Accounts WHERE id = :id');
    $stmt->execute([':id' => $account_src]);
    $acct = $stmt->fetch(PDO::FETCH_ASSOC);
    if($acct["balance"] < $balance) {
      flash("Not enough funds to transfer!");
      redirect("transaction.php?type=transfer");
    }
    $r = changeBalance($db, $account_src, $account_dest["id"], 'ext-transfer', $balance, $memo);
  
    if ($r) {
      flash("Successfully executed transaction.");
    } else {
      flash("Error doing transaction!");
    }
  }
  
  ?>

<h3 class="text-center mt-4">Transfer Out</h3>

<form method="POST">
  <?php if (count($results) > 0): ?>
  <div class="form-group">
    <label for="account">Account Source</label>
    <select class="form-control" id="account" name="account_src">
      <?php foreach ($results as $r): ?>
      <option value="<?php echo($r["id"]); ?>">
        <?php echo($r["account_number"]); ?> | <?php echo($r["account_type"]); ?> | <?php echo($r["balance"]); ?>
      </option>
      <?php endforeach; ?>
    </select>
  </div>
  <?php endif; ?>
  <div class="row">
    <div class="col-sm">
      <div class="form-group">
        <label for="last_name">Destination User Last Name</label>
        <input type="text" class="form-control" id="last_name" name="last_name" maxlength="60" required placeholder="Last Name">
      </div>
    </div>
    <div class="col-sm">
      <div class="form-group">
        <label for="last_four">Destination User Last 4 Digits</label>
        <input type="number" class="form-control" id="last_four" name="last_four" min="0" max="9999" required placeholder="XXXX">
      </div>
    </div>
  </div>
  <div class="form-group">
    <label for="deposit">Amount</label>
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text">$</span>
      </div>
      <input type="number" class="form-control" id="deposit" min="0.00" name="balance" step="0.01" placeholder="0.00"/>
    </div>
  </div>
  <div class="form-group">
    <label for="memo">Memo</label>
    <textarea class="form-control" id="memo" name="memo" maxlength="250"></textarea>
  </div>
  <button type="submit" name="save" value="Do Transaction" class="btn btn-success">Do Transaction</button>
</form>

<?php require __DIR__ . "/../../partials/flash.php"; ?>