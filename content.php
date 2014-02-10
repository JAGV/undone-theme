<?php
/**
 * @package Undone
 */
?>

<?php if ( is_sticky() ) : ?>

    <div class="Grid-cell  Grid-cell--1">

    <?php else : ?>

    <div class="Grid-cell  Grid-cell--2">

<?php endif; ?>

    <div class="Posts-post">

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <header class="entry-header">

                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>

                <?php if ( is_sticky() ) : ?>
                <h1 class="Posts-post-title  as-h3"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

                <?php else : ?>
                <h1 class="Posts-post-title  as-h3"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

                <?php endif; ?>

                <div class="Grid">

                    <?php if ( 'audio' == get_post_format() ) : ?>
                        <div class="Grid-cell  u-size1of2">
                            <button class="js-playPost  Post-play" data-id="<?php the_ID(); ?>"><span class="icon-play"></span><span class="visuallyhidden">Play post</span></button>
                            <button class="js-pausePost  Post-play" data-id="<?php the_ID(); ?>"><span class="icon-pause"></span><span class="visuallyhidden">Pause</span></button>
                        </div><!-- .Grid-cell -->
                    <?php endif; ?>

                    <?php if ( 'post' == get_post_type() ) : ?>
                        <div class="Grid-cell  u-size1of2">
                            <div class="Post-meta">
                                <?php undone_posted_on(); ?>
                            </div><!-- .Post-meta -->
                        </div><!-- .Grid-cell -->
                    <?php endif; ?>

                </div><!-- .Grid -->

            </header><!-- .entry-header -->

            <?php if ( is_search() ) : // Only display Excerpts for Search ?>

                <div class="entry-summary">
                    <?php the_excerpt(); ?>
                </div><!-- .entry-summary -->

            <?php elseif ( is_sticky() ) : ?>

                <!-- do nothing -->

            <?php else : ?>
                <div class="entry-content">
                    <?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'undone' ) ); ?>
                    <?php
                        wp_link_pages( array(
                            'before' => '<div class="page-links">' . __( 'Pages:', 'undone' ),
                            'after'  => '</div>',
                        ) );
                    ?>
                </div><!-- .entry-content -->

            <?php endif; ?>

            <footer class="entry-meta">

                <?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
                    <?php
                        /* translators: used between list items,
                         * there is a space after the comma
                         */
                        $categories_list = get_the_category_list( __( ', ', 'undone' ) );
                        if ( $categories_list && undone_categorized_blog() ) :
                    ?>
                    <span class="cat-links">
                        <?php printf( __( 'Posted in %1$s', 'undone' ), $categories_list ); ?>
                    </span>
                    <?php endif; // End if categories ?>

                    <?php
                        /* translators: used between list items,
                         * there is a space after the comma
                         */
                        $tags_list = get_the_tag_list( '', __( ', ', 'undone' ) );
                        if ( $tags_list ) :
                    ?>
                    <span class="tags-links">
                        <?php printf( __( 'Tagged %1$s', 'undone' ), $tags_list ); ?>
                    </span>
                    <?php endif; // End if $tags_list ?>

                <?php endif; // End if 'post' == get_post_type() ?>

                <!--
                <?php // if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
                <span class="comments-link"><?php // comments_popup_link( __( 'Leave a comment', 'undone' ), __( '1 Comment', 'undone' ), __( '% Comments', 'undone' ) ); ?></span>
                <?php // endif; ?>
                -->

            </footer><!-- .entry-meta -->

        </article><!-- #post-## -->

    </div><!-- .Posts-post -->

</div><!-- .Grid-cell -->
