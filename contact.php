<?php

/*
* Template Name: Contact
* */

get_header(); ?>

    <section class="contact-section py-5">
        <div class="container">
            <h2 class="mb-3"><?php the_title(); ?></h2>
            <div class="d-flex justify-content-around">
                <p><span>Email:</span> contact@connected.com</p>
                <p><span>Телефон:</span> +1 (123) 456-7890</p>
                <p><span>Адрес:</span> USA, California</p>
            </div>
            <h5 class="mt-5">Live Us a message!</h5>
            <div class="contact-box mx-auto p-5">
                <?php
                echo do_shortcode('[contact-form-7 id="1d7cbb2" title="leave us a message"]');
                ?>
            </div>
        </div>
    </section>

<?php get_footer(); ?>