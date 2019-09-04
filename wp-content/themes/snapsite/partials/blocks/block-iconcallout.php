<!-- Get Icon Callouts -->

<?php 
$callouts = get_sub_field('callouts');


if( $callouts ) : 
    $count = count(get_sub_field('callouts'));
    if ( $count >= 3 ) {
        $count = 3;
    } elseif ( $count = 2 ) {
        $count = 2;
    } else {
        $count = 1;
    }
?>
    

    <div class="callout-wrapper columns flex-by-<?php echo $count ?>">
        <div class="row">
        <?php while ( have_rows('callouts') ) :
            echo '<div class="callout-item-wrapper">';
            the_row();
            $i++;
            ?>
            <div class="callout-head">
            <!-- Callout Icon -->
            <?php $icon = get_sub_field('icon');
            if ($icon) : ?> 
                <div class="icon">
                <?php echo wp_get_attachment_image( $icon['ID'], 'full' ); ?>
                </div>
            <?php endif; ?>
            
            
            <!-- Callout Title -->
            <?php $title = get_sub_field('title');
            if ($title) : ?> 
                <h3><?php echo $title?></h3>
            <?php endif; ?>

            <!-- Calllout Content -->
            <div class="callout-content">
            <?php $content = get_sub_field('content');
            if( $content ): 
                if ($content) : ?> 
                    <?php echo get_sub_field('content'); ?>
                <?php endif; ?>
            <?php endif; ?>
            </div>
            </div>
            <?php $link = get_sub_field('cta');
            if( $link ): 
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';?>
                <a class="button" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
            <?php endif; ?>
            </div>
        <?php endwhile; ?>
        <?php wp_reset_postdata(); ?>
    
        </div>
    </div>


<?php endif ?>