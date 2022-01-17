- 오늘은 Webhacking.kr의 26번 문제를 한번 풀어보도록 하겠습니다.

![](https://images.velog.io/images/dsph9245/post/9c2eda50-6811-496d-b614-309e2a36d6a9/%E1%84%89%E1%85%B3%E1%84%8F%E1%85%B3%E1%84%85%E1%85%B5%E1%86%AB%E1%84%89%E1%85%A3%E1%86%BA%202022-01-18%20%E1%84%8B%E1%85%A9%E1%84%8C%E1%85%A5%E1%86%AB%201.54.52.png)

![](https://images.velog.io/images/dsph9245/post/cc6a7cbb-b482-4873-9ceb-027007670e07/%E1%84%89%E1%85%B3%E1%84%8F%E1%85%B3%E1%84%85%E1%85%B5%E1%86%AB%E1%84%89%E1%85%A3%E1%86%BA%202022-01-18%20%E1%84%8B%E1%85%A9%E1%84%8C%E1%85%A5%E1%86%AB%201.54.57.png)

- 제일 먼저 문제 사이트에 접속을 해보면 아래와 같이 view-source라고 해서 소스코드를 볼 수 있습니다. 해당 링크로 이동해보겠습니다.

![](https://images.velog.io/images/dsph9245/post/dc048777-bdc5-4501-834c-5a61c748cd3b/%E1%84%89%E1%85%B3%E1%84%8F%E1%85%B3%E1%84%85%E1%85%B5%E1%86%AB%E1%84%89%E1%85%A3%E1%86%BA%202022-01-18%20%E1%84%8B%E1%85%A9%E1%84%8C%E1%85%A5%E1%86%AB%201.55.03.png)

- view-source부분으로 넘어오면 .php소스를 볼 수 있고, 이를 분석하면 어떻게 플래그를 구할 수 있을지 알 수 있을 것 같습니다.

![](https://images.velog.io/images/dsph9245/post/94dc473a-d180-4e4a-ab60-d3a0a9b357a8/%E1%84%89%E1%85%B3%E1%84%8F%E1%85%B3%E1%84%85%E1%85%B5%E1%86%AB%E1%84%89%E1%85%A3%E1%86%BA%202022-01-18%20%E1%84%8B%E1%85%A9%E1%84%8C%E1%85%A5%E1%86%AB%201.55.09.png)

- if($_GET['id'] == "admin")이라는 구문을 보면 id = admin이 되어야 if문이 수행된다는 것을 알 수 있고, solve가 된다는 것을 알 수 있습니다.

![](https://images.velog.io/images/dsph9245/post/6e8fd518-5c68-4f1d-a501-ab193621f918/%E1%84%89%E1%85%B3%E1%84%8F%E1%85%B3%E1%84%85%E1%85%B5%E1%86%AB%E1%84%89%E1%85%A3%E1%86%BA%202022-01-18%20%E1%84%8B%E1%85%A9%E1%84%8C%E1%85%A5%E1%86%AB%201.55.29.png)

- 그러나 위에 있는 if문을 확인해보면 preg_metch() 함수로 인해서 admin이라는 문자열이 필터링되고 있다는 것을 알 수 있는데, 이를 우회하기 위해서 URL Encoding을 해볼 수 있들 것 같습니다. 

![](https://images.velog.io/images/dsph9245/post/98f1c820-b407-482b-a418-6957e3b47f23/%E1%84%89%E1%85%B3%E1%84%8F%E1%85%B3%E1%84%85%E1%85%B5%E1%86%AB%E1%84%89%E1%85%A3%E1%86%BA%202022-01-18%20%E1%84%8B%E1%85%A9%E1%84%8C%E1%85%A5%E1%86%AB%201.55.50.png)

- URL Encoding 표를 보면,

![](https://images.velog.io/images/dsph9245/post/10e6cd8f-2c12-4c8a-8e76-140c84cfe696/%E1%84%89%E1%85%B3%E1%84%8F%E1%85%B3%E1%84%85%E1%85%B5%E1%86%AB%E1%84%89%E1%85%A3%E1%86%BA%202022-01-18%20%E1%84%8B%E1%85%A9%E1%84%8C%E1%85%A5%E1%86%AB%201.58.31.png)

- 다음과 같이 URL Encoding을 수행할 수 있습니다.

![](https://images.velog.io/images/dsph9245/post/c5e42f78-5b78-4e59-b09f-70a944ce0533/%E1%84%89%E1%85%B3%E1%84%8F%E1%85%B3%E1%84%85%E1%85%B5%E1%86%AB%E1%84%89%E1%85%A3%E1%86%BA%202022-01-18%20%E1%84%8B%E1%85%A9%E1%84%8C%E1%85%A5%E1%86%AB%202.01.29.png)

- 하지만, no!라고 return이 되고 URL을 확인해보면 인코딩한 값이 admin으로 decoding되었다는 것을 알 수 있습니다.

![](https://images.velog.io/images/dsph9245/post/8fe3bb6a-0c5a-40da-b5fb-c61ae44c54a1/%E1%84%89%E1%85%B3%E1%84%8F%E1%85%B3%E1%84%85%E1%85%B5%E1%86%AB%E1%84%89%E1%85%A3%E1%86%BA%202022-01-18%20%E1%84%8B%E1%85%A9%E1%84%8C%E1%85%A5%E1%86%AB%202.01.35.png)

- 다시 .php 소스코드를 확인해보면 id값을 urldecode()함수로 한번 decoding을 진행한다는 것을 확인할 수 있습니다. 즉, 아까 encoding한 값을 다시 encoding을 진행해줘야 한다는 것을 알 수 있습니다.

![](https://images.velog.io/images/dsph9245/post/a564afa2-81fd-4ebf-93c5-98e23b25346c/%E1%84%89%E1%85%B3%E1%84%8F%E1%85%B3%E1%84%85%E1%85%B5%E1%86%AB%E1%84%89%E1%85%A3%E1%86%BA%202022-01-18%20%E1%84%8B%E1%85%A9%E1%84%8C%E1%85%A5%E1%86%AB%201.56.00.png)

- 아까 인코딩한 값을 복사해주고,

![](https://images.velog.io/images/dsph9245/post/2ba947e2-183b-4727-8d0b-276e60b4709b/%E1%84%89%E1%85%B3%E1%84%8F%E1%85%B3%E1%84%85%E1%85%B5%E1%86%AB%E1%84%89%E1%85%A3%E1%86%BA%202022-01-18%20%E1%84%8B%E1%85%A9%E1%84%8C%E1%85%A5%E1%86%AB%202.03.04.png)

- 구글링을 통해서 URL Encoding사이트를 이용해서 이를 encoding해주고 

![](https://images.velog.io/images/dsph9245/post/fafd5c87-d87b-40b0-82e1-a5134dbe0f9e/%E1%84%89%E1%85%B3%E1%84%8F%E1%85%B3%E1%84%85%E1%85%B5%E1%86%AB%E1%84%89%E1%85%A3%E1%86%BA%202022-01-18%20%E1%84%8B%E1%85%A9%E1%84%8C%E1%85%A5%E1%86%AB%202.03.12.png)

![](https://images.velog.io/images/dsph9245/post/3efe8484-d8a5-48d0-a4f5-71eea7b10e64/%E1%84%89%E1%85%B3%E1%84%8F%E1%85%B3%E1%84%85%E1%85%B5%E1%86%AB%E1%84%89%E1%85%A3%E1%86%BA%202022-01-18%20%E1%84%8B%E1%85%A9%E1%84%8C%E1%85%A5%E1%86%AB%202.03.22.png)

![](https://images.velog.io/images/dsph9245/post/479d2ac9-7be6-4a23-adc4-6f2944dd5fde/%E1%84%89%E1%85%B3%E1%84%8F%E1%85%B3%E1%84%85%E1%85%B5%E1%86%AB%E1%84%89%E1%85%A3%E1%86%BA%202022-01-18%20%E1%84%8B%E1%85%A9%E1%84%8C%E1%85%A5%E1%86%AB%202.03.29.png)

- 이를 id값에 넣어주면 정상적으로 solve가 되는 것을 확인할 수 있습니다.

![](https://images.velog.io/images/dsph9245/post/00496f3f-28c5-41a9-ae6d-37bcb7f02e8a/%E1%84%89%E1%85%B3%E1%84%8F%E1%85%B3%E1%84%85%E1%85%B5%E1%86%AB%E1%84%89%E1%85%A3%E1%86%BA%202022-01-18%20%E1%84%8B%E1%85%A9%E1%84%8C%E1%85%A5%E1%86%AB%202.03.40.png)

![](https://images.velog.io/images/dsph9245/post/dda4ce16-d333-48a8-857a-1e88bfaa9692/%E1%84%89%E1%85%B3%E1%84%8F%E1%85%B3%E1%84%85%E1%85%B5%E1%86%AB%E1%84%89%E1%85%A3%E1%86%BA%202022-01-18%20%E1%84%8B%E1%85%A9%E1%84%8C%E1%85%A5%E1%86%AB%202.03.46.png)
