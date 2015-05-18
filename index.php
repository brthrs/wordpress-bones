<?php get_header(); ?>

<section class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">

      <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <?php the_content(); ?>
      </article>

      <?php endwhile; ?>

    </div>
  </div>
</section>

<?php get_footer(); ?>
