<?php
/**
 * Created by PhpStorm.
 * User: DONG
 * Date: 18/09/2018
 * Time: 10:22
 */

class chatfuel{

    function sendText($text){
        return json_encode(array('messages' => array(array('text' => $text))));
    }

    function sendImages($url){
        return json_encode(array('messages' => array(array('attachment' => array('type' => 'image', 'payload' => array('url' => $url))))));
    }

    function sendVideo($url){
        return json_encode(array('messages' => array(array('attachment' => array('type' => 'video', 'payload' => array('url' => $url))))));
    }

    function sendAudio($url){
        return json_encode(array('messages' => array(array('attachment' => array('type' => 'audio', 'payload' => array('url' => $url))))));
    }

    function sendFile($url){
        return json_encode(array('messages' => array(array('attachment' => array('type' => 'file', 'payload' => array('url' => $url))))));
    }

    /*
     * List
     * title        :  Title
     * subtitle     : Sub Title
     * image_url    : Url Images
     * buttons      :   array(
     *                      array('type'  => 'web_url','url'   => 'http://google.com','title' => 'Mua Hàng'))
     *                      array('set_attributes'=> array('product' => 'AO05'),'type'=> 'show_block','block_name' => 'Test Info','title'         => 'Xem Chi Tiết')
     *                  )
     *
     * */
    function sendGalleries($list){
        return json_encode(
            array('messages' => array(
                array('attachment' =>
                    array('type' => 'template', 'payload' =>
                        array('template_type' => 'generic', 'image_aspect_ratio' => 'square', 'elements' => $list)
                    )
                )
            )
            )
        );
    }
}



