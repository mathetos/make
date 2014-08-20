<?php
/**
 * @package Make
 */

$author_key    = 'layout-' . ttfmake_get_view() . '-post-author';
$author_option = ttfmake_sanitize_choice( get_theme_mod( $author_key, ttfmake_get_default( $author_key ) ), $author_key );
?>

<?php if ( 'none' !== $author_option ) : ?>
<div class="entry-author">
	<?php if ( 'avatar' === $author_option ) : ?>
	<div class="entry-author-avatar">
		<?php
		printf(
			'<a class="vcard" href="%1$s">%2$s</a>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			get_avatar( get_the_author_meta( 'ID' ) )
		);
		?>
	</div>
	<?php endif; ?>
	<div class="entry-author-byline">
		<?php
		printf(
			_x( 'by %s', 'author byline', 'make' ),
			sprintf(
				'<a class="vcard" href="%1$s">%2$s</a>',
				esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
				esc_html( get_the_author_meta( 'display_name' ) )
			)
		);
		$twitter = get_the_author_meta('twitter');
		$fb = get_the_author_meta('facebook');
		$gplus = get_the_author_meta('googleplus');
		if (!empty($twitter)){
			echo '<a href="http://twitter.com/' . $twitter . '" class="author-social"><i class="fa fa-twitter"></i></a>';
			}
		if (!empty($fb)){
			echo '<a href="http://' . $fb . '" class="author-social"><i class="fa fa-facebook"></i></a>';
			}
		if (!empty($gplus)){
			echo '<a href="http://' . $gplus . '" class="author-social"><i class="fa fa-google-plus"></i></a>';
			}
		?>
	</div>
	<?php if ( is_singular() && $author_bio = get_the_author_meta( 'description' ) ) : ?>
	<div class="entry-author-bio">
		<?php echo wpautop( ttfmake_sanitize_text( $author_bio ) ); ?>
	</div>
	<?php endif; ?>
</div>
<?php endif; ?>
