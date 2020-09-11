<?php

if ($_POST) {
    // validate post data
    // send email
}

?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
$(window).scroll(function() {
  var scroll = $(window).scrollTop();
  $("#js-hero img").css({
    width: (100 + scroll/5) +"%"
  })
})
</script>
  
<section class="hero-section" id="js-hero">
    <img src="https://source.unsplash.com/random/1920x1080" alt="Image " />
</section>
    
