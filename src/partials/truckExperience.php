<h2>Das Truck Erlebnis</h2>

<?php
$query = new WP_Query( array( 'post_type' => 'truckexperience' ) );
if ( $query->have_posts() ) {
  $query->the_post();
  echo '<p class="col">';
  echo strip_tags( nl2br( get_the_content( '' ) ), "<p>" );
  echo '</p>';
}
?>

<div class="imageWrapper">
  <img src="<?php the_post_thumbnail_url(); ?>" alt="">
  <div class="tooltipWrapper">

    <div class="infoTooltip tpos1"
         data-toggle="popover" data-placement="left" class="infoTooltip"
         title="Obergeschoss"
         data-content="Information zum Schulungsraum.
         <img src='http://localhost/fischertruck/wp-content/uploads/2016/06/test01.png' />"
      >
      <img class="preload" src="http://localhost/fischertruck/wp-content/uploads/2016/06/test01.png">
      <div class="pulse_marker"></div>
      <div class="pulse_glow"></div>
    </div>

    <div class="infoTooltip tpos2"
         data-toggle="popover" data-placement="right" class="infoTooltip"
         title="Titel"
         data-content="Information goes here, event an image is possible.
         <img src='http://localhost/fischertruck/wp-content/uploads/2016/06/test02.png' />"
      >
      <img class="preload" src="http://localhost/fischertruck/wp-content/uploads/2016/06/test02.png">
      <div class="pulse_marker"></div>
      <div class="pulse_glow"></div>
    </div>

    <div class="infoTooltip tpos3"
         data-toggle="popover" data-placement="top" class="infoTooltip"
         title="Titel"
         data-content="Information goes here, event an image is possible."
    >
      <div class="pulse_marker"></div>
      <div class="pulse_glow"></div>
    </div>


  </div>
</div>

<?php wp_reset_query(); ?>
