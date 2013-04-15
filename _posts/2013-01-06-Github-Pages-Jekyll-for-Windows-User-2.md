---
layout: post
title: "Github Pages & Jekyll攻略 - 給Windows使用者 (下)"
categories: 技術筆記
tags: Jekyll
published: true
---

開始之前，請確定您已經可以用[上一篇]({{ site.url }}2012/12/Github-Pages-Jekyll-for-Windows-Lasy-User-1.html)的方式，準備好一個 git 版本庫並且與Github同步。

Github Pages並不僅僅只能存放靜態的HTML檔，事實上它採用了 [Jekyll](https://github.com/mojombo/jekyll) 作為後端系統。
Jekyll是一套靜態博客的生產引擎，只要遵守一些簡單的約定，它就可以生出一個完整的博客給你。


## Jekyll

一個博客系統通常由三種東西組成

* 第一個叫做設定，比如你給博客取的名字。
* 第二個叫做模版，博客版面要怎麼呈現，背景什麼顏色，每一頁列出幾篇文章等等。
* 第三個就是內容，也就是你寫的文章。

Jekyll也不例外，是由這三種東西構成的。

## 設定

要啟用Jekyll，第一步就是在目錄裡添加一個名為 `_config.yml` 的文件，_config.yml 是 Jekyll博客默認的配置文件，每次編譯博客時，Jekyll 都會依據文件內的參數來編譯網站。

給`_config.yml`填入以下內容:

    name: 我的博客
    markdown: rdiscount
    url: http://yourid.github.io/

通常 _config.yml 文件裡頭寫的都是全站配置。
例如上面的第一行我們給博客起了個名字'我的博客'，第二行要求 Jekyll 編譯博客時用對中文較友善的 RDiscount 解譯器。第三行則是 Github 博客的網址 (記得把yourid換成你的Github帳號)。其他沒有寫出來的設置就是採默認值。

這種配置文件的寫法叫做YAML格式，每項設置一行。需要注意的是， **冒號後面一定要跟著一個空格**，這是YAML的規矩，少了這個空格，編譯網站就會報錯。

現在的Jekyll目錄結構應該像這樣，只有一個文件:

    .
    |- _config.yml


## 模版

接著我們來製作博客的門面： `index.html`。

在`index.html`填入以下內容:
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
            {{ "{{ post.content "}}}}

        {{ "{% endfor " }}%}
    </boby>
</html>
{% endhighlight %}

這是個典型的HTML文件。比較特殊的是 HTML 標籤內有許多的花括號，這是 Jekyll 用的排版語言，叫做 Liquid 語言。所有被兩個花括號夾起來的變量，都會在編譯博客時被替換為適當的內容。

_config.yml裡頭定義的配置值，都可以透過site變量來獲取，像我們在_config.yml裡頭定義過name變量，那麼`{{ "{{ site.name "}}}}`就會在編譯時被替換成`我的博客`，同理`{{ "{{ site.url "}}}}`會被替換為`http://yourid.github.com/`。

除了自己定義的變量外，還有一些Jekyll系統內定的變量，如 site.posts -- 就是全部的博文列表。

所以用 for 迴圈遍歷全部博文，並用`{{ "{{ post.title "}}}}`以及`{{ "{{ post.content "}}}}`打印。

與兩個花括號，以`{{ "{%  "}}%}`包起來的控制語句則不會被解譯成內容，但是有特別的功用。　如`{{ "{% for post in site.posts "}}%}`就是迴圈遍歷整個博客中的所有文章。

依序打印出每篇博文的標題


現在Jekyll目錄應該長這樣:

    \
    |- _config.yml
    |- index.html

## 內容

有了首頁之後，我們可以開始撰寫博客文章了。請先在Jekyll目錄下建立一個`posts`目錄。
posts目錄就是Jekyll默認存放博客文章的地方。

接著在posts目錄裡添加一個文字檔，名叫`2013-03-24-my-first-post.md`。

2013-03-24-my-first-post.md 的文件內容則是:

    ---
    title: Hello Jekyll!
    ---
    這是我的第一篇文章。

現在Jekyll目錄結構應該長這樣:

    \
    |- _config.yml
    |- index.html
    |- posts
       |- 2013-03-24-my-first-post.md

到現在為止博客的基本雛形就已經完成了，將版本庫推送上Github吧。

## 文章模版

## 排錯

