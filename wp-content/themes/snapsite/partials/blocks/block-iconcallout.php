<!-- Get Icon Callouts -->

<?php
$callouts = get_sub_field('callouts');
$margin = get_sub_field('callout_margin');

if ($callouts) :
    // if min_height is set, store and add inline style later
    $min_height = get_sub_field('min_height');
    $min_height = $min_height ? 'min-height:' . $min_height : '';

    $count = count(get_sub_field('callouts'));
    if ($count >= 3) {
        $count = 3;
    } elseif ($count = 2) {
        $count = 2;
    } else {
        $count = 1;
    }
?>


    <div class="callout-wrapper columns flex-by-<?php echo $count ?>" <?php if ($margin > 0) : ?> style="margin: <?php echo $margin; ?>px auto;" <?php endif; ?>>
        <div class="row">
            <?php while (have_rows('callouts')) :
                echo '<div class="callout-item-wrapper" style="' . $min_height . '">';
                the_row();
            ?>
                <div class="callout-head" style="<?php echo $min_height ?>">
                    <!-- Callout Icon -->
                    <?php $icon = get_sub_field('icon');
                    if ($icon) : ?>
                        <div class="icon">
                            <?php echo wp_get_attachment_image($icon['ID'], 'full'); ?>
                        </div>
                    <?php endif; ?>


                    <!-- Callout Title -->
                    <?php $title = get_sub_field('title');
                    if ($title) : ?>
                        <h3><?php echo $title ?></h3>
                    <?php endif; ?>

                    <!-- Calllout Content -->
                    <div class="callout-content">
                        <?php $content = get_sub_field('content');
                        if ($content) :
                            echo get_sub_field('content');
                        endif; ?>
                    </div>
                </div>
                <?php $link = get_sub_field('cta');
                if ($link) :
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                    <div class="button-wrapper">
                        <a class="button" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                    </div>
                <?php endif; ?>
        </div>
    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>

    </div>
    </div>


<?php endif ?>