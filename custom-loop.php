<?php
$loop = new WP_Query( array(
    'post_type' => 'Property',
    'posts_per_page' => -1
  )
);
?>

<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

  <!-- do stuff -->

<?php endwhile; wp_reset_query(); ?>
