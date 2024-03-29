<!-- Get Mini Nav Items -->

<?php 
$nav_group = get_sub_field('nav_group');
$margin = get_sub_field('nav_margin');

if( $nav_group ) : ?>

<div class="mini-nav-wrapper row"
<?php if ( $margin > 0) : ?>
style="margin: <?php echo $margin; ?>px auto;"
<?php endif; ?>
> 

<?php while ( have_rows('nav_group') ) :
        echo '<div class="nav-group-wrapper">';
        the_row();
        ?>

        <!-- Group Label -->
        <?php $link = get_sub_field('group_label');
        if( $link ): 
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ? $link['target'] : '_self';
            ?>
            <div class="group-label">
                <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?><i class="arrow right"></i></a>
            </div>
        <?php endif; ?>
        
        <div class="group-content">
            <!-- Group Image -->
            <?php $image = get_sub_field('group_image');
            if ($image) : ?> 
                <?php echo wp_get_attachment_image( $image['ID'], 'full' ); ?>
            <?php endif; ?>
            
            <!-- Group Nav Items -->
            <?php if( have_rows('nav_items') ): ?>
            <ul class="nav-items">
            <?php while( have_rows('nav_items') ): the_row();
        
            $nav_item_link = get_sub_field('nav_item');
            if( $nav_item_link ): 
                $nav_item_link_url = $nav_item_link['url'];
                $nav_item_link_title = $nav_item_link['title'];
                $nav_item_link_target = $nav_item_link['target'] ? $nav_item_link['target'] : '_self';
                ?>
                <li class="nav-item">
                    <a href="<?php echo esc_url($nav_item_link_url); ?>" target="<?php echo esc_attr($nav_item_link_target); ?>"><?php echo esc_html($nav_item_link_title); ?></a>
                    <?php if( have_rows('sub_nav_items') ): ?>
                    <ul class="sub-nav">
                    <?php while( have_rows('sub_nav_items') ): the_row();
                    
                    $sub_nav_item_link = get_sub_field('sub_nav_item');
                    if( $sub_nav_item_link ): 
                        $sub_nav_item_link_url = $sub_nav_item_link['url'];
                        $sub_nav_item_link_title = $sub_nav_item_link['title'];
                        $sub_nav_item_link_target = $sub_nav_item_link['target'] ? $sub_nav_item_link['target'] : '_self';
                        ?>
                        <li class="sub-nav-item">
                            <a href="<?php echo esc_url($sub_nav_item_link_url); ?>" target="<?php echo esc_attr($sub_nav_item_link_target); ?>"><?php echo esc_html($sub_nav_item_link_title); ?></a>
                        </li>
                    <?php endif; ?>

                    <?php endwhile; ?>
                    </ul>
                    <?php endif; ?>
                </li>
            <?php endif; ?>
                
            <?php endwhile; ?>
            </ul>
        <?php endif; ?>
        </div>
        
    </div>
    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
    
</div>


<?php endif ?>