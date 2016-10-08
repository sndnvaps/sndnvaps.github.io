---
layout: post 
title: "cmake --检测编译器是否支持armv7-a平台"
tags: [cmake]
tagline: "cmake"
description: "CHECK_C_COMPILER_FLAG"
exerpt: |-

---
```makefile
include(CheckCCompilerFlag)
CHECK_C_COMPILER_FLAG("-march=armv7-a" COMPILER_SUPPORTS_ARMV7_A)
if(COMPILER_SUPPORTS_ARMV7_A)
   MESSAGE("GCC Support armv7-a")
else(not COMPILER_SUPPORTS_ARMV7_A)
   MESSAGE("GCC Not Support armv7-a")
endif()
```
