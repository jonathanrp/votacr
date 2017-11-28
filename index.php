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
        <div class="content">
			<h1>¿Qué información hay acá?</h1>
			<section>
				<h2>ALERTAS</h2>
				<p>Son noticias relacionadas a corrupción o cualquier acto negativo que nos parece importante que tomés en cuenta a la hora de votar. Podés ver quiénes cuentan con alertas y la sumatoria de alertas de cada partido.</p>
			</section>
			<section>
				<h2>PREGUNTAS</h2>
				<p>Hemos seleccionado los temás más relevantes para el desarrollo sostenible de un país y generamos una pregunta problema para los candidatos.</p>
			</section>
			<section>
				<h2>INFORMACIÓN Y NOTICIAS</h2>
				<p>Información relevante .y noticias relacionadas al candidato.</p>
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
					foreach( $terms as $term ) : ?>
						<?php
						$args = array(
								'post_type' => $post_type,
								'posts_per_page' => -1,  //show all posts
								'tax_query' => array(
									array(
										'taxonomy' => $taxonomy,
										'field' => 'slug',
										'terms' => $term->slug,
									)
								)
				
							);
						$posts = new WP_Query($args);
						if( $posts->have_posts() ): ?> 
						<li>
							<a href="<?php echo get_category_link( $term ); ?>">
								<?php echo $term->name; ?>
								<?php while( $posts->have_posts() ) : $posts->the_post(); ?>
										<?php  //echo get_the_title(); ?>
										<?php if(get_field('alerta')): ?>
											(<?php echo count( get_field('alerta') ); ?>)
										<?php endif;  ?>
								<?php endwhile; endif; ?>
							</a>
						</li>
					<?php endforeach;
				endforeach; 
				?>
				</ul>
		</div>
<?php get_footer(); ?>
