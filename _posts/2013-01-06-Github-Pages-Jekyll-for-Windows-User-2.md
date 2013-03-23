---
layout: post
title: "Github Pages & Jekyll攻略 - 給Windows使用者 (下)"
categories: [ 技術筆記 ]
tags: [Jekyll]
keywords: [Jekyll, Github Pages, Blog]
published: false
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

所以第一步我們就在版本庫目錄裡加入名為 _config.yml 的文字檔案。

_config.yml的內文如下

    name: 我的博客
    markdown: rdiscount

第一行給博客起個名字，第二行則是要求Jekyll編譯博客時不要採用默認的markdown解譯器，改用對中文支援較佳的RDiscount解譯器。
需要注意的是，冒號後面要跟著一個空格，不多不少，這是YAML的規矩。

現在的Jekyll目錄結構應該像這樣:

    \
    |- _config.yml


## 模版

接著我們來製作博客的門面，也就是`index.html`。

{% highlight html %}
<!doctype html>
<html>
    <head>
        <title>{{ "{{ site.name "}}}}</title>
    </head>
    <body>
        <h1>{{ "{{ site.name "}}}}</h1>

        {% %}
        {% %}
    </boby>
</html>
{% endhighlight %}

這應該很眼熟，