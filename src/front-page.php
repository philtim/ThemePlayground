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

      <?php
      $query = new WP_Query( array( 'pagename' => 'masthead-keyvisual' ) );
      if ( $query->have_posts() ) {
        $query->the_post();
        $isVisible = get_field( 'page_is_visible' );
        wp_reset_query();
      }
      ?>
      <?php
      if ( $isVisible == 1 ) {
        ?>
        <section id="home" class="masthead">
          <div class="content">
            <?php get_template_part( 'partials/masthead-keyvisual' ); ?>
          </div>
        </section>
        <section class="container masthead">
          <div class="content">
            <?php get_template_part( 'partials/masthead' ); ?>
          </div>
          <hr>
        </section>
        <?php
      }
      ?>


      <!-- #truckStops -->
      <?php
      $query = new WP_Query( array( 'pagename' => 'next-truck-stops' ) );
      if ( $query->have_posts() ) {
        $query->the_post();
        $isVisible = get_field( 'page_is_visible' );
        wp_reset_query();
      }
      ?>
      <?php
      if ( $isVisible == 1 ) {
        ?>
        <section id="truckStops" class="truckStops">
          <?php get_template_part( 'partials/truckStops' ); ?>
        </section>
        <?php
      }
      ?>

      <!-- #truckInformation -->
      <?php
      $query = new WP_Query( array( 'pagename' => 'truck-inside' ) );
      if ( $query->have_posts() ) {
        $query->the_post();
        $isVisible = get_field( 'page_is_visible' );
        wp_reset_query();
      }
      ?>
      <?php
      if ( $isVisible == 1 ) {
        ?>
        <section id="truckInformation" class="container truckInformation">
          <hr>
          <div class="content">
            <?php get_template_part( 'partials/truckInformation' ); ?>
          </div>
          <hr>
        </section>
        <?php
      }
      ?>

      <!-- #truckExperience -->
      <?php
      $query = new WP_Query( array( 'pagename' => 'tourtruckexperience' ) );
      if ( $query->have_posts() ) {
        $query->the_post();
        $isVisible = get_field( 'page_is_visible' );
        wp_reset_query();
      }
      ?>
      <?php
      if ( $isVisible == 1 ) {
        ?>
        <section id="truckExperience" class="container truckExperience">
          <div class="content">
            <?php get_template_part( 'partials/truckExperience' ); ?>
          </div>
          <hr>
        </section>
        <?php
      }
      ?>

      <!-- #socialFeed -->
      <?php
      $query = new WP_Query( array( 'pagename' => 'impression' ) );
      if ( $query->have_posts() ) {
        $query->the_post();
        $isVisible = get_field( 'page_is_visible' );
        wp_reset_query();
      }
      ?>
      <?php
      if ( $isVisible == 1 ) {
        ?>
        <section id="socialFeed" class="container socialFeed">
          <div class="content">
            <?php get_template_part( 'partials/socialFeed' ); ?>
          </div>
          <hr>
        </section>
        <?php
      }
      ?>

      <!-- #contest -->
      <?php
      $query = new WP_Query( array( 'pagename' => 'fischer-tourtruck-contest' ) );
      if ( $query->have_posts() ) {
        $query->the_post();
        $isVisible = get_field( 'page_is_visible' );
        wp_reset_query();
      }
      ?>
      <?php
      if ( $isVisible == 1 ) {
        ?>
        <section id="contest" class="contest">
          <?php get_template_part( 'partials/contest' ); ?>
        </section>
        <?php
      }
      ?>

      <!-- #contactForm -->
      <?php
      $query = new WP_Query( array( 'pagename' => 'contactform' ) );
      if ( $query->have_posts() ) {
        $query->the_post();
        $isVisible = get_field( 'page_is_visible' );
        wp_reset_query();
      }
      ?>
      <?php
      if ( $isVisible == 1 ) {
        ?>
        <section id="contact" class="contact">
          <div class="content">
            <?php get_template_part( 'partials/contactform' ); ?>
          </div>
        </section>
        <?php
      }
      ?>

    </main><!-- #main -->
  </div><!-- #primary -->

<?php
get_footer();
