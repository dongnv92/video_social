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
</div>