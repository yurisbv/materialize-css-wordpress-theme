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
<div class="container">
	<div class="row">
		<div id="header_sidebar" class="col s12 m10 l10">
			<?php dynamic_sidebar('header_widgets'); ?>
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
					<div class="col s12 m12 l12">
						<?php if ( have_posts()):
							if (is_home() && ! is_front_page()): ?>
							<header>
								<h2 class="page-title screen-reader-text">
									<?php single_post_title(); ?>
								</h2>
							</header>
						<?php endif;
							while (have_posts()) : the_post(); 
								get_template_part( 'template-parts/content', get_post_format());
							endwhile;
						wp_materialized_pagination();
						else:
							get_template_part( 'template-parts/content', 'none' );
					endif; ?>
				</div>
			</main>
			</div>
		</div>
		<?php get_sidebar(); ?>
	</div>
	
<?php get_footer(); ?>

