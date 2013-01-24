---
layout: post
title: 使用Github Page以及Jekyll來架設Blog
categories: [Blog]
tags: [Jekyll]
published: false
---

### 於是有了 Github

### 一些錯誤排除

我在網路上搜尋了很多教學，大部分都有缺漏或者寫的雜亂無章，最後總算找到阮一峰寫的條理清晰的教學 [github Pages和Jekyll入门][1] 照著步驟做了，搞定!

可是阮一峰的那篇教學只有最基本的Jekyll架構，想要

### 安裝Jekyll
1. 安裝Ruby 1.9.3
2. 安裝devkit包 ruby dk.rb install
3. gem install jekyll
4. 修改 convertible.rb 29行
5. 安裝 gem install rdiscount  (需要make)

6. 弄一個網站雛型出來
5. cd your-site-path
5. jekyll --server  啟動Jekyll並且開啟本地伺服器
6. 用瀏覽器看 localhost:4000 就可以看編譯完的結果

### 安裝pygments
1. 安裝easy_install
2. easy_install pygments
3. 將C:\Python27\Script加入PATH  (Done)

### 啟動jekyll本地端
1. cd your_site
2. jekyll --server --auto

[1]: http://www.ruanyifeng.com/blog/2012/08/blogging_with_jekyll.html "搭建一个免费的，无限流量的Blog----github Pages和Jekyll入门 by阮一峰"
[2]: http://jekyllbootstrap.com/lessons/jekyll-introduction.html "利用Jekyll搭建個人博客"
[3]: http://www.madhur.co.in/blog/2011/09/01/runningjekyllwindows.html "Running Jekyll on Windows"
[4]: https://gist.github.com/1185645 "修正Liquid error: Bad file descriptor的錯誤"
[5]: http://daringfireball.net/projects/markdown/syntax "Markdown語法教學"
[6]: http://bradleygrainger.com/2011/09/07/how-to-use-github-pages-on-windows.html "言簡意賅教學"
[7]: https://gist.github.com/1027416 "可以引入外部檔案的Jekyll插件 (待研究)"