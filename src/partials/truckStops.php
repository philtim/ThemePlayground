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

      <div class="table forum table-striped">
        <div class="header / row hidden-xs">
          <div class="date / col-xs-12 col-sm-2">Datum</div>
          <div class="time / col-xs-12 col-sm-2">Uhrzeit</div>
          <div class="address / col-xs-12 col-sm-4">Addresse</div>
          <div class="hints / col-xs-12 col-sm-4">Hinweise</div>
        </div>
        <div class="row">
          <div class="date / hidden-xs col-sm-2">20. Juni 2016</div>
          <div class="time / hidden-xs col-sm-2">12:00 Uhr</div>
          <div class="dateTime / hidden-sm hidden-md hidden-lg col-xs-12">20. Juni 2016 | 12:00 Uhr</div>
          <div class="address / col-xs-12 col-sm-4"><strong>Lorem Ipsum Mark</strong><br>Musterstrasse 2<br>12345 Testhausen</div>
          <div class="hints / col-xs-12 col-sm-4">Hinweise</div>
        </div>
        <div class="row">
          <div class="date / hidden-xs col-sm-2">20. Juni 2016</div>
          <div class="time / hidden-xs col-sm-2">12:00 Uhr</div>
          <div class="dateTime / hidden-sm hidden-md hidden-lg col-xs-12">20. Juni 2016 | 12:00 Uhr</div>
          <div class="address / col-xs-12 col-sm-4"><strong>Lorem Ipsum Mark</strong><br>Musterstrasse 2<br>12345 Testhausen</div>
          <div class="hints / col-xs-12 col-sm-4">Hinweise</div>
        </div>

        <div id="hiddenTimeSlots" class="timeslots collapse invertHighlight">
          <div class="row">
            <div class="date / hidden-xs col-sm-2">20. Juni 2016</div>
            <div class="time / hidden-xs col-sm-2">12:00 Uhr</div>
            <div class="dateTime / hidden-sm hidden-md hidden-lg col-xs-12">20. Juni 2016 | 12:00 Uhr</div>
            <div class="address / col-xs-12 col-sm-4"><strong>Lorem Ipsum Mark</strong><br>Musterstrasse 2<br>12345 Testhausen</div>
            <div class="hints / col-xs-12 col-sm-4">Hinweise</div>
          </div>
          <div class="row">
            <div class="date / hidden-xs col-sm-2">20. Juni 2016</div>
            <div class="time / hidden-xs col-sm-2">12:00 Uhr</div>
            <div class="dateTime / hidden-sm hidden-md hidden-lg col-xs-12">20. Juni 2016 | 12:00 Uhr</div>
            <div class="address / col-xs-12 col-sm-4"><strong>Lorem Ipsum Mark</strong><br>Musterstrasse 2<br>12345 Testhausen</div>
            <div class="hints / col-xs-12 col-sm-4">Hinweise</div>
          </div>
          <div class="row">
            <div class="date / hidden-xs col-sm-2">20. Juni 2016</div>
            <div class="time / hidden-xs col-sm-2">12:00 Uhr</div>
            <div class="dateTime / hidden-sm hidden-md hidden-lg col-xs-12">20. Juni 2016 | 12:00 Uhr</div>
            <div class="address / col-xs-12 col-sm-4"><strong>Lorem Ipsum Mark</strong><br>Musterstrasse 2<br>12345 Testhausen</div>
            <div class="hints / col-xs-12 col-sm-4">Hinweise</div>
          </div>
        </div>

      </div>

      <div class="showMore">
        <span type="button" data-toggle="collapse" data-target="#hiddenTimeSlots" aria-expanded="false" aria-controls="timeslots" class="fa fa-lg fa-chevron-down">
        </span>
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
