<?php
/**
 * Home Template
 *
 * This is the home template.  Technically, it is the "posts page" template.  It is used when a visitor is on the 
 * page assigned to show a site's latest blog posts.
 *
 * @package Prototype
 * @subpackage Template
 */

get_header(); // Loads the header.php template. ?>

	<?php do_atomic( 'before_content' ); // prototype_before_content ?>

	<div id="content">

		<?php do_atomic( 'open_content' ); // prototype_open_content ?>

		<div class="hfeed">

			<?php get_template_part( 'loop-meta' ); // Loads the loop-meta.php template. ?>

			<?php if ( have_posts() ) : ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<?php do_atomic( 'before_entry' ); // prototype_before_entry ?>

					<div id="post-<?php the_ID(); ?>" class="<?php hybrid_entry_class(); ?>">

						<?php do_atomic( 'open_entry' ); // prototype_open_entry ?>

						<?php if ( current_theme_supports( 'get-the-image' ) ) get_the_image( array( 'meta_key' => 'Thumbnail', 'size' => 'thumbnail' ) ); ?>

						<?php echo apply_atomic_shortcode( 'entry_title', '[entry-title]' ); ?>

						<?php echo apply_atomic_shortcode( 'byline', '<div class="byline">' . __( '[entry-published] [entry-terms taxonomy="category" before="分类："] [entry-comments-link] [entry-edit-link before=" | "]' . '<p>[entry-terms before="标签："]</p>', 'prototype' ) . '</div>' ); ?>

						<div class="entry-summary">
							<?php the_excerpt(); ?>
							<?php wp_link_pages( array( 'before' => '<p class="page-links">' . __( 'Pages:', 'prototype' ), 'after' => '</p>' ) ); ?>
						</div><!-- .entry-summary -->

						<!--<?php echo apply_atomic_shortcode( 'entry_meta', '<div class="entry-meta">' . __( '[entry-terms before="标签："] ', 'prototype' ) . '</div>' ); ?>-->

						<?php do_atomic( 'close_entry' ); // prototype_close_entry ?>

					</div><!-- .hentry -->

					<?php do_atomic( 'after_entry' ); // prototype_after_entry ?>

				<?php endwhile; ?>

			<?php else : ?>

				<?php get_template_part( 'loop-error' ); // Loads the loop-error.php template. ?>

			<?php endif; ?>

		</div><!-- .hfeed -->

		<?php do_atomic( 'close_content' ); // prototype_close_content ?>

		<?php get_template_part( 'loop-nav' ); // Loads the loop-nav.php template. ?>

	</div><!-- #content -->

	<?php do_atomic( 'after_content' ); // prototype_after_content ?>
<div style="width:430px; float:right">
					<?php get_sidebar( 'primary' ); // Loads the sidebar-primary.php template. ?>
				
					<?php get_sidebar( 'secondary' ); // Loads the sidebar-secondary.php template. ?>
					<?php do_atomic( 'close_main' ); // prototype_close_main ?>
					<div class="clear"></div>
				</div>
			</div><!-- .wrap -->

		</div><!-- #main -->

		<?php do_atomic( 'after_main' ); // prototype_after_main ?>

		

		<?php do_atomic( 'before_footer' ); // prototype_before_footer ?>

<?php get_sidebar( 'subsidiary' ); // Loads the sidebar-subsidiary.php template. ?>

<div class="links">
	
	<h2>友情链接：</h2>
	<ul>
	<?php get_links('-1', '<li>', '</li>', '', 0, 'name', 0, 0, -1, 0); ?>
	</ul>
	<div class="clear"></div>
</div>

<?php get_footer(); // Loads the footer.php template. ?>