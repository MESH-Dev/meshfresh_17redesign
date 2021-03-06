<?php /* Template Name: Single Work Test */ ?>

<?php get_header(); ?>

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



<?php get_footer(); ?>