<?php get_header(); ?>

<!-- wp:group {"tagName":"main"} -->
<main id="main-content" class="wp-block-group" role="main">
  <!-- wp:post-content /-->
  <!-- wp:group {"layout":{"type":"flex","justifyContent":"space-between"}} -->
  <div class="wp-block-group">
    <!-- wp:post-terms {"term":"category"} /-->
    <!-- wp:post-terms {"term":"post_tag"} /-->
  </div>
  <!-- /wp:group -->
</main>
<!-- /wp:group -->

<!-- wp:template-part {"slug":"footer","area":"footer"} /-->

<?php get_footer(); ?>