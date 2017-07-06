<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
/**
 * Prism for Typecho
 *
 * @package SyntaxHighlighter
 * @author wdl
 * @version 1.0.0
 * @link https://delinwang.herokuapp.com
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
            'solarized-light' => 'Solarized Light'), 'default', _t('高亮主题:'), _t('选择一个你喜欢的高亮主题。'));
        $form->addInput($theme);
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
        $path = Helper::options()->pluginUrl . '/SyntaxHighlighter/theme/' . $settings->theme . '/';

        echo '<script type="text/javascript" src="' . $path . 'prism.js"></script>' . "\n";
        echo '<link rel="stylesheet" type="text/css" href="' . $path . 'prism.css" />' . "\n";
    }

    /**
     * 输出尾部js
     *
     * @access public
     * @return void
     */
    public static function footer() {

        echo <<<EOF
       <script type="text/javascript">
           if (typeof(Prism) !== undefined) {
               var preList = document.getElementsByTagName('pre');
               var pattern = /lang-(\w+)/;
               for (var i = 0; i < preList.length; i++) {
                   var codeList = preList[i].getElementsByTagName('pre');
                   for (var j = 0; j < codeList.length; j++) {
                       var code = codeList[j];
                       var className = code.className;
                       if (!!className) {
                           var newClassName = className.replace(pattern, "language-$1");
                           code.setAttribute("class", newClassName);
                       }
                   }
               }
           }
       </script>
EOF;
        echo "\n";
    }
}
