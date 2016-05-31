<?php
/**
 * The template for displaying onepage front page.
 *
 * This is the template that displays all pages as a onepager.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package fischertruck
 */

get_header(); ?>

  <div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

      <!-- #masthead -->
      <section id="masthead" class="masthead">
          <?php
          $query = new WP_Query(array('post_type' => 'masthead'));
          if($query -> have_posts()) {
            while ( $query->have_posts() ) {
              $query->the_post();



              echo '<div class="content" style="background-image: url(';
                the_post_thumbnail_url();
              echo ')">';

              echo '<div class="textContainer">';
              the_content();
              echo '</div>';
              echo '</div>';
            }
            wp_reset_query();
          }
          ?>
      </section>

      <!-- #truckStops -->
      <section id="truckStops" class="truckStops">
        <div class="content">
          <?php
          $query = new WP_Query(array('post_type' => 'truckstops'));
          if($query -> have_posts()) {
            while ( $query->have_posts() ) {
              $query->the_post();
              the_content();
              the_field('date_for_truck_stop');
              the_field('address_for_truck_stop');
            }
            wp_reset_query();
          }
          ?>
        </div>
      </section>

      <!-- #truckInformation -->
      <section id="truckInformation" class="truckInformation">
        <div class="content">
          <?php
          $args = array(
            'post_type' => 'truckinformation',
            'order' => 'ASC',
          );
          $query = new WP_Query($args);
          if($query -> have_posts()) {
            while ( $query->have_posts() ) {
              $query->the_post();
              the_content();
            }
            wp_reset_query();
          }
          ?>
        </div>
      </section>

      <!-- #truckExperience -->
      <section id="truckExperience" class="truckExperience">
        <div class="content">
          <?php
          $query = new WP_Query(array('post_type' => 'truckexperience'));
          if($query -> have_posts()) {
            while ( $query->have_posts() ) {
              $query->the_post();
              the_content();
            }
            wp_reset_query();
          }
          ?>
        </div>
      </section>

      <!-- #socialFeed -->
      <section id="socialFeed" class="socialFeed">
        <div class="content">
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
        </div>
      </section>

      <!-- #contest -->
      <section id="contest" class="contest">
        <div class="content">
          <?php
          $query = new WP_Query(array('post_type' => 'contest'));
          if($query -> have_posts()) {
            while ( $query->have_posts() ) {
              $query->the_post();
              the_content();
            }
            wp_reset_query();
          }
          ?>
        </div>
      </section>


    </main><!-- #main -->
  </div><!-- #primary -->

<?php
get_footer();
