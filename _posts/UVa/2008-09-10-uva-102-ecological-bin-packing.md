---
layout: post
title: UVa 102 Ecological Bin Packing
tags: [UVa Online Judge]
categories: [程式解題]
published: true
---

### 解題策略

瓶子的顏色總共只有三種：B、G、C，所以直接手動將六種排列方式列出，並一一計算每種方法的移動次數即可。

注意本題的I/O量非常大，所以使用 cin/cout 與 scanf/printf 之間的速度差距很明顯。
我解這題用 cin/cout 的執行時間是0.420秒，換為scanf/printf後的執行時間則縮短為0.230秒，幾乎快上一倍。

### 碎碎念

花了不少時間debug，找到bug之後只有囧一個字可以形容，就是totalGlasses進迴圈前忘了歸零，這種智障bug...。提醒我以後一定要謹守編程的好習慣: 「永遠在變數需要被用到的最內層區塊才宣告並初始化該變數。」

<a class="embed" href="https://api.bitbucket.org/1.0/repositories/chchwy/chchwyacm/src/tip/102.cpp">
</a>