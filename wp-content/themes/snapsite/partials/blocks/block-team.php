<?php $post_objects = get_field('team_members');

if( $post_objects ): ?>
    <ul>
    <?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
        <?php setup_postdata($post); ?>
        <li>
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            <span>Post Object Custom Field: <?php the_field('field_name'); ?></span>
        </li>
    <?php endforeach; ?>
    </ul>
    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif; ?>
<section class="team-members padded">
	<div class="grid-container">
		<div class="grid-x">
			<div class="small-12 medium-6 large-4 cell">
			</div>
		</div><!--grid-x-->
	</div><!--grid-container-->
</section>