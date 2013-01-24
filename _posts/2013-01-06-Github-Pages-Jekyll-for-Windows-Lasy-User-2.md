---
layout: post
title: "從零開始建立Github Pages - 給Windows使用者 (下)"
categories: [Tech]
tags: [Jekyll]
published: false
---

這篇則是介紹Github的後端系統: [Jekyll](https://github.com/mojombo/jekyll)。
Jekyll是一套靜態網頁的產生工具，只要遵守一些簡單的約定，它就可以生出一個完整的博客給你。

開始之前，請確定您已經可以用[上一篇]({{ site.url }}2012/12/Github-Pages-for-Windows-Lasy-User-1.html)的方式，準備好一個Git目錄並且同步上Github。

一個博客系統通常由三種東西組成的，先不講花俏的功能，就最基本的，第一個叫做設定，比如你給博客取的名字。第二個叫做模版，博客版面要怎麼呈現，背景什麼顏色，每一頁列出幾篇文章等等。第三個就是內容，也就是你寫的文章。Jekyll也不例外，是由這三種東西構成的。

## 設定

建立Jekyll的第一步就是往目錄裡新增一個叫 _config.yml 的文字檔，這就是Jekyll的設定檔。


