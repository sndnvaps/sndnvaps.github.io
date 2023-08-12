---
layout: post 
title: "制作Kindle mobi,epub书籍完美教程"
tags: [mobi]
tagline: "Kindle,epub,mobi,txt"
description: "为了更好地制作出Kindle mobi，epub格式电子书，我选择了VS Code + Calibre。因为 GIDOT TYPESETTER 这个软件加载txt文本速度太慢了，严重影响了效率。"
exerpt: |-
---

本文只为技术交流，希望不会被跨省。

需要使用的软件：

 1. Calibre，下载地址 [https://calibre-ebook.com/download](https://calibre-ebook.com/download)
 2. VS Code，下载地址 [https://code.visualstudio.com/](https://code.visualstudio.com/)


```
把TXT文件直接拖到VS Code里去，做一些清理工作，如去除（添加）段落之间的空行，首行缩进等等

然后我们在txt里对预处理好的文件进行精加工，因为Kindle本身的翻页很麻烦，所以我希望我的书能够自带目录，所以我们要在txt当中加入标记，让calibre在转换的过程当中遇到相应标记时自动生成toc。


Calibre支持txt中的Markdown语法标记。简单来说calibre可以生成三级目录，每一级目录标记可以使用html当中 h1,h2,h3....等等。而使用markdown语法在txt格式当中进行html标识时，每一行开头以# (#空格）对应h1， ## （##空格）对应h2，### (###空格） 对应h3,以此类推。



ok，我们现在就需要在每一章标题前面加入#或者##，在txt当中按*Ctrl+F*，在寻找栏中填入\s\s第(零|一|二|三|四|五|六|七|八|九|十|百|千|[0-9])+(章)\s+.*，这是正则表达式的语法，\s表示空格, \s\s表示两个空格， (零|一|二|三|四|五|六|七|八|九|十|百|千|[0-9])，表示在第和章之间只要符合(零|一|二|三|四|五|六|七|八|九|十|百|千|[0-9])里面任一个字符即可，.*表示任意字符，所以\s\s第(零|一|二|三|四|五|六|七|八|九|十|百|千|[0-9])+(章)\s+.*表示只要以两个空格开始的第(*)章后面跟空格的任意文字串

在替换栏中输入##$0， ##是h2的表示, $0表示寻找到符合正则表达式的字符串。点击 替换框 右边的第二个选项，所有章节名前面都加入了##标记。
```

VS Code 操作效果图

![替换二级目录前](https://i.loli.net/2019/11/07/nD9Qc1hyYU8gM25.png "替换二级目录前")
![替换二级目录后](https://i.loli.net/2019/11/07/blv4LQzjqKwVy82.png "替换二级目录后")
![替换三级目录前](https://i.loli.net/2019/11/07/dPiF18WHLR9yDkg.png "替换三级目录前")
![替换三级目录后](https://i.loli.net/2019/11/07/DeXdURNoznVYKTu.png "替换三级目录后")

使用 Calibre 生成 mobi 需要注意的问题

 1. 替换封面
 2. 界面外观选项中，进入布局选项，再把里面的 删除段前空行 这个选项打个勾
 3. 内容目录 如果只有一个目录格式(即全部为 二级目录，或者三级目录)，就只设置一级目录就可以
 4. TXT 输入选项中，设置结构，把里面的 格式化格式设置为 markdown
 5. MOBI格式 输出选项，这个不是必要的，但我个人喜欢设置 在生成的书籍开始处插入目录，而不是放在末尾(S)
 6. 最后一步，直接点击 确定 选项，剩下就可以喝杯茶进行等待了。预计时间5分钟左右，根据TXT文本的大小而决定

Calibre 操作效果图
![删除段前空白行](https://i.loli.net/2019/11/07/NmDAHscvUp46WJx.png "删除段前空白行")
![在书籍开始处添加目录](https://i.loli.net/2019/11/07/9IoCyUvPS71OVun.png "在书籍开始处添加目录")
![TXT输入格式](https://i.loli.net/2019/11/07/9bE6ncOKCySjWsI.png "修改TXT输入格式化样式为markdown")
![内容目录设置](https://i.loli.net/2019/11/07/thzUdBa98qgPmSv.png "修改内容目录格式")

参考文章：

  1. [制作Kindle mobi书籍完美教程](https://www.douban.com/note/194849341/)
  2. [教你轻松快速学会用Calibre TXT转MOBI](https://www.cnblogs.com/joechinochl/p/8464797.html)
  3. [VS code的搜索、替换与正则替换](https://www.cnblogs.com/jameBo/p/10559864.html)
  4. [Markdown基本语法](https://www.jianshu.com/p/191d1e21f7ed)
