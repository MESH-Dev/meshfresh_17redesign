<?php /* Template Name: Work Archive - Macy */


get_header(); ?>

<section id=""><!-- page-content -->
	<div id="gallery_cover"></div>
	<div class="work-grid" id="macy"><!-- container -->
		<!-- <div class="row"> -->
	<?php
		$args = array(
					'post_type'      => 'work',
					//'meta_key'       => 'featured',
					//'meta_value'     => true,
					//'meta_compare'   => '!=',
					'order' => 'ASC',
					'order_by' => 'date',
					'posts_per_page' => -1,
					'tax_query' => array(
						array(
							'taxonomy' => 'display_state',
							'field'    => 'slug',
							'terms'    => 'archive',
							'operator' => 'NOT IN'
						),
					),
				);
				$query = new WP_Query($args);
				if ( $query->have_posts() ) { 
					$wk_ctr=0;
					while ( $query->have_posts() ) { $query->the_post(); 

					$wk_ctr++;
					$tile_image = get_field('featured_cover', $post->ID);
					$tile_image_url = $tile_image['sizes']['large'];
					$industries = get_the_terms($post->ID, 'Industry');
					//var_dump($industries);
		 			$mediums = get_the_terms($post->ID, 'medium');
		 			$position = get_field('pt_position');
		 			//var_dump($mediums);
		 			$separator = ', ';
		 			$output_industry = '';
		 			$output_medium = '';

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

		 			$rand = mt_rand(1, 3);

		 			// if($rand == 1){
		 			// 	$position = 'left';
		 			// }elseif ($rand == 2){
		 			// 	$position = 'right';
		 			// }else{
		 			// 	$position = 'center';
		 			// }
					?>
		 <div class="work-block columns-4" ><!-- columns-4 -->
		 	<div class="hover" onclick="infoOpen()">
	 				<div class="content">
		 				<h2>
		 					<!-- <a href="<?php //the_permalink(); ?>"> -->
		 					<?php the_title(); ?> (<?php echo $wk_ctr; ?>)
		 					<!-- </a> -->
		 				</h2>
		 			<span class="industries tags"> 
		 				<?php echo rtrim($output_industry, $separator); ?>
		 			</span>
	 					<?php //We can bring this in again if we decide to create the individual pages to show this
	 						//echo get_the_term_list($post->ID, 'Industry','<span class="tags">',', ','</span>') 
	 					?>
	 					
	 					<footer>
	 						<ul class="mediums tags">
	 							<?php 
	 								//Need to figure out how to strip ", " from last li
	 								echo $output_medium; 
 								?>
 							</ul>
	 						<?php 
	 							//echo get_the_term_list($post->ID,'medium','<ul><li>',',</li><li>', '</li></ul>') 
	 						?>
 						</footer>
	 					<!-- </ul> -->
 					</div><!-- end content -->
	 			</div><!-- end hover -->
		 	<div class="work-container <?php echo $position; ?>">

		 		<?php 

		 		//var_dump(get_the_post_thumbnail());

		 		if ($tile_image_url != '') { ?>
		 			<img src="<?php echo $tile_image_url; ?>" >
		 		<?php }else{ ?>

		 		<?php $rand_img = mt_rand(1, 2); 
		 			if($rand_img ==1 ){
	 			?>
		 			<img class="work-img" src="http://placehold.it/700x805"><!-- if(get_the_post_thumbnail() !== '' ){ }else{echo $tile_image_url; } -->
	 			<?php }else{ ?>
	 				<img class="work-img" src="http://placehold.it/700x402">
	 			<?php } ?>
	 			<?php } ?>

	 			
	 		</div><!-- end work-container -->
		</div><!-- end work-block -->
	<?php } } wp_reset_query(); ?>
	
	<!-- </div> -->
</div><!-- end work-grid -->
</section>

<!-- <section class="josh"> -->
	<div id="infobar" onclick="infoOpen()">
		<p id="explore_text">Explore the Projects</p>
		<i id="detail_exit" class="material-icons" onclick="infoClose(event)">keyboard_backspace</i>
		<div class="detail_copy" id="copy_1">
			<h3><span class="underline">Children’s Museum of the Arts New York</span></h3>
			<p>The Children’s Museum of New York has one of the most amazing new spaces for kids in the city, and a handful of impressive RISD grads as teachers — and they needed a website to match. We redesigned their site to reflect the playful but clean aesthetic of the museum, while keeping in mind the need for flexibility of daily in-house updates to detail all of their offered classes to parents and children alike. We redeveloped the site with these two audiences in mind, and the project remains an ongoing evolution as we continue to improve the site with new features.</p>
		</div>
		<div class="detail_copy" id="copy_2">
			<h3><span class="underline">Mission Savvy</span></h3>
			<p>MESH has worked with this entrepreneur from her beginning, overhauling her site, her branding, her promotional collateral online and in print, and her Kickstarter campaign, the Vegan Pop-Up in Appalachia Organic To-Go Kickstarter series. Every time she reinvents Mission Savvy, we are there to support with strategy and visuals. The brand was designed to feel personal and handmade down to its very font–the hand-illustrated Vegan Alphabet inspired by the fruits and vegetables served daily in her Cafe, her food truck, and her food lab. The Vegan Alphabet was also featured in the 2013 Print Magazine Regional Design Annual.</p>
		</div>
		<div class="detail_copy" id="copy_3">
			<h3><span class="underline">J.Q. Dickinson Saltworks</span></h3>
			<p>We partnered with the founders of J. Q. Dickinson Salt-works from their inception, working through a naming, branding, communication strategy, and sales strategy of their new, organic, and locally produced salt product. The entire project was inspired by their 200 year old family farm, both in storytelling and in design. The packaging was inspired by the original glass jar and tin lid packaging used by the family decads ago, and the typography was inspired by the grids of the original order forms found in the old farm store attic.</p>
		</div>
		<div class="detail_nav">
			<div id="prev_proj" class="detail_switch" onclick="prevScroll()">
				<p>Prev</p>
			</div>
			<div id="next_proj" class="detail_switch" onclick="nextScroll()">
				<p>Next</p>
			</div>
		</div>
	</div>


	<div id="detail_scrollarea">
    <i id="fullscreen" class="material-icons">fullscreen</i>
    <div>
    </div>
    <div>
        <a name="proj1"></a>
        <img id="img1" alt="placeholder" src="<?php echo bloginfo('url'); ?>/wp-content/uploads/2014/03/CMANY01_1600.jpg">
        <img id="img2" alt="placeholder" src="<?php echo bloginfo('url'); ?>/wp-content/uploads/2014/09/CMANY_MockUp2.jpg">
    </div>
    <div>
        <img id="img3" src="<?php echo bloginfo('url'); ?>/wp-content/uploads/2014/03/MissionSavvy3_1600.jpg">
        <img id="img4" src="<?php echo bloginfo('url'); ?>/wp-content/uploads/2014/03/MissionSavvy2_1600.jpg">
        <img id="img5" src="<?php echo bloginfo('url'); ?>/wp-content/uploads/2014/03/MissionSavvy1_1600.jpg">
    </div>
    <div>
        <a name="proj2"></a>
        <img id="img6" alt="placeholder" src="<?php echo bloginfo('url'); ?>/wp-content/uploads/2014/04/salt02_1600.jpg">
        <img id="img7" alt="placeholder" src="<?php echo bloginfo('url'); ?>/wp-content/uploads/2014/04/salt01_1600.jpg">
    </div>
</div>


<script>

</script>
<!-- </section> -->
<?php get_footer(); ?>