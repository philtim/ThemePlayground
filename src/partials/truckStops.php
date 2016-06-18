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
}


$mainQuery = new WP_Query('pagename=next-truck-stops');
$mainTitle = '';
$mainContent = '';

if ( $mainQuery->have_posts() ) {
  while ( $mainQuery->have_posts() ) {
    $mainQuery->the_post();
    $mainTitle = get_the_title();
    $mainContent = get_the_content();
  }
  wp_reset_query();
}

?>


<?php if ( $stopAddresses ): ?>

  <div class="container">
    <div class="content">
      <h2><?php echo $mainTitle ?></h2>
      <p class="col"><?php echo $mainContent ?></p>

      <div class="table forum table-striped">
        <div class="header / row hidden-xs">
          <div class="date / col-xs-12 col-sm-2">Datum</div>
          <div class="address / col-xs-12 col-sm-3">Adresse</div>
          <div class="address / col-xs-12 col-sm-3">Ihr Ansprechpartner</div>
          <div class="hints / col-xs-12 col-sm-4">Hinweise</div>
        </div>




        <div class="row">
          <div class="date / col-sm-2">
            <span class="title">Datum und Uhrzeit</span>
            <div class="content">
              20. Juni 2016 <br> 12:00 Uhr
            </div>
          </div>
          <div class="address / col-xs-6 col-sm-3">
            <span class="title">Adresse</span>
            <div class="content">
              <strong>Bauhaus</strong><br>Musterstrasse 2<br>12345 Testhausen</div>
            </div>
          <div class="contactperson / col-xs-6 col-sm-3">
            <span class="title">Ihr Ansprechpartner</span>
            <div class="content">
              Max Musterman
            </div>
          </div>
          <div class="hints / col-xs-12 col-sm-4">
            <span class="title">Hinweise</span>
            <div class="content">
              Sesame snaps marzipan dragée. Pie pie candy bonbon cupcake ice cream. Cupcake biscuit pie dragée sweet macaroon icing gingerbread. Liquorice lemon drops ice cream macaroon jujubes.
            </div>
          </div>
        </div>

        <div class="row">
          <div class="date / col-sm-2">20. Juni 2016 <br> 12:00 Uhr</div>
          <div class="address / col-xs-6 col-sm-3"><strong>Bauhaus</strong><br>Musterstrasse 2<br>12345 Testhausen</div>
          <div class="contactperson / col-xs-6 col-sm-3">Max Musterman</div>
          <div class="hints / col-xs-12 col-sm-4">Hinweise</div>
        </div>

        <div id="hiddenTimeSlots" class="timeslots collapse invertHighlight">
          <div class="row">
            <div class="date / col-sm-2">20. Juni 2016 <br> 12:00 Uhr</div>
            <div class="address / col-xs-6 col-sm-3"><strong>Bauhaus</strong><br>Musterstrasse 2<br>12345 Testhausen</div>
            <div class="contactperson / col-xs-6 col-sm-3">Max Musterman</div>
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
