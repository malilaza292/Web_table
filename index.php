<?php
  require("header.php");
?>
<div class="home-content">
     <div class="container-fluid">
    <div class="row">
      <div class="stat col-sm-3 shadow-sm bg-white text-success">
        <div class="bg-success">
          <i class="fa-solid fa-users text-white"></i> 
        </div>
        <?php
          $sql = "SELECT * FROM bbcal";
          $result = mysqli_query($conn, $sql);
          $resultChecker = mysqli_num_rows($result);
          echo '<h4>'.$resultChecker.'</h4>';
        ?>
        <p>ข้อมูลบริษัททั้งหมด</p>
      </div>
      
      <div class="stat col-sm-3 shadow-sm bg-white text-primary">
        <div class="bg-primary">
          <i class="fa-solid fa-user-check text-white"></i>
        </div>
        <?php
          $sql = "SELECT * FROM bbcal WHERE upload = 'ส่งเสร็จสิ้น';";
          $result = mysqli_query($conn, $sql);
          $resultChecker = mysqli_num_rows($result);
          echo '<h4>'.$resultChecker.'</h4>';
        ?>
        <p>รายชื่อบริษัทที่ส่งเดือนนี้</p>
      </div>
      <div class="stat col-sm-3 shadow-sm bg-white text-warning">   
        <div class="bg-warning">
          <i class="fa-solid fa-user-clock text-white"></i>
        </div>
        <?php
          $sql = "SELECT * FROM bbcal WHERE upload = 'ยังไม่ได้ส่ง';";
          $result = mysqli_query($conn, $sql);
          $resultChecker = mysqli_num_rows($result);
          echo '<h4>'.$resultChecker.'</h4>';
        ?>
        <p>รายชื่อบริษัทที่ต้องส่ง</p>
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <div class="row">
       <div class="col-md-8">
           <div class="search">
             <i class="fa-solid fa-magnifying-glass"></i>
      <input type="text" name="" id="search" class="form-control" placeholder="Search" />
    </div>
           <div class="table-data">
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th>Customer</th>
            <th>Machine</th>
            <th>Model</th>
            <th>Serial</th>
            <th>Brand</th>
            <th>วันที่ติดตั้ง</th>
            <th>วันที่สอบเทียบ</th>
            <th>วันที่สอบเทียบครั้งต่อไป</th>
            <th>ความถี่สอบเทียบ</th>
            <th>ติดต่อ</th>
            <th>สถานะ</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $sql = "SELECT * FROM bbcal ";
          if (isset($_POST['data'])) {
            $filter = $_POST['data'];
            $sql .= " WHERE CustomerName LIKE '%$filter%' OR TestMachine LIKE '%$filter%' OR Model LIKE '%$filter%' OR  SerialNum LIKE '%$filter%' OR Brand LIKE '%$filter%' OR SetupDate LIKE '%$filter%' OR CaliDate LIKE '%$filter%' OR NextCal LIKE '%$filter%' OR CaliFreq LIKE '%$filter%' OR email LIKE '%$filter%'";
          }
          $result = mysqli_query($conn, $sql);
          $resultChecker = mysqli_num_rows($result);
          if ($resultChecker > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              $id = $row['id'];
              $CustomerName=@$row['CustomerName'];
              $TestMachine=@$row['TestMachine'];
              $Model=@$row['Model'];
              $SerialNum=@$row['SerialNum'];
              $Brand=@$row['Brand'];
              $SetupDate=@$row['SetupDate'];
              $CaliDate=@$row['CaliDate'];
              $NextCal=@$row['NextCal'];
              $CaliFreq=@$row['CaliFreq'];
              $email=@$row['email'];
              $upload =@$row['upload'];
              
              
              echo '<tr >  
              <td>'.$CustomerName.'</td> 
              <td>'.$TestMachine.'</td>
              <td>'.$Model.'</td>
              <td>'.$SerialNum.'</td>
              <td>'.$Brand.'</td>
              <td>'.$SetupDate.'</td>
              <td>'.$CaliDate.'</td>
              <td>'.$NextCal.'</td>
              <td>'.$CaliFreq.'</td>  
              <td>'.$email.'</td>
              <td>'.$upload.'</td>
              <td>•••<div class="links shadow-sm">
              <a class="btn btn-primary" type="submit" role="upload" href="mailto:อีเมล์ลูกค้า@email.com?Subject=(เรียนเพื่อทราบ)&body=จะมีการสอบเทียบภายในอีก 1 เดือนจึงเเจ้งมาให้ทราบขอบคุณ %20%0Aติดต่อได้ที่ เบอร์โทร: 02-881-5586 หรือ FAX: 02-881-5587" value="'.$id.'">ส่งข้อมูล</a>
              <form method="get" action="includes/table.inc.php?id="'.$id.'"">
                <button type="submit" name="view"   value="'.$id.'">ดูรายละอียด</button>
                <button type="submit" name="edit"   value="'.$id.'">แก้ไขข้อมูลนี้</button>
                <button type="submit" name="delete" value="'.$id.'">ลบข้อมูลนี้</button>
                <button type="submit" name="img"    value="'.$id.'">เพิ่มรูปรายชื่อ</button>
              </div></td>
              </form>
            </tr>';
            }
          } else {
            echo '<h1 style="color:red;">ไม่มีข้อมูล</h1>';
          }

          ?>
        </tbody>
      </table>
    </div>
       </div>
    </div>
  </div>
</div>

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
})


//SEARCH INPUT
$("#search").on("keyup", function() {
  value = $(this).val().toLowerCase();
  var value = $(this).val().toLowerCase();
  $(".table tbody tr").filter(function() {
    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
  });
  });

</script>