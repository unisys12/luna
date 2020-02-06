<main class="container" role="dogs profile">
    <?php while (have_posts()) : the_post(); ?>
        <div class="profile-head">
            <h2><?php the_title(); ?></h2>
        </div>
        <div class="profile-card">
            <?php if (has_post_thumbnail()) : ?>
                <img src="<?php the_post_thumbnail_url('blog-large'); ?>" width="500px" height="600px" alt="<?php the_title(); ?>" class="profile-img">
            <?php endif; ?>
            <div class="attributes">
                <?php the_content(); ?>
                <ul class="attr-list">
                    <li><b>Age: </b></b><?php the_field('age'); ?></li>
                    <li><b>Gender: </b><?php the_field('gender'); ?></li>
                    <li><b>Temperment: </b><?php the_field('temperament'); ?></li>
                    <li><b>Date Acquired: </b><?php the_field('date_acquired'); ?></li>
                    <li><b>Build: </b><?php the_field('build'); ?></li>
                    <li><b>Health: </b><?php the_field('health'); ?></li>
                </ul>
                <div class="action">
                    <a href="/adoption-app?puppy_name=<?php urlencode(the_title()); ?>" class="adoption-btn">
                        Adobt Me!
                    </a>
                </div>
            </div>
        </div>

    <?php endwhile; ?>
</main>