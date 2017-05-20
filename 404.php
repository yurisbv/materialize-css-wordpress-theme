<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package materialize_css
 */

get_header(); ?>

	<div class="col m1 l1"></div>
	<div id="primary" class="content-area col s12 m8 l8">
		<main id="main" class="site-main" role="main">
			<section class="error-404 not-found">
				<header class="page-header">
					<h2 class="page-title"><?php esc_html_e( 'Ops! Não localizamos nada.', 'materialize-css' ); ?></h2>
				</header>
		</main>
	</div>
	<div class="col m1 l1"></div>
<?php
get_sidebar();
get_footer();
