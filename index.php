<?php get_header(); ?>
<main id="content">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php get_template_part( 'entry' ); ?>
<?php comments_template(); ?>
<?php endwhile; endif; ?>
<?php get_template_part( 'nav', 'below' ); ?>
</main>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
<script>
let imgPath = "https://photos.guyradcliffe.com/wp-content/uploads/2018/07/20180714_192954.jpg";
let altTag = "Guy Radcliffe Photos";
</script>