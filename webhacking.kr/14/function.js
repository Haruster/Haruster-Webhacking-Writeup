function ck(){
  var ul=document.URL; // document.URL은 문서의 URL을 반환하는 속성을 말한다.
  ul=ul.indexOf(".kr"); // indexOf() 함수는 문자열에서 원하는 문자열을 검색하는 내장함수로 위치값을 index로 반환한다.
  ul=ul*30; // ul * 30을 한다.
  if(ul==pw.input_pwd.value) { location.href="?"+ul*pw.input_pwd.value; } // ul의 값이 pw.input_pwd.value값과 일치하면 if문이 실행된다.
  else { alert("Wrong"); }
}
