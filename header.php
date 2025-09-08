
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#main"><?php esc_html_e('Skip to content', 'flixbe'); ?></a>

    <header id="masthead" class="site-header">
        <div id="site-header" class="wp-block-group" role="banner" style="padding-right:1rem;padding-left:1rem">
            
            <?php if (has_custom_logo()) : ?>
                <div class="site-branding">
                    <?php the_custom_logo(); ?>
                </div>
            <?php else : ?>
                <h1 class="site-title">
                    <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                        <?php bloginfo('name'); ?>
                    </a>
                </h1>
            <?php endif; ?>

            <button 
                id="mobile-menu-toggle" 
                class="mobile-menu-toggle" 
                aria-label="<?php esc_attr_e('Open mobile navigation menu', 'flixbe'); ?>"
                aria-expanded="false"
                aria-controls="mobile-navigation"
                type="button">
                <span class="burger-line" aria-hidden="true"></span>
                <span class="burger-line" aria-hidden="true"></span>
                <span class="burger-line" aria-hidden="true"></span>
                <span class="sr-only"><?php esc_html_e('Menu', 'flixbe'); ?></span>
            </button>

            <nav id="site-navigation" class="desktop-navigation main-navigation" role="navigation" aria-label="<?php esc_attr_e('Main navigation', 'flixbe'); ?>">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_id'        => 'primary-menu',
                    'container'      => false,
                    'menu_class'     => 'nav-menu',
                    'fallback_cb'    => false,
                ));
                ?>
            </nav>

            <nav 
                id="mobile-navigation" 
                class="mobile-navigation" 
                aria-hidden="true"
                aria-label="<?php esc_attr_e('Mobile navigation', 'flixbe'); ?>">
                <div class="mobile-nav-menu">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_id'        => 'mobile-primary-menu',
                        'container'      => false,
                        'menu_class'     => 'mobile-nav-menu-list',
                        'fallback_cb'    => false,
                    ));
                    ?>
                </div>
            </nav>

        </div>
    </header>

    <main id="main" class="site-main">
