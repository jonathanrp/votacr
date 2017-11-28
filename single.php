<?php
/**
 * The template for single
 */

get_header(); ?>
<div class="wrapper">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<section>
    <div class="encabezado_partido">
        <div class="encabezado_partido_bandera">
        <?php foreach (get_the_category() as $cat) : ?>
            <img src="<?php echo z_taxonomy_image_url($cat->term_id); ?>" />
        <?php endforeach; ?>
        </div>
        <h1><?php the_category(); ?></h1>
    </div>
    <?php if ( ! empty( category_description( get_the_category()[0] ) ) ): ?>
        <a class="plan" target="_blank" href="<?php echo category_description( get_the_category()[0] ); ?>">Plan de Gobierno</a>
    <?php endif; ?>
</section>
<section>
    <div class="encabezado_politico">
        <div class="encabezado_politico_foto">
            <?php if ( has_post_thumbnail() ) {the_post_thumbnail();} ?>
        </div>
        <div>
            <h2><?php the_title(); ?></h2>
            <h3>
                <?php 
                $field = get_field_object('cargo_al_que_aspira');
                $value = get_field('cargo_al_que_aspira');
                $label = $field['choices'][ $value ];
                echo $label;
                ?>
            </h3>
        </div>
    </div>
</section>
<!-- Alertas -->
<section>
    <?php if(get_field('alerta')): ?>
        <div class="alertas">
            <h1><img src="<?php echo get_bloginfo( 'template_directory' );?>/img/alerta.png" />Alertas (<?php echo count( get_field('alerta') ); ?>)</h1>
            <ul>
            <?php while(has_sub_field('alerta')): ?>
                
                <li>
                <a href="<?php the_sub_field('enlace_de_la_alerta'); ?>" target="_blank">
                    <?php the_sub_field('titulo_de_la_alerta'); ?> | Fuente: 
                    <span><?php the_sub_field('fuente_de_la_alerta'); ?></span>
                    </a> 
                </li>
            <?php endwhile; ?>
            </ul>
        </div>
    <?php endif; ?>
</section>
<!-- Preguntas -->
<section>
    <?php if(get_field('pregunta')): ?>
        <div class="preguntas">
            <h1>Preguntas</h1>
            <ul>
            <?php while(has_sub_field('pregunta')): ?>
                <li>
                    <h2><?php the_sub_field('resumen'); ?></h2>
                    <?php if(get_sub_field('pregunta_completa')): ?>
                        <h4><?php the_sub_field('pregunta_completa'); ?></h4>
                    <?php endif; ?>
                    <div class="respuesta">
                        <?php the_sub_field('respuesta'); ?>
                    </div>
                </li>
            <?php endwhile; ?>
            </ul>
        </div>
    <?php endif; ?>
</section>
<?php endwhile; else : ?>
<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>

<?php get_footer(); ?>
