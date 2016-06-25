<?php
  $mainQuery   = new WP_Query( array('pagename' => 'tourtruckexperience' ));
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


<h2><?php echo $mainTitle ?></h2>

<?php
  $args = array('posts_per_page' => -1, 'post_type' => 'truckexperience', 'order' => 'asc');
  $query = new WP_Query( $args );
  $experienceBlocks = array();

  if ( $query->have_posts() ) {
    $loopCounter = 0;
    while ( $query->have_posts() ) {
      $query->the_post();
?>

        <div class="row / vertical-center">
          <div class="text / col-xs-12 col-sm-6 <?php if($loopCounter % 2 != 0) echo 'test col-sm-push-6'; ?>">
            <?php the_content() ?>
          </div>
          <div class="image animation-element / col-xs-12 col-sm-6
          <?php if($loopCounter % 2 != 0) { echo 'slide-from-left col-sm-pull-6'; } else {
            echo 'slide-from-right';
          }
          ?>">

            <img src="<?php the_post_thumbnail_url(); ?>" alt="fischer - innovative solutions">
          </div>
        </div>

<?php
      $loopCounter ++;
    }
    wp_reset_query();
  }
?>
