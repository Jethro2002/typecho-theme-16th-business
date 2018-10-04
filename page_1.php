<?php
/**
 * 简约书信（不支持评论）
 *
 * @package custom
 */
 ?>
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
        ), '', ' - '); ?><?php $this->options->title(); ?></title>
</head>
<body>

<div class="col-mb-12 col-8" id="main" role="main">
    <article class="post" itemscope itemtype="http://schema.org/BlogPosting">
        <h1 class="post-title" itemprop="name headline"><?php $this->title() ?></h1>
        <div class="post-content" itemprop="articleBody">
            <?php $this->content(); ?>
        </div>
    </article>
</div><!-- end #main-->
<style>

body {
    background: #f7f7f7;
    margin: 0;
    font-family: "Droid Serif", Georgia, "Times New Roman", "PingFang SC", "Hiragino Sans GB", "Source Han Sans CN", "WenQuanYi Micro Hei", "Microsoft Yahei", serif;
    font-size: 87.5%;
}

#main {
    padding: 20px 0 0 0;
}


.post {
    width: 800px;
    margin: 0 auto;
    background: #FFF;
    padding: 20px;
    border: 3px solid;
}

.post-title {
    text-align: center;
    margin-top: 0;
}

.post-content {
    font-size: 16px;
    line-height: 1.9;
    word-wrap: break-word;
}

.post-content p {
    text-indent: 2em;
}

#footer {
    text-align: center;
    margin: 20px 0;
}

a {
    color: #3354AA;
    text-decoration: none;
}

a:hover, a:active {
    color: #444;
}

@media(max-width:767px) {
    .post {
        width: 100%;
        margin: 0 auto;
        background: #FFF;
        padding: 20px;
        border: 3px solid;
        box-sizing: border-box;
    }

    
    #main {
        padding: 4px;
    }


}

</style>
<?php $this->need('footer.php'); ?>