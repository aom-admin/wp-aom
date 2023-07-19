<section class="blog-single-header">

  <div class="header-container author-info">
    <div class="row">
      <div class="small-12 medium-8 columns">
        <?php
        $authorID = get_the_author_meta('ID');
        $acfAuthor = 'user_' . $authorID;
        $authorFirstName = get_the_author_meta('first_name');
        $authorLastName = get_the_author_meta('last_name');
        $bio = get_field('bio', $acfAuthor);
        $email = get_field('email', $acfAuthor);
        $profile_photo = get_field('profile_photo', $acfAuthor);
        ?>
        <div class="row">
          <div class="small-12 medium-4 columns author-image">
            <img src="<?php echo $profile_photo; ?>" class="profile" />
          </div><!--columns-->
          <div class="small-12 medium-8 columns author-text">
            <h4 class="name"><?php echo $authorFirstName . ' ' . $authorLastName; ?></h4>
            <p class="bio bio-info"><?php echo $bio; ?></p>
            <p class="email bio-info"><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></p>
            <p class="entry-posted-on"><span class="entry-date"><?php the_date( 'M j, Y' ); ?></span></p>
          </div><!--columns-->
        </div><!--row-->
      </div>
    </div>
  </div><!--header-container-->
</section>
