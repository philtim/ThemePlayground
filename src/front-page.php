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
    <main id="main" class="site-main column" role="main">

      <!-- #masthead -->
      <section id="home" class="masthead">
        <div class="content">
          <?php get_template_part( 'partials/masthead' ); ?>
        </div>
      </section>

      <!-- #truckStops -->
      <section id="truckStops" class="truckStops">
        <div class="content">
          <?php get_template_part( 'partials/truckStops' ); ?>
        </div>
      </section>

      <!-- #truckInformation -->
      <section id="truckInformation" class="truckInformation">
        <div class="content">
          <?php get_template_part( 'partials/truckInformation' ); ?>
        </div>
      </section>

      <!-- #truckExperience -->
      <section id="truckExperience" class="truckExperience">
        <div class="content">
          <?php get_template_part( 'partials/truckExperience' ); ?>
        </div>
      </section>

      <!-- #socialFeed -->
      <section id="socialFeed" class="socialFeed">
        <div class="content">
          <?php get_template_part( 'partials/socialFeed' ); ?>
        </div>
      </section>

      <!-- #contest -->
      <section id="contest" class="contest">
        <div class="content">
          <?php get_template_part( 'partials/contest' ); ?>
        </div>
      </section>

      <!-- #socialFeed -->
      <section id="contactform" class="contactform">
        <div class="content">
          <?php get_template_part( 'partials/contactform' ); ?>
        </div>
      </section>

    </main><!-- #main -->
  </div><!-- #primary -->

<?php
get_footer();
