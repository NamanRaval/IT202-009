<?php
require_once __DIR__ . "/../../partials/nav.php";
if (!is_logged_in()) {
  flash("You don't have permission to access this page");
  redirect("login.php");
}

$user = get_user_id();
$db = getDB();

$stmt = $db->prepare("SELECT * FROM Accounts WHERE user_id = :id AND account_type NOT LIKE 'loan' ORDER BY id ASC");
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
        changeBalance($db, $db->lastInsertId(), $account_dest, 'deposit', $balance, 'New account deposit');
        flash("Account created successfully with Number: " . $account_number);
        redirect("accounts.php");
    } else {
        flash("Error creating account!");
    }
    }
?>
