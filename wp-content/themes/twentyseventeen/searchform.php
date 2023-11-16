<?php
/**
 * Template for displaying search forms in Twenty Seventeen
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since Twenty Seventeen 1.0
 * @version 1.0
 */

?>

<?php $unique_id = esc_attr( wp_unique_id( 'search-form-' ) ); ?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="<?php echo $unique_id; ?>">
		<span class="screen-reader-text">
			<?php
			/* translators: Hidden accessibility text. */
			echo _x( 'Search for:', 'label', 'twentyseventeen' );
			?>
		</span>
	</label>
	<input type="search" id="<?php echo $unique_id; ?>" class="search-field form-control" placeholder="Search Form" value="<?php echo get_search_query(); ?>" name="s" />
    <span class="input-group-btn">
        <button type="submit" class="search_submit btn btn-secondary">Go</button>
    </span>
</form>
