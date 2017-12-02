<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Reports extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
        date_default_timezone_set("Asia/Kolkata");
        
        $this->load->model('Reports_model');
        $this->load->model('Customer_model');
        if (!$this->session->userdata('logged_in_admin')) {
            redirect(base_url());
        }
    }
    function view_reports()
    {
        $settings        = get_settings();
        $header['title'] = $settings->title . " | View Report";
        $this->load->view('Templates/header', $header);
        $data['countries'] = $this->Reports_model->getTable("", "", "country");
        $data['religions'] = $this->Reports_model->getTable("", "", "religions");
        $data['members']   = $this->Customer_model->get_profile_details("");
        $this->load->view('reports/view_reports', $data);
        $this->load->view('Templates/footer');
    }
    function view_graph()
    {
        $data['graph']   = $this->Reports_model->get_graph_details();
        $settings        = get_settings();
        $header['title'] = $settings->title . " | View Graph";
        $this->load->view('Templates/header', $header);
        $this->load->view('reports/view_graph', $data);
        $this->load->view('Templates/footer');
    }
    
    function load_graph()
    {
        $data = $this->Reports_model->get_graph_details();
        echo json_encode($data);
    }
    function view_result()
    {
        $settings        = get_settings();
        $header['title'] = $settings->title . " | View Report";
        $this->load->view('Templates/header', $header);
        if ($_POST) {
            $data              = $_POST;
            $data['countries'] = $this->Reports_model->getTable("", "", "country");
            $data['religions'] = $this->Reports_model->getTable("", "", "religions");
            $data['members']   = $this->Reports_model->search($data);
			
            //$data['packages'] = $this->Reports_model->get_packages();         
        } else {
            $data['countries'] = $this->Reports_model->getTable("", "", "country");
            $data['religions'] = $this->Reports_model->getTable("", "", "religions");
            $data['members']   = $this->Customer_model->get_profile_details("");
            //$data['packages'] = $this->Reports_model->get_packages();
        }
        $this->load->view('reports/view_reports', $data);
        $this->load->view('Templates/footer');
    }
    //to add Package
    function add_packages()
    {
        $settings        = get_settings();
        $header['title'] = $settings->title . " | Add Packages";
        $this->load->view('Templates/header', $header);
        $this->load->view('Packages/add_packages');
        $this->load->view('Templates/footer');
        if ($_POST) {
            $data = $_POST;
            // $data['created_by']=$sessid['created_user']; 
            $result = $this->Packages_model->add_packages($data);
            if ($result) {
                $this->session->set_flashdata('message', array(
                    'message' => 'Add Package successfully',
                    'class' => 'success'
                ));
            } else {
                $this->session->set_flashdata('message', array(
                    'message' => 'Error',
                    'class' => 'error'
                ));
            }
            redirect(base_url() . 'Packages/view_packages');
        }
        //$this->load->view('template',$template);
    }
    // edit Package
    
    function edit_packages()
    {
        $settings        = get_settings();
        $header['title'] = $settings->title . " | Edit Members";
        $this->load->view('Templates/header', $header);
        $id               = $this->uri->segment(3);
        $template['data'] = $this->Packages_model->editget_package_id($id);
        $this->load->view('Packages/edit_packages', $template);
        $this->load->view('Templates/footer');
        if (!empty($template['data'])) {
            
            if ($_POST) {
                $data   = $_POST;
                $result = $this->Packages_model->edit_package($data, $id);
                redirect(base_url() . 'Packages/view_packages');
                
            }
        } else {
            $this->session->set_flashdata('message', array(
                'message' => "You don't have permission to access.",
                'class' => 'danger'
            ));
            redirect(base_url() . 'Packages/view_packages');
        }
    }
       // delete package
    function delete_package()
    {
        $data1  = array(
            "package_status" => '0'
        );
        $id     = $this->uri->segment(3);
        $result = $this->Packages_model->delete_package($id, $data1);
        $this->session->set_flashdata('message', array(
            'message' => 'Deleted Successfully',
            'class' => 'success'
        ));
        redirect(base_url() . 'Packages/view_packages');
    }
    
    // manage packages
    function manage_packages()
    {
        $settings        = get_settings();
        $header['title'] = $settings->title . " | Manage Packages";
        $this->load->view('Templates/header', $header);
        $template['result'] = $this->Packages_model->view_packages();
        $this->load->view('Packages/manage_packages', $template);
        $this->load->view('Templates/footer');
        if ($_POST) {
            $data   = $_POST;
            $result = $this->Packages_model->manage_package($data);
            // redirect(base_url().'Packages/view_packages');
            
            if ($result) {
                $this->session->set_flashdata('message', array(
                    'message' => 'Success',
                    'class' => 'success'
                ));
            } else {
                $this->session->set_flashdata('message', array(
                    'message' => 'Error',
                    'class' => 'error'
                ));
            }
            
            redirect(base_url() . 'Packages/view_packages');
        }
    }
    
    function view_manage_packages()
    {
        $settings        = get_settings();
        $header['title'] = $settings->title . " | Manage Packages";
        $this->load->view('Templates/header', $header);
        $template['data'] = $this->Packages_model->view_manage_packages();
        $this->load->view('Packages/view_manage_packages', $template);
        $this->load->view('Templates/footer');
    }
    
    // delete package
    function delete_manage_package()
    {
        
        $data1  = array(
            "package_manage_status" => '0'
        );
        $id     = $this->uri->segment(3);
        $result = $this->Packages_model->delete_manage_package($id, $data1);
        $this->session->set_flashdata('message', array(
            'message' => 'Deleted Successfully',
            'class' => 'success'
        ));
        redirect(base_url() . 'Packages/view_manage_packages');
    }
    
    
    function edit_manage_packages()
    {
        $settings        = get_settings();
        $header['title'] = $settings->title . " |  Edit Packages";
        $this->load->view('Templates/header', $header);
        $id                 = $this->uri->segment(3);
        $template['data']   = $this->Packages_model->editget_package_id($id);
        $template['result'] = $this->Packages_model->view_manage_packages();
        $this->load->view('Packages/edit_manage_packages', $template);
        $this->load->view('Templates/footer');
        // if(!empty($template['data'])){
        
        if ($_POST) {
            $data   = $_POST;
            $result = $this->Packages_model->edit_manage_package($data, $id);
            redirect(base_url() . 'Packages/view_manage_packages');
            
        }
        // }
        /*else{
        $this->session->set_flashdata('message', array('message' => "You don't have permission to access.",'class' => 'danger'));    
        redirect(base_url().'Packages/view_manage_packages');
        }*/
        
    }
    public function get_drop_data()
    {
        $sel_val = $this->input->post('sel_val');
        $sel_typ = $this->input->post('sel_typ');
        $where   = array();
        $tbl     = "";
        if ($sel_typ == "country") {
            $tbl      = "cities";
            $fld_name = "City";
            $where[]  = "country_id = '" . $sel_val . "'";
        } else if ($sel_typ == "state") {
            $tbl      = "cities";
            $fld_name = "City";
            $where[]  = "state_id = '" . $sel_val . "'";
        } else {
            return false;
        }
        
        $drop_vals = $this->Reports_model->getTable("", $where, $tbl);
        $html = "";
        $html .= "<option value='0'>Select " . $fld_name . "</option>";
        if ($fld_name == "State") {
            foreach ($drop_vals as $drop_val) {
                $html .= "<option value='" . $drop_val->state_id . "'>" . $drop_val->state_name . "</option>";
            }
        } else {
            foreach ($drop_vals as $drop_val) {
                $html .= "<option value='" . $drop_val->city_id . "'>" . $drop_val->city_name . "</option>";
            }
        }
        echo $html;
    }
}
?>