<?php
require_once("includes/Header.php");
if(!isset($_GET["id"])) {
  Errormessage::showmessage("no record found");
}
$watchId = $_GET["id"];
$video = new Video($conn,$watchId);
$video->incrementVideoViews();
?>
<div class = 'watchContainer'>
  <div class = 'watchControls watchNav'>
  <button onclick="goBack()"><i class="fa fa-arrow-left"></i></button>
  <h1><?php echo $video->getTitle(); ?></h1>
  </div>
  <video controls autoplay>
    <source src = '<?php echo $video->getFilepath(); ?>'type = "video/mp4">
</video>
</div>
<script>
  initVideo("<?php echo $video->getId(); ?>", "<?php echo $loggedInUser; ?>");
  </script>