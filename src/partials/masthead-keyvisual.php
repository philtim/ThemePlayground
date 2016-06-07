<?php
$query = new WP_Query(array('post_type' => 'masthead'));
if($query -> have_posts()) {
  while ( $query->have_posts() ) {
    $query->the_post();
    echo '<div class="imageTextContent">';
    echo '<div class="imageWrapper" style="background-image: url(';
    the_post_thumbnail_url();
    echo ')">';
    echo '</div>';
    echo '<div class="textWrapper">';
    echo '<div class="text">';
    echo '<h2>';
    echo get_field( 'masthead-headline' );
    echo '</h2>';

    echo '</div>';
    echo '</div>';
    echo '</div>';
  }
  wp_reset_query();
}
?>
