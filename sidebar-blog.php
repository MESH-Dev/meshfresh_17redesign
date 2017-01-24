<div id="rssUrl">
	<a href="<?php bloginfo('rss2_url'); ?>">RSS</a>
</div>
<div class="content"><!-- gutter cf -->
	<h2><span>What We're Reading</span></h2>
	<ul id="reading-list">
		<?php $lists = get_field('reading',103);
		foreach($lists as $list){ ?>
			<li><a href="<?php echo $list['url']; ?>" target="_blank" ><?php echo $list['label']; ?></a></li>
		<?php } ?>
	</ul>
	<div id="blog-tags">
		<ul id="blog-tax">
			<?php $args = array(
				'hide_empty' => false
			);
			$tags = get_tags($args);
				foreach($tags as $tag){ ?>
					<li><a href="<?php echo get_term_link($tag, 'post_tag'); ?>"><?php echo $tag->name; ?></a></li>
				<?php } ?>
		</ul>
	</div>
</div>