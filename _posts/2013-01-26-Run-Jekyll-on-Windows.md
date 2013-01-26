---
layout: post
title: 在Windows本機安裝Jekyll攻略
categories: [技術筆記]
tags: [Jekyll]
published: true
---

現在世界領頭搞Web技術的那一群人，不是用Mac就是用Linux，
連XDite寫的Rails 101教學書裡也說要學好Rails的第一步就該先準備好一台Mac電腦，Windows，那啥？
這也難怪我安裝個Jekyll會不如預期的順利了，Windows在這些新技術領域裡就跟次等公民沒什麼兩樣。

折騰了一下午，總算能順利的在本機編譯完成，以下是我的安裝步驟筆記：

### 安裝 Jekyll 的步驟

1. 因為Jekyll是用 Ruby 寫的，所以第一步就是安裝 [Ruby](http://rubyinstaller.org/downloads/)，我安裝的版本是Ruby 1.9.3。
2. 運行Jekyll需要[Ruby Development Kit](http://rubyinstaller.org/downloads/)，下載Development Kit並解壓縮後，在目錄裡輸入以下兩條命令來設置DevKit:

<pre>
ruby dk.rb init
ruby dk.rb install
</pre>

3. 接下來，就可以正式安裝Jekyll了，在命令列下輸入 `gem install jekyll`
4. 安裝完後，因為Windows的編碼問題，需要把Jekyll下的convertible.rb 第29行改為，

<pre>
 - self.content = File.read(File.join(base, name))
 + self.content = File.read(File.join(base, name), :encoding => "utf-8")
</pre>
檔案位置：C:\Ruby193\lib\ruby\gems\1.9.1\gems\jekyll-0.12.0\lib\jekyll\convertible.rb

5. 到此為止Jekyll就算基本安裝完成了，但是Jekyll默認的Markdown解譯器是Maruku，中文支援非常的差，建議用另一套解譯器RDiscount，安裝方法： `gem install rdiscount`  (需要make)

5. 弄一個Jekyll網站雛型出來
6. 在你的Jekyll目錄下輸入 `jekyll --server --auto --rdiscount` 來編譯網站並且開啟本地伺服器。
7. 瀏覽器打開 `http://localhost:4000` ，大功告成。


### 參考連結

- [JekyllBootstrap: Jekyll Introduction](http://jekyllbootstrap.com/lessons/jekyll-introduction.html)
- [Running Jekyll on Windows](http://www.madhur.co.in/blog/2011/09/01/runningjekyllwindows.html)
- [How to Use Github Pages on Windows](http://bradleygrainger.com/2011/09/07/how-to-use-github-pages-on-windows.html)
