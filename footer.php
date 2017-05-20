<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package materialize_css
 */

?>

	</div><!-- #content -->

<footer id="footer" class="page-footer" role="contentinfo">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <?php if ( dynamic_sidebar('footerleft_widgets') ) : else : endif; ?>
              </div>
              <div class="col l4 offset-l2 s12">
                  <?php if ( dynamic_sidebar('footerright_widgets') ) : else : endif; ?>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            	<p class="center">© 2017 Copyright - Produzido por <a class="grey-text text-lighten-4" target="_blank" href="https://www.worpdres.com">Worpress</a>. Criado por <a class="grey-text text-lighten-4" target="_blank" href="https://www.github.com/yurisbv">yurisbv</a>.
	            <p>
            </div>
          </div>
        </footer>
</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>
