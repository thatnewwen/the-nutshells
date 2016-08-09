<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package artisticritique
 */

?>

	</div><!-- #content -->


</div><!-- #page -->

<?php wp_footer(); ?>
<footer>
  <span class="footer-span"><span class="darkgray">artisticritique</span><span class="whitesmoke">thenutshells</span></span>
	<nav id="site-navigation" class="main-navigation" role="navigation">
		<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'artisticritique' ); ?></button>
		<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
	</nav><!-- #site-navigation -->
	<a href="http://alexwen.xyz"><div class="mini-name-box">
	  <span class="footer-title">ALEX</span>
	  <span class="footer-title">WEN</span>
	</div></a>
</footer>
</body>
</html>
