<?php
/**
 * The template for displaying categories
 */

get_header();
//global $wp_query;
//print_r($wp_query);
?>
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
<?php
//LETS ORDER
$diputado_alajuela = [];
$diputado_cartago = [];
$diputado_guanacaste = [];
$diputado_heredia = [];
$diputado_limon = [];
$diputado_puntarenas = [];
$diputado_san_jose = [];

if ( have_posts() ) : while ( have_posts() ) : the_post();
    if(get_field('cargo_al_que_aspira') == "diputado_alajuela"):
	    global $post;
        $diputado_alajuela[] = $post;
    endif;
	if(get_field('cargo_al_que_aspira') == "diputado_cartago"):
		global $post;
		$diputado_cartago[] = $post;
	endif;
	if(get_field('cargo_al_que_aspira') == "diputado_guanacaste"):
		global $post;
		$diputado_guanacaste[] = $post;
	endif;
	if(get_field('cargo_al_que_aspira') == "diputado_heredia"):
		global $post;
		$diputado_heredia[] = $post;
	endif;
	if(get_field('cargo_al_que_aspira') == "diputado_limon"):
		global $post;
		$diputado_limon[] = $post;
	endif;
	if(get_field('cargo_al_que_aspira') == "diputado_puntarenas"):
		global $post;
		$diputado_puntarenas[] = $post;
	endif;
	if(get_field('cargo_al_que_aspira') == "diputado_san_jose"):
		global $post;
		$diputado_san_jose[] = $post;
	endif;
endwhile; endif;

function cmp_lugar_1001($a, $b) {

	$lugara = (int)get_field('lugar',$a->ID);
	$lugarb = (int)get_field('lugar',$b->ID);

	if($lugara==0){
	    return 1;
    }

	if($lugarb==0){
		return -1;
	}

	if ($lugara == $lugarb) {
		return 0;
	}
	return ($lugara < $lugarb) ? -1 : 1;
}

