---
layout: post
title: "Github Pages & Jekyll攻略 - 給Windows使用者 (下)"
categories: 技術筆記
tags: Jekyll
published: true
---

開始之前，請確定您已經可以用[上一篇]({{ site.url }}/2012/12/Github-Pages-Jekyll-for-Windows-Lasy-User-1.html)的方式，準備好一個 git 版本庫並且與Github同步。

Github Pages 採用了 [Jekyll][1] 作為後端系統。
Jekyll是一套靜態博客的生產引擎，只要遵守一些簡單的約定，它就可以把網頁和文字檔組織成一個完整的博客。


## Jekyll

一個博客系統通常由三種東西組成

* 第一個叫做設定，比如你給博客取的名字。
* 第二個叫做模版，博客版面要怎麼呈現，背景什麼顏色，每一頁列出幾篇文章等等。
* 第三個就是內容，也就是你寫的文章。

Jekyll也不例外，是由這三種東西構成的。

## 設定

要啟用Jekyll，第一步要在目錄裡創建一個名為 `_config.yml` 的文件，_config.yml 是 Jekyll默認的配置文件。通常我們會在裡頭做Jekyll博客的全站設定。

給`_config.yml`文件填入以下內容:

    name: 我的博客
    url: http://yourid.github.io/
    markdown: rdiscount

文件的第一行我們給博客起了個名字 「我的博客」 (當然也可以起其他名字，隨你高興)，第二行則是博客的網址 (記得把yourid換成你的Github帳號)，第三行則要求 Jekyll 編譯博客時採用對中文較友善的 RDiscount 解譯器。其他沒有寫出來的設置就是採默認值。完整的設置可以參考[官方文件][2]。

這種設置文件的寫法叫做YAML表示法，每項設置一行。需要注意的是 **冒號後面一定要跟著一個空格**，這是YAML的規矩，少了這個空格，編譯網站就會報錯。

現在的Jekyll目錄結構應該像這樣，只有一個文件:

    .
    |- _config.yml


## 模版

接著我們來製作博客的門面： `index.html`。

同樣在目錄下創建一個`index.html`，並填入以下內容:

{% highlight html %}
<!DOCTYPE html>
<html>
<head></head>
<body>
    <h1>{{ "{{ site.name "}}}}</h1>

    {{ "{% for post in site.posts " }}%}

        <h3>
            <a href="{{ "{{ site.url "}}}}{{ "{{ post.url"}}}} ">
                {{ "{{ post.title "}}}}
            </a>
        </h3>

    {{ "{% endfor " }}%}
</boby>
</html>
{% endhighlight %}

index.html 就是個大家熟悉的典型的HTML文件。比較特殊的是 HTML 標籤內夾有許多的花括號，這是什麼呢? 其實這是Jekyll 用的排版語言，叫做 Liquid 語言。 所有被兩個花括號夾起來的變量，都會在編譯博客時被替換為適當的文字。

像`{{ "{{ site.name "}}}}`在編譯時會被替換成 **我的博客**，這是因為我們在`_config.yml`裡頭寫著 `name: 我的博客`。所有`_config.yml`文件內定義的設置值，都可以透過 site.xxx 來獲取。 同理文件中所有的`{{ "{{ site.url "}}}}`也會在編譯時被替換為`http://yourid.github.io/`。

除了自己定義的變量外，還有一些是Jekyll引擎的變量，例如取得全部的文章列表的 site.posts，放進 for 迴圈就能遍歷博客中的所有文章。

{% highlight html %}
{{ "{% for post in site.posts " }}%}
    // do something inside...
{{ "{% endfor " }}%}
{% endhighlight %}

`{{ "{%  "}}%}` 夾起來的部分是 Liquid 排版語言的控制語句， for迴圈是其中一種。 我們用它在首頁循環印出每篇文章的標題`{{ "{{ post.title "}}}}`。

現在Jekyll目錄裡應該有兩個檔案了:

    \
    |- _config.yml
    |- index.html


## 內容

接著要開始來寫文章了。

請在Jekyll目錄下建立一個名為`_posts`的目錄，
這是Jekyll默認存放博客文章的地方。

Jekyll 規定博客文章的文件名必須要符合這個命名規矩: **yyyy-mm-dd-title.md**。 遵循這個慣例，我們在在`_posts`目錄裡創建一個名為`2013-04-18-my-first-post.md`的文件。

文件內容則填入:

    ---
    title: Hello Jekyll!
    ---
    # Hello, Jekyll!

    我的第一篇文章。


現在Jekyll目錄結構應該長這樣:

    \
    |- _config.yml
    |- index.html
    |- _posts
       |- 2013-03-24-my-first-post.md

到現在為止博客的基本雛形就已經完成了，將版本庫推送上Github吧。

[1]: https://github.com/mojombo/jekyll
[2]: https://github.com/mojombo/jekyll/wiki/Configuration