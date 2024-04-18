<?php
/**
 * The template part for displaying image post
 *
 * @package Auto Parts Garage
 * @subpackage auto-parts-garage
 * @since auto-parts-garage 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
    <div class="entry-content">
        <header>
            <h1><?php the_title();?></h1> 
        </header>
        <figure class="entry-attachment">
            <div class="attachment">
                <?php auto_parts_garage_the_attached_image(); ?>
            </div>

            <?php if ( has_excerpt() ) : ?>
                <figcaption class="entry-caption"><?php the_excerpt(); ?></figcaption>
            <?php endif; ?>
        </figure>
        <?php
            the_content();
            wp_link_pages( array(
                'before' => '<div class="page-links">' . __( 'Pages:', 'auto-parts-garage' ),
                'after'  => '</div>',
            ) );
        ?>
    </div>
    <?php edit_post_link( __( 'Edit', 'auto-parts-garage' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
    <div class="clearfix"></div>
</article>