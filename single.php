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
        <?php the_category(); ?>
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
        <div class="encabezado_politico_nombre">
            <h2><?php the_title(); ?></h2>
            <h3>
                Aspira a:
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
<!-- Video Resumen -->
<?php if ( get_field('video_resumen') ): ?>
<section>
    <h1>Video Resumen</h1>
    <div class="video_resumen">
        <?php the_field('video_resumen'); ?>
        <div class="video_resumen_info">
            <h3>VIDEO RESUMEN</h3>
            <a href="<?php the_field('url_fuente_video_resumen'); ?>" target="_blank">
                <?php the_field('fuente_video_resumen'); ?>
            </a>
        </div>
    </div>
</section>
<?php endif; ?>
<!-- Alertas -->
<section>
    <?php if(get_field('alerta')): ?>
        <div class="alertas">
            <h1>
                <span>Alertas</span>
                <img src="<?php echo get_bloginfo( 'template_directory' );?>/img/alerta.png" />
                <?php echo count( get_field('alerta') ); ?></h1>
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
<!-- Mi voto -->
<section>
    <?php if(get_field('entrevistas')): ?>
        
        <h1>Entrevistas</h1>
        <div class="entrevistas">
        <?php while(has_sub_field('entrevistas')): ?>
            <div>
                <div class="entrevistas_encabezado">
                    <img src="<?php the_sub_field('logo_fuente_entrevista'); ?>"/>
                    <div>
                    <h2><?php the_sub_field('fuente_entrevista'); ?></h2>
                    <a href="<?php the_sub_field('url_fuente_entrevista'); ?>" target="_blank">Visitar <?php the_sub_field('fuente_entrevista'); ?></a>
                    </div>
                </div>
                <div class="preguntas">
                    <ul>
                    <?php while(has_sub_field('entrevista')): ?>
                        <li>
                            <div class="respuesta">
                            <?php the_sub_field('video_entrevista'); ?>
                            </div>
                            <?php the_sub_field('titulo_entrevista'); ?>
                        </li>
                    <?php endwhile; ?>
                    </ul>
                </div>
            </div>
        <?php endwhile; ?>
        </div>
        
    <?php endif; ?>
</section>
<!-- Preguntas -->
<section>
    <?php if(get_field('pregunta')): ?>
        <div class="preguntas">
            <h1>Debates</h1>
            <ul>
            <?php while(has_sub_field('pregunta')): ?>
                <li>
                    <div class="respuesta">
                        <?php the_sub_field('respuesta'); ?>
                    </div>
                    <div class="preguntas_info">
                        <h2><?php the_sub_field('resumen'); ?></h2>
                        <?php if(get_sub_field('pregunta_completa')): ?>
                            <h4><?php the_sub_field('pregunta_completa'); ?></h4>
                        <?php endif; ?>
                    </div>
                    
                </li>
            <?php endwhile; ?>
            </ul>
        </div>
    <?php endif; ?>
</section>

<!-- Info -->
<?php if ( !empty( get_the_content() ) ): ?>
<section>
    <div class="info">
    <h1>Información</h1>
    <div class="info_content">
        <?php the_content(); ?>
    </div>
    </div>
</section>
<?php endif; ?>

<?php endwhile; else : ?>
<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>

<?php get_footer(); ?>
