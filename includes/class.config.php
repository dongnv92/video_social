<?php
/**
 * Created by PhpStorm.
 * User: DONG
 * Date: 20/09/2018
 * Time: 15:25
 */

class config
{
    function softStore($type = 'video'){
        if($type == 'video'){
            $array = array();
            $array[] = 'local';
            $array[] = 'google_drive';
            $array[] = 'onedrive';
            $array[] = 'tiktok_china';
            $array[] = 'tiktok_vietnam';
            $array[] = 'youtube';
            $array[] = 'facebook';
            return $array;
        }else{
            return array('local', 'remote');
        }
    }

    function store_suport(){
        return array('1drv.ms', 'youtube.com', 'facebook.com','drive.google.com');
    }

    function getTimeView($time){
        return date('H:m:i d/m/Y', $time);
    }

    function getTimeNow(){
        return time();
    }

    function form_style($type){
        switch ($type){
            case 'text_input':
                return 'form-control round border-primary';
                break;
            case 'button':
                return 'btn btn-outline-blue round';
                break;
        }
    }

    function form_input($type, $option = array('name' => 'submit')){
        switch ($type){
            case 'submit':
                return '<input type="submit" name="'. $option['name'] .'" value="'. $option['value'] .'" class="'. $this->form_style('button') .'">';
                break;
        }
    }

    function getAlert($type = 'success', $content){
        switch ($type){
            case 'success':
                return '<div class="alert round bg-success alert-icon-left alert-dismissible mb-2" role="alert"><span class="alert-icon"><i class="la la-thumbs-o-up"></i></span><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'. $content .'</div>';
                break;
            case 'help_error':
                return '<p class="text-left"><small class="text-muted text-danger">'. $content .'</small></p>';
                break;
        }
    }

    function getPanelError($option = ''){
        $text = '<div class="content-body">
            <section class="flexbox-container">
                <div class="col-12 d-flex align-items-center justify-content-center">
                    <div class="col-md-4 col-10 p-0">
                        <div class="card-header bg-transparent border-0">
                            <h2 class="error-code text-center mb-2">'. $option['title'] .'</h2>
                            <h3 class="text-uppercase text-center">'. $option['content'] .'</h3>
                        </div>
                        <div class="card-content">
                            <div class="row py-2">
                                <div class="col-12 col-sm-6 col-md-6">
                                    <a href="'. _URL_ADMIN .'" class="btn btn-primary btn-block"><i class="ft-home"></i> Trang Chủ</a>
                                </div>
                                <div class="col-12 col-sm-6 col-md-6">
                                    <a href="'. _URL_BACK .'" class="btn btn-danger btn-block"><i class="ft-search"></i>  Quay Lại</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>';
        return $text;
    }
}