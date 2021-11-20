<?php get_header(); ?>


<?php 
$info = get_field('info');



?>

<section class="intro-wrapper">
    <div class="intro-wrapper__inner">
        <?= $info; ?>
    </div>
</section>


<section class="compass-wrapper">
        <div class="compass-wrapper__inner">

            <div class="compass-circle">
                <div class="compass-circle__inner">

                    <div class="background-flair"></div>
                    <div class="background-bg-dark"></div>
                    <div class="background-bg-surface"></div>
                    <div class="nsew-img"><img src="http://localhost:10059/wp-content/uploads/2021/05/map-compass-png-north-arrow-115628599698ctjpuypdn.png" alt=""></div>
                    <div class="nsew-img-arrow"><!-- <img src="http://localhost:10059/wp-content/uploads/2021/05/compass_needle.png" alt=""> --></div>

                    <div class="level1-wrap show">
                        <div class="level1-wrap-inner">

                        <?php
                        
                        $job_categories_list = get_categories( array(
                            'child_of' => 18
                          ));
                          

                          /* var_dump($job_categories_list); */
                        ?>


                            <?php 
                            $i = 0;
                            $category_count = count($job_categories_list);
                            foreach($job_categories_list as $cats) { 
                                $id = $cats->term_id;
                                $placement = get_field('placement', $id);
                                $i++;
                                $cat_name_no_spaces = str_replace(' ', '', $cats->name);
                           
                                ?>
                            <div class="level1-wrap-<?= $i; ?> level-1-settings">
                                <p class="office level1-p"><?= $cats->name; ?></p>
                            </div>
                           

                            <?php }  ?>
                        </div>
                        
                    </div>

                     
                    <?php 
                    
                            
                            $args = array(
                                'post_type' => 'jobs',
                                'post_status' => 'publish',
                                'posts_per_page' => 100,
                                'orderby' => 'title',
                                'order' => 'ASC',
                                //'cat' => $id
                              );?>

                            <p class="back">Back</p>

                            <?php 
                              $query_news_post = new WP_Query( $args );
                              while ( $query_news_post->have_posts() ):
                                $query_news_post->the_post();
                                $the_title = get_the_title();
                                $the_title_no_space = str_replace(' ', '', $the_title);
                                $the_excerpt = get_the_excerpt();
                                $category = get_the_category()[0]->name;
                                $category_name_no_space = str_replace(' ', '', $category);
                                
                            
                            ?>
                            
                            <div class="level2-wrapper <?= $category_name_no_space . '-wrap'; ?>">
                      
                                
                                <p class="modal-click"><?= $the_title; ?></p>
                                <div class="job-content <?= $the_title_no_space . '-infowrap'; ?>">
                                    <div class="job-content-info">
                                        <p>What is a bankers job</p>
                                        <p>a banker is sitting in a bank all day and are stealing your money</p>
                                        <a href="#">check out more</a>
                                    </div>
                                    <i class="fas fa-times the-x"></i>
                                </div>
                            </div>
                                <?php
                                endwhile;
                                wp_reset_postdata();
                                ?>

                    <!-- <div class="level2-wrap Office-wrap">
                        <p class="back">Back</p>
                        <div class="options">
                            <div class="banker">
                                <p class="banker-p modal-click">Banker</p>
                                <div class="job-content Banker-infowrap">
                                    <div class="job-content-info">
                                        <p>What is a bankers job</p>
                                        <p>a banker is sitting in a bank all day and are stealing your money</p>
                                        <a href="#">check out more</a>
                                    </div>
                                    <i class="fas fa-times the-x"></i>
                                </div>
                            </div>
                            <div class="accountant">
                                <p class="accountant-p modal-click">Accountant</p>
                                <div class="job-content Accountant-infowrap">
                                    <div class="job-content-info">
                                        <p>What is an Aaccountants job</p>
                                        <p>an accountant is sitting in a bank all day and are stealing your money</p>
                                        <a href="#">check out more</a>
                                    </div>
                                    <i class="fas fa-times the-x"></i>
                                </div>
                            </div>
                            <div class="analyst">
                                <p class="analyst-p modal-click">Analyst</p>
                                <div class="job-content Analyst-infowrap">
                                    <div class="job-content-info">
                                        <p>What is an Analyst job</p>
                                        <p>an Analyst is sitting in a bank all day and are stealing your money</p>
                                        <a href="#">check out more</a>
                                    </div>
                                    <i class="fas fa-times the-x"></i>
                                </div>
                            </div>
                        </div>
                    </div> 

                    <div class="level2-wrap Art-wrap">
                        <p class="back">Back</p>
                        <div class="options">
                            <div class="musician">
                                <p class="musician-p modal-click">Musician</p>
                            </div>
                            <div class="painter">
                                <p class="painter-p modal-click">Painter</p>
                            </div>
                            
                        </div>
                    </div>

                    <div class="level2-wrap Outdoor-wrap">
                        <p class="back">Back</p>
                        <div class="options">
                            <div class="forestworker">
                                <p class="forestworker-p modal-click">Forestworker</p>
                            </div>
                            <div class="ranger">
                                <p class="ranger-p modal-click">Ranger</p>
                            </div>
                            <div class="gardner">
                                <p class="gardner-p modal-click">Gardner</p>
                            </div>
                            
                        </div>
                    </div>-->

                </div>
            </div>


        </div>
   </section>



<?php get_template_part('elements/acf', 'flex_fields'); ?>
<?php get_footer(); ?>
