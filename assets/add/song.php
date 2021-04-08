<?php

 $data = $_POST['data'];



foreach ($data as $i => $val) {?>
<li class="col-xl-2 col-lg-3 col-md-4 iq-music-box play">
    <div class="close removeMusic" data-id="<?echo $val['id']?>"><i class="fa fa-times"></i></div>
    <div class="iq-card" id="1">
        <div class="iq-card-body p-0">
            <div class="iq-thumb">
                <div class="iq-music-overlay"></div>
                <img src="<?php echo $val["img"];?>"
                    class="img-border-radius img-fluid w-100" alt="" />
                <div class="overlay-music-icon">
                    <a href="javascript:void(0)" id="m_<?echo $i ?>">
                        <i class="las la-play-circle"></i>
                    </a>
                </div>
            </div>
            <div class="feature-list text-center">
                <h6 class="font-weight-600 mb-0"><?php echo $val["title"];?>
                </h6>
                <p class="mb-0"><?php echo $val['user'];?>
                </p>
            </div>
        </div>
    </div>
</li>
<?
}?>