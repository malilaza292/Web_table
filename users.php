<?php
require("header.php");
?>

<body>
    <?php
    $id = $_GET['id'];
    if (!$id) {
        $sql = "SELECT * FROM bbcal";
    } else {
        $sql = "SELECT * FROM bbcal WHERE id =" . $id . "";
    }
    $result = mysqli_query($conn, $sql);
    $resultChecker = mysqli_num_rows($result);
    if ($resultChecker > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $CustomerName = @$row['CustomerName'];
            $TestMachine = @$row['TestMachine'];
            $Model = @$row['Model'];
            $SerialNum = @$row['SerialNum'];
            $Brand = @$row['Brand'];
            $SetupDate = @$row['SetupDate'];
            $CaliDate = @$row['CaliDate'];
            $NextCal = @$row['NextCal'];
            $CaliFreq = @$row['CaliFreq'];
            $email = @$row['email'];
            $upload = $row['upload'];
            $status = $row['Imgstatus'];
            if ($status == 0) {
                echo '<div class="container-fluid">
                            <div class="photo-card-container d-flex align-items-center justify-content-center">
                                <div class="photo-card shadow">
                            <div class="img-sec">
                            <img src="./images/user.png" alt="Profile Photo">
                        </div>';
            } else {
                $img = "images/profile" . $id . "*";
                $imgSearch = glob($img);
                echo '<div class="container-fluid">
                        <div class="photo-card-container d-flex align-items-center justify-content-center">
                         <div class="photo-card shadow">
                            <div class="img-sec">
                            <img src="' . $imgSearch[0] . '" alt="Profile Photo">
                        </div>';
            }
            echo '<div class="info-sec">
                        <p class="CustomerName">ชื่อบริษัท: <span>' . $CustomerName . '</span></p>
                        <p class="TestMachine">ชื่อเครื่อง: <span>' . $TestMachine . '</span></p>
                        <p class="Model">โมเดล: <span>' . $Model . '</span></p>
                        <p class="SerialNum">รหัสเครื่อง: <span>' . $SerialNum . '</span></p>
                        <p class="Brand">เเบรนด์: <span>' . $Brand . '</span></p>
                        <p class="SetupDate">วันที่ติดตั้ง: <span>' . $SetupDate . '</span></p>
                        <p class="CaliDate">วันสอบเทียบ: <span>' . $CaliDate . '</span></p>
                        <p class="NextCal">วันสอบเทียบครั้งต่อไป: <span>' . $NextCal . '</span></p>
                        <p class="CaliFreq">ความถี่สอบเทียบ: <span>' . $CaliFreq . '</span></p>
                        <p class="email">ติดต่อ: <span>' . $email . '</span></p>
                    </div>
                </div>
            </div>
        </div>';
            // <button onclick="window.print()" class="print-card-buttton">Print Card</button>
        }
    }

    ?>
    <?php
    require("footer.php");
    ?>
    <script>
var btns = document.querySelectorAll('#btn');
var closeBtn1 = document.querySelector('.fa-x');
var closeBtn2 = document.querySelector('.fa-bars');
var sideBar = document.querySelector('.sidebar');
var currentTheme = document.querySelector('.current div');
var otherThemes = document.querySelectorAll('.theme div');

//THEMES
otherThemes.forEach(otherTheme => {
  otherTheme.addEventListener('click', function() {
    let x = otherTheme.className;
      $(':root').css({
        '--green': x,
      });    
    switch (x) {
      case 'green':
        currentTheme.className = 'green';
        break;
      case 'red':
        currentTheme.className = 'red';
        break;
      case 'blue':
        currentTheme.className = 'blue';
        break;
        case 'violet':
          currentTheme.className = 'violet';
          break;
      default:
        break;
    }
});
});

//TOGGLE CLOSE BUTTON
btns.forEach(btn => {
  btn.onclick = function() {
    sideBar.classList.toggle('active');
    closeBtn1.classList.toggle('hide');
    closeBtn2.classList.toggle('hide');
    sideBar.style.transition = 'all ease 0.5s';
}
});


//SEARCH INPUT
$("#search").on("keyup", function() {
  value = $(this).val().toLowerCase();
  var value = $(this).val().toLowerCase();
  $(".table tbody tr").filter(function() {
    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
  });
  });

$('#dp2').datepicker();
</script>