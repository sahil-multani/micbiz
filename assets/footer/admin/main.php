<footer class="iq-footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="player row">
                    <div class="details col-6 col-sm-4 col-md-4 col-lg-4">
                        <div class="now-playing"></div>
                        <div class="track-art" id="track-art"></div>
                        <div>
                            <div class="track-name" id="track-name"> </div>
                            <div class="track-artist" id="album-name"> </div>
                        </div>
                    </div>
                    <div class="slider_container slider_music col-sm-5 col-md-4 col-lg-4">


                        <div class="current-time" id="track-time">
                            <div id="current-time">01</div>
                        </div>

                        <input type="range" min="1" max="100" value="0" class="seek_slider" onchange="seek()">
                        <div class="total-duration" id="track-length"></div>


                    </div>

                    <div class="buttons col-6  col-sm-3 col-md-2  col-lg-2">
                        <div class="prev-track" id="play-previous"><i class="fa fa-step-backward fa-2x"></i></div>
                        <div class="playpause-track" id="play-pause-button"><i class="fa fa-play-circle fa-3x"></i>
                        </div>
                        <div class="next-track" id="play-next"><i class="fa fa-step-forward fa-2x"></i></div>
                    </div>
                    <div class="slider_container sound col-sm-6 col-md-2  col-lg-2">
                        <i class="fa fa-volume-down"></i>
                        <input type="range" min="1" max="100" value="99" class="volume_slider" onchange="setVolume()">
                        <i class="fa fa-volume-up"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

</footer>
<section class="searchmenus" id="show">
    <div class="container mt-5">
        <div class="form-group container searchboxs">
            <div class="close" id="closearch">
                <i class="fa fa-times fa-2x " aria-hidden="true"></i>
            </div>
            <input type="text" class="form-control mb-5 focus" placeholder="type to search ..."
                onkeyup="goSearch(this.value)" tabindex="1" />
            <div>
                <div class="col-lg-12">
                    <div class="iq-card ">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">search results ...</div>
                        </div>
                        <div class="iq-card-body">
                            <ul class="list-unstyled row iq-box-hover mb-0 " id="getresult">

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>