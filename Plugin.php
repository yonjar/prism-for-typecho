<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
/**
 * Prism for Typecho
 *
 * @package SyntaxHighlighter
 * @author yonjar
 * @version 1.1.1
 * @link https://yuika.love/to/archives/60/
 */
class SyntaxHighlighter_Plugin implements Typecho_Plugin_Interface
{
    /**
     * 激活插件方法,如果激活失败,直接抛出异常
     *
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function activate()
    {
        Typecho_Plugin::factory('Widget_Archive')->header = array('SyntaxHighlighter_Plugin', 'header');
        Typecho_Plugin::factory('Widget_Archive')->footer = array('SyntaxHighlighter_Plugin', 'footer');
    }

    /**
     * 禁用插件方法,如果禁用失败,直接抛出异常
     *
     * @static
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function deactivate(){}

    /**
     * 获取插件配置面板
     *
     * @access public
     * @param Typecho_Widget_Helper_Form $form 配置面板
     * @return void
     */
    public static function config(Typecho_Widget_Helper_Form $form)
    {
        /** 分类名称 */
        $theme = new Typecho_Widget_Helper_Form_Element_Select('theme', array('default' => 'Default',
            'dark' => 'Dark',
            'funky' => 'Funky',
            'okaidia' => 'Okaidia',
            'twilight' => 'Twilight',
            'coy' => 'Coy',
            'solarized-light' => 'Solarized Light',
            'tomorrow-night' => 'Tomorrow Night',
            'extra' => '自定义/插件目录下extra'), 'default', _t('高亮主题:'), _t('选择一个你喜欢的高亮主题。'));

        $extra_css = new Typecho_Widget_Helper_Form_Element_Text('extra_css', NULL, NULL, _t('自定义主题样式，需提前将CSS放进插件目录下extra文件夹里'), _t('填入CSS文件名，如material_oceanic.css'));

        $show_line_nums = new Typecho_Widget_Helper_Form_Element_Select('show_line_nums', array('y' => '是',
            'n' => '否'), 'y', _t('显示行号:'), _t('是否显示行号？'));

        $show_match_braces = new Typecho_Widget_Helper_Form_Element_Select('show_match_braces', array('y' => '是',
            'n' => '否'), 'y', _t('显示括号匹配:'), _t('是否显示括号匹配？'));
            
        $form->addInput($theme);

        $form->addInput($extra_css);

        $form->addInput($show_line_nums);

        $form->addInput($show_match_braces);
        }

    /**
     * 个人用户的配置面板
     *
     * @access public
     * @param Typecho_Widget_Helper_Form $form
     * @return void
     */
    public static function personalConfig(Typecho_Widget_Helper_Form $form){}

    /**
     * 输出头部js和css
     *
     * @access public
     * @return void
     */
    public static function header() {
        $settings = Helper::options()->plugin('SyntaxHighlighter');
        $js = Helper::options()->pluginUrl . '/SyntaxHighlighter/theme/prism.js';
        $css_global = Helper::options()->pluginUrl . '/SyntaxHighlighter/theme/global.min.css';
        $css_plugin = Helper::options()->pluginUrl . '/SyntaxHighlighter/theme/extra/plugin.min.css';
        $css = Helper::options()->pluginUrl . '/SyntaxHighlighter/theme/' . $settings->theme . '/prism.min.css';
        
        if ($settings->theme == 'extra') {
            $css = Helper::options()->pluginUrl . '/SyntaxHighlighter/theme/extra/' . $settings->extra_css;
            echo '<link rel="stylesheet" type="text/css" href="' . $css_plugin . '" />' . "\n";
        }
        
        echo '<script type="text/javascript" src="' . $js . '"></script>' . "\n";
        echo '<link rel="stylesheet" type="text/css" href="' . $css . '" />' . "\n";
        echo '<link rel="stylesheet" type="text/css" href="' . $css_global . '" />' . "\n";
    }

    /**
     * 输出尾部js
     *
     * @access public
     * @return void
     */
    public static function footer() {
        $settings = Helper::options()->plugin('SyntaxHighlighter');
        $line_nums_css = $settings->show_line_nums === 'y' ? 'line-numbers' : '';
        $show_match_braces = $settings->show_match_braces === 'y' ? 'match-braces' : '';
        

        echo <<<EOF
       <script type="text/javascript">
           if (typeof(Prism) !== undefined) {
               // 处理 pre > code 内代码样式
               var pattern = /lang-(\w+)/;

               var preList = document.getElementsByTagName('pre');
               for (var i = 0; i < preList.length; i++) {
                    // preList[i].setAttribute("data-download-link","")
                    var codeList = preList[i].getElementsByTagName('code');
                    for (var j = 0; j < codeList.length; j++) {
                        var code = codeList[j];
                        var className = code.className;
                        if (!!className) {
                            var newClassName = className.replace(pattern, "language-$1");
                            code.setAttribute("class", newClassName + " $line_nums_css $show_match_braces");
                        } else {
                            code.setAttribute("class", "language-none $line_nums_css $show_match_braces");
                        }
                   }
               }

               // 处理 :not(pre) > code 内代码样式
               var codeList = document.querySelectorAll(':not(pre)>code')
               for (var i = 0; i < codeList.length; i++) {
                   codeList[i].setAttribute("class", "language-none");
              }
           }
       </script>
EOF;
        echo "\n";
    }
}
