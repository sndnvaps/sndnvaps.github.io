---
layout: post
title: Windows 本地運行 Jekyll 的方法
categories: 
  - 技術筆記
tags: 
  - Jekyll
published: true
---

(2013-09-27更新)

玩了一陣子Jekyll後，我發覺調整 Blog 版面的速度很慢，因為我每次做了點修改(即使只是很小的修改)，也都要先把修改推上 Github ，並等上一兩分鐘才能看見頁面結果，這個循環的速度實在太慢了，讓人不爽
。讓我興起了在自己的電腦上安裝運行 Jekyll 的念頭。

沒想到折騰了一下午後，發現整個過程比我想像的還要麻煩多了，運行環境對 Windows 也不是很友善。不過總之還是搞定了，以下是我終於能順利在本機編譯 Jekyll 網站的步驟，給自己做個紀錄也分享給大家：

### 配置 Ruby

Jekyll 這套系統是用 Ruby 語言寫的，所以第一步要安裝 [Ruby][0] ，我安裝的版本是 Ruby 1.9.3。

再來 Jekyll 需要 [Ruby Development Kit][1]，在同個下載頁的下方可以找到對應的版本。
Development Kit 的配置方法比較特別，解壓縮後，要在該目錄下用命令列輸入以下兩條命令來配置:

~~~
ruby dk.rb init
ruby dk.rb install
~~~

### 安裝 Jekyll

接下來就可以正式安裝 Jekyll 了，打開命令列輸入 `gem install jekyll`

`gem` 是 Ruby 語言的套件管理器，透過 gem 來安裝是最簡便，也是官方推薦的作法。安裝過程中有些編譯工作要進行，所以請確定你的電腦上有 `make` 和 `gcc` 。

### 中文問題

首先一個 Jekyll 的大坑「中文檔名」，絕對不要去踩。因為 Windows 的檔名編碼不是 UTF-8 ，只要目錄內有中文檔名那網站一定會編譯失敗。有趣的是 Jekyll 在 Mac 和 Linux 下使用中文檔名是沒有問題的， Github 上有中文檔名的文章也可以正確顯示。唯一會出岔子的就是 Windows 本地編譯，這個問題目前無解，只能避開。

記得將文件存為 UTF-8 編碼無 BOM。文件內容可以使用中文，中文文章標題也沒問題。少用tab字元，盡量用空白符。找個靠譜的文字編輯器如 Notepad++ 可以省去許多力氣。

最後建置 Jekyll 網站之前，需要改變命令列的編碼，詳細如下: 

~~~
set LC_ALL=en_US.UTF-8
set LANG=en_US.UTF-8
jekyll serve --watch --trace
~~~

頭兩行改編碼，最後一行呼叫 jekyll 命令進行編譯，詳細解釋可以參考[官方文檔][2]。我一般會將這三行命令寫成一個.bat檔，只要滑鼠雙擊就可以編譯並啟動本地伺服器。

最後瀏覽器打開 `http://localhost:4000` 就可以看編譯結果啦，恭喜。


[0]: http://rubyinstaller.org/downloads/ "Ruby Installer"
[1]: http://rubyinstaller.org/downloads/ "Ruby development kit"
[2]: "http://jekyllrb.com/docs/usage/" "Jekyll Usage"