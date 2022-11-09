<?php
include_once('db.inc.php');
if (isset($_GET['view'])) {
    $id = $_GET['view'];
    header("Location: ../users.php?id=" . $id . "");
} elseif (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM bbcal WHERE id = " . $id . "";
    mysqli_query($conn, $sql);
    header("Location: ../index.php");
} elseif (isset($_GET['img'])) {
    $id = $_GET['img'];
    header("Location: ../upload.php?id=" . $id . "");
} elseif (isset($_GET['upload'])) {
    $id = $_GET['upload'];
    $sql = "UPDATE bbcal SET upload = 'ส่งเสร็จสิ้น' WHERE id = " . $id . "";
    mysqli_query($conn, $sql);
    header("Location: ../index.php");
} elseif (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $sql = "SELECT * FROM bbcal WHERE id=" . $id . ";";
    $result = mysqli_query($conn, $sql);
    $resultChecker = mysqli_num_rows($result);
    echo $resultChecker;
    if ($resultChecker > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $CustomerName = $row['CustomerName'];
            $TestMachine = $row['TestMachine'];
            $Model = $row['Model'];
            $SerialNum = $row['SerialNum'];
            $Brand = $row['Brand'];
            $SetupDate = $row['SetupDate'];
            $CaliDate = $row['CaliDate'];
            $NextCal = $row['NextCal'];
            $CaliFreq = $row['CaliFreq'];
            $email = $row['email'];

            header("Location: ../update.php?id=" . $id . "&CustomerName=" . $CustomerName .
                "&TestMachine=" . $TestMachine .
                "&Model=" . $Model .
                "&SerialNum=" . $SerialNum .
                "&Brand=" . $Brand .
                "&SetupDate=" . $SetupDate .
                "&CaliDate=" . $CaliDate .
                "&NextCal=" . $NextCal .
                "&CaliFreq=" . $CaliFreq .
                "&email=" . $email);
        }
    }
} else {
    # code...
}
