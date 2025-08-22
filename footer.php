<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package F1devsesl
 */

?>
<footer class="footer-section text-center">
    <div class="container py-5 bg">
        <h2 class="mb-3"><?php echo get_theme_mod('footer_title_bold'); ?><span><?php echo get_theme_mod('footer_title'); ?></span><?php echo get_theme_mod('footer_title_sign'); ?>
        </h2>
        <div class="d-flex justify-content-center">
            <p class="mb-4 footer-text"> <?php echo get_theme_mod('footer_text'); ?></p>
        </div>
            <?php if(is_front_page()):?>
                <h5 class="text-start mb-3"><?php echo get_theme_mod('footer_bold_subtitle'); ?><span>ED</span>!</h5>
                <div class="contact-box mx-auto p-4">
                    <div class="ampersand">
                        <img src="<?= get_template_directory_uri() ?>/assets/img/logo/mini-logo-yellow.svg" alt="Connected Logo" height="100" class="logo-img">
                    </div>
                    <?= do_shortcode('[contact-form-7 id="1d7cbb2" title="leave us a message"]')?>
                </div>
            <?php elseif(is_page('contact')):?>
            <?php else:?>
                <a href="<?= esc_url( home_url( '/contact/' ) ) ?>" class="btn btn-explore">Connected</a>
            <?php endif;?>
        <p class="mt-5 small mb-0">&copy; 2025 by CONNECTED.</p>
    </div>
</footer>

<?php wp_footer(); ?>

<script>
    let prevScrollPos = window.scrollY;

    window.addEventListener("scroll", function () {
        const currentScrollPos = window.scrollY;
        const navbar = document.getElementById("navbar-header");

        if (!navbar) return;

        if (currentScrollPos === 0) {
            navbar.classList.remove("y-line");
        }
        if (prevScrollPos > currentScrollPos) {
            navbar.classList.remove("navbar--hidden");
        } else {
            navbar.classList.add("navbar--hidden", "y-line");
        }

        prevScrollPos = currentScrollPos;
    });
</script>

</body>
</html>
