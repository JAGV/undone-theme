<?php
/**
 * The template for displaying search forms in Undone
 *
 * @package Undone
 */
?>
<form role="search" method="get" class="Search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <label>
        <span class="visuallyhidden  screen-reader-text"><?php _ex( 'Search for:', 'label', 'undone' ); ?></span>
        <input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search', 'placeholder', 'undone' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s">
    </label>
    <input type="submit" class="visuallyhidden  search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'undone' ); ?>">
</form>
