<!-- get locations and dates of all truck stops -->
<?php

setlocale( LC_ALL, 'de_DE' );

class TruckStop {
  public $date;
  public $address;
}

$query      = new WP_Query( array( 'post_type' => 'truckstops', 'order' => 'ASC' ) );
$truckStops = array();

if ( $query->have_posts() ) {
  while ( $query->have_posts() ) {
    $stop = new TruckStop();
    $query->the_post();

    $stop->market           = get_field( 'truckstop_market' );
    $stop->address          = get_field( 'truckstop_address' );
    $stop->addressFormatted = get_field( 'truckstop_address_formatted' );
    $stop->date             = get_field( 'truckstop_date' );
    $stop->time             = get_field( 'truckstop_time' );
    $stop->contactperson    = get_field( 'truckstop_contactperson' );
    $stop->notes            = get_field( 'truckstop_notes' );

    array_push( $truckStops, $stop );
  }
  wp_reset_query();
}

$mainQuery   = new WP_Query( 'pagename=next-truck-stops' );
$mainTitle   = '';
$mainContent = '';

if ( $mainQuery->have_posts() ) {
  while ( $mainQuery->have_posts() ) {
    $mainQuery->the_post();
    $mainTitle   = get_the_title();
    $mainContent = get_the_content();
  }
  wp_reset_query();
}

?>


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


      <?php

      $stopCount   = count( $truckStops );
      // breakCount defines how many items are initially visible
      $breakCount  = 4;
      $loopCounter = 0;

      foreach ( $truckStops as $stop ) {
        $loopCounter ++;
        if ( $loopCounter > $breakCount ) {
          break;
        }
        ?>
        <div class="row" id="<?php echo 'Test' ?>">
          <div class="date / col-sm-2">
            <span class="title">Datum und Uhrzeit</span>
            <div class="content">
              <strong><?php echo strftime( '%d. %B %Y', strtotime( $stop->date ) ) ?></strong>
              <br>
              <?php echo $stop->time ?>
            </div>
          </div>
          <div class="address / col-xs-6 col-sm-3">
            <span class="title">Adresse</span>
            <div class="content">
              <strong>
                <?php echo $stop->market ?></strong>
              <br>
              <?php echo $stop->addressFormatted ?>
            </div>
          </div>
          <div class="contactperson / col-xs-6 col-sm-3">
            <span class="title <?php if ( empty( $stop->contactperson ) )
              echo 'hidden' ?>">Ihr Ansprechpartner</span>
            <div class="content">
              <?php echo $stop->contactperson ?>
            </div>
          </div>
          <div class="hints / col-xs-12 col-sm-4">
            <span class="title <?php if ( empty( $stop->notes ) )
              echo 'hidden' ?>">Hinweise</span>
            <div class="content">
              <?php echo $stop->notes ?>
            </div>
          </div>
        </div>
        <?php
      }
      ?>

      <!--        show first seven entries -->
      <?php
      $subArr = array_slice( $truckStops, $loopCounter - 1 );

      if ( count( $subArr ) > 0 && $stopCount > $breakCount) {

        ?>
        <div id="hiddenTimeSlots" class="timeslots collapse invertHighlight">

          <?php
          foreach ( $subArr as $stop ) {
            ?>
            <div class="row" id="<?php echo 'Test' ?>">
              <div class="date / col-sm-2">
                <span class="title">Datum und Uhrzeit</span>
                <div class="content">
                  <strong><?php echo strftime( '%d. %B %Y', strtotime( $stop->date ) ) ?></strong>
                  <br>
                  <?php echo $stop->time ?>
                </div>
              </div>
              <div class="address / col-xs-6 col-sm-3">
                <span class="title">Adresse</span>
                <div class="content">
                  <strong>
                    <?php echo $stop->market ?></strong>
                  <br>
                  <?php echo $stop->addressFormatted ?>
                </div>
              </div>
              <div class="contactperson / col-xs-6 col-sm-3">
                <span class="title <?php if ( empty( $stop->contactperson ) )
                  echo 'hidden' ?>">Ihr Ansprechpartner</span>
                <div class="content">
                  <?php echo $stop->contactperson ?>
                </div>
              </div>
              <div class="hints / col-xs-12 col-sm-4">
                <span class="title <?php if ( empty( $stop->notes ) )
                  echo 'hidden' ?>">Hinweise</span>
                <div class="content">
                  <?php echo $stop->notes ?>
                </div>
              </div>
            </div>
            <?php
          }
          ?>

        </div>
        <?php
      }
      ?>


    </div>

    <div class="showMore <?php if($stopCount <= $breakCount) echo 'hidden' ?>">
        <span type="button" data-toggle="collapse" data-target="#hiddenTimeSlots" aria-expanded="false"
              aria-controls="timeslots" class="fa fa-lg fa-chevron-down">
        </span>
    </div>
  </div>

</div>

<!-- Add location markers on map-->
<div class="mapsWrapper / fullwidth">
  <div class="acf-map">
    <?php
    foreach ( $truckStops as $stop ) {
        $location = $stop->address;
      ?>
      <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>">
        <h4><?php echo $stopDates[ $counter ]; ?></h4>
        <div class="content">
          <div class="row">
            <div class="col-xs-12"><span class="customer"><?php echo $stop->market; ?></span></div>
            <div class="col-xs-12"><span class="date"><?php echo strftime( '%d. %B %Y', strtotime( $stop->date ) ) ?></span></div>
            <div class="col-xs-12"><span class="time"><?php echo $stop->time; ?></span></div>
            <div class="col-xs-12"><span class="address"><?php echo $stop->addressFormatted; ?></span></div>
          </div>
        </div>
      </div>
      <?php
    }
    ?>
  </div>
</div>

