
<?php get_header(); ?>

<main id="main-content" class="wp-block-group" role="main">
  <!-- wp:pattern {"slug":"flixbe/hero"} /-->
  <!-- wp:query {"queryId":2,"query":{"perPage":6,"postType":"post","order":"desc","orderBy":"date"}} -->
  <div class="wp-block-query">
    <!-- wp:post-template {"className":"is-style-minimal"} -->
      <!-- wp:post-title {"isLink":true} /-->
      <!-- wp:post-excerpt /-->
    <!-- /wp:post-template -->
    <!-- wp:query-pagination {"layout":{"type":"flex","justifyContent":"space-between"}} -->
      <!-- wp:query-pagination-previous /-->
      <!-- wp:query-pagination-numbers /-->
      <!-- wp:query-pagination-next /-->
    <!-- /wp:query-pagination -->
  </div>
  <!-- /wp:query -->
</main>

<!-- wp:template-part {"slug":"footer","area":"footer"} /-->

<?php get_footer(); ?>
