<?php 
  include('./sub/header.php')
?>

  <!-- 부트스트랩 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!--메인콘텐츠영역-->
<main>
  <!-- 상단 영역(배경 + 제목 + 소개 문구) -->
  <div class='sub_top'>
    <nav>홈 &gt; 체험 &gt; <b>시승신청</b></nav>
    <h2>시승신청</h2>
    <p>캐스퍼가 제공하는 편리한 시승 서비스를 이용해보세요</p>
  </div>

  <!-- 시승신청 폼 영역 -->
  <section class="online_reserve">
  <form name="시승신청" method="post" action="db_insert.php" onsubmit="return form_check()">
    <fieldset>
      <legend>시승신청 온라인 예약</legend>

      <!-- 고객명 -->
      <div class="me-7">
        <label for="name">고객명 :</label>
        <input type="text" id="name" name="name" required>
      </div>

      <!-- 휴대폰 -->
      <div class="me-7">
        <label for="phone">휴대폰 :</label>
        <input type="text" id="phone" name="phone" required>
      </div>

<!-- SMS수신여부 (라디오 버튼) -->
<div class="me-7 d-inline-flex align-items-center" 
     style="gap:0; white-space:nowrap; font-size:0;">
  <!-- 부모에 font-size:0; → 인라인 요소 간 공백 최소화
       white-space:nowrap; → 줄바꿈으로 인한 공백 방지 -->

  <label style="margin:0 5px 0 0; padding:0; font-size:16px; vertical-align:middle;">
    SMS수신여부 :
  </label>

  <!-- 첫 번째 라디오 버튼 + 라벨 -->
  <input type="radio" id="s01" name="sms" value="Y" required
         style="
           margin:0; 
           padding:0; 
           vertical-align:middle; 
           /* 라벨과 붙이기 위해 음수 마진 적용 */
           margin-right:-2px;
         ">
  <label for="s01" 
         style="
           margin:0; 
           padding:0; 
           font-size:16px; 
           vertical-align:middle;
           /* 라벨과 버튼을 더 붙이거나 띄우고 싶으면 이 값 조절 */
           margin-right:20px;
         ">
    수신
  </label>

  <!-- 두 번째 라디오 버튼 + 라벨 -->
  <input type="radio" id="s02" name="sms" value="N"
         style="
           margin:0; 
           padding:0; 
           vertical-align:middle; 
           margin-right:-2px;
         ">
  <label for="s02" 
         style="
           margin:0; 
           padding:0; 
           font-size:16px; 
           vertical-align:middle;
         ">
    수신안함
  </label>
</div>

      <!-- 이메일 주소 -->
      <div class="me-7">
        <label for="email">이메일 주소 :</label>
        <input type="email" id="email" name="email" required>
      </div>

      <!-- 전시장 선택 -->
      <div class="me-7">
        <label for="region">전시장 선택 :</label>
        <select id="region" name="region" required>
          <option value="">전시장 선택</option>
          <option value="강남점">강남점</option>
          <option value="송파점">송파점</option>
          <option value="한남점">한남점</option>
        </select>
      </div>

      <!-- 차량 선택 -->
      <div class="me-7">
        <label for="car">차량 선택 :</label>
        <select id="car" name="car" required>
          <option value="">차량 선택</option>
          <option value="캐스퍼">캐스퍼</option>
          <option value="캐스퍼 인스퍼레이션">캐스퍼 인스퍼레이션</option>
          <option value="소나타">소나타</option>
          <option value="그렌저">그렌저</option>
          <option value="제네시스">제네시스</option>
        </select>
      </div>

      <!-- 보유차종 -->
      <div class="me-7">
        <label for="my_car">보유차종 :</label>
        <input type="text" id="my_car" name="my_car" required>
      </div>

      <!-- 시승희망일 -->
      <div class="me-7">
        <label for="e_date">시승희망일 :</label>
        <input type="date" id="e_date" name="e_date" required>
      </div>

      <!-- 버튼 그룹 -->
      <div class="btn_group text-center">
        <input type="submit" value="예약하기">
        <input type="reset" value="취소하기">
      </div>

    </fieldset>
  </form>
</section>
</main>

<!-- 부트스트랩 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- 폼 체크 스크립트 -->
<script>
  function form_check() {
    // 1) 고객명 체크
    if (!document.getElementById('name').value) {
      alert('고객명을 입력하세요.');
      document.getElementById('name').focus();
      return false;
    }
    // 2) 휴대폰 체크
    if (!document.getElementById('phone').value) {
      alert('휴대폰 번호를 입력하세요.');
      document.getElementById('phone').focus();
      return false;
    }
    // 3) SMS수신여부 체크 (라디오 버튼)
    let smsChecked = document.querySelector('input[name="sms"]:checked');
    if (!smsChecked) {
      alert('SMS수신여부를 선택하세요.');
      document.getElementById('s01').focus();
      return false;
    }
    // 4) 이메일 체크
    if (!document.getElementById('email').value) {
      alert('이메일 주소를 입력하세요.');
      document.getElementById('email').focus();
      return false;
    }
    // 5) 전시장 선택 체크
    if (document.getElementById('region').value === '') {
      alert('전시장을 선택하세요.');
      document.getElementById('region').focus();
      return false;
    }
    // 6) 차량 선택 체크
    if (document.getElementById('car').value === '') {
      alert('차량을 선택하세요.');
      document.getElementById('car').focus();
      return false;
    }
    // 7) 보유차종 체크
    if (!document.getElementById('my_car').value) {
      alert('보유차종을 입력하세요.');
      document.getElementById('my_car').focus();
      return false;
    }
    // 8) 시승희망일 체크
    if (!document.getElementById('e_date').value) {
      alert('시승희망일을 입력하세요.');
      document.getElementById('e_date').focus();
      return false;
    }

    // 모두 입력되었으면 true
    return true;
  }
</script>

<?php 
  include('./sub/footer.php')
?>
