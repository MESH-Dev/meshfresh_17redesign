<?php /* Template Name: Work Archive NEW */


get_header();
 

?>
 


<section id="grid" class="has-emoticon"><!-- page-content -->
	<div id="gallery_cover"></div>
	<div class="work-grid" id="macy"><!-- container -->
 
 
</div><!-- end work-grid -->
</section>
 <?php 
			while ( have_posts() ) { the_post();
			$post_id = $post->ID;
				$slug = get_post_field( 'post_name', $post_id );
				$bg_color=get_field('proj_bg_color');
				 ?>

<!-- <section class="josh"> -->
	<div id="infobar" class="single-open" style="background-color: <?php echo $bg_color;?>">

		<p id="explore_text"> <span>&#10142;</span>  Explore the Work</p>
		
		<i id="detail_exit single-open" class="material-icons" >keyboard_backspace</i>
		<a href="<?php echo "#" ?>"></a><span id="back_tip" class="tooltip">View All Projects</span></a>

		<i id="detail_close" class="material-icons" >clear</i>
 
		<div id="sidebar-content single-open" class=" ">

 		

<?php
				
				

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


				$text_str .= '<div id="'. $slug . '" class="detail_copy single-open'.$active_class .'" data-color="'.$bg_color.'">';
				$text_str .= '	<h3><span class="underline">'.$title.'</span></h3>';
				$text_str .= '	<span class="industries tags">'.rtrim($output_industry, $separator).'</span>';
				$text_str .= '	<p> '.$intro_info.'</p>';
				$text_str .= '	<footer>';
				$text_str .= '		<ul class="medium tags">'.$output_medium;
				$text_str .= '		</ul>';
				$text_str .= '	</footer>';
				$text_str .= '</div>';

				echo $text_str;
 
			?>





			<div class="detail-side-title">
				<p><?php //echo $title; ?></p>
			</div>
	
		</div>
 
		<div class="detail_nav single-open">
 
	</div>


	<div id="detail_scrollarea" class="single-open">
	    <i id="fullscreen" class="material-icons"  >fullscreen</i>
	    <i id="fullscreen_exit" class="material-icons">fullscreen_exit</i>
	    <span id="fs_tip" class="tooltip">Expand the Images</span>
	    <span id="fs_close_tip" class="tooltip">Close Fullscreen</span>

	    <div>
	    </div>

		<div id="project-panels" class="work-panels">
			<!-- PROJECTS DYNAMICALLY ADDED HERE -->
			<?php 
 

				$post_id = get_the_ID();
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

				//endif; 






			} wp_reset_query(); wp_reset_postdata();
			?>
		
		</div>	
 
	</div>

<!-- </section> -->
<?php get_footer(); ?>
