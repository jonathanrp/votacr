<?php
/**
 * The template for displaying categories
 */

get_header(); ?>
<div class="wrapper">
<div class="encabezado_partido">
	<div class="encabezado_partido_bandera">
		<?php if (function_exists('z_taxonomy_image')) z_taxonomy_image(); ?>
	</div>
	<h1><?php single_cat_title(); ?></h1>
</div>
<?php if ( ! empty( category_description() ) ): ?>
	<a class="plan" target="_blank" href="<?php echo category_description(); ?>">Plan de Gobierno</a>
<?php endif; ?>
<div class="partidos_categoria">
	<section>
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<?php if(get_field('cargo_al_que_aspira') == "presidente"): ?>
				<h2>Candidato a Presidente:</h2>
				<a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
					<?php the_title(); ?>
					<?php if(get_field('alerta')): ?>
						<div class="alerta_icono">
							<img src="<?php echo get_bloginfo( 'template_directory' );?>/img/alerta.png" />
							<?php echo count( get_field('alerta') ); ?>
						</div>
					<?php endif; ?>
				</a>
			<?php endif; ?>
		<?php endwhile; endif; ?>
	</section>
	
	<!-- Alajuela -->
	<section>
		<h2>Diputados por Alajuela:</h2>
		<ul>
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<?php if(get_field('cargo_al_que_aspira') == "diputado_alajuela"): ?>
					<li>
						<a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
							<?php 
								$lugar = (int)get_field('lugar');
								echo $lugar;
								echo '- ';
							?>
							<?php the_title(); ?>
							<?php if(get_field('alerta')): ?>
								<div class="alerta_icono">
									<img src="<?php echo get_bloginfo( 'template_directory' );?>/img/alerta.png" />
									<?php echo count( get_field('alerta') ); ?>
								</div>
							<?php endif; ?>
						</a>
					</li>
				<?php endif; ?>
			<?php endwhile; endif; ?>
		</ul>
	</section>
	<!-- /Alajuela -->
	<!-- Cartago -->
	<section>
		<h2>Diputados por Cartago:</h2>
		<ul>
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<?php if(get_field('cargo_al_que_aspira') == "diputado_cartago"): ?>
					<li>
						<a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
							<?php 
								$lugar = (int)get_field('lugar');
								echo $lugar;
								echo '- ';
							?>
							<?php the_title(); ?>
							<?php if(get_field('alerta')): ?>
								<div class="alerta_icono">
									<img src="<?php echo get_bloginfo( 'template_directory' );?>/img/alerta.png" />
									<?php echo count( get_field('alerta') ); ?>
								</div>
							<?php endif; ?>
						</a>
					</li>
				<?php endif; ?>
			<?php endwhile; endif; ?>
		</ul>
	</section>
	<!-- /Cartago -->
	<!-- Guanacaste -->
	<section>
		<h2>Diputados por Guanacaste:</h2>
		<ul>
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<?php if(get_field('cargo_al_que_aspira') == "diputado_guanacaste"): ?>
					<li>
						<a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
							<?php 
								$lugar = (int)get_field('lugar');
								echo $lugar;
								echo '- ';
							?>
							<?php the_title(); ?>
							<?php if(get_field('alerta')): ?>
								<div class="alerta_icono">
							<img src="<?php echo get_bloginfo( 'template_directory' );?>/img/alerta.png" />
							<?php echo count( get_field('alerta') ); ?>
						</div>
							<?php endif; ?>
						</a>
					</li>
				<?php endif; ?>
			<?php endwhile; endif; ?>
		</ul>
	</section>
	<!-- /Guanacaste -->
	<!-- Heredia -->
	<section>
		<h2>Diputados por Heredia:</h2>
		<ul>
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<?php if(get_field('cargo_al_que_aspira') == "diputado_heredia"): ?>
					<li>
						<a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
							<?php 
								$lugar = (int)get_field('lugar');
								echo $lugar;
								echo '- ';
							?>
							<?php the_title(); ?>
							<?php if(get_field('alerta')): ?>
								<div class="alerta_icono">
							<img src="<?php echo get_bloginfo( 'template_directory' );?>/img/alerta.png" />
							<?php echo count( get_field('alerta') ); ?>
						</div>
							<?php endif; ?>
						</a>
					</li>
				<?php endif; ?>
			<?php endwhile; endif; ?>
		</ul>
	</section>
	<!-- /Heredia -->
	<!-- Limón -->
	<section>
		<h2>Diputados por Limón:</h2>
		<ul>
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<?php if(get_field('cargo_al_que_aspira') == "diputado_limon"): ?>
					<li>
						<a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
							<?php 
								$lugar = (int)get_field('lugar');
								echo $lugar;
								echo '- ';
							?>
							<?php the_title(); ?>
							<?php if(get_field('alerta')): ?>
								<div class="alerta_icono">
							<img src="<?php echo get_bloginfo( 'template_directory' );?>/img/alerta.png" />
							<?php echo count( get_field('alerta') ); ?>
						</div>
							<?php endif; ?>
						</a>
					</li>
				<?php endif; ?>
			<?php endwhile; endif; ?>
		</ul>
	</section>
	<!-- /Limón -->
	<!-- Puntarenas -->
	<section>
		<h2>Diputados por Puntarenas:</h2>
		<ul>
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<?php if(get_field('cargo_al_que_aspira') == "diputado_puntarenas"): ?>
					<li>
						<a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
							<?php 
								$lugar = (int)get_field('lugar');
								echo $lugar;
								echo '- ';
							?>
							<?php the_title(); ?>
							<?php if(get_field('alerta')): ?>
								<div class="alerta_icono">
							<img src="<?php echo get_bloginfo( 'template_directory' );?>/img/alerta.png" />
							<?php echo count( get_field('alerta') ); ?>
						</div>
							<?php endif; ?>
						</a>
					</li>
				<?php endif; ?>
			<?php endwhile; endif; ?>
		</ul>
	</section>
	<!-- /Puntarenas -->
	<!-- San José -->
	<section>
		<h2>Diputados por San José:</h2>
		<ul>
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<?php if(get_field('cargo_al_que_aspira') == "diputado_san_jose"): ?>
					<li>
						<a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
							<?php 
								$lugar = (int)get_field('lugar');
								echo $lugar;
								echo '- ';
							?>
							<?php the_title(); ?>
							<?php if(get_field('alerta')): ?>
								<div class="alerta_icono">
							<img src="<?php echo get_bloginfo( 'template_directory' );?>/img/alerta.png" />
							<?php echo count( get_field('alerta') ); ?>
						</div>
							<?php endif; ?>
						</a>
					</li>
				<?php endif; ?>
			<?php endwhile; endif; ?>
		</ul>
	</section>
	<!-- /San José -->
</div>

<?php get_footer(); ?>