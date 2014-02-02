<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Undone
 */
?>

        <div class="Content">

            <footer class="Footer" role="contentinfo">

                <div class="Grid  Grid--gutters  v1-Grid--6col">

                    <div class="Grid-cell">

                        <div class="site-info">
                            <?php do_action( 'undone_credits' ); ?>
                            <?php printf( __( 'Theme: %1$s by %2$s.', 'undone' ), 'Undone', '<a href="http://underscores.me/" rel="designer">Justin Alm & Grey Vaisius</a>' ); ?>
                        </div><!-- .site-info -->

                    </div><!-- .Grid-cell -->

                </div><!-- .Grid -->

            </footer><!-- .Footer -->

        </div><!-- .Content -->

    </div><!-- .WrapSite (opened in header.php) -->    

</div><!-- .page (opened in header.php) -->

<?php wp_footer(); ?>
<script data-main="<?php bloginfo('template_directory') ?>/js/script.js" src="<?php bloginfo('template_directory') ?>/bower_components/requirejs/require.js"></script>

</body>
</html>