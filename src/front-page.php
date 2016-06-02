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
        <div class="content / column">
          <!-- get locations and dates of all truck stops -->
          <?php
          $query = new WP_Query(array('post_type' => 'truckstops'));
          $stopDates = array();
          $stopAddresses = array();

          if($query -> have_posts()) {
            while ( $query->have_posts() ) {
              $query->the_post();
              the_content();
              array_push($stopDates, get_field('date_for_truck_stop'));
              array_push($stopAddresses, get_field('address_for_truck_stop'));
            }
            wp_reset_query();
          }
          ?>

          <?php if( $stopAddresses ): ?>


            <!-- Build table with dates -->
            <div class="timeTable / col-xs-12">
              <?php
              $counter = 0;
              foreach($stopAddresses as &$location) {?>
                <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng'];?>">
                  <h4><?php echo $stopDates[$counter]; ?></h4>
                  <p class="address"><?php echo $location['address']; ?></p>
                </div>
                <?php
                $counter++;
              }
              ?>
            </div>

            <!-- Add location markers on map -->
            <div class="mapsWrapper / col-xs-12">
              <div class="acf-map">
                <?php
                $counter = 0;
                foreach($stopAddresses as &$location) {?>
                  <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng'];?>">
                    <h4><?php echo $stopDates[$counter]; ?></h4>
                    <p class="address"><?php echo $location['address']; ?></p>
                  </div>
                <?php
                $counter++;
                }
                ?>
              </div>
            </div>
          <?php endif; ?>


        </div>
      </section>

      <!-- #truckInformation -->
      <section id="truckInformation" class="truckInformation">
        <div class="content / column">
          <div class="col-xs-12">
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
        </div>
      </section>

      <!-- #truckExperience -->
      <section id="truckExperience" class="truckExperience">
        <div class="content / column">
          <div class="col-xs-12">
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
        </div>
      </section>

      <!-- #socialFeed -->
      <section id="socialFeed" class="socialFeed">
        <div class="content / column">
          <div class="col-xs-12">
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
        </div>
      </section>

      <!-- #contest -->
      <section id="contest" class="contest">
        <div class="content / column">
          <div class="col-xs-12">
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
        </div>
      </section>


    </main><!-- #main -->
  </div><!-- #primary -->

<?php
get_footer();
