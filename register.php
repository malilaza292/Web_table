<?php
  require("header.php");
?>
  <?php
    if (isset($_GET['error'])) {
      $error = $_GET['error'];
      if ($error == "emptyfield") {
        echo '<div class="to shadow">
        <p class="pt-3">Empty Fields</p>
      </div>';
      } elseif ($error == "wrongemail") {
        echo '<div class="to shadow">
        <p class="pt-3">Wrong Email</p>
      </div>';
      } elseif ($error == "success") {
        echo '<div class="to shadow">
        <p class="pt-3">เพิ่มเสร็จสิ้น</p>
      </div>';
      }
    }
  ?>
    <div class="container-fluid" id="form-container">
        <div class="form-container shadow">
          <div class="register-form">
            <form method="post" action="includes/register.inc.php">
              <div class="mb-3">  
                <h3>เพิ่มข้อมูล</h3>
              </div>
              <div class="mb-3">
                <label for="CustomerName" class="form-label">ชื่อบริษัท</label>
                <input type="text" name="CustomerName" class="form-control" id="CustomerName" autocomplete="on">
              </div>
              <div class="mb-3">
                <label for="TestMachine" class="form-label">เครื่องทดสอบ</label>
                <input type="text" name="TestMachine" class="form-control" id="TestMachine" autocomplete="on">
              </div>
              <div class="mb-3">
                <label for="Model" class="form-label">โมเดล</label>
                <input type="text" name="Model" class="form-control" id="Model" autocomplete="on">
              </div>
              <div class="mb-3">
                <label for="SerialNum" class="form-label">รหัสเครื่อง</label>
                <input type="text" name="SerialNum" class="form-control" id="SerialNum" autocomplete="on">
              </div>
              <div class="mb-3">
                <label for="Brand" class="form-label">ยี่ห้อ</label>
                <input type="text" name="Brand" class="form-control" id="Brand" autocomplete="on">
              </div>
              <div class="mb-3">
                <label for="SetupDate" class="form-label">วันที่ติดตั้ง</label>
                <input type="date" name="SetupDate" class="form-control" id="SetupDate" autocomplete="on" value="00/00/00" data-date-format="dd/mm/yy" id="dp2">
              </div>
              <div class="mb-3">
                <label for="CaliDate" class="form-label">วันที่สอบเทียบ</label>
                <input type="date" name="CaliDate" class="form-control" id="CaliDate" autocomplete="on" value="00/00/00" data-date-format="dd/mm/yy" id="dp2">
              </div>
              <div class="mb-3">
                <label for="NextCal" class="form-label">วันที่สอบเทียบครั้งต่อไป</label>
                <input type="date" name="NextCal" class="form-control" id="NextCal" autocomplete="on" value="00/00/00" data-date-format="dd/mm/yy" id="dp2">
              </div>
              <div class="mb-3">
                <label for="CaliFreq" class="form-label">ความถี่สอบเทียบ</label>
                <input type="text" name="CaliFreq" class="form-control" id="CaliFreq" autocomplete="on">
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email" autocomplete="on">
              </div>
              <!-- <div class="mb-3">
                <label for="profileImg" class="form-label">Upload A Profile Image</label><br>
                <input type="file" name="profileImg" id="profileImg">
              </div> -->
              <button type="submit" name="register" class="btn">Register</button>
            </div>
            </form>
          </div>
        </div>
    </div>
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