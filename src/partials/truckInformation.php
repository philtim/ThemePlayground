
<?php
$query = new WP_Query(array('post_type' => 'truckinformation'));
if($query -> have_posts()) {
  while ( $query->have_posts() ) {
    $query->the_post();

    echo '<h2>';
    echo the_title();
    echo '</h2>';

    echo the_content();

    if (get_field( 'video' )) {
      echo '<div class="videoWrapper">';
      echo '<iframe class="center-block" width="560" height="314" src="';
      echo get_field( 'video' );
      echo '" frameborder="0" allowfullscreen></iframe>';
      echo '</div>';
    }
  }
  wp_reset_query();
}
?>

