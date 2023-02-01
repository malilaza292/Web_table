<!DOCTYPE html>
<html lang=en>
  <head>
<!-- include css -->
<link rel="stylesheet" href="css/index.css" />
<!-- include css -->
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <!-- scrimba bootstrap 4.0.0-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!-- scrimba bootstrap 4.0.0-->
</head>
<body>
<?php
  require("header.php");
?>
<div class="home-content">
     <div class="container-fluid">
    <div class="row">
      <div class="stat col-sm-3 shadow-sm bg-grey shadow-outline text-success">
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
      
      <div class="stat col-sm-3 shadow-sm bg-grey shadow-outline text-primary">
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
      <div class="stat col-sm-3 shadow-sm bg-grey shadow-outline text-warning ">   
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
             <div type="button" class="plus-button pull-right"><a style ="text-decoration:none" href="register.php">+</a></div>
		<input type="text" name="name" class="question" id="search" class="form-control" required autocomplete="off" />
		<label for="search"><span>ใส่ชื่อบริษัท หรือ ชื่อเครื่องได้ที่ช่องนี้</span></label>
	  </form>
  </p>
    <div class="search">
    </div>
           <div class="table-data">
      <table class="table table-striped table-hover" style='font-size:95%'>
      <thead class="thead-dark">
          <tr>
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
            <th>&nbsp;</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $current_date = date('Y-m-d');
            $sql = "SELECT * FROM bbcal ORDER BY DAY(Nextcal) DESC ";
            if (isset($_POST['data'])) {
              $filter = $_POST['data'];
              $connection = new mysqli_connect($servername, $username, $password, $database);
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
                            echo date('d-m-Y', strtotime($row['SetupDate']));
                          }
                        ?>  
                    </td>

                    <td>
                        <?php 
                          if ($row['CaliDate'] == ''){
                            echo '';
                          }else{
                            echo date('d-m-Y', strtotime($row['CaliDate']));
                          }
                        ?>  
                    </td>
                    
                    <td>
                        <?php 
                          if ($row['NextCal'] == ''){
                            echo '';
                          }else{
                            echo date('d-m-Y', strtotime($row['NextCal']));
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
                      <button type="submit" name="view"   value=<?php echo $row['id']; ?>>ดูรายละอียด</button>  
                      <button type="submit" name="edit"   value=<?php echo $row['id']; ?>>แก้ไขข้อมูลนี้</button>
                      <button type="submit" name="img"    value=<?php echo $row['id']; ?>>เพิ่มรูปรายชื่อ</button>
                        </form>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">ลบข้อมูลนี้</button>
                        </div>
                        <!-- ลบข้อมูล -->
        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">ลบข้อมูลนี้</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>ต้องการลบข้อมูลนี้ใช่หรือไม่</p>
                    </div>
                    <div class="modal-footer">
                      <form action="includes/table.inc.php" method="POST" class="d-inline">
                    <button type="button" class="btn btn-danger" name="delete" data-dismiss="modal" value="'.$id.'">ลบข้อมูล</button>
                    </form>
                        <button class="btn btn-primary" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
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
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script>
//SEARCH INPUT
$("#search").on("keyup", function() {
  value = $(this).val().toLowerCase();
  var value = $(this).val().toLowerCase();
  $(".table tbody tr").filter(function() {
    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
  });
  });

  $(document).ready(function(){
    $("#plus-button").mouseenter(function(){
        $(this).addClass("expanded");
    });
    $("#plus-button").mouseleave(function(){
        $(this).removeClass("expanded");
    });
});
</script>
</body>
</html>