<?php
return array(
    'site_home' => '首页',
    'nav_topic' => '主题',
    'nav_contribute' => '投稿',
    'guest_name' => '匿名人士',
    'post_is_not_found' => '此文章不存在',
    'topic_is_not_found' => '主题不存在',
    'category_is_not_found' => '分类不存在',
    'cateogry_has_posts' => '该分类下有文章存在，不能直接删除',
    'topic_has_posts' => '该主题下有文章存在，不能直接删除',
    'click_switch_page' => '点击切换',
        

    'friend_links' => '友情链接',
    'no_friend_links' => '暂无友情链接',

    /*
     * comment
     */
    'post_comment' => '发表评论',
    'view_detail' => '阅读全文',
    'post_toolbar_text' => '已有{comment_nums}个评论&nbsp;&nbsp;|&nbsp;&nbsp;{score_nums}次评分&nbsp;&nbsp;|&nbsp;&nbsp;{visit}次阅读&nbsp;&nbsp;|&nbsp;&nbsp;{digg}次推荐',
    'post_author_time' => '{author}&nbsp;发表于&nbsp;{time}',
    'post_show_extra' => '{author}&nbsp;发表于&nbsp;{time}&nbsp;|&nbsp;{visit}次阅读&nbsp;{digg}次推荐',
    'comment_list' => '评论列表',
    'hot_comment_list' => '热门评论',
    'have_no_comments' => '当前暂无评论',
    'comment_extra' => '第&nbsp;<b class="comment-index">{floor}</b>&nbsp;楼&nbsp;{author}&nbsp;发表于&nbsp;{time}',
    'reply_comment' => '回复',
    'support_comment' => '支持(<span class="beta-comment-join-nums">{n}</span>)',
    'against_comment' => '反对(<span class="beta-comment-join-nums">{n}</span>)',
    'report_comment' => '举报',
    'comment_quote_title' => '引用%s的评论:',
        
    'comment_top_posts' => '最具争议排行',
    'visit_top_posts' => '最具人气排行',
    'hottest_posts' => '热门排行',
    'latest_posts' => '最新发布',
    'relate_posts' => '相关文章',
    'no_posts' => '暂无文章',
    'recommend_posts' => '编辑推荐',
    'recommend_comments' => '网友精彩点评',
        
    'source_label' => '来源:&nbsp;',
    'tag_label' => '标签:',
    'prev_page_label' => '上一页',
    'next_page_label' => '下一页',
    'this_post_is_disable_comment' => '当前文章已经关闭评论',
        
    /*
     * layout
     */
    'return_top' => '返回顶部 ^',
    'return_site_home' => '返回网站首页',

    /*
     * post show
     */
    'thanks_contribute' => '感谢{contributor}的投递',
    'like_post' => '喜欢 + ',
    'favorite_post' => '收藏 + ',

    /*
     * comment create form
     */
    'your_name' => '大名',
    'your_site' => '网站',
    'your_email' => '邮箱',
    'comment_content' => '内容',
    'submit' => '递交',
    'reset' => '重填',
    'close' => '关闭',

    'ajax_send' => '发送数据中...',
    'ajax_fail' => '请求错误.',

    'comment_content_min_length' => '评论内容不能少于{minlength}个字哦～～～',
    'ajax_comment_rules_invalid' => '请输入评论内容和验证码后再发布',
    'ajax_comment_done' => '评论成功.',
    'ajax_comment_error' => '评论失败, %s不正确',

    'thank_your_join' => '感谢您的参与',
    'you_have_joined' => '您已经参与过了，谢谢',
    'operation_error' => '发生系统错误',

    /*
     * post create
     */
    'contribute_post' => '投递文章',
    'contribute_post_success' => '感谢您的投递！',
    'you_do_not_have_enough_permissions' => '您没有上传文件的权限',
    'post_upload_temp_pictures' => '刚刚上传的图片',
    'continue_contribute' => '再投递一篇',
    'view_contribute_post' => '查看刚才投递的文章',

    /* topic */
    'all_topic_list' => '所有主题列表',
    'topic_posts' => '专题：{name}',
    'topic_posts_page_description' => '与{name}专题相关的文章',

    /* category */
    'category_posts' => '分类：{name}',
    'category_posts_page_description' => '与{name}分类相关的文章',

    /* tag */
    'tag_posts' => '标签：{name}',
    'tag_posts_page_description' => '与{name}标签相关的文章',
        
    /* BetaHottestPosts */
    'special_token_is_null' => 'token不能为空',

    /* feed */
    'category_feed' => ' 分类目录Feed',
    'topic_feed' => ' 主题目录Feed',

    /* topic/list */
    'all_topics_description' => '所有主题列表',
        
    /* site */
    'site_announce' => '除非特别注明，本站所有文章均不代表本站观点。报道中出现的商标属于其合法持有人。交流时请遵守理性，宽容，换位思考的原则。',
    'site_content_share_announce' => '除非特别声明，本站所有内容遵守<a href="http://creativecommons.org/licenses/by-nc-sa/2.5/" target="_blank">CC Creative Commons License.</a>',
        

    /* site/login */
    'site_login' => '用户登录',
    'site_signup' => '用户注册',
    'welcome_signup' => '欢迎加入' . app()->name,
    'autologin' => '下次自动登录&nbsp;|&nbsp;' . l('忘记密码了', url('site/resetpwd')),
    'user_login' => '登录',
    'user_signup' => '注册',
    'username_tip' => '第一印象很重要，起个响亮的名号吧',
    'quick_login_link' => '&gt;&nbsp;已经拥有{sitename}帐号?&nbsp;<a href="{loginurl}">直接登录</a>',
    'quick_signup_link' => '&gt;&nbsp;还没有{sitename}帐号?&nbsp;<a href="{signupurl}">立即注册</a>',
    'user_logout' => '退出',
    'management' => '管理',
    'agreement' => '我已经认真阅读并同意《使用协议》。',
        
    /* error page */
    'site_page_error_tip' => '<h2>该页无法显示</h2><p>出现这个问题，也许是因为您访问了不正确的链接地址，但更可能是由于我们对程序做出了更新，没有即时通知您所造成的。</p>',
);



