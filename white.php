<?php

/**

 * 空白模板

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
        ), '', ' - '); ?>Jieck Loo</title>

<div id="css_output">
        <?php if($this->fields->image_center==1): ?>
            <style>
                .post-content img {display: block;margin: 0 auto;}
            </style>
        <?php endif; ?>
    </div>

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
    }
    </script>
</head>

<body>
    <div class="col-mb-12 col-8" id="main" role="main">
        <article class="post" itemscope itemtype="http://schema.org/BlogPosting">
            <h1 class="post-title" itemprop="name headline"><?php $this->title() ?></h1>
            <div class="post-content" itemprop="articleBody"> <?php $this->content(); ?> </div>
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
            width: 1200px;
            margin: 0 auto;
            background: #FFF;
            padding: 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.18);
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
            /*text-indent: 2em;*/
        }

        #footer {
            text-align: center;
            margin: 20px 0;
        }

        a {
            color: #3354AA;
            text-decoration: none;
        }

        a:hover,
        a:active {
            color: #444;
        }

        @media(max-width:1270px) {
            .post {
                width: calc(100% - 10px);
                margin: 0 auto;
                background: #FFF;
                padding: 20px;
                box-sizing: border-box;
            }

            #main {
                padding: 4px;
            }
        }
    </style>

        </div><!-- end .row -->
    </div>
</div><!-- end #body -->

<footer id="footer" role="contentinfo">
    &copy; <?php echo date('Y'); ?> Jieck Loo.
</footer><!-- end #footer -->

<?php $this->footer(); ?>
</body>
</html>
