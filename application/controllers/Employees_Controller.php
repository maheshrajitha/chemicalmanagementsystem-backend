<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employees_Controller extends CI_Controller{
    private $active_user;
    private $nav_items;
    public function __construct() {
        parent::__construct();
        $this->active_user = check_token_cookies();
        if(empty($this->active_user) || $this->active_user->role > 2){
            $this->session->set_flashdata('auth_error','Please Login Again');
            redirect(base_url());
        }else{
            $this->nav_items = $this->Admin_Model->load_dashboard_items(check_token_cookies()->role);
        }
    }

    public function index($page){
        $data['title'] = 'Employees';
        $data['nav_items'] = $this->nav_items;
        $data['working_employees'] = $this->Employees_Model->get_working_employees($page);
        $data['resigned_employees_list'] = $this->Employees_Model->get_resigned_employees($page);
        $data['branches_list'] = $this->Company_Settings_Model->get_branches();
        $this->load->view('control_panel/partials/_dashboard',$data);
        $this->load->view('control_panel/employees/employees');
        $this->load->view('control_panel/partials/_footer');
    }

    public function check_employee_by_contact_number($contact_number){
        return $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(200)
                    ->set_output(json_encode($this->Employees_Model->get_employee_by_contact_number($contact_number)));
    }

    public function check_employee_by_email($email){
        return $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(200)
                    ->set_output(json_encode($this->Employees_Model->get_employee_by_email($email)));
    }

    public function save_employee(){
        if(!empty($this->input->post('empEmail')) && !empty('employeeName')){
            if($this->Employees_Model->save_employee($this->input))
                redirect(base_url().'admin/employees/1');
            else
                show_error('Something Went Wrong',500,'Something Went Wrong');
        }else{
            redirect(base_url());
        }
    }

    public function get_employee_by_id($emp_id){
        $employee = $this->Employees_Model->get_employee_by_id($emp_id);
        if(!empty($employee))
            return $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(200)
                    ->set_output(json_encode($employee));
        else
            return $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(404)
                    ->set_output(json_encode(null));
    }

    public function update_employee(){
        if(!empty($this->input->post('updateEmployeeId'))){
            if($this->Employees_Model->update_employee_by_id($this->input)){
                redirect(base_url().'admin/employees/1');
            }else{
                show_error('Employee Updating Failed',500,'Some Thing Went Wrong');
            }
        }
    }
    public function resign_an_employee(){
        if($this->Employees_Model->update_working_status(0,$this->input->post('empId'))){
            return $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(200)
                    ->set_output(json_encode('OK'));
        }else{
            return $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(404)
                    ->set_output(json_encode(null));
        }
        //echo $this->input->post('empId');
    }

    public function delete_an_employee(){
        if($this->Employees_Model->delete_by_id($this->input->post('empId'))){
            return $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(200)
                    ->set_output(json_encode('OK'));
        }else{
            return $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(404)
                    ->set_output(json_encode(null));
        }
    }

    public function check_employee_by_emp_no($emp_no){
        $employee = $this->Employees_Model->get_employee_by_emp_no($emp_no);
        if($employee){
            return $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(200)
                    ->set_output(json_encode($employee));
        }else{
            return $this->output
                    ->set_content_type('application/json')
                    ->set_status_header(404)
                    ->set_output(json_encode(null));
        }
    }
}