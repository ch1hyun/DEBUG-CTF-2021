### <viewtiful>

<설명>



![]({{ site.url }}/{{ site.baseurl }}/assets/images/writeup/debugCTF/web/index.png){: .imgcenter }



사진을 보면 view source 링크를 탈수있다. 결과는



![]({{ site.url }}/{{ site.baseurl }}/assets/images/writeup/debugCTF/web/indexview.png){: .imgcenter }



이다. 소스 코드를 볼수있다. 이때 링크의 주소값은

```php
index.php?view=1
```

view 에 1을 준다. 이를 바탕으로 다른 페이지에 view 값에 1을 주게 되면 



![]({{ site.url }}/{{ site.baseurl }}/assets/images/writeup/debugCTF/web/page1view.png){: .imgcenter }



 마찬가지로 모든 페이지의 소스코드를 볼수있다. 그중 3번 페이지의 소스코드를 보면



![]({{ site.url }}/{{ site.baseurl }}/assets/images/writeup/debugCTF/web/page3view.png){: .imgcenter }



플래그를 얻을수있다.

