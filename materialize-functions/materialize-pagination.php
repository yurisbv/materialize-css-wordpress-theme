<?php
/**
 * WordPress Materialize Pagination
 */
function wp_materialized_pagination( $args = array() ) {
    $defaults = array(
        'range'           => 10,
        'custom_query'    => FALSE,
        'previous_string' => __( 'Anterior', 'text-domain' ),
        'next_string'     => __( 'Próximo', 'text-domain' ),
        'before_output'   => '<div class="pagination"><ul class="">',
        'after_output'    => '</ul></div>'
    );
    $args = wp_parse_args(
        $args,
        apply_filters('wp_materialize_pagination_defaults', $defaults)
    );
    $args['range'] = (int) $args['range'] - 1;
    if ( !$args['custom_query'] )
        $args['custom_query'] = @$GLOBALS['wp_query'];
    $count = (int) $args['custom_query']->max_num_pages;
    $page  = intval( get_query_var( 'paged' ) );
    $ceil  = ceil( $args['range'] / 2 );
    if ( $count <= 1 )
        return FALSE;
    if ( !$page )
        $page = 1;
    if ( $count > $args['range'] ) {
        if ( $page <= $args['range'] ) {
            $min = 1;
            $max = $args['range'] + 1;
        } elseif ( $page >= ($count - $ceil) ) {
            $min = $count - $args['range'];
            $max = $count;
        } elseif ( $page >= $args['range'] && $page < ($count - $ceil) ) {
            $min = $page - $ceil;
            $max = $page + $ceil;
        }
    } else {
        $min = 1;
        $max = $count;
    }
    $echo = '';
    $previous = intval($page) - 1;
    $previous = esc_attr(get_pagenum_link($previous));
    $firstpage = esc_attr(get_pagenum_link(1));
    if ($firstpage && (1 != $page) && $page > $defaults['range'])
        $echo .= '<li><a class="btn waves-effect btn-navigation " href="' . $firstpage . '">Primeira</a></li>';
    if ( $previous && (1 != $page) )
        $echo .= '<li class="waves-effect hvr-underline-from-center"><a href="' . $previous . '" title="' . __( 'Anterior', 'text-domain') . '"><i class="material-icons">chevron_left</i></a></li>';
    if (!empty($min) && !empty($max))
    {
        for( $i = $min; $i <= $max; $i++ )
        {
            if ($page == $i)
            {
                $echo .= '<li class="active"><a href="#!" class="pagination-active">' . $i . '</a></li>';
            }
            else
            {
                $echo .= sprintf( '<li class="waves-effect hvr-underline-from-center"><a class="pagination-number" href="%s">%2d</a></li>',
                	esc_attr(get_pagenum_link($i)),
                	$i
                );
            }
        }
    }
    $next = intval($page) + 1;
    $next = esc_attr( get_pagenum_link($next) );
    if ($next && ($count != $page) )
        $echo .= '<li ><a class="waves-effect hvr-underline-from-center" href="' . $next . '" title="' . __( 'Próximo', 'text-domain') . '"><i class="material-icons">chevron_right</i></a></li>';
    $lastpage = esc_attr( get_pagenum_link($count));
    if ($lastpage && ($count != $page)) {
        $echo .= '<li><a class="btn waves-effect btn-navigation " href="' . $lastpage . '">Ultima</a></li>';
    }
    if (isset($echo))
        echo $args['before_output'] . $echo . $args['after_output'];
}