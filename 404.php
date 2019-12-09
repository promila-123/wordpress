<?php
get_header();
?>
    <!-- Error Section -->
    <section class="page-not-found  pagetoppadd">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="notfound-content">
                            <h1>404</h1>
                            <h3>OOPPS! THE PAGE YOU WERE LOOKING FOR DOES NOT EXIST</h3>
                            <p>You can search on the bar below or return to home page</p>
                            <form class="search-form" action="<?php bloginfo( 'url' ); ?>">
                                <input placeholder="Search here" type="text" name="s" value="<?php the_search_query();?>">
                                <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </form>
                            <a href="<?php echo site_url();?>" class="btn-style1">Go to Home page</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<?php
get_footer();
?>