<main class="container" role="main content">
    <h1 class="page-head"><?php the_title(); ?></h1>
    <?php if (has_post_thumbnail()) : ?>
        <img src="<?php the_post_thumbnail_url('blog-large'); ?>" loading="lazy" width="250px" height="300px" alt="<?php the_title(); ?>" class="">
    <?php endif; ?>
    <?php while (have_posts()) : the_post(); ?>
        <?php the_content(); ?>
    <?php endwhile; ?>
</main>