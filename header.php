<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Undone
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
    <script>;(function(d){d.getElementsByTagName('html')[0].className='';}(document))</script>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="page  hfeed  site"><!-- closed in footer.php -->

    <?php do_action( 'before' ); ?>

    <header class="Header  is-fixed" role="banner">

        <div class="WrapContent">

            <div class="Grid  Grid--gutters  v1-Grid--3col">

                <div class="Grid-cell">

                    <nav role="navigation">
                        <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'Nav' ) ); ?>
                    </nav><!-- .main-navigation -->

                </div><!-- .Grid-cell -->

                <div class="Grid-cell">

                    <div class="Logo  is-hidden" id="js-hiddenLogo">
                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="http://fakeimg.pl/60" alt="<?php bloginfo( 'name' ); ?>"></a>
                    </div><!-- .Logo -->

                </div><!-- .Grid-cell -->

                <div class="Grid-cell">

                    <div class="Search">
                        <?php get_search_form(); ?>
                        <button id="js-APlayer-trigger">Audio Player</button>
                    </div><!-- .Search -->

                </div><!-- .Grid-cell -->

            </div><!-- .Grid -->

            <?php get_template_part( 'player' ); ?>

        </div><!-- .WrapContent -->

    </header><!-- .Header -->

    <div id="content" class="WrapSite"><!-- closed in footer.php -->

        <div class="Logo  Logo--pushEnds" id="js-topMeasure">
            <a href="/"><img src="http://fakeimg.pl/60" atl="{{ site.name }}"></a>
        </div><!-- .Logo -->
