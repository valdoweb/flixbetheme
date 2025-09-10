<?php
/**
 * Title: Hero – centered
 * Slug: flixbe/hero-simple
 * Categories: flixbe, hero, header
 * Keywords: hero, header, banner, cta
 * Description: A full-width hero with heading, text and primary/secondary buttons.
 * Inserter: true
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"8rem","bottom":"8rem"}}},"backgroundColor":"base","textColor":"contrast","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull has-contrast-color has-base-background-color has-text-color has-background" style="padding-top:8rem;padding-bottom:8rem">
    <!-- wp:group {"align":"wide","layout":{"type":"constrained"}} -->
    <div class="wp-block-group alignwide">
        <!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"fontSize":"clamp(2rem,4vw,3.5rem)","fontWeight":"800"}}} -->
        <h1 class="wp-block-heading has-text-align-center" style="font-size:clamp(2rem,4vw,3.5rem);font-weight:800">Craft your headline here</h1>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"clamp(1rem,1.4vw,1.25rem)"},"spacing":{"margin":{"top":"1rem"}}},"className":"is-style-lead"} -->
        <p class="has-text-align-center is-style-lead" style="margin-top:1rem;font-size:clamp(1rem,1.4vw,1.25rem)">Add a short, compelling subheading that explains your value in one or two sentences.</p>
        <!-- /wp:paragraph -->

        <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"2rem"}}}} -->
        <div class="wp-block-buttons" style="margin-top:2rem">
            <!-- wp:button {"backgroundColor":"primary","textColor":"background","style":{"spacing":{"padding":{"top":"0.875rem","bottom":"0.875rem","left":"1.5rem","right":"1.5rem"}},"border":{"radius":"0.75rem"}}} -->
            <div class="wp-block-button"><a class="wp-block-button__link has-background-color has-primary-background-color has-text-color wp-element-button" style="border-radius:0.75rem;padding-top:0.875rem;padding-right:1.5rem;padding-bottom:0.875rem;padding-left:1.5rem">Get started</a></div>
            <!-- /wp:button -->

            <!-- wp:button {"className":"is-style-outline","style":{"spacing":{"padding":{"top":"0.875rem","bottom":"0.875rem","left":"1.5rem","right":"1.5rem"}},"border":{"radius":"0.75rem"}}} -->
            <div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" style="border-radius:0.75rem;padding-top:0.875rem;padding-right:1.5rem;padding-bottom:0.875rem;padding-left:1.5rem">Learn more</a></div>
            <!-- /wp:button -->
        </div>
        <!-- /wp:buttons -->
    </div>
    <!-- /wp:group -->
</div>
<!-- /wp:group -->