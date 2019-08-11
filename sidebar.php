<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<?php if($this->is('post')): ?>
    <?php if (isset($_COOKIE["expand"])): ?>
        <?php if($_COOKIE["expand"]=="true"): ?>
            <script>document.getElementById("expand_close").style.display="block";</script>
            <style>#main{width:100%;}.post-title,.post-meta{text-align:center;}</style>
            <div class="col-mb-12 col-offset-1 col-3 kit-hidden-tb" id="secondary" style="display:none;" role="complementary">
        <?php else: ?>
            <div class="col-mb-12 col-offset-1 col-3 kit-hidden-tb" id="secondary" role="complementary">
        <?php endif; ?>
    <?php else: ?>
            <div class="col-mb-12 col-offset-1 col-3 kit-hidden-tb" id="secondary" role="complementary">
    <?php endif; ?>
    
    <section style="text-align:center;font-size:18px;padding:10px 0;cursor: pointer;" onclick="expand();" class="widget">
        隐藏侧边栏
    </section>
<?php else: ?>
<div class="col-mb-12 col-offset-1 col-3 kit-hidden-tb" id="secondary" role="complementary">
<?php endif; ?>


    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowCategory', $this->options->sidebarBlock)): ?>
    <section class="widget">
		<h3 class="widget-title"><?php _e('分类'); ?></h3>
        <?php $this->widget('Widget_Metas_Category_List')->listCategories('wrapClass=widget-list'); ?>
	</section>
    <?php endif; ?>


    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentPosts', $this->options->sidebarBlock)): ?>
    <section class="widget">
		<h3 class="widget-title"><?php _e('最新文章'); ?></h3>
        <ul class="widget-list">
            <?php $this->widget('Widget_Contents_Post_Recent')
            ->parse('<li><a href="{permalink}">{title}</a></li>'); ?>
        </ul>
    </section>
    <?php endif; ?>

    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowRecentComments', $this->options->sidebarBlock)): ?>
    <section class="widget">
		<h3 class="widget-title"><?php _e('最近回复'); ?></h3>
        <ul class="widget-list">
        <?php $this->widget('Widget_Comments_Recent')->to($comments); ?>
        <?php while($comments->next()): ?>
            <li><a href="<?php $comments->permalink(); ?>"><?php $comments->author(false); ?></a>: <?php $comments->excerpt(35, '...'); ?></li>
        <?php endwhile; ?>
        </ul>
    </section>
    <?php endif; ?>


    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowArchive', $this->options->sidebarBlock)): ?>
    <section class="widget">
		<h3 class="widget-title"><?php _e('归档'); ?></h3>
        <ul class="widget-list">
            <?php $this->widget('Widget_Contents_Post_Date', 'type=month&format=F Y')
            ->parse('<li><a href="{permalink}">{date}</a></li>'); ?>
        </ul>
	</section>
    <?php endif; ?>

    <?php if (!empty($this->options->sidebarBlock) && in_array('ShowOther', $this->options->sidebarBlock)): ?>
	<section class="widget">
		<h3 class="widget-title"><?php _e('其它'); ?></h3>
        <ul class="widget-list">
            <?php if($this->user->hasLogin()): ?>
				<li class="last"><a href="<?php $this->options->adminUrl(); ?>"><?php _e('进入后台'); ?> (<?php $this->user->screenName(); ?>)</a></li>
                <li><a href="<?php $this->options->logoutUrl(); ?>"><?php _e('退出'); ?></a></li>
            <?php else: ?>
                <li class="last"><a href="<?php $this->options->adminUrl('login.php'); ?>"><?php _e('登录'); ?></a></li>
            <?php endif; ?>
            <li><a href="<?php $this->options->feedUrl(); ?>"><?php _e('文章 RSS'); ?></a></li>
            <li><a href="<?php $this->options->commentsFeedUrl(); ?>"><?php _e('评论 RSS'); ?></a></li>
            <li><a href="http://www.typecho.org">Typecho</a></li>
        </ul>
	</section>
    <?php endif; ?>

</div><!-- end #sidebar -->





<script>
    function expand()
    {
        var expand=getCookie('expand');
        if (expand!=null && expand!="")
        {
            setCookie('expand','',7);
            location.reload();
        }else {
            document.getElementById("secondary").style.display="none";
            document.getElementById("main").style.width="100%";
            document.getElementsByClassName("post-title")[0].style.textAlign="center";
            document.getElementsByClassName("post-meta")[0].style.textAlign="center";
            document.getElementById("expand_close").style.display="block";
            setCookie('expand','true',7);
        }
    }


    //JS原生cookie通用代码

    function getCookie(c_name)
    {
    if (document.cookie.length>0)
    {
    c_start=document.cookie.indexOf(c_name + "=")
    if (c_start!=-1)
        { 
        c_start=c_start + c_name.length+1 
        c_end=document.cookie.indexOf(";",c_start)
        if (c_end==-1) c_end=document.cookie.length
        return unescape(document.cookie.substring(c_start,c_end))
        } 
    }
    return ""
    }

    function setCookie(c_name,value,expiredays)
    {
    var exdate=new Date()
    exdate.setDate(exdate.getDate()+expiredays)
    document.cookie=c_name+ "=" +escape(value)+
    ((expiredays==null) ? "" : ";expires="+exdate.toGMTString()+"; path=/")
    }
</script>
