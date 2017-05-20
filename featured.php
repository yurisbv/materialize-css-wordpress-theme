<div id="parte" class="col s12 m10 l10">
	<div id="featured-post">
	  <?php $principal = new WP_Query( array( 'category_name' => 'principal' ) );
	    $principal->the_post(); ?>
			<a href="<?php esc_url( the_permalink() ); ?>"><h3 class="hvr-underline-from-center feature-post"><?php the_title(); ?></h3></a><br>
	 		<div class="chip">
	 			<img class="circle responsive-img" src="<?php echo get_avatar_url(get_the_author_ID()); ?>">
				<a target="_blank" class="body-link" href="<?php echo get_bloginfo('url'); ?>/?author=<?php the_author_ID();?>">
					<?php the_author(); ?>
				</a>
			</div>
	</div>
	<div class="divider"></div>

	<div id="featured-slider" class="slider col s12 m9 l9">
	<ul class="slides">
	<?php
		$my_query = new WP_Query( array( 'category_name' => 'destaque' ) );
		while ($my_query->have_posts())
		{
	  		$my_query->the_post();?>
	    <li>
	      <img id="slide-img" src="<?php the_post_thumbnail( array(720,400));?>" class="responsive-img">
            <div class="caption center-align">
             <a href="<?php the_permalink();?>">
              <h4 class="slide-title">                
                <?php the_title();?>
              </h4>             
             <h6 class="slide-autor">
            	Por: <?php the_author();?>
              </h6>
              </a>
            </div>
          </li>
		<?php wp_reset_postdata(); } ?>
	</ul>
	</div>

	<div id="colunista-sec" class="col s12 m3 l3">
		<h5 class="center">Colunistas:</h5>
		<div class="divider"></div>
		<?php $colunista_list = colunista();
   			foreach($colunista_list as $colunista) {
   				$post_num = count_user_posts($colunista->ID);
   				if ($post_num){?>
		   			<div id="colunista">
		   				<div class="row valign-wrapper">
		   					<div class="col s4 m4 l4">
		   						<a target="_blank" class="body-link" href="<?php echo get_bloginfo('url')."/?author=".$colunista->ID; ?>">
		   							<img class="hoverable circle responsive-img" src="<?php echo get_avatar_url($colunista->ID); ?>">
		   						</a>
		   					</div>
		   					<div class="col s8 m8 l8">
		   						<a target="_blank" class="body-link left" href="<?php echo get_author_posts_url($colunista->ID); ?>">
		   						<?php the_author_meta('display_name', $colunista->ID); ?><?#php the_author_posts();?>
		   						</a>
		   						<br>
		   					</div>
		   				</div>				
		   			</div>
		   			<div class="divider"></div>
   			<?php }#endif  		
   	}#endforeach ?>
	</div>

