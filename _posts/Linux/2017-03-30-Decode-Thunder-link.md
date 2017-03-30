---
layout: post 
title: "解释迅雷链接地址"
tags: [thunder]
tagline: "thunder, link"
description: "解释迅雷链接为一般下载地址"
exerpt: |-
---

下载迅雷链接：

迅雷下载协议是经过加密的,如：
```
thunder://QUFlZDJrOi8vfGZpbGV8JUU4JUExJThDJUU1JUIwJUI4JUU4JUI1JUIwJUU4JTgyJTg5LlRoZS5XYWxraW5nLkRlYWQuUzA2RTAxLiVFNCVCOCVBRCVFOCU4QiVCMSVFNSVBRCU5NyVFNSVCOSU5NS5IRFRWcmlwLjEwMjR4NTc2Lm1wNHw2NDg3NTg1MDl8ZjIyZmI2OTRjMDQ0ZmYyNjU0MjhhNTEzNWVhYzhiOTB8aD12eXFsNHFjNHpmYmx0eWNqdW1rcnNibDJza2JscTJsZnwvWlo=
```

直接在Linux下面是没有办法下载的。

在终端下用 `echo url | base64 -d` 来解密，并显示地址，如（URL去掉头和尾）：

```
echo QUFlZDJrOi8vfGZpbGV8JUU4JUExJThDJUU1JUIwJUI4JUU4JUI1JUIwJUU4JTgyJTg5LlRoZS5XYWxraW5nLkRlYWQuUzA2RTAxLiVFNCVCOCVBRCVFOCU4QiVCMSVFNSVBRCU5NyVFNSVCOSU5NS5IRFRWcmlwLjEwMjR4NTc2Lm1wNHw2NDg3NTg1MDl8ZjIyZmI2OTRjMDQ0ZmYyNjU0MjhhNTEzNWVhYzhiOTB8aD12eXFsNHFjNHpmYmx0eWNqdW1rcnNibDJza2JscTJsZnwvWlo= | base64 -d
```
显示结果是：

```
AAed2k://|file|%E8%A1%8C%E5%B0%B8%E8%B5%B0%E8%82%89.The.Walking.Dead.S06E01.%E4%B8%AD%E8%8B%B1%E5%AD%97%E5%B9%95.HDTVrip.1024x576.mp4|648758509|f22fb694c044ff265428a5135eac8b90|h=vyql4qc4zfbltycjumkrsbl2skblq2lf|/ZZ
```

所以解密后的地址是：
```
ed2k://|file|%E8%A1%8C%E5%B0%B8%E8%B5%B0%E8%82%89.The.Walking.Dead.S06E01.%E4%B8%AD%E8%8B%B1%E5%AD%97%E5%B9%95.HDTVrip.1024x576.mp4|648758509|f22fb694c044ff265428a5135eac8b90|h=vyql4qc4zfbltycjumkrsbl2skblq2lf|/
```

golang测试代码：
```golang
package main

import (
	"fmt"
	"encoding/base64"
)

func main() {
	//完整的迅雷链接
	sEnc := "thunder://QUFlZDJrOi8vfGZpbGV8JUU4JUExJThDJUU1JUIwJUI4JUU4JUI1JUIwJUU4JTgyJTg5LlRoZS5XYWxraW5nLkRlYWQuUzA2RTAxLiVFNCVCOCVBRCVFOCU4QiVCMSVFNSVBRCU5NyVFNSVCOSU5NS5IRFRWcmlwLjEwMjR4NTc2Lm1wNHw2NDg3NTg1MDl8ZjIyZmI2OTRjMDQ0ZmYyNjU0MjhhNTEzNWVhYzhiOTB8aD12eXFsNHFjNHpmYmx0eWNqdW1rcnNibDJza2JscTJsZnwvWlo="
	//对迅雷链接进行剪切，去掉前面的 'thunder://'
	sEncCopy := sEnc[10:]
	
	sDec, _ := base64.StdEncoding.DecodeString(sEncCopy)
	//DecodeString 得到的结果为 
	// AAed2k://|file|%E8%A1%8C%E5%B0%B8%E8%B5%B0%E8%82%89.The.Walking.Dead.S06E01.%E4%B8%AD%E8%8B%B1%E5%AD%97%E5%B9%95.HDTVrip.1024x576.mp4|648758509|f22fb694c044ff265428a5135eac8b90|h=vyql4qc4zfbltycjumkrsbl2skblq2lf|/ZZ
	fmt.Println(string(sDec))
	//去除前面两个字符和去除后面两个字符
	sDecLink := sDec[2:len(sDec)-2]
	fmt.Println(string(sDecLink))
	//得到的结果为
	//ed2k://|file|%E8%A1%8C%E5%B0%B8%E8%B5%B0%E8%82%89.The.Walking.Dead.S06E01.%E4%B8%AD%E8%8B%B1%E5%AD%97%E5%B9%95.HDTVrip.1024x576.mp4|648758509|f22fb694c044ff265428a5135eac8b90|h=vyql4qc4zfbltycjumkrsbl2skblq2lf|/

}
```
