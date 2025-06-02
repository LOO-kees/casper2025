<?php
// 1. 검색어 받기
$search_txt = $_POST['search_txt']; // 고객명

// 2. DB 연결
$mysql_host     = 'localhost';
$mysql_user     = 'kokoroko';
$mysql_password = 'roru63!*be56';
$mysql_db       = 'kokoroko';

$conn = mysqli_connect($mysql_host, $mysql_user, $mysql_password, $mysql_db);
if (!$conn) {
    die('데이터베이스 연결 실패: ' . mysqli_connect_error());
}

// 3. 검색 쿼리 작성
// 정확 일치 검색: name = '$search_txt'
// 부분 일치 검색: name LIKE '%$search_txt%'
$query = "SELECT * FROM test_drive WHERE name LIKE '%$search_txt%'";

// 4. 쿼리 실행
$result = mysqli_query($conn, $query);
if (!$result) {
    die('쿼리 실행 실패: ' . mysqli_error($conn));
}

// 5. 결과 출력 (HTML 테이블)
?>
<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <title>시승신청 검색 결과</title>
  <style>

  </style>
</head>
<body>
  <h2>고객명 검색 결과</h2>
  <?php
  echo "<table>";
  echo "<caption>'{$search_txt}' 검색 결과</caption>";
  echo "<thead>
          <tr>
            <th>code</th>
            <th>고객명</th>
            <th>휴대폰</th>
            <th>sms</th>
            <th>이메일</th>
            <th>전시장</th>
            <th>차량</th>
            <th>보유차량</th>
            <th>시승희망일</th>
          </tr>
        </thead>
        <tbody>";

  // 6. 반복문으로 결과 출력
  while ($row = mysqli_fetch_assoc($result)) {
      echo "<tr>";
      echo "<td>{$row['code']}</td>";
      echo "<td>{$row['name']}</td>";
      echo "<td>{$row['phone']}</td>";
      echo "<td>{$row['sms']}</td>";
      echo "<td>{$row['email']}</td>";
      echo "<td>{$row['region']}</td>";
      echo "<td>{$row['s_car']}</td>";
      echo "<td>{$row['my_car']}</td>";
      echo "<td>{$row['date']}</td>";
      echo "</tr>";
  }

  echo "</tbody></table>";

  // 7. DB 리소스 정리
  mysqli_free_result($result);
  mysqli_close($conn);
  ?>

  <!-- 이전 페이지로 돌아가기 버튼 -->
  <div>
    <button onclick="history.back()">이전 페이지로</button>
  </div>
</body>
</html>
