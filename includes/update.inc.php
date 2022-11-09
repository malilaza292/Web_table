<?php

if (isset($_POST['update'])) {
  include_once('db.inc.php');
  $CustomerName =trim( $_POST['CustomerName']) ;
  $TestMachine = trim($_POST['TestMachine']);
  $Model = trim($_POST['Model']);
  $SerialNum = trim($_POST['SerialNum']);
  $Brand = trim($_POST['Brand']);
  $SetupDate = ($_POST['SetupDate']);
  $CaliDate = $_POST['CaliDate'];
  $NextCal = ($_POST['NextCal']);
  $CaliFreq = trim($_POST['CaliFreq']);
  $email = trim($_POST['email']);
  $id = ($_POST['id']) ;
  if (empty($CustomerName) || empty($TestMachine) || empty($Model) || empty($SerialNum) || empty($Brand) 
  || empty($SetupDate) || empty($CaliDate) || empty($NextCal) || empty($CaliFreq) || empty($email)) {
    header('Location: ../update.php?error=emptyfield');
    exit();
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: ../update.php?error=wrongemail');
    exit();
  } else {
    $sql = "UPDATE bbcal SET CustomerName = '$CustomerName', TestMachine = '$TestMachine', Model = '$Model', SerialNum = '$SerialNum', Brand = '$Brand', SetupDate = '$SetupDate', CaliDate = '$CaliDate', NextCal = '$NextCal', CaliFreq = '$CaliFreq', email = '$email' WHERE id = $id;";
    $result = mysqli_query($conn, $sql);
    header('Location: ../index.php?update=success');
  }
} else {
  header('Location: ../update.php');
}
