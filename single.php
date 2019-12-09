<?php
get_header();
?>

<section class="news-list-style pagetoppadd">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-7 col-xs-12">
                      <?php while(have_posts()):the_post();?>

                        <!--News Item-->
                         <div class="news-list-item">
                            <div class="news-image">
                                <a href="<?php the_permalink();?>">
                                <?php the_post_thumbnail('full', array('class' => 'card-img-top' )); ?>
                                </a>
                            </div>
                            <div class="news-footer clearfix">
                                <!-- News meta -->
                                <ul class="news-meta">
                                    <li><i class="fa fa-user"></i><a href="<?php the_permalink();?>"><?php the_author();?></a></li>
                                    <li><i class="fa fa-comments" aria-hidden="true"></i> <?php echo $cnt=count(get_approved_comments(get_the_ID(), array('parent' => 0)));?> Comments<?php echo $cnt>1?'s': ''; ?></li>
                                    <li><i class="fa fa-clock-o"></i><?php echo get_the_date('d F,Y');?></li>
                                    <li><i class="fa fa-share-alt" aria-hidden="true"></i><?php echo 'Share';?></li>
                                </ul>
                            </div>
                            <!-- News Content -->
                            <div class="news-info margtop-20">
                                <a href="<?php the_permalink();?>">
                                    <h3 class="newstitle"><?php  the_title();?></h3>
                                </a>
                               <?php the_content();?>
                            </div>

                          </div>
                         <?php endwhile;?>

                         <div class="comment-box">
                            <?php
                            
                            $comments = get_approved_comments(get_the_ID(), array('parent' => 0));
                            
                            ?>
                            <div class="sec-title">
                              <h2><?php echo $cnt=count(get_approved_comments(get_the_ID(), array('parent' => 0)));?> Comments<?php echo $cnt>1?'s': ''; ?></h2>
                            </div>
                            <?php
                            foreach ($comments as $key => $value) {
                            ?>
                            <div class="single-comment-item">
                             <div class="author-imgbox">
                                <div class="inner-box">
                                    <img src="<?php echo IMAGES ?>avatar.png" alt="">
                                </div>
                             </div>
                            <div class="comment-conent">
                                <h3><?php _e($value->comment_author, TEXTDOMAIN) ?></h3>
                                <div class="meta-box clearfix">
                                    <span class="pull-left"><?php _e(date('d F, Y', strtotime($value->comment_date))) ?></span>
                                    <a href="javascript:void(0)" class="comment-reply reply pull-right">Reply</a>
                                </div>
                                <p><?php _e($value->comment_content,TEXTDOMAIN)?></p>
                            </div>
                            <div class="clear"></div>
                            <div class="reply-form" style="display: none">
                                <form class="contact-form" method="post" action="">
                                <input type="hidden" name="parent" value="<?= $value->comment_ID ?>"/>
                                <input type="hidden" name="post_id" value="<?= get_the_ID(); ?>"/>
                                <div class="messages"></div>
                                <div class="row">
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control name" placeholder="Name" required="required" data-error="Name is required.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control email" placeholder="Email" required="required" data-error="Valid email is required.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    </div>
                                    <div class="col-md-12">
                                    <div class="form-group mb-0">
                                        <textarea name="message" class="form-control h-100 message" placeholder="Your Comment" rows="4" required="required" data-error="Please,leave us a message."></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-md-12">
                                    <button type="submit" class="btn btn-theme"><span><?php _e('Reply', TEXTDOMAIN) ?></span>
                                    </button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                                <?php
                                    $comments_child = get_approved_comments(get_the_ID(), array('parent' => $value->comment_ID));
                                    if (!empty($comments_child)) {
                                    foreach ($comments_child as $key => $c) {
                                ?>
                                    <div class="single-comment-item replyon-comment">
                                        <div class="author-imgbox">
                                            <div class="inner-box">
                                                <img src="<?php echo IMAGES; ?>avatar.png" alt="">
                                            </div>
                                        </div>
                                        <div class="comment-conent">
                                            <h3><?php _e($c->comment_author,TEXTDOMAIN)?></h3>
                                            <div class="meta-box clearfix">
                                                <span class="pull-left"><?php _e(date('d F, Y', strtotime($c->comment_date))) ?></span>
                                                <a href="javascript:void(0)" class="comment-reply reply pull-right">Reply</a>
                                            </div>
                                            <p><?php _e($c->comment_content,TEXTDOMAIN)?></p>
                                        </div>
                                        <div class="clear"></div>
                                        <div class="reply-form" style="display: none">
                                            <form class="contact-form" method="post" action="">
                                            <input type="hidden" name="parent" value="<?= $value->comment_ID ?>"/>
                                            <input type="hidden" name="post_id" value="<?= get_the_ID(); ?>"/>
                                            <div class="messages"></div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="text" name="name" class="form-control name" placeholder="Name" required="required" data-error="Name is required.">
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                                </div>
                                                <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="email" name="email" class="form-control email" placeholder="Email" required="required" data-error="Valid email is required.">
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                                </div>
                                                <div class="col-md-12">
                                                <div class="form-group mb-0">
                                                    <textarea name="message" class="form-control message h-100 message" placeholder="Your Comment" rows="4" required="required" data-error="Please,leave us a message."></textarea>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                                </div>
                                            </div>
                                            <div class="row mt-5">
                                                <div class="col-md-12">
                                                <button type="submit" class="btn btn-theme"><span><?php _e('Reply', TEXTDOMAIN) ?></span>
                                                </button>
                                                </div>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                    <?php
                                    }
                                }
                                ?>

                        <?php
                         }
                        ?>
                     </div>
                        <div class="comment-form">
                            <div class="sec-title">
                                <h2>Leave a Reply</h2>
                            </div>
                            <div id="error"></div>
                            <form method="post" action="" id="contact-form" class="contact-form" novalidate="novalidate">
                            <input type="hidden" name="parent" value="0"/>
                            <input type="hidden" name="post_id" value="<?= get_the_ID(); ?>"/>
                                <div class="row clearfix">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input name="name" class="name" value="" placeholder="Name*" type="text">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input name="email"  class="email" value="" placeholder="Email*" type="email" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input name="phone" class="phone"  value="" placeholder="Phone Number*" type="text" >
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea name="message" class="message" placeholder="Message" ></textarea>
                                        </div>
                                        <div class="overbtn">
                                            <button type="submit" class="btn-style1">POST COMMENT</button>
                                            <p>If you have any Business problem contact us Now!</p>
                                        </div>
                                        <div id="loading" style="display:none"><img src="images/ajax-loader.png" alt="loading"></div>
                                        <div class="contact-form-message"></div>
                                    </div>
                                </div>
                            </form>
                        </div>

                </div>
                  <div class="col-md-4 col-sm-5 col-xs-12">
                    <div class="sidebar widget-sidebar">
                        <div class="allwidget-wrp">
                                
              
                            <?php get_sidebar('blog');?>

                               
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
get_footer();
?>