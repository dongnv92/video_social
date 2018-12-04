@{
ViewBag.Title = "CityPost Express";
Layout = null;
var T = CityPostWebSite.Framwork.WebViewPage.T;
string countVisit = "0";
if (Session["count_visit"] != null)
{
countVisit = Session["count_visit"].ToString();
}
}
<!doctype html>
<html lang="" class="page-home">
<head>
    <meta charset="utf-8">
    <meta name="description" content="Dịch vụ chuyển phát nhanh hỏa tốc, uy tín, rẻ , an toàn">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keyword" content="Chuyển phát nhanh , giao hàng tiết kiệm, giao hàng nhanh, dịch vụ chuyển phát nhanh , dịch vụ giao hàng , bảng giá chuyển phát nhanh , bảng giá chuyển phát bưu diện, bảng giá giao hàng nhanh, bảng giá cước bưu điện">
    <title>Chuyển phát nhanh hỏa tốc | chuyen phat nhanh hoa toc</title>
    <link rel="icon" href="/Images/Images/star.png">
    <!-- Place favicon.ico in the root directory -->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,600italic,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Oswald:400,700,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="~/components/font-awesome/css/font-awesome.css" />
    <link rel="stylesheet" href="~/components/owl.carousel/dist/assets/owl.carousel.css" />
    <link rel="stylesheet" href="~/components/jQuery.mmenu/dist/core/css/jquery.mmenu.all.css" />
    <link rel="stylesheet" href="~/components/lightslider/dist/css/lightslider.min.css" />
    <link rel="stylesheet" href="~/components/lightgallery/dist/css/lightgallery.css" />
    <link rel="stylesheet" href="~/components/owl.carousel/dist/assets/owl.theme.default.min.css" />


    <link rel="stylesheet" type="text/css" href="~/engine1/style.css" />
    <script src="~/Scripts/jquery-1.10.2.min.js"></script>
    <script src="~/Scripts/jquery-1.10.2.js"></script>
    <script src="~/Scripts/System/LoginScript.js?v=1.0.5"></script>
    <script type="text/javascript" src="~/engine1/script.js"></script>


    <script src="~/Content/chosen/js/chosen.jquery.js"></script>
    <script src="~/Content/chosen/js/bootstrap-multiselect.js"></script>
    <link href="~/Content/chosen/css/bootstrap-chosen.css" rel="stylesheet" />
    <link href="~/Content/chosen/css/bootstrap-multiselect.css" rel="stylesheet" />

    <!-- Slider -->
    <link href="~/css/flag-icon.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="~/components/slider/css/settings.css" />
    <link rel="stylesheet" href="~/components/slider/css/slider.css" />
    <link rel="stylesheet" href="~/css/main.css">
    <script src="~/components/jquery/dist/jquery.js"></script>
    <!-- REVOLUTION JS FILES -->
    <script type="text/javascript" src="~/components/slider/js/jquery.themepunch.tools.min.js"></script>
    <script type="text/javascript" src="~/components/slider/js/jquery.themepunch.revolution.min.js"></script>
    <!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
    <script type="text/javascript" src="~/components/slider/js/extensions/revolution.extension.actions.min.js"></script>
    <script type="text/javascript" src="~/components/slider/js/extensions/revolution.extension.carousel.min.js"></script>
    <script type="text/javascript" src="~/components/slider/js/extensions/revolution.extension.kenburn.min.js"></script>
    <script type="text/javascript" src="~/components/slider/js/extensions/revolution.extension.layeranimation.min.js"></script>
    <script type="text/javascript" src="~/components/slider/js/extensions/revolution.extension.migration.min.js"></script>
    <script type="text/javascript" src="~/components/slider/js/extensions/revolution.extension.navigation.min.js"></script>
    <script type="text/javascript" src="~/components/slider/js/extensions/revolution.extension.parallax.min.js"></script>
    <script type="text/javascript" src="~/components/slider/js/extensions/revolution.extension.slideanims.min.js"></script>
    <script type="text/javascript" src="~/components/slider/js/extensions/revolution.extension.video.min.js"></script>
    <meta name="google-site-verification" content="-Ulj1z0wng9aAqEKlz3cqql_BIl-RCkgHviVGIvJ7eA" />
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-124174928-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-124174928-1');
    </script>

