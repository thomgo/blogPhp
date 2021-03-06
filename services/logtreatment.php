<?php

// Get the connexion to the database
require_once('../../model/database/dbconnection.php');

// Function to log the user and send him to the dashboard if the credentials are OK
function logUser($userEmail, $userPassword) {
  // Select the user data from the table based on the userEmail argument
  $response = getPDO()->prepare("SELECT * FROM Users WHERE mail = ?");
  $response->execute([$userEmail]);
  $user = $response->fetch(PDO::FETCH_ASSOC);

  // Check if the query has returned something and if the passwords are the same
  // We use password_verify to compare passwords because password_hash was used to insert the user in database
  // Current user password = thomasgossart
  // If the credentials are OK starts a session and send the user to the dashboard
  if($user AND password_verify($userPassword, $user["password"])) {
    $_SESSION["userEmail"] = $user["mail"];
    $_SESSION["userPassword"] = $user["password"];
    header("Location: dashboard.php");
  }
  // If it is not OK sends the user to the login page with an error message
  else {
    header("Location: login.php?message=Nous n'avons pas réussi à vous identifier");
  }
}

// Function to check on the page if the user is authentificated
// If not, sends him to the login page
function checkIfUserIsLogged() {
  if (!isset($_SESSION["userEmail"]) OR !isset($_SESSION["userPassword"])) {
    header("Location: login.php");
  }
}

// Function to clear the session and send to the login page when the user logs out
function logOutUser() {
  $_SESSION["userEmail"] = "";
  $_SESSION["userPassword"] = "";
  session_destroy();
  header("Location: login.php");
}
 ?>
