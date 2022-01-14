- 오늘은 Webhacking.kr의 54번 문제를 한번 풀어보도록 하겠습니다.

![](https://images.velog.io/images/dsph9245/post/a5a4ffec-1213-4b4d-9c02-620ca7f55b84/%E1%84%89%E1%85%B3%E1%84%8F%E1%85%B3%E1%84%85%E1%85%B5%E1%86%AB%E1%84%89%E1%85%A3%E1%86%BA%202022-01-15%20%E1%84%8B%E1%85%A9%E1%84%8C%E1%85%A5%E1%86%AB%201.09.02.png)

![](https://images.velog.io/images/dsph9245/post/0c0c66f9-b2b5-4a45-a3fb-9c38c5f6c797/%E1%84%89%E1%85%B3%E1%84%8F%E1%85%B3%E1%84%85%E1%85%B5%E1%86%AB%E1%84%89%E1%85%A3%E1%86%BA%202022-01-15%20%E1%84%8B%E1%85%A9%E1%84%8C%E1%85%A5%E1%86%AB%201.08.50.png)

- 일단 문제 사이트에 접속을 해주겠습니다.

- 사이트에 접속을 해보면 Password is ?라고 해서 뒤에 문자열이 계속 바뀌는 것을 알 수 있습니다. 즉, 빠르게 이동하는 이것이 우리가 원하는 FLAG라는 것을 알 수 있습니다. 

- 그렇기 때문에 이를 천천히 받기만 하면 FLAG를 얻을 수 있다는 것을 대충 예상해볼 수 있습니다.

![](https://images.velog.io/images/dsph9245/post/7cbc4dd7-880a-4461-b715-5027c8cee1ad/%E1%84%89%E1%85%B3%E1%84%8F%E1%85%B3%E1%84%85%E1%85%B5%E1%86%AB%E1%84%89%E1%85%A3%E1%86%BA%202022-01-15%20%E1%84%8B%E1%85%A9%E1%84%8C%E1%85%A5%E1%86%AB%201.09.50.png)

![](https://images.velog.io/images/dsph9245/post/c29ef78f-3768-4ed0-b910-316ddc375e11/%E1%84%89%E1%85%B3%E1%84%8F%E1%85%B3%E1%84%85%E1%85%B5%E1%86%AB%E1%84%89%E1%85%A3%E1%86%BA%202022-01-15%20%E1%84%8B%E1%85%A9%E1%84%8C%E1%85%A5%E1%86%AB%201.10.02.png)

![](https://images.velog.io/images/dsph9245/post/7fb7d340-3e36-4a5a-a6d1-de2f9032a00e/%E1%84%89%E1%85%B3%E1%84%8F%E1%85%B3%E1%84%85%E1%85%B5%E1%86%AB%E1%84%89%E1%85%A3%E1%86%BA%202022-01-15%20%E1%84%8B%E1%85%A9%E1%84%8C%E1%85%A5%E1%86%AB%201.10.07.png)

![](https://images.velog.io/images/dsph9245/post/c5846f20-cc3c-48a5-b7f7-a8c7c1faa810/%E1%84%89%E1%85%B3%E1%84%8F%E1%85%B3%E1%84%85%E1%85%B5%E1%86%AB%E1%84%89%E1%85%A3%E1%86%BA%202022-01-15%20%E1%84%8B%E1%85%A9%E1%84%8C%E1%85%A5%E1%86%AB%201.10.35.png)

- 개발자모드(F12)를 이용해서 Element에서 소스코드를 확인해보겠습니다.

![](https://images.velog.io/images/dsph9245/post/a6200398-47b4-402d-8ce6-b19c425df5dd/%E1%84%89%E1%85%B3%E1%84%8F%E1%85%B3%E1%84%85%E1%85%B5%E1%86%AB%E1%84%89%E1%85%A3%E1%86%BA%202022-01-15%20%E1%84%8B%E1%85%A9%E1%84%8C%E1%85%A5%E1%86%AB%201.58.06.png)

- 위의 코드에서 자바스크립트 코드만 보자면 아래와 같습니다.

![](https://images.velog.io/images/dsph9245/post/197969f7-5413-4597-9f00-cb445c4c6fc3/%E1%84%89%E1%85%B3%E1%84%8F%E1%85%B3%E1%84%85%E1%85%B5%E1%86%AB%E1%84%89%E1%85%A3%E1%86%BA%202022-01-15%20%E1%84%8B%E1%85%A9%E1%84%8C%E1%85%A5%E1%86%AB%201.58.46.png)
- 위의 자바 스크립트 코드를 분석해보자면 함수는 2개 즉, run()함수와 answer() 함수가 존재한다.

- run() 함수에 대해서 살짝 헷갈려서 ActiveXObject와 XMLHttpRequest에 대해서 검색을 해보면 비동기관련 내용이라는 것을 확인할 
수 있다. 

- 그 다음에 x변수에 run()함수, 즉 function answer()의 내용을 보면 ```
aview.innerText = x.responseText;
``라는 코드를 확인할 수 있고, 이 코드의 의미를 분석해보면 response text를 보여주는 코드라고 대충 생각해볼 수 있습니다. 

- 즉, 단순히 responseText를 하나만 출력하는 것이 아닌 계속 더하면 어떨까?라고 생각을 하게 되었고, answer()함수를 조금 변형해서 이를 이용하면 될 것 같다고 생각을 하였습니다.

```
function answer(i){
  x.open('GET','?m='+i,false);
  x.send(null);
  aview.innerHTML=x.responseText; // 해당 부분을 변형해주면 될 것 같다.
  i++;
  if(x.responseText) setTimeout("answer("+i+")",20);
  if(x.responseText=="") aview.innerHTML="?";
}
setTimeout("answer(0)",1000);
```

- 그리하여 아래와 같은 Flag source를 작성하면 됩니다.

```
function answer(i){
  x.open('GET','?m='+i,false);
  x.send(null);
  aview.innerHTML += x.responseText; // aview.innerHTML = aview.innerHTML + x.responseText; (출력하는 내용을 계속 끝까지 더해서 출력)
  i++;
  if(x.responseText) setTimeout("answer("+i+")",20);
  if(x.responseText=="") aview.innerHTML="?";
}
setTimeout("answer(0)",1000);
```

- 그런 다음 해당 소스코드를 웹 개발자 도구의 Console탭에 넣어줍니다.

![](https://images.velog.io/images/dsph9245/post/23424e63-2c04-4bcd-8482-38f9c95ae971/%E1%84%89%E1%85%B3%E1%84%8F%E1%85%B3%E1%84%85%E1%85%B5%E1%86%AB%E1%84%89%E1%85%A3%E1%86%BA%202022-01-15%20%E1%84%8B%E1%85%A9%E1%84%8C%E1%85%A5%E1%86%AB%202.12.30.png)

![](https://images.velog.io/images/dsph9245/post/383e09f5-46b6-433c-b371-b9061ceff359/%E1%84%89%E1%85%B3%E1%84%8F%E1%85%B3%E1%84%85%E1%85%B5%E1%86%AB%E1%84%89%E1%85%A3%E1%86%BA%202022-01-15%20%E1%84%8B%E1%85%A9%E1%84%8C%E1%85%A5%E1%86%AB%202.12.47.png)

- 그리고나서 웹 페이지를 확인해주면 플래그를 확인할 수 있습니다.

![](https://images.velog.io/images/dsph9245/post/68147537-a4d2-499a-a613-e1f7a1af9dce/%E1%84%89%E1%85%B3%E1%84%8F%E1%85%B3%E1%84%85%E1%85%B5%E1%86%AB%E1%84%89%E1%85%A3%E1%86%BA%202022-01-15%20%E1%84%8B%E1%85%A9%E1%84%8C%E1%85%A5%E1%86%AB%202.18.29.png)
