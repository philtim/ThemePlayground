
<h2>Impressionen </h2>

<?php
$query = new WP_Query(array('post_type' => 'socialfeed'));
if($query -> have_posts()) {
  while ( $query->have_posts() ) {
    $query->the_post();
    the_content();
  }
  wp_reset_query();
}
?>
