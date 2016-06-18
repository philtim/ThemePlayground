
<?php
$query = new WP_Query(array('post_type' => 'socialfeed'));
if($query -> have_posts()) {
  while ( $query->have_posts() ) {
    $query->the_post();

    echo '<h2>';
    echo the_title();
    echo '</h2>';

    echo '<p class="col">';
    echo strip_tags( nl2br( get_the_content( '' ) ), "" );
    echo '</p>';

    echo '<div class="feedContainer">';
    echo do_shortcode(get_field('socialfeed'));
    echo '</div>';
  }
  wp_reset_query();
}
?>


