<main class="container" role="listing of adoptable dogs">
    <h2 class="kennel-head">LMH Kennel</h2>
    <?php
    $kennel_all_query = new WP_Query(
        [
            'post_type' => 'dogs',
            'post_status' => 'publish'
        ]
    );
    ?>
    <?php if ($kennel_all_query->have_posts()) : ?>
        <div class="kennel">
            <?php foreach ($kennel_all_query->posts as $post) : ?>
                <div class="card">
                    <a href='<?php echo "/dogs/" . $post->post_title ?>'>
                        <div class="card-content">
                            <figure>
                                <?php the_post_thumbnail(
                                    'medium',
                                    [
                                        'loading' => 'lazy',
                                        'alt' => 'thumbnail of ' . $post->post_title,
                                    ]
                                );
                                ?>
                            </figure>
                            <div class="attributes">
                                <h3><?php echo $post->post_title; ?></h3>
                                <span class="age">
                                    Age: <?php the_field('age'); ?>
                                </span>
                                <span class="breed">
                                    <?php the_field('breed'); ?>
                                </span>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach ?>
        </div>
    <?php endif ?>
</main>