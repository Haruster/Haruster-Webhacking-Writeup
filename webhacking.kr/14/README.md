- 오늘은 Webhacking.kr의 14번 문제를 한번 풀어보겠습니다.

![](https://images.velog.io/images/dsph9245/post/2ebad5e5-b2bb-4249-9635-582927a12196/%E1%84%89%E1%85%B3%E1%84%8F%E1%85%B3%E1%84%85%E1%85%B5%E1%86%AB%E1%84%89%E1%85%A3%E1%86%BA%202022-01-15%20%E1%84%8B%E1%85%A9%E1%84%92%E1%85%AE%2011.38.56.png)

![](https://images.velog.io/images/dsph9245/post/674b6a9f-8aa7-4d91-8705-b171b1382d14/%E1%84%89%E1%85%B3%E1%84%8F%E1%85%B3%E1%84%85%E1%85%B5%E1%86%AB%E1%84%89%E1%85%A3%E1%86%BA%202022-01-15%20%E1%84%8B%E1%85%A9%E1%84%92%E1%85%AE%2011.39.01.png)

- 문제 사이트에 접속을 해보면 무언가의 입력을 받고 값을 check해서 그에 맞는 결과 값을 return해주는 것을 보여주고 있습니다.

![](https://images.velog.io/images/dsph9245/post/5a94926a-700a-4487-95b5-6e77c24a0a0b/%E1%84%89%E1%85%B3%E1%84%8F%E1%85%B3%E1%84%85%E1%85%B5%E1%86%AB%E1%84%89%E1%85%A3%E1%86%BA%202022-01-15%20%E1%84%8B%E1%85%A9%E1%84%92%E1%85%AE%2011.39.39.png)

- 제일 먼저 개발자모드(F12)로 들어가서 홈페이지의 소스코드를 확인해주겠습니다.

![](https://images.velog.io/images/dsph9245/post/b6d74331-fd60-4084-b1c0-a7824d27788b/%E1%84%89%E1%85%B3%E1%84%8F%E1%85%B3%E1%84%85%E1%85%B5%E1%86%AB%E1%84%89%E1%85%A3%E1%86%BA%202022-01-15%20%E1%84%8B%E1%85%A9%E1%84%92%E1%85%AE%2011.39.54.png)

- 소스코드를 자세히보면 자바스크립트 코드가 있는 것을 확인할 수 있습니다.

![](https://images.velog.io/images/dsph9245/post/056a558e-3a2b-45c3-bd59-af7dc53c7924/%E1%84%89%E1%85%B3%E1%84%8F%E1%85%B3%E1%84%85%E1%85%B5%E1%86%AB%E1%84%89%E1%85%A3%E1%86%BA%202022-01-15%20%E1%84%8B%E1%85%A9%E1%84%92%E1%85%AE%2011.40.02.png)

- 해당 소스코드를  분석해보면 아래와 같습니다. 

- 즉, .kr이 검색되는 위치 x 30을 계산해서 pw.input_pwd.value(입력창)에 넣으면 solve가 되고 .kr이 시작되는 위치를 계산해보면 0부터 시작해서 18번째 인덱스 위치에 있다는 것을 알 수 있다.

```
function ck(){
  var ul=document.URL; // document.URL은 문서의 URL을 반환하는 속성을 말한다.
  ul=ul.indexOf(".kr"); // indexOf() 함수는 문자열에서 원하는 문자열을 검색하는 내장함수로 위치값을 index로 반환한다. -> 즉, .kr이 검색되는 위치의 값을 index로 반환한다.
  ul=ul*30; // ul * 30을 한다. -> .kr이 검색되는 위치 * 30
  if(ul==pw.input_pwd.value) { location.href="?"+ul*pw.input_pwd.value; } // ul의 값이 pw.input_pwd.value값과 일치하면 if문이 실행된다. -> 즉, .kr이 검색되는 위치 * 30의 값을 pw.input_pwd.value의 값에 넣어주면 될 것 같다.
  else { alert("Wrong"); }
}
```

![](https://images.velog.io/images/dsph9245/post/324efe2c-4ee9-496a-989d-69a1ac7d89fd/%E1%84%89%E1%85%B3%E1%84%8F%E1%85%B3%E1%84%85%E1%85%B5%E1%86%AB%E1%84%89%E1%85%A3%E1%86%BA%202022-01-15%20%E1%84%8B%E1%85%A9%E1%84%92%E1%85%AE%2011.51.26.png)

- 즉, 18 x 30 = 540이기 때문에 540이라는 값을 pw.input_pwd.value(입력창)에 넣으면 solve가 된다는 것을 알 수 있다.

![](https://images.velog.io/images/dsph9245/post/c773bb2e-db53-4644-8c5d-f90119c64b2a/%E1%84%89%E1%85%B3%E1%84%8F%E1%85%B3%E1%84%85%E1%85%B5%E1%86%AB%E1%84%89%E1%85%A3%E1%86%BA%202022-01-15%20%E1%84%8B%E1%85%A9%E1%84%92%E1%85%AE%2011.51.35.png)
