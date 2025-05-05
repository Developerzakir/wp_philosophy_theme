<?php

/*
*
* Template Name: Contact Us
* 
*/


the_post();
get_header();

?>


    <!-- s-content
    ================================================== -->
    <section class="s-content s-content--narrow s-content--no-padding-bottom">

        <article class="row format-standard">

            <div class="s-content__header col-full">
                <h5 class="s-content__header-title">
                    <?php the_title(); ?>
                </h5>
              
            </div> <!-- end s-content__header -->
    
            <div class="s-content__media col-full" style="text-align: center;">
                <div class="s-content__post-thumb">
                    <?php the_post_thumbnail( "large" ); ?>
                </div>
            </div> <!-- end s-content__media -->

            <div class="col-full s-content__main">

                   <div>
                        <?php

                        if(is_active_sidebar("contact-maps")){
                            dynamic_sidebar("contact-maps");
                        }
                        
                      ?>
                 </div>

                 <?php the_content(); ?>

                 <div class="row block-1-2 block-tab-full">
                        <?php

                        if(is_active_sidebar("contact-info")){
                            dynamic_sidebar("contact-info");
                        }
                        
                      ?>
                 </div>

                 <h2>Say Hello</h2>
                 <div>
                    <?php

                    if(get_field("contact_form_shortcode")){
                        echo do_shortcode(get_field("contact_form_shortcode"));
                    }
                    
                    ?>
                 </div>

            </div> <!-- end s-content__main -->

        </article>

    </section> <!-- s-content -->


   <?php get_footer(); ?>