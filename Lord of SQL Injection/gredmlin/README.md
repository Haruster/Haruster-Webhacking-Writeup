- 오늘은 Lord of SQL Injection의 gremlin 문제를 한 번 풀어보도록 하겠습니다.

![](https://images.velog.io/images/dsph9245/post/42422d96-5fde-4c87-9fb4-5786cd46632d/%E1%84%89%E1%85%B3%E1%84%8F%E1%85%B3%E1%84%85%E1%85%B5%E1%86%AB%E1%84%89%E1%85%A3%E1%86%BA%202022-01-07%20%E1%84%8B%E1%85%A9%E1%84%8C%E1%85%A5%E1%86%AB%209.32.25.png)

![](https://images.velog.io/images/dsph9245/post/9f7a79a2-86bb-4832-8e92-fffc7ea4a86e/%E1%84%89%E1%85%B3%E1%84%8F%E1%85%B3%E1%84%85%E1%85%B5%E1%86%AB%E1%84%89%E1%85%A3%E1%86%BA%202022-01-07%20%E1%84%8B%E1%85%A9%E1%84%8C%E1%85%A5%E1%86%AB%209.32.40.png)

- 문제 사이트에 접속을 해주면 아래와 같은 소스코드를 확인할 수 있습니다.

- 즉, 해당 소스코드를 분석한 후 그에 맞는 우회 기법을 URL에 입력을 하면 Solve가 된다는 것을 예상해볼 수 있습니다.

![](https://images.velog.io/images/dsph9245/post/bd135d5d-1466-4222-a40b-db8e50ec6283/%E1%84%89%E1%85%B3%E1%84%8F%E1%85%B3%E1%84%85%E1%85%B5%E1%86%AB%E1%84%89%E1%85%A3%E1%86%BA%202022-01-07%20%E1%84%8B%E1%85%A9%E1%84%8C%E1%85%A5%E1%86%AB%209.33.07.png)

```
<?php
  include "./config.php";
  login_chk();
  $db = dbconnect();
  if(preg_match('/prob|_|\.|\(\)/i', $_GET[id])) exit("No Hack ~_~"); // do not try to attack another table, database!
  if(preg_match('/prob|_|\.|\(\)/i', $_GET[pw])) exit("No Hack ~_~");
  $query = "select id from prob_gremlin where id='{$_GET[id]}' and pw='{$_GET[pw]}'";
  echo "<hr>query : <strong>{$query}</strong><hr><br>";
  $result = @mysqli_fetch_array(mysqli_query($db,$query));
  if($result['id']) solve("gremlin");
  highlight_file(__FILE__);
?>
```


- 위의 소스코드에서 if문을 보면 preg_metch()라는 함수가 있는데 해당 함수를 검색해보면 정규표현식 관련 함수라는 것을 알 수 있습니다.

- 즉, 위의 preg_metch함수에 있는 정규 표현식은 사용할 수 없고, 다른 문자를 사용해서 우회를 하면 되는 건데, '(싱글 쿼터)랑 "(더블 쿼터)는 적용 대상이 아니네요?

- 그럼 id 값 뒤에 'or 1=1뒤에 주석을 붙이는 것으로 SQL Injection을 한번 시도해보겠습니다.

- 주석 같은 경우는 그냥 입력하지 않고 인코딩을 통해 %23으로 입력을 해주면 됩니다.

- 즉, id=kine'or 1=1 %23과 같이 하면 됩니다

- 그럼 다음과 같이 solve가 됩니다.

![](https://images.velog.io/images/dsph9245/post/58927e90-c845-4f56-958a-58496d4cde2b/%E1%84%89%E1%85%B3%E1%84%8F%E1%85%B3%E1%84%85%E1%85%B5%E1%86%AB%E1%84%89%E1%85%A3%E1%86%BA%202022-01-07%20%E1%84%8B%E1%85%A9%E1%84%8C%E1%85%A5%E1%86%AB%209.44.11.png)
