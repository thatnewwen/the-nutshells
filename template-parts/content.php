<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package artisticritique
 */

if ( is_single() ) { ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  	<div class= "parallax" style="background: url(<?php the_post_thumbnail_url()?>);
    height: 200px;
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;">
    </div>
    <div class="top-content"><?php 
} else { ?>
  <article class="white-bar" id="post-<?php the_ID(); ?>" <?php post_class();?>>
    <div class="side-content"><?php 
}
      $post = get_the_ID();
      $link = get_post_meta($post, '-link', true);
      $review = get_post_meta($post, '-review', true);
      
      if ($link != '') {
        $link_array = explode(', ', $link);
        for ($x = 0; $x <= count($link_array) - 2; $x = $x + 2) {
          if ( is_single() ) { 
            echo "<a class='single-review-tab' href='" . $link_array[$x] . "'>" . $link_array[$x + 1] . "</a>";
          } else {
            echo "<a class='review-tab' href='" . $link_array[$x] . "'>" . $link_array[$x + 1] . "</a>";
          }
        }
      }

      if ( is_single() ) { ?>
        <span class="single-nutshell-tab">Nutshell</span>
      <?php } else { ?>
        <span class="nutshell-tab">Nutshell</span>
      <?php } ?>

    </div>

    <div class="post-content">
      <div class="left-content">
        <div class="image-header"><?php 
          $post = get_the_ID();
      		$picture = get_post_meta($post, '-picture', true);
      		$poster = get_post_meta($post, '-poster', true);
      		$score = get_post_meta($post, '-score', true);
      		$title = get_post_meta($post, '-title', true);
      		
      		if ($poster != '') {
      		  echo "<div class='image-container'><img class='poster' src='" . $poster . "'></div>";
      		} 		

      		if ($picture != '') {
      		  echo "<div class='image-container'><img class='picture' src='" . $picture . "'></div>";
      		}?>

        </div>
        <div class="meta-info"><?php 
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
    	          echo "<div class='tag-name'> /  <a href='" . $tagUrl . "'>" . $tag . "</a></div>";
    	        }
    	      }
    	    } 
    	    echo "<div class='score'>$score</div>"?>
        </div>
      </div><?php
    	if ( is_single() ) { ?>
    		<div class="index-content"><?php 
    			the_title( '<h1 class="entry-title">', '</h1>' );?>
          <div class='title-div'><?php the_category(', ',''); ?> //
            <span>
              <?php the_date()?>
            </span>
          </div><?php
    			the_content(); 
    	    $post = get_the_ID();?>
    		</div><?php 
      } else { ?>
    		<div class="index-content"><?php 
    			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );?>
          <div class='title-div'><?php the_category(', ',''); ?> //
            <span> <?php the_date()?></span>
          </div><?php
    			the_content(); 
    	    $post = get_the_ID();?>
    		</div><?php 
      }?>
    </div>
  </article><!-- #post-## -->

