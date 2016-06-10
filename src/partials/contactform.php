<div class="container">
  <div class="content">
    <?php
    $query = new WP_Query(array('pagename' => 'kontaktformular'));
    if($query -> have_posts()) {
      while ( $query->have_posts() ) {
        $query->the_post();
        the_content();
      }
      wp_reset_query();
    }
    ?>
  </div>
</div>
