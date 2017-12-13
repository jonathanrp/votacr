<?php
/**
 * The template for page
 */

get_header(); ?>
<div class="wrapper page">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<!-- Page -->
<section>
    <h1><?php the_title(); ?></h1>
    <?php the_content(); ?>
</section>
<?php endwhile; else : ?>
<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>

<?php get_footer(); ?>
