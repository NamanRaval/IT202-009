<?php
require(__DIR__ . "/../../partials/nav.php");
?>
<?php
$email = se($_POST, "email", "", false);
//TODO 2: add PHP Code
if (isset($_POST["email"]) && isset($_POST["password"])) {
    $password = se($_POST, "password", "", false);

    //TODO 3
    $hasError = false;
    if (empty($email)) {
        flash("Email must not be empty", "danger");
        $hasError = true;
    }
    if (str_contains($email, "@")) {
        //sanitize
        $email = sanitize_email($email);
        //validate
        if (!is_valid_email($email)) {
            flash("Invalid email address", "warning");
            $hasError = true;
        }
    } else {
        if (!preg_match('/^[a-z0-9_-]{3,30}$/i', $email)) {
            flash("Username must only be alphanumeric and can only contain - or _", "warning");
            $hasError = true;
        }
    }
    if (empty($password)) {
        flash("password must not be empty", "danger");
        $hasError = true;
    }
    if (strlen($password) < 8) {
        flash("Password too short", "danger");
        $hasError = true;
    }
    if (!$hasError) {
        //TODO 4
        $db = getDB();
        $stmt = $db->prepare("SELECT id, email, username, password, first_name, last_name, privacy from Users WHERE email = :email LIMIT 1");
        try {
            $r = $stmt->execute([":email" => $email]);
            if ($r) {
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($user) {
                    $hash = $user["password"];
                    unset($user["password"]);
                    if (password_verify($password, $hash)) {
                        flash("Welcome $email");
                        $_SESSION["user"] = $user;
                        //lookup potential roles
                        $stmt = $db->prepare("SELECT Roles.name FROM Roles 
                        JOIN UserRoles on Roles.id = UserRoles.role_id 
                        where UserRoles.user_id = :user_id and Roles.is_active = 1 and UserRoles.is_active = 1");
                        $stmt->execute([":user_id" => $user["id"]]);
                        $roles = $stmt->fetchAll(PDO::FETCH_ASSOC); //fetch all since we'll want multiple
                        //save roles or empty array
                        if ($roles) {
                            $_SESSION["user"]["roles"] = $roles; //at least 1 role
                        } else {
                            $_SESSION["user"]["roles"] = []; //no roles
                        }
                        redirect("home.php");
                    } else {
                        flash("Invalid password", "danger");
                    }
                } else {
                    flash("Email not found", "danger");
                }
            }
        } catch (Exception $e) {
            flash("<pre>" . var_export($e, true) . "</pre>");
        }
    }
}
?>
<div class="container-fluid">
    <h1>Login</h1>
    <form onsubmit="return validate(this)" method="POST">
        <div class="mb-3">
            <label class="form-label" for="email">Username/Email</label>
            <input class="form-control" type="text" id="email" name="email" value="<?php se($email);?>" required />
        </div>
        <div class="mb-3">
            <label class="form-label" for="pw">Password</label>
            <input class="form-control" type="password" id="pw" name="password" required minlength="8" />
        </div>
        <input type="submit" class="mt-3 btn btn-primary" value="Login" />
    </form>
</div>
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
    }
</script>

<?php
require(__DIR__ . "/../../partials/flash.php");
?>