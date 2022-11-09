<?php
  require("header.php");
  
?>

<body>
    <div class="container-fluid" id="form-container">
        <div class="form-container shadow">
          <div class="register-form">
            <form method="post" action="includes/update.inc.php">
              <div class="mb-3">
                <h3>UPDATE USER</h3>
                <h5>กรุณากรอกข้อมูลให้ครบถ้วน</h5>
              </div>
              <input type="number" name="id" value="<?php echo $_GET['id']; ?>" style="width:35px; visibility:hidden;">
              <div class="mb-3">
                <label for="CustomerName" class="form-label">Customer Name</label> 
                <input type="text" name="CustomerName" value="<?php echo $_GET['CustomerName']; ?>" class="form-control" id="CustomerName">
              </div>
              <div class="mb-3">
                <label for="TestMachine" class="form-label">Test Machine</label>
                <input type="text" name="TestMachine" value="<?php echo $_GET['TestMachine']; ?>" class="form-control" id="TestMachine">
              </div>
              <div class="mb-3">
                <label for="Model" class="form-label">Model</label>
                <input type="text" name="Model" value="<?php echo $_GET['Model']; ?>" class="form-control" id="Model">
              </div>
              <div class="mb-3">
                <label for="SerialNum" class="form-label">Serial Number</label>
                <input type="text" name="SerialNum" value="<?php echo $_GET['SerialNum']; ?>" class="form-control" id="SerialNum">
              </div>
              <div class="mb-3">
                <label for="Brand" class="form-label">Brand</label>
                <input type="text" name="Brand" value="<?php echo $_GET['Brand']; ?>" class="form-control" id="Brand">
              </div>
              <div class="mb-3">
                <label for="SetupDate" class="form-label">Setup Date</label>
                <input type="text" name="SetupDate" value="<?php echo $_GET['SetupDate']; ?>" class="form-control" id="SetupDate">
              </div>
              <div class="mb-3">
                <label for="CaliDate" class="form-label">Calibration Date</label>
                <input type="text" name="CaliDate" value="<?php echo $_GET['CaliDate']; ?>" class="form-control" id="CaliDate">
              </div>
              <div class="mb-3">
                <label for="NextCal" class="form-label">Next Cal</label>
                <input type="text" name="NextCal" value="<?php echo $_GET['NextCal']; ?>" class="form-control" id="NextCal">
              </div>
              <div class="mb-3">
                <label for="CaliFreq" class="form-label">Calibration Freq</label>
                <input type="text" name="CaliFreq" value="<?php echo $_GET['CaliFreq']; ?>" class="form-control" id="CaliFreq">
              </div>
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" value="<?php echo $_GET['email']; ?>" class="form-control" id="email">
              </div>
              <button type="submit" name="update" class="btn">Update</button>
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