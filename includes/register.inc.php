<?php
if (isset($_POST['register'])) {
  include_once('db.inc.php');
$id = $_POST['id'];
$CustomerName=trim($_POST['CustomerName']);
$TestMachine=@$_POST['TestMachine'];
$Model=@$_POST['Model'];
$SerialNum=@$_POST['SerialNum'];
$Brand=@$_POST['Brand'];
$SetupDate=@$_POST['SetupDate'];
$CaliDate=@$_POST['CaliDate'];
$NextCal=@$_POST['NextCal'];
$CaliFreq=@$_POST['CaliFreq'];
$email=@$_POST['email'];

// var_dump($fName);

if (empty($CustomerName) || empty($TestMachine) || empty($Model)|| empty($SerialNum) || empty($Brand) || empty($SetupDate) 

|| empty($CaliDate)|| empty($NextCal)|| empty($CaliFreq)|| empty($email)) {

  header('Location: ../register.php?error=emptyfield');
  exit();
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  header('Location: ../register.php?error=wrongemail');
  exit();
} else {
    $sql = "SELECT * FROM bbcal WHERE CustomerName = '$CustomerName';";
    $result = mysqli_query($conn, $sql);
    $resultChecker = mysqli_num_rows($result);
    if ($resultChecker > 10) {
      header('Location: ../register.php?error=userexist');
  exit();
    } else {
      $sql = "INSERT INTO bbcal (CustomerName, TestMachine, Model, SerialNum, Brand, SetupDate, CaliDate, NextCal, CaliFreq , email) 
      
      VALUES ('$CustomerName', '$TestMachine', '$Model', '$SerialNum', '$Brand', '$SetupDate', '$CaliDate', '$NextCal', '$CaliFreq', '$email')";
      
      $result = mysqli_query($conn, $sql);
      
      header('Location: ../index.php?error=success');
    }
}
} else {
 header('Location: ../register.php');
}
