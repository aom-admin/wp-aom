<!-- Get Mini Nav Items -->

<p> here it is</p>
<?php 
$nav_group = get_sub_field('nav_group');


if( $nav_group ) : ?>

    <?php echo '<div class="mini-nav-wrapper row">'; ?>

    <?php while ( have_rows('nav_group') ) :
            echo '<div class="nav-group-wrapper">';
            the_row();
            $i++;
            ?>

            <!-- Group Label -->
            <?php $link = get_sub_field('group_label');
            if( $link ): 
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
                <div class="group-label">
                    <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
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
                    </li>
                <?php endif; ?>
                    
                <?php endwhile; ?>
                </ul>
            <?php endif; ?>
            </div>
            
    </div>
    <?php endwhile; ?>
    <?php ?>
    <?php ?>
    



<?php endif ?>