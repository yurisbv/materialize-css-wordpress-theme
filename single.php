<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package materialize_css
 */
get_header(); ?>

<div class="container">
<div class="row">
	<div class="col s12 m10 l10">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">		
				<?php
					while (have_posts()): the_post();
						get_template_part( 'template-parts/content', get_post_format() );
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
					endwhile;?>
			</main><!-- #main -->	
		</div><!-- #primary -->
	</div>
<?php
get_sidebar(); ?>
</div>


<?php get_footer(); ?>
