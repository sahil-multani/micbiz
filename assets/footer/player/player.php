<footer class="iq-footer">
      <div class="container-fluid">
         <div class="row">
            <div class="col-sm-12">
               <div class="player row">
                  <div class="details col-6 col-sm-4 col-md-4 col-lg-4">
                     <div class="now-playing"></div>
                     <div class="track-art"></div>
                     <div>
                        <div class="track-name" id="track-name"> </div>
                        <div class="track-artist" id="album-name"> </div>
                     </div>
                  </div>
                  <div class="slider_container slider_music col-sm-5 col-md-4 col-lg-4" >


                      <div class="current-time" id="track-time">
                         <div id="current-time">01</div>
                     </div>
                     
                     <input type="range" min="1" max="100" value="0" class="seek_slider"  onchange="seek()">
                     <div class="total-duration" id="track-length"></div> 

                     
                     
                     <!-- id="track-time" -->
                     <!-- 
                        <div  class="current-time"> 
                        <div id="current-time"></div>
                        <div id="track-length"></div> 
                     </div> 
                     -->

                    <!-- <div id="s-area">
                        <div id="ins-time"></div>
                        <div id="s-hover"></div>
                        <div id="seek-bar"></div>
                     </div> -->
                  </div>
                  
                  <div class="buttons col-6  col-sm-3 col-md-2  col-lg-2">
                     <div class="prev-track" id="play-previous"><i class="fa fa-step-backward fa-2x"></i></div>
                     <div class="playpause-track" id="play-pause-button"><i class="fa fa-play-circle fa-3x"></i></div>
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
   <script>
   
   $(function()
    {
        var playerTrack = $("#player-track"), bgArtwork = $('#bg-artwork'), bgArtworkUrl, albumName = $('#album-name'), trackName = $('#track-name'), albumArt = $('#album-art'), sArea = $('#s-area'), seekBar = $('#seek-bar'), trackTime = $('#track-time'), insTime = $('#ins-time'), sHover = $('#s-hover'), playPauseButton = $("#play-pause-button"),  i = playPauseButton.find('i'), tProgress = $('#current-time'), tTime = $('#track-length'), seekT, seekLoc, seekBarPos, cM, ctMinutes, ctSeconds, curMinutes, curSeconds, durMinutes, durSeconds, playProgress, bTime, nTime = 0, buffInterval = null, tFlag = false, albums = ['Dawn','Me & You','Electro Boy','Home','Proxy (Original Mix)'], trackNames = ['Skylike - Dawn','Alex Skrindo - Me & You','Kaaze - Electro Boy','Jordan Schor - Home','Martin Garrix - Proxy'], albumArtworks = ['_1','_2','_3','_4','_5'], trackUrl = ['https://raw.githubusercontent.com/himalayasingh/music-player-1/master/music/2.mp3','https://raw.githubusercontent.com/himalayasingh/music-player-1/master/music/1.mp3','https://raw.githubusercontent.com/himalayasingh/music-player-1/master/music/3.mp3','https://raw.githubusercontent.com/himalayasingh/music-player-1/master/music/4.mp3','https://raw.githubusercontent.com/himalayasingh/music-player-1/master/music/5.mp3'], playPreviousTrackButton = $('#play-previous'), playNextTrackButton = $('#play-next'), currIndex = -1;
    
        function playPause()
        {
            setTimeout(function()
            {
                if(audio.paused)
                {
                    playerTrack.addClass('active');
                    albumArt.addClass('active');
                    checkBuffering();
                    i.attr('class','fa fa-pause-circle fa-3x');
                    audio.play();
                }
                else
                {
                    playerTrack.removeClass('active');
                    albumArt.removeClass('active');
                    clearInterval(buffInterval);
                    albumArt.removeClass('buffering');
                    i.attr('class','fa fa-play-circle fa-3x');
                    audio.pause();
                }
            },300);
        }
    
            
        function showHover(event)
        {
            seekBarPos = sArea.offset(); 
            seekT = event.clientX - seekBarPos.left;
            seekLoc = audio.duration * (seekT / sArea.outerWidth());
            
            sHover.width(seekT);
            
            cM = seekLoc / 60;
            ctMinutes = Math.floor(cM);
            ctSeconds = Math.floor(seekLoc - ctMinutes * 60);
            
            if( (ctMinutes < 0) || (ctSeconds < 0) )
                return;
            
            if( (ctMinutes < 0) || (ctSeconds < 0) )
                return;
            
            if(ctMinutes < 10)
                ctMinutes = '0'+ctMinutes;
            if(ctSeconds < 10)
                ctSeconds = '0'+ctSeconds;
            
            if( isNaN(ctMinutes) || isNaN(ctSeconds) )
                insTime.text('--:--');
            else
                insTime.text(ctMinutes+':'+ctSeconds);
                
            insTime.css({'left':seekT,'margin-left':'-21px'}).fadeIn(0);
            
        }
    
        function hideHover()
        {
            sHover.width(0);
            insTime.text('00:00').css({'left':'0px','margin-left':'0px'}).fadeOut(0);		
        }
        
        function playFromClickedPos()
        {
            audio.currentTime = seekLoc;
            seekBar.width(seekT);
            hideHover();
        }
    
        function updateCurrTime()
        {
            nTime = new Date();
            nTime = nTime.getTime();
            seekUpdate()
    
            if( !tFlag )
            {
                tFlag = true;
                trackTime.addClass('active');
            }
    
            curMinutes = Math.floor(audio.currentTime / 60);
            curSeconds = Math.floor(audio.currentTime - curMinutes * 60);
            
            durMinutes = Math.floor(audio.duration / 60);
            durSeconds = Math.floor(audio.duration - durMinutes * 60);
            
            playProgress = (audio.currentTime / audio.duration) * 100;
            
            if(curMinutes < 10)
                curMinutes = '0'+curMinutes;
            if(curSeconds < 10)
                curSeconds = '0'+curSeconds;
            
            if(durMinutes < 10)
                durMinutes = '0'+durMinutes;
            if(durSeconds < 10)
                durSeconds = '0'+durSeconds;
            
            if( isNaN(curMinutes) || isNaN(curSeconds) )
                tProgress.text('00:00');
            else
                tProgress.text(curMinutes+':'+curSeconds);
            
            if( isNaN(durMinutes) || isNaN(durSeconds) )
                tTime.text('00:00');
            else
                tTime.text(durMinutes+':'+durSeconds);
            
            if( isNaN(curMinutes) || isNaN(curSeconds) || isNaN(durMinutes) || isNaN(durSeconds) )
                trackTime.removeClass('active');
            else
                trackTime.addClass('active');
    
            
            seekBar.width(playProgress+'%');
            
            if( playProgress == 100 )
            {
                i.attr('class','fa fa-play-circle fa-3x');
                seekBar.width(0);
                tProgress.text('00:00');
                albumArt.removeClass('buffering').removeClass('active');
                clearInterval(buffInterval);
            }
        }
        
        function checkBuffering()
        {
            clearInterval(buffInterval);
            buffInterval = setInterval(function()
            { 
                if( (nTime == 0) || (bTime - nTime) > 1000  )
                    albumArt.addClass('buffering');
                else
                    albumArt.removeClass('buffering');
    
                bTime = new Date();
                bTime = bTime.getTime();
    
            },100);
        }
    
        function selectTrack(flag)
        {
            if( flag == 0 || flag == 1 )
                ++currIndex;
            else
                --currIndex;
    
            if( (currIndex > -1) && (currIndex < albumArtworks.length) )
            {
                if( flag == 0 )
                    i.attr('class','fa fa-play-circle fa-3x');
                else
                {
                    albumArt.removeClass('buffering');
                    i.attr('class','fa fa-pause');
                }
    
                seekBar.width(0);
                trackTime.removeClass('active');
                tProgress.text('00:00');
                tTime.text('00:00');
    
                currAlbum = albums[currIndex];
                currTrackName = trackNames[currIndex];
                currArtwork = albumArtworks[currIndex];
    
                audio.src = trackUrl[currIndex];
                
                nTime = 0;
                bTime = new Date();
                bTime = bTime.getTime();
    
                if(flag != 0)
                {
                    audio.play();
                    playerTrack.addClass('active');
                    albumArt.addClass('active');
                
                    clearInterval(buffInterval);
                    checkBuffering();
                }
    
                albumName.text(currAlbum);
                trackName.text(currTrackName);
                albumArt.find('img.active').removeClass('active');
                $('#'+currArtwork).addClass('active');
                
                bgArtworkUrl = $('#'+currArtwork).attr('src');
    
                bgArtwork.css({'background-image':'url('+bgArtworkUrl+')'});
            }
            else
            {
                if( flag == 0 || flag == 1 )
                    --currIndex;
                else
                    ++currIndex;
            }
        }

        

        function initPlayer()
        {	
            audio = new Audio(); // document.createElement('audio');
    
            selectTrack(0);
            
            audio.loop = false;
            
            playPauseButton.on('click',playPause);
            
            sArea.mousemove(function(event){ showHover(event); });
            
            sArea.mouseout(hideHover);
            
            sArea.on('click',playFromClickedPos);
            
            $(audio).on('timeupdate',updateCurrTime);
    
            playPreviousTrackButton.on('click',function(){ selectTrack(-1);} );
            playNextTrackButton.on('click',function(){ selectTrack(1);});
        }

        function seekUpdate() {
               let seekPosition = 0;
               let curr_track = audio
               let seek_slider = document.querySelector(".seek_slider");
               let curr_time = document.querySelector(".current-time");
               let total_duration = document.querySelector(".total-duration");

  if (!isNaN(curr_track.duration)) {
    seekPosition = curr_track.currentTime * (100 / curr_track.duration);

    seek_slider.value = seekPosition;

    let currentMinutes = Math.floor(curr_track.currentTime / 60);
    let currentSeconds = Math.floor(curr_track.currentTime - currentMinutes * 60);
    let durationMinutes = Math.floor(curr_track.duration / 60);
    let durationSeconds = Math.floor(curr_track.duration - durationMinutes * 60);

    if (currentSeconds < 10) { currentSeconds = "0" + currentSeconds; }
    if (durationSeconds < 10) { durationSeconds = "0" + durationSeconds; }
    if (currentMinutes < 10) { currentMinutes = "0" + currentMinutes; }
    if (durationMinutes < 10) { durationMinutes = "0" + durationMinutes; }

    curr_time.textContent = currentMinutes + ":" + currentSeconds;
    total_duration.textContent = durationMinutes + ":" + durationSeconds;
  }
}
        
        initPlayer();
    });
    function seek(){
        let seek_slider = document.querySelector(".seek_slider");
        
        curr_track = audio;
        seekto = curr_track.duration * (seek_slider.value / 100);
        curr_track.currentTime = seekto;
        }
 
      
</script>
