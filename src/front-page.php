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
        <div class="quickNav">
            <div class="column clearfix">
              <a href="#truckStops" class="quicklink / col-xs-12 col-sm-2">
                <div class="content">
                  <h4>Next Truck Stops</h4>
                  <p>Der fischer Truck in Ihrer Nähe. Seien Sie live mit dabei.</p>
                </div>
              </a>
              <a href="#truckInformation" class="quicklink / col-xs-12 col-sm-2">
                <div class="content">
                  <h4>TruckTour inside</h4>
                  <p>Der fischer Truck von innen: mobile Akademie und Erlebnis-Location.</p>
                </div>
              </a>
              <a href="#truckExperience" class="quicklink / col-xs-12 col-sm-2">
                <div class="content">
                  <h4>Das Truck Erlebnis</h4>
                  <p>Dübel selbst testen, Profi-Wissen nutzen, und Preise gewinnen.</p>
                </div>
              </a>
              <div class="quicklink / col-xs-12 col-sm-2">
                <div class="content">
                  <h4>Impressionen</h4>
                  <p>tbd</p>
                </div>
              </div>
              <div class="quicklink / col-xs-12 col-sm-2">
                <div class="content">
                  <h4>Gewinnspiel </h4>
                  <p>tdb</p>
                </div>
              </div>
            </div>

          </div>
        <div class="content / column">
          <div class="col-xs-12">
            Der fischer Truck on Tour. Erleben Sie vor Ort das einzigartige <a href="#truckExperience">mobile Schulungs-, Ausstellungs- und Erlebniscenter</a>. Handwerker erweitern in kleinen Gruppen ihr Fachwissen in Theorie und Praxis. Heimwerker lernen die Vielfalt der Befestigungslösungen kennen und können selbst Produkte testen. Immer an Bord: die einzigartige Kompetenz unserer erfahrenen fischer Befestigungsexperten: Know-how und praktische Tipps von Profis. All das und noch mehr bietet der multifunktionale fischer Truck. Schauen Sie mal rein (Link Landingpage Infobox 2). Der fischer Truck macht sicher auch in Ihrer Nähe Halt. Schauen Sie einfach in die Tourdaten (Link Content Landingpage Infobox 1), informieren Sie sich als Handwerker bei fischer (Link Kontaktfeld) oder Ihrem Fachhändler zu Veranstaltungen vor Ort. Freuen Sie sich auf geballte Befestigungspower, Aktionen und Gewinnspiele.

          </div>
        </div>
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
<!--              --><?php
//              $counter = 0;
//              foreach($stopAddresses as &$location) {?>
<!--                <div class="marker" data-lat="--><?php //echo $location['lat']; ?><!--" data-lng="--><?php //echo $location['lng'];?><!--">-->
<!--                  <h4>--><?php //echo $stopDates[$counter]; ?><!--</h4>-->
<!--                  <p class="address">--><?php //echo $location['address']; ?><!--</p>-->
<!--                </div>-->
<!--                --><?php
//                $counter++;
//              }
//              ?>

              <h2>Next Truck Stops</h2>
              <table class="table forum table-striped">
                <thead>
                  <tr>
                    <th class="cell-stat"></th>
                    <th class="cell-stat">Datum</th>
                    <th class="cell-stat text-center">Uhrzeit</th>
                    <th class="cell-stat text-center">Ort</th>
                    <th class="cell-stat-2x">Beschreibung</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class="text-center"><i class="fa fa-map-marker fa-2x"></i></td>
                    <td>
                      <h5><a href="#">More more more</a><br><small>Category description</small></h5>
                    </td>
                    <td class="text-center"><a href="#">6532</a></td>
                    <td class="text-center"><a href="#">152123</a></td>
                    <td class="">by <a href="#">Jane Doe</a><br><small><i class="fa fa-clock-o"></i> 3 months ago</small></td>
                  </tr>
                  <tr>
                    <td class="text-center"><i class="fa fa-magic fa-2x text-primary"></i></td>
                    <td>
                      <h5><a href="#">Haha</a><br><small>Category description</small></h5>
                    </td>
                    <td class="text-center"><a href="#">6532</a></td>
                    <td class="text-center"><a href="#">152123</a></td>
                    <td class="">by <a href="#">Jane Doe</a><br><small><i class="fa fa-clock-o"></i> 1 years ago</small></td>
                  </tr>
                </tbody>
              </table>
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
