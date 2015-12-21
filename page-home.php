<?php
/*
Template Name: Federal Escrow Home Page
*/
?>

<?php get_header(); ?>

	<section id="content" class="homepage" role="main">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<section class="entry-content">
					<?php the_content(); ?>
				</section>
			</article>
		<?php endwhile; endif; ?>
	</section>

	<section id="additional_content" role="complementary">
		<ul id="boxes">
		<?php
			$args = array(
				'category'         => 'Home Page Boxes',
				'post_status'      => 'publish',
			);
			
			$boxes = get_posts( $args );
			
			foreach ( $boxes as $post ) : setup_postdata( $post );
		?>
		
		<li>
			<a href="<?php the_permalink(); ?>">
				<?php
					the_title('<h1>', '</h1>');
					if ( has_post_thumbnail() ) {
						the_post_thumbnail();
					}
				?>
			</a>
		</li>
		
		<?php
			endforeach; 
			wp_reset_postdata();
		?>
		</ul>
	</section>
<?php get_footer(); ?>