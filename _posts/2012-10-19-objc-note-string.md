---
layout: post
title: "Objective-C學習筆記(1) 字串兩三事"
categories: [ 技術筆記 ]
tags: [ Objective-C ]
published: true
---

這是我學習Objective-C中記錄下來的筆記，有時會參雜一些自己的看法。

典型的C字串的型態是`const char[]`，比如說下面就是個C字串
~~~
const char str[] = "This is a C string";
~~~

Objective-C雖然基於C語言，但是C字串實在太難用了，所以Objective-C有自己獨有的字串物件 - NSString。Foundation Framework也都以NSString為基礎。

只要字串常數的開頭冠上一個@符號，該字串就被編譯器視為`NSString*`型態，如:
~~~
NSString* str = @"This is a Obj-c string";
~~~
NSString支持Unicode，內部採用UTF-16編碼儲存字串，由characterAtIndex:方法的回傳值可以察覺，
字串內的單個字元型態是unichar，而unichar又被定義為unsigned short (2 bytes)。

NSString是不可變物件(immutable object)，意思就是字串一旦創立之後就不能修改內容。
如果需要改動內容，就要建立一個新的字串。

比方你想把某個單詞第一個字母由小寫改成大寫，C字串大可直接修改`str[0] = 'B';`
但是NSString裡是找不到方法去直接修改原字串的，最簡便的辦法是呼叫capitalizedString方法來建立新字串，首字母大寫的新字串：

    NSString* str = @"bull";
    NSString* str2 = [str capitalizedString];

* 不可變字串有容易優化，線程安全，實作簡單強固等等優點，詳細請孤狗關鍵字Immutable Object。

* 如果需要頻繁改動字串的內容，請改用NSMutableString。NSString - NSMutableString 的關係就如同Java語言中String - StringBuilder 的關係，目的是將不可變字串與可變字串區分開來，專注於各自的任務上。

### 編碼

NSString與其他編碼的字串雙向互轉很容易:

    char* asciiStr = "Hello, World!";
    // 把ASCII字串轉為NSString
    NSString* objcStr =[NSString stringWithCstring: asciiStr
                                 encoding: NSASCIIStringEncoding];
    // 再轉回ASCII字串
    char* asciiStr2 = [NSString cStringUsingEncoding:NSASCIIStringEncoding];

UTF-8編碼因為太常用，所以有獨立的方法

    NSString*  str = [NSString* stringWithUTF8String:"許功蓋"];
    char* utf8_str = [str UTF8String];

LLVM 4.0 添加了將C字串快速封裝為NSString的短語法

    const char cStr[] = "Hello world.";

    //兩者效力相等。
    NSString* myStr = @(cStr); //新語法
    NSString* myStr = [NSString stringWithUTF8String:cStr); //舊語法


### String Format

NSString沿用了printf()的那一套格式化字串(%d,%f,%s)，唯一額外添加的符號是`%@`，專用來打印NSString及NSObject。

    // 印NSString
    NSLog("Hello, %@", @"David");

    // 印NSArray
    NSArray* myArray = @[@"Apple", @"Banana", @"Orange"];
    NSLog("Array: %@", myArray);

使用`%@`符號來打印NSObject時，背地裡其實呼叫了description方法，所以複寫description方法就可以訂製輸出文字。像打印NSArray、NSDictionary時可以看見陣列與字典的內容，就是因為它們都自訂了輸出文字。

NSLog()也可以使用string format，如`NSLog(@"I'm %d years old", 5);`。

### 讀寫檔案與URL

NSString雖然只是個字串類別，但是自帶了很多可愛而方便的方法，像是懶人一行讀檔:


    NSString* content = [NSString stringWithContentsOfFile:@"data.txt"
                                  encoding:NSUTF8StringEncoding
                                  error:nil];

* 當然，也有一行寫檔`writeToFile:atomically:encoding:error:`。
* 還有一行抓HTML網頁`stringWithContentsOfURL:encoding:error:`。

<!--
### 檔案路徑操作
參考來源:
- [各種Objective-C新列表及支援版本][1]
- [Objective-C字面常數][2]
[1]: http://developer.apple.com/library/ios/#releasenotes/ObjectiveC/ObjCAvailabilityIndex/_index.html "Objective-C Feature Available."
[2]: http://clang.llvm.org/docs/ObjectiveCLiterals.html "Objective-C new literal"
-->


