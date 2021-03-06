<?php /* Template Name: Blog */ 

get_header(); ?>


<section id="blogroll" class="has-emoticon">
	<div class="blogroll-grid row"><!-- container -->
		<div class="sidebar columns-2"><!-- contentPrimary -->
			<?php get_sidebar('blog'); ?>
		</div>
		<div class="columns-10 blogroll-grid" id="macy"><!-- id=contentSecondary  -->
			<!-- <div class=""> --><!-- gutter -->
				<!-- <div id=""> --><!-- posts-masn -->
					<?php $posts = blogrollPosts('all','','50');
						foreach($posts as $post){
						if($post->post_source == 'wordpress'){
							$class="wordpress";
						}else if($post->post_source == 'tumblr'){
							$class="tumblr";
						}else if($post->post_source == 'instagram'){
							$class="instagram";
						} ?>
						<div class="blog-entry blogroll-box columns-4 <?php echo $class; ?>"><!-- blog-entry -->
							<div class=""><!-- gutter -->
								<?php 

									//Is the post a Post (wp_post?) then let's do this
									if($post->post_source == 'wordpress'){

									//Setup variables
									setup_postdata($post);
									$titlePos = get_field('title_position'); 

								?>
									<div class="hover">
										<div class="content">
											<div class="post-wp-feature">
												<?php if($titlePos == 'overlay'){ ?>
													<h2 class="blog-entry-title">
														<a href="<?php the_permalink(); ?>">
															<?php the_title(); ?>
														</a>
													</h2>
												<?php } ?>
												<?php the_post_thumbnail('full'); ?>
											</div>
											<div class="post-wp-content">
												<?php if($titlePos == 'below'){ ?>
													<h2 class="blog-entry-title">
														<a href="<?php the_permalink(); ?>">
															<?php the_title(); ?>
														</a>
													</h2>
												<?php } ?>
												<?php echo get_the_excerpt(); ?>
											</div>
											<div class="post-wp-date">
												Published on <?php the_time('M d, Y'); ?>
											</div>
											<div class="post-wp-tags">
												<?php $tags = get_the_tags();
													if($tags != ''){
														foreach($tags as $tag){
															echo "<a href='".get_tag_link($tag)."'>".$tag->name."</a>";
														} 
													}
													?>
											</div>
										</div><!-- end hover content -->
									</div><!-- end hover -->
								<?php 

									//Is the post from the MESH Tumblr account?  Then let's do this...
									}elseif($post->post_source == 'tumblr'){ 

								?>
									<!-- <div class="blog-entry blogroll-box columns-4"> -->
									<img class="social-badge" src="<?php bloginfo('template_directory'); ?>/assets/img/tumblrIcon.png" />
									<div class="hover">
										<div class="content">
										<?php if($post->type == 'photo'){ ?>
											<div class="post-tumblr-feature">
												<?php $photos = $post->photos;
													foreach($photos as $photo){
														echo "<img src='".$photo->alt_sizes[0]->url."' />";
													}
												?>
											</div>
											<div class="post-tumblr-content">
												<?php echo $post->caption; ?>
											</div>
										</div>
										<?php }elseif($post->type == 'video'){
											echo '<div class="post-tumblr-wrap">'.$post->player[2]->embed_code.'</div>';
										}else{ ?>
											<div class="post-tumblr-wrap">
												<?php echo $post->description; ?>
											</div>
										<?php }?>
											<div class="followus">
												<a href="http://meshfresh.tumblr.com/" >Follow us on Tumblr</a>
											</div>
											<div class="post-instagram-date">
												Published on <?php echo date('M d, Y', $post->unix_timestamp); ?>
											</div>
											<div class="post-wp-tags">
												<a href="<?php echo get_tag_link(11); ?>" target="_blank">Tumblr</a>
											</div>
										</div><!-- end hover content -->
									</div><!-- end hover -->
								<?php 

									//Finally...Is the post from the MESH Instagram feed?  Then let's do this...
									}elseif($post->post_source == 'instagram'){ 
										?>
									<!-- <div class="blog-entry blogroll-box columns-4"> -->
									<img class="social-badge" src="<?php bloginfo('template_directory'); ?>/assets/img/instagramIcon.png" />
									
									<div class="post-instagram-feature">
										<a href="<?php echo $post->link; ?>" target="_blank">
											<img src="<?php echo $post->images->standard_resolution->url; ?>" />
										</a>
									</div>
									<div class="hover">
										<div class="content">
											<div class="post-instagram-content">
												<?php echo $post->caption->text; ?>
											</div>
											<div class="followus">
												<a href="http://instagram.com/mesh_design">Follow us on Instagram</a>
											</div>
											<div class="post-instagram-date">
												Published on <?php echo date('M d, Y', $post->unix_timestamp); ?>
											</div>
											<div class="post-wp-tags">
													<a href="<?php echo $post->link;//get_tag_link(12); ?>" target="_blank">Instagram</a>
											</div>
										</div>
									</div>
									<!-- </div> -->
								<?php } ?>
							</div>
						</div>
					<?php } wp_reset_postdata(); ?>
				<!-- </div>
			</div> -->
		</div><!-- End blogroll-grid -->
	</div>
</section>

<?php get_footer(); ?>
