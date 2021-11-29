<?php
require_once __DIR__ . "/../../partials/nav.php";
if (!is_logged_in()) {
  flash("You don't have permission to access this page");
  die(header("Location: login.php"));
}

if (isset($_GET["type"])) {
    $type = $_GET["type"];
  } else {
    $type = 'deposit';
  } 

$user = get_user_id();
$db = getDB();

$stmt = $db->prepare('SELECT * FROM Accounts WHERE user_id = :id ORDER BY id ASC');
$stmt->execute([':id' => $user]);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (isset($_POST["save"])) {
    $account = $_POST["account"];
    $balance = $_POST["balance"];
    $memo = $_POST["memo"];
  
    if($type == 'deposit') {
      $r = changeBalance($db, 1, $account, 'deposit', $balance, $memo);
    }
    if($type == 'withdraw')  {
      $r = changeBalance($db, $account, 1, 'withdraw', $balance, $memo);
    }
  
    if ($r) {
      flash("Successfully executed transaction.");
    } else {
      flash("Error doing transaction!");
    }
  }
  
?>

<h3 class="text-center mt-4"><?php echo(ucfirst($type)) ?></h3>

<ul class="nav nav-pills justify-content-center mt-4 mb-2">
  <li class="nav-item"><a class="nav-link <?php echo $type == 'deposit' ? 'active' : ''; ?>" href="?type=deposit">Deposit</a></li>
  <li class="nav-item"><a class="nav-link <?php echo $type == 'withdraw' ? 'active' : ''; ?>" href="?type=withdraw">Withdraw</a></li>
</ul> 
