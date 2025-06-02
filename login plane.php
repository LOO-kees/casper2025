<?php 
include('./sub/header.php');
?>

<!-- 부트스트랩 CSS CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
#log_s{
    background: #d5e2f2; /* 연한 파란톤 배경 */
  margin: 0 auto;
  padding: 153px 0px;
}
</style>

  <section id="log_s">
  <!-- 로그인 폼 시작 -->
  <form name="로그인" action="login_check.php" method="post" onsubmit="return form_check()">
    <fieldset>
      <legend>로그인</legend>
      
      <!-- 아이디 입력 -->
      <label for="user_id"></label>
      <input type="text" id="user_id" name="user_id" placeholder="아이디를 입력해주세요.">

      <!-- 비밀번호 입력 -->
      <label for="user_pw"></label>
      <input type="password" id="user_pw" name="user_pw" placeholder="비밀번호를 입력해주세요.">

      <!-- 아이디 저장 체크박스 -->
      <div class="save_id">
        <input type="checkbox" id="save_id" name="save_id">
        <label for="save_id">아이디 저장</label>
      </div>

      <!-- 로그인 버튼 -->
      <button type="submit" class="btn_login">로그인</button>

      <!-- 하단 링크 -->
      <div>
        <a href="#" title="아이디 찾기">아이디 찾기</a>
        <a href="#" title="비밀번호 찾기">비밀번호 찾기</a>
        <a href="#" title="회원가입">회원가입</a>
      </div>
    </fieldset>
  </form>
  <!-- 로그인 폼 끝 -->
  </section>

  <script>
  //아이디, 패스워드 유효성 검사
  function form_check(){
    if(!document.getElementById('user_id').value){
      alert('아이디를 입력하세요.');
      user_id.focus();
      return false;
    }
    if(!document.getElementById('user_pw').value){
      alert('패스워드를 입력하세요.');
      user_pw.focus();
      return false;
    }

    //아이디 저장 체크 
    // let languages = document.getElementsByName('save_id');
    // let languageSelected = false;
    // for (let i = 0; i < languages.length; i++) {
    //   if (languages[i].checked) {
    //     languageSelected = true;
    //   break;
    //   }
    // }
    // if (!languageSelected) {
    // alert('관심언어를 선택하세요.');
    //   return false;
    // }
    return true;

  }
</script>



<?php 
include('./sub/footer.php');
?>