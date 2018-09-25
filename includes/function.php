<?php
/**
 * Created by PhpStorm.
 * User: Dong
 * Date: 19/09/2018
 * Time: 20:48
 */

class myFunction
{
    function getPlayerVideo($id){
        return '<video style="max-height: 450px" poster="'. $this->getMediaPost($id, 'images') .'" id="player" playsinline controls><source src="'. $this->getMediaPost($id, 'video') .'" type="video/mp4"></video>';
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
}

