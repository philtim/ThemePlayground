<?php
$query = new WP_Query(array('post_type' => 'masthead'));
if($query -> have_posts()) {
  while ( $query->have_posts() ) {
    $query->the_post();

    echo '<h2 class="col-xs-12">';
    echo get_field( 'masthead-subheadline' );
    echo '</h2>';

    echo '<div class="copy col-xs-12">';
    echo '<p class="col">';
    echo strip_tags( nl2br( get_the_content( '' ) ), "<p>" );
    echo '</p>';
    echo '</div>';

  }
  wp_reset_query();
}
?>
