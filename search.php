<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package Undone
 */

get_header(); ?>

    <main class="Content  Content--main" role="main">

    <?php if ( have_posts() ) : ?>

        <header class="page-header">
            <h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'undone' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
        </header><!-- .page-header -->


        <div class="Posts">

            <div class="Grid  Grid--gutters  v1-Grid--1over2">

                <?php /* Start the Loop */ ?>
                <?php while ( have_posts() ) : the_post(); ?>

                    <?php get_template_part( 'content', 'search' ); ?>

                <?php endwhile; ?>

            </div><!-- .Grid -->

        </div><!-- .Posts -->

        <?php undone_paging_nav(); ?>

    <?php else : ?>

        <?php get_template_part( 'content', 'none' ); ?>

    <?php endif; ?>

    </main><!-- .Content -->

<?php get_footer(); ?>
