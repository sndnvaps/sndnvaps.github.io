---
layout: post
title: Windows上運行Jekyll的方法
categories: [技術筆記]
tags: [Jekyll]
published: true
---

調整 Blog 版面的時候，我發覺每次都要把修改的內容推上 Github 後才能看見頁面效果，實在太慢了，畢竟有時候只是微調頁面，很想要趕快看到效果，實在沒耐心等上幾分鐘，便打算自己的電腦上安裝 Jekyll ，沒想到安裝過程比我想像的還要麻煩。

聽說現在世界領頭搞 Web 技術的那一群人，機子不是 Mac 就是 Linux，
連XDite寫的Rails 101教學書裡也說要學好Rails的第一步就該先準備好一台Mac電腦，Windows，可以吃嗎？
Windows在這些新技術領域裡就跟次等公民沒什麼兩樣。

牢騷發完了，以下是我折騰了一下午後終於能順利在本機編譯網站的步驟：

### 安裝 Jekyll 的步驟

1. 因為Jekyll是用 Ruby 寫的，所以第一步就是安裝 [Ruby](http://rubyinstaller.org/downloads/)，我安裝的版本是Ruby 1.9.3。
2. 運行Jekyll需要[Ruby Development Kit](http://rubyinstaller.org/downloads/)，下載Development Kit並解壓縮後，在目錄裡輸入以下兩條命令來設置DevKit:

~~~
ruby dk.rb init
ruby dk.rb install
~~~

3. 接下來，就可以正式安裝Jekyll了，在命令列下輸入 `gem install jekyll`
4. 安裝完後，因為Windows的編碼問題，需要把Jekyll下的convertible.rb 第29行改為，

~~~
 - self.content = File.read(File.join(base, name))
 + self.content = File.read(File.join(base, name), :encoding => "utf-8")
~~~
檔案位置：C:\Ruby193\lib\ruby\gems\1.9.1\gems\jekyll-0.12.0\lib\jekyll\convertible.rb

5. 到此為止Jekyll就算基本安裝完成了，但是Jekyll默認的Markdown解譯器是Maruku，中文支援非常的差，建議用另一套解譯器RDiscount，安裝方法： `gem install rdiscount`  (需要make)
6. 在你的Jekyll目錄下輸入 `jekyll --server --auto --rdiscount` 來編譯網站並且開啟本地伺服器。
7. 瀏覽器打開 `http://localhost:4000` ，大功告成。


### 參考連結

- [JekyllBootstrap: Jekyll Introduction](http://jekyllbootstrap.com/lessons/jekyll-introduction.html)
- [Running Jekyll on Windows](http://www.madhur.co.in/blog/2011/09/01/runningjekyllwindows.html)
- [How to Use Github Pages on Windows](http://bradleygrainger.com/2011/09/07/how-to-use-github-pages-on-windows.html)