<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Statistics extends CI_Controller {


	public function index()
	{
        $this->load->model('user_model');
        if(!$this->user_model->authorize($this->config->item('auth_mode'))) {
            if($this->user_model->validate_session()) {
                $this->user_model->clear_session();
                show_error('Access denied<p>Click <a href="'.site_url('user/login').'">here</a> to log in as another user', 403);
            } else {
                redirect('user/login');
            }
        }
			
		// Database connections
		$this->load->model('logbook_model');

		// Store info
		$data['todays_qsos'] = $this->logbook_model->todays_qsos();
		$data['total_qsos'] = $this->logbook_model->total_qsos();
		$data['month_qsos'] = $this->logbook_model->month_qsos();
		$data['year_qsos'] = $this->logbook_model->year_qsos();

		$data['total_ssb'] = $this->logbook_model->total_ssb();
		$data['total_cw'] = $this->logbook_model->total_cw();
		$data['total_fm'] = $this->logbook_model->total_fm();
		$data['total_digi'] = $this->logbook_model->total_digi();
		
		$data['total_bands'] = $this->logbook_model->total_bands();
		
		$data['total_sat'] = $this->logbook_model->total_sat();
		
		$data['page_title'] = "Statistics"; 
		
		$data['total_digi'] = $this->logbook_model->total_digi();
	
		$this->load->view('layout/header');
		$this->load->view('statistics/index', $data);
		$this->load->view('layout/footer');
	}
}
