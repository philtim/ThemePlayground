<?php
  $mainQuery   = new WP_Query( array('pagename' => 'fischer-tourtruck-contest' ));
  $mainTitle   = '';
  $mainContent = '';

  if ( $mainQuery->have_posts() ) {
    while ( $mainQuery->have_posts() ) {
      $mainQuery->the_post();
      $mainTitle   = get_the_title();
      $mainContent = get_the_content();
    }
    wp_reset_query();
  }
?>

<div class="container">
  <div class="content noPadding">
    <h2><?php echo $mainTitle ?></h2>
    <p class="description col">
      <?php echo strip_tags( nl2br( $mainContent ), "" ); ?>
    </p>

    <div class="prices / row">
      <?php
      $args = array( 'posts_per_page' => -1, 'post_type' => 'contest', 'order' => 'ASC' );
      $query      = new WP_Query( $args );

      if ( $query->have_posts() ) {
        while ( $query->have_posts() ) {
          $query->the_post();
      ?>
          <div class="item / col-xs-12 col-sm-4">
            <div class="contentWrapper">
              <img src="<?php echo get_field('price_01_img') ?>" alt="<?php echo get_field('price_01_img') ?>">
              <span><?php echo get_field('price_01_text') ?></span>
            </div>
          </div>

          <div class="item / col-xs-12 col-sm-4">
            <div class="contentWrapper">
              <img src="<?php echo get_field('price_02_img') ?>" alt="<?php echo get_field('price_02_img') ?>">
              <span><?php echo get_field('price_02_text') ?></span>
            </div>
          </div>

          <div class="item / col-xs-12 col-sm-4">
            <div class="contentWrapper">
              <img src="<?php echo get_field('price_03_img') ?>" alt="<?php echo get_field('price_03_img') ?>">
              <span><?php echo get_field('price_03_text') ?></span>
            </div>
          </div>

      <?php
        }
        wp_reset_query();
      }
      ?>



    </div>



  </div>
</div>


<div class="contestContainer">
  <?php
  $query = new WP_Query( array( 'post_type' => 'contest' ) );
  $imageText = '';
  $subheadline = '';
  $shortCode = '';

  if ( $query->have_posts() ) {
    while ( $query->have_posts() ) {
      $query->the_post();

      $imageText = get_field('image-text');
      $subheadline = get_field('contest-form-title');
      $shortCode = get_field('contest_form');

      echo '<div class="image" style="background-image: url(',
      the_post_thumbnail_url();
      echo ')"></div>';

    }
    wp_reset_query();
  }
  ?>
  <div class="textContainer">
    <h3><?php echo $imageText ?></h3>
  </div>
</div>

<div class="container">
  <div class="content">

    <div class="row">
      <div class="col-xs-12 col-sm-8"><div class="contestForm">
        <h3><?php echo $subheadline ?></h3>
        <?php echo do_shortcode($shortCode) ?>
      </div>
    </div>


  </div>
</div>
