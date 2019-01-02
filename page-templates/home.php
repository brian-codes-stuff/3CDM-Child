<?php
/**
 * Template Name: Home Page
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="full-width-page-wrapper">
	<div class="home-slider">
	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
 

  <?php if( have_rows('home-slider') ): ?>

  <div class="carousel-inner">

<?php 
	$x = 0;
while( have_rows('home-slider') ): the_row(); 

	// vars
	$image = get_sub_field('slider_image');
	$title = get_sub_field('slide_title');
	$content = get_sub_field('slide_content');

	?>

<div class="carousel-item <?php if ($z==0) { echo 'active';} ?>">
	<img src="<?php echo $image; ?>" alt="<?php echo $image['alt'] ?>" />
  		<div class="carousel-caption d-none d-md-block">
    		<h1><?php echo $title ?></h1>
    		<p><?php echo $content ?></p>
  		</div>
	</div>
	<?php 
$z++;
endwhile; ?>
	
  
	</div>

<?php endif; ?>


  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
	</div>

	<div class="<?php echo esc_attr( $container ); ?>" id="content">
	<hr>
		<div class="quote-tag">
		<?php the_field('quote__tagline_section'); ?>
		</div>
	<hr>
		<div class="row">

			<div class="col-md-7 content-area" id="primary">

				<main class="site-main" id="main" role="main">

					<?php the_field('page_content'); ?> 
				
				</main><!-- #main -->

			</div><!-- #primary -->
			<div class="col-md-5">
				<img class="main-image" src="<?php the_field('main_image'); ?>" />
			</div>
			<div class="col-md-12">
			<hr>
			</div>
			<div class="col-md-7">
				<?php the_field('media_call_out_section'); ?>
			</div>
			<div class="col-md-5">
			<?php if( have_rows('media_call_out_button') ): 

while( have_rows('media_call_out_button') ): the_row(); 
	
	// vars
	$text = get_sub_field('button_text');
	$link = get_sub_field('button_url');
	
	?>

	<a href="<?php echo $link; ?>" class="cta-btn"><?php echo $text; ?></a>
	
<?php endwhile; ?>

<?php endif; ?>
			</div>
			<div class="col-md-12">
			<hr>
			</div>
		</div><!-- .row end -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
