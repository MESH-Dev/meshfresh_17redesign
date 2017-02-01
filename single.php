<?php get_header(); ?>

<section id="blogroll" class="single has-emoticon">
	<div class="blogroll-single"><!-- container -->
		<div class="sidebar columns-2" id=""><!-- contentPrimary -->
			<?php get_sidebar('blog'); ?>

		</div>
		<div class="columns-8" id=""><!-- contentSecondary -->
			<div class="the-content"><!-- gutter cf -->
				<?php if(have_posts()){while(have_posts()){the_post(); ?>
					<div class="single-post-feature">
						<?php the_post_thumbnail('full'); ?>
					</div>
					<div class="single-post-content">
						<h2><?php the_title(); ?></h2>
						<?php the_content(); ?>
					</div>
					<!-- <div class="single-post-date">
						Published on <?php the_time('M d, Y'); ?>
					</div> -->
					<div class="single-post-tags">
						<?php $tags = get_the_tags();
						if($tags != ""){
							foreach($tags as $tag){
								echo "<a href='".get_tag_link($tag)."'>".$tag->name."</a>";
							} 
						}	
						?>
					</div>
				<?php } } ?>
			</div>
		</div>
		<div class="columns-2" id=""><!-- contentTertiary -->
			<div class="recent-posts"><!-- gutter -->
				<h2>Recent Posts</h2>
				<?php $posts = blogrollPosts('all','',3);
					foreach($posts as $post){
					if($post->post_source == 'wordpress'){
						$class="wordpress";
					}else if($post->post_source == 'tumblr'){
						$class="tumblr";
					}else if($post->post_source == 'instagram'){
						$class="instagram";
					} ?>
					<div class="blog-entry <?php echo $class; ?>">
						<div class="gutter">
							<?php 
								//Is the post from Wordpress?  Do this...
								if($post->post_source == 'wordpress'){
								setup_postdata($post);
								$titlePos = get_field('title_position'); ?>
								<div class="post-wp-feature">
									<?php if($titlePos == 'overlay'){ ?>
										<a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
									<?php } ?>
									<?php the_post_thumbnail('full'); ?>
								</div>
								<div class="post-wp-content">
									<?php if($titlePos == 'below'){ ?>
										<a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
									<?php } ?>
									<?php echo get_the_excerpt(); ?>
								</div>
								<!-- <div class="post-wp-date">
									Published on <?php the_time('M d, Y'); ?>
								</div> -->
								<div class="post-wp-tags">
									<?php $tags = get_the_tags();
										foreach($tags as $tag){
											echo "<a href='".get_tag_link($tag)."'>".$tag->name."</a>";
										} ?>
								</div>
							<?php 
							//is the post from tumblr? Do this...

							}elseif($post->post_source == 'tumblr'){ ?>
								<img class="social-badge" src="<?php bloginfo('template_directory'); ?>/assets/img/tumblrIcon.png" />
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
								<?php }elseif($post->type == 'video'){
									echo '<div class="post-tumblr-wrap">'.$post->player[2]->embed_code.'</div>';
								}else{ ?>
									<div class="post-tumblr-wrap">
										<?php echo $post->description; ?>
									</div>
								<?php }?>
								<div class="followus">
									<a href="http://meshfresh.tumblr.com/">Follow us on Tumblr</a>
								</div>
								<div class="post-instagram-date">
									Published on <?php echo date('M d, Y', $post->unix_timestamp); ?>
								</div>
								<div class="post-wp-tags">
									<a href="<?php echo get_tag_link(11); ?>">Tumblr</a>
								</div>
							<?php 
								//is the post from instagram?  do this...

								}elseif($post->post_source == 'instagram'){ ?>
								<img class="social-badge" src="<?php bloginfo('template_directory'); ?>/assets/img/instagramIcon.png" />
								<div class="post-instagram-feature">
									<a href="<?php echo $post->link; ?>">
										<img src="<?php echo $post->images->standard_resolution->url; ?>" />
									</a>
								</div>
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
									<a href="<?php echo get_tag_link(12); ?>">Instagram</a>
								</div>
							<?php } ?>
						</div>
					</div>
				<?php } wp_reset_postdata(); ?>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>