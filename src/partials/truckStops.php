<!-- get locations and dates of all truck stops -->
<?php
$query         = new WP_Query( array( 'post_type' => 'truckstops' ) );
$stopDates     = array();
$stopAddresses = array();

if ( $query->have_posts() ) {
  while ( $query->have_posts() ) {
    $query->the_post();
    the_content();
    array_push( $stopDates, get_field( 'date_for_truck_stop' ) );
    array_push( $stopAddresses, get_field( 'address_for_truck_stop' ) );
  }
  wp_reset_query();
} ?>


<?php if ( $stopAddresses ): ?>

  <div class="container">
    <div class="content">
      <h2>Next Truck Stops</h2>

      <div class="row">
        <!-- Build table with dates -->
        <div class="col-xs-12 col-lg-5">
          <!--              --><?php
          //              $counter = 0;
          //              foreach($stopAddresses as &$location) {?>
          <!--                <div class="marker" data-lat="--><?php //echo $location['lat']; ?><!--" data-lng="-->
          <?php //echo $location['lng'];?><!--">-->
          <!--                  <h4>--><?php //echo $stopDates[$counter]; ?><!--</h4>-->
          <!--                  <p class="address">--><?php //echo $location['address']; ?><!--</p>-->
          <!--                </div>-->
          <!--                --><?php
          //                $counter++;
          //              }
          //              ?>


          <div class="timeTable">

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
                  <td><strong>Lorem Ipsum Mark</strong><br>Musterstrasse 2<br>12345 Testhausen<br></td>

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

            <div id="collapseExample" class="collapse">
              <table class="table forum table-striped">
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

          </div>

          <div class="showMore">
            <span type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" class="fa fa-lg fa-chevron-down">
            </span>
          </div>

        </div>


      </div>
    </div>
  </div>

  <!-- Add location markers on map -->
  <div class="mapsWrapper / fullwidth">
    <div class="acf-map">
      <?php
      $counter = 0;
      foreach ( $stopAddresses as &$location ) { ?>
        <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>">
          <h4><?php echo $stopDates[ $counter ]; ?></h4>
          <p class="address"><?php echo $location['address']; ?></p>
        </div>
        <?php
        $counter ++;
      }
      ?>
    </div>
  </div>


<?php endif; ?>
