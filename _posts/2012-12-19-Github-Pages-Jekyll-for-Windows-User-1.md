---
layout: post
title: "Github Pages & Jekyll攻略 - 給Windows使用者 (上)"
categories: [Tech]
tags: [Jekyll]
published: true
---

本篇是我自己從零開始建立一個 Github Pages Blog的親身經驗，保證夠懶人，幾乎不需要操作命令列。
順帶一提，我自己用的是Windows，所以對象是 Windows 平台的使用者。

我之所以選擇Github ＆ Jekyll作為個人博客的原因 [可以參考這篇文章](http://chchwy.github.com/2012/12/Blogging-Like-a-Hacker-Github-Pages.html)。

要走完本篇教學需要具備的能力只有一個，
就是用文字編輯器手動修改 HTML/CSS 的能力，
不需要很厲害，但是基本了解是必須的。
不太會操作 git 也沒關係，因為沒有複雜的操作，可以慢慢來。

### 第一步，申請Github帳號 ###

首先一個Github帳號是鐵定要有的，[Github](http://github.com/) 是現在最熱門的程式員交流平台，不廢話，申請一個吧。


### 第二步，安裝Github for Windows的客戶端程式 ####

Github很貼心的為不擅長命令列操作的Windows使用者開發了這個工具「Github for Windows」，很大程度的降低了在Windows平台上使用git的門檻。
像我自己這種一招半式闖江湖，只會用一些簡單git命令的人，能有這個工具幫助真是再好不過了。

[Github for Windows下載頁面](http://windows.github.com/)，馬上安裝吧。


### 第三步，創建Github Pages版本庫 ####

第一次啟動Github for Windows程式，會要求你輸入Github的帳號與密碼。
接著就可以創建Git版本庫了，請按下視窗中央正上方的『+add』進入創建頁面:

![Create Reponsitory]({{site.url}}img/001-create-repo.png)

在創建版本庫的頁面中，**最重要的是版本庫必須取名為**

> 你的GITHUB帳號.github.com

比方說你的Github帳號叫charlie，那麼版本庫就一定要叫**charlie.github.com**，
這個特別的命名規則說明了這個版本庫不是一般的程式專案，而是要拿來當作個人博客的用途，
而版本庫名稱同時也是未來你的博客的訪問網址。
Push to github選項記得要勾。按下Create按鈕，版本庫就算創建完成了。


### 第四步，建立第一個頁面 ####

Github for Windows視窗中間列出了你目前的版本庫清單，點選小箭頭進入剛剛建立的版本庫。

![New Repo]({{site.url}}/img/004-new-repo.png)

接著按下上方的齒輪圖示tools -> open in explorer，打開版本庫所在的目錄。

![Open in Explorer]({{ site.url }}img/002-open-explorer.png)

所謂的版本庫也就是一個普通的目錄，你可以往目錄裡面塞任何東西，通常塞的是程式專案。

現在版本庫基本上已經準備好了，萬事具備，只欠東風。什麼都有了，就缺內容。
往目錄裡添加一個index.html作為網站首頁，檔案內容如下:

{% highlight html %}
<!doctype html>
<html>
  <body>Hello, Github!</body>
</html>
{% endhighlight %}

此時回到Github for Windows視窗，按一下右上角的uncommitted changes，會發現你剛剛在目錄中作的修改，全都清清楚楚的條列在案。這就是版本庫與普通目錄的差別，目錄內的每個檔案新增/刪除/內文的變動，版本庫都會詳細追蹤並且記錄下來。

![My First Commit]({{ site.url }}/img/003-first-commit.png)

在COMMIT MESSAGE欄位簡單描述一下變動重點，按下commit按鈕後，這些變動就被版本庫正式的記錄下來。

每進行一次commit，版本庫會快照整個目錄，並且將之登記成一個版本(Revision)
，透過版本控制系統，我們可以很輕易的追查任意兩版本之間的差異，並且隨時版本回溯。

最後按下publish，將本機版本庫與Github上的遠端版本庫同步。這樣子頁面就算上傳了。

![Sync]({{ site.url }}/img/005-publish-repo.png)

等待Github生成頁面後(1~10分鐘不等)，前往 http://YourName.github.com/ (把YourName換成你的帳號名)，就應該可以看見剛剛生成的頁面了!

下一篇將會詳解Github後端系統 - Jekyll，打造一個真正的個人博客。

