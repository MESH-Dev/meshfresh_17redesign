<?php get_header(); ?>

<!-- <section id="works-filter" class="cf">
	<div class="container-main cf">
		<div class="gutter cf">
			<a id="complete-works" href="<?php echo get_permalink(51); ?>">&laquo; Case Studies</a>
			<ul id="filters">
			<?php
				$categories = get_terms('medium',array(
				 	'orderby'    => 'id',
				 	'hide_empty' => 0
				 ));
				 foreach($categories as $cat){
				 	//echo "<li data-filter='".$cat->slug."'>".$cat->name."</li>";
				 }
			?>
			</ul>
			<a id="other-works" href="<?php echo get_post_type_archive_link('work'); ?>">More Projects &raquo;</a>
		</div>
	</div>
</section> -->

<?php 

	$mediums = get_the_terms($post->ID, 'medium');
	$industries = get_the_terms($post->ID, 'Industry');
	//var_dump($mediums);
	$separator = ', ';
	$output_industry = '';
	$output_medium = '';

	$intro_info = get_field('intro_info');

	$project_content = get_field('featured_statement');

	if(!empty($industries)){
		foreach ($industries as $industry){
			//var_dump($industry->name);
			$output_industry .= $industry->name . $separator;
			//var_dump($output_industry);
		}
	}

	if(!empty($mediums)){
		foreach ($mediums as $medium){
			//var_dump($industry->name);
			$output_medium .= '<li>' . $medium->name . $separator . '</li>';
			//var_dump(rtrim($output_medium, $separator));
			//var_dump($output_industry);
		}
	}

?>

<section class="has-emoticon">
	<div class="title-bar">
		<div class="view-all">
			<p>View all projects</p>
		</div>
		<div class="content">
			<div class="flex-content">
				<h1 class="page-title"><span><?php the_title(); ?></span></h1>
				<span class="industries tags">
					<?php echo rtrim($output_industry, $separator); ?>
				</span>
				<p><?php echo $intro_info; ?></p>
				<footer>
					<ul class="medium tags">
						<?php echo $output_medium; ?>
					</ul>
				</footer>
			</div>
		</div>
	</div>

	<div class="work-panels">

		<?php if(have_rows('showcase_images')): 
			while(have_rows('showcase_images')) : the_row();
				$image=get_sub_field('image');
				$image_url=$image['sizes']['background-fullscreen'];
			?>
			<div class="work-single" style="background-image:url('<?php echo $image_url; ?>');"></div>
		<?php endwhile; endif; ?>
	</div>

</section>

<?php
// if ( have_posts() ) {
// 	echo "<section id='works' class='archive'>
// 			<div class='container-main cf'>
// 				<div class='gutter cf workcf'>"; ?>
				<!-- <h1> <?php the_title() ?></h1> -->
	<?php
	//while ( have_posts() ) { the_post(); ?>

	<!--<div id="<?php echo( basename(get_permalink()) ); ?>" class="work-post <?php echo cycle('white','grey'); ?>">


		<div class="work-post-showcase">
			<?php $featured = get_field('showcase_images');
				foreach($featured as $image){
					echo wp_get_attachment_image($image['image'],'full');
				} ?>
		</div>

		<div class="work-post-intro">
			<div class="work-entry-data" style="background:<?php the_field('featured_background'); ?>;">
				<div class="work-entry-data-vis">
					<div class="gutter cf">
						<span class="work-entry-title"><?php the_field('featured_title'); ?></span>
						<span class="work-entry-medium"><?php the_field('featured_medium'); ?></span>
					</div>
				</div>
				<div class="work-entry-data-add">
					<div class="gutter cf">
						<span class="work-entry-statement"><?php the_field('featured_statement'); ?></span>
					</div>
				</div>
			</div>

			<div class="work-post-intro-extra">
				<div class="gutter cf">
					<?php the_field('intro_info'); ?>
				</div>
			</div>
		</div>


		<div class="work-post-content">
			<div class="work-process-data">
				<div class="work-process-data-vis" style="background:<?php the_field('featured_background'); ?>;">
					<div class="gutter cf">
						<span class="work-process-title">Process</span>
					</div>
				</div>
				<div class="work-process-intro-extra">
					<div class="gutter cf">
						<?php the_field('process_description'); ?>
					</div>
				</div>
			</div>
		</div>
	</div>-->

<?php 
// } echo "</div>
// 				</div>
// 			</section>"; } 
?>

<?php get_footer(); ?>