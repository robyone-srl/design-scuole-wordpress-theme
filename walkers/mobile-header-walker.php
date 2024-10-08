<?php
/**
 * Nav Menu API: Header_Walker_Nav_Menu class
 *
 * @package WordPress
 * @subpackage Nav_Menus
 * @since 4.6.0
 */

/**
 * Custom class used to implement an HTML list of nav menu items.
 *
 * @since 3.0.0
 *
 * @see Walker
 */

class Mobile_Header_Menu_Walker extends Walker_Nav_Menu {
	function start_el(&$output, $item, $depth=0, $args=[], $id=0) {
		$output .= "<li>";
		$custom_data = '';
        $target = '';
        if($item->target){
            $target = 'target="'.$item->target.'"';
        }

		if ( stripos( $item->title, 'personale scolastico' ) !== false || stripos( $item->title, 'famiglie e studenti' ) !== false ) {
			$custom_data = 'data-element="service-type"';
		}
		if ( stripos( $item->title, 'i luoghi' ) !== false ) {
			$custom_data = 'data-element="school-locations"';
		}

		if($custom_data) {
			if ($item->url) {
				$output .= '<a '.$target.' href="' . $item->url . '" '.$custom_data.'>';
			} else {
				$output .= '<a href="#" '.$custom_data.'>';
			}
		} else {
			if ($item->url) {
				$output .= '<a '.$target.' href="' . $item->url . '">';
			} else {
				$output .= '<a href="#">';
			}
		}
 
		$output .= $item->title;
        
        $output .= '</a>';
	}

	function end_el(&$output, $data_object, $depth = 0, $args = \null)
	{
        $output .= '</li>';
	}
}
