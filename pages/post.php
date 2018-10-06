<?php
/**
 * Created by PhpStorm.
 * User: DONG
 * Date: 25/09/2018
 * Time: 11:25
 */
require_once '../includes/core.php';
$post       = $db->from(_TABLE_POST)->where('post_url' , $url)->fetch_first();
$users_post = $db->from(_TABLE_USERS)->where('users_id' , $post['post_users'])->fetch_first();
$header['title'] = $post['post_name'];
require_once 'header.php';
switch ($post['post_type']){
    case 'video':
        ?>
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = 'https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.1&appId=727590360722146&autoLogAppEvents=1';
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>
        <div class="container">
            <div class="row">
                <!-- Main Content -->
                <main class="col col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
                    <div id="newsfeed-items-grid">
                        <div class="ui-block">
                            <article class="hentry post has-post-thumbnail thumb-full-width">
                                <div class="post__author author vcard inline-items">
                                    <img src="<?php echo $funcion->getDetailUser($post['post_users'], 'users_avatar');?>" alt="author">
                                    <div class="author-date">
                                        <a class="h6 post__author-name fn" href="javascript;:"><?php echo $funcion->getDetailUser($post['post_users'], 'users_name');?></a>
                                        <div class="post__date"><time class="published"><?php echo $config->getTimeView($post['post_time']);?></time></div>
                                    </div>
                                    <?php if($user){?>
                                        <div class="more">
                                            <svg class="olymp-three-dots-icon"><use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
                                            <ul class="more-dropdown">
                                                <li><a href="<?php echo _URL_ADMIN.'/post.php?act=update&type=video&id='.$post['post_id']?>">Sửa bài viết</a></li>
                                                <li><a href="#">Xóa bài viết</a></li>
                                            </ul>
                                        </div>
                                    <?php }?>
                                </div>
                                <h5 class="post-title"><?php echo $post['post_name'];?></h5>
                                <p><?php echo $post['post_content'];?></p>
                                <div class="post-thumb"><?php echo $funcion->getPlayerVideo($post['post_id']);?></div>
                                <div class="control-block-button post-control-button">
                                    <a href="#" class="btn btn-control"><svg class="olymp-like-post-icon"><use xlink:href="<?php echo _URL_STYLE;?>/svg-icons/sprites/icons.svg#olymp-like-post-icon"></use></svg></a>
                                </div>
                            </article>
                            <div class="fb-comments" width="100%" data-href="<?php echo $funcion->getCurrentDomain();?>" data-numposts="15"></div>
                        </div>

                    </div>
                </main>
                <!-- ... end Main Content -->
                <!-- Left Sidebar -->
                <aside class="col col-xl-3 order-xl-1 col-lg-6 order-lg-2 col-md-6 col-sm-12 col-12">
                <?php
                    echo $funcion->getBlockSideBarIndex();
                    echo $funcion->getBlockSideBarCategory();
                    echo $funcion->getBlockAbout();
                ?>
                </aside>
                <!-- ... end Left Sidebar -->
                <!-- Right Sidebar -->
                <aside class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-12 col-12">
                    <?php echo $funcion->getBlockSideBarVideo(array('limit' => 5, 'rand' => true));?>
                </aside>
                <!-- ... end Right Sidebar -->
            </div>
        </div>
        <?php
        break;
}
require_once 'footer.php';