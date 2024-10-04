<?php
/**
 * Title: 404
 * Slug: voyago/404
 * Categories: hidden
 * Inserter: no
 */
?>
<!-- wp:template-part {"slug":"header","tagName":"header"} /-->

<!-- wp:group {"tagName":"main","layout":{"type":"constrained"}} -->
<main class="wp-block-group"><!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"fontSize":"120px"}}} -->
<h1 class="wp-block-heading has-text-align-center" style="font-size:120px"><?php echo __('404', 'voyago');?></h1>
<!-- /wp:heading -->

<!-- wp:heading {"textAlign":"center"} -->
<h2 class="wp-block-heading has-text-align-center"><?php echo __('Lost in the Journey?', 'voyago');?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center"><?php echo __('Oops! The page you’re looking for seems to have taken a different path. But don\'t worry, you can always return to the homepage or explore other exciting destinations on our site. Let\'s get you back on track!', 'voyago');?></p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"textAlign":"center","backgroundColor":"custom-primary","textColor":"white","className":"is-style-button-hover-white-fill","style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}},"spacing":{"padding":{"left":"var:preset|spacing|70","right":"var:preset|spacing|70"}}}} -->
<div class="wp-block-button is-style-button-hover-white-fill"><a class="wp-block-button__link has-white-color has-custom-primary-background-color has-text-color has-background has-link-color has-text-align-center wp-element-button" href="/" style="padding-right:var(--wp--preset--spacing--70);padding-left:var(--wp--preset--spacing--70)"><?php echo __('Go Home', 'voyago');?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></main>
<!-- /wp:group -->

<!-- wp:template-part {"slug":"footer","tagName":"footer"} /-->