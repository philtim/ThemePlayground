<div class="container">
  <div class="content noPadding">
    <h2>fischer TourTruck Gewinnspiel</h2>
    <div class="description col">
      Nehmen Sie an unserem Gewinnspiel teil und laden Sie Ihr Selfie mit dem fischer TourTruck auf Instagram oder facebook unter dem Hashtag #fischerTourTruck hoch. Den Link zum Selfie können Sie dann gemeinsam mit Ihrer Anmeldung hier absenden.
      Einmal monatlich werden dann unter allen Teilnehmenden tolle Preise verlost. Nächste Gewinnchance für alle Einsendungen bis zum 31.07.2016!
    </div>
    <div class="prices / row">
      <div class="item / col-xs-12 col-sm-4">
        <div class="contentWrapper">
          <img src="<?php echo wp_upload_dir()['url'] ?>/price01.png" alt="1. Preis - GoPro 4 Black Edition">
          <span><strong>1. Preis</strong></span>
          <span>GoPro Hero 4 Black Edition</span>
        </div>
      </div>

      <div class="item / col-xs-12 col-sm-4">
        <div class="contentWrapper">
          <img src="<?php echo wp_upload_dir()['url'] ?>/price02.png" alt="2. Preis - Drohne">
          <span><strong>2. Preis</strong></span>
          <span>Jamara Drohne mit Wifi & Full HD Action-Kamera</span>
        </div>
      </div>

      <div class="item / col-xs-12 col-sm-4">
        <div class="contentWrapper">
          <img src="<?php echo wp_upload_dir()['url'] ?>/price03.png" alt="3. Preis - Fischer">
          <span><strong>3. Preis</strong></span>
          <span>fischertechnik Dynamic XL</span>
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
    <h3>Schick uns Dein<br><strong>#fischerTourTruck</strong>-Selfie</h3>
  </div>
</div>

<div class="container">
  <div class="content">

    <div class="row">
      <div class="col-xs-12 col-sm-8"><div class="contestForm">
        <h3>Jetzt mitmachen und gewinnen</h3>
        <?php echo do_shortcode('[contact-form-7 id="93" title="Gewinnspiel"]') ?>
      </div>
    </div>


  </div>
</div>
