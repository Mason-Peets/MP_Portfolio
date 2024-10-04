<?php
class ItStart_Custom_Calendar_Widget extends WP_Widget {

    function __construct() {
        parent::__construct(
            'itstart_custom_calendar_widget', // Base ID
            __('ItStart Custom Calendar', 'itstart'), // Name
            array( 'description' => __( 'A custom calendar widget', 'itstart' ), ) // Args
        );
    }

    public function widget( $args, $instance ) {
        echo '<aside id="widget-calendar" class="mt-4">';
        
        // Display calendar
        echo '<div class="calendar_wrap py-3 border border-2 border-light px-2">';
        $this->custom_get_calendar();
        echo '</div>';

        echo '</aside>';
    }

    public function form( $instance ) {
        // Leave empty as no form fields needed for this widget
    }

    public function update( $new_instance, $old_instance ) {
        // Leave empty as no form fields needed for this widget
        return array();
    }

    private function custom_get_calendar() {
        global $wpdb, $m, $monthnum, $year, $wp_locale, $posts;

        if ( !isset($monthnum) || !$monthnum )
            $monthnum = gmdate('m', current_time('timestamp'));

        if ( !isset($year) || !$year )
            $year = gmdate('Y', current_time('timestamp'));

        $day = gmdate('j', current_time('timestamp'));

        // Get the previous and next month
        $previous = mktime(0, 0, 0, $monthnum - 1, 1, $year);
        $next = mktime(0, 0, 0, $monthnum + 1, 1, $year);

        // Get days with posts
        $dayswithposts = $wpdb->get_results("SELECT DISTINCT DAYOFMONTH(post_date) as day 
            FROM $wpdb->posts 
            WHERE post_type = 'post' AND post_status = 'publish' AND MONTH(post_date) = $monthnum AND YEAR(post_date) = $year", ARRAY_A);

        $dayswithposts = wp_list_pluck($dayswithposts, 'day');

        // Generate the calendar
        $calendar_output = '<table id="wp-calendar" class="wp-calendar-table">
            <caption>' . $wp_locale->get_month($monthnum) . ' ' . $year . '</caption>
            <thead>
                <tr>';

        $myweek = array();
        for ( $wdcount=0; $wdcount<=6; $wdcount++ ) {
            $myweek[] = $wp_locale->get_weekday_initial( $wp_locale->get_weekday( ($wdcount+get_option('start_of_week'))%7 ) );
        }

        foreach ( $myweek as $wd ) {
            $day_name = esc_attr($wd);
            $calendar_output .= "\n\t\t<th scope=\"col\" title=\"$day_name\">$wd</th>";
        }

        $calendar_output .= '</tr>
            </thead>

            <tbody>
            <tr>';

        // Get the first day of the month
        $first = mktime(0, 0, 0, $monthnum, 1, $year);
        $last = mktime(0, 0, 0, $monthnum + 1, 0, $year);

        $month_start = date('w', $first);
        $days_in_month = date('t', $first);

        // Fill in the days
        for ( $i = 0; $i < $month_start; $i++ ) {
            $calendar_output .= "\n\t\t<td>&nbsp;</td>";
        }

        for ( $day = 1; $day <= $days_in_month; ++$day ) {
            $date_format = sprintf('%04d-%02d-%02d', $year, $monthnum, $day);
            $day_link = get_day_link($year, $monthnum, $day);

            if ( $day == gmdate('j', current_time('timestamp')) ) {
                $class = ' id="today"';
            } else if ( in_array($day, $dayswithposts) ) {
                $class = ' style="background-color: #1e626b; color: white;"';
            } else {
                $class = '';
            }

            if ( in_array($day, $dayswithposts) ) {
                $calendar_output .= "\n\t\t<td$class><a href=\"$day_link\" style=\"color: white;\">$day</a></td>";
            } else {
                $calendar_output .= "\n\t\t<td$class>$day</td>";
            }

            if ( 6 == ( $i + $month_start ) % 7 ) {
                $calendar_output .= "</tr>\n\t<tr>";
            }
            $i++;
        }

        while ( $i + $month_start < 35 ) {
            $calendar_output .= "\n\t\t<td>&nbsp;</td>";
            $i++;
        }

        $calendar_output .= '</tr>
            </tbody>
            </table>';

        $calendar_output .= '<nav aria-label="Previous and next months" class="wp-calendar-nav">';
        $calendar_output .= '<span class="wp-calendar-nav-prev"><a href="' . get_month_link( gmdate('Y', $previous), gmdate('m', $previous) ) . '">&laquo;</a></span>';
        $calendar_output .= '<span class="pad">&nbsp;</span>';
        $calendar_output .= '<span class="wp-calendar-nav-next"><a href="' . get_month_link( gmdate('Y', $next), gmdate('m', $next) ) . '">&raquo;</a></span>';
        $calendar_output .= '</nav>';

        echo $calendar_output;
    }
}

function register_custom_calendar_widget() {
    register_widget( 'ItStart_Custom_Calendar_Widget' );
}
add_action( 'widgets_init', 'register_custom_calendar_widget' );


?>
