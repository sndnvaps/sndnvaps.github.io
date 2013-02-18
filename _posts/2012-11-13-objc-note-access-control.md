---
layout: post
title: 從C++到Objective-C 訪問權限
tags: [Objective-C]
categories: [ 技術筆記 ]
published: false
---

在C++中有`public/protected/private`控制外部對class成員的訪問權限。那Objective-C呢？ 當中也有對應的`@public/@protected/@private`，但是並不建議用。

### public/protected/private權限問題

<pre class="prettyprint">
@interface Man : NSObject {
    // private
}
@property myProp;
-(void) talk;
@end

@implementation Man {
    NSString * name;
}
-(void) talk {
    NSLog(@"Hello, I'm %@.", name);
}
@end
</pre>
