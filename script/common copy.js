/*
  화면 스크롤 동작시 상단헤더에 .h_act적용하기
*/

//1. 자바스크립트로 구현하기
const h = document.getElementById('header');

//2. 화면스크롤 이벤트 = window scroll
// window.addEventListener('scroll',function(){
//     // this.alert('dadafdsdf'); -> 스크롤내릴 때 작동되는지 테스트 한 것
//     let sPos = window.scrollY
//     if(sPos>=1){
//       h.classList.add('h_act');
//     }else{
//       h.classList.remove('h_act');
//     }
// });

//2. 제이쿼리로 구현하기
$(document).ready(function(){
  const h = $('header');

  //헤더에 마우스오버시 h_act적용하기
  $('header').mouseenter(function(){
    $('header').addClass('h_act');
    $('header h1 img').attr('src','./images/logo-casper_black.png');
  });

  //헤더에 마우스아웃시 h_act제거
  $('header').mouseleave(function(){ //마우스를 빼는 경우
    if($(window).scrollTop()<=1){ //스크롤값이 1이하일 경우 아래내용 실행
      $('header').removeClass('h_act');
      $('header h1 img').attr('src','./images/logo-casper-white.png');
    }

  });
  
  //스크롤 내렸을 때와 올렸을 때
  $(window).scroll(function(){
    let sPos = $(this).scrollTop();
    console.log(sPos); /* 나오는지 콘솔 찍어준 것 */

    if(sPos>=1){
        h.addClass('h_act');
        $('header h1 img').attr('src','./images/logo-casper_black.png');
      }else{
        h.removeClass('h_act');
        $('header h1 img').attr('src','./images/logo-casper-white.png');
      }
  });

});






// 원형내비게이션 gpt 
// document.addEventListener("DOMContentLoaded", function(){
//   // m_nav 내의 모든 a 요소 선택
//   const navLinks = document.querySelectorAll("#m_nav a");

//   navLinks.forEach(link => {
//     link.addEventListener("click", function(event) {
//       event.preventDefault(); // 기본 점프 동작 방지
      
//       // href 속성의 값 (예: "#intro_m")을 targetId로 사용
//       const targetId = this.getAttribute("href");
//       const targetElement = document.querySelector(targetId);
      
//       if (targetElement) {
//         const targetPosition = targetElement.offsetTop;
//         window.scrollTo({
//           top: targetPosition,
//           behavior: "smooth"
//         });
//       }
//     });
//   });



// });



