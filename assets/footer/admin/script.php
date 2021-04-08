<script>
  var playerTrack = $("#player-track"),
    bgArtwork = $("#track-art"),
    bgArtworkUrl,
    img = [],
    lastId̥,
    getLastId,
    albumName = $("#album-name"),
    trackName = $("#track-name"),
    albumArt = $("#album-art"),
    sArea = $("#s-area"),
    seekBar = $("#seek-bar"),
    trackTime = $("#track-time"),
    insTime = $("#ins-time"),
    sHover = $("#s-hover"),
    trackImg = $("#track-art"),
    playPauseButton = $("#play-pause-button"),
    i = playPauseButton.find("i"),
    tProgress = $("#current-time"),
    tTime = $("#track-length"),
    seekT,
    seekLoc,
    seekBarPos,
    cM,
    ctMinutes,
    ctSeconds,
    curMinutes,
    curSeconds,
    durMinutes,
    durSeconds,
    playProgress,
    bTime,
    nTime = 0,
    buffInterval = null,
    tFlag = false,
    albums = ["Dawn", "Me & You", "Electro Boy", "Home", "Proxy (Original Mix)"],
    trackNames = [
      "Skylike - Dawn",
      "Alex Skrindo - Me & You",
      "Kaaze - Electro Boy",
      "Jordan Schor - Home",
      "Martin Garrix - Proxy",
    ],
    albumArtworks = ["_1", "_2", "_3", "_4", "_5"],
    trackUrl = [
      "https://raw.githubusercontent.com/himalayasingh/music-player-1/master/music/2.mp3",
      "https://raw.githubusercontent.com/himalayasingh/music-player-1/master/music/1.mp3",
      "https://raw.githubusercontent.com/himalayasingh/music-player-1/master/music/3.mp3",
      "https://raw.githubusercontent.com/himalayasingh/music-player-1/master/music/4.mp3",
      "https://raw.githubusercontent.com/himalayasingh/music-player-1/master/music/5.mp3",
    ],
    playPreviousTrackButton = $("#play-previous"),
    playNextTrackButton = $("#play-next"),
    currIndex = -1,
    client_id = "?client_id=8538a1744a7fdaa59981232897501e04";

  function playPause() {
    setTimeout(function() {
      if (audio.paused) {
        playerTrack.addClass("active");
        albumArt.addClass("active");
        checkBuffering();
        i.attr("class", "fa fa-pause-circle fa-3x");
        audio.play();
      } else {
        playerTrack.removeClass("active");
        albumArt.removeClass("active");
        clearInterval(buffInterval);
        albumArt.removeClass("buffering");
        i.attr("class", "fa fa-play-circle fa-3x");
        audio.pause();
      }
    }, 300);
  }

  function updateCurrTime() {
    nTime = new Date();
    nTime = nTime.getTime();
    seekUpdate();

    if (!tFlag) {
      tFlag = true;
      trackTime.addClass("active");
    }

    curMinutes = Math.floor(audio.currentTime / 60);
    curSeconds = Math.floor(audio.currentTime - curMinutes * 60);

    durMinutes = Math.floor(audio.duration / 60);
    durSeconds = Math.floor(audio.duration - durMinutes * 60);

    playProgress = (audio.currentTime / audio.duration) * 100;

    if (curMinutes < 10) curMinutes = "0" + curMinutes;
    if (curSeconds < 10) curSeconds = "0" + curSeconds;

    if (durMinutes < 10) durMinutes = "0" + durMinutes;
    if (durSeconds < 10) durSeconds = "0" + durSeconds;

    if (isNaN(curMinutes) || isNaN(curSeconds)) tProgress.text("00:00");
    else tProgress.text(curMinutes + ":" + curSeconds);

    if (isNaN(durMinutes) || isNaN(durSeconds)) tTime.text("00:00");
    else tTime.text(durMinutes + ":" + durSeconds);

    if (
      isNaN(curMinutes) ||
      isNaN(curSeconds) ||
      isNaN(durMinutes) ||
      isNaN(durSeconds)
    )
      trackTime.removeClass("active");
    else trackTime.addClass("active");

    seekBar.width(playProgress + "%");

    if (playProgress == 100) {
      i.attr("class", "fa fa-play-circle fa-3x");
      seekBar.width(0);
      tProgress.text("00:00");
      albumArt.removeClass("buffering").removeClass("active");
      clearInterval(buffInterval);
    }
  }

  function checkBuffering() {
    clearInterval(buffInterval);
    buffInterval = setInterval(function() {
      if (nTime == 0 || bTime - nTime > 1000) albumArt.addClass("buffering");
      else albumArt.removeClass("buffering");

      bTime = new Date();
      bTime = bTime.getTime();
    }, 100);
  }

  function selectTrack(flag) {
    if (flag == 0 || flag == 1) ++currIndex;
    else --currIndex;

    if (currIndex > -1 && currIndex < albumArtworks.length) {
      if (flag == 0) i.attr("class", "fa fa-play-circle fa-3x");
      else {
        albumArt.removeClass("buffering");
        i.attr("class", "fa fa-pause");
      }

      //seekBar.width(0);
      trackTime.removeClass("active");
      tProgress.text("00:00");
      tTime.text("00:00");

      currAlbum = albums[currIndex];
      currTrackName = trackNames[currIndex];
      currArtwork = albumArtworks[currIndex];
      currImage = img[currIndex];
      audio.src = trackUrl[currIndex];

      nTime = 0;
      bTime = new Date();
      bTime = bTime.getTime();

      if (flag != 0) {
        audio.play();
        playerTrack.addClass("active");
        albumArt.addClass("active");

        clearInterval(buffInterval);
        checkBuffering();
      }

      albumName.text(currAlbum);
      trackName.text(currTrackName);
      trackImg.css({
        background: "url(" + currImage + ")",
      });
    } else {
      if (flag == 0 || flag == 1) --currIndex;
      else ++currIndex;
    }
  }

  function initPlayer() {
    audio = new Audio();
    //audio.id = "music-player"
    //console.log(audio)
    selectTrack(0);

    audio.loop = false;

    playPauseButton.on("click", playPause);

    //sArea.on('click', playFromClickedPos);

    $(audio).on("timeupdate", updateCurrTime);

    playPreviousTrackButton.on("click", function() {
      selectTrack(-1);
      i.attr("class", "fa fa-pause-circle fa-3x");
    });
    playNextTrackButton.on("click", function() {
      selectTrack(1);
      i.attr("class", "fa fa-pause-circle fa-3x");
    });
  }

  function seekUpdate() {
    let seekPosition = 0;
    let curr_track = audio;
    let seek_slider = document.querySelector(".seek_slider");
    let curr_time = document.querySelector(".current-time");
    let total_duration = document.querySelector(".total-duration");

    if (!isNaN(curr_track.duration)) {
      seekPosition = curr_track.currentTime * (100 / curr_track.duration);

      seek_slider.value = seekPosition;

      let currentMinutes = Math.floor(curr_track.currentTime / 60);
      let currentSeconds = Math.floor(
        curr_track.currentTime - currentMinutes * 60
      );
      let durationMinutes = Math.floor(curr_track.duration / 60);
      let durationSeconds = Math.floor(
        curr_track.duration - durationMinutes * 60
      );

      if (currentSeconds < 10) {
        currentSeconds = "0" + currentSeconds;
      }
      if (durationSeconds < 10) {
        durationSeconds = "0" + durationSeconds;
      }
      if (currentMinutes < 10) {
        currentMinutes = "0" + currentMinutes;
      }
      if (durationMinutes < 10) {
        durationMinutes = "0" + durationMinutes;
      }

      curr_time.textContent = currentMinutes + ":" + currentSeconds;
      total_duration.textContent = durationMinutes + ":" + durationSeconds;
    }
  }

  initPlayer();

  function seek() {
    let seek_slider = document.querySelector(".seek_slider");
    curr_track = audio;

    seekto = curr_track.duration * (seek_slider.value / 100);
    curr_track.currentTime = seekto;
  }

  function setVolume() {
    let volume_slider = document.querySelector(".volume_slider");

    audio.volume = volume_slider.value / 100;
  }

  let searchform = document.getElementById("search-form"),
    searchResults,
    player = audio;
  var arr = [],
    mymusic = {};

  function goSearch(q) {
    let searchQuery = q;
    fetch(
      "https://api.soundcloud.com/tracks?client_id=8538a1744a7fdaa59981232897501e04&q=" +
      searchQuery
    ).then(function(response) {
      if (response.status !== 200) {
        console.log(
          "Looks like there was a problem. Status Code: " + response.status
        );
        return;
      } else {
        response.json().then(function(data) {
          for (let i = 0; i < data.length; i++) {
            let url = data[i].stream_url;
            let img = data[i].user.avatar_url;
            let title = data[i].title;
            let user = data[i].user.username;
            mymusic = {
              [i]: {
                img: img,
                title: title,
                user: user,
                url: url,
              },
            };
            arr[i] = mymusic;
            //
            let markup = `<li class="col-xl-2 col-lg-3 col-md-4 iq-music-box play" >
                                                <div class="iq-card" id="1">
                                                    <div class="iq-card-body p-0">
                                                        <div class="iq-thumb">
                                                            <div class="iq-music-overlay"></div>
                                                            <img src="${data[i].user.avatar_url}" class="img-border-radius img-fluid w-100" alt="" />
                                                            <div class="overlay-music-icon">
                                                                <a href="javascript:void(0)" id="m_${i}">
                                                                    <i class="las la-play-circle"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="feature-list text-center">
                                                            <h6 class="font-weight-600 mb-0">${data[i].title}</h6>
                                                            <p class="mb-0">${data[i].user.username}</p>
                                                            <input type="checkbox" name="" id="c_${i}" onclick='getmusic(${i},this.checked)'>
                                                            <label for="c_${i}">play song</label>
                                                            <input type="checkbox" name="sahil" id="p_${i}" data-id="${Date.now()}" data-no=${i}>
                                                            <label for="p_${i}">add song</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>`;
            document.getElementById("getresult").innerHTML += markup;
          }
        });
      }
    });
    document.getElementById("getresult").innerHTML = "";
  }

  function getmusic(no, isPlaying) {
    if (isPlaying == true) {
      let src = arr[no][no]["url"] + client_id,
        uimg = arr[no][no]["img"];

      //remove play btn from id starting with M_*
      if (no != 0) {
        getLastId = no - 1;
        checkid(getLastId);
      } else {
        checkid(0);
      }

      function checkid(getLastId) {
        $("#m_" + getLastId + " i").removeClass("la-pause-circle");
        $("#m_" + getLastId + " i").addClass("la-play-circle");
      }
      //add btn to id M_no ...
      $("#m_" + no + " i").addClass("la-pause-circle");
      $("#m_" + no + " i").removeClass("la-play-circle");

      //set src
      audio.setAttribute("src", src);
      playerTrack.addClass("active");
      albumArt.addClass("active");

      // check buffer
      checkBuffering();

      //add play pause btn
      i.attr("class", "fa fa-pause-circle fa-3x");

      //audio play
      audio.play();

      //set tracks names , src ,img ,album name
      trackName.html(arr[no][no]["title"]);
      albumName.html(arr[no][no]["user"]);
      trackImg.css("background", `url(${uimg})`);
      //push into array / replacing exsiting array
      arr.map((val, ind) => {
        trackNames[ind] = val[ind]["title"];
        trackUrl[ind] = val[ind]["url"] + client_id;
        albumArtworks[ind] = "_" + ind;
        img[ind] = val[ind]["img"];
      });

    } else {
      //playpause();
      playPause()
    }


  }

  $("#show").hide();
  $(".search-input").each(function() {
    $(this).on("click", function() {
      $(".hide").hide();
      $("#show").show();
      $(".focus").focus();
    });
  });

  $("#closearch").on("click", function() {
    $("#show").hide();
    $(".hide").show();
  });
</script>