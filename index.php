<link rel="stylesheet" href="css/index.css" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  
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
        <p>รายชื่อบริษัทที่ส่งไปเเล้ว
        </p>
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
             <form>
		<input type="text" name="name" class="question" id="search" class="form-control"required autocomplete="off" />
		<label for="search"><span>ใส่ชื่อบริษัท หรือ ชื่อเครื่องได้ที่ช่องนี้</span></label>
	  </form></p>
    <div class="search">
    </div>
           <div class="table-data">
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th>ลำดับ</th>
            <th>ชื่อลูกค้า</th>
            <th>เครื่องทดสอบ</th>
            <th>รุ่น</th>
            <th>หมายเลข</th>
            <th>ยี่ห้อ</th>
            <th>วันติดตั้ง</th>
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
              $sql .= " WHERE CustomerName LIKE '%$filter%' OR TestMachine LIKE '%$filter%' OR 
                        Model LIKE '%$filter%' OR  SerialNum LIKE '%$filter%' OR Brand LIKE '%$filter%' 
                        OR SetupDate LIKE '%$filter%' OR CaliDate LIKE '%$filter%' OR NextCal LIKE '%$filter%' 
                        OR CaliFreq LIKE '%$filter%' OR email LIKE '%$filter%'";
            }

            $result = mysqli_query($conn, $sql);
            $resultChecker = mysqli_num_rows($result);
            if ($resultChecker > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
          ?>
              <tr>
                  <td><?php echo $row['id']?></td>
                  <td><?php echo $row['CustomerName']?></td>
                  <td><?php echo $row['TestMachine']?></td> 
                  <td><?php echo $row['Model']?></td> 
                  <td><?php echo $row['SerialNum']?></td> 
                  <td><?php echo $row['Brand']?></td>
                  <td>
                        <?php 
                          if ($row['SetupDate'] == ''){
                            echo '';
                          }else{
                            echo date('m-d-Y', strtotime($row['SetupDate']));
                          }
                        ?>  
                    </td>

                    <td>
                        <?php 
                          if ($row['CaliDate'] == ''){
                            echo '';
                          }else{
                            echo date('m-d-Y', strtotime($row['CaliDate']));
                          }
                        ?>  
                    </td>
                    
                    <td>
                        <?php 
                          if ($row['NextCal'] == ''){
                            echo '';
                          }else{
                            echo date('m-d-Y', strtotime($row['NextCal']));
                          }
                        ?>  
                    </td>
                  <td><?php echo $row['CaliFreq']?></td>
                  <td><?php echo $row['email']?></td>
                  <td><?php echo $row['upload']?></td>
                  <td>•••
                    <div class="links shadow-sm">
                      <a class="btn btn-success" type="submit" href="mailto:<?php echo $row['email']?>?Subject=(เรียนเพื่อทราบ)&body=ชื่อบริษัท <?php echo $row['CustomerName']?> เครื่อง <?php echo $row['TestMachine']?> %20%0Aจะมีการสอบเทียบภายในอีก 1 เดือนจึงเเจ้งมาให้ทราบขอบคุณ %20%0Aโดยวันที่ <?php echo $row['NextCal']?> จะมีการสอบเทียบ %20%0Aติดต่อได้ที่ 188/26 หมู่ที่ 3 ต.บางศรีเมือง อ.เมืองนนทบุรี จ.นนทบุรี ประเทศไทย เทศบาลนครนนทบุรี 11000 %20%0Aเบอร์โทร: 02-881-5586 หรือ FAX: 02-881-5587" value="'.$id.'">ส่งข้อมูล</a>
                      <form method="get" action="includes/table.inc.php?id=<?php echo $row['id']; ?>">
                      <button type="submit" name="view"   value =<?php echo $row['id']; ?>>ดูรายละอียด</button>  
                      <button type="submit" name="edit"   value=<?php echo $row['id']; ?>>แก้ไขข้อมูลนี้</button>
                      <button type="submit" name="delete" value=<?php echo $row['id']?> <?php echo "<a onClick=\"javascript: return confirm('ต้องการลบข้อมูลนี้ใช่หรือไม่');\" href='delete.php?delete=".$row['id']."'ลบข้อมูลนี้";?> ?>ลบข้อมูลนี้</button>
                      <button type="submit" name="img"    value=<?php echo $row['id']; ?>>เพิ่มรูปรายชื่อ</button>
                  </div>
                </td> 
              </tr>
            <?php
            }
          } 
?>
        </tbody>
      </table>
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