<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Team9
 */

get_header();
?>

	<div id="primary" class="content-area col-md-12">
		<main id="main" class="site-main">
	<!--		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

			  <ol class="carousel-indicators">
			    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
			    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
			    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
			  </ol>

			  <div class="carousel-inner" role="listbox">
			    <?php $slider = get_posts(array('post_type' => 'slider', 'posts_per_page' => 3)); ?>
			      <?php $count = 0; ?>
			      <?php foreach($slider as $slide): ?>
			      <div class="item <?php echo ($count == 0) ? 'active' : ''; ?>">
			        <img src="<?php echo wp_get_attachment_url( get_post_thumbnail_id($slide->ID)) ?>" class="img-responsive"/>
			      </div>
			      <?php $count++; ?>
			    <?php endforeach; ?>
			  </div>

			  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
			    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			    <span class="sr-only">Previous</span>
			  </a>
			  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
			    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			    <span class="sr-only">Next</span>
			  </a>
</div> -->
		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<div class="col-md-4">
<?php get_sidebar(); ?>
</div>
<?php get_footer();
