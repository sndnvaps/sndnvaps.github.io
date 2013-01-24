---
layout: post
title: 博客當如駭客 - Github Pages & Jekyll
categories: [Blog]
tags: [Jekyll]
published: true
---

## 為什麼要用 Github Pages?

在遇見Github Page之前我一直都在 Blogger上寫博客 [http://chchwy.blogspot.tw](http://chchwy.blogspot.tw/)，斷斷續續的寫了四年左右，雖然有些小缺點像是貼碼的時候老是跟我抱怨`<iostream>`不是合法的HTML標籤，但還整體算滿意Blogger的服務。畢竟放眼望去很少有Blogger更好平台了。
但是你知道的，身為一個程式設計師，總想要對自己的Blog有更多、更多的控制權。
我曾經試著自己架設伺服器，不過養機器實在太麻煩，後來就不了了之。

所以當我看見[Github Pages](http://pages.github.com/)時眼睛一亮，馬上就發覺這就是我想要的博客系統:

![Flickr from http://www.flickr.com/photos/39553261@N08/](http://farm4.staticflickr.com/3035/4059882973_f5f33b1eff.jpg)

首先，Github Pages 給予我完全控制頁面的權力，而且省卻了管理主機的麻煩。
Github本身作為全球性的代碼託管服務商，不需要擔心服務品質。

不同於其他的博客系統，後端總要有一套PHP+MySQL之類的運行環境，Github Pages後端採用了一個叫作[Jekyll](https://github.com/mojombo/jekyll)的靜態網站產生器。Jekyll一開始就將整個網站編譯成靜態HTML頁面，所以對於網路空間的要求極低，不用資料庫，也不用後端語言。對博客這類好幾天才會更新一篇的網站，靜態編譯再適合不過了。

但是靜態網站的缺點就是訪客沒辦法回應文章，必須倚賴第三方服務，好在[Disqus](http://disqus.com) 和 [Facebook](http://developers.facebook.com/docs/reference/plugins/comments/)
都有提供這類網站評論的服務，申請一個很容易，我現在就是用Disqus。

另一個我喜歡的特性就是Markdown語法，不知道什麼是Markdown的朋友可以[看看語法說明](http://markdown.tw)。
用Markdown來寫文章太省力了，可讀性也很好，我不再需要為了文章的樣式跟HTML標籤瞎攪和，回歸單純寫文章的樂趣，而且可以用我最鍾愛的文字編輯器[Sublime Text 2](http://www.sublimetext.com/)來寫文章。

想當然爾，Github Pages一定是用git版本控制系統來管理博客，整個博客就是一個版本庫，因此我不用上網，可以先在本地端寫文章，寫好再推送上Github就好了。用了git，基本上不必擔心內容遺失，文章都有完整的歷史紀錄，多台電腦同步也很方便。

還有一點，Jekyll 的標語是 Blogging Like a Hacker，聽起來很帥。XD

## 如何開始

我在網路上搜尋了很多Jekyll/Github Pages教學，大部分不是寫的雜亂無章，就是有所缺漏， 最後總算找到一篇條理清晰的教學
「[搭建一个免费的，无限流量的Blog----github Pages和Jekyll入门](http://www.ruanyifeng.com/blog/2012/08/blogging_with_jekyll.html)」，只能說阮一峰，不意外。
只是裡面有個小小的錯誤，就是單純的個人博客不需要特別建立gh-pages分支，直接放在主分支master裡就可以了。

搞Jekyll還是要有基本的網頁知識，最好有自己撰寫HTML/CSS的經驗。
有興趣的人，可以參考我的經驗: [建立Github Blog - 給Windows使用者](2012/12/Github-Pages-for-Windows-Lasy-User-1.html)
