<?php

class Bl_Sponsor_Cms_Manager_Public {

    private $version;

    private $data_model;

    private $options;

    function __construct( $version, $options, $data_model ) {

        $this->version = $version;

        $this->options = $options;

        $this->data_model = $data_model;

    }

    function create_shortcode_bl_sponsor( $atts ){

        add_shortcode( 'bl-sponsor', array( $this, 'render_bl_sponsor_shortcode') );

    }

    public function render_bl_sponsor_shortcode( $atts ){

        $atts = $this->get_bl_sponsor_shortcode_atts( $atts );
        $bl_slides = $this->data_model->get_sponsor_posts( $atts );
        return $this->render_bl_sponsor( $bl_slides, $atts );

    }


    private function render_bl_sponsor( $bl_slides, $atts ){

        global $bl_sponsors_printed;

        $id_cache = $this->data_model->create_id_cache_html( serialize($atts) );

        $html_carousel = $this->data_model->has_cached_html( $id_cache );

        if( false === $html_carousel ){

            ob_start();

            $this->include_start_bl_sponsor_template( $bl_slides, $atts );

            foreach( $bl_slides as $bl_slide_index => $bl_slide ){

                $this->include_item_bl_sponsor_template( $bl_slide, $bl_slide_index, $atts );

            }

            $this->include_end_bl_sponsor_template( $bl_slides, $atts );

            $html_carousel = ob_get_clean();

            $this->data_model->cache_html( $html_carousel, $id_cache );

        }

        return $html_carousel;

        // store atts for each sponsor printed.it could be used in the template to
        // implement specific code when gallery are printed like include JS, or execute JS initiazations
        $bl_sponsors_printed[] = $atts;

    }

    private function get_bl_sponsor_shortcode_atts( $atts ){

        $a = shortcode_atts( array(
            'categories' => null,
            'limit' => 5,
            'template' => null
        ), $atts, 'bl-sponsor');

        return $a;

    }


    private function include_start_bl_sponsor_template( $bl_slides, $atts ){

        include $this->locate_template_bl_sponsor( 'start-sponsor.php', $atts );

    }


    private function include_end_bl_sponsor_template( $bl_slides, $atts ){

        include $this->locate_template_bl_sponsor( 'end-sponsor.php', $atts );

    }

    private function include_item_bl_sponsor_template( $bl_slide, $bl_slide_index, $atts ){
        $bl_slides->link_sponsor = get_post_meta( $bl_slide->ID, 'meta_box_linking_sponsor', true );
        include $this->locate_template_bl_sponsor( 'item-sponsor.php', $atts );

    }

    private function locate_template_bl_sponsor( $template, $atts ){

        global $post;

        $custom_template_folder = get_template_directory() . '/' . $this->options['bl-sponsor-custom-template-folder'];

        $check_templates = array();

        if( isset( $atts['template'] ) ) {}{

            $check_templates[] =  $custom_template_folder . '/' . substr( $template, 0, -4 ) . '-' . $atts['template'] . '.php';

        }

        $check_templates[] =  $custom_template_folder . '/' . substr( $template, 0, -4 ) . '-' . $post->post_name . '.php';

        if( isset( $atts['categories'] ) ) {}{

            $check_templates[] =  $custom_template_folder . '/' . substr( $template, 0, -4 ) . '-' . $atts['categories'] . '.php';

        }

        $check_templates[] =  $custom_template_folder . '/' . $template;

        foreach( $check_templates as $file_path ){

            if( file_exists( $file_path ) ){

                return $file_path;

            }

        }

        return dirname( __FILE__) . '/partials/' . $template;

    }

}