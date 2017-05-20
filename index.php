<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package materialize_css
 */

get_header(); ?>
	<?php $url = $_SERVER['REQUEST_URI'];?>
	<?php if($url=='/')
			{
				require_once 'featured.php';
			}
			else
			{
				echo '<div id="parte" class="col s12 m10 l10">';
			}
	?>

	<div id="primary" class="content-area">
		<div class="divider col s12 m12 l12"></div>
		<main id="main" class="site-main" role="main">
		<div class="col s12 m10 l10">
		

		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>

			<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;
			wp_materialized_pagination();
			
		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>
		</div>
		</main><!-- #main -->
	</div><!-- #primary -->
	</div><!-- Fim do col m9 l9 -->
	
<?php
//get side bar movido para o featured
get_sidebar();
get_footer();
