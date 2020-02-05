<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Employees_Model extends CI_Model
{
    public function get_employee_by_contact_number($contact_number){
        $this->db->where('contact_number',$contact_number);
        return $this->db->get('employees')->row();
    }
    public function get_user_by_email($email){
        $this->db->where('email',$email);
        $this->db->where('role >',0);
        $this->db->where('working_status =',1);
        return $this->db->get('employees')->row();
    }

    public function save_employee($employee_data){
        return $this->db->insert('employees',array('id'=>uuid(),
            'emp_no'=>$employee_data->post('empNo'),
            'emp_name'=>$employee_data->post('employeeName'),
            'joined_date'=>$employee_data->post('empJoinedDate'),
            'designation'=>$employee_data->post('employeeDesignation'),
            'address'=>$employee_data->post('empAddrLine1').','.$employee_data->post('empAddrLine2').','.$employee_data->post('empAddrLine3'),
            'contact_number'=>$employee_data->post('empContactNumber'),
            'role'=>0,
            'email'=>$employee_data->post('empEmail'),
            'branch'=>$employee_data->post('empBranch')
        ));
    }

    public function get_employee_by_email($email_address){
        $this->db->select(array('id','email','role'));
        $this->db->where('email',str_replace('%20','',trim($email_address)));
        return $this->db->get('employees')->row();
    }

    public function get_working_employees($page_no){
        if($page_no !=='all'){
            $offset = (10* $page_no) - 10;
            $this->db->select(array('emp_no','id','emp_name','joined_date','designation','address','contact_number','email'));
            $this->db->where('working_status = ',1);
            return $this->db->get('employees',10,$offset)->result();
        }else{
            $this->db->select(array('emp_no','id','emp_name','joined_date','designation','address','contact_number','email'));
            $this->db->where('working_status = ',1);
            return $this->db->get('employees')->result();
        }
    }
    public function get_employee_by_id($emp_id){
        $this->db->select(array('emp_no','id','emp_name','joined_date','designation','address','contact_number','email','branch'));
        $this->db->where(array('working_status'=>1,'id'=>$emp_id));
        return $this->db->get('employees')->row();
    }
    public function update_employee_by_id($emp_updating_data){
        $this->db->where('id',$emp_updating_data->post('updateEmployeeId'));
        return $this->db->update('employees',array('designation'=>$emp_updating_data->post('updateEmpDesignation'),
            'emp_name'=>$emp_updating_data->post('updateEmpName'),
            'address'=>$emp_updating_data->post('updateEmpAddress'),
            'contact_number'=>$emp_updating_data->post('updateEmpContactNumber'),
            'email'=>$emp_updating_data->post('updateEmpEmail')
        ));
    }
    public function get_resigned_employees($page_no){
        if($page_no !=='all'){
            $offset = (10* $page_no) - 10;
            $this->db->select(array('emp_no','id','emp_name','joined_date','designation','address','contact_number','email'));
            $this->db->where('working_status = ',0);
            return $this->db->get('employees',10,$offset)->result();
        }else{
            $this->db->select(array('emp_no','id','emp_name','joined_date','designation','address','contact_number','email'));
            $this->db->where('working_status = ',1);
            return $this->db->get('employees')->result();
        }
    }

    public function update_working_status($working_status,$emp_id){
        $this->db->where('id',$emp_id);
        return $this->db->update('employees',array('working_status'=>$working_status));
    }

    public function delete_by_id($emp_id){
        $this->db->where('id',$emp_id);
        return $this->db->delete('employees');
    }
    public function get_employee_by_emp_no($emp_no){
        $this->db->distinct();
        $this->db->select(array('id','emp_name'));
        $this->db->where('emp_no',str_replace('%20',' ',$emp_no));
        $this->db->or_where('contact_number',str_replace('%20',' ',$emp_no));
        $this->db->or_where('emp_name',str_replace('%20',' ',$emp_no));
        return $this->db->get('employees')->result();
    }
}