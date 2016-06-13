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

      <!-- #truckStops -->
      <section id="truckStops" class="truckStops">
        <?php get_template_part( 'partials/truckStops' ); ?>
      </section>

      <!-- #truckInformation -->
      <section id="truckInformation" class="container truckInformation">
        <hr>
        <div class="content">
          <?php get_template_part( 'partials/truckInformation' ); ?>
        </div>
        <hr>
      </section>

      <!-- #truckExperience -->
      <section id="truckExperience" class="container truckExperience">
        <div class="content">
          <?php get_template_part( 'partials/truckExperience' ); ?>
        </div>
        <hr>
      </section>

      <!-- #socialFeed -->
      <section id="socialFeed" class="container socialFeed">
        <div class="content">
          <?php get_template_part( 'partials/socialFeed' ); ?>
        </div>
        <hr>
      </section>

      <!-- #contest -->
      <section id="contest" class="contest">
        <?php get_template_part( 'partials/contest' ); ?>
      </section>

      <!-- #socialFeed -->
      <section id="contact" class="contact">
        <div class="content">
          <?php get_template_part( 'partials/contactform' ); ?>
        </div>
      </section>

    </main><!-- #main -->
  </div><!-- #primary -->

<?php
get_footer();
