<?php
if (! defined('ABSPATH')) {
    exit;
}

get_header();
?>
<main class="rv-main">
    <div class="rv-wrap">
        <section class="rv-card rv-page rv-section">
            <div class="entry-content">
                <?php while (have_posts()) : the_post(); ?>
                    <article <?php post_class(); ?>>
                        <h1><?php the_title(); ?></h1>
                        <?php the_content(); ?>
                    </article>
                <?php endwhile; ?>
            </div>
        </section>
    </div>
</main>
<?php
get_footer();
