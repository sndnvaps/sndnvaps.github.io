---
layout: post
title: "博客當如駭客 - Github Pages & Jekyll"
categories: 
  - 技術筆記
tags: 
  - Jekyll
published: true
---

### 為什麼要用 Github Pages? ###

遇見Github Page之前我定居在 [Blogger][0] ，斷斷續續不是很認真的寫了四年左右的博客，除了一些小缺點，像貼程式碼時老是跟我抱怨`<iostream>`不是合法的 HTML 標籤外，還算滿意 Blogger 的服務。畢竟要找到比 Blogger 更好的平台也不容易。

但是身為一個程式設計師，總想要對自己的Blog有更多、更多的控制權。我曾經試著自己架設伺服器，不過養機器實在太過麻煩，離開學校之後博客該何去何從也沒個底，就不了了之。

所以當我看見 [Github Pages][1] 時眼睛一亮，馬上就發覺這就是我想要的博客系統:

![Flickr from http://www.flickr.com/photos/39553261@N08/](http://farm4.staticflickr.com/3035/4059882973_f5f33b1eff.jpg)

首先，Github Pages 給予我完全控制頁面的權力，省卻了管理主機的麻煩。
Github本身作為全球性的代碼託管服務商，不需要擔心服務品質。

不同於其他的博客系統，後端總要有一套 PHP+MySQL 之類的運行環境即時運算頁面，
Github Pages 後端採用了一個叫作 [Jekyll][2] 的靜態網站產生器。
Jekyll一開始就將整個網站編譯成靜態HTML頁面，所以不用資料庫，也不用後端語言，對於網路空間的要求極低。
博客這類好幾天才會更新一篇的網站，靜態編譯再適合不過了。

但是靜態網站的缺點就是訪客沒辦法回應文章，必須倚賴第三方服務，好在[Disqus][3] 和 [Facebook][4] 都提供這類網站評論的服務，申請一個很容易，我現在就是用Disqus。

另一個我喜歡的特性就是可以用Markdown語法寫文章，不知道什麼是Markdown的朋友可以[看看語法說明][5] 。用Markdown來寫文章太省力了，可讀性也很好，我不再需要為了文章的樣式跟HTML標籤瞎攪和，回歸單純寫作的樂趣，而且可以用我最鍾愛的文字編輯器 [Sublime Text 2][6] 。

想當然爾，Github Pages一定是用git版本控制系統來管理博客，整個博客就是一個版本庫，因此我不用上網，可以先在本地端寫文章，寫好再推送上Github就好了。用了git，基本上不必擔心內容遺失，文章都有完整的歷史紀錄，多台電腦同步也很方便。

還有一點，Jekyll 的標語是 Blogging Like a Hacker，聽起來很帥。XD

### 如何開始 ###

我在網路上搜尋了很多Jekyll/Github Pages教學，大部分不是寫的雜亂無章，就是有所缺漏， 最後總算找到一篇條理清晰的教學
「[搭建一个免费的，无限流量的Blog----github Pages和Jekyll入门](http://www.ruanyifeng.com/blog/2012/08/blogging_with_jekyll.html)」，只能說阮一峰，不意外。
裡面有個小錯誤需要更正，就是單純的個人博客不需要特別建立 gh-pages 分支， 直接放在主分支 master裡就可以了。

只要有基本的 HTML/CSS 知識，和折騰的精神，可以來試試看Jekyll :D

[0]: http://chchwy.blogspot.tw/ "Blogger 調和的靈感"
[1]: http://pages.github.com/ "Github Pages"
[2]: http://jekyllrb.com/ "Jekyll"
[3]: http://disqus.com "Disqus"
[4]: http://developers.facebook.com/docs/reference/plugins/comments/ "Facebook comments"
[5]: http://markdown.tw "Markdown Syntax"
[6]: http://www.sublimetext.com/ "Sublime Text"