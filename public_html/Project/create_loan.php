<?php
require_once __DIR__ . "/../../partials/nav.php";
if (!is_logged_in()) {
  flash("You don't have permission to access this page");
  die(header("Location: login.php"));
}

$user = get_user_id();
$db = getDB();

$stmt = $db->prepare("SELECT * FROM Accounts WHERE user_id = :id AND account_type NOT LIKE 'loan' AND active = 1 ORDER BY id ASC");
$stmt->execute([':id' => $user]);
$accounts = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (isset($_POST["save"])) {
    $check = $db->prepare('SELECT account_number FROM Accounts WHERE account_number = :q');
    do {
      $account_number = rand(100000000000, 999999999999);
      $check->execute([':q' => $account_number]);
    } while ( $check->rowCount() > 0 );

    $account_dest = $_POST["account_dest"];
    $apy = $_POST["apy"];

    $balance = $_POST["balance"];
    if($balance < 500) {
        die(flash("Minimum balance not entered."));
    }

    $user = get_user_id();
    $stmt = $db->prepare(
        "INSERT INTO Accounts (account_number, user_id, account_type, balance, APY) VALUES (:account_number, :user, :account_type, :balance, :apy)"
    );
    $r = $stmt->execute([
        ":account_number" => $account_number,
        ":user" => $user,
        ":account_type" => 'loan',
        ":balance" => -($balance * ($apy / 100)), 
        ":apy" => $apy
    ]);
    if ($r) {
        changeBalance($db, $db->lastInsertId(), $account_dest, 'loan', $balance, 'New account deposit');
        flash("Account created successfully with Number: " . $account_number);
        redirect("accounts.php");
    } else {
        flash("Error creating account!");
    }
    }
?>

<h3 class="text-center mt-4">Take out a Loan</h3>

<form method="POST">
  <div class="form-group">
    <label for="deposit">Loan Amount</label>
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text">$</span>
      </div>
      <input type="number" class="form-control" id="deposit" min="500.00" name="balance" step="0.01" placeholder="500.00" aria-describedby="depositHelp"/>
    </div>
    <small id="depositHelp" class="form-text text-muted">Minimum $500 required.</small>
  </div>
  <div class="form-group">
    <label for="account_dest">Deposit to Account</label>
    <select class="form-control" id="account_dest" name="account_dest">
      <?php foreach ($accounts as $r): ?>
      <option value="<?php echo($r["id"]); ?>">
        <?php echo($r["account_number"]); ?> | <?php echo($r["account_type"]); ?> | <?php echo($r["balance"]); ?>
      </option>
      <?php endforeach; ?>
    </select>
  </div>
  <div class="form-group">
    <label for="apy">APY</label>
    <div class="input-group">
      <div class="input-group-prepend">
        <span class="input-group-text">%</span>
      </div>
      <input type="number" class="form-control" id="apy" min="2.00" name="apy" step="0.0001" placeholder="5.00" aria-describedby="depositHelp"/>
    </div>
    <small id="apyHelp" class="form-text text-muted">Minimum 2% APY.</small>
  </div>
  <button type="submit" name="save" value="create" class="btn btn-primary">Create</button>
</form>

<?php require __DIR__ . "/../../partials/flash.php"; ?>