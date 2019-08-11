<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>
<html class="no-js">
<head>
    <meta charset="<?php $this->options->charset(); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?> - Jieck Loo's Blog</title>

    <!-- 使用url函数转换相关路径 -->
    <link rel="stylesheet" href="//cdnjscn.b0.upaiyun.com/libs/normalize/2.1.3/normalize.min.css">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('grid.css'); ?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('style.css'); ?>">

    <!--[if lt IE 9]>
    <script src="//cdnjscn.b0.upaiyun.com/libs/html5shiv/r29/html5.min.js"></script>
    <script src="//cdnjscn.b0.upaiyun.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <!-- 通过自有函数输出HTML头部信息 -->
    <?php $this->header(); ?>
</head>
<body>
<!--[if lt IE 8]>
    <div class="browsehappy" role="dialog"><?php _e('当前网页 <strong>不支持</strong> 你正在使用的浏览器. 为了正常的访问, 请 <a href="http://browsehappy.com/">升级你的浏览器</a>'); ?>.</div>
<![endif]-->

<header id="header" class="clearfix">
    <div class="container">
        <div class="row">
            <div class="site-name col-mb-12 col-9">
            <?php if ($this->options->logoUrl): ?>
                <div id="logo-out">
                <a id="logo" style="font-size:0;" href="<?php $this->options->siteUrl(); ?>">
                    <img src="<?php $this->options->logoUrl() ?>" alt="<?php $this->options->title() ?>" />
                </a>
                </div>
                <div id="logo-title">
                    <a id="logo" href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title() ?></a>
        	        <p class="description">
                    <?php $description = explode("\n",$this->options->description);_e($description[rand(0,count($description)-1)]); ?>
                    <?php /*$this->options->description()*/ ?>
                    </p>
                </div>
                
                <script>
                    document.getElementById('logo').getElementsByTagName('img')[0].style.height = document.getElementById('logo-title').clientHeight + 'px';
                </script>
            <?php else: ?>
                <a id="logo" href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title() ?></a>
        	    <p class="description">
                <?php $description = explode("\n",$this->options->description);_e($description[rand(0,count($description)-1)]); ?>
                <?php /*$this->options->description()*/ ?>
                </p>
            <?php endif; ?>
            </div>
            <div class="site-search col-3 kit-hidden-tb">
                <form id="search" method="post" action="<?php $this->options->siteUrl(); ?>" role="search">
                    <label for="s" class="sr-only"><?php _e('搜索关键字'); ?></label>
                    <input type="text" id="s" name="s" class="text" placeholder="<?php _e('输入关键字搜索'); ?>" />
                    <button type="submit" class="submit"><?php _e('搜索'); ?></button>
                </form>
            </div>
            <div class="col-mb-12">
                <nav id="nav-menu" class="clearfix" role="navigation">
                    <a<?php if($this->is('index')): ?> class="current" name="here"<?php endif; ?> href="<?php $this->options->siteUrl(); ?>"><?php _e('首页'); ?></a>
                    <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
                    <?php while($pages->next()): ?>
                    <a<?php if($this->is('page', $pages->slug)): ?> class="current" name="here"<?php endif; ?> href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a>
                    <?php endwhile; ?>
                </nav>
            </div>

        </div><!-- end .row -->
    </div>
    <?php if($this->is('index')): ?>
    <?php else: ?>
    <div id="css_output">
        <?php if($this->fields->image_center==1): ?>
            <style>
                .post-content img {display: block;margin: 0 auto;}
            </style>
        <?php endif; ?>
        <style>
            @media(max-width:768px) {#header {padding-top: 9px;}#logo-out {float:left;}#logo-title {margin-top: 0px;float: left;margin-left: 16px;}#logo {font-size: 2.2em;}.description {text-align:left;}}
        </style>
    </div>
    <?php endif; ?>

    
    <script>
        window.onload=function(){
            <?php if($this->is('index')): ?>
            <?php else: ?>
                <?php if($this->fields->link_blank==1): ?>
                    var link_number = document.getElementsByClassName('post-content')[0].getElementsByTagName('a').length;
                    for(var i = 0; i < link_number; i++){
                        document.getElementsByClassName('post-content')[0].getElementsByTagName('a')[i].setAttribute('target', '_blank')
                    };
                <?php endif; ?>
            <?php endif; ?>
            var X = document.getElementsByName("here")[0].offsetLeft;
            document.getElementById("nav-menu").scrollTo({left:X-50,behavior:"smooth" });
        }
    </script>
</header><!-- end #header -->
<div id="body">
    <div class="container">
        <div class="row">

    
    
