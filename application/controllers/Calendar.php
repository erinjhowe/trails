<?php //dont close php tag in controllers and models. You do in views..
//Models and Controllers must named with mixed case, ie. uppercase first letter
defined('BASEPATH') OR exit('No direct script access allowed');

class Calendar extends CI_Controller {

	
	public function index()
	{
		$prefs = array(
        'show_next_prev'  => TRUE,
        'next_prev_url'   => 'http://ehowe2.dmitstudent.ca/dmit2503/codeigniter3/calendar/index/'
		);

		$prefs['template'] = '

        {table_open}<table border="0" cellpadding="0" cellspacing="0">{/table_open}

        {heading_row_start}<tr>{/heading_row_start}

        {heading_previous_cell}<th><a href="{previous_url}">&lt;&lt;</a></th>{/heading_previous_cell}
        {heading_title_cell}<th colspan="{colspan}">{heading}</th>{/heading_title_cell}
        {heading_next_cell}<th><a href="{next_url}">&gt;&gt;</a></th>{/heading_next_cell}

        {heading_row_end}</tr>{/heading_row_end}

        {week_row_start}<tr>{/week_row_start}
        {week_day_cell}<td>{week_day}</td>{/week_day_cell}
        {week_row_end}</tr>{/week_row_end}

        {cal_row_start}<tr>{/cal_row_start}
        {cal_cell_start}<td>{/cal_cell_start}
        {cal_cell_start_today}<td>{/cal_cell_start_today}
        {cal_cell_start_other}<td class="other-month">{/cal_cell_start_other}

        {cal_cell_content}<a href="{content}">{day}</a>{/cal_cell_content}
        {cal_cell_content_today}<div class="highlight"><a href="{content}">{day}</a></div>{/cal_cell_content_today}

        {cal_cell_no_content}{day}{/cal_cell_no_content}
        {cal_cell_no_content_today}<div class="highlight">{day}</div>{/cal_cell_no_content_today}

        {cal_cell_blank}&nbsp;{/cal_cell_blank}

        {cal_cell_other}{day}{/cal_cel_other}

        {cal_cell_end}</td>{/cal_cell_end}
        {cal_cell_end_today}</td>{/cal_cell_end_today}
        {cal_cell_end_other}</td>{/cal_cell_end_other}
        {cal_row_end}</tr>{/cal_row_end}

        {table_close}</table>{/table_close}
';

		$this->load->library('calendar', $prefs);

/*		$dates = array(
       	 	18  => 'http://ehowe2.dmitstudent.ca/dmit2503/codeigniter3/calendar/index/2017/04/18/',
        	7  => 'http://ehowe2.dmitstudent.ca/dmit2503/codeigniter3/calendar/index/2017/02/07/',
        	13 => 'http://ehowe2.dmitstudent.ca/dmit2503/codeigniter3/calendar/index/2017/03/13/',
        	26 => 'http://ehowe2.dmitstudent.ca/dmit2503/codeigniter3/calendar/index/2017/03/26/'
		);*/

		$data['heading'] = "CI Calendar";

		$this->load->view('includes/header');  
		$this->load->view('calendar_view', $data);  //note: no .php extension
		$this->load->view('includes/footer');
	}


}
