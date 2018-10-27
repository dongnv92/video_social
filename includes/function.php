<?php
/**
 * Created by PhpStorm.
 * User: Dong
 * Date: 19/09/2018
 * Time: 20:48
 */
class myFunction{

    function getTruncate($text, $limit, $type = 'words', $ellipsis = ' ...') {
        switch ($type){
            case 'words':
                $words = preg_split("/[\n\r\t ]+/", $text, $limit + 1, PREG_SPLIT_NO_EMPTY|PREG_SPLIT_OFFSET_CAPTURE);
                if (count($words) > $limit) {
                    end($words); //ignore last element since it contains the rest of the string
                    $last_word = prev($words);

                    $text =  substr($text, 0, $last_word[1] + strlen($last_word[0])) . $ellipsis;
                }
                return $text;
                break;
            case 'text':
                if( strlen($text) > $limit ) {
                    $endpos = strpos(str_replace(array("\r\n", "\r", "\n", "\t"), ' ', $text), ' ', $limit);
                    if($endpos !== FALSE)
                        $text = trim(substr($text, 0, $endpos)) . $ellipsis;
                }
                return $text;
                break;
        }

    }

    function getFacebookVideo($url){
        $context = [
            'http' => [
                'method' => 'GET',
                'header' => "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.47 Safari/537.36",
            ],
        ];
        $context    = stream_context_create($context);
        $data       = file_get_contents($url, false, $context);
        preg_match('/hd_src_no_ratelimit:"([^"]+)"/', $data, $video_hd);
        preg_match('/sd_src_no_ratelimit:"([^"]+)"/', $data, $video_sd);
        $images     = explode('/', $url);

        if($video_hd[1]){
            return array('video' => $video_hd[1], 'images' => $images[5]);
        }else if($video_sd[1]){
            return array('video' => $video_sd[1], 'images' => $images[5]);
        }else{
            return false;
        }
    }

    function getGoogleDrive($url){
        if(!filter_var($url, FILTER_VALIDATE_URL)){
            return 'cccc';
        }
        require_once 'class.curl_gd.php';
        $id = get_drive_id($url);
        return GoogleDrive($id);
    }

    function getUrlPost($id){
        global $db;
        $post = $db->select('post_url')->from(_TABLE_POST)->where('post_id', $id)->fetch_first();
        return _URL_HOME.'/'.$post['post_url'].'.html';
    }

    function getPlayerVideo($id, $option = ''){
        $type   = $this->getMediaPostVideoType($id);
        $text   = '<video '. ($type == 'type="video/youtube"' ? 'width="618px"' : 'width="'. ($option['width'] ? $option['width'] : '100%') .'"') .' height="'. ($option['height'] ? $option['height'] : '360px') .'" poster="'. $this->getMediaPost($id, 'images') .'" preload="none" loop controls playsinline>';
        $text  .= '<source src="'. $this->getMediaPost($id, 'video') .'" '. $type .'>';
        $text  .= '</video>';
        return $text;
    }

    function getDetailUser($id, $type){
        global $db;
        $users = $db->from(_TABLE_USERS)->where('users_id', $id)->fetch_first();
        if($users['users_avatar'] == ''){
            $users['users_avatar'] = _URL_HOME.'/media/images/system/avatar.png';
        }
        return $users[$type];
    }

    function getMediaPostVideoType($idpost){
        global $db, $config;
        $db->select('media_source, media_store')->from(_TABLE_MEDIA);
        $db->where('media_type', 'video');
        $db->where('media_parent', $idpost);
        $data = $db->fetch();
        $soft = $config->softStore('video');
        foreach ($soft AS $item_soft){
            foreach ($data AS $item_data){
                if($item_data['media_store'] == $item_soft){
                    if($item_data['media_store'] == 'youtube'){
                        $return = 'type="video/youtube"';
                        $break = true;
                    }else{
                        $return = '';
                        $break = true;
                    }
                }
            }
            if($break){
                break;
            }
        }
        return $return;
    }

