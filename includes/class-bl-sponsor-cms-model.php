<?php
class Bl_Sponsor_Cms_Model {

    private static $_instance = null;

    private function __construct() { }

    private function  __clone() { }

    public static function getInstance() {
        if( !is_object(self::$_instance) )
            self::$_instance = new Bl_Sponsor_Cms_Model();
        return self::$_instance;
    }

    public function get_sponsor_posts( $atts ){

        $args = array(
            'post_type' => 'bl-sponsor',
            'limit' => $atts['limit']
        );

        if( ! empty ( $atts['categories'] ) ){
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'bl-sponsor-category',
                    'field' => 'slug',
                    'terms' => explode( ',', $atts['categories']),
                    'operator' => 'AND'
                )
            );
        }

        return get_posts( $args );

    }

    public function cache_html( $html, $id ){

        $file_path = $this->cache_html_dir() . $id . ".html";

        if( $file = fopen($file_path, "w") ){

            fwrite($file, $html);

            fclose($file);

        }

    }

    public function has_cached_html( $id ){

        $file_path = $this->cache_html_dir() . $id . ".html";

        if( file_exists( $file_path ) ){

            return file_get_contents( $file_path );

        }

        return false;

    }

    public function cache_html_dir(){

        $upload_dir = wp_upload_dir();

        $upload_dir = $upload_dir['basedir'] . "/bl-sponsor/";

        return $upload_dir;

    }

    public function create_id_cache_html( $string ){

        return md5( 'bl-sponsor-' . $string );

    }
} 