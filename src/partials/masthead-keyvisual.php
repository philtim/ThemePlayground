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
    echo '<h2>Der <strong>fischer</strong> Tour Truck</h2>';
    echo '<h3>Befestigungstechnik live erleben.</h3>';
    //the_content();

    echo '</div>';
    echo '</div>';
    echo '</div>';
  }
  wp_reset_query();
}
?>
