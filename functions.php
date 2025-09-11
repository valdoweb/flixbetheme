<?php
/**
 * Flixbe functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Flixbe
 * @since 1.0.0
 */

// Prevent direct access
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Enqueue theme styles and scripts
 */
function flixbe_enqueue_assets() {
    $theme_version = wp_get_theme()->get('Version');
    // Main stylesheet (already auto-enqueued by block theme, keep if you added dereg)
    wp_enqueue_style('flixbe-style', get_theme_file_uri('/style.css'), [], $theme_version);

    // Header scroll script
    wp_enqueue_script(
        'flixbe-header-scroll',
        get_theme_file_uri('/assets/js/header-scroll.js'),
        [],
        $theme_version,
        true // in footer
    );
}
add_action('wp_enqueue_scripts', 'flixbe_enqueue_assets');

// Optional: add defer attribute (not needed since in footer)
function flixbe_defer_script( $tag, $handle, $src ) {
    if ( 'flixbe-header-scroll' === $handle ) {
        return str_replace( '<script ', '<script defer ', $tag );
    }
    return $tag;
}
add_filter('script_loader_tag', 'flixbe_defer_script', 10, 3);

/**
 * Add theme support for various WordPress features
 */
function flixbe_theme_support() {
    // Add support for block styles
    add_theme_support('wp-block-styles');
    
    // Add support for responsive embeds
    add_theme_support('responsive-embeds');
    
    // Add support for editor styles
    add_theme_support('editor-styles');
    
    // Add support for wide alignment
    add_theme_support('align-wide');
    
    // Let WordPress manage the document title
    add_theme_support('title-tag');
    
    // Add theme support for post thumbnails
    add_theme_support('post-thumbnails');
    
    // Add support for automatic feed links
    add_theme_support('automatic-feed-links');
    
    // Add support for HTML5 markup
    add_theme_support('html5', array(
        'comment-list',
        'comment-form',
        'search-form',
        'gallery',
        'caption',
    ));
    
    // Add support for custom logo
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ));
}
add_action('after_setup_theme', 'flixbe_theme_support');

/**
 * Add mobile menu script inline to avoid external file
 */
function flixbe_inline_mobile_menu_script() {
    ?>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const mobileToggle = document.getElementById('mobile-menu-toggle');
        const mobileNav = document.getElementById('mobile-navigation');
        
        if (mobileToggle && mobileNav) {
            // Set initial states
            mobileNav.setAttribute('aria-hidden', 'true');
            mobileToggle.setAttribute('aria-expanded', 'false');
            mobileNav.classList.remove('active');
            mobileToggle.classList.remove('active');
            
            function toggleMenu() {
                const isExpanded = mobileToggle.getAttribute('aria-expanded') === 'true';
                const newState = !isExpanded;
                
                // Update ARIA states
                mobileToggle.setAttribute('aria-expanded', newState);
                mobileNav.setAttribute('aria-hidden', !newState);
                
                // Update button label
                mobileToggle.setAttribute('aria-label', newState ? 'Close mobile navigation menu' : 'Open mobile navigation menu');
                
                // Toggle active classes
                if (newState) {
                    mobileToggle.classList.add('active');
                    mobileNav.classList.add('active');
                    document.body.style.overflow = 'hidden';
                    
                    // Focus first menu item after animation
                    setTimeout(() => {
                        const firstMenuItem = mobileNav.querySelector('a');
                        if (firstMenuItem) {
                            firstMenuItem.focus();
                        }
                    }, 100);
                } else {
                    closeMenu();
                }
            }
            
            mobileToggle.addEventListener('click', toggleMenu);
            
            // Handle keyboard navigation
            mobileToggle.addEventListener('keydown', function(event) {
                if (event.key === 'Enter' || event.key === ' ') {
                    event.preventDefault();
                    this.click();
                }
            });
            
            // Handle escape key to close menu
            document.addEventListener('keydown', function(event) {
                if (event.key === 'Escape' && mobileNav.classList.contains('active')) {
                    closeMenu();
                    mobileToggle.focus();
                }
            });
            
            // Close menu when clicking outside
            document.addEventListener('click', function(event) {
                if (mobileNav.classList.contains('active') && 
                    !mobileToggle.contains(event.target) && 
                    !mobileNav.contains(event.target)) {
                    closeMenu();
                }
            });
            
            // Close menu on window resize if larger than mobile breakpoint
            window.addEventListener('resize', function() {
                if (window.innerWidth > 768) {
                    closeMenu();
                }
            });
            
            // Close menu when clicking on menu links
            const menuLinks = mobileNav.querySelectorAll('a');
            menuLinks.forEach(link => {
                link.addEventListener('click', function() {
                    closeMenu();
                });
            });
            
            function closeMenu() {
                if (mobileNav.classList.contains('active')) {
                    mobileToggle.classList.remove('active');
                    mobileNav.classList.remove('active');
                    mobileToggle.setAttribute('aria-expanded', 'false');
                    mobileNav.setAttribute('aria-hidden', 'true');
                    mobileToggle.setAttribute('aria-label', 'Open mobile navigation menu');
                    document.body.style.overflow = '';
                }
            }
            
            // Trap focus within mobile menu when open
            mobileNav.addEventListener('keydown', function(event) {
                if (event.key === 'Tab') {
                    const focusableElements = mobileNav.querySelectorAll('a, button, [tabindex]:not([tabindex="-1"])');
                    const firstElement = focusableElements[0];
                    const lastElement = focusableElements[focusableElements.length - 1];
                    
                    if (event.shiftKey) {
                        if (document.activeElement === firstElement) {
                            event.preventDefault();
                            lastElement.focus();
                        }
                    } else {
                        if (document.activeElement === lastElement) {
                            event.preventDefault();
                            firstElement.focus();
                        }
                    }
                }
            });
        }
    });
    </script>
    <?php
}
add_action('wp_footer', 'flixbe_inline_mobile_menu_script');

/**
 * Register custom block styles
 */
add_action('init', function () {
    if ( function_exists('register_block_style') ) {
        register_block_style('core/group', [
            'name'  => 'fullscreen',
            'label' => __('Full screen', 'flixbe'),
        ]);
        register_block_style('core/group', [
            'name'  => 'full-viewport',
            'label' => __('Full viewport', 'flixbe'),
        ]);
        register_block_style('core/group', [
            'name'  => 'fullscreen-width',
            'label' => __('Full screen width', 'flixbe'),
        ]);
        register_block_style('core/group', [
            'name'  => 'fullscreen-height',
            'label' => __('Full screen height', 'flixbe'),
        ]);
    }
});
 
add_action('after_setup_theme', function () {
    if (function_exists('register_block_pattern_category')) {
        register_block_pattern_category('hero', ['label' => __('Hero', 'flixbe')]); // safe if already exists
    }
});
