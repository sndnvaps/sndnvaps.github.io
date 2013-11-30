---
layout: post
title: "what is the means of the cwm/miui/twrp recovery error codes"
description: "the means of error codes"
tags: [Android,Recovery,debug]
tagline: "Android Recovery debug"
exerpt: |-
---


 ## cwm / Miui / Twrp Recovery用的Update-binary大致是一样的。
所以出现的错误代码意思相同。
下面我对其进行一一讲解。
为了得到各个错误代码的意思是什么意思，我查看了各个 Recovery的源代码目录里面的updater目录里面的源代码。
得到的情况如下。
首先，调用流程如下：
install.c::try_update_binary() -> pipe() -> updater.c::main()
在install.c源代码中的try_update_binary() 函数调用pipe() ,即管道中执行程序。
再往updater.c::main()函数中传入各种参数，包括，程序的位置 "/tmp/update_binary"。程序的版本号-> RECOVERY_API_VERSION. 管道1号的进程-> pipefd[1], 再后，才传入了刷机包的路径 -> (char*)path.
再通过fork()得到子进程。 
如果update_binary进程，顺利地运行，最后的返回值是0。
如果出现了错误，就会返回不同的错误代码。
下面列出不同的返回值，对应不同的错误的解释：
用到的源代码版本为cwm jb

## Error codes: 

<pre class="prettyprint"> 
status 1 :错误的原因是传入的参加少于4个。导致错误的地方是install.c::try_update_binary() ，解决方案是换一个cwm Recovery

status 2 :错误的原因是传入的参加中的第二个参加，RECOVERY_API_VERSION,错误，不是 '1', '2', '3'，这个要去修改源代码中的Android.mk。所以建议换一个Cwm Recovery

status 3 : 刷机包本身有问题，无法被打开, 解决方案，去换一个好的刷机包，或者是重新下载刷机包。

status 4 :无法在刷机包中找到刷机脚本，updater-script ，解决方案，对刷机包重新打包往里面加入updater-script.

status 5 :读取刷机脚本updater-script错误 ,解决方案：重写刷机脚本
status 6 :处理刷机脚本的时候出错 ， 解决方案，重写刷机脚本
status 7 :分析刷机脚本的时候出错了。解决方案，重写刷机脚本，改编码为utf8-no-bom

</pre>




