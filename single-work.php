<?php get_header(); ?>

<?php
	// Start the loop.
	while ( have_posts() ) : the_post();
	
	if (get_post_meta(get_the_ID(), 'neuron_works_meta', true)) {
		$work_meta = get_post_meta(get_the_ID(), 'neuron_works_meta', true);
	}else{
		$work_meta = array();
	}

	if (array_key_exists('sub_title', $work_meta)) {
		$sub_title = $work_meta['sub_title'];
	}else{
		$sub_title = '' ;
	}
	if (array_key_exists('single_page_img', $work_meta)) {
		$single_page_img = $work_meta['single_page_img'];
	}else{
		$single_page_img = '' ;
	}
	if (array_key_exists('link_text', $work_meta)) {
		$link_text = $work_meta['link_text'];
	}else{
		$link_text = 'Visit Website' ;
	}
	if (array_key_exists('link', $work_meta)) {
		$link = $work_meta['link'];
	}else{
		$link = '' ;
	}
	if (array_key_exists('client_informations', $work_meta)) {
		$client_informations = $work_meta['client_informations'];
	}else{
		$client_informations = '' ;
	}		
?>
	<!-- ::::::::::::::::::::: Page Title Section:::::::::::::::::::::::::: -->
	<section <?php if(has_post_thumbnail()): ?> style="background-image: url(<?php the_post_thumbnail_url('large'); ?>);" <?php endif;?> class="page-title">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<!-- breadcrumb content -->
					<div class="page-breadcrumbd">
						<h2><?php the_title(); ?></h2>
						<p><a href="<?php echo site_url(); ?>">Home</a> / <?php the_title(); ?></p>
					</div><!-- end breadcrumb content -->
				</div>
			</div>
		</div>
	</section><!-- end breadcrumb -->

	<!-- start portfolio single -->
	<section class="single-portfolio-wrapper section-padding">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<!-- single portfolio images -->
					<div class="single-portfolio-images">
						<?php $work_sing_img = wp_get_attachment_image_src($single_page_img, 'large');?>
						<?php if(!empty($single_page_img)): ?>
						<img class="img-responsive" src="<?php echo $work_sing_img[0]; ?>" alt="" />
						<?php else : ?>
							<?php the_post_thumbnail('large'); ?>
						<?php endif;?>
					</div>
				</div>
				<div class="col-md-4">
					<!-- single portfolio info -->
					<div class="single-portfolio-inner">
						<header class="single-portfolio-title">
							<?php echo $sub_title; ?>
							
						</header>
						<div class="portfolio-details-panel">
							<?php the_content(); ?>
							
							<ul class="portfolio-meta">

								<?php if(!empty($client_informations)) : foreach( $client_informations as $information ) : ?>
									<li><span> <?php echo $information['title']; ?> </span> <?php echo $information['value']; ?></li>
								<?php endforeach; endif; ?>

								<li><span> Share </span> <a href="#"><i class="fa fa-facebook"></i></a> <a href="#"><i class="fa fa-twitter"></i></a> <a href="#"><i class="fa fa-google-plus"></i></a> <a href="#"><i class="fa fa-pinterest"></i></a></li>
							</ul>
						</div>
						<?php if(!empty($link)): ?>
						<a class="btn btn-primary" href="<?php echo $link; ?> "> <?php echo $link_text; ?>  </a>
						<?php endif;?>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php endwhile;?>

<?php get_footer(); ?>