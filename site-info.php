<?php
/**
 * Template part for displaying site info
 *
 * @package Gutener Education
 */

?>

<div class="site-info">
	<?php echo wp_kses_post( html_entity_decode( get_theme_mod( 'footer_text', '' ) ) ); ?>
	
	<?php esc_html_e('Theme by'); ?>
	<a href="<?php echo esc_url( __( 'https://keonthemes.com/', 'gutener-education' ) ); ?>" target="_blank">
		<?php
		printf( esc_html__( 'gruppe 1', 'gutener-education' ) );
		?>
	</a>
</div><!-- .site-info -->