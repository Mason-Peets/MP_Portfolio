<?php
/**
 * Title: index
 * Slug: voyago/index
 * Categories: hidden
 * Inserter: no
 */
?>
<!-- wp:template-part {"slug":"header","tagName":"header"} /-->

<!-- wp:group {"tagName":"main","layout":{"type":"constrained"}} -->
<main class="wp-block-group"><!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|60"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"level":1} -->
<h1 class="wp-block-heading"><?php echo __('Blog', 'voyago');?></h1>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:query {"queryId":16,"query":{"perPage":10,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true},"metadata":{"categories":["posts"],"patternName":"core/query-standard-posts","name":"Standard"}} -->
<div class="wp-block-query"><!-- wp:post-template -->
<!-- wp:post-title {"isLink":true} /-->

<!-- wp:post-featured-image {"isLink":true,"align":"wide"} /-->

<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group"><!-- wp:post-date /-->

<!-- wp:post-terms {"term":"category"} /--></div>
<!-- /wp:group -->

<!-- wp:post-excerpt /-->

<!-- wp:read-more {"content":"Read More 🡭","className":"button-hover-no-fill","style":{"elements":{"link":{"color":{"text":"var:preset|color|custom-primary"}}}},"textColor":"custom-primary"} /-->

<!-- wp:separator {"opacity":"css"} -->
<hr class="wp-block-separator has-css-opacity"/>
<!-- /wp:separator -->
<!-- /wp:post-template --></div>
<!-- /wp:query --></div>
<!-- /wp:column -->

<!-- wp:column {"width":"30%","style":{"spacing":{"padding":{"right":"var:preset|spacing|60","left":"var:preset|spacing|60","top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}},"elements":{"link":{"color":{"text":"var:preset|color|white"}}}},"backgroundColor":"custom-background-secondary","textColor":"white"} -->
<div class="wp-block-column has-white-color has-custom-background-secondary-background-color has-text-color has-background has-link-color" style="padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--60);flex-basis:30%"><!-- wp:heading {"level":4} -->
<h4 class="wp-block-heading"><?php echo __('Follow Us', 'voyago');?></h4>
<!-- /wp:heading -->

<!-- wp:social-links -->
<ul class="wp-block-social-links"><!-- wp:social-link {"url":"#","service":"instagram"} /-->

<!-- wp:social-link {"url":"#","service":"linkedin"} /-->

<!-- wp:social-link {"url":"#","service":"facebook"} /-->

<!-- wp:social-link {"url":"#","service":"youtube"} /-->

<!-- wp:social-link {"url":"#","service":"twitter"} /--></ul>
<!-- /wp:social-links -->

<!-- wp:separator {"className":"is-style-wide","style":{"color":{"background":"#a5a5a570"}}} -->
<hr class="wp-block-separator has-text-color has-alpha-channel-opacity has-background is-style-wide" style="background-color:#a5a5a570;color:#a5a5a570"/>
<!-- /wp:separator -->

<!-- wp:heading {"level":4} -->
<h4 class="wp-block-heading"><?php echo __('Search', 'voyago');?></h4>
<!-- /wp:heading -->

<!-- wp:search {"label":"Search","showLabel":false,"placeholder":"Searching...","width":291,"widthUnit":"px","buttonText":"Search","style":{"border":{"radius":"0px"}},"backgroundColor":"custom-primary"} /-->

<!-- wp:separator {"className":"is-style-wide","style":{"color":{"background":"#a5a5a570"}}} -->
<hr class="wp-block-separator has-text-color has-alpha-channel-opacity has-background is-style-wide" style="background-color:#a5a5a570;color:#a5a5a570"/>
<!-- /wp:separator -->

<!-- wp:heading {"level":4} -->
<h4 class="wp-block-heading"><?php echo __('Latest Posts', 'voyago');?></h4>
<!-- /wp:heading -->

<!-- wp:latest-posts /-->

<!-- wp:separator {"className":"is-style-wide","style":{"color":{"background":"#a5a5a570"}}} -->
<hr class="wp-block-separator has-text-color has-alpha-channel-opacity has-background is-style-wide" style="background-color:#a5a5a570;color:#a5a5a570"/>
<!-- /wp:separator -->

<!-- wp:heading {"level":4} -->
<h4 class="wp-block-heading"><?php echo __('Categories', 'voyago');?></h4>
<!-- /wp:heading -->

<!-- wp:categories /-->

<!-- wp:separator {"className":"is-style-wide","style":{"color":{"background":"#a5a5a570"}}} -->
<hr class="wp-block-separator has-text-color has-alpha-channel-opacity has-background is-style-wide" style="background-color:#a5a5a570;color:#a5a5a570"/>
<!-- /wp:separator -->

<!-- wp:heading {"level":4} -->
<h4 class="wp-block-heading"><?php echo __('Tags', 'voyago');?></h4>
<!-- /wp:heading -->

<!-- wp:tag-cloud /--></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->

<!-- wp:spacer {"height":"30px"} -->
<div style="height:30px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer --></main>
<!-- /wp:group -->

<!-- wp:template-part {"slug":"footer","tagName":"footer"} /-->