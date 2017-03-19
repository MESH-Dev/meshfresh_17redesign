<?php 
 
get_header();
 

?>
 
 

<?php 
 

	$post_id = $post->ID;
	$slug = get_post_field( 'post_name', $post_id );
	$bg_color=get_field('proj_bg_color');
	$setColor =  get_field('proj_bg_color', $post->ID);
	$color = $setColor;
	$rgb = hex2rgba($color);
	$rgba = hex2rgba($color, 0.85);

	//$active_class = '';
	//if($single){$active_class = 'active-project';}


	

	//Get content/metadata
	$mediums = get_the_terms($post_id, 'medium');
	$industries = get_the_terms($post_id, 'Industry');
 
	$separator = ', ';
	$output_industry = '';
	$output_medium = '';

	$intro_info = get_field('intro_info',$post_id);

	$project_content = get_field('featured_statement',$post_id);

	if(!empty($industries)){
		foreach ($industries as $industry){

			$output_industry .= $industry->name . $separator;

		}
	}

	$output_industry = rtrim($output_industry,', '); 

	if(!empty($mediums)){
		foreach ($mediums as $medium){

			$output_medium .=  $medium->name . $separator;

		}
	}

	$output_medium = rtrim($output_medium,', '); 

	$title = get_the_title($post_id);
	$text_str = '';


	$text_str .= '<div id="'. $slug . '" class="detail_copy '.$active_class .'" data-color="'.$rgba.'" style="visibility: visible;">';
	$text_str .= '	<h3><span class="underline">'.$title.'</span></h3>';
	$text_str .= '	<span class="industries tags">'.rtrim($output_industry, $separator).'</span>';
	$text_str .= '	<p> '.$intro_info.'</p>';
	$text_str .= '	<footer>';
	$text_str .= '		<ul class="medium tags">'.$output_medium;
	$text_str .= '		</ul>';
	$text_str .= '	</footer>';
	$text_str .= '</div>';

?>

	<div id="infobar" class="open" style="background-color: <?php echo $rgba; ?>; left: 0px; cursor: default;">
		
 
		
  

		<i id="detail_close" class="material-icons" >clear</i>
		<span id="project_tip" class="tooltip">Close Project Details</span>
 
		<div id="sidebar-content" class=" " style="visibility: visible;">

			<?php 
 
				echo $text_str;
			?>

			<div class="detail-side-title">
				<div class="detail-side-text">
					<p>&#8226; &#8226; &#8226; &nbsp; <?php echo $title; ?></p>
				</div>
					
			</div>
	
		</div>
 
		<div class="detail_nav">
			 
		</div>
	</div>	

	<div id="detail_scrollarea" style="visibility: inherit; opacity: 1;">
		<div id="project-panels" class="work-panels">

			<?php 
			$slug = get_post_field( 'post_name', $post_id );

				$image_str = '';

				//get images for project
				//if(have_rows('showcase_images', $post_id)): 

					$image_str = '<div id="'.$slug.'-panels" class="project-wrap '.$active_class .'" data-id="'.$post_id.'">';
					while(have_rows('showcase_images', $post_id)) : the_row();
						$image=get_sub_field('image', $post_id);
			 
						$image_url=$image['sizes']['background-fullscreen-sq'];

						$image_type =  substr($image_url, -3);

						if($image_type == "gif"){
							$image_url = $image['url'];
						}
						 
						//$image_str .= "<img id='image-$image[id]' src='". get_template_directory_uri()."/assets/img/blank.png' data-src='$image_url'>";

						$image_str .= "<img class='lazy-load' id='image-$image[id]'  src='data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7' data-src='$image_url' >";

					endwhile; 
					$image_str .="</div>";

					echo $image_str;
			?>
		</div>	
	</div>






<!-- 
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

</section> -->



<!-- </section> -->
<?php get_footer(); ?>

<script type="text/javascript">
	//GoToProject(<?php echo $post->ID; ?>, false);
	
</script>