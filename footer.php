<?php

/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package storefront
 */

?>

</div><!-- .col-full -->
</div><!-- #content -->

<?php do_action('storefront_before_footer'); ?>

<footer id="colophon" class="footer" role="contentinfo">
	<div class="footer__lines">
		<div class="footer__lines--upper"> </div>
		<div class="footer__lines--lower"></div>
	</div>
	<div class="footer__menu">
		<div class="wrapper navFooter margin_0_10">
			<nav class="footer__menu menu" id="mainNav" aria-label="Menu principal">
				<?php
				/**
				 * wp_nav_menu() permet d'intégrer un menu de worpress avec ces paramètres
				 * @link https://developer.wordpress.org/reference/functions/wp_nav_menu/
				 */
				wp_nav_menu(array(
					'theme_location' => 'footer-propos',
					'container'      => false,
					'menu_class'     => 'menu__list',
					'depth'          => 2,
					'walker'         => new MyCustom_Walker_Nav_Menu()
				));
				?>
			</nav>
			<nav class="footer__menu menu" id="mainNav" aria-label="Menu principal">
				<?php
				/**
				 * wp_nav_menu() permet d'intégrer un menu de worpress avec ces paramètres
				 * @link https://developer.wordpress.org/reference/functions/wp_nav_menu/
				 */
				wp_nav_menu(array(
					'theme_location' => 'footer-service',
					'container'      => false,
					'menu_class'     => 'menu__list',
					'depth'          => 2,
					'walker'         => new MyCustom_Walker_Nav_Menu()
				));
				?>
			</nav>
			<nav class="footer__menu menu" id="mainNav" aria-label="Menu principal">
				<?php
				/**
				 * wp_nav_menu() permet d'intégrer un menu de worpress avec ces paramètres
				 * @link https://developer.wordpress.org/reference/functions/wp_nav_menu/
				 */
				wp_nav_menu(array(
					'theme_location' => 'footer-legale',
					'container'      => false,
					'menu_class'     => 'menu__list',
					'depth'          => 2,
					'walker'         => new MyCustom_Walker_Nav_Menu()
				));
				?>
			</nav>
			<div class="footer__menu--encart-rs">
				<div class=""><a href="<?php bloginfo('url'); ?>/index.php">
						<?php $asset_path = get_asset_path(); ?>
						<img src="<?php echo $asset_path; ?>/logo/logo_besancon/LogoBF_long_white.svg" alt="Description de l'image" onmouseover="this.src='<?php echo $asset_path; ?>/logo/logo_besancon/LogoBF_long_black.svg'" onmouseout="this.src='<?php echo $asset_path; ?>/logo/logo_besancon/LogoBF_long_white.svg'">
					</a>
				</div>
				<div class="rs">
					<a href=""><img src="<?php echo $asset_path; ?>/logo/svg/facebook.svg" alt="logo de Facebook"></a>
					<a href=""><img src="<?php echo $asset_path; ?>/logo/svg/instagram.svg" alt="logo de instagram"></a>
					<a href=""><img src="<?php echo $asset_path; ?>/logo/svg/twitter.svg" alt="logo de twitter"></a>
					<a href=""><img src="<?php echo $asset_path; ?>/logo/svg/youtube.svg" alt="logo de youtube"></a>
				</div>
			</div>
		</div>
		<div class="footer__partenaire">
			<div class="partariat wrapper margin_0_10">
				<?php
				// Récupération de la liste de partenaires
				$partenaires = get_posts(array(
					'post_type' => 'partenariat',
					'posts_per_page' => -1,
				));

				// Affichage de la liste de partenaires
				if (!empty($partenaires)) {
					foreach ($partenaires as $partenaire) {
						$rang = get_field('rang', $partenaire->ID);
						if ($rang == "Institutionnels" || $rang == "Prestiges") {
							$url = get_field('url', $partenaire->ID);
							$logo = get_field('logo', $partenaire->ID);
							$description = get_field('description', $partenaire->ID);
							echo '<div>';
							echo '<a href="' . esc_url($url) . '" target="_blank">';
							echo '<img src="' . esc_url($logo['url']) . '"width="100px" height:"auto" alt="' . esc_attr($logo['alt']) . '">';
							echo '</a>';
							echo '</div>';
						}
					}
				} else {
					echo "pas de part";
				}
				?>
			</div>
		</div>
</footer>
<?php wp_footer(); ?>

</body>

</html>