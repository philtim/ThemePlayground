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
          <div class="quickNav hidden-xs">
              <div class="clearfix">
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
          <div class="copy col-xs-12">
            <p class="col">
              Der fischer Truck on Tour. Erleben Sie vor Ort das einzigartige <a href="#truckExperience">mobile Schulungs-, Ausstellungs- und Erlebniscenter</a>. Handwerker erweitern in kleinen Gruppen ihr Fachwissen in Theorie und Praxis. Heimwerker lernen die Vielfalt der Befestigungslösungen kennen und können selbst Produkte testen. Immer an Bord: die einzigartige Kompetenz unserer erfahrenen fischer Befestigungsexperten: Know-how und praktische Tipps von Profis. All das und noch mehr bietet der multifunktionale fischer Truck. Schauen Sie mal rein (Link Landingpage Infobox 2). Der fischer Truck macht sicher auch in Ihrer Nähe Halt. Schauen Sie einfach in die <a href="#truckStops">Tourdaten</a>, informieren Sie sich als Handwerker bei fischer (Link Kontaktfeld) oder Ihrem Fachhändler zu Veranstaltungen vor Ort. Freuen Sie sich auf geballte Befestigungspower, Aktionen und Gewinnspiele.
            </p>
          </div>
        </div>
      </section>


      <!-- #truckStops -->
      <section id="truckStops" class="truckStops">
        <div class="clearfix content / column">
          <div class="col-xs-12">

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

              <h2>Next Truck Stops</h2>

          <div class="row">
            <!-- Build table with dates -->
            <div class="timeTable / hidden-xs col-xs-12 col-lg-5">
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


              <table class="table forum table-striped">
                <thead>
                  <tr>
                    <th class="cell-stat">Datum</th>
                    <th class="cell-stat">Uhrzeit</th>
                    <th class="cell-stat">Ort</th>
                    <th class="cell-stat-2x">Beschreibung</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>20. Juni 2016</td>
                    <td>ab 12:00 Uhr</td>
                    <td>Lorem Ipsum Mark<br><br>Musterstrasse 2<br>12345 Testhausen<br></td>

                    <td>Hinweise zu Ansprechpartner, Aktionen, etc.</td>
                  </tr>
                  <tr>
                    <td>20. Juni 2016</td>
                    <td>ab 12:00 Uhr</td>
                    <td>Lorem Ipsum Mark<br><br>Musterstrasse 2<br>12345 Testhausen<br></td>

                    <td>Hinweise zu Ansprechpartner, Aktionen, etc.</td>
                  </tr>
                </tbody>
              </table>
            </div>

            <!-- Add location markers on map -->
            <div class="mapsWrapper / col-xs-12 col-lg-7">
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
          </div>
        </div>
          <?php endif; ?>

        </div>
        </div>
      </section>

      <!-- #truckInformation -->
      <section id="truckInformation" class="truckInformation">
        <div class="content / column">
          <div class="col-xs-12">
<!--            --><?php
//            $args = array(
//              'post_type' => 'truckinformation',
//              'order' => 'ASC',
//            );
//            $query = new WP_Query($args);
//            if($query -> have_posts()) {
//              while ( $query->have_posts() ) {
//                $query->the_post();
//                the_content();
//              }
//              wp_reset_query();
//            }
            ?>
            <h2>TruckTour inside</h2>
          </div>
        </div>
      </section>

      <!-- #truckExperience -->
      <section id="truckExperience" class="truckExperience">
        <div class="content / column">
          <div class="col-xs-12">
<!--            --><?php
//            $query = new WP_Query(array('post_type' => 'truckexperience'));
//            if($query -> have_posts()) {
//              while ( $query->have_posts() ) {
//                $query->the_post();
//                the_content();
//              }
//              wp_reset_query();
//            }
//            ?>
            <h2>Das Truck Erlebnis</h2>
          </div>
        </div>
      </section>

      <!-- #socialFeed -->
      <section id="socialFeed" class="socialFeed">
        <div class="content / column">
          <div class="col-xs-12">
<!--            --><?php
//            $query = new WP_Query(array('post_type' => 'socialfeed'));
//            if($query -> have_posts()) {
//              while ( $query->have_posts() ) {
//                $query->the_post();
//                the_content();
//              }
//              wp_reset_query();
//            }
//            ?>
            <h2>Impressionen </h2>
            <p>Platzhalter für Plugin um Facebook und Instagram feeds anzuzeigen</p>
          </div>
        </div>
      </section>

      <!-- #contest -->
      <section id="contest" class="contest">
        <div class="content">
          <div class="col-xs-12">

            <h2>Gewinnspiel</h2>

            <div class="column">
              <p class="col">Allgemeine Informationen zum Gewinnspiel.</p>

              <div class="contestContainer">
                <?php
                $query = new WP_Query(array('post_type' => 'contest'));
                if($query -> have_posts()) {
                  while ( $query->have_posts() ) {
                    $query->the_post();
                    echo '<div class="image" style="background-image: url(',
                    the_post_thumbnail_url();
                    echo ')"></div>';
                  }
                  wp_reset_query();
                }
                ?>
                <div class="textContainer">
                  <h3>Schick uns Dein<br><strong>#fischertrucktour</strong>-Selfie</h3>
                </div>
              </div>

            </div>
            <div class="description">
              <p class="col">Auflisten wie man am Gewinnspiel teilnehmen kann.</p>
            </div>

          </div>
        </div>
      </section>

      <!-- #socialFeed -->
      <section id="contactform" class="contactform">
        <div class="content / column">
          <div class="col-xs-12">
            <!--            --><?php
            //            $query = new WP_Query(array('post_type' => 'socialfeed'));
            //            if($query -> have_posts()) {
            //              while ( $query->have_posts() ) {
            //                $query->the_post();
            //                the_content();
            //              }
            //              wp_reset_query();
            //            }
            //            ?>
            <h2>Kontakt </h2>
            <p>Platzhalter für Plugin um eine E-Mail an die fischerwerke zu senden.</p>
          </div>
        </div>
      </section>


    </main><!-- #main -->
  </div><!-- #primary -->

<?php
get_footer();
