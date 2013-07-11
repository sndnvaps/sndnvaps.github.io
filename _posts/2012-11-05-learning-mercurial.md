---
title: Mercurial學習筆記
categories: [ 技術筆記 ]
tags: [ Mercurial ]
published: false
---

hg log 最近的變更歷史。
hg log -v 更囉嗦一點(verbose)
hg log -p 使用標準patch的形式打印。

hg diff 印出有什麼差別

hg tip 印出最新的changeset

hg incoming 告訴我們pull將會拉近來什麼變更。

hg pull 把改變拉下來，但是不與本地working copy合併
hg pull --update 把改變拉下來，並且馬上與本地working copy合併

hg push 推送變更
hg push --new-branch 推送 HEAD

hg merge branch-name

