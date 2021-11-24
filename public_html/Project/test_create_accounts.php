<?php
require_once __DIR__ . "/partials/nav.php";
if (!has_role("Admin")) {
  flash("You don't have permission to access this page");
  die(header("Location: login.php"));
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
