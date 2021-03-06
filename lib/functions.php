<?php
require_once(__DIR__ . "/db.php");
$BASE_PATH = '/Project/'; //This is going to be a helper for redirecting to our base project path since it's nested in another folder
function se($v, $k = null, $default = "", $isEcho = true)
{
    if (is_array($v) && isset($k) && isset($v[$k])) {
        $returnValue = $v[$k];
    } else if (is_object($v) && isset($k) && isset($v->$k)) {
        $returnValue = $v->$k;
    } else {
        $returnValue = $v;
        //added 07-05-2021 to fix case where $k of $v isn't set
        //this is to kep htmlspecialchars happy
        if (is_array($returnValue) || is_object($returnValue)) {
            $returnValue = $default;
        }
    }
    if (!isset($returnValue)) {
        $returnValue = $default;
    }
    if ($isEcho) {
        //https://www.php.net/manual/en/function.htmlspecialchars.php
        echo htmlspecialchars($returnValue, ENT_QUOTES);
    } else {
        //https://www.php.net/manual/en/function.htmlspecialchars.php
        return htmlspecialchars($returnValue, ENT_QUOTES);
    }
}
//TODO 2: filter helpers
function sanitize_email($email = "")
{
    return filter_var(trim($email), FILTER_SANITIZE_EMAIL);
}
function is_valid_email($email = "")
{
    return filter_var(trim($email), FILTER_VALIDATE_EMAIL);
}
//TODO 3: User Helpers
function is_logged_in($redirect = false, $destination = "login.php")
{
    $isLoggedIn = isset($_SESSION["user"]);
    if ($redirect && !$isLoggedIn) {
        flash("You must be logged in to view this page", "warning");
        die(header("Location: $destination"));
    }
    return $isLoggedIn; //se($_SESSION, "user", false, false);
}
function has_role($role)
{
    if (is_logged_in() && isset($_SESSION["user"]["roles"])) {
        foreach ($_SESSION["user"]["roles"] as $r) {
            if ($r["name"] === $role) {
                return true;
            }
        }
    }
    return false;
}
function get_username()
{
    if (is_logged_in()) { //we need to check for login first because "user" key may not exist
        return se($_SESSION["user"], "username", "", false);
    }
    return "";
}
function get_user_email()
{
    if (is_logged_in()) { //we need to check for login first because "user" key may not exist
        return se($_SESSION["user"], "email", "", false);
    }
    return "";
}
function get_user_id()
{
    if (is_logged_in()) { //we need to check for login first because "user" key may not exist
        return se($_SESSION["user"], "id", false, false);
    }
    return false;
}
function get_first_name()
{
  if (is_logged_in()) {
    return se($_SESSION["user"], "first_name", "", false);
  }
  return "";
}

function get_last_name()
{
  if (is_logged_in()) {
    return se($_SESSION["user"], "last_name", "", false);
  }
  return "";
}

function get_name()
{
  if (is_logged_in()) {
    return se($_SESSION["user"]["first_name"]) . " " . se($_SESSION["user"]["last_name"]);
  }
  return "";
}

function get_privacy()
{
  if (is_logged_in()) {
    return se($_SESSION["user"], "privacy", "", false);
  }
  return "";
} 
//TODO 4: Flash Message Helpers
function flash($msg = "", $color = "info")
{
    $message = ["text" => $msg, "color" => $color];
    if (isset($_SESSION['flash'])) {
        array_push($_SESSION['flash'], $message);
    } else {
        $_SESSION['flash'] = array();
        array_push($_SESSION['flash'], $message);
    }
}

function getMessages()
{
    if (isset($_SESSION['flash'])) {
        $flashes = $_SESSION['flash'];
        $_SESSION['flash'] = array();
        return $flashes;
    }
    return array();
}
function getURL($path) {
  if(substr($path, 0, 1) == '/') {
    return $path;
  }
  return $_SERVER['CONTEXT_PREFIX'] . "/IT202/project/$path";
}

function changeBalance($db, $src, $dest, $type, $balChange, $memo = '') {
  $stmt = $db->prepare("SELECT balance from Accounts WHERE id = :id");
  $stmt->execute([":id" => $src]);
  $srcAcct = $stmt->fetch(PDO::FETCH_ASSOC);

  $stmt->execute([":id" => $dest]);
  $destAcct = $stmt->fetch(PDO::FETCH_ASSOC);

  $transactions = $db->prepare(
    "INSERT INTO Transactions (act_src_id, act_dest_id, amount, action_type, memo, expected_total)
    VALUES (:act_src_id, :act_dest_id, :amount, :action_type, :memo, :expected_total)"
  );
  $accounts = $db->prepare(
    "UPDATE Accounts SET balance = :balance WHERE id = :id"
  );

  
  $balChange = abs($balChange);
  $finalSrcBalace = $srcAcct['balance'] - $balChange;
  $finalDestBalace = $destAcct['balance'] + $balChange;

  $transactions->execute([
    ":act_src_id" => $src,
    ":act_dest_id" => $dest,
    ":amount" => -$balChange,
    ":action_type" => $type,
    ":memo" => $memo,
    ":expected_total" => $finalSrcBalace
  ]);

  $transactions->execute([
    ":act_src_id" => $dest,
    ":act_dest_id" => $src,
    ":amount" => $balChange,
    ":action_type" => $type,
    ":memo" => $memo,
    ":expected_total" => $finalDestBalace
  ]);

  $accounts->execute([":balance" => $finalSrcBalace, ":id" => $src]);
  $accounts->execute([":balance" => $finalDestBalace, ":id" => $dest]);

  return $transactions;
}

//TODO generic helpers
function reset_session()
{
    session_unset();
    session_destroy();
    session_start();
}
function users_check_duplicate($errorInfo)
{
    if ($errorInfo[1] === 1062) {
        //https://www.php.net/manual/en/function.preg-match.php
        preg_match("/Users.(\w+)/", $errorInfo[2], $matches);
        if (isset($matches[1])) {
            flash("The chosen " . $matches[1] . " is not available.", "warning");
        } else {
            //TODO come up with a nice error message
            flash("<pre>" . var_export($errorInfo, true) . "</pre>");
        }
    } else {
        //TODO come up with a nice error message
        flash("<pre>" . var_export($errorInfo, true) . "</pre>");
    }
}
function get_url($dest)
{
    global $BASE_PATH;
    if (str_starts_with($dest, "/")) {
        //handle absolute path
        return $dest;
    }
    //handle relative path
    return $BASE_PATH . $dest;
}

function redirect($path)
{ //header headache
    //https://www.php.net/manual/en/function.headers-sent.php#90160
    /*headers are sent at the end of script execution otherwise they are sent when the buffer reaches it's limit and emptied */
    if (!headers_sent()) {
        //php redirect
        die(header("Location: " . get_url($path)));
    }
    //javascript redirect
    echo "<script>window.location.href='" . get_url($path) . "';</script>";
    //metadata redirect (runs if javascript is disabled)
    echo "<noscript><meta http-equiv=\"refresh\" content=\"0;url=" . get_url($path) . "\"/></noscript>";
    die();
}

