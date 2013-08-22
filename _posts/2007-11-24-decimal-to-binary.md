---
layout: post
published: true
title: 十進位轉二進位
tags: C++
permalink: /2007-11-24-十進位轉二進位.html
---
目前為止寫過最簡短的版本

<pre class="prettyprint">
#include<iostream>
#include<climits>
using namespace std;

int main()
{
    int x=0;
    unsigned int y = INT_MIN;
    cout << "please enter a Integer:"
    cin >> x;
    while (y != 0)
    {
        (x & y) ? (cout << "1") : (cout << "0");
        y = y << 1;
    }
}
</pre>

概念： INT_MIN的二進位長這樣 10000000000000000000000000000000
跟x做bit AND，除了最左邊bit，其他bit都會變0。

只有最左邊bit維持原樣，這時就可以單獨判斷該bit要印出0或1。
接下來將INT_MIN 往右shift一個bit。就可以判斷x第二個bit了，依此類推。