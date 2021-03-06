<?php
require_once __DIR__ . "/../../partials/nav.php";
if (!has_role("Admin")) {
  flash("You don't have permission to access this page");
  die(header("Location: ../login.php"));
}
?> 

<form method="POST">
	<label>Account Number</label>
	<input name="account_number" type="number" max="999999999999" min="100000000000"/> 
	<label>Account Type</label>
	<select name="account_type">
		<option value="checking">Checking</option>
		<option value="savings">Savings</option>
		<option value="loan">Loan</option>
	</select>
	<label>Balance</label>
	<input type="number" min="0.00" name="balance" step="0.01"/>
	<input type="submit" name="save" value="Create"/>
</form>

<?php
if (isset($_POST["save"])) {
  $account_number = $_POST["account_number"];
  $account_type = $_POST["account_type"];
  $balance = $_POST["balance"];

  $user = get_user_id();
  $db = getDB();
  $stmt = $db->prepare(
    "INSERT INTO Accounts (account_number, user_id, account_type, balance) VALUES (:account_number, :user, :account_type, :balance)"
  );
  $r = $stmt->execute([
    ":account_number" => $account_number,
    ":user" => $user,
    ":account_type" => $account_type,
    ":balance" => $balance
  ]);
  if ($r) {
    flash("Created successfully with id: " . $db->lastInsertId());
  } else {
    $e = $stmt->errorInfo();
    flash("Error creating: " . var_export($e, true));
  }
}

require __DIR__ . "/../../partials/flash.php";
?>