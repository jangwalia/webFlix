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