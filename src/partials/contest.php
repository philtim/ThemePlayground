<div class="container">
  <div class="content noPadding">
    <h2>Gewinnspiel</h2>
    <div class="description col">
      Toffee muffin pie apple pie sesame snaps. Muffin jujubes biscuit tiramisu carrot cake marshmallow croissant pastry. Soufflé brownie topping. Croissant soufflé gummies lollipop chocolate bar carrot cake. Toffee chocolate cake jujubes chocolate apple pie sugar plum pie. Cookie chocolate lollipop liquorice halvah sugar plum icing.
      Jelly topping lemon drops icing. Muffin marshmallow candy halvah muffin topping marshmallow powder cake. Cookie toffee candy canes icing. Biscuit ice cream fruitcake. Powder fruitcake gummi bears marshmallow lemon drops oat cake cake macaroon toffee. Jelly oat cake lollipop topping. Pastry macaroon tootsie roll dessert topping jujubes.
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
      <div class="col-xs-12 col-sm-6"><div class="contestForm">
          <h3>Jetzt mitmachen und Gewinnen</h3>
          <?php echo do_shortcode('[contact-form-7 id="93" title="Gewinnspiel"]') ?>
        </div></div>
      <div class="col-xs-12 col-sm-6"><div class="prices">
          <ul>
            <li class=""><img src="http://localhost/fischertruck/wp-content/uploads/2016/06/price01.png" alt=""><span>1. GoPro Hero 4 black</span></li>
            <li class=""><img src="http://localhost/fischertruck/wp-content/uploads/2016/06/price02.png" alt=""><span>2. Drone Video Foto HD Kamera</span></li>
            <li class=""><img src="http://localhost/fischertruck/wp-content/uploads/2016/06/price03.png" alt=""><span>3. fischertechnik Profi Dynamik XL</span></li>
          </ul>
        </div></div>
    </div>







  </div>
</div>
