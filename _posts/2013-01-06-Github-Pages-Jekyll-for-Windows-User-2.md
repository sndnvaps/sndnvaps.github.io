---
layout: post
title: "Github Pages & Jekyll攻略 - 給Windows使用者 (下)"
categories: [ 技術筆記 ]
tags: [Jekyll]
keywords: [Jekyll, Github Pages, Blog]
published: true
---

Github Pages採用了[Jekyll](https://github.com/mojombo/jekyll)作為後端系統。
Jekyll是一套靜態網頁的產生工具，只要遵守一些簡單的約定，它就可以生出一個完整的博客。

開始之前，請確定您已經可以用[上一篇]({{ site.url }}2012/12/Github-Pages-Jekyll-for-Windows-Lasy-User-1.html)的方式，準備好一個Git版本庫並且同步上Github。

一個博客系統通常由三種東西組成

* 第一個叫做設定，比如你給博客取的名字。
* 第二個叫做模版，博客版面要怎麼呈現，背景什麼顏色，每一頁列出幾篇文章等等。
* 第三個就是內容，也就是你寫的文章。

Jekyll也不例外，是由這三種東西構成的。

## 設定

一個Jekyll Blog就是一個目錄。而這個目錄裡頭，一定有個檔案叫做 `_config.yml` ，這個 _config.yml 就是Jekyll博客的設定檔，每次編譯博客時，Jekyll都會先參考這個設定檔。

所以第一步我們就在版本庫目錄裡加入名為 _config.yml 的文檔。

_config.yml的內容如下

    name: 我的博客
    markdown: rdiscount
    url: http://yourid.github.com/

第一行給博客起個名字，第二行則是要求Jekyll編譯博客時改用對中文支援較好的RDiscount解譯器。
第三行則是Github博客的網址。
需要注意的是，冒號後面要跟著一個空格，不多不少，這是YAML的規矩。

現在的Jekyll目錄結構應該像這樣:

    \
    |- _config.yml


## 模版

接著我們來製作博客的門面，也就是`index.html`。

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

這是個典型的HTML文件。唯一稍微不同的是許多的花括號，這是Jekyll採用的Liquid排版語言。所有被兩個花括號包起來的變數，會被在編譯博客時會被替換為適當的內容，像`{{ "{{ site.name "}}}}`會被替換為`我的博客`，`{{ "{{ site.url "}}}}`會被替換為`http://yourid.github.com/`，這些都是在_config.yml中定義過的變量。

以`{{ "{%  "}}%}`包起來的控制語句則不會被解譯成內容，但是有特別的功用。　如`{{ "{% for post in site.posts "}}%}`就是迴圈遍歷整個博客中的所有文章。

依序打印出每篇博文的標題`{{ "{{ post.title "}}}}`，以及內容`{{ "{{ post.content "}}}}`。


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

