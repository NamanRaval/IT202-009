<?php
require(__DIR__ . "/../../partials/nav.php");
reset_session();
?>
<?php
$email = se($_POST, "email", "", false);
$password = se($_POST, "password", "", false);
$username = se($_POST, "username", "", false);
$first_name = se($_POST, "first_name", "", false);
$last_name = se($_POST, "last_name", "", false);
//TODO 2: add PHP Code
if (isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["confirm"]) && isset($_POST["first_name"]) && isset($_POST["last_name"])) {
    $confirm = se($_POST, "confirm", "", false);
    //TODO 3
    $hasError = false;
    if (empty($email)) {
        flash("Email must not be empty", "danger");
        $hasError = true;
    }
    //sanitize
    $email = sanitize_email($email);
    //validate
    if (!is_valid_email($email)) {
        flash("Invalid email address", "danger");
        $hasError = true;
    }
    if (!preg_match('/^[a-z0-9_-]{3,16}$/i', $username)) {
        flash("Username must only be alphanumeric and can only contain - or _", "danger");
        $hasError = true;
    }
    if (empty($password)) {
        flash("password must not be empty", "danger");
        $hasError = true;
    }
    if (empty($confirm)) {
        flash("Confirm password must not be empty", "danger");
        $hasError = true;
    }
    if (strlen($password) < 8) {
        flash("Password too short", "danger");
        $hasError = true;
    }
    if (
        strlen($password) > 0 && $password !== $confirm
    ) {
        flash("Passwords must match", "danger");
        $hasError = true;
    }
    if (!$hasError) {
        //TODO 4
        $hash = password_hash($password, PASSWORD_BCRYPT);
        $db = getDB();
        $stmt = $db->prepare("INSERT INTO Users(email, username, password, first_name, last_name) VALUES(:email,:username, :password, :first_name, :last_name)");
        try {
            $stmt->execute([":email" => $email, ":password" => $hash, ":username" => $username, ":first_name" => $first_name, ":last_name" => $last_name]);
            flash("Successfully registered!");
        } catch (Exception $e) {
            users_check_duplicate($e->errorInfo);
        }
    }
}
?>
<h3 class="text-center mt-4">Register</h3>

<form method="POST">
  <div class="form-group">
    <label for="email">Email Address</label>
    <input type="email" class="form-control" id="email" name="email" maxlength="100" required value="<?php se($email); ?>">
  </div>
  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" id="username" name="username" maxlength="60" required value="<?php se($username); ?>">
  </div>
  <div class="row">
    <div class="col-sm">
      <div class="form-group">
        <label for="first_name">First Name</label>
        <input type="text" class="form-control" id="first_name" name="first_name" maxlength="60" required value="<?php se($first_name); ?>">
      </div>
    </div>
    <div class="col-sm">
      <div class="form-group">
        <label for="last_name">Last Name</label>
        <input type="text" class="form-control" id="last_name" name="last_name" maxlength="60" required value="<?php se($last_name); ?>">
      </div>
    </div>
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" maxlength="60" name="password" required value="<?php se($password); ?>">
  </div>
  <div class="form-group">
    <label for="confirm">Confirm Password</label>
    <input type="password" class="form-control" id="confirm" maxlength="60" name="confirm" required>
  </div>
  <button type="submit" name="register" value="Register" class="btn btn-primary">Register</button>
</form>
<script>
    function validate(form) {
        //TODO 1: implement JavaScript validation
        //ensure it returns false for an error and true for success
        let pw = form.Password.value;
        let minlength = 8;
        let isValid = true;
        if (pw.length < minlength){
            flash("Password too short", "danger");
            isValid = false;
        }
        

        return isValid;

        return true;
    }
</script>

<?php
require(__DIR__ . "/../../partials/flash.php");
?>