    function getMediaPost($id, $type = 'images', $store = ''){
        global $db, $config;
        $db->select('media_source, media_store')->from(_TABLE_MEDIA);
        $db->where('media_type', $type);
        $db->where('media_parent', $id);
        if($store){
            $db->where('media_store', $store);
            $db->order_by('media_id', 'desc');
            $data = $db->fetch_first();
            if(!$data){
                return false;
            }
            if($type == 'images'){
                if($data['media_store'] == 'local'){
                    return _URL_HOME.'/'.$data['media_source'];
                }else{
                    return $data['media_source'];
                }
            }else if($type == 'video'){
                return $data['media_source'];
            }
        }
        if($type == 'images'){
            $db->order_by('media_id', 'desc');
            $data = $db->fetch();
            $soft = $config->softStore('images');
            foreach ($soft AS $item_soft){
                foreach ($data AS $item_data){
                    if($item_data['media_store'] == $item_soft){
                        if($item_data['media_store'] == 'local'){
                            $return = _URL_HOME.'/'.$item_data['media_source'];
                        }else{
                            $return = $item_data['media_source'];
                        }
                    }
                }
                if($return){
                    break;
                }
            }
            return $return;
        }else{
            $db->order_by('media_id', 'desc');
            $data = $db->fetch();
            $soft = $config->softStore('video');
            foreach ($soft AS $item_soft){
                foreach ($data AS $item_data){
                    if($item_data['media_store'] == $item_soft){
                        if($item_data['media_store'] == 'tiktok_china'){
                            $url    = $this->tiktok_get_redirect_final_target('https://api.amemv.com/aweme/v1/play/?video_id='. $item_data['media_source'] .'&line=1&ratio=720p&media_type=4&vr_type=0&test_cdn=None&improve_bitrate=0');
                            $return = _URL_HOME.'/includes/ajax.php?act=downloadmp4&url='.$url;
                        }else if($item_data['media_store'] == 'onedrive'){
                            $return = _URL_HOME.'/includes/ajax.php?act=downloadmp4&url='.$item_data['media_source'];
                        }else if($item_data['media_store'] == 'google_drive'){
                            $url    =  $this->getGoogleDrive($item_data['media_source']);
                            $return = $url['file'];
                        }else if($item_data['media_store'] == 'facebook'){
                            $url    =  $this->getFacebookVideo($item_data['media_source']);
                            $return = $url['video'];
                        }else if($item_data['media_store'] == 'local'){
                            $return = _URL_HOME.'/'.$item_data['media_source'];
                        }else{
                            $return = $item_data['media_source'];
                        }
                    }
                }
                if($return){
                    break;
                }
            }
            return $return;
        }
    }

    function getCurrentDomain(){
        return "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    }

    function redirectUrl($url){
        header('location:'.$url);
    }

    public function urlToDomain($url){
        $host = @parse_url($url, PHP_URL_HOST);
        if (!$host)
            $host = $url;
        if (substr($host, 0, 4) == "www.")
            $host = substr($host, 4);
        if (strlen($host) > 50)
            $host = substr($host, 0, 47) . '...';
        return $host;
    }

    public function randomString($length = 10){
        $random_string = substr(str_shuffle("_0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
        return $random_string;
    }

    public function checkUpload($name_input_file){
        if(!file_exists($_FILES[$name_input_file]['tmp_name']) || !is_uploaded_file($_FILES[$name_input_file]['tmp_name'])) {
            return false;
        }else{
            return true;
        }
    }

    public function getExtentionFile($name_input_file){
        return pathinfo($_FILES[$name_input_file]['name'], PATHINFO_EXTENSION);
    }

    public function getExtentionFileUrl($url){
        return pathinfo($url, PATHINFO_EXTENSION);
    }

    public function makeSlug($text){
        return preg_replace('/[^A-Za-z0-9 -]+/', '-', $this->convertSlug($text));
    }

    private function convertSlug($string, $url = 1) {
        if(!$string) return false;
        $utf8 = array(
            'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ|Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
            'd'=>'đ|Đ',
            'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
            'i'=>'í|ì|ỉ|ĩ|ị|Í|Ì|Ỉ|Ĩ|Ị',
            'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
            'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
            'y'=>'ý|ỳ|ỷ|ỹ|ỵ|Ý|Ỳ|Ỷ|Ỹ|Ỵ',
        );
        foreach($utf8 as $ascii=>$uni) $string = preg_replace("/($uni)/i",$ascii,$string);
        $string = ($url == 1) ? $this->utf8Url($string) : $string;
        return $string;
    }

    private function utf8Url($string){
        $string = strtolower($string);
        $string = str_replace( "ß", "ss", $string);
        $string = str_replace( "%", "", $string);
        $string = preg_replace("/[^_a-zA-Z0-9 -]/", "",$string);
        $string = str_replace(array('%20', ' '), '-', $string);
        $string = str_replace("----","-",$string);
        $string = str_replace("---","-",$string);
        $string = str_replace("--","-",$string);
        return $string;
    }

    function tiktok_get_redirect_final_target($url){
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_NOBODY, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
        curl_exec($ch);
        $target = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
        curl_close($ch);
        if ($target)
            return $target;
        return false;
    }

    private function tiktok_getContent($url){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
        $headers = array();
        $headers[] = "Dnt: 1";
        $headers[] = "Accept-Encoding: gzip, deflate, br";
        $headers[] = "Accept-Language: zh-CN,zh;q=0.9,en-US;q=0.8,en;q=0.7";
        $headers[] = "Upgrade-Insecure-Requests: 1";
        $headers[] = "User-Agent: Mozilla/5.0 (iPhone; CPU iPhone OS 11_0 like Mac OS X) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Mobile/15A372 Safari/604.1";
        $headers[] = "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8";
        $headers[] = "Cache-Control: max-age=0";
        $headers[] = "Authority: www.douyin.com";
        $headers[] = "Cookie: _ba=BA0.2-20180329-5199e-75UkuMgxUNaTYzfSeMOP; tt_webid=6547574875133314573";
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            return false;
        }
        curl_close($ch);
        return $result;
    }

    private function tiktok_getVID($data){
        $re = '/https:\/\/aweme\.snssdk\.com\/aweme\/v1\/playwm\/\?video_id=(.*)&amp;line=0/m';
        $match = [];
        preg_match($re, $data, $match);
        if(empty($match)) {
            return false;
        }
        $vid = $match[1];
        return $vid;
    }

    public function tiktok_getUrlVideoChina($url){
        $data = $this->tiktok_getContent($this->tiktok_get_redirect_final_target($url));
        if(!$data) {
            echo "Không lấy được data";
            return false;
        }

        $vid = $this->tiktok_getVID($data);
        if(!$vid) {
            echo "Không tìm thấy thông tin";
            return false;
        }
        $v_url = "https://api.amemv.com/aweme/v1/play/?video_id=" . $vid . "&line=1&ratio=720p&media_type=4&vr_type=0&test_cdn=None&improve_bitrate=0";
        return $this->tiktok_get_redirect_final_target($v_url);
    }

    function tiktok_getUrlVideoChina_v2($url){
        $html   = file_get_html_curl($this->tiktok_get_redirect_final_target($url));
        $images = $html->find('meta[property=og:image]', 0)->content;
        preg_match('/https:\/\/aweme.snssdk.com\/aweme\/v1\/playwm\/\?video_id=(.*)&line=0/m', $html, $match);
        $v_url = "https://api.amemv.com/aweme/v1/play/?video_id=" . $match[1] . "&line=1&ratio=720p&media_type=4&vr_type=0&test_cdn=None&improve_bitrate=0";
        return array('images' => $images, 'video' => $match[1], 'download' => $this->tiktok_get_redirect_final_target($v_url));
    }

    public function tiktok_getUrlVideoVietNam($url){
        $html = file_get_html_curl($url);
        $html = $html->find('script' , 7);
        preg_match_all('/video_id=(.+?)line=0/' , $html , $math);
        $html = str_replace('\u0026' , '' , $math[1][0]);
        $html = 'https://api.tiktokv.com/aweme/v1/playwm/?video_id='. $html .'&line=0';
        return $this->tiktok_get_redirect_final_target($html);
    }

    public function tiktok_getUrlVideoVietNam_v2($url){
        $url    = $this->tiktok_get_redirect_final_target($url);
        $html   = file_get_html_curl($url);
        $images = $html->find('meta[property=og:image]', 0)->content;
        $html   = $html->find('script' , 7);
        preg_match_all('/video_id=(.+?)line=0/' , $html , $math);
        $html   = str_replace('\u0026' , '' , $math[1][0]);
        $video  = 'https://api.tiktokv.com/aweme/v1/playwm/?video_id='. $html .'&line=0';
        return array('images' => $images, 'video' => $video, 'download' => $this->tiktok_get_redirect_final_target($video));
    }

    /*
     * $config_pagenavi['page_row']    = int; Số bản ghi mỗi trang
     *  $config_pagenavi['page_num']    = ceil(mysqli_num_rows(mysqli_query($db_connect, "SELECT `id` FROM `dong_post`"))/$config_pagenavi['page_row']);
     *  $config_pagenavi['url']         = _URL_ADMIN.'/post.php?act=news';
    */
    function pagination($config){
        $link = '';
        global $page;
        for($i=$page;$i<=($page+4) && $i<= $config['page_num'] ;$i++){
            if($page==$i){$link= '<li class="page-item active"><a href="javascript:;" class="page-link">'.$i.'</a></li>';}
            else{$link = $link.'<li class="page-item"><a href="'. $config['url'] .'page='.$i.'" class="page-link">'.$i.'</a></li>';}
        }
        if($page>4){$page4='<li class="page-item"><a href="'.$config['url'].'page='.($page-4).'" class="page-link">'.($page-4).'</a></li>';}
        if($page>3){$page3='<li class="page-item"><a href="'.$config['url'].'page='.($page-3).'" class="page-link">'.($page-3).'</a></li>';}
        if($page>2){$page2='<li class="page-item"><a href="'.$config['url'].'page='.($page-2).'" class="page-link">'.($page-2).'</a></li>';}
        if($page>1){
            $page1='<li class="page-item"><a href="'.$config['url'].'page='.($page-1).'" class="page-link">'.($page-1).'</a></li>';
            $link1='<li class="page-item" class="page-link" aria-label="Previous"><a href="'.$config['url'].'page='.($page-1).'" class="page-link"><span aria-hidden="true">« Trang sau</span><span class="sr-only">Previous</span></a></li>';
        }
        if($page < $config['page_num']){$link2='<li class="page-item"><a href="'.$config['url'].'page='.($page+1).'" class="page-link" aria-label="Next"><span aria-hidden="true">Trang tiếp »</span><span class="sr-only">Next</span></a></li>';}
        $linked=$page4.$page3.$page2.$page1;
        if($page<$config['page_num']-4){$page_end_pt='<li class="page-item"><a href="'.$config['url'].'page='.$config['page_num'].'" class="page-link">'.$config['page_num'].'</a></li>';}
        if($page>5){$page_start_pt=' <li class="page-item"><a href="'.$config['url'].'" class="page-link">1</a></li>';}
        if($config['page_num']>1 && $page<=$config['page_num']){
            return '<ul class="pagination justify-content-center pagination-separate">'.$link1.$page_start_pt.$linked.$link.$page_end_pt.$link2.'</ul>';
        }else{
            return '';
        }
    }

    function showCategories($categories, $parent_id = 0, $char = '', $display = 'table'){
        foreach ($categories as $key => $item) {
            if ($item['category_parent'] == $parent_id){
                if($display == 'table'){
                    echo '<tr id="tr_'. $item['category_id'] .'"><td width="80%">'. $char . $item['category_name'] .'</td><td class="text-right"><a title="delete" class="btn btn-outline-danger round btn-sm" id="'. $item['category_id'] .'" href="javascript:;">Xóa</a></td></tr>';
                }else if($display == 'select'){
                    echo '<option value="'. $item['category_id'] .'" id="option_'. $item['category_id'] .'">'. $char . $item['category_name'] .'</option>';
                }
                unset($categories[$key]);
                $this->showCategories($categories, $item['category_id'], $char.' |--- ',$display);
            }
        }
    }

    function deleteCategory($id){
        global $db;
        if(!$db->select('category_id')->from(_TABLE_CATEGORY)->where(array('category_id' => $id))->fetch_first()){
            return 404;
        }
        $row_parent = $db->select('category_id')->from(_TABLE_CATEGORY)->where(array('category_parent' => $id))->fetch();
        if($db->affected_rows == 0){
            if($db->delete()->from(_TABLE_CATEGORY)->where('category_id', $id)->limit(1)->execute()){
                return 200;
            }else{
                return 500;
            }
        }else{
            foreach ($row_parent AS $cate_parent){
                $this->deleteCategory($cate_parent['category_id']);
                $db->delete()->from(_TABLE_CATEGORY)->where('category_id', $cate_parent['category_id'])->limit(1)->execute();
            }
            if($db->delete()->from(_TABLE_CATEGORY)->where('category_id', $id)->limit(1)->execute()){
                return 200;
            }else{
                return 500;
            }
        }
    }

    function deletePost($id){
        global $db;
        if(!$db->select('post_id')->from(_TABLE_POST)->where(array('post_id' => $id))->fetch_first()){
            return 404;
        }
        $db->delete()->from(_TABLE_GROUP)->where('group_index', $id)->execute();
        $db->delete()->from(_TABLE_MEDIA)->where('media_parent', $id)->execute();
        $db->delete()->from(_TABLE_POST)->where('post_id', $id)->execute();
    }

    function getDirectOndrive($url){
        if($this->urlToDomain($url) != '1drv.ms'){
            return false;
        }
        $html   = file_get_html($url);
        $url    = $html->find('meta [http-equiv=refresh]', 0)->content;
        $url    = str_replace(array('0;url=', '&#58;','&#63;','&#61;','&#33;','&#38;','&#37;'), array('', ':','?','=','!','&','%') , $url);
        $url    = parse_url($url);
        parse_str($url['query'], $query);
        return 'https://onedrive.live.com/download?cid='. $query['cid'] .'&resid='. $query['id'] .'&authkey='.$query['authkey'];
    }

    function getViewVideoList($type, $option){
        global $db;
        $result = '';
        if($type == 'video'){
            $db->select('post_id')->from(_TABLE_POST);
            $db->where(array('post_type' => 'video', 'post_show' => 1));
            $db->limit($option['limit'], $option['offset']);
            if($option['rand'] == true){
                $db->order_by('rand()');
            }else{
                $db->order_by('post_id', 'DESC');
            }
            foreach ($db->fetch() AS $row){
                $result .= $this->getPostDetailList($row['post_id']);
            }
        }
        return $result;
    }

    function getPostDetailList($id){
        global $db, $user, $config;
        $row = $db->from(_TABLE_POST)->where('post_id', $id)->fetch_first();
        if(!$row){
            return false;
        }
        $text = '
        <div name="ui-block" class="ui-block" id="'. $row['post_id'] .'">
            <article class="hentry post has-post-thumbnail thumb-full-width">
                <div class="post__author author vcard inline-items">
                    <img src="'. $this->getDetailUser($row['post_users'], 'users_avatar') .'" alt="author" />
                    <div class="author-date">
                        <a class="h6 post__author-name fn" href="javascript;:">'. $this->getDetailUser($row['post_users'], 'users_name') .'</a>
                        <div class="post__date"><time class="published"><a href="'. $this->getUrlPost($row['post_id']) .'">'. $config->getTimeView($row['post_time']) .'</a></time></div>
                    </div>
                    '. ($user ? '<div class="more"><svg class="olymp-three-dots-icon">
                    <use xlink:href="'. _URL_STYLE .'/svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
                    <ul class="more-dropdown">
                        <li><a href="'. _URL_ADMIN .'/post.php?act=update&type=video&id='.$row['post_id'] .'">Sửa bài viết</a></li>
                        <li><a href="#">Xóa bài viết</a></li>
                    </ul>
                    </div>' : '')  .'
                </div>
                '. ($row['post_name'] ? '<h5 class="post-title">'.$row['post_name'].'</h5>' : '') .'
                <p>'. $row['post_content'] .'</p>
                <div class="post-thumb">'. $this->getPlayerVideo($row['post_id']) .'</div>
                <div class="post-additional-info inline-items">
                    <a href="#" class="post-add-icon inline-items"><svg class="olymp-heart-icon"><use xlink:href="'. _URL_STYLE .'/svg-icons/sprites/icons.svg#olymp-heart-icon"></use></svg><span>8</span></a>
                </div>
                <div class="control-block-button post-control-button">
                    <a href="#" class="btn btn-control"><svg class="olymp-like-post-icon"><use xlink:href="'. _URL_STYLE .'/svg-icons/sprites/icons.svg#olymp-like-post-icon"></use></svg></a>
                </div>
            </article>
        </div>
        ';
        return $text;
        //<script >$("video").mediaelementplayer();</script>
    }

    function getBlockSideBarVideo($option = ''){
        global $db, $config;
        $text = '';
        $db->select('post_id, post_name, post_time')->from(_TABLE_POST);
        $db->where(array('post_type' => 'video', 'post_show' => 1));
        if($option['limit'] && !$option['offset']){
            $db->limit($option['limit']);
        }else if($option['limit'] && $option['offset']){
            $db->limit($option['limit'], $option['offset']);
        }
        if($option['rand'] == true){
            $db->order_by('rand()');
        }else{
            $db->order_by('post_id', 'DESC');
        }
        $text .= '<div class="ui-block"><div class="ui-block-title"><h6 class="title">Video Ngẫu Nhiên</h6></div><div class="ui-block-content"><ul class="widget w-last-video">';
        foreach ($db->fetch() AS $row){
            $text .= '<li><a href="'. $this->getUrlPost($row['post_id']) .'">'; // '. $this->getUrlPost($row['post_id']) .'
                $text .= '<div class="play-video play-video--small">';
                    $text .= '<svg class="olymp-play-icon">';
                        $text .= '<use xlink:href="'. _URL_STYLE .'/svg-icons/sprites/icons.svg#olymp-play-icon"></use>';
                    $text .= '</svg>';
                $text .= '</div>';
                $text .= '<img src="'. $this->getMediaPost($row['post_id'], 'images') .'" alt="'. $row['post_name'] .'">';
                $text .= '<div class="video-content">';
                    $text .= '<div class="title">'. $row['post_name'] .'</div>';
                    $text .= '<time class="published">'. $config->getTimeView($row['post_time']) .'</time>';
                $text .= '</div>';
                $text .= '<div class="overlay"></div>';
            $text .= '</a></li>';
        }
        $text .= '</ul></div></div>';
        return $text;
    }

    function getBlockSideBarIndex($option = ''){
        $text = '
        <div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">Bản Tin</h6>
				</div>
				<div class="ui-block-content">
					<!-- Widget Featured Topics -->
					<ul class="widget w-featured-topics">
						<li>
							<i class="icon fa fa-star" aria-hidden="true"></i>
							<div class="content"><a href="#" class="h6 title">Tin Mới Nhất</a></div>
						</li>
						<li>
							<i class="icon fa fa-star" aria-hidden="true"></i>
							<div class="content"><a href="#" class="h6 title">Tin Hot</a></div>
						</li>
					</ul>
					<!-- ... end Widget Featured Topics -->
				</div>
			</div>';
        return $text;
    }

    function getBlockSideBarCategory(){
        global $db;
        $cate_text = '';
        $cates = $db->select('category_id, category_name')->from(_TABLE_CATEGORY)->where('category_type', 'video')->fetch();
        foreach ($cates AS $cate){
            $db->select('group_id')->from(_TABLE_GROUP)->where(array('group_type' => 'post', 'group_value' => $cate['category_id']))->execute();
            $num_post = $db->affected_rows;
            $cate_text .= '
            <li data-popup-target=".playlist-popup">
			    <div class="playlist-thumb">
				    <img src="'. _URL_HOME .'/media/images/system/video.png" alt="thumb-composition">
					<a href="#"><svg class="olymp-music-play-icon-big"><use xlink:href="'. _URL_STYLE .'/svg-icons/sprites/icons-music.svg#olymp-music-play-icon-big"></use></svg></a>
				</div>
				<div class="composition"><a href="#" class="composition-name">'. $cate['category_name'] .'</a></div>
				<div class="composition-time"><time class="published">'. $num_post .'</time></div>
			</li>';
        }
        $text = '
        <div class="ui-block">
		    <div class="ui-block-title"><h6 class="title">Xu Hướng Video</h6></div>
			<!-- W-Playlist -->
			<ol class="widget w-playlist">'. $cate_text .'</ol>
			<!-- .. end W-Playlist -->
		</div>';
        return $text;
    }

    function getBlockAbout(){
        $text = '
        <!-- Widget About -->
		<div class="ui-block">		
            <div class="ui-block-title"><h6 class="title">Giới Thiệu</h6></div>
			<div class="ui-block-content">
                <div class="widget w-about">
                    <p>Tổng hợp các Video mới, và hay nhất cho giới trẻ</p>
                    <ul class="socials">
                        <li><a href="#"><i class="fab fa-facebook-square" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fab fa-youtube" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fab fa-google-plus-g" aria-hidden="true"></i></a></li>
                        <li><a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
		<!-- ... end Widget About -->';
        return $text;
    }

    function getPlayerHtml5($id, $option = ''){
        $type       = $this->getMediaPostVideoType($id);
        $width      = ($type == 'type="video/youtube"' ? '618px' : ($option['width']  ? $option['width'] : '100%'));
        $height     = $option['height'] ? $option['height'] : '360px';
        $poster     = $this->getMediaPost($id, 'images');
        $loop       = $option['loop'];
        $src        = $this->getMediaPost($id, 'video');
        $autoplay   = $option['autoplay'];
        switch ($type){
            case 'type="video/youtube"':
                $video = '
                <div id="mejs_04257596522599383-iframe-overlay" class="mejs__iframe-overlay"></div>
                <iframe id="mejs_04257596522599383_youtube_iframe" frameborder="0" allowfullscreen="1" allow="autoplay; encrypted-media" title="YouTube video player" width="'. $width .'" height="'. $height .'" src="'. $src .'?controls=0&amp;rel=0&amp;disablekb=1&amp;showinfo=0&amp;modestbranding=0&amp;html5=1&amp;iv_load_policy=3&amp;autoplay=0&amp;end=0&amp;loop=1&amp;playsinline=1&amp;start=0&amp;nocookie=false&amp;playlist=8zMHE80ql-M&amp;enablejsapi=1&amp;origin=http%3A%2F%2Flocalhost&amp;widgetid=1"></iframe>
                ';
                break;
            default:
                $video = '
                <video 
                '. ($autoplay ? ' autoplay ' : '') .' 
                width="'. $width .'" 
                height="'. $height .'" 
                '. ($poster ? 'poster="'. $poster .'"' : '') .' 
                preload="none" 
                '. ($loop ? 'loop=""' : '') .' 
                playsinline="" 
                id="mejs_3214822735395_html5" 
                src="'. $src .'">
                <source src="'. $src .'">
                </video>';
                break;
        }
        $text = '
        <div id="mep_0" class="mejs__container mejs__video mejs__container-keyboard-inactive" tabindex="0" role="application" aria-label="Video Player" style="width: '. $width .'; height: '. $height .'; min-width: 217px;">
            <div class="mejs__inner">
                <div class="mejs__mediaelement">
                    <mediaelementwrapper id="mejs_3214822735395">'. $video .'</mediaelementwrapper>
                </div>
                <div class="mejs__layers">
                    <div class="mejs__poster mejs__layer" style="background-image: url(&quot;'. $poster .'&quot;); width: '. $width .'; height: '. $height .'; display: none;">
                        <img class="mejs__poster-img" width="0" height="0" src="'. $poster .'">
                    </div>
                    <div class="mejs__overlay mejs__layer" style="width: '.$width.'; height: '.$height.'; display: none;">
                        <div class="mejs__overlay-loading"><span class="mejs__overlay-loading-bg-img"></span></div>
                    </div>
                    <div class="mejs__overlay mejs__layer" style="display: none; width: '.$width.'; height: '. $height .';">
                        <div class="mejs__overlay-error"></div>
                    </div>
                    <div class="mejs__overlay mejs__layer mejs__overlay-play" style="width: '.$width.'; height: '.$height.'; display: none;">
                        <div class="mejs__overlay-button" role="button" tabindex="0" aria-label="Play" aria-pressed="true"></div>
                    </div>
                </div>
                <div class="mejs__controls mejs__offscreen" style="opacity: 0;">
                    <div class="mejs__button mejs__playpause-button mejs__pause"><button type="button" aria-controls="mep_0" title="Pause" aria-label="Pause" tabindex="0"></button></div>
                    <div class="mejs__time mejs__currenttime-container" role="timer" aria-live="off"><span class="mejs__currenttime">00:00</span></div>
                    <div class="mejs__time-rail">
                        <span class="mejs__time-total mejs__time-slider" role="slider" tabindex="0">
                            <span class="mejs__time-buffering" style="display: none;"></span>
                            <span class="mejs__time-loaded" style="transform: scaleX(1);"></span>
                            <span class="mejs__time-current" style="transform: scaleX(0.51);"></span>
                            <span class="mejs__time-hovered no-hover"></span>
                            <span class="mejs__time-handle" style="transform: translateX(51px);"><span class="mejs__time-handle-content"></span></span>
                            <span class="mejs__time-float">
                                <span class="mejs__time-float-current">00:00</span>
                                <span class="mejs__time-float-corner"></span>
                            </span>
                        </span>
                    </div>
                    <div class="mejs__button mejs__volume-button mejs__mute">
                        <button type="button" aria-controls="mep_0" title="Mute" aria-label="Mute" tabindex="0"></button>
                        <a href="javascript:void(0);" class="mejs__volume-slider" aria-label="Volume Slider" aria-valuemin="0" aria-valuemax="100" role="slider" aria-orientation="vertical" aria-valuenow="80" aria-valuetext="80%">
                            <span class="mejs__offscreen">Use Up/Down Arrow keys to increase or decrease volume.</span>
                            <div class="mejs__volume-total">
                                <div class="mejs__volume-current" style="bottom: 0px; height: 80%;"></div>
                                <div class="mejs__volume-handle" style="bottom: 80%; margin-bottom: -3px;"></div>
                            </div>
                        </a>
                    </div>
                    <div class="mejs__button mejs__fullscreen-button"><button type="button" aria-controls="mep_0" title="Fullscreen" aria-label="Fullscreen" tabindex="0"></button></div>
                </div>
            </div>
        </div>';
        return $text;
    }
}