</head>
<body>
<div id="page" class="hfeed site">
    @Html.Action("Leftmenu", "Template")
    <div id="rev_slider_2_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container " data-alias="slider-01" style="margin: 0px auto; padding: 0px; margin-top: 0px; margin-bottom: 0px; height: 100px !important;">
        <!-- START REVOLUTION SLIDER 5.2.4.1 auto mode -->
        <div id="rev_slider_2_1" class="rev_slider fullwidthabanner repo hidden-xs-down" style="display: none;" data-version="5.2.4.1">

            <ul>
                <!-- SLIDE 0 -->
                <li data-index="rs-1" data-transition="random" data-slotamount="7" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="300" data-thumb="/ImageUpload/files/banner-11.jpg" data-rotate="0" data-saveperformance="off" data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                    <!-- MAIN IMAGE -->
                    <img src="~/ImageUpload/files/banner-11.jpg" alt="" title="THONG BAO DOI DIA CHI CHI NHANH" width="1920" height="680" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                </li>

                <!-- SLIDE 01-->
                <li data-index="rs-1" data-transition="random" data-slotamount="7" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="300" data-thumb="/images/revo-slider/2-bang-xep-hang-100x50.jpg" data-rotate="0" data-saveperformance="off" data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                    <!-- MAIN IMAGE -->
                    <img src="~/images/revo-slider/2-bang-xep-hang.jpg" alt="" title="Giao hang noi thanh" width="1920" height="680" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                </li>

                <!-- SLIDE 02-->
                <li data-index="rs-1" data-transition="random" data-slotamount="7" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="300" data-thumb="/images/revo-slider/3-giao sieu-toc-100x50.jpg" data-rotate="0" data-saveperformance="off" data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                    <!-- MAIN IMAGE -->
                    <img src="~/images/revo-slider/3-giao sieu-toc.jpg" alt="" title="Giao hang noi thanh" width="1920" height="680" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                </li>

                <!-- SLIDE 1-->
                <li data-index="rs-2" data-transition="random" data-slotamount="7" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="300" data-thumb="/images/revo-slider/banner-1-bg-100x50.jpg" data-rotate="0" data-saveperformance="off" data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                    <!-- MAIN IMAGE -->
                    <img src="~/images/revo-slider/banner-1.jpg" alt="" title="s1_bg" width="1920" height="680" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                </li>

                <!-- SLIDE 2-->
                <li data-index="rs-3" data-transition="random" data-slotamount="7" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="300" data-thumb="/images/revo-slider/banner-2-bg-100x50.jpg" data-rotate="0" data-saveperformance="off" data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                    <!-- MAIN IMAGE -->
                    <img src="~/images/revo-slider/banner-2.jpg" alt="" title="Home 01" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                    <!-- LAYERS -->
                    <!-- LAYER NR. 1 -->
                    <div class="tp-caption   tp-resizeme"
                         id="slide-3-layer-1"
                         data-x="['center','center','center','center']" data-hoffset="['-50','-50','-50','-50']"
                         data-y="['middle','middle','middle','middle']" data-voffset="['100','100','100','100']"
                         data-fontsize="['20','20','20','20']"
                         data-lineheight="['22','22','22','22']"
                         data-fontweight="['400','400','400','400']"
                         data-width="none"
                         data-height="none"
                         data-whitespace="nowrap"
                         data-transform_idle="o:1;"
                         data-transform_in="y:-50px;opacity:0;s:1000;e:Power3.easeInOut;"
                         data-transform_out="auto:auto;s:300;"
                         data-start="500"
                         data-responsive_offset="on"
                         data-end="5400"
                         style="z-index: 4; text-transform: left;">
                        <img src="~/images/logo.png" alt="" width="396" height="168" data-ww="" data-hh="" data-no-retina>
                    </div>
                    <!-- LAYER NR. 2 -->
                    <div class="tp-caption t2   tp-resizeme  a1"
                         id="slide-3-layer-2"
                         data-x="['center','center','center','center']" data-hoffset="['-50','-50','-50','-50']"
                         data-y="['middle','middle','middle','middle']" data-voffset="['180','180','180','180']"
                         data-fontsize="['50','50','30','28']"
                         data-lineheight="['','','','32']"
                         data-width="['none','none','none','440']"
                         data-height="['none','none','none','86']"
                         data-whitespace="['nowrap','nowrap','nowrap','normal']"
                         data-transform_idle="o:1;"
                         data-transform_in="y:-50px;opacity:0;s:300;e:Power3.easeInOut;"
                         data-transform_out="auto:auto;s:300;"
                         data-start="500"
                         data-splitin="none"
                         data-splitout="none"
                         data-responsive_offset="on"
                         data-end="5500"
                         style="color:#a1040a; z-index: 6; white-space: nowrap; line-height: 20px; font-family: Arial; text-align: center; text-transform: left; border-color: rgba(255, 214, 88, 1.00);">
                        @T("SlideSloganDH")
                    </div>
                </li>

                <!-- SLIDE 6-->
                <li data-index="rs-6" data-transition="random" data-slotamount="7" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="300" data-thumb="/images/revo-slider/banner-3-bg-100x50.jpg" data-rotate="0" data-saveperformance="off" data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                    <!-- MAIN IMAGE -->
                    <img src="~/images/revo-slider/banner-3.jpg" alt="" title="banner-1.jpg" width="1920" height="680" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                    <!-- LAYERS -->
                    <!-- LAYER NR. 1 -->
                    <div class="tp-caption t3   tp-resizeme"
                         id="slide-6-layer-1"
                         data-x="['center','center','center','center']" data-hoffset="['-150','-150','-150','-150']"
                         data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']"
                         data-fontsize="['50','50','30','28']"
                         data-width="['none','none','none','280']"
                         data-height="none"
                         data-whitespace="['nowrap','nowrap','nowrap','normal']"
                         data-transform_idle="o:1;"
                         data-transform_in="x:left;skX:45px;s:1000;e:Power3.easeInOut;"
                         data-transform_out="auto:auto;s:300;"
                         data-start="1000"
                         data-splitin="none"
                         data-splitout="none"
                         data-responsive_offset="on"
                         style="color:#0078b0; z-index: 5; white-space: nowrap; line-height: 30px; text-transform: left; border-color: rgba(255, 214, 88, 1.00);">@T("SlideSloganCL"),
                    </div>
                    <!-- LAYER NR. 2 -->
                    <div class="tp-caption t3   tp-resizeme"
                         id="slide-6-layer-2"
                         data-x="['center','center','center','center']" data-hoffset="['-150','-150','-150','-150']"
                         data-y="['middle','middle','middle','middle']" data-voffset="['80','80','80','80']"
                         data-fontsize="['50','50','30','28']"
                         data-width="['none','none','none','483']"
                         data-height="none"
                         data-whitespace="['nowrap','nowrap','nowrap','normal']"
                         data-transform_idle="o:1;"
                         data-transform_in="y:50px;opacity:0;s:1000;e:Power3.easeInOut;"
                         data-transform_out="auto:auto;s:1000;"
                         data-start="1300"
                         data-splitin="chars"
                         data-splitout="none"
                         data-responsive_offset="on"
                         data-elementdelay="0.1"
                         style="z-index: 6; white-space: nowrap; line-height:20px; text-transform: left; color:#0078b0; border-color: rgba(255, 214, 88, 1.00);">@T("SlideSloganDD")
                    </div>
                    <!-- LAYER NR. 3 -->
                    <div class="tp-caption b1  "
                         id="slide-6-layer-3"
                         data-x="['center','center','center','center']" data-hoffset="['-150','-150','-150','-150']"
                         data-y="['middle','middle','middle','middle']" data-voffset="['130','130','130','130']"
                         data-fontsize="['20','20','20','20']"
                         data-width="['none','none','none','283']"
                         data-height="['none','none','none','51']"
                         data-whitespace="['nowrap','nowrap','nowrap','normal']"
                         data-transform_idle="o:1;"
                         data-transform_in="x:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;"
                         data-transform_out="auto:auto;s:1000;"
                         data-mask_in="x:0px;y:0px;"
                         data-start="1700"
                         data-splitin="words"
                         data-splitout="none"
                         data-responsive_offset="on"
                         data-responsive="off"
                         data-elementdelay="0.1"
                         style="z-index: 7; white-space: nowrap; color:#FFFFFF; text-align: center; text-transform: left; border-color: rgba(204, 204, 204, 1.00);">@T("SlideSloganPT")
                    </div>
                    <!-- LAYER NR. 4 -->
                    <div class="tp-caption b1  "
                         id="slide-6-layer-4"
                         data-x="['center','center','center','center']" data-hoffset="['-150','-150','-150','-150']"
                         data-y="['middle','middle','middle','middle']" data-voffset="['160','160','160','160']"
                         data-fontsize="['20','20','20','20']"
                         data-width="none"
                         data-height="none"
                         data-whitespace="nowrap"
                         data-transform_idle="o:1;"
                         data-transform_in="y:[100%];z:0;rZ:-35deg;sX:1;sY:1;skX:0;skY:0;s:600;e:Power4.easeInOut;"
                         data-transform_out="auto:auto;s:300;"
                         data-mask_in="x:0px;y:0px;"
                         data-start="2290"
                         data-splitin="chars"
                         data-splitout="none"
                         data-responsive_offset="on"
                         data-responsive="off"
                         data-elementdelay="0.05"
                         style="z-index: 8; white-space: nowrap; color:#ffffff; text-transform: left; border-color: rgba(204, 204, 204, 1.00);">@T("SlideSloganMD")
                    </div>
                </li>

                <!-- SLIDE 4-->
                <li data-index="rs-1" data-transition="random" data-slotamount="7" data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="300" data-thumb="/images/revo-slider/banner-4-bg-100x50.jpg" data-rotate="0" data-saveperformance="off" data-title="Slide" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                    <!-- MAIN IMAGE -->
                    <img src="~/images/revo-slider/banner-4.jpg" alt="" title="s1_bg" width="1920" height="680" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>
                    <!-- LAYERS -->
                    <!-- LAYER NR. 1 -->
                    @*<div class="tp-caption   tp-resizeme  icon"
                           id="slide-4-layer-1"
                           data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                           data-y="['middle','middle','middle','middle']" data-voffset="['-160','-160','-160','-160']"
                           data-width="none"
                           data-height="none"
                           data-whitespace="nowrap"
                           data-transform_idle="o:1;rZ:inherit;"
                           data-transform_in="x:left;skX:45px;s:1000;e:Power3.easeInOut;"
                           data-transform_out="opacity:0;s:300;e:Power2.easeIn;"
                           data-start="680"
                           data-responsive_offset="on"
                           data-end="5640"
                           style="z-index: 5; text-transform: left;">
                        <img src="~/images/revo-slider/s1_ob1.png" alt="" width="70" height="46" data-ww="" data-hh="" data-no-retina>
                    </div>*@
                    <!-- LAYER NR. 2 -->
                    <div class="tp-caption t1   tp-resizeme"
                         id="slide-4-layer-2"
                         data-x="['center','center','center','center']" data-hoffset="['-250','-250','-250','-250']"
                         data-y="['middle','middle','middle','middle']" data-voffset="['-30','-30','-30','-30']"
                         data-fontsize="['50','50','30','28']"
                         data-lineheight="['70','70','','']"
                         data-width="none"
                         data-height="none"
                         data-whitespace="nowrap"
                         data-transform_idle="o:1;"
                         data-transform_in="y:[100%];z:0;rZ:-35deg;sX:1;sY:1;skX:0;skY:0;s:1000;e:Power4.easeInOut;"
                         data-transform_out="auto:auto;s:300;"
                         data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                         data-start="910"
                         data-splitin="chars"
                         data-splitout="none"
                         data-responsive_offset="on"
                         data-elementdelay="0.05"
                         data-end="5600"
                         style="z-index: 6; white-space: nowrap; line-height: 70px; font-family: Arial; text-transform: left; border-color: rgba(255, 214, 88, 1.00);">@T("Slide4Slogan_1")</div>

                    <!-- LAYER NR. 3 -->
                    <div class="tp-caption t1   tp-resizeme"
                         id="slide-4-layer-3"
                         data-x="['center','center','center','center']" data-hoffset="['-250','-250','-250','-250']"
                         data-y="['middle','middle','middle','middle']" data-voffset="['50','50','50','50']"
                         data-fontsize="['50','50','30','28']"
                         data-lineheight="['70','70','','']"
                         data-width="none"
                         data-height="none"
                         data-whitespace="nowrap"
                         data-transform_idle="o:1;"
                         data-transform_in="z:0;rX:0deg;rY:0;rZ:0;sX:2;sY:2;skX:0;skY:0;opacity:0;s:320;e:Power2.easeOut;"
                         data-transform_out="rZ:0deg;sX:0.7;sY:0.7;opacity:0;s:500;e:Back.easeIn;"
                         data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                         data-mask_out="x:0;y:0;s:inherit;e:inherit;"
                         data-start="2820"
                         data-splitin="none"
                         data-splitout="none"
                         data-responsive_offset="on"
                         data-end="5440"
                         style="z-index: 7; white-space: nowrap; line-height: 70px; font-family: Arial; text-transform: left; border-color: rgba(255, 214, 88, 1.00);">@T("Slide4Slogan_2")</div>
                </li>

            </ul>
            <div class="tp-bannertimer tp-bottom" style="height: 5px; background-color: rgba(0, 0, 0, 0.25);"></div>
        </div>
        <div id="formTracking">
            <div class="container">
                <div class="row">
                    <div class="formTracking">
                        <div class="input-group">
                                                        <span class="input-group-btn">
                                                            <a href="/tra-cuu-van-don.html?code=' + codelading">
                                                                <button type="button" class="btn btn-default btn-search"><strong>@T("HomebtnTC")</strong></button>
                                                            </a>
                                                        </span>
                            <input style="text-transform: lowercase;" type="text" class="form-control code width-50 boder-0 line-height-3-5" id="exampleInputAmount" placeholder="@T("SearchCode")...">

                            <button type="submit" class="btnTracking  btn-search">
                                <strong style="color: black">@T("HomeTest")</strong>
                                <a href="/tra-cuu-van-don.html?code=' + codelading">
                                    <i class="fa fa-paper-plane"></i>
                                </a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(window).load(function () {
                $('.btn-search').click(function (e) {
                    e.preventDefault();

                    var codelading = $('.code').val();

                    if (codelading == "") {
                        swal('Thông báo', 'Vui lòng nhập mã vận đơn', "warning");
                        return;
                    }
                    else {
                        window.location = '/tra-cuu-van-don.html?code=' + codelading;
                    }
                })
                $(".code").keypress(function (event) {
                    if (event.which == 13) {
                        var codelading = $('.code').val();
                        if (codelading == "") {
                            swal('Thông báo', 'Vui lòng nhập mã vận đơn', "warning");
                            return;
                        }
                        else {
                            window.location = '/tra-cuu-van-don.html?code=' + codelading;
                        }
                    }
                });
            });
        </script>
    </div><!-- END REVOLUTION SLIDER -->
    <script type="text/javascript">
        var tpj = jQuery;
        tpj.noConflict();
        var revapi2;
        tpj(document).ready(function () {
            if (tpj("#rev_slider_2_1").revolution == undefined) {
                revslider_showDoubleJqueryError("#rev_slider_2_1");
            } else {
                revapi2 = tpj("#rev_slider_2_1").show().revolution({
                    sliderType: "standard",
                    jsFileLocation: "//transport.thememove.com/wp-content/plugins/revslider/public/images/revo-slider/js/",
                    sliderLayout: "auto",
                    dottedOverlay: "none",
                    delay: 6000,
                    navigation: {
                        keyboardNavigation: "off",
                        keyboard_direction: "horizontal",
                        mouseScrollNavigation: "off",
                        mouseScrollReverse: "default",
                        onHoverStop: "on",
                        touch: {
                            touchenabled: "on",
                            swipe_threshold: 75,
                            swipe_min_touches: 1,
                            swipe_direction: "horizontal",
                            drag_block_vertical: false
                        }
                        ,
                        arrows: {
                            style: "hebe",
                            enable: true,
                            hide_onmobile: false,
                            hide_onleave: true,
                            hide_delay: 200,
                            hide_delay_mobile: 1200,
                            tmp: '<div class="tp-title-wrap">	<span class="tp-arr-titleholder"></span>    <span class="tp-arr-imgholder"></span> </div>',
                            left: {
                                h_align: "left",
                                v_align: "center",
                                h_offset: 20,
                                v_offset: 0
                            },
                            right: {
                                h_align: "right",
                                v_align: "center",
                                h_offset: 20,
                                v_offset: 0
                            }
                        }
                    },
                    responsiveLevels: [1240, 1024, 778, 480],
                    visibilityLevels: [1240, 1024, 778, 480],
                    gridwidth: [1920, 1024, 778, 480],
                    gridheight: [680, 768, 960, 720],
                    lazyType: "none",
                    shadow: 0,
                    spinner: "spinner3",
                    stopLoop: "off",
                    stopAfterLoops: -1,
                    stopAtSlide: -1,
                    shuffle: "off",
                    autoHeight: "off",
                    hideThumbsOnMobile: "off",
                    hideSliderAtLimit: 0,
                    hideCaptionAtLimit: 0,
                    hideAllCaptionAtLilmit: 0,
                    debugMode: false,
                    fallbacks: {
                        simplifyAll: "off",
                        nextSlideOnWindowFocus: "off",
                        disableFocusListener: false,
                    }
                });
            }
        });	/*ready*/
    </script>
    <!-- FEATURED SERVICES
    ================================================== -->
    <section class="featured-services service-img-list">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 login-bg bacground-img margin-bottom-30  ">
                        <div class="login ">
                            <h4>@T("HomeDN")</h4>
                            <div class="form-group">
                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 padding-0-login ">
                                    <label for="">@T("HomeTK"):</label>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 padding-0-login ">
                                    <input type="text" class="form-control username-home form-login" placeholder="@T("HomeTK")..." required>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 padding-0-login ">
                                    <label for="">@T("HomeMK"):</label>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 padding-0-login ">
                                    <input type="password" class="form-control password-home form-login" placeholder="@T("HomeMK")..." required>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 submit bottom-login ">
                                <button type="button" class="btn btn-success btn-Login padding-5 width-80 ">@T("HomebtnDN")</button><span style="color: white"> @T("HomeQMK")</span>
                            </div>
                        </div>
                    </div>
                    <div class="content">
                        <h5 style="text-transform: uppercase;">@T("HomebtnDN")/@T("HomebtnDK")</h5>
                        <p>@T("HomeSloganĐK") ...</p>
                        <a href="#search"> <button type="button" class="btn btn-primary"> @T("HomebtnDK")<i class="fa fa-pencil"></i></button></a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <a href="@Url.Action("Index", "EstimatedCost")" rel="nofollow">
                    <div class="service-item">
                        <img class="img-fluid img-baner2 " src="~/Images/Images/img-uoctinhchiphi.jpg" alt="Transport">
                        <div class="content">
                            <div class="type">
                                <i class="fa fa-calculator"></i>
                            </div>
                            <h5 style="text-transform: uppercase;">@T("HomeUTCP") / @T("HomeBG")</h5>
                            <p>@T("SloganUTCPBG")...</p>

                            <button type="button" class="btn btn-primary">@T("HomeXT")<i class="fa fa-arrow-right"></i></button>

                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-lg-4">
                    <a target="_blank" href="http://shop.citypost.com.vn/dang-nhap.html" rel="nofollow">
                        <div class="service-item">
                            <img class="img-fluid img-baner2 " src="~/images/Images/baner-tạođơnhàng.jpg" alt="Transport">
                            <div class="content">
                                <div class="type">
                                    <i class="fa fa-home"></i>
                                </div>
                                <h5 style="text-transform: uppercase;">@T("HomeTĐH")</h5>
                                <p>@T("SloganTĐH") ...</p>

                                <button type="button" class="btn btn-primary">@T("HomebtnTĐH")<i class="fa fa-arrow-right"></i></button>

                            </div>
                        </div>
                    </a>
                </div>
            </div>

        </div>
    </section>
    <div id="search">
        <button type="button" class="close">×</button>
        <form>
            <div class="request-form container margin-top-15-pt">
                <div class="row">

                    <div class="col-lg-6">
                        <input class="form-control txt-name" type="text" name="name" value="" size="40" aria-required="true" aria-invalid="false" placeholder="@T("HomeName")">
                        <input type="hidden" class="idCustomer" />
                    </div>
                    <div class="col-lg-6">
                        <input id="Email" class="form-control txt-email" type="text" name="email" value="" size="40" aria-invalid="false" placeholder="Email">
                    </div>

                    <div class="col-lg-6 ">
                        <input class="form-control txt-password" type="password" name="password" value="" size="40" aria-required="true" aria-invalid="false" placeholder="@T("HomeMK")">
                    </div>
                    <div class="col-lg-6 ">
                        <input class="form-control txt-passwordnew" type="password" name="password" value="" size="40" aria-required="true" aria-invalid="false" placeholder="@T("HomeEnterPass")">
                    </div>

                    <div class="col-lg-6">
                        <input class="form-control txt-company" type="text" name="company" value="" size="40" aria-required="true" aria-invalid="false" placeholder="@T("HomeCompany")">
                    </div>

                    <div class="col-lg-6">
                        <input class="form-control txt-phone" type="text" name="phone" value="" size="40" aria-required="true" aria-invalid="false" placeholder="@T("HomePhone")">
                    </div>
                    <div class="col-lg-6">
                        <input class="form-control txt-address" type="text" name="adress" value="" size="40" aria-required="true" aria-invalid="false" placeholder="@T("HomeAdress")">
                    </div>
                    <div name="" class="col-lg-6 margin-bottom-10">
                        <div class="align-top">
                            <div class="st-select active">
                                <select class="form-control input-medium select-choice cityRecipient-home" tabindex="-1" data-placeholder="@T("LoginCity")">
                                <option value="0">@T("LoginCity")</option>
                                </select>
                                <span class="Label"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 margin-top-10 ">
                        <input class="btn btn-primary  btn-add-customer" type="submit" value="@T("HomebtnDK")">
                    </div>
                </div>
            </div>


        </form>

    </div>

    <!-- REQUEST
        ================================================== -->
    <div>
        <section class="request parallax-window " data-parallax="scroll" data-image-src="images/Images/background-bamer2.jpg">
            <div class="container">
                <div class="row">
                    <div class="request-content col-xl-6 col-xl-offset-6">
                        <div class="custom-heading part-heading">
                            <h2>@T("HomebtnTV")</h2>
                        </div>
                        <p class="fontfamily" style="color: white;">@T("HomeSloganTV"):</p>
                        <div class="request-form container">
                            <div class="row margin-bottom-30">
                                <div class="col-lg-6 fontfamily " style="padding-left: 5%; font-size: 16px">
                                    <div class="col-lg-12 text-align-left">
                                        <span style="color: white">@T("HomeHanoi"):</span>
                                    </div>
                                    <div class="col-lg-12 text-align-left">
                                        <i class="fa fa-phone" style="color: #1688c5;"></i> <span style="color: white;"> : 0982 930 291 (Ms Thêm) </span>
                                    </div>
                                    <div class="col-lg-12 text-align-left">
                                        <a href="skype:thembui_1?chat">
                                            <i class="fa fa-skype" style="color: #1688c5;"></i> <span style="color: white"> : HN.Bui Them.Citypost </span>
                                        </a>
                                    </div>
                                    <div class="col-lg-12 text-align-left">
                                        <i class="fa fa-phone" style="color: #1688c5;"></i> <span style="color: white"> : 1900 2630 ext 408 </span>
                                    </div>
                                </div>
                                <div class="col-lg-6 fontfamily " style="font-size: 16px">
                                    <div class="col-lg-12 text-align-left">
                                        <span style="color: white">@T("HomeHCM"):</span>
                                    </div>
                                    <div class="col-lg-12 text-align-left">
                                        <i class="fa fa-phone" style="color: #1688c5;"></i>   <span style="color: white "> : 0902.842.522  (Mr Phong) </span>
                                    </div>

                                    <div class="col-lg-12 text-align-left">
                                        <a href="skype:phongtran2603?chat">
                                            <i class="fa fa-skype" style="color: #1688c5;"></i> <span style="color: white"> : phongtran2603 </span>
                                        </a>
                                    </div>
                                    <div class="col-lg-12 text-align-left">
                                        <i class="fa fa-phone" style="color: #1688c5;"></i>  <span style="color: white"> : 19002630 ext 101   </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <input class="nameCustomer form-control" type="search" value="" placeholder="@T("HomeName")" />
                                </div>
                                <div class="col-lg-6">
                                    <input class="Email form-control" id="email" type="search" value="" placeholder="Email..." />
                                </div>
                                <div class="col-lg-6">
                                    <input class="phoneCustomer form-control" type="search" value="" placeholder="Phone..." />
                                </div>
                                <div name="" class="col-lg-6">
                                    <div class="align-top">
                                        <div class="st-select active">
                                            <select class="form-control-select border-none input-medium select-choice city-advisory" tabindex="-1" data-placeholder="@T("LoginCity")">
                                            <option value="0">@T("HomeCity")</option>
                                            <option value="1">HNI - Hà Nội</option>
                                            <option value="23">DNG - Đà Nẵng</option>
                                            <option value="47">BDG - Bình Dương</option>
                                            <option value="50">SGN - Hồ Chí Minh</option>
                                            </select>
                                            <span class="Label"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 margin-top-10 ">
                                    <input class="btn btn-primary btn-search5" type="submit" value="@T("ContactMessage")">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- OUR SERVICES
    ================================================== -->
    <section class="our-services service-icon-list">
        <div class="container">
            <div class="custom-heading section-heading">
                <h1 style="text-transform: uppercase;">@T("HomeDVCCT")</h1>
            </div>
            @Html.Action("ServiceHome", "Service")
        </div>
    </section>

    <!-- WHY CHOOSE US & LASTEST NEWS
    ================================================== -->
    <section class="info-news hidden-xs-down ">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="why-us">
                        <div class="custom-heading part-heading">
                            <h2>@T("HomeWHY")</h2>
                        </div>
                        <div id="accordion" class="accordion" role="tablist" aria-multiselectable="false">
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            <i class="fa fa-arrow-down"></i> <span>@T("SloganWhy1")</span>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-content">
                                        @T("SloganAnswer1").
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingTwo">
                                    <h4 class="panel-title">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            <i class="fa fa-arrow-down"></i> <span>@T("SloganWhy2")</span>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                    <div class="panel-content">
                                        @T("SloganAnswer2")
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingThree">
                                    <h4 class="panel-title">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            <i class="fa fa-arrow-down"></i> <span>@T("SloganWhy3")</span>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                    <div class="panel-content">
                                        @T("SloganAswer3")
                                    </div>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingFour">
                                    <h4 class="panel-title">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
                                            <i class="fa fa-arrow-down"></i> <span>@T("SloganWhy4")</span>
                                        </a>
                                    </h4>
                                </div>
                                <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                    <div class="panel-content">
                                        @T("SloganAnswer4")
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- LATEST NEWS -->
                <div class="col-lg-6">
                    <div class="custom-heading part-heading">
                        <h2>@T("HomeNew")</h2>
                    </div>
                    @Html.Action("HomeNew", "New")
                </div>
            </div>
        </div>
    </section>
    <!-- TESTIMONIALS
    ================================================== -->
    <section class="testimonials parallax-window hidden-xs-down" style="background-image: url('/images/Images/Banner-gioi-thieu.jpg');background-size: cover;  background-attachment: fixed; " @*data-parallax="scroll" data-image-src="images/Images/van-tai-duong-sat(2).jpg"*@>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 hidden-xs-down">
                    <div class="custom-heading section-heading">
                        <h1>@T("MenuCareers")</h1>
                    </div>
                    @Html.Action("homeIndex", "Recruitment")
                </div>
            </div>
        </div>
    </section>
    <!-- OUR CLIENTS
    ================================================== -->
    <section class="our-clients hidden-xs-down">
        <div class="container">
            <div class="custom-heading section-heading">
                <h1>@T("HomeĐT")</h1>
            </div>
            @Html.Action("Index", "Partner")
        </div>
    </section>
    <footer class="site-footer">
        <div class="container">
            <div class="row">

                @Html.Action("Footer", "Faq")

                @Html.Action("ContactFooter", "Contact")
            </div>
        </div>
    </footer>
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-xs-12 margin-bottom-20">
                    <div class="Center">
                        Copyright © 2017 CITYPOST. All rights reserved . © 2017 Powered by CITYPOST.<br>
                        <div class="Center">

                            Đang online :
                            <script id="_waup0c">var _wau = _wau || []; _wau.push(["small", "ovvpfdu6eq", "p0c"]);</script>
                            <script async src="//waust.at/s.js"></script>
                            Lượt truy cập: @countVisit
                            <span class="margin-left-100"></span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script src="~/components/owl.carousel/dist/owl.carousel.js"></script>
<script src="~/components/countUp.js/dist/countUp.min.js"></script>
<script src="~/components/jQuery.mmenu/dist/core/js/jquery.mmenu.min.all.js"></script>
<script src="~/components/tether/tether.min.js"></script><!-- Tether for Bootstrap -->
<script src="~/components/bootstrap/dist/js/bootstrap.js"></script>
<script src="~/components/parallax.js/parallax.min.js"></script>
<script src="~/components/sliphover/src/jquery.sliphover.js"></script>
<script src="~/components/lightslider/dist/js/lightslider.min.js"></script>
<script src="~/components/lightgallery/dist/js/lightgallery.min.js"></script>
<script src="~/components/lightgallery/dist/js/lightgallery-all.min.js"></script>
<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>
<script src="~/js/vendor/gmap3.min.js"></script>
<script src="~/js/vendor/jquery.elevateZoom-3.0.8.min.js"></script>
<script src="~/js/main.js"></script>
<link href="~/Content/swal2/sweetalert.css" rel="stylesheet" />
<script src="~/Content/swal2/sweetalert.min.js"></script>
<script src="~/Content/swal2/sweetalert-dev.js"></script>
</body>
</html>

@*Facebook chat*@

<div style="position: fixed; bottom: 0px; right: 240px;" class="chat">
    <a href="https://www.facebook.com/messages/t/buuchinhthanhpho" title="Chat với Citypost" target="_blank">
        <div class="bubble-msg1 chat-footer ">
            <img class="padding-right-10" src="~/Images/icon_chat_faceboook.png" /><strong class="padding-right-10">Facebook Messenger</strong>
        </div>
    </a>
