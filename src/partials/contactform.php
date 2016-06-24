<div class="container">
    <?php
    $query = new WP_Query(array('pagename' => 'contactform'));
    if($query -> have_posts()) {
      while ( $query->have_posts() ) {
        $query->the_post();
        the_content();
      }
      wp_reset_query();
    }
    ?>
</div>
