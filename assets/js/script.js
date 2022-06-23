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
  updateProgress(videoId,username);
}

function updateProgress(videoId,username) {
  addDuration(videoId,username);
}

function addDuration(videoId,username){
  $.post("Ajax/addDuration.php", {videoId: videoId,username: username}, function(data){
    alert(data);
  });
}