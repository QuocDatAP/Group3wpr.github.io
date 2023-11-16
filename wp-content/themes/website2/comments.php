<style>
    .comment-list {
        list-style: none;
        padding: 0;
    }

    .comment-list li {
        margin-bottom: 20px;
    }

    .comment-detail {
        border: 1px solid #ccc;
        padding: 10px;
        position: relative; /* Add this */
    }

    .comment-user img {
        border-radius: 50%;
        margin-right: 10px;
    }

    .user-name {
        font-weight: bold;
    }

    .post-info ul {
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .post-info ul li {
        display: inline-block;
        margin-right: 10px;
        color: #888;
    }

    .show-hide {
        color: #0073e6;
        text-decoration: none;
        cursor: pointer;
    }

    .show-hide:hover {
        text-decoration: underline;
    }

    .child-comment {
        margin-left: 20px;
        display: none; /* Add this */
    }
</style>

<div id="comments" class="comments-area">
    <?php if (have_comments()) : ?>
        <h2 class="comments-title">
            <?php
            printf(
                _nx(
                    'One thought on "%2$s"',
                    '%1$s thoughts on "%2$s"',
                    get_comments_number(),
                    'comments title',
                    'twentythirteen'
                ),
                number_format_i18n(get_comments_number()),
                '<span>' . get_the_title() . '</span>'
            );
            ?>
        </h2>

        <ul class="comment-list mt-30">
            <?php
            wp_list_comments(array(
                'style'       => 'ul',
                'short_ping'  => true,
                'avatar_size' => 74,
                'callback'    => 'custom_comment_output', // Custom callback function
            ));
            ?>
        </ul><!-- .comment-list -->

        <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
            <nav class="navigation comment-navigation" role="navigation">
                <h1 class="screen-reader-text section-heading"><?php _e('Comment navigation', 'twentythirteen'); ?></h1>
                <div class="nav-previous"><?php previous_comments_link(__('&larr; Older Comments', 'twentythirteen')); ?></div>
                <div class="nav-next"><?php next_comments_link(__('Newer Comments &rarr;', 'twentythirteen')); ?></div>
            </nav><!-- .comment-navigation -->
        <?php endif; // Check for comment navigation ?>

        <?php if (!comments_open() && get_comments_number()) : ?>
            <p class="no-comments"><?php _e('Comments are closed.', 'twentythirteen'); ?></p>
        <?php endif; ?>
    <?php endif; // have_comments() ?>

    <?php comment_form(); ?>
</div><!-- #comments -->

<script>
    // jQuery code to show/hide comments and replies
    jQuery(document).ready(function ($) {
        // Hide all replies initially
        $('.child-comment').hide();

        // Add Show/Hide button for each comment
        $('.comment-detail').each(function () {
            var $comment = $(this);
            var $replies = $comment.find('.child-comment');

            // Add Show/Hide button
            $comment.append('<a href="#" class="show-hide">Show Replies</a>');

            // Show/hide replies on button click
            $comment.find('.show-hide').click(function (e) {
                e.preventDefault();
                $replies.slideToggle();
                $(this).text(function (i, text) {
                    return text === "Show Replies" ? "Hide Replies" : "Show Replies";
                });
            });
        });
    });
</script>

<?php
// Custom callback function to customize the comment output
function custom_comment_output($comment, $args, $depth)
{
    $GLOBALS['comment'] = $comment;
    ?>

    <li>
        <div class="comment-user">
            <?php echo get_avatar($comment, 74); ?>
        </div>
        <div class="comment-detail">
            <div class="user-name"><?php echo get_comment_author(); ?></div>
            <div class="post-info">
                <ul>
                    <li><?php printf(esc_html__('%1$s ago', 'your-text-domain'), human_time_diff(get_comment_time('U'), current_time('timestamp'))); ?></li>
                    <li><?php comment_reply_link(array_merge($args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?></li>
                </ul>
            </div>
            <p><?php comment_text(); ?></p>

            <?php
            // Check if there are child comments
            $child_comments = get_comments(array('parent' => $comment->comment_ID));
            if ($child_comments) {
                echo '<ul class="child-comment">';
                wp_list_comments(array(
                    'style'       => 'ul',
                    'short_ping'  => true,
                    'avatar_size' => 74,
                    'callback'    => 'custom_comment_output', // Recursive call to the custom callback
                ), $child_comments);
                echo '</ul>';
            }
            ?>
        </div>
    </li>

    <?php
}
?>
