<?php

/*
 * Template Name: Full Width Post
 * Template Post Type: post
 *
 */
get_header();


?>

    <!-- Content
    ============================================= -->
    <section id="content">

        <div class="content-wrap">

            <div class="container clearfix">

                <!-- Post Content
                ============================================= -->
                <?php
                if (have_posts()) {
                while (have_posts()) {
                the_post();

                $author_ID  = get_the_author_meta('ID');
                $author_url = get_author_posts_url($author_ID);
                ?>
                <div class="single-post nobottommargin">

                    <!-- Single Post
                    ============================================= -->
                    <div class="entry clearfix">

                        <!-- Entry Title
                        ============================================= -->
                        <div class="entry-title">
                            <h2><?php the_title(); ?></h2>
                        </div><!-- .entry-title end -->

                        <!-- Entry Meta
                        ============================================= -->
                        <ul class="entry-meta clearfix">
                            <li><i class="icon-calendar3"></i> <?php the_date(); ?></li>
                            <li><a href="<?php echo $author_url; ?>"><i
                                        class="icon-user"></i> <?php the_author(); ?></a></li>
                            <li><i class="icon-folder-open"></i> <?php the_category(' '); ?></a></li>
                            <li><a href="#"><i class="icon-comments"></i> <?php comments_number('No comment'); ?>
                                </a></li>
                        </ul><!-- .entry-meta end -->

                        <!-- Entry Image
                        ============================================= -->
                        <?php
                        if (has_post_thumbnail()) {
                            ?>
                            <div class="entry-image">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('full'); ?>
                                </a>

                            </div>
                            <?php
                        }
                        ?>

                        <!-- Entry Content
                        ============================================= -->
                        <div class="entry-content notopmargin">

                            <?php the_content(); ?>

                            <?php wp_link_pages(); ?>

                            <!-- Post Single - Content End -->

                            <!-- Tag Cloud
                            ============================================= -->
                            <div class="tagcloud clearfix bottommargin">

                                <?php the_tags('', ' '); ?>

                            </div><!-- .tagcloud end -->

                            <div class="clear"></div>

                        </div>
                    </div><!-- .entry end -->

                    <!-- Post Navigation
                    ============================================= -->
                    <div class="post-navigation clearfix">

                        <div class="col_half nobottommargin">
                            <?php previous_post_link(); ?>
                        </div>

                        <div class="col_half col_last tright nobottommargin">
                            <?php next_post_link(); ?>
                        </div>

                    </div><!-- .post-navigation end -->

                    <div class="line"></div>

                    <!-- Post Author Info
                    ============================================= -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Posted by <span><a
                                        href="<?php echo $author_url; ?>"><?php the_author(); ?></a></span></h3>
                        </div>
                        <div class="panel-body">
                            <div class="author-image">
                                <?php echo get_avatar($author_ID, 90, '', false, array('class' => 'img-circle')); ?>
                            </div>
                            <?php echo nl2br(get_the_author_meta('description')); ?>
                        </div>
                    </div><!-- Post Single - Author End -->

                    <div class="line"></div>

                    <h4>Related Posts:</h4>

                    <div class="related-posts clearfix">

                        <?php
                        $categories = get_the_category();

                        $rp_query = new WP_Query(array(
                            'posts_per_page' => 2,
                            'post__not_in'   => array($post->ID),
                            'cat' => $categories[0]->term_id,
                        ));

                        if ($rp_query->have_posts()) {
                            while ($rp_query->have_posts()) {
                                $rp_query->the_post();

                                ?>
                                <div class="mpost clearfix">

                                    <?php
                                    if (has_post_thumbnail()) {
                                        ?>

                                        <div class="entry-image">
                                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail'); ?></a>
                                            <div class="entry-c">
                                                <div class="entry-title">
                                                    <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                                </div>
                                                <ul class="entry-meta clearfix">
                                                    <li><i class="icon-calendar3"></i> <?php the_date(); ?></li>
                                                    <li><a href="<?php the_permalink(); ?>"><i class="icon-comments"></i> <?php comments_number('No Comment'); ?></a></li>
                                                </ul>
                                                <div class="entry-content"><?php the_excerpt(); ?></div>
                                            </div>
                                        </div>

                                        <?php
                                    }
                                    ?>



                                    <div class="mpost clearfix">
                                        <div class="entry-image">
                                            <a href="#"><img src="images/blog/small/20.jpg" alt="Blog Single"></a>
                                        </div>
                                        <div class="entry-c">
                                            <div class="entry-title">
                                                <h4><a href="#">This is a Video Post</a></h4>
                                            </div>
                                            <ul class="entry-meta clearfix">
                                                <li><i class="icon-calendar3"></i> 24th July 2014</li>
                                                <li><a href="#"><i class="icon-comments"></i> 16</a></li>
                                            </ul>
                                            <div class="entry-content">Lorem ipsum dolor sit amet, consectetur adipisicing
                                                elit. Mollitia nisi perferendis.
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <?php
                            }

                            wp_reset_postdata();

                        }
                        ?>

                        <?php
                        if (comments_open() || get_comments_number()) {

                            comments_template();
                        }
                        ?>

                    </div>
                    <?php
                    }
                    }
                    ?>

                </div>

            </div>

    </section><!-- #content end -->

<?php get_footer(); ?>