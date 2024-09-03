# Speedy KaTeX for China

<div align="center">

[English](README.md) | 中文

![KaTeX Version](https://img.shields.io/badge/KaTeX-v0.13.2-blue)
![GitHub release (latest by SemVer)](https://img.shields.io/github/downloads/itdevwu/KaTeX-CN/latest/total?sort=semver)
![Liberapay patrons](https://img.shields.io/liberapay/patrons/itdevwu)

</div>

针对中国大陆优化并提供中文设置的高速 [KaTeX](https://katex.org) 数学公式插件。使用了在中国大陆地区加速访问的CDN网络并增加了中文设置的支持并支持 LaTeX 公式。

## 使用方法

```text
[latex] 这里输入LaTeX公式 [/latex]
[katex] 这里输入KaTeX公式 [/katex]
```

## 常见问题

### 使用了哪个 CDN 服务商？

* [ByteDance CDN](https://cdn.bytedance.com)

## 更新日志

### 0.1.0

* 初始版本
* 增加中文支持
* 增加 BootCDN 支持

### 0.1.1

* 增加 Staticfile CDN 支持
* 移除 BootCDN 支持

### 0.2.0

* 增加短代码 `[tex]`
* 移除 Staticfile CDN 以避免可能存在的供应链攻击
* 增加 ByteDance CDN 支持

## 版权

**KaTeX-CN** 是基于 [Thomas Churchman](https://churchman.nl) 的“[KaTeX](https://wordpress.org/plugins/katex)”项目开发，原项目采用 [GPLv2](https://opensource.org/licenses/GPL-2.0) 开源。

**KaTeX-CN** 采用 [GPLv2](https://opensource.org/licenses/GPL-2.0) 的更新版本 [GPLv3](https://opensource.org/licenses/GPL-3.0) 进行开源授权。

```text
Copyright (C)  2020-2024  itdevwu

This file is part of KaTeX-CN.

KaTeX-CN is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or 
(at your option) any later version.

KaTeX-CN is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with KaTex-CN. If not, see <http://www.gnu.org/licenses/>.
```
