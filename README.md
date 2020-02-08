Prism for Typecho
=================

### 2020年2月8日

添加以下特性:

- Line Numbers
- Show Language
- Inline color
- Toolbar
- Copy to Clipboard Button
- Match braces

---

本插件基于[firzen][1]的SyntaxHighlighter-For-Typecho修改，是一款使用Prism作为typehco代码高亮的插件。

### 支持的语言

本插件支持以下语言.

- Markup
- CSS
- C-like
- JavaScript
- Java
- PHP
- Python

如果有不支持的语言，请到[prism][2]下载，替代theme目录下对应主题的prism.js和prism.css文件即可。

### 安装

本插件安装很简单:

```bash

# 切换到typecho的插件目录
cd /path/to/typecho/usr/plugins

git clone https://github.com/yonjar/prism-for-typecho.git SyntaxHighlighter
```

[1]: https://github.com/firzen
[2]: http://prismjs.com/download.html