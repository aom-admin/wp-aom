<section class="one-column new-padded" role="region">
  <div class="row 
  <?php if ( get_sub_field('border_color') ) : ?>
    with-border"
    <?php $bordercolor = get_sub_field('border_color'); ?>
    style="border-color: <?php echo $bordercolor ?>;"
  <?php endif; ?>
  > 
    <div class="columns medium-10 medium-centered">
      <div class="entry-content">
        <?php the_sub_field('content'); ?>
      </div>
    </div>
  </div>
</section>