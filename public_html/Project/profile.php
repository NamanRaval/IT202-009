<?php
require_once __DIR__ . "/../../partials/nav.php";
if (!is_logged_in()) {
  flash("You must be logged in to access this page");
  redirect("login.php");
}

$db = getDB();
if (isset($_POST["saved"])) {
  $isValid = true;
  $newEmail = get_user_email();
  if (get_user_email() != $_POST["email"]) {
    $email = $_POST["email"];
    $stmt = $db->prepare(
      "SELECT COUNT(1) as InUse from Users where email = :email"
    );
    $stmt->execute([":email" => $email]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $inUse = 1;
    if ($result && isset($result["InUse"])) {
      try {
        $inUse = intval($result["InUse"]);
      } catch (Exception $e) {
      }
    }
    if ($inUse > 0) {
      flash("Email already in use");
      $isValid = false;
    } else {
      $newEmail = $email;
    }
  }
  $newUsername = get_username();
  if (get_username() != $_POST["username"]) {
    $username = $_POST["username"];
    $stmt = $db->prepare(
      "SELECT COUNT(1) as InUse from Users where username = :username"
    );
    $stmt->execute([":username" => $username]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $inUse = 1; //default it to a failure scenario
    if ($result && isset($result["InUse"])) {
      try {
        $inUse = intval($result["InUse"]);
      } catch (Exception $e) {
      }
    }
    if ($inUse > 0) {
      flash("Username already in use!");
      $isValid = false;
    } else {
      $newUsername = $username;
    }
  }
  if ($isValid) {
    $stmt = $db->prepare("UPDATE Users set email = :email, username = :username, first_name = :first_name, last_name = :last_name, privacy = :privacy where id = :id");
    $r = $stmt->execute([
      ":email" => $newEmail,
      ":username" => $newUsername,
      ":id" => get_user_id(),
      ":first_name" => $_POST["first_name"],
      ":last_name" => $_POST["last_name"],
      ":privacy" => $_POST["privacy"]
    ]);
    if ($r) {
      flash("Updated profile");
    } else {
      flash("Error updating profile");
    }
    
    if (!empty($_POST["password"]) && !empty($_POST["confirm"])) {
      if ($_POST["password"] == $_POST["confirm"]) {
        $password = $_POST["password"];
        $hash = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $db->prepare(
          "UPDATE Users set password = :password where id = :id"
        );
        $r = $stmt->execute([":id" => get_user_id(), ":password" => $hash]);
        if ($r) {
          flash("Reset Password.");
        } else {
          flash("Error resetting password!");
        }
      }
    }
    $stmt = $db->prepare(
      "SELECT email, username, first_name, last_name, privacy from Users WHERE id = :id LIMIT 1"
    );
    $stmt->execute([":id" => get_user_id()]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($result) {
      $email = $result["email"];
      $username = $result["username"];
      $_SESSION["user"]["email"] = $email;
      $_SESSION["user"]["username"] = $username;
      $_SESSION["user"]["first_name"] = $result["first_name"];
      $_SESSION["user"]["last_name"] = $result["last_name"];
      $_SESSION["user"]["privacy"] = $result["privacy"];
    }
  } else {
  }
}
?>

<h3 class="text-left mt-4">Profile</h3>

<form method="POST">
  <div class="form-group">
    <label for="email">Email Address</label>
    <input type="email" class="form-control" id="email" name="email" maxlength="100" required value="<?php se(get_user_email()); ?>">
  </div>
  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" id="username" name="username" maxlength="60" required value="<?php se(get_username()); ?>">
  </div>
  <div class="row">
    <div class="col-sm">
      <div class="form-group">
        <label for="first_name">First Name</label>
        <input type="text" class="form-control" id="first_name" name="first_name" maxlength="60" required value="<?php se(get_first_name()); ?>">
      </div>
    </div>
    <div class="col-sm">
      <div class="form-group">
        <label for="last_name">Last Name</label>
        <input type="text" class="form-control" id="last_name" name="last_name" maxlength="60" required value="<?php se(get_last_name()); ?>">
      </div>
    </div>
  </div>
  <div class="form-group">
    <label for="privacy">Privacy</label>
    <select class="form-control" id="privacy" name="privacy">
      <option value="private" <?php echo get_privacy() == "private" ? "selected": ""; ?>>Private</option>
      <option value="public" <?php echo get_privacy() == "public" ? "selected": ""; ?>>Public</option>
	  </select>
    <small class="form-text text-muted">Allow other users to see your profile.</small>
  </div>

  <hr>
  <h4 class="text-left">Change Password</h4>

  <!-- DO NOT PRELOAD PASSWORD-->
        <div class="mb-3">
            <label class="form-label" for="cp">Current Password</label>
            <input class="form-control" type="password" name="currentPassword" id="cp" />
        </div>
        <div class="mb-3">
            <label class="form-label" for="np">New Password</label>
            <input class="form-control" type="password" name="newPassword" id="np" />
        </div>
        <div class="mb-3">
            <label class="form-label" for="conp">Confirm Password</label>
            <input class="form-control" type="password" name="confirmPassword" id="conp" />
        </div>
        <input type="submit" class="mt-3 btn btn-primary" value="Update Profile" name="save" />
    </form>
</div>

<?php require __DIR__ . "/../../partials/flash.php"; ?>