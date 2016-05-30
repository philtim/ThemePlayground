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

      <section id="keyvisual">
        <div class="content">
          <?php
          $query = new WP_Query(array('post_type' => 'masthead'));
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

      <section id="information">
        <div class="content">
          <h2>Information about the whole truck event goes here</h2>
        </div>
      </section>

      <section id="maps">
        <div class="content">
          <h2>Maps along with a table will be placed here</h2>
        </div>

      </section>


    </main><!-- #main -->
  </div><!-- #primary -->

<?php
get_footer();
