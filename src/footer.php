<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package fischertruck
 */

?>

</div><!-- #content -->

<footer id="colophon" class="site-footer" role="contentinfo">
  <div class="site-info / container">
    <div class="row">
      <div class="logo / col-xs-12 col-sm-3">
        <a href="http://www.fischer.de" target="_blank">
          <img src="<?php echo wp_upload_dir()['baseurl'] ?>/2016/05/fischer.png" class="custom-logo"
               alt="fischer - innovative solutions" itemprop="logo"></a>
      </div>
      <div class="col-xs-12 col-sm-9">

        <div class="socialMedia">
          <ul>
            <li><a href="https://www.facebook.com/fischergruppe"><i class="fa fa-lg fa-facebook" aria-hidden="true"></i>
                Facebook</a></li>
            <li><a href="https://www.youtube.com/fischer"><i class="fa fa-lg fa-instagram" aria-hidden="true"></i>
                Instagram</a></li>
            <li><a href="https://www.youtube.com/fischer"><i class="fa fa-lg fa-youtube" aria-hidden="true"></i> Youtube</a>
            </li>
          </ul>
        </div>

        <div class="links">
          <ul>
            <li><a href="http://fischer.de/de-DE/Rechtliches/Datenschutz" target="_blank">Datenschutz</a></li>
            <li><a href="http://fischer.de/de-DE/Rechtliches/Impressum" target="_blank">Impressum</a></li>
            <li><a href="http://fischer.de/-/media/fischer/fischer-de/PDFs/AGB.pdf" target="_blank">Allgemeine Geschäftsbedingungen</a>
            </li>
          </ul>
        </div>
      </div>
      
    </div>


  </div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
