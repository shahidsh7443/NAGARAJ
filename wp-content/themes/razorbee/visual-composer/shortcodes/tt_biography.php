<?php 
    if ( ! defined( 'ABSPATH' ) ) :
        exit; // Exit if accessed directly
    endif;
    
    $tt_atts = vc_map_get_attributes( $this->getShortcode(), $atts );

    ob_start();
?>

    <div class="party-leader-wrapper <?php echo esc_attr($tt_atts['el_class']); ?>">
        <div class="leader-basic-info">
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-6">
                    <div class="leader-image">
                        <?php $image_src = wp_get_attachment_image_src($tt_atts['leader_photo'], 'tt-leader-thumb' ); ?>
                        <img class="img-responsive" src="<?php echo esc_url( $image_src[ 0 ] ); ?>" alt="<?php echo esc_attr($tt_atts['party_leader_name']); ?>">
                    </div>
                </div>
                <div class="col-lg-6 col-md-7 col-sm-6">
                    <div class="biography-info-wrapper">
                        <div class="leader-name">
                            <h2><?php echo esc_html($tt_atts['party_leader_name']); ?></h2>
                            <h3><?php echo esc_html($tt_atts['leader_designation']); ?></h3>
                        </div>
                        <div class="bio-details">
                            <?php echo wpb_js_remove_wpautop($content, true); ?>
                        </div>
                        <div class="bio-info">
                            <ul>
                                <?php
                                    $bio_info = (array)vc_param_group_parse_atts($tt_atts['bio_info']);
                                    $bio_info_data = array();
                                    foreach ($bio_info as $data) :
                                        $tt_bio_info = $data;
                                        $tt_bio_info['label'] = isset($data['label']) ? $data['label'] : '';
                                        $tt_bio_info['value'] = isset($data['value']) ? $data['value'] : '';
                                        $bio_info_data[] = $tt_bio_info;
                                    endforeach;
                                ?>

                                <?php foreach ($bio_info_data as $info): ?>
                                    <li><span><?php echo esc_html($info['label'])?></span><?php echo esc_html($info['value'])?></li>
                                <?php endforeach ?>
                            </ul>
                        </div>
                        <div class="leader-sign">
                            <?php $image_src = wp_get_attachment_image_src($tt_atts['leader_sign'], 'medium' ); ?>
                            <img class="img-responsive" src="<?php echo esc_url( $image_src[ 0 ] ); ?>" alt="<?php echo esc_attr($tt_atts['party_leader_name']); ?>">
                        </div>
                        <div class="leader-social-profile team-social">
                            <ul class="list-inline">
                                <?php
                                    $social_info = (array)vc_param_group_parse_atts($tt_atts['social_icon']);
                                    $social_info_data = array();
                                    foreach ($social_info as $data) :
                                        $tt_social_info = $data;
                                        $tt_social_info['fontawesome_icon'] = isset($data['fontawesome_icon']) ? $data['fontawesome_icon'] : '';

                                        $tt_social_info['link'] = isset($data['link']) ? $data['link'] : '';

                                        $social_info_data[] = $tt_social_info;
                                    endforeach;
                                ?>

                                <?php foreach ($social_info_data as $info): ?>
                                    <li><a href="<?php echo esc_url($info['link']); ?>"><i class="<?php echo esc_attr($info['fontawesome_icon']);?>"></i></a></li>
                                <?php endforeach ?>
                            </ul>
                        </div> <!-- .leader-social-profile -->
                    </div> <!-- .biography-info-wrapper -->
                </div> <!-- .col-# -->
            </div> <!-- .row -->
        </div> <!-- .leader-basic-info -->

        <div class="experience-info">
            <div class="educational-experience">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="education-label">
                                <h2><?php echo esc_html($tt_atts['education_label']); ?></h2>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <?php
                                $education_info = (array)vc_param_group_parse_atts($tt_atts['education_info']);
                                $education_info_data = array();
                                foreach ($education_info as $data) :
                                    $tt_education_info = $data;
                                    $tt_education_info['exam_name'] = isset($data['exam_name']) ? $data['exam_name'] : '';
                                    $tt_education_info['organization_name'] = isset($data['organization_name']) ? $data['organization_name'] : '';
                                    $tt_education_info['academic_year'] = isset($data['academic_year']) ? $data['academic_year'] : '';
                                    $tt_education_info['education_description'] = isset($data['education_description']) ? $data['education_description'] : '';

                                    $education_info_data[] = $tt_education_info;
                                endforeach;
                            ?>

                            <?php foreach ($education_info_data as $info): ?>
                                <div class="education-info-wrapper">
                                    <?php if ($info['exam_name']): ?>
                                        <h3><?php echo esc_html($info['exam_name'])?></h3>
                                    <?php endif ?>
                                    
                                    <?php if ($info['organization_name']): ?>
                                        <h4><?php echo esc_html($info['organization_name'])?></h4>
                                    <?php endif ?>
                                    
                                    <?php if ($info['academic_year']) : ?>
                                        <div class="academic-year">
                                            <span>(<?php echo esc_html($info['academic_year'])?>)</span>
                                        </div>
                                    <?php endif; ?>

                                    <?php if ($info['education_description']): ?>
                                        <div class="education-details">
                                            <p><?php echo esc_html($info['education_description']);?></p>
                                        </div>
                                    <?php endif ?>
                                </div>
                            <?php endforeach ?>
                        </div> <!-- .col-md-8 -->
                    </div> <!-- .row -->
                </div> <!-- .container -->
            </div> <!-- .educational-experience -->
            <div class="political-work-experience">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="career-label">
                                <h2><?php echo esc_html($tt_atts['career_label']); ?></h2>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <?php
                                $career_info = (array)vc_param_group_parse_atts($tt_atts['career_info']);
                                $career_info_data = array();
                                foreach ($career_info as $data) :
                                    $tt_career_info = $data;
                                    $tt_career_info['career_title'] = isset($data['career_title']) ? $data['career_title'] : '';
                                    $tt_career_info['career_designation'] = isset($data['career_designation']) ? $data['career_designation'] : '';
                                    $tt_career_info['career_period'] = isset($data['career_period']) ? $data['career_period'] : '';
                                    $tt_career_info['career_description'] = isset($data['career_description']) ? $data['career_description'] : '';

                                    $career_info_data[] = $tt_career_info;
                                endforeach;
                            ?>
                            <?php foreach ($career_info_data as $info): ?>
                                <div class="career-info-wrapper">
                                    <?php if ($info['career_title']): ?>
                                        <h3><?php echo esc_html($info['career_title'])?></h3>
                                    <?php endif ?>
                                    
                                    <?php if ($info['career_designation']): ?>
                                        <h4><?php echo esc_html($info['career_designation'])?></h4>
                                    <?php endif ?>
                                    
                                    <?php if ($info['career_period']): ?>
                                        <div class="experience-year">
                                            <span>(<?php echo esc_html($info['career_period'])?>)</span>
                                        </div>
                                    <?php endif ?>
                                    
                                    <?php if ($info['career_description']): ?>
                                        <div class="career-details">
                                            <p><?php echo esc_html($info['career_description']);?></p>
                                        </div>
                                    <?php endif ?>
                                </div>
                            <?php endforeach ?>
                        </div> <!-- .col-md-8 -->
                    </div> <!-- .row -->
                </div> <!-- .container -->
            </div> <!-- .political-work-experience -->
        </div> <!-- .experience-info -->
    </div><!-- .party-leader-wrapper -->
<?php echo ob_get_clean();