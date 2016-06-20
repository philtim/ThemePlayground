<div class="container">
  <div class="content noPadding">
    <h2>fischer Tour Truck Gewinnspiel</h2>
    <div class="description col">
      Nehmen Sie an unserem Gewinnspiel teil und laden Sie Ihr Selfie mit dem fischer Tour Truck auf Instagram oder facebook unter dem Hashtag #fischerTourTruck hoch. Den Link zum Selfie können Sie dann gemeinsam mit Ihrer Anmeldung hier absenden.
      Einmal monatlich werden dann unter allen Teilnehmenden tolle Preise verlost:
    </div>
    <div class="description">
      Nächste Gewinnchance für alle Einsendungen bis zum 31.07.2016!
    </div>
    <div class="prices / row">
      <div class="item / col-xs-12 col-sm-4">
        <div class="contentWrapper">
          <div class="bgImage" style="background-image: url(http://localhost/fischertruck/wp-content/uploads/2016/06/price01.png)"></div>
          <span>1. Preis</span>
        </div>
      </div>

      <div class="item / col-xs-12 col-sm-4">
        <div class="contentWrapper">
          <div class="bgImage" style="background-image: url(http://localhost/fischertruck/wp-content/uploads/2016/06/price02.png)"></div>
          <span>2. Preis</span>
        </div>
      </div>

      <div class="item / col-xs-12 col-sm-4">
        <div class="contentWrapper">
          <div class="bgImage" style="background-image: url(http://localhost/fischertruck/wp-content/uploads/2016/06/price03.png)"></div>
          <span>3. Preis</span>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="contestContainer">
  <?php
  $query = new WP_Query( array( 'post_type' => 'contest' ) );
  if ( $query->have_posts() ) {
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

<div class="container">
  <div class="content">

    <div class="row">
      <div class="col-xs-12 col-sm-8"><div class="contestForm">
        <h3>Jetzt mitmachen und Gewinnen</h3>
        <?php echo do_shortcode('[contact-form-7 id="93" title="Gewinnspiel"]') ?>
      </div>
    </div>


  </div>
</div>
