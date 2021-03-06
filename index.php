<?php
/**
 * The main template file
 *
 * @package WordPress
 * @subpackage Vota.cr
 */

get_header(); ?>
		<div class="hero">
			<div class="hero-content">
				<h1>¿No sabés por quién votar?</h1>
				<p>No te preocupés, muchos estamos en las mismas. Por eso hicimos esta aplicación, que esperamos te ayude a tomar una decisión inteligente, basada en lo que vos crees que es mejor para Costa Rica.</p>
			</div>
		</div>
		<div class="wrapper">
		<img class="cover" src="<?php echo get_bloginfo( 'template_directory' );?>/img/votacr_cover.png"/>
        <div class="content">
			<h1>¿Qué información hay acá?</h1>
			<section>
				<h2>ALERTAS</h2>
				<p>Son noticias relacionadas a corrupción o cualquier acto negativo que nos parece importante que tomés en cuenta a la hora de votar. Podés ver quiénes cuentan con alertas y la sumatoria de alertas de cada partido.</p>
			</section>
			<section>
				<h2>DEBATES, ENTREVISTAS E INFORMACIÓN</h2>
				<p>Recopilamos información acerca de los candidatos y te la presentamos de una forma fácil de consultar en cualquier momento, en un sólo lugar.</p>
			</section>
			<section>
				<h2>PRONTO</h2>
				<p>Estamos trabajando en nuevas secciones que te pueden interesar, podes estar al tanto en nuestro <a href="https://www.facebook.com/votacr/" target="_blank">facebook.</a></p>
			</section>
		</div><!-- content -->
		<div class="partidos">
			<div class="titulo">
			Elegí un partido (ordenado según alertas)
			</div>

			<?php //wp_list_categories('show_count=1&title_li=<h2>Categories</h2>'); ?>
			<ul>
			<?php

				/*
				* Loop through Categories and Display Posts within
				*/
				$post_type = 'politico';
				// Get all the taxonomies for this post type
				$taxonomies = get_object_taxonomies( array( 'post_type' => $post_type ) );
				foreach( $taxonomies as $taxonomy ) :
					// Gets every "category" (term) in this taxonomy to get the respective posts
					$terms = get_terms( $taxonomy );
					usort($terms,function(&$a, &$b) use ($taxonomy, $post_type) {

						$args = array(
							'post_type' => $post_type,
							'posts_per_page' => -1,  //show all posts
							'tax_query' => array(
								array(
									'taxonomy' => $taxonomy,
									'field' => 'slug',
									'terms' => $a->slug,
								)
							)
						);
						$posts = new WP_Query($args);
						$alerta_count = 0;
						while( $posts->have_posts() ) : $posts->the_post();
							if(get_field('alerta')): $alerta_count = $alerta_count+count(get_field('alerta')); endif;
						endwhile;

						$a->count_alerta = $alerta_count;
						$a->count_posts = count($posts);

						$args = array(
							'post_type' => $post_type,
							'posts_per_page' => -1,  //show all posts
							'tax_query' => array(
								array(
									'taxonomy' => $taxonomy,
									'field' => 'slug',
									'terms' => $b->slug,
								)
							)
						);

						$posts = new WP_Query($args);
						$alertab_count = 0;
						while( $posts->have_posts() ) : $posts->the_post();
							if(get_field('alerta')): $alertab_count = $alertab_count+count(get_field('alerta')); 
							endif;
						endwhile;

						$b->count_alerta = $alertab_count;
						$b->count_posts = count($posts);


						if ($alerta_count == $alertab_count) {
							return 0;
						}
						return ($alerta_count < $alertab_count) ? 1 : -1;

                    });

					foreach( $terms as $term ) : ?>
						<?php
						if( $term->count_posts ):
                            ?>
						<li>
							<a href="<?php echo get_category_link( $term ); ?>">
								<div class="bandera-home">
									<img src="<?php echo z_taxonomy_image_url($term->term_id); ?>" />
								</div>
								<div class="partido_home">
								<?php echo $term->name; ?>
								</div>
								<?php if($term->count_alerta): ?> 
								<img class="alerta_home" src="<?php echo get_bloginfo( 'template_directory' );?>/img/alerta.png" />
								<?php echo $term->count_alerta; ?>
								<?php endif; ?>
							</a>
						</li>
						<?php endif; ?>
					<?php endforeach;
				endforeach; 
				?>
				</ul>
		</div>
<?php get_footer(); ?>
