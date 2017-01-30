<div class="page-callout <?php if(!is_front_page()){ echo 'interior'; }?>">
			<?php 
				$callout = get_field('callout_content');
				$divider = get_field('divider_line');
			?>

			<p class="divider-line" aria-hidden="true"><?php echo $divider; ?></p>

			<h3><?php echo $callout; ?></h3>

			<?php if (have_rows('pc_cta')):
					while(have_rows('pc_cta')):the_row();

					$callout_cta_text = get_sub_field('callout_cta_text');
					$cta_link_destination = get_sub_field('cta_link_destination');
			?>

			<a class="cta" href="<?php echo $cta_link_destination; ?>"><?php echo $callout_cta_text; ?></a>

			<?php endwhile; endif; ?>
</div>