<?php
require_once __DIR__ . "/partials/nav.php";
if (!has_role("Admin")) {
  flash("You don't have permission to access this page");
  die(header("Location: login.php"));
}
?> 