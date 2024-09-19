<div class="comments-wrap">

    <div id="comments" class="row">
        <div class="col-full">

            <h3 class="h2">
                <?php
                $philosophy_cn = get_comments_number();
                if ($philosophy_cn <= 1) {
                    echo $philosophy_cn . " " . __("Comment", "philosophy");
                } else {
                    echo $philosophy_cn . " " . __("Comments", "philosophy");
                }
                ?>
            </h3>

            <!-- commentlist -->
            <ol class="commentlist">
                <?php wp_list_comments(); ?>
            </ol> <!-- end commentlist -->

            <div class="comments-pagination">
                <?php
                the_comments_pagination(array(
                    'screen_reader_text' => __('Pagination', 'philosophy'),
                    'prev_text' => '<' . __('Previous Comments', 'philosophy'),
                    'next_text' => '>' . __('Next Comments', 'philosophy'),
                ));
                ?>
            </div>

            <!-- respond -->
            <div class="respond">

                <h3 class="h2">
                    <?php _e("Add Comment", "philosophy"); ?>
                </h3>

                <?php
                $commenter = wp_get_current_commenter();
                $req = get_option('require_name_email');
                $aria_req = ($req ? " aria-required='true'" : '');

                $fields = array(
                    'author' => '<div class="form-field"><input name="author" type="text" id="author" class="full-width" placeholder="' . __("Your Name", "philosophy") . '" value="' . esc_attr($commenter['comment_author']) . '"' . $aria_req . ' /></div>',
                    'email'  => '<div class="form-field"><input name="email" type="text" id="email" class="full-width" placeholder="' . __("Your Email", "philosophy") . '" value="' . esc_attr($commenter['comment_author_email']) . '"' . $aria_req . ' /></div>',
                    'url'    => '<div class="form-field"><input name="url" type="text" id="url" class="full-width" placeholder="' . __("Website", "philosophy") . '" value="' . esc_attr($commenter['comment_author_url']) . '" /></div>',
                );

                $args = array(
                    'fields'               => $fields,
                    'comment_field'        => '<div class="message form-field"><textarea name="comment" id="comment" class="full-width" placeholder="' . __("Your Message", "philosophy") . '" aria-required="true"></textarea></div>',
                    'submit_button'        => '<button type="submit" class="submit btn--primary btn--large full-width">' . __("Submit", "philosophy") . '</button>',
                    'title_reply'          => '',
                    'label_submit'         => '',
                    'comment_notes_before' => '',
                    'comment_notes_after'  => '',
                );

                comment_form($args);
                ?>

            </div> <!-- end respond -->

        </div> <!-- end col-full -->

    </div> <!-- end row comments -->
</div>
