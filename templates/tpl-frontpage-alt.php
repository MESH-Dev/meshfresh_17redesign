<?php /* Template Name: Frontpage New */ 


get_header();  ?>

<section id="home">
 

	<?php 
		$right_img = get_field('right_image');
		$right_img_url = $right_img['sizes']['background-fullscreen'];
		//var_dump($right_img);
		$left_img = get_field('left_image');
		$left_img_url = $left_img['sizes']['background-fullscreen'];
	?>
 
 	
 
<div class="background-full" style="background-image:url('<?php echo $left_img_url; ?>')">
	<div class="twenty20 twentytwenty-container">

			<div class="twentytwenty-before-container">
				
		    	<div class="img-container-first" style="background-image: url('<?php echo $right_img_url; ?>'); ">
		    		<div class="badge badge-left">
			    	<div class="wrap">
			    		<div class="content">
					    	<h3>MESH Charleston</h3>
					    	<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </span>
				    	</div>
			    	</div>
		    	</div>
		    	</div>
				<!-- <img class="compare" src="<?php echo $right_img_url; ?>" /> -->
			</div>
			<div class="twentytwenty-after-container">
				
		   		<div class="img-container-second" style="background-image: url('<?php echo $left_img_url; ?>');">
		   			<div class="badge badge-right">
			    	<div class="wrap">
			    		<div class="content">
					    	<h3>MESH Brooklyn</h3>
					    	<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </span>
				    	</div>
			    	</div>
		   		</div>
		    	</div>
			    <!-- <img src="<?php echo $left_img_url; ?>" /> -->
			</div>
	   	<div class="content">
		    <div class="home_greeting" aria-hidden="true">
   				<h1>
		    		MESH is your full service communication design studio. We make brands, websites, print works, digital media, objects, and other fun stuff to share your good ideas.
		    	</h1>
		    </div>
    </div>

	    

	    

	    <svg>
		    <line x1="-2000" y1="0" x2="-22200" y2="100%"  />  
		</svg>

 
	</div>
	</div>
	<!-- <div class="site-title">
		<h1 class="home-title"><a href="<?php echo bloginfo('url'); ?>/work">Hi <span class="emoticon">:)</span> MESH is your full service communication design studio. We make brands, websites, print works, digital media, objects, and other fun stuff to share your good ideas <span class="link-indicator">&raquo;</span></h1>
	<div>	 -->
	<div class="has-emoticons">
		<div class=" home">

			<!--<div class="featured-projects projects" id="macy">
				<?php $args = array(
					'post_type'      => 'work',
					//'meta_key'       => 'featured',
					//'meta_value'     => true,
					//'meta_compare'   => '=',
					'tax_query' => array(
						array(
							'taxonomy' => 'display_state',
							'field'    => 'slug',
							'terms'    => 'featured',
						),
					),
					'posts_per_page' => -1,
					'orderby' => 'date'
					);
						$query = new WP_Query($args);
						if ( $query->have_posts() ) {
							$pj_ctr=0;
							while ( $query->have_posts() ) { $query->the_post(); 
							
							$pj_ctr++;
							$rand = mt_rand(1, 3);
							$positon;
							$img;

				 			if($rand == 1){
				 				$position = 'left';
				 				$img = '<img class="work-img" src="http://placehold.it/700x805">';
				 			}elseif ($rand == 2){
				 				$position = 'right';
				 				$img = '<img class="work-img" src="http://placehold.it/700x402">';
				 			}else{
				 				$position = 'center';
				 				$img = '<img class="work-img" src="http://placehold.it/700x600">';
				 			}
				?>
				<div class="project-box columns-4">
						<div class="project-container <?php echo $position; ?>">
							<a href="<?php echo the_permalink(); ?>">
								<div class="hover">
									<div class="content">
									<?php echo the_title(); ?> (<?php echo $pj_ctr; ?>)
									</div>
								</div>
								<?php echo $img;  ?>
							</a>
						</div>
					</div>
				<?php } } wp_reset_query(); ?>
			</div>-->
					<!-- ++++++++++++++++++++++++++++++++++++++++++++++ -->
			<div class="projects row">
				<div class="columns-4">
					<?php 
						if (have_rows('project_container_column_1')):
							while (have_rows('project_container_column_1')):the_row();

						$project_img_position=get_sub_field('pb_position');	
						$project_img = get_sub_field('project_image');
						//var_dump($project_img);
						$project_img_url = $project_img['sizes']['large'];
						//var_dump($project_img_url);
						$project_hover=get_sub_field('pb_hover_text');
						$project_hover_title=get_sub_field('pb_hover_statement');
						$project_link=get_sub_field('project_link');
						$position=get_sub_field('pb_position');
						$award = get_sub_field('award_winning');
					?>

					<div class="project-box">
						<div class="hover">
									<div class="content">
									<a href="<?php echo $project_link; ?>"><?php echo $project_hover_title; ?><br><span><?php echo $project_hover; ?></span></a>
									</div>
								</div>
						<div class="project-container <?php echo $position; ?> <?php echo $award; ?>">
								
								<div class="project-img">
									<?php if ($award == true){ ?>
									<div class="award-winning">
										<img src="<?php echo get_template_directory_uri(); ?>/assets/img/award-winning.png">
									</div>
									<?php }?>
									<img src="<?php echo $project_img_url;  ?>">
								</div>
							
						</div>
					</div>
					<?php endwhile; endif; ?>
				</div>
				<div class="columns-4">
						<?php 
							if (have_rows('project_container_column_2')):
								while (have_rows('project_container_column_2')):the_row();

							$project_img_position=get_sub_field('pb_position');	
							$project_img = get_sub_field('project_image');
							//var_dump($project_img);
							$project_img_url = $project_img['url'];
							//var_dump($project_img_url);
							$project_hover=get_sub_field('pb_hover_text');
							$project_hover_title=get_sub_field('pb_hover_statement');
							$project_link=get_sub_field('project_link');
							$position=get_sub_field('pb_position');
							$award = get_sub_field('award_winning');
						?>

						<div class="project-box">
							<div class="hover">
										<div class="content">
											<a href="<?php echo $project_link; ?>"><?php echo $project_hover_title ?><br><span><?php echo $project_hover; ?></span></a>
										</div>
									</div>
							<div class="project-container <?php echo $position; ?>">
								
									
								<div class="project-img">
									<?php if ($award == true){ ?>
									<div class="award-winning">
										<img src="<?php echo get_template_directory_uri(); ?>/assets/img/award-winning.png">
									</div>
									<?php }?>
										<img src="<?php echo $project_img_url;  ?>">
								</div>
								
							</div>
						</div>
						<?php endwhile; endif; ?>
				</div>
				<div class="columns-4">
						<?php 
							if (have_rows('project_container_column_3')):
								while (have_rows('project_container_column_3')):the_row();

							$project_img_position=get_sub_field('pb_position');	
							$project_img = get_sub_field('project_image');
							//var_dump($project_img);
							$project_img_url = $project_img['sizes']['large'];
							//var_dump($project_img_url);
							$project_hover=get_sub_field('pb_hover_text');
							$project_hover_title=get_sub_field('pb_hover_statement');
							$project_link=get_sub_field('project_link');
							$position=get_sub_field('pb_position');
							$award = get_sub_field('award_winning');
						?>

						<div class="project-box">
							<div class="hover">
										<div class="content">
										<a href="<?php echo $project_link; ?>"><?php echo $project_hover_title ?><br><span><?php echo $project_hover; ?></span></a>
										</div>
									</div>
							<div class="project-container <?php echo $position; ?>">
								
									
									<div class="project-img">
									<?php if ($award == true){ ?>
										<div class="award-winning">
											<img src="<?php echo get_template_directory_uri(); ?>/assets/img/award-winning.png">
										</div>
									<?php }?>
										<img src="<?php echo $project_img_url;  ?>">
									</div>
								
							</div>
						</div>
						<?php endwhile; endif; ?>
				</div>
			</div>
			<?php get_template_part('/partials/emoticons'); ?>
		</div><!-- end container.home  -->
	</div> <!-- end has-emoticons -->
	<div class="container">
		<?php get_template_part('/partials/page-callout'); ?>
	</div>

	
</section>

<?php get_footer(); ?>