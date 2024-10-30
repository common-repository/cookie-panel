<?php

class lscolp_template_loader {
    protected $filter_prefix = 'lscolp';
    protected $theme_template_directory = 'lscolp';
    protected $plugin_directory = LSCOLP_DIR;
    protected $plugin_template_directory = 'templates';
    private $template_path_cache = array();
    private $template_data_var_names = array( 'data' );

    public function __destruct() {
        $this->unset_template_data();
    }

    public function get_template_part( $slug, $name = null, $load = true ) {
        do_action( 'get_template_part_' . $slug, $slug, $name );
        do_action( $this->filter_prefix . '_get_template_part_' . $slug, $slug, $name );
        $templates = $this->get_template_file_names( $slug, $name );
        return $this->locate_template( $templates, $load, false );
    }

    public function set_template_data( $data, $var_name = 'data' ) {
        global $wp_query;

        $wp_query->query_vars[ $var_name ] = (object) $data;

        if ( 'data' !== $var_name ) {
            $this->template_data_var_names[] = $var_name;
        }

        return $this;
    }

    public function unset_template_data() {
        global $wp_query;

        $custom_var_names = array_unique( $this->template_data_var_names );
        foreach ( $custom_var_names as $var ) {
            if ( isset( $wp_query->query_vars[ $var ] ) ) {
                unset( $wp_query->query_vars[ $var ] );
            }
        }

        return $this;
    }


    protected function get_template_file_names( $slug, $name ) {
        $templates = array();
        if ( isset( $name ) ) {
            $templates[] = $slug . '-' . $name . '.php';
        }
        $templates[] = $slug . '.php';


        return apply_filters( $this->filter_prefix . '_get_template_part', $templates, $slug, $name );
    }

    public function locate_template( $template_names, $load = false, $require_once = true ) {
        $cache_key = is_array( $template_names ) ? $template_names[0] : $template_names;

        if ( isset( $this->template_path_cache[ $cache_key ] ) ) {
            $located = $this->template_path_cache[ $cache_key ];
        } else {
            $located = false;
            $template_names = array_filter( (array) $template_names );
            $template_paths = $this->get_template_paths();

            foreach ( $template_names as $template_name ) {
                $template_name = ltrim( $template_name, '/' );
                foreach ( $template_paths as $template_path ) {
                    if ( file_exists( $template_path . $template_name ) ) {
                        $located = $template_path . $template_name;
                        $this->template_path_cache[ $cache_key ] = $located;
                        break 2;
                    }
                }
            }
        }

        if ( $load && $located ) {
            load_template( $located, $require_once );
        }

        return $located;
    }


    protected function get_template_paths() {
        $theme_directory = trailingslashit( $this->theme_template_directory );

        $file_paths = array(
            10  => trailingslashit( get_template_directory() ) . $theme_directory,
            100 => $this->get_templates_dir(),
        );

        if ( get_stylesheet_directory() !== get_template_directory() ) {
            $file_paths[1] = trailingslashit( get_stylesheet_directory() ) . $theme_directory;
        }

        $file_paths = apply_filters( $this->filter_prefix . '_template_paths', $file_paths );

        ksort( $file_paths, SORT_NUMERIC );

        return array_map( 'trailingslashit', $file_paths );
    }


    protected function get_templates_dir() {
        return trailingslashit( $this->plugin_directory ) . $this->plugin_template_directory;
    }

}
