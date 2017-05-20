<?php
/**
 * The template for displaying Contact Page
 * Template Name: Contato
 * @link https://codex.wordpress.org/Template_Hierarchy
 * @package materialize_css
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
	<div class="col s12 m1 l1"></div>
	<div class="col s12 m8 l8">
		<h3>Entre em contato conosco:</h3>
		<form class="col s12">
			<?php  ?>
			<div class="input-field col s12 m5 l4">
	          <input id="nome" type="text" class="validate">
	          <label for="nome">Nome</label>
	        </div>
	        <div class="input-field col s12 m7 l8">
	          <input id="email" type="email" class="validate">
	          <label for="email">Email</label>
	        </div>
			<div class="input-field col s12 m12 l12">
	          <textarea id="mensagem" class="materialize-textarea"></textarea>
	          <label for="mensagem">Mensagem</label>
	        </div>
	        <div class="input-field col s12 m5 l5">
	            <input type="checkbox" id="assinar"/>
		    	<label for="assinar">Avise-me de novas postagem!</label>
		    </div>
		    <div class="input-field col s12 m7 l7">
				<button class="btn waves-effect waves-light" type="submit" name="action">Enviar
					<i class="material-icons right">send</i>
				</button>
			</div>
	     </form>
	</div>
	<div class="col s12 m1 l1"></div>
	</main>
</div>

<?php
get_sidebar();
get_footer();
