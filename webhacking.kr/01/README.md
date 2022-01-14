![](https://images.velog.io/images/dsph9245/post/c3f6b63e-b920-4ed0-b079-1bc32ca7c9c0/%EC%8A%A4%ED%81%AC%EB%A6%B0%EC%83%B7%202021-06-18%20%EC%98%A4%EC%A0%84%205.28.41.png)Webhacking.kr old1번 문제를 풀어보자
![](https://images.velog.io/images/dsph9245/post/37b7c8ae-1cd6-47c9-a6a3-1b5dc3135b96/%EC%8A%A4%ED%81%AC%EB%A6%B0%EC%83%B7%202021-06-18%20%EC%98%A4%EC%A0%84%205.29.00.png)문제에 접속해서 젤 먼저 코드를 보면 PHP로 작성된 것을 볼 수 있다.
```
<?php
  include "../../config.php";
  if($_GET['view-source'] == 1){ view_source(); }
  if(!$_COOKIE['user_lv']){
    SetCookie("user_lv","1",time()+86400*30,"/challenge/web-01/");
    echo("<meta http-equiv=refresh content=0>");
  }
?>
<html>
<head>
<title>Challenge 1</title>
</head>
<body bgcolor=black>
<center>
<br><br><br><br><br>
<font color=white>
---------------------<br>
<?php
  if(!is_numeric($_COOKIE['user_lv'])) $_COOKIE['user_lv']=1;
  if($_COOKIE['user_lv']>=4) $_COOKIE['user_lv']=1;
  if($_COOKIE['user_lv']>3) solve(1);
  echo "<br>level : {$_COOKIE['user_lv']}";
?>
<br>
<a href=./?view-source=1>view-source</a>
</body>
</html>
```
해당 소스코드를 해석해보면 user_lv가 4미만 3.1이상일 때 solve(1) 즉, 문제가 풀어진다는 것을 알 수 있다.
![](https://images.velog.io/images/dsph9245/post/860d402f-f5df-4e3d-a1a5-372ed0974b35/%EC%8A%A4%ED%81%AC%EB%A6%B0%EC%83%B7%202021-06-18%20%EC%98%A4%EC%A0%84%205.29.18.png)그럼 크롬의 개발자 도구를 이용해서 4로 기본 설정된 쿠키 값 (user_lv)을
![](https://images.velog.io/images/dsph9245/post/8a977a6d-5571-42d3-9898-c87909dbd956/%EC%8A%A4%ED%81%AC%EB%A6%B0%EC%83%B7%202021-06-18%20%EC%98%A4%EC%A0%84%205.29.26.png)3.1~3.9 사이의 값으로 변경해준다.
![](https://images.velog.io/images/dsph9245/post/ee8f6cf2-907d-4915-b4b7-a1f5967a5129/%EC%8A%A4%ED%81%AC%EB%A6%B0%EC%83%B7%202021-06-18%20%EC%98%A4%EC%A0%84%205.29.30.png)그 다음에 메인페이지로 이동해서 새로고침을 해주면
![](https://images.velog.io/images/dsph9245/post/f6c73a90-c709-4ccb-b1d4-4a52b1478155/%EC%8A%A4%ED%81%AC%EB%A6%B0%EC%83%B7%202021-06-18%20%EC%98%A4%EC%A0%84%205.29.35.png)플래그 즉, 문제가 풀린다.

해당 문제는 변수와 if문에 대한 이해 쿠키에 대한 이해를 잘 한다면 쉽게 풀 수 있을 것이라 생각이 든다. 
