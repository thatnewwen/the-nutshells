<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package artisticritique
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->
			<div class="archive-div">
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();
				$post = get_the_ID();
				$picture = get_post_meta($post, '-picture', true);
				$poster = get_post_meta($post, '-poster', true);

				if ($poster != '') {
				    		  echo '<div class="archive-image-container"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark"><img class="archive-poster" src="' . $poster . '"></a></div>';
				    		} 		
				    		if ($picture != '') {
				    		  echo '<div class="archive-image-container"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark"><img class="archive-picture" src="' . $picture . '"></a></div>';
				    		}

			endwhile;

						?></div><div class="posts-nav">
				  <?php echo get_previous_posts_link( '<span class="nav-text-arrow"><i class=" arrow fa fa-chevron-up"></i></span>' );
				  echo get_next_posts_link( '<span class="nav-text-arrow"><i class="arrow fa fa-chevron-down"></i></span></div>' ); ?>
			  </div><?php

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