?>

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
	<?php if ( count($diputado_alajuela) ):  usort($diputado_alajuela,'cmp_lugar_1001');
	?>
	<section>
		<h2>Diputados por Alajuela:</h2>
		<ul>


                <?php foreach ($diputado_alajuela as $post_item): ?>
                    <li>
                        <a href="<?php the_permalink($post_item); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(['post'=>$post_item]); ?>">
				            <?php
				            $lugar = (int)get_field('lugar',$post_item->ID);
				            echo $lugar;
				            echo '- ';
				            ?>
				            <?php echo get_the_title($post_item); ?>
				            <?php if(get_field('alerta',$post_item->ID)): ?>
                                <div class="alerta_icono">
                                    <img src="<?php echo get_bloginfo( 'template_directory' );?>/img/alerta.png" />
						            <?php echo count( get_field('alerta',$post_item->ID) ); ?>
                                </div>
				            <?php endif; ?>
                        </a>
                    </li>
                <?php endforeach;?>
		</ul>
	</section>
	<?php endif; ?>
    <!-- /Alajuela -->

    <!-- Cartago -->
	<?php if ( count($diputado_cartago) ):
	usort($diputado_cartago,'cmp_lugar_1001');
	?>
	<section>
		<h2>Diputados por Cartago:</h2>
		<ul>

				<?php foreach ($diputado_cartago as $post_item): ?>
                <li>
                    <a href="<?php the_permalink($post_item); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(['post'=>$post_item]); ?>">
						<?php
						$lugar = (int)get_field('lugar',$post_item->ID);
						echo $lugar;
						echo '- ';
						?>
						<?php echo get_the_title($post_item); ?>
						<?php if(get_field('alerta',$post_item->ID)): ?>
                            <div class="alerta_icono">
                                <img src="<?php echo get_bloginfo( 'template_directory' );?>/img/alerta.png" />
								<?php echo count( get_field('alerta',$post_item->ID) ); ?>
                            </div>
						<?php endif; ?>
                    </a>
                </li>
			<?php endforeach;?>

		</ul>
	</section>
	<!-- /Cartago -->
	<?php endif; ?>
	<!-- Guanacaste -->
	<?php if ( count($diputado_guanacaste) ):
	usort($diputado_guanacaste,'cmp_lugar_1001');
	?>
	<section>
		<h2>Diputados por Guanacaste:</h2>
		<ul>

				<?php foreach ($diputado_guanacaste as $post_item): ?>
                <li>
                    <a href="<?php the_permalink($post_item); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(['post'=>$post_item]); ?>">
						<?php
						$lugar = (int)get_field('lugar',$post_item->ID);
						echo $lugar;
						echo '- ';
						?>
						<?php echo get_the_title($post_item); ?>
						<?php if(get_field('alerta',$post_item->ID)): ?>
                            <div class="alerta_icono">
                                <img src="<?php echo get_bloginfo( 'template_directory' );?>/img/alerta.png" />
								<?php echo count( get_field('alerta',$post_item->ID) ); ?>
                            </div>
						<?php endif; ?>
                    </a>
                </li>
			<?php endforeach;?>

		</ul>
	</section>
	<!-- /Guanacaste -->
	<?php endif; ?>
	<?php if ( count($diputado_heredia) ):
	usort($diputado_heredia,'cmp_lugar_1001');
	?>
	<!-- Heredia -->
	<section>
		<h2>Diputados por Heredia:</h2>
		<ul>

				<?php foreach ($diputado_heredia as $post_item): ?>
                <li>
                    <a href="<?php the_permalink($post_item); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(['post'=>$post_item]); ?>">
						<?php
						$lugar = (int)get_field('lugar',$post_item->ID);
						echo $lugar;
						echo '- ';
						?>
						<?php echo get_the_title($post_item); ?>
						<?php if(get_field('alerta',$post_item->ID)): ?>
                            <div class="alerta_icono">
                                <img src="<?php echo get_bloginfo( 'template_directory' );?>/img/alerta.png" />
								<?php echo count( get_field('alerta',$post_item->ID) ); ?>
                            </div>
						<?php endif; ?>
                    </a>
                </li>
			<?php endforeach;?>

		</ul>
	</section>
	<!-- /Heredia -->
	<?php endif; ?>
	<!-- Limón -->
	<?php if ( count($diputado_limon) ):
	usort($diputado_limon,'cmp_lugar_1001');
	?>
	<section>
		<h2>Diputados por Limón:</h2>
		<ul>

				<?php foreach ($diputado_limon as $post_item): ?>
                <li>
                    <a href="<?php the_permalink($post_item); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(['post'=>$post_item]); ?>">
						<?php
						$lugar = (int)get_field('lugar',$post_item->ID);
						echo $lugar;
						echo '- ';
						?>
						<?php echo get_the_title($post_item); ?>
						<?php if(get_field('alerta',$post_item->ID)): ?>
                            <div class="alerta_icono">
                                <img src="<?php echo get_bloginfo( 'template_directory' );?>/img/alerta.png" />
								<?php echo count( get_field('alerta',$post_item->ID) ); ?>
                            </div>
						<?php endif; ?>
                    </a>
                </li>
			<?php endforeach;?>

		</ul>
	</section>
	<?php endif; ?>
	<!-- /Limón -->

	<!-- Puntarenas -->
	<?php if ( count($diputado_puntarenas) ):
	usort($diputado_puntarenas,'cmp_lugar_1001');
	?>
	<section>
		<h2>Diputados por Puntarenas:</h2>
		<ul>

				<?php foreach ($diputado_puntarenas as $post_item): ?>
                <li>
                    <a href="<?php the_permalink($post_item); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(['post'=>$post_item]); ?>">
						<?php
						$lugar = (int)get_field('lugar',$post_item->ID);
						echo $lugar;
						echo '- ';
						?>
						<?php echo get_the_title($post_item); ?>
						<?php if(get_field('alerta',$post_item->ID)): ?>
                            <div class="alerta_icono">
                                <img src="<?php echo get_bloginfo( 'template_directory' );?>/img/alerta.png" />
								<?php echo count( get_field('alerta',$post_item->ID) ); ?>
                            </div>
						<?php endif; ?>
                    </a>
                </li>
			<?php endforeach;?>

		</ul>
	</section>
	<?php endif; ?>
	<!-- /Puntarenas -->
	<!-- San José -->
	<?php if ( count($diputado_san_jose) ):
	usort($diputado_san_jose,'cmp_lugar_1001');
	?>
	<section>
		<h2>Diputados por San José:</h2>
		<ul>

				<?php foreach ($diputado_san_jose as $post_item): ?>
                <li>
                    <a href="<?php the_permalink($post_item); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(['post'=>$post_item]); ?>">
						<?php
						$lugar = (int)get_field('lugar',$post_item->ID);
						echo $lugar;
						echo '- ';
						?>
						<?php echo get_the_title($post_item); ?>
						<?php if(get_field('alerta',$post_item->ID)): ?>
                            <div class="alerta_icono">
                                <img src="<?php echo get_bloginfo( 'template_directory' );?>/img/alerta.png" />
								<?php echo count( get_field('alerta',$post_item->ID) ); ?>
                            </div>
						<?php endif; ?>
                    </a>
                </li>
			<?php endforeach;?>
		</ul>
	</section>
	<?php endif; ?>
	<!-- /San José -->
</div>

<?php get_footer(); ?>