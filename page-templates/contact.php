<?php

/*
* Template Name: Contact
* */

get_header(); ?>

    <section class="contact-section pb-5">
        <div class="container">
            <h1 class="mb-3"><?php the_title(); ?></h1>
            <div class="contact-info">
                <p><span>Email:</span> <?php echo get_theme_mod('contact_email'); ?></p>
<!--                <p><span>Phone:</span> --><?php //echo get_theme_mod('contact_phone'); ?><!--</p>-->
                <p><span>Adress:</span> <?php echo get_theme_mod('contact_address'); ?></p>
            </div>
            <h5 class="mt-5"><?php echo get_theme_mod('contact_message'); ?></h5>
            <div class="contact-box mx-auto p-5">
                <?php
                echo do_shortcode('[contact-form-7 id="1d7cbb2" title="leave us a message"]');
                ?>
            </div>
        </div>
    </section>

<?php get_footer(); ?>