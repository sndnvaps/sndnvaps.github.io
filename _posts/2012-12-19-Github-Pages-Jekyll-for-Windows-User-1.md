---
layout: post
title: "Github Pages & Jekyll攻略 - 給Windows使用者 (上)"
categories: [ 技術筆記 ]
tags: [Jekyll]
date: 2013-01-05
published: true
---

本篇是我自己從零開始建立 Github Pages 獨立博客的經驗，現在我更新博客也都是走這個流程。
順帶一提，我自己用的是 Windows，所以本文對象是 Windows 用戶。

要走完本篇教學需要具備的能力只有一個，
就是用文字編輯器手動修改 HTML/CSS 的能力，
不需要很厲害，但是基本了解是必須的。

### 第一步，申請Github帳號 ###

首先一個 [Github](http://github.com/) 帳號是鐵定要有的。

### 第二步，安裝Github for Windows的客戶端程式 ###

Github Pages的更新與上傳都要透過git，這是第一個需要跨過的門檻。因為git並不容易學習。

好在 Github 很貼心的為不擅長命令列操作的Windows使用者開發了這個工具 「Github for Windows」， 很大程度的降低了在Windows平台上使用git的門檻。
像我自己這種一招半式闖江湖，只會一些簡單git命令的人，有這個工具幫助真是再好不過了。

[Github for Windows下載頁面](http://windows.github.com/)，馬上安裝吧。

### 第三步，創建Github Pages版本庫 ####

第一次啟動Github for Windows程式，會要求你輸入Github的帳號與密碼。
接著按下視窗中央正上方的`+add`創建Git版本庫:

![Create Reponsitory]({{site.url}}/img/001-create-repo.png)

在創建版本庫時，**最重要的是版本庫必須取名為**

> 你的GITHUB帳號.github.io

比方說Github帳號叫charlie，那麼版本庫就一定要取名為 **charlie.github.io** ，
這個特殊命名規則說明了這個版本庫不是普通程式專案，而是要拿來當作個人博客的用途，
同時版本庫名稱也是未來博客的訪問網址。
(2013年四月起，Github Pages域名由github.com移到了github.io)

Push to github選項記得要勾。按下Create按鈕，版本庫就算創建完成了。


### 第四步，建立第一個頁面 ####

視窗中間點選小箭頭進入剛剛建立的版本庫。

![New Repo]({{ site.url }}/img/004-new-repo.png)

接著按下上方的齒輪圖示tools -> open in explorer，打開版本庫所在目錄。

![Open in Explorer]({{ site.url }}/img/002-open-explorer.png)

這個目錄就是建構網頁的施工地點囉，就讓我們從首頁 index.html 開始吧。
先往目錄裡添加一個 index.html 文件，文件內容如下:

~~~
<!DOCTYPE html>
<html>
  <body>Hello, Github!</body>
</html>
~~~

回到 Github for Windows 視窗，按一下右上角的uncommitted changes，會發現你剛剛在目錄中作的修改，全都清清楚楚的條列在案。目錄內的每個檔案新增/刪除/內文的變動，版本庫都會做追蹤。

![My First Commit]({{ site.url }}/img/003-first-commit.png)

接著在COMMIT MESSAGE欄位簡單描述一下變動重點，按下commit按鈕後，這些變動就被版本庫正式的記錄下來。

每進行一次commit，版本庫會快照整個目錄，並且將之登記成一個版本(Revision)
，透過git版本控制系統，我們可以很輕易的追查任意兩版本之間的差異，並且隨時回溯。

最後按下`publish`，將本機版本庫上的內容推送上Github，這樣子就把網站發佈出去了。

![Sync]({{ site.url }}/img/005-publish-repo.png)

推送上Github後，稍等一下，生成頁面需要一點時間，前往 `http://YOURNAME.github.io` (把YourName換成你的帳號名)，應該就可以看見首頁index.html的內容了。

接下來每次的改動頁面，都一樣先commit，再推送上Github來發佈網頁。

到此為止，已經建立起本機與Github Pages之間的橋樑啦，
下一篇將會詳解Github後端系統 - Jekyll，打造一個真正的個人博客。