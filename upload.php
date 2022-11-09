<?php
    require('header.php');
?>
<?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }
    if (isset($_GET['error'])) {
      $error = $_GET['error'];
      if ($error == "largeimg") {
        echo '<div class="to shadow">
        <p class="pt-3">ขนาดรูปใหญ่ไป</p>
      </div>';
      } elseif ($error == "error") {
        echo '<div class="to shadow">
        <p class="pt-3">มีปัญหาระหว่างอัพโหลด</p>
      </div>';
      } elseif ($error == "type") {
        echo '<div class="to shadow">
        <p class="pt-3">ไม่ได้อัพรูปภาพ</p>
      </div>';
      }  elseif ($error == "success") {
        echo '<div class="to shadow">
        <p class="pt-3">อัพโหลดเสร็จสิ้น</p>
      </div>';
      }
    }
    
?>
    <div class="container-fluid" id="form-container">
        <div class="form-container shadow">
          <div class="register-form">
            <form method="post" action="includes/upload.inc.php?id=<?php echo $id ?>" enctype="multipart/form-data">
              <div class="mb-3">
                <h3>อัพโหลดรูปโปรไฟล์</h3>
              </div>
              <div class="mb-3">
                <label for="img" class="form-label">อัพโหลด รูปภาพ</label>
                <input type="file" name="img" class="form-control" id="img">
              </div>
              <button type="submit" name="upload" class="btn">อัพโหลด</button>
            </div>
            </form>
          </div>
        </div>
    </div>
<?php
    require('footer.php');
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