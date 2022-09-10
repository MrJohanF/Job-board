<?php include "db.php" ?>

<?php session_start(); ?>


<?php
if (isset($_POST['login_admin'])) {


  $admin_username = $_POST['username_admin'];
  $admin_password = $_POST['password_admin'];

  $admin_username = mysqli_real_escape_string($connection, $admin_username);
  $admin_password = mysqli_real_escape_string($connection, $admin_password);


  $query_admin = "SELECT * FROM administrador WHERE username = '{$admin_username}'";
  $select_admin_query = mysqli_query($connection, $query_admin);
  if (!$select_admin_query) {
    die("QUERY FAILED" . mysqli_error($connection));
  }

  while ($row = mysqli_fetch_array($select_admin_query)) {

    $db_admin_id = $row['idAdmin'];
    $db_admin_username = $row['username'];
    $db_admin_password = $row['password'];
  }

  if ($admin_username !== $db_admin_username && $admin_password !== $db_admin_password) {


    header("Location: ../admin_login.php");
  } else if ($admin_username == $db_admin_username && $admin_password == $db_admin_password) {


    $_SESSION['a_idAdmin'] = $db_admin_id;

    header("Location: ../administrador.php");
  } else {
    header("Location: ../admin_login.php");
  }
}

?>