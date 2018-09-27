<?php
/**
 * Created by PhpStorm.
 * User: Dong
 * Date: 19/09/2018
 * Time: 20:48
 */

class myFunction
{

    function getUrlPost($id){
        global $db;
        $post = $db->select('post_url')->from(_TABLE_POST)->where('post_id', $id)->fetch_first();
        return _URL_HOME.'/'.$post['post_url'].'.html';
    }

    function getPlayerVideo($id){
        return '<video autoplay style="max-height: 450px" poster="'. $this->getMediaPost($id, 'images') .'" id="player" playsinline controls><source src="'. $this->getMediaPost($id, 'video') .'" type="video/mp4"></video>';
    }

    function getDetailUser($id, $type){
        global $db;
        $users = $db->from(_TABLE_USERS)->where('users_id', $id)->fetch_first();
        if($users['users_avatar'] == ''){
            $users['users_avatar'] = _URL_HOME.'/media/images/system/avatar.png';
        }
        return $users[$type];
    }

    function getMediaPost($id, $type = 'images'){
        global $db;
        $images = $db->select('media_source, media_store')->from(_TABLE_MEDIA)->where(array('media_type' => $type, 'media_parent' => $id))->fetch_first();
        if(!$images){
            return false;
        }
        if($images['media_store'] == 'local'){
            return _URL_HOME.'/'.$images['media_source'];
        }else{
            return $images['media_source'];
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

    private function tiktok_get_redirect_final_target($url){
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
        $data = $this->tiktok_getContent($url);
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

    public function tiktok_getUrlVideoVietNam($url){
        $html = file_get_html($url);
        $html = $html->find('script' , 7);
        preg_match_all('/video_id=(.+?)line=0/' , $html , $math);
        $html = str_replace('\u0026' , '' , $math[1][0]);
        $html = 'https://api.tiktokv.com/aweme/v1/playwm/?video_id='. $html .'&line=0';
        return $this->tiktok_get_redirect_final_target($html);
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

    function getViewVideoGrid($type, $option){
        global $db, $config;
        if($type == 'video'){
            $db->select()->from(_TABLE_POST);
            $db->where(array('post_type' => 'video', 'post_show' => 1));
            $db->limit($option['limit'], $option['offset']);
            if($option['rand'] == true){
                $db->order_by('rand()');
            }else{
                $db->order_by('post_id', 'DESC');
            }
            foreach ($db->fetch() AS $row){
                $url_post = $this->getUrlPost($row['post_id']);
                ?>
                <div class="card bg-instant text-white">
                    <img class="card-img" src="<?php echo $this->getMediaPost($row['post_id']);?>">
                    <div class="card-img-overlay bg-over">
                        <a class="link-over" href="<?php echo $url_post;?>"></a>
                        <div class="card-like">
                            <div class="card-count"><i class="icon-eye icons text-muted"></i> 0</div>
                        </div>
                        <a href="<?php echo $url_post;?>" class="playericon nocolor" data-toggle="tooltip" data-placement="bottom" title="Video">
                            <i class="icon-social-youtube icons text-muted"></i>
                        </a>
                        <a class="author" href="<?php echo $url_post;?>"><span class="align-middle"><?php echo $row['post_name'];?></span></a>
                    </div>
                </div>
                <?php
            }
        }
    }
}

