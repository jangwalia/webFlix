//here we will run toggle volume button
function controlVolume(btn) {
  const muted = $(".previewVideo").prop("muted");
  $(".previewVideo").prop("muted", !muted);
  $(btn).find("i").toggleClass("fa-volume-mute");
  $(btn).find("i").toggleClass("fa-volume-up");
}

function changePreviewImage() {
  $(".previewVideo").toggle();
  $(".previewImage").toggle();
}

function goBack(){
  window.history.back();
}

function startHideTimer(){
  let time = null;
  $(document).on("mousemove",function(){
    clearTimeout(time);
    $(".watchNav").fadeIn();
    time = setTimeout(function(){
      $(".watchNav").fadeOut();
    },2000);
  })
 
}

function initVideo(videoId,username){
  startHideTimer();
  updateProgressTimer(videoId,username);
}

function updateProgressTimer(videoId,username) {
  addDuration(videoId,username);
  let timer;
  $("video").on("playing",function(event){
        window.clearInterval();
        timer = setInterval(function(){
          updateProgress(videoId,username,event.target.currentTime);
        },3000);
  })
  .on("ended",function(){
    window.clearInterval(timer);
  })
}

function addDuration(videoId,username){
  $.post("Ajax/addDuration.php", {videoId: videoId,username: username}, function(data){
    if(data !== null && data !== ""){
      alert(data);
    }
   
  });
}

function updateProgress(videoId,username,progress){
  $.post("Ajax/updateDuration.php", {videoId: videoId,username: username,progress: progress}, function(data){
    if(data !== null && data !== ""){
      alert(data);
    }
   
  });
}

