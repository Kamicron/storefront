<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package storefront
 */

get_header(); ?>

<section class="hero">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h1>Votre proposition de valeur unique</h1>
        <p>Une description concise de votre proposition de valeur unique qui met en avant ce qui vous différencie de la concurrence.</p>
        <a href="#" class="btn btn-primary">Achetez maintenant</a>
      </div>
      <div class="col-md-6">
        <img src="image-hero.jpg" alt="Image de mise en valeur des produits">
      </div>
    </div>
  </div>
</section>

<section class="featured-products">
  <div class="container">
    <h2>Nos produits vedettes</h2>
    <div class="row">
      <?php
      $args = array(
        'post_type' => 'product',
        'posts_per_page' => 4,
        'meta_key' => '_featured',
        'meta_value' => 'yes'
      );
      $featured_products = new WP_Query( $args );
      if ( $featured_products->have_posts() ) :
        while ( $featured_products->have_posts() ) : $featured_products->the_post();
          wc_get_template_part( 'content', 'product' );
        endwhile;
        wp_reset_postdata();
      else :
        echo __( 'Aucun produit vedette trouvé' );
      endif;
      ?>
    </div>
  </div>
</section>


<section class="related-products">
  <div class="container">
    <h2>Nos produits connexes</h2>
    <div class="row">
      <?php
      $args = array(
        'post_type' => 'product',
        'posts_per_page' => 3,
        'orderby' => 'rand'
      );
      $related_products = new WP_Query( $args );
      if ( $related_products->have_posts() ) :
        while ( $related_products->have_posts() ) : $related_products->the_post();
          wc_get_template_part( 'content', 'product' );
        endwhile;
        wp_reset_postdata();
      else :
        echo __( 'Aucun produit connexe trouvé' );
      endif;
      ?>
    </div>
  </div>
</section>

<section class="about">
  <div class="container">
    <h2>À propos de notre entreprise</h2>
    <div class="row">
      <div class="col-md-6">
        <p>Notre entreprise a été créée en 2010 avec pour objectif de fournir des produits de grande qualité à des prix abordables. Nous sommes fiers de notre engagement envers la satisfaction de nos clients et nous travaillons dur pour répondre à leurs besoins.</p>
        <p>Nous offrons une large gamme de produits pour répondre aux besoins de nos clients, de la mode à la maison et plus encore. Nos produits sont soigneusement sélectionnés pour leur qualité, leur durabilité et leur style. Nous sommes convaincus que vous trouverez le produit qui vous convient chez nous.</p>
      </div>
      <div class="col-md-6">
        <img src="about-image.jpg" alt="Image de présentation de notre entreprise">
      </div>
    </div>
  </div>
</section>

<section class="newsletter">
  <div class="container">
    <h2>Inscrivez-vous à notre newsletter</h2>
    <p>Recevez des mises à jour sur nos nouveaux produits, nos offres spéciales et nos promotions.</p>
    <form action="#" method="post">
      <input type="email" name="email" placeholder="Entrez votre adresse e-mail" required>
      <button type="submit">S'abonner</button>
    </form>
  </div>
</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
do_action( 'storefront_sidebar' );
get_footer();
