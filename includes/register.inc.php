<?php
header('location: ../index.php');
if (isset($_POST['register'])) {
include_once('db.inc.php');

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
}

$sql = "INSERT INTO bbcal (CustomerName, TestMachine, Model, SerialNum, Brand, SetupDate, CaliDate, NextCal, CaliFreq , email) 
      
VALUES ('$CustomerName', '$TestMachine', '$Model', '$SerialNum', '$Brand', '$SetupDate', '$CaliDate', '$NextCal', '$CaliFreq', '$email')";
      
$result = mysqli_query($conn, $sql);
?>