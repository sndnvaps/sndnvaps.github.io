---
layout: post
title: "Git常用命令"
tags: [linux,git]
tagline: "git常用命令"
description: "git常用命令"
exerpt: |- 

---



```bash
 git init                    #初始化本地仓库
 git add .                   #把本地的内容加到仓库中
 git commit -m "description " #进行一次commit 
 git branch -a #显示所有的分支，包括本地和远程的分支
 git branch -m ori-branch dist-branch  #修改本地分支的名字  ，ori-branch为原来的分支名，dist-branch要修改后的分支名
 git branch -d branch-name  #删除分支名
 git branch -d -r origin/test #删除远程的test分支
 git branch branch-name  #创建一个分支，名字为branch-name
 git push origin :test     #删除远程的test分支
 git push origin test:master #提交本地的test分支做为远程的master分支
 git fetch  origin master #从远程的master分支下载最新的版本到本地，但是不会自动merge(合并）

 git fetch origin master:remote-branch # 把远程的master分支下载到本地的remote-branch分支，这个remote-branch 分支会被自动创建，不存在的时候
 git diff remote-branch #比较现在所处的分，跟remote-branch分支有什么差别
 git merge --no-ff remote-branch #把remote-branch分支合并到现在的分支上面，如果没有冲突，会自动完成合并。当出现冲突的时候，需要手动修改conflict ,再提交commit

 git log -p master ../origin/master #比较本地的master分支和origin/master分支的差别
 git merge origin/master #合并分支

 
 git pull origin master #相当于从远程获取最新的版本并merge(合并）到本地的master分支，相当于git fetch和git merge 
 git checkout branch-name #可以切换分支和检出分支
 git checkout -b new_branch base_branch_name #基于base_branch_name分支一个名为new_branch的分支
 git checkout --orphan gh-pages #基于master分支创建一个没有父节点的分支，名字为gh-pages 
 git remote add origin git@github.com:username/project-name.git #添加远程仓库，另名为origin
 git clone git@github.com:username/project-name.git  #把远程仓库克隆到本了，生成文件夹project-name ,此时project-name中的远程分支另名为origin
 git remote rm origin #删除远程分支的另名，origin,如果要重新添加，就要用git remote add url
 git format-patch -M master #比较当前分支与master分支的差别，并生成0001-<commit>-.patch 
0002-<commit>-.patch 
 git am 0001-<commit>-.patch #应用patch文件到当前的分支中

```



