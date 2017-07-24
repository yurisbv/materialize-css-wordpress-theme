<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package materialize_css
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  
    <?php
    if (is_single()):
      the_title('<h3 class="entry-title">', '</h3>');
    else: ?>
	<div class="col s12 m7 l6">
	<div class="card z-depth-4">
	<header class="entry-header">
	<div class="card-image">
    	<?php esc_url( the_post_thumbnail(array(450,400)));?>
    	<span class="card-title"><?php card_category(); ?></span>
   	</div>
    <?php endif;?>
	</header>	
	<div class="card-content">
	<?php if (is_single()): 
			the_content(); 
		else: ?>
				<a href="<?php the_permalink();?>">
					<?php the_title( '<p class="card-title-text">', '</p>' );?>
				</a>
		    	<?php if ( 'post' === get_post_type()): ?>
		       		<div class="entry-meta">
		    		<?php materialize_css_posted_on(); ?>
		    		</div>
	    		<?php endif; ?>
	    <?php endif; ?>
	  <div class="card-action">
	    <?php
	      if (has_excerpt()):
	      	the_excerpt();
	      else:
		    	the_content();
	      endif;
	      wp_link_pages( array(
	        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'materialize-css' ),
	        'after'  => '</div>',
	      ));
	    ?>
	  </div>
	</div>
</article>
