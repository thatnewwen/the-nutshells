<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package artisticritique
 */

?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <?php the_post_thumbnail('full'); ?>

  <div class="post-content">
    <div class="image-header">
      <div class="image-header-dark"></div>
        <?php $post = get_the_ID();
				?><div class="category-div"><?php the_category(', ',''); ?></div><?php
    		$picture = get_post_meta($post, '-picture', true);
    		$poster = get_post_meta($post, '-poster', true);
    		$score = get_post_meta($post, '-score', true);
    		$title = get_post_meta($post, '-title', true);
    		

    		if ($poster != '') {
    		  echo "<div class='image-container'><img class='poster' src='" . $poster . "'></div>";
    		} 		
    		if ($picture != '') {
    		  echo "<div class='image-container'><img class='picture' src='" . $picture . "'></div>";
    		} 		?>

    		<div class='title-div'><span> <?php the_date() 
    		?> </span></div>


    </div>

	<header class="entry-header">
		<?php

			if ( is_single() ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
				
				if ($title != '') {
					echo "<div class='title'>" . $title . "</div>";
				}

			} else {
				the_title( '<h2 class="entry-title">','</h2>' );

				if ($title != '') {
					echo "<div class='title'>" . $title . "</div>";
				}
			}

		if ( 'post' === get_post_type() ) : ?>

		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<?php
		if ( is_single() ) { ?>
			<div class="content">
				<?php the_content(); ?>
			</div>
			<div class="post-meta">
			  <?php
			    $post = get_the_ID();
			    $picture = get_post_meta($post, '-picture', true);
			    $poster = get_post_meta($post, '-poster', true);
			    $score = get_post_meta($post, '-score', true);
			    $title = get_post_meta($post, '-title', true);
			    
			    if ($picture != '') {
			      echo "<img class='picture' src='" . $picture . "'>";
			    }

			    if ($poster != '') {
			      echo "<img class='poster' src='" . $poster . "'>";
			    }

			    if ($title != '') {
			    	echo "<div class='title'>" . $title . "</div>";
			    }

			    echo "<div class='border-right'></div>";

			    $fields = get_post_custom();
			    foreach ( $fields as $key => $value ) {
			      if (strpos($key, '=') === 0) {
			        echo "<div class='key'>" . substr($key, 1) . "</div>";
			        echo "<div>" . join($value) . "</div>";
			      }
			      else if (strpos($key, '-') !== 0 && strpos($key, '_') !== 0) {
			        echo "<div class='key'>" . $key . "</div>";

			        $tags = explode(', ', $value[0]);

			        foreach($tags as $tag) {

			          $tagUrl = site_url() . "/?tag=" . str_replace(' ', '-', $tag);
			          echo "<div class='tag-name'> <a href='" . $tagUrl . "'>" . $tag . "</a></div>";
			        }
			      }
			    }

			    echo "<div class='score'>" . $score . "</div>";
			  ?>
			</div>
		<?php } else { ?>
				<div class="index-content">
					<?php the_content(); 
								    $post = get_the_ID();

					  $score = get_post_meta($post, '-score', true);
					  
					  if ($score != '') {
				    echo "<div class='score'>" . $score . "</div>";
					  } ?>
				</div>
				<div class="rating-bar"></div>
			</div>
			<?php } ?>
			</article><!-- #post-## -->

