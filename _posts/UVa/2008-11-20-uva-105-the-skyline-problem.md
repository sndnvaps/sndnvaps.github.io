---
layout: post
title: UVa 105 The Skyline Problem
tags: [UVa Online Judge]
categories: [Tech]
published: true
---

### 解題策略

天際線問題 (skyline problem) 是有名的算法問題，看似單純無害，但其實有一點難。

還好在UVa 105我們不用真的去對付天際線問題，因為題目有個親切的限制:
地圖最大長度不會超過 10000，所以只要開一個巨大的陣列，暴力記下 0~10000 每個位置的高度，本題就只能算是一道可口的小點心了。一開始將陣列[0~10000]的值都初始為零，之後每加入一棟房子，就將該房子範圍的高度更新。

### 注意
輸入測資最大值為10000，所以記得宣告陣列大小為 hegith_map[10000+1]。

ps. 因為倒數第三行的printf()少了一個"\n"，讓我WA三次Orz。 @2008.11.20

<a class="embed" href="https://api.bitbucket.org/1.0/repositories/chchwy/chchwyacm/src/tip/105.cpp">
</a>

