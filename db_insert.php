<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <title>시승신청 조회</title>
  <!-- 부트스트랩 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    /* 전체 기본 설정 */
    body {
      margin: 0;
      padding: 0;
      background-color: #fff;
    }
    .hero-image {
      background-color: #dcdcdc;
      height: 350px;
      position: relative;
    }
    .breadcrumb-links {
      position: absolute;
      top: 20px;
      left: 20px;
    }
    .breadcrumb-links a {
      text-decoration: none;
      color: #000;
      margin: 0 5px;
    }
    .breadcrumb-links a:hover {
      text-decoration: underline;
    }
    .hero-content {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      text-align: center;
    }
    .table-container {
      text-align: center;
      margin: 40px auto;
    }
    .table-container table {
      width: 75%;
      margin: 0 auto;
    }
    .reserve-btn {
      text-align: center;
      margin-bottom: 40px;
    }
    .reserve-btn a {
      padding: 10px 40px;
      font-size: 1rem;
    }
    .search-section {
      width: 100%;
      background-color: #f1f1f1;
      padding: 20px 0;
      text-align: center;
    }
  </style>
</head>
<body>

<!-- 상단 큰 회색 영역 (이미지 자리) -->
<div class="hero-image">
  <!-- 왼쪽 상단 빵크럼 -->
  <div class="breadcrumb-links">
    <a href="#">홈</a> &gt;
    <a href="#">제품</a> &gt;
    <a href="#">시승신청 조회</a>
  </div>
  
  <!-- 중앙 타이틀/설명 -->
  <div class="hero-content">
    <h2 class="fw-bold">시승신청조회</h2>
    <p>캐스퍼가 제공하는 편리한 시승 서비스를 이용해 보세요.</p>
  </div>
</div>

<?php
  // -- 기존 PHP 로직(DB 입력) -------------------------------------
  $name   = $_POST['name'];
  $phone  = $_POST['phone'];
  $sms    = isset($_POST['sms']) ? $_POST['sms'] : '';
  $email  = $_POST['email'];
  $region = $_POST['region'];
  $s_car  = $_POST['car'];
  $my_car = $_POST['my_car'];
  $date   = $_POST['e_date'];

  $mysql_host     = 'localhost';
  $mysql_user     = 'kokoroko';
  $mysql_password = 'roru63!*be56';
  $mysql_db       = 'kokoroko';

  $conn = mysqli_connect($mysql_host, $mysql_user, $mysql_password, $mysql_db);
  if(!$conn){
    die('연결실패 : ' . mysqli_connect_error());
  }

  // 1) 새 데이터 INSERT
  $insert_query = "INSERT INTO test_drive
    (name, phone, sms, email, region, s_car, my_car, date)
    VALUES (
      '$name',
      '$phone',
      '$sms',
      '$email',
      '$region',
      '$s_car',
      '$my_car',
      '$date'
    )";
  $insert_result = mysqli_query($conn, $insert_query);
  if (!$insert_result) {
    die('INSERT 실패: ' . mysqli_error($conn));
  }

  // 2) 전체 행 SELECT
  $select_query = "SELECT * FROM test_drive ORDER BY code ASC";
  $select_result = mysqli_query($conn, $select_query);
  if (!$select_result) {
    die('SELECT 쿼리 실패: ' . mysqli_error($conn));
  }
?>

<!-- 현대자동차 시승신청 예약현황 + 표 (가운데 정렬) -->
<div class="table-container">
  <h4 class="fw-bold">현대자동차 시승신청 예약현황</h4>
  <table class="table table-bordered mt-3">
    <thead class="table-dark">
      <tr>
        <th>번호</th>
        <th>성명</th>
        <th>전화번호</th>
        <th>SMS수신여부</th>
        <th>이메일 주소</th>
        <th>전시장</th>
        <th>차량</th>
        <th>보유차량</th>
        <th>시승희망일</th>
      </tr>
    </thead>
    <tbody style="background-color: #fff;">
      <?php
      // 3) while 반복문으로 전체 행 출력
      while($row = mysqli_fetch_assoc($select_result)){
        echo "<tr>";
        echo "<td>" . $row['code'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['phone'] . "</td>";
        echo "<td>" . $row['sms'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['region'] . "</td>";
        echo "<td>" . $row['s_car'] . "</td>";
        echo "<td>" . $row['my_car'] . "</td>";
        echo "<td>" . $row['date'] . "</td>";
        echo "</tr>";
      }
      ?>
    </tbody>
  </table>
</div>

<div class="reserve-btn">
  <a href="test_drive.php" class="btn btn-primary btn-lg">시승신청 예약하기</a>
</div>

<!-- 예약조회하기 섹션(회색 배경) + 검색창 -->
<div class="search-section">
  <?php
    // 예약조회하기 버튼을 짙은색으로 (Bootstrap .btn-dark)
    echo "<div>
      <form method='post' action='db_search.php'>
        <input type='search' placeholder='홍길동' name='search_txt'>
        <input type='submit' value='예약조회하기' class='btn btn-dark'>
      </form>
    </div>";
  ?>
</div>

<?php
  // 리소스 정리
  mysqli_free_result($select_result);
  mysqli_close($conn);
?>

<!-- 부트스트랩 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
