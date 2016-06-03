<h2>Gewinnspiel</h2>

<div class="column">
  <p class="col">Allgemeine Informationen zum Gewinnspiel.</p>

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

</div>
<div class="description">
  <p class="col">Auflisten wie man am Gewinnspiel teilnehmen kann.</p>
</div>
