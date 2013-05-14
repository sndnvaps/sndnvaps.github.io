---
layout: post
title: UVa 105 The Skyline Problem
tags: [UVa Online Judge]
categories: [程式解題]
published: true
---

### 解題策略

天際線問題 (skyline problem) 是有名的算法問題。
它的題目敘述很簡單，很容易讓你誤以為有個簡短而優雅的「啊哈!」解法，但其實沒有。

好在UVa 105有個親切的限制，讓我們不需要真的去對付天際線問題: 地圖最大長度不超過 10000。

具體策略如下，開一個巨大陣列，暴力記下 0~10000 每個位置的高度，一開始將[0~10000]的值都初始為零，之後每加入一棟房子，就將該房子範圍的高度更新。

至此本題就算是一道可口的小點心了。


### 注意
輸入測資最大值為10000，所以記得宣告陣列大小為 hegith_map[10000+1]。

ps. 因為倒數第三行的printf()少了一個"\n"，讓我WA三次Orz。 @2008.11.20

<a class="embed" href="https://api.bitbucket.org/1.0/repositories/chchwy/chchwyacm/src/tip/105.cpp">
</a>

