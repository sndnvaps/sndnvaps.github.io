---
layout: post
title: "Github Pages & Jekyll攻略 - 給Windows使用者 (下)"
categories: [ 技術筆記 ]
tags: [Jekyll]
published: false
---

Github Pages採用了[Jekyll](https://github.com/mojombo/jekyll)作為後端系統。
Jekyll是一套靜態網頁的產生工具，只要遵守一些簡單的約定，它就可以生出一個完整的博客。

開始之前，請確定您已經可以用[上一篇]({{ site.url }}2012/12/Github-Pages-Jekyll-for-Windows-Lasy-User-1.html)的方式，準備好一個Git目錄並且同步上Github。

一個博客系統通常由三種東西組成的，第一個叫做設定，比如你給博客取的名字。第二個叫做模版，博客版面要怎麼呈現，背景什麼顏色，每一頁列出幾篇文章等等。第三個就是內容，也就是你寫的文章。Jekyll也不例外，是由這三種東西構成的。

## 設定

Jekyll在啟動之初，一定會先在目錄內尋找一個名叫 `_config.yml` 的設定檔，然後才依據設定檔的內容開始編譯網站。所以我們的第一步就是在版本庫目錄裡加入一個名叫 _config.yml 的文字檔案，這就是Jekyll的設定檔。檔案內容留空沒關係。

現在的目錄結構應該像這樣:

    \
    |- _config.yml

## 模版

