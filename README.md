# Prism for Typecho

---

本插件基于[firzen][1]的 SyntaxHighlighter-For-Typecho 修改，
再基于[wangdelin][3]的 prism-for-typecho 修改，以支持更多 Prismjs 特性和颜色主题，
是一款使用 Prism 作为 typehco 代码高亮的插件。

### 2020 年 3 月 7 日

添加更多主题(PrismJS/prism-themes):

- CB (originally by C. Bavota, adapted by atelierbram)
- GHColors (by aviaryan)
- Pojoaque (originally by Jason Tate, adapted by atelierbram)
- Xonokai (originally by Maxime Thirouin (MoOx), adapted by atelierbram)
- Ateliersulphurpool-light (by Bram de Haan)
- Hopscotch (by Jan T. Sott)
- Atom Dark (by gibsjose, based on Atom Dark Syntax theme)
- Duotone Dark (by Simurai, based on Duotone Dark Syntax theme for Atom)
- Duotone Sea (by Simurai, based on DuoTone Dark Sea Syntax theme for Atom)
- Duotone Space (by Simurai, based on DuoTone Dark Space Syntax theme for Atom)
- Duotone Earth (by Simurai, based on DuoTone Dark Earth Syntax theme for Atom)
- Duotone Forest (by Simurai, based on DuoTone Dark Forest Syntax theme for Atom)
- Duotone Light (by Simurai, based on DuoTone Light Syntax theme)
- VS (by andrewlock)
- VS Code Dark+ (by tabuckner)
- Darcula (by service-paradis, based on Jetbrains Darcula theme)
- a11y Dark (by ericwbailey)
- Dracula (by Byverdu)
- Synthwave '84 (originally by Robb Owen, adapted by Marc Backes)
- Shades of Purple (by Ahmad Awais)
- Material Dark (by dutchenkoOleg)
- Material Light (by dutchenkoOleg)
- Material Oceanic (by dutchenkoOleg)
- Nord (originally by Nord, adapted by Zane Hitchcox and Gabriel Ramos)

### 2020 年 2 月 8 日

添加以下特性:

- Line Numbers
- Show Language
- Inline color
- Toolbar
- Copy to Clipboard Button
- Match braces

### 支持的语言

本插件支持以下语言.

- Markup
- CSS
- C-like
- JavaScript
- Java
- PHP
- Python

如果有不支持的语言，请到[prism][2]下载，替代 theme 目录下对应主题的 prism.js 和 prism.css 文件即可。

### 安装

本插件安装很简单:

```bash

# 切换到typecho的插件目录
cd /path/to/typecho/usr/plugins

git clone https://github.com/yonjar/prism-for-typecho.git SyntaxHighlighter
```

[1]: https://github.com/firzen
[2]: http://prismjs.com/download.html
[3]: https://github.com/wangdelin