</div>
@*End Facebook chat*@


@*POPUP*@
<style type="text/css">
    #popup-giua-man-hinh .headerContainer, #popup-giua-man-hinh .bodyContainer, #popup-giua-man-hinh .footerContainer {
        max-width: 960px;
        margin: 0 auto;
        background: #FFF;
    }

    #popup-giua-man-hinh .padding {
        padding: 20px;
    }

    #popup-giua-man-hinh .bodyContainer {
        min-height: 500px;
    }

    #popup-giua-man-hinh .popUpBannerBox {
        position: fixed;
        background: rgba(0,0,0,0.9);
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        color: #FFF;
        z-index: 999999;
        display: none;
    }

    #popup-giua-man-hinh .popUpBannerInner {
        max-width: 800px;
        margin: 0 auto;
    }

    #popup-giua-man-hinh .popUpBannerContent {
        position: fixed;
        top: 150px;
    }

    #popup-giua-man-hinh .closeButton {
        color: red;
        text-decoration: none;
        font-size: 18px;
    }

    #popup-giua-man-hinh a.closeButton {
        float: right;
    }
</style>

<!-- POPUP -->

<!-- POPUP -->


<!--Đếm so nguoi online-->

<style>
    .chosen-container-single .chosen-single span {
        display: block;
        /* margin-right: 131px; */
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        float: left;
    }

    .chosen-container-single .chosen-single {
        background-color: #65656f;
        -webkit-background-clip: padding-box;
        -moz-background-clip: padding;
        background-clip: padding-box;
        -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        color: #ffffff;
        display: block;
        height: 45px;
        overflow: hidden;
        line-height: 40px;
        padding: 0 0 0 8px;
        position: relative;
        text-decoration: none;
        white-space: nowrap;
        border: 0 !important;
        border-bottom-left-radius: 0 !important;
        border-bottom-right-radius: 0 !important;
        border-top-right-radius: 0 !important;
        border-top-left-radius: 0 !important;
    }
</style>

<script type='text/javascript'>window._sbzq || function (e) { e._sbzq = []; var t = e._sbzq; t.push(["_setAccount", 72845]); var n = e.location.protocol == "https:" ? "https:" : "http:"; var r = document.createElement("script"); r.type = "text/javascript"; r.async = true; r.src = n + "//static.subiz.com/public/js/loader.js"; var i = document.getElementsByTagName("script")[0]; i.parentNode.insertBefore(r, i) }(window);</script>
