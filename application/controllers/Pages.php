<?php

class Pages extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('url');

        $this->load->model('SettingsModel');

        $this->load->model('PersonnelModel');
        $this->load->model('Page_model');
         $this->load->model('Drrm_model', 'drrm');
    }


    public function view()
    {


        if ($this->session->position == 'smme') {

            $page = "dashboard_smme";

            if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
                show_404();
            }

            $data['title'] = "Company List";
            $data['pn'] = "Company";
            $data['link'] = "company_new";

            $fy = $this->session->cur_fy;


            //$result['data'] = $this->Page_model->count_all('hris_staff');
            $result['sub'] = $this->SGODModel->two_cond_count_rows('sgod_aip_submit', 'fy', $fy, 'status', 0);
            $result['ap'] = $this->SGODModel->two_cond_count_rows('sgod_aip_submit', 'fy', $fy, 'status', 1);
            $result['req'] = $this->SGODModel->two_cond_count_rows('sgod_aip_request', 'fy', $fy, 'stat', 0);



            $this->load->view('templates/head');
            $this->load->view('templates/header');
            $this->load->view('pages/' . $page, $result);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
        } elseif ($this->session->position == 'Accountant') {


            $page = "dashboard_smme";

            if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
                show_404();
            }

            $data['title'] = "Company List";
            $data['pn'] = "Company";
            $data['link'] = "company_new";


            $result['data'] = $this->Page_model->count_all('hris_staff');
            $result['sub'] = $this->SGODModel->two_cond_count_rows('sgod_aip_submit', 'fy', '2024', 'status', 0);
            $result['ap'] = $this->SGODModel->two_cond_count_rows('sgod_aip_submit', 'fy', '2024', 'status', 1);
            $result['req'] = $this->SGODModel->two_cond_count_rows('sgod_aip_request', 'fy', '2024', 'stat', 0);
            $result['last'] = $this->SGODModel->get_last_record('sgod_school_allocation');



            $this->load->view('templates/head');
            $this->load->view('templates/header');
            $this->load->view('pages/' . $page, $result);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
        }elseif ($this->session->position == 'review') {

            $page = "dashboard_smmev2";

            if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
                show_404();
            }

            $result['title'] = "Company List";


            // $result['data'] = $this->Page_model->count_all('hris_staff');
            // $result['sub'] = $this->SGODModel->two_cond_count_rows('sgod_aip_submit', 'fy', '2024', 'status', 0);
            // $result['ap'] = $this->SGODModel->two_cond_count_rows('sgod_aip_submit', 'fy', '2024', 'status', 1);
            // $result['req'] = $this->SGODModel->two_cond_count_rows('sgod_aip_request', 'fy', '2024', 'stat', 0);
            // $result['last'] = $this->SGODModel->get_last_record('sgod_school_allocation');



            $this->load->view('templates/head');
            $this->load->view('templates/header');
            $this->load->view('pages/' . $page, $result);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
        }elseif ($this->session->position == 'funds') {

            $page = "dashboard_smmev2";

            if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
                show_404();
            }

            $result['title'] = "Company List";


            // $result['data'] = $this->Page_model->count_all('hris_staff');
            // $result['sub'] = $this->SGODModel->two_cond_count_rows('sgod_aip_submit', 'fy', '2024', 'status', 0);
            // $result['ap'] = $this->SGODModel->two_cond_count_rows('sgod_aip_submit', 'fy', '2024', 'status', 1);
            // $result['req'] = $this->SGODModel->two_cond_count_rows('sgod_aip_request', 'fy', '2024', 'stat', 0);
            // $result['last'] = $this->SGODModel->get_last_record('sgod_school_allocation');



            $this->load->view('templates/head');
            $this->load->view('templates/header');
            $this->load->view('pages/' . $page, $result);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
        }elseif ($this->session->position == 'School') {
            if ($this->session->userdata('sp') != 0) {
                $sp = $this->Common->one_cond_row('users_sp', 'id', $this->session->sp);
                if ($sp->position == "SBFP") {
                    redirect(base_url() . 'Page/sbfp_dashboard');
                }
            }

            $page = "dss";

            if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
                show_404();
            }

            $data['title'] = "Company List";
            $data['pn'] = "Company";
            $data['link'] = "company_new";


            $id = $this->session->c_id;
            $result['data'] = $this->PersonnelModel->count_all_staff($id);
            $result['data1'] = $this->PersonnelModel->count_all_teaching($id);
            $result['data2'] = $this->PersonnelModel->count_all_nonteaching($id);
            $result['data3'] = $this->PersonnelModel->count_all_inactive($id);
            $result['data4'] = $this->PersonnelModel->announcements_post();
            $result['data5'] = $this->PersonnelModel->school_dashboard($id);



            $this->load->view('templates/head');
            $this->load->view('templates/header');
            $this->load->view('pages/' . $page, $result);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
        }elseif ($this->session->position == 'sbfp') {

            redirect(base_url() . 'Page/sbfp_dashboard');

            $page = "dss";

            if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
                show_404();
            }

            $data['title'] = "Company List";
            $data['pn'] = "Company";
            $data['link'] = "company_new";


            $id = $this->session->c_id;
            $result['data'] = $this->PersonnelModel->count_all_staff($id);
            $result['data1'] = $this->PersonnelModel->count_all_teaching($id);
            $result['data2'] = $this->PersonnelModel->count_all_nonteaching($id);
            $result['data3'] = $this->PersonnelModel->count_all_inactive($id);
            $result['data4'] = $this->PersonnelModel->announcements_post();
            $result['data5'] = $this->PersonnelModel->school_dashboard($id);



            $this->load->view('templates/head');
            $this->load->view('templates/header');
            $this->load->view('pages/' . $page, $result);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
        } elseif ($this->session->position == 'doceval') {

            $page = "doceval";

            $cid = $this->session->c_id;

            if ($this->session->userdata('position') === 'Admin') {
            } elseif ($this->session->userdata('position') === 'Super Admin') {
            } elseif ($this->session->userdata('position') === 'Staff') {
            } elseif ($this->session->userdata('position') === 'smme') {
            } else {
                $this->Page_model->check_ownership($cid);
            }

            if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
                show_404();
            }

            $data['title'] = "Company List";
            $data['pn'] = "Company";
            $data['link'] = "company_new";


            $result['data'] = $this->Page_model->count_all('hris_staff');
            $result['data1'] = $this->Page_model->count_inactive('hris_staff');
            $result['data2'] = $this->Page_model->count_teaching('hris_staff');
            $result['data3'] = $this->Page_model->count_nonteaching('hris_staff');
            $result['data4'] = $this->Page_model->count_for_approval_leave('hris_leave');



            $this->load->view('templates/head');
            $this->load->view('templates/header');
            $this->load->view('pages/' . $page, $result);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
        } elseif ($this->session->position == 'District' || $this->session->position == 'Evaluator' || $this->session->position == 'rater') {

            $page = "dashboard_district";

            if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
                show_404();
            }

            $data['title'] = "DepEd Davao Oriental";
            $data['district'] = $this->Common->one_cond_row('district', 'id', $this->session->c_id);



            $this->load->view('templates/head');
            $this->load->view('templates/header');
            $this->load->view('pages/' . $page, $data);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
        } elseif ($this->session->position == 'Validator') {

            $page = "dashboard_district";

            if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
                show_404();
            }

            $data['title'] = "Company List";



            $this->load->view('templates/head');
            $this->load->view('templates/header');
            $this->load->view('pages/' . $page, $data);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
        } elseif ($this->session->position == 'readmin') {

            $page = "dashboard_district";

            if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
                show_404();
            }

            $data['title'] = "Company List";



            $this->load->view('templates/head');
            $this->load->view('templates/header');
            $this->load->view('pages/' . $page, $data);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
        } elseif ($this->session->position == 'sgod') {

            $page = "dashboard_sgod";

            if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
                show_404();
            }

            $data['title'] = "School Governance and Operations Division";

            $data['school'] = $this->Common->no_cond_count_row('schools');
            $data['accom'] = $this->Common->no_cond_count_row('sgod_accomplishments');
            $data['section'] = $this->Common->no_cond_count_row('sgod_sections');
            


            $this->load->view('templates/head');
            $this->load->view('templates/header');
            $this->load->view('pages/' . $page, $data);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');

        }elseif ($this->session->position == 'socmob') {

            $page = "dashboard_socmob";

            if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
                show_404();
            }

            $data['title'] = "Social Mobilization and Networking Section";

            


            $this->load->view('templates/head');
            $this->load->view('templates/header');
            $this->load->view('pages/' . $page, $data);
            $this->load->view('templates/footer');
        }
        

           elseif ($this->session->position == 'Human Resource Admin') {
            $page = "dashboard_hr";
            $cid = $this->session->c_id;
            $empEmail = $this->session->userdata('username'); // or 'email' if that's used in the `endorser` / `approver` field
            

            // View validation
            if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
                show_404();
            }
            
            // Static page info
            $data['title'] = "Company List";
            $data['pn'] = "Company";
            $data['link'] = "company_new";
            
            // Common data
            $result['data'] = $this->Page_model->count_all('hris_staff');
            $result['data1'] = $this->Page_model->count_inactive('hris_staff');
            $result['data2'] = $this->Page_model->count_teaching('hris_staff');
            $result['data3'] = $this->Page_model->count_nonteaching('hris_staff');
            $result['data4'] = $this->Page_model->count_for_approval_leave('hris_leave');
                $result['data5'] = $this->Page_model->count_for_approval_leave1('hris_leave');
            
            
     
            // Load the views
            $this->load->view('templates/head');
            $this->load->view('templates/header');
            $this->load->view('pages/' . $page, $result);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
            
        }
        elseif ($this->session->position == 'private') {
            $page = "dashboard_private";
            $cid = $this->session->c_id;
            $empEmail = $this->session->userdata('username'); // or 'email' if that's used in the `endorser` / `approver` field
            

            // View validation
            if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
                show_404();
            }
            
            // Static page info
            $data['title'] = "Private School Dashboard";
            $data['pn'] = "Company";
            
     
            // Load the views
            $this->load->view('templates/head');
            $this->load->view('templates/header');
            $this->load->view('pages/' . $page, $data);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
            
        }elseif ($this->session->position == 'psu') {
            $page = "dashboard_private";
            

            // View validation
            if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
                show_404();
            }
            
            // Static page info
            $data['title'] = "Private School Dashboard";
            $data['pn'] = "Company";
            
     
            // Load the views
            $this->load->view('templates/head');
            $this->load->view('templates/header');
            $this->load->view('pages/' . $page, $data);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
            
        }elseif ($this->session->position == 'hrtd') {
            $page = "dashboard_hrtd";
            

            // View validation
            if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
                show_404();
            }
            
            // Static page info
            $data['title'] = "HRTD Dashboard";
            $data['pn'] = "Company";
            
     
            // Load the views
            $this->load->view('templates/head');
            $this->load->view('templates/header');
            $this->load->view('pages/' . $page, $data);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
            
        }elseif ($this->session->position == 'legal') {
            $page = "dashboard_legal";
            

            // View validation
            if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
                show_404();
            }
            
            // Static page info
            $data['title'] = "Legal Dashboard";
            $data['pn'] = "Company";
            
     
            // Load the views
            $this->load->view('templates/head');
            $this->load->view('templates/header');
            $this->load->view('pages/' . $page, $data);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
            
        }elseif ($this->session->position == 'provident') {
            $page = "dashboard_provident";
            

            // View validation
            if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
                show_404();
            }
            
            // Static page info
            $data['title'] = "Provident Dashboard";
            $data['pn'] = "Company";
            
     
            // Load the views
            $this->load->view('templates/head');
            $this->load->view('templates/header');
            $this->load->view('pages/' . $page, $data);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
            
        }elseif ($this->session->position == 'mathcoor') {
            $page = "dashboard_mathcoor";
            

            if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
                show_404();
            }
            
            
            $data['title'] = "Math Coordinator Dashboard";
            $data['pn'] = "Company";
            
     
            $this->load->view('templates/head');
            $this->load->view('templates/header');
            $this->load->view('pages/' . $page, $data);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
            
        }
        
        else {
            $page = "dashboard";
            $cid = $this->session->c_id;
            $empEmail = $this->session->userdata('username'); // or 'email' if that's used in the `endorser` / `approver` field
            
            // Role access logic
            $position = $this->session->userdata('position');
            if (!in_array($position, ['Admin', 'Super Admin', 'Staff', 'smme'])) {
                $this->Page_model->check_ownership($cid);
            }
            
            // Check if the user is an endorser or approver
            $is_endorser = $this->Page_model->is_user_endorser($empEmail);
            $is_approver = $this->Page_model->is_user_approver($empEmail);
            
            // View validation
            if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
                show_404();
            }
            
            // Static page info
            $data['title'] = "Company List";
            $data['pn'] = "Company";
            $data['link'] = "company_new";
            
            // Common data
            $result['data'] = $this->Page_model->count_all('hris_staff');
            $result['data1'] = $this->Page_model->count_inactive('hris_staff');
            $result['data2'] = $this->Page_model->count_teaching('hris_staff');
            $result['data3'] = $this->Page_model->count_nonteaching('hris_staff');
            $result['data4'] = $this->Page_model->count_for_approval_leave('hris_leave');
            
            // Conditional logic for roles
            if ($is_approver) {
                $result['data5'] = $this->Page_model->count_for_approval_leave3('hris_leave', $empEmail);
                $result['data7'] = $this->Page_model->count_for_approval_leave4('hris_leave', $empEmail);
            } else {
                $result['data5'] = $this->Page_model->count_for_approval_leave1('hris_leave');
            }
            
            // Optional: pass role flags to the view
            $result['is_endorser'] = $is_endorser;
            $result['is_approver'] = $is_approver;
            
            // Load the views
            $this->load->view('templates/head');
            $this->load->view('templates/header');
            $this->load->view('pages/' . $page, $result);
            $this->load->view('templates/modal');
            $this->load->view('templates/footer');
            
        }
    }


    public function view_user()
    {
        $page = "dashboard_user";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }

        $data['title'] = "Company List";
        $data['pn'] = "Company";
        $data['link'] = "company_new";

        $empEmail = $this->session->userdata('username');
        $result['data1'] = $this->Page_model->countvacancy('hris_jobvacancy');
        $result['data2'] = $this->Page_model->countapplications('hris_applications', $empEmail);
        $result['data5'] = $this->Page_model->count_for_approval_leave3('hris_leave', $empEmail);
        $result['data7'] = $this->Page_model->count_for_approval_leave4('hris_leave', $empEmail);
        $result['data6'] = $this->Page_model->count_for_approval_leave2('hris_leave');
    
        // ✅ Check if current user is listed as an endorser
        $result['is_endorser'] = $this->Page_model->is_user_endorser($empEmail);
        $result['is_approver'] = $this->Page_model->is_user_approver($empEmail);

        $this->load->view('templates/head');
        $this->load->view('templates/header');
        $this->load->view('pages/' . $page, $result);
        $this->load->view('templates/modal');
        $this->load->view('templates/footer');
    }

    public function view_employee()
    {
        $page = "dashboard_employee";
    
        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }
    
        $data['title'] = "Company List";
        $data['pn'] = "Company";
        $data['link'] = "company_new";
    
        $empEmail = $this->session->userdata('username');
    
        // Existing data
        $result['data1'] = $this->Page_model->countTrainingNeeds('hris_training_needs', $empEmail);
        $result['data2'] = $this->Page_model->countTrainingDevt('hris_ind_devt', $empEmail);
        $result['data3'] = $this->Page_model->vlCount($empEmail);
        $result['data4'] = $this->PersonnelModel->announcements_post();
        $result['data5'] = $this->Page_model->count_for_approval_leave3('hris_leave', $empEmail);
        $result['data7'] = $this->Page_model->count_for_approval_leave4('hris_leave', $empEmail);
        $result['data6'] = $this->Page_model->count_for_approval_leave2('hris_leave');
    
        // ✅ Check if current user is listed as an endorser
        $result['is_endorser'] = $this->Page_model->is_user_endorser($empEmail);
        $result['is_approver'] = $this->Page_model->is_user_approver($empEmail);
    
        $this->load->view('templates/head');
        $this->load->view('templates/header');
        $this->load->view('pages/' . $page, $result);
        $this->load->view('templates/modal');
        $this->load->view('templates/footer');
    }
    

    public function users()
    {
        $page = "user_list";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }

        $data['title'] = "User's List";
        $data['pn'] = "Add New User";
        $data['link'] = "user_add";

        if ($this->session->position == 'Super Admin') {
            $data['users'] = $this->Common->no_cond_select('users','id,username,position,fname,fname,mname,lname');
            //$data['users'] = $this->Common->no_cond('users');
        } else {
            $data['users'] = $this->Common->no_cond_except_select('users','id,username,position,fname,fname,mname,lname');
            //$data['users'] = $this->Common->no_cond('users');
        }


        $this->load->view('templates/head');
        $this->load->view('templates/header');
        $this->load->view('pages/' . $page, $data);
        $this->load->view('templates/modal_com');
        $this->load->view('templates/footer');
    }

    public function hrusers()
    {
        $page = "user_listv2";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }

        $data['title'] = "User's List";
        $data['pn'] = "Add New User";
        $data['link'] = "eval_user_add";


        $data['users'] = $this->Common->one_cond_or('users', 'position', 'user', 'position', 'reg');



        $this->load->view('templates/head');
        $this->load->view('templates/header');
        $this->load->view('pages/' . $page, $data);
        $this->load->view('templates/modal_com');
        $this->load->view('templates/footer');
    }

    public function users_school()
    {
        $page = "user_list_school";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }

        $data['title'] = "User's List";
        $data['pn'] = "Add New User";
        $data['link'] = "user_add";
        $IDNumber = $this->session->userdata('username');
        $data['users'] = $this->Page_model->get_post_school('users', 'position', 'School', 'username', 'IDNumber');

        $this->load->view('templates/head');
        $this->load->view('templates/header');
        $this->load->view('pages/' . $page, $data);
        $this->load->view('templates/modal_com');
        $this->load->view('templates/footer');
    }

    public function user_add()
    {

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        ', '</div>');
        $this->form_validation->set_rules('Username', 'Username', 'required');

        if ($this->form_validation->run() == FALSE) {

            $page = "user_new";

            if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
                show_404();
            }

            $data['users'] = $this->Page_model->get_post_except_group_by('users', 'position', 'Super Admin');
            $data['district'] = $this->Common->no_cond('district');
            $data['title'] = "Add New User";

            $this->load->view('templates/head');
            $this->load->view('templates/header');
            $this->load->view('pages/' . $page, $data);
            $this->load->view('templates/footer');
        } else {

            $this->Page_model->insert_user();
            $this->Page_model->insert_at('Add New user', $this->db->insert_id());
            $this->session->set_flashdata('success', ' New User Added.');
            redirect(base_url() . 'users');
        }
    }

    public function eval_user_add()
    {

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        ', '</div>');
        $this->form_validation->set_rules('Username', 'Username', 'required');

        if ($this->form_validation->run() == FALSE) {

            $page = "user_eval_new";

            if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
                show_404();
            }

            $data['users'] = $this->Page_model->get_post_except_group_by('users', 'position', 'Super Admin');
            $data['district'] = $this->Common->no_cond('district');
            $data['title'] = "Add New User";

            $this->load->view('templates/head');
            $this->load->view('templates/header');
            $this->load->view('pages/' . $page, $data);
            $this->load->view('templates/footer');
        } else {

            $this->Page_model->insert_user();
            $this->Page_model->insert_at('Add New user', $this->db->insert_id());
            $this->session->set_flashdata('success', ' New User Added.');
            redirect(base_url() . 'users');
        }
    }

    public function evaluators_account()
    {

        $page = "eval_new";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }

        $data['title'] = "Evaluator Account";
        $data['district'] = $this->Common->no_cond('district');



        $this->load->view('templates/header_public');
        $this->load->view('pages/' . $page, $data);
        $this->load->view('templates/footer_public');
    }

    public function secretariat()
    {
        // $this->session->set_flashdata('failed', 'Temporary closure, please contact the system administrator');
        // redirect(base_url().'log_in');

        $page = "sec_new";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }

        $data['title'] = "Secretariat Account";
        $data['district'] = $this->Common->no_cond('district');



        $this->load->view('templates/header_public');
        $this->load->view('pages/' . $page, $data);
        $this->load->view('templates/footer_public');
    }

    public function user_add2()
    {

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        ', '</div>');
        $this->form_validation->set_rules('Username', 'Username', 'required');

        if ($this->form_validation->run() == FALSE) {

            $page = "user_new";

            if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
                show_404();
            }

            $data['users'] = $this->Page_model->get_post_except_group_by('users', 'position', 'Super Admin');
            $data['title'] = "Add New User";

            $this->load->view('templates/head');
            $this->load->view('templates/header');
            $this->load->view('pages/' . $page, $data);
            $this->load->view('templates/footer');
        } else {

            $check = $this->Common->one_cond_count_row('users', 'username', $this->input->post('Username'));

            if ($check->num_rows() >= 1) {
                $this->session->set_flashdata('danger', 'Duplicate username');
                $this->session->set_flashdata('failed', 'Duplicate username');
                if ($this->session->position == "Human Resource Admin" || $this->session->position == "HR Staff" || $this->session->position == "Admin" || $this->session->position == "Super Admin") {
                    redirect(base_url() . 'user_add');
                } else {
                    redirect(base_url() . 'log_in');
                }
            } else {

                $this->Page_model->insert_user_2();
                $this->Page_model->insert_at('Add New user', $this->db->insert_id());
                $this->session->set_flashdata('success', ' New User Added.');
                if ($this->session->position == "Human Resource Admin" || $this->session->position == "HR Staff") {
                    redirect(base_url() . 'hrusers');
                } elseif ($this->session->position == "Admin" || $this->session->position == "Super Admin") {
                    redirect(base_url() . 'users');
                } else {
                    redirect(base_url() . 'log_in');
                }
            }
        }
    }

    public function user_edit($param)
    {
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_rules('position', 'position', 'required');

        if ($this->form_validation->run() == FALSE) {

            $page = "user_update";

            if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
                show_404();
            }

            $data['title'] = "Edit User";

            $data['users'] = $this->Page_model->get_post_except_group_by('users', 'position', 'Super Admin');
            $data['user'] = $this->Page_model->get_single_table_by_id('users', 'id', $param);
            $data['u'] = $this->Common->one_cond_row('users', 'id', $param);
            $data['district'] = $this->Common->no_cond('district');

            $data['id'] = $data['user']['id'];
            $data['username'] = $data['user']['username'];
            $data['position'] = $data['user']['position'];
            $data['fname'] = $data['user']['fname'];
            $data['mname'] = $data['user']['mname'];
            $data['lname'] = $data['user']['lname'];
            $data['se'] = $data['user']['sex'];
            $data['address'] = $data['user']['address'];

            $this->load->view('templates/head');
            $this->load->view('templates/header');
            $this->load->view('pages/' . $page, $data);
            $this->load->view('templates/footer');
        } else {

            $this->Page_model->update_user();
            $this->Page_model->insert_at('Updated User', $param);
            $this->session->set_flashdata('success', 'Selected user was updated');
            redirect(base_url() . 'users');
        }
    }

    public function eval_user_edit($param)
    {
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_rules('position', 'position', 'required');

        if ($this->form_validation->run() == FALSE) {

            $page = "user_eval_update";

            if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
                show_404();
            }

            $data['title'] = "Edit User";

            $data['users'] = $this->Page_model->get_post_except_group_by('users', 'position', 'Super Admin');
            $data['user'] = $this->Page_model->get_single_table_by_id('users', 'id', $param);
            $data['u'] = $this->Common->one_cond_row('users', 'id', $param);
            $data['district'] = $this->Common->no_cond('district');

            $data['id'] = $data['user']['id'];
            $data['username'] = $data['user']['username'];
            $data['position'] = $data['user']['position'];
            $data['fname'] = $data['user']['fname'];
            $data['mname'] = $data['user']['mname'];
            $data['lname'] = $data['user']['lname'];
            $data['se'] = $data['user']['sex'];
            $data['address'] = $data['user']['address'];

            $this->load->view('templates/head');
            $this->load->view('templates/header');
            $this->load->view('pages/' . $page, $data);
            $this->load->view('templates/footer');
        } else {

            $this->Page_model->update_user();
            $this->Page_model->insert_at('Updated User', $param);
            $this->session->set_flashdata('success', 'Selected user was updated');
            redirect(base_url() . 'users');
        }
    }

    public function user_delete($param)
    {
        $this->Page_model->delete('2', 'id', 'users');
        $this->Page_model->insert_at('Deleted user', $param);
        $this->session->set_flashdata('danger', ' User account was deleted.');
        if ($this->session->position == "Human Resource Admin" || $this->session->position == "HR Staff") {
            redirect(base_url() . 'hrusers');
        } else {
            redirect(base_url() . 'users');
        }
    }

    public function personel_del()
    {
        $id = $this->input->get('id');
        $this->db->query("delete from hris_staff where IDNumber='" . $id . "'");
        $this->Page_model->insert_at('Deleted user id number ', $id);
        $this->session->set_flashdata('danger', 'Deleted successfully!');
        redirect(base_url() . 'personnel');
    }

    public function personnel()
    {

        $page = "personel_list";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }

        $data['title'] = "Personnel List";
        $data['pn'] = "Add New";
        $data['link'] = "personel_add";
        $data['personel'] = $this->Page_model->get_limited_col('hris_staff', 'currentStatus,LastName,FirstName,MiddleName,IDNumber,empPosition,Department,csEligibility,tinNo,dateHired,lastAppointmentDate,retYear,serviceLenght,MaritalStatus,BirthDate,age');
        // $data['personel'] = $this->Page_model->get_limited_col('hris_staff', 'FirstName,MiddleName,LastName,IDNumber,empPosition,Department, currentStatus');


        $this->load->view('templates/head');
        $this->load->view('templates/header');
        $this->load->view('pages/' . $page, $data);
        $this->load->view('templates/footer');
    }


    public function personnel_teaching()
    {

        $page = "personel_list_v2";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }

        $data['title'] = "Personnel List";
        $data['pn'] = "Teaching Personnel";
        // $data['link'] = "personel_add";
        $data['personel'] = $this->Page_model->get_limited_col_con('hris_staff', 'FirstName,MiddleName,LastName,IDNumber,empPosition,Department', 'Teaching');


        $this->load->view('templates/head');
        $this->load->view('templates/header');
        $this->load->view('pages/' . $page, $data);
        $this->load->view('templates/footer');
    }

    public function personnel_nonteaching()
    {

        $page = "personel_list_v2";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }

        $data['title'] = "Personnel List";
        $data['pn'] = "Non-Teaching Personnel";
        // $data['link'] = "personel_add";
        $data['personel'] = $this->Page_model->get_limited_col_con('hris_staff', 'FirstName,MiddleName,LastName,IDNumber,empPosition,Department', 'Non-Teaching');


        $this->load->view('templates/head');
        $this->load->view('templates/header');
        $this->load->view('pages/' . $page, $data);
        $this->load->view('templates/footer');
    }

    public function ntp()
    {

        $page = "personel_list_v2";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }

        $data['title'] = "Personnel List";
        $data['pn'] = "Non-Teaching Personnel";
        // $data['link'] = "personel_add";
        $data['personel'] = $this->Page_model->empGroup('hris_staff', 'FirstName,MiddleName,LastName,IDNumber,empPosition,Department', 'Non-Teaching');


        $this->load->view('templates/head');
        $this->load->view('templates/header');
        $this->load->view('pages/' . $page, $data);
        $this->load->view('templates/footer');
    }

    public function tp()
    {

        $page = "personel_list_v2";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }

        $data['title'] = "Personnel List";
        $data['pn'] = "Teaching Personnel";
        // $data['link'] = "personel_add";
        $data['personel'] = $this->Page_model->empGroup('hris_staff', 'FirstName,MiddleName,LastName,IDNumber,empPosition,Department', 'Teaching');


        $this->load->view('templates/head');
        $this->load->view('templates/header');
        $this->load->view('pages/' . $page, $data);
        $this->load->view('templates/footer');
    }


    public function personnel_inactive()
    {

        $page = "personel_list_v2";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }

        $data['title'] = "Personnel List";
        $data['pn'] = "Inactive Personnel";
        // $data['link'] = "personel_add";
        $data['personel'] = $this->Page_model->get_limited_col_con2('hris_staff', 'FirstName,MiddleName,LastName,IDNumber,empPosition,Department', 'Active');


        $this->load->view('templates/head');
        $this->load->view('templates/header');
        $this->load->view('pages/' . $page, $data);
        $this->load->view('templates/footer');
    }

    public function school_inactive()
    {
        $page = "personel_list_inactive";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }

        $data['title'] = "Personnel List (INACTIVE)";
        // $data['pn'] = "Inactive Personnel";
        // $data['link'] = "personel_add";
        $data['personel'] = $this->Page_model->school_inactive('hris_staff', 'FirstName,MiddleName,LastName,IDNumber,empPosition,Department, currentStatus', 'Active');


        $this->load->view('templates/head');
        $this->load->view('templates/header');
        $this->load->view('pages/' . $page, $data);
        $this->load->view('templates/footer');
    }

    public function school_tr()
    {
        $page = "personel_tr";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }

        $data['title'] = "Personnel List (Teaching Related)";
        // $data['pn'] = "Inactive Personnel";
        // $data['link'] = "personel_add";
        $data['personel'] = $this->Common->two_cond('hris_staff', 'payCat', 'Teaching Related', 'schoolID', $this->session->username);


        $this->load->view('templates/head');
        $this->load->view('templates/header');
        $this->load->view('pages/' . $page, $data);
        $this->load->view('templates/footer');
    }

    public function personel_add()
    {

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        ', '</div>');
        $this->form_validation->set_rules('IDNumber', 'IDNumber', 'required');

        if ($this->form_validation->run() == FALSE) {

            $page = "personel_new";

            if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
                show_404();
            }

            $last = $this->Common->one_cond_row('count','id',3);
            $number = $last->number;
            $lastThreeDigits = substr($number, -3);
            $lastThreeDigits = (int)$lastThreeDigits + 1;

            if ($lastThreeDigits > 999) {
                $lastThreeDigits = 000;
            }

            $lastThreeDigits = str_pad($lastThreeDigits, 3, "0", STR_PAD_LEFT);

            $data['newIDNumber'] = date('Y').''.date('m').''. $lastThreeDigits;
            $data['ltd'] = $lastThreeDigits;

            $data['users'] = $this->Page_model->get_post_except_group_by('users', 'position', 'Super Admin');
            $data['title'] = "Add New Employee";

            $this->load->view('templates/head');
            $this->load->view('templates/header');
            $this->load->view('pages/' . $page, $data);
            $this->load->view('templates/footer');
        } else {

            $this->Page_model->insert_profile();
            $this->Page_model->insert_user();
            $this->Page_model->count_update(3,'1'.$this->input->post('ltd'));
            $this->Page_model->insert_at('Added new employee profile id number ', $this->db->insert_id());
            $this->session->set_flashdata('success', ' New employee added successfully.');
            redirect(base_url() . 'personnel');
        }
    }

    public function personnel_profile($param)
    {

        $page = "profile";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }

        $data['title'] = "Profile";
        $data['user'] = $this->Page_model->get_single_table_by_id('hris_staff', 'IDNumber', $param);
        $data['c_user'] = $this->Page_model->get_single_table_by_id('users', 'user_id', $param);
        $data['awards'] = $this->Page_model->get_posts_by_col('hris_awards', 'IDNumber', $param);
        $data['files'] = $this->Page_model->get_posts_by_col('hris_files', 'IDNumber', $param);
        $data['trainings'] = $this->Common->one_cond('hris_trainings', 'IDNumber', $param);
        $data['educ'] = $this->Page_model->get_posts_by_col('hris_educ', 'IDNumber', $param);
        $data['family'] = $this->Page_model->get_posts_by_col('hris_family', 'IDNumber', $param);
        $data['employment'] = $this->Page_model->get_posts_by_col('hris_employment', 'IDNumber', $param);
        $data['ipcr'] = $this->Page_model->get_posts_by_col('hris_ipcr', 'IDNumber', $param);

        $data['training_sum'] = $this->Reg->gettotaltraining_staff('hris_trainings','noHours',$this->uri->segment(2));
        $data['ex_year_sum'] = $this->Reg->gettotaltraining('hris_experience','ny',$this->uri->segment(2));
        $data['ex_month_sum'] = $this->Reg->gettotaltraining('hris_experience','nm',$this->uri->segment(2));
        
        $data['experience'] = $this->Common->one_cond('hris_experience', 'id_number', $param);

        $data['users'] = $this->Page_model->get_row_data('users', 'username', $param);

        $data['c_id'] = $data['c_user']['user_id'];
        $data['image'] = $data['c_user']['image'];

        if ($this->session->userdata('position') === 'Admin') :
            $data['id'] = $data['user']['IDNumber'];
            $data['c_id'] = $data['c_user']['user_id'];

        elseif ($this->session->userdata('position') === 'School') :
            $data['id'] = $data['user']['IDNumber'];
            $data['c_id'] = $data['c_user']['user_id'];

        elseif ($this->session->userdata('position') === 'Super Admin' || $this->session->userdata('position') === 'Human Resource Admin' || $this->session->userdata('position') === 'HR Staff' || $this->session->userdata('position') === 'asds') :
            $data['id'] = $data['user']['IDNumber'];
            $data['c_id'] = $data['c_user']['user_id'];

        elseif ($this->session->userdata('position') === 'Staff') :
            $data['id'] = $data['user']['IDNumber'];
            $data['c_id'] = $data['c_user']['user_id'];
        elseif ($this->session->userdata('position') === 'user') :
            $data['id'] = $this->session->userdata('username');
            $data['c_id'] = $this->session->userdata('username');
        endif;

        $data['FirstName'] = $data['user']['FirstName'];
        $data['MiddleName'] = $data['user']['MiddleName'];
        $data['LastName'] = $data['user']['LastName'];
        $data['NameExtn'] = $data['user']['NameExtn'];
        $data['prefix'] = $data['user']['prefix'];
        $data['jobTitle'] = $data['user']['jobTitle'];
        $data['empPosition'] = $data['user']['empPosition'];
        $data['Department'] = $data['user']['Department'];
        $data['schoolID'] = $data['user']['schoolID'];
        $data['MaritalStatus'] = $data['user']['MaritalStatus'];
        $data['empStatus'] = $data['user']['empStatus'];
        $data['BirthDate'] = $data['user']['BirthDate'];
        $data['BirthPlace'] = $data['user']['BirthPlace'];
        $data['Sex'] = $data['user']['Sex'];
        $data['height'] = $data['user']['height'];
        $data['weight'] = $data['user']['weight'];
        $data['bloodType'] = $data['user']['bloodType'];
        $data['gsis'] = $data['user']['gsis'];
        $data['pagibig'] = $data['user']['pagibig'];
        $data['philHealth'] = $data['user']['philHealth'];
        $data['sssNo'] = $data['user']['sssNo'];
        $data['tinNo'] = $data['user']['tinNo'];
        $data['bnk_acct'] = $data['user']['bnk_acct'];
        $data['resHouseNo'] = $data['user']['resHouseNo'];
        $data['resStreet'] = $data['user']['resStreet'];
        $data['resVillage'] = $data['user']['resVillage'];
        $data['resBarangay'] = $data['user']['resBarangay'];
        $data['resCity'] = $data['user']['resCity'];
        $data['resProvince'] = $data['user']['resProvince'];
        $data['resZipCode'] = $data['user']['resZipCode'];
        $data['perHouseNo'] = $data['user']['perHouseNo'];
        $data['perStreet'] = $data['user']['perStreet'];
        $data['perVillage'] = $data['user']['perVillage'];
        $data['perBarangay'] = $data['user']['perBarangay'];
        $data['perCity'] = $data['user']['perCity'];
        $data['perProvince'] = $data['user']['perProvince'];
        $data['perZipCode'] = $data['user']['perZipCode'];
        $data['empTelNo'] = $data['user']['empTelNo'];
        $data['empMobile'] = $data['user']['empMobile'];
        $data['empEmail'] = $data['user']['empEmail'];
        $data['settingsID'] = $data['user']['settingsID'];
        $data['pronoun1'] = $data['user']['pronoun1'];
        $data['pronoun2'] = $data['user']['pronoun2'];
        $data['age'] = $data['user']['age'];
        $data['dateHired'] = $data['user']['dateHired'];
        $data['retirement'] = $data['user']['retirement'];
        $data['retYear'] = $data['user']['retYear'];
        $data['agencyCode'] = $data['user']['agencyCode'];
        $data['citizenship'] = $data['user']['citizenship'];
        $data['dualCitizenship'] = $data['user']['dualCitizenship'];
        $data['citizenshipType'] = $data['user']['citizenshipType'];
        $data['citizenshipCountry'] = $data['user']['citizenshipCountry'];
        $data['contactName'] = $data['user']['contactName'];
        $data['contactRel'] = $data['user']['contactRel'];
        $data['contactEmail'] = $data['user']['contactEmail'];
        $data['contactNo'] = $data['user']['contactNo'];
        $data['contactAddress'] = $data['user']['contactAddress'];
        $data['fb'] = $data['user']['fb'];
        $data['skype'] = $data['user']['skype'];
        $data['stationCode'] = $data['user']['staCode'];
        $data['umid'] = $data['user']['umid'];
        $data['csEligibility'] = $data['user']['csEligibility'];
        $data['csLevel'] = $data['user']['csLevel'];
        $data['currentStatus'] = $data['user']['currentStatus'];
        $data['YearsAsJO'] = $data['user']['YearsAsJO'];
        $data['workNature1'] = $data['user']['workNature1'];
        $data['workNature2'] = $data['user']['workNature2'];
        $data['employeeNo'] = $data['user']['employeeNo'];
        $data['itemNo'] = $data['user']['itemNo'];
        $data['sgNo'] = $data['user']['sgNo'];
        $data['authAnSalary'] = $data['user']['authAnSalary'];
        $data['actualSalary'] = $data['user']['actualSalary'];
        $data['stepNo'] = $data['user']['stepNo'];
        $data['origAppointmentDate'] = $data['user']['origAppointmentDate'];
        $data['lastAppointmentDate'] = $data['user']['lastAppointmentDate'];
        $data['serviceLenght'] = $data['user']['serviceLenght'];
        $data['payGroup'] = $data['user']['payGroup'];
        $data['payCat'] = $data['user']['payCat'];
        $data['workStat'] = $data['user']['workStat'];
        $data['staCode'] = $data['user']['staCode'];
        $data['lastUpdate'] = $data['user']['lastUpdate'];
        $data['updatedBy'] = $data['user']['updatedBy'];



        $this->load->view('templates/head');
        $this->load->view('templates/header');
        $this->load->view('pages/' . $page, $data);
        $this->load->view('templates/modal');
        $this->load->view('templates/footer');
    }

    public function del_ipcr($param)
    {
        $result['img'] = $this->Page_model->get_single_table_by_id("hris_ipcr", 'id', $param);
        $filename = $result['img']['fileName'];
        $id = $result['img']['IDNumber'];
        $this->Page_model->delete_group($param, $filename, 'ipcr', "hris_ipcr");
        $this->Page_model->insert_at('Delete uploaded IPCR. ', $param);
        $this->session->set_flashdata('danger', ' IPCR deleted successfully!');
        redirect(base_url() . 'personnel_profile/' . $id);
    }

    public function del_sip($param)
    {
        $result['img'] = $this->Page_model->get_single_table_by_id("school_imp_plans", 'id', $param);
        $filename = $result['img']['fileAttachment'];
        $id = $result['img']['id'];
        $this->Page_model->delete_group($param, $filename, 'sip_files', "school_imp_plans");
        // $this->Page_model->insert_at('Delete uploaded IPCR. ' . $param);
        $this->session->set_flashdata('danger', ' Deleted successfully!');
        redirect(base_url() . 'page/view_sip/');
    }


    public function del_201($param)
    {
        $result['img'] = $this->Page_model->get_single_table_by_id("hris_files", 'id', $param);
        $filename = $result['img']['fileName'];
        $id = $result['img']['IDNumber'];
        $this->Page_model->delete_group($param, $filename, '201files', "hris_files");
        $this->Page_model->insert_at('Deleted 201 Files. ', $param);
        $this->session->set_flashdata('danger', ' 201 File deleted successfully!');
        redirect(base_url() . 'personnel_profile/' . $id);
    }

    public function delete_employment()
    {
        $empID = $this->input->get('empID');
        $id = $this->input->get('id');
        $this->db->query("delete  from hris_employment where empID='" . $empID . "'");
        $this->session->set_flashdata('success', 'Deleted successfully!');
        redirect(base_url() . 'personnel_profile/' . $id);
    }

    public function delete_awards()
    {
        $awardsID = $this->input->get('awardsID');
        $id = $this->input->get('id');
        $this->db->query("delete  from hris_awards where id='" . $awardsID . "'");
        $this->session->set_flashdata('success', 'Deleted successfully!');
        redirect(base_url() . 'personnel_profile/' . $id);
    }

    public function delete_trainings()
    {
        $trainingID = $this->input->get('trainingID');
        $id = $this->input->get('id');
        $this->db->query("delete  from hris_trainings where trainingID='" . $trainingID . "'");
        $this->session->set_flashdata('success', 'Deleted successfully!');
        redirect(base_url() . 'personnel_profile/' . $id);
    }

    public function delete_education()
    {
        $educID = $this->input->get('educID');
        $id = $this->input->get('id');
        $this->db->query("delete  from hris_educ where educID='" . $educID . "'");
        $this->session->set_flashdata('success', 'Deleted successfully!');
        redirect(base_url() . 'personnel_profile/' . $id);
    }

    public function delete_family()
    {
        $famID = $this->input->get('famID');
        $id = $this->input->get('id');
        $this->db->query("delete  from hris_family where famID='" . $famID . "'");
        $this->session->set_flashdata('success', 'Deleted successfully!');
        redirect(base_url() . 'personnel_profile/' . $id);
    }

    public function twoOonefiles()
    {
        $config['allowed_types'] = 'jpg|pdf';
        $config['upload_path'] = './uploads/201files/';
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('attachment')) {
            //$file = $this->upload->data();
            $id = $this->input->post('id');

            $this->Page_model->insert_201files();
            $this->Page_model->insert_at('Add new 201 file', $this->db->insert_id());
            $this->session->set_flashdata('success', '1 file uploaded successfully!');
            redirect(base_url() . 'personnel_profile/' . $id);
        } else {
            print_r($this->upload->display_errors());
        }
    }


    public function sip()
    {
        $config['allowed_types'] = 'pdf';
        $config['upload_path'] = './uploads/sip_files/';
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('attachment')) {
            //$file = $this->upload->data();

            $this->Page_model->insert_sip();
            // $this->Page_model->insert_at('Add new 201 file,  id number ' . $this->db->insert_id());
            $this->session->set_flashdata('success', '1 file uploaded successfully!');
            redirect(base_url() . 'page/view_sip');
        } else {
            print_r($this->upload->display_errors());
        }
    }

    public function ipcr()
    {
        $config['allowed_types'] = 'pdf';
        $config['upload_path'] = './uploads/ipcr/';
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('fileName')) {
            //$file = $this->upload->data();
            $id = $this->input->post('id');

            $this->Page_model->insert_ipcr();
            $this->Page_model->insert_at('Add new IPCR ', $this->db->insert_id());
            $this->session->set_flashdata('success', '1 file uploaded successfully!');
            redirect(base_url() . 'personnel_profile/' . $id);
        } else {
            print_r($this->upload->display_errors());
        }
    }

    public function awards()
    {
        $id = $this->input->post('id');

        $this->Page_model->insert_awards();
        $this->session->set_flashdata('success', 'One record added successfully!');
        redirect(base_url() . 'personnel_profile/' . $id);
    }

    public function family()
    {
        $id = $this->input->post('id');

        $this->Page_model->insert_family();
        $this->session->set_flashdata('success', 'One record added successfully!');
        redirect(base_url() . 'personnel_profile/' . $id);
    }

    public function trainings()
    {
        // $id = $this->input->post('id');

        // $this->Page_model->insert_trainings();
        // $this->session->set_flashdata('success', 'One record added successfully!');
        // redirect(base_url() . 'personnel_profile/' . $id);

        $config['allowed_types'] = 'pdf';
			$config['upload_path'] = './uploads/trainings_staff';
			$new_name = $this->input->post('id') . '-'. time() . $_FILES["file"]['name'];
			$config['file_name'] = $new_name;
			$this->load->library('upload', $config);

			if ($this->upload->do_upload('file')) {
				$this->Page_model->insert_trainings();
				$this->session->set_flashdata('success', 'Successfully Added.');
				redirect($_SERVER['HTTP_REFERER'] . '#trainings');
			} else {
				$this->session->set_flashdata('danger', $this->upload->display_errors());
				redirect($_SERVER['HTTP_REFERER'] . '#trainings');
			}
    }

    public function employment()
    {
        $id = $this->input->post('id');

        $this->Page_model->insert_employment();
        $this->session->set_flashdata('success', 'One record added successfully!');
        redirect(base_url() . 'personnel_profile/' . $id);
    }

    public function education()
    {
        $id = $this->input->post('id');

        $this->Page_model->insert_education();
        $this->session->set_flashdata('success', 'One record added successfully!');
        redirect(base_url() . 'personnel_profile/' . $id);
    }
    public function plantilla()
    {

        $page = "plantilla";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }

        $data['title'] = "Plantilla Positions";
        $data['pn'] = "Add New";
        $data['link'] = "plantilla_add";
        $data['page'] = $this->Page_model->get_posts('hris_plantilla');

        $data['status'] = $this->Page_model->group_by_status('hris_plantilla');

        $this->load->view('templates/head');
        $this->load->view('templates/header');
        $this->load->view('pages/' . $page, $data);
        $this->load->view('templates/modal_com');
        $this->load->view('templates/footer');
    }
    public function items($param)
    {

        $page = "plantilla_items";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }

        $data['title'] = "Plantilla List";
        $data['pn'] = "Add New";
        $data['link'] = "plantilla_add";
        $data['p'] = $param;
        $data['page'] = $this->Page_model->get_posts_by_col('hris_plantilla', 'status', $param);



        $this->load->view('templates/head');
        $this->load->view('templates/header');
        $this->load->view('pages/' . $page, $data);
        $this->load->view('templates/modal_com');
        $this->load->view('templates/footer');
    }

    public function mis_logs()
    {

        $page = "mis_logs";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }

        $data['title'] = "MIS Logs";
        $data['pn'] = "Add New";
        $data['link'] = "plantilla_add";
        // $data['p'] = $param;
        $year = date('Y');
        $data['page'] = $this->Common->one_cond_between('mis_logs', 'username', $this->input->post('username'), 'transDate', $year . '-01-01', $year . '-12-31');



        $this->load->view('templates/head');
        $this->load->view('templates/header');
        $this->load->view('pages/' . $page, $data);
        $this->load->view('templates/modal_com');
        $this->load->view('templates/footer');
    }

    public function plantilla_add()
    {

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        ', '</div>');
        $this->form_validation->set_rules('pGroup', 'Plantilla Group', 'required');
        //$this->form_validation->set_rules('termPeriodto', 'Term Period To', 'required');

        if ($this->form_validation->run() == FALSE) {

            $page = "plantilla_new";

            if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
                show_404();
            }

            $data['pgroup'] = $this->Page_model->get_post_group_by('hris_plantilla', 'pGroup');
            $data['itemNo'] = $this->Page_model->get_post_group_by('hris_plantilla', 'itemNo');
            $data['itemPosition'] = $this->Page_model->get_post_group_by('hris_plantilla', 'itemPosition');
            $data['title'] = "Add New User";
            $data['title'] = "Add New User";

            $this->load->view('templates/head');
            $this->load->view('templates/header');
            $this->load->view('pages/' . $page, $data);
            $this->load->view('templates/footer');
        } else {
            $check = $this->Common->one_cond_count_row('hris_plantilla','itemNo',$this->input->post('itemNo'));
            if($check->num_rows() >= 1){
                $this->session->set_flashdata('danger', 'Item number already exists.');
                redirect(base_url() . 'plantilla');
            }else{
                $this->Page_model->insert_plantilla();
                $this->Page_model->insert_at('Add New user ', $this->db->insert_id());
                $this->session->set_flashdata('success', ' New User Save');
                redirect(base_url() . 'plantilla');
            }

        }
    }
    public function plantilla_update($param)
    {

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        ', '</div>');
        $this->form_validation->set_rules('pGroup', 'Plantilla Group', 'required');

        if ($this->form_validation->run() == FALSE) {

            $page = "plantilla_edit";


            if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
                show_404();
            }

            $data['title'] = "Plantilla Update";
            $data['plantilla'] = $this->Page_model->get_single_table_by_id('hris_plantilla', 'id', $param);
            $data['id'] = $data['plantilla']['id'];
            $data['pGroup'] = $data['plantilla']['pGroup'];
            $data['itemNo'] = $data['plantilla']['itemNo'];
            $data['itemPosition'] = $data['plantilla']['itemPosition'];
            $data['sg'] = $data['plantilla']['sg'];
            $data['step'] = $data['plantilla']['step'];
            $data['authAnnualSalary'] = $data['plantilla']['authAnnualSalary'];

            $this->load->view('templates/head');
            $this->load->view('templates/header');
            $this->load->view('pages/' . $page, $data);
            $this->load->view('templates/footer');
        } else {
            $this->Page_model->update_plantilla();
            $last_id = $this->input->post('id');
            $this->Page_model->insert_at('Add New Plantilla', $last_id);
            $this->session->set_flashdata('success', 'Succesfully Updated.');
            redirect(base_url() . 'plantilla');
        }
    }
    public function plantilla_del($param)
    {
        $this->Page_model->delete('2', 'id', 'hris_plantilla');
        $this->Page_model->insert_at('Delete Plantilla', $param);
        $this->session->set_flashdata('danger', ' Plantilla deleted');
        redirect(base_url() . 'plantilla');
    }



    public function position()
    {

        $page = "ap";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }

        $data['title'] = "Unfilled Items";
        if ($this->session->position != "Admin") {
            $data['page'] = $this->Page_model->get_table_by_col_group_by_param_by_two('hris_plantilla', 'status', 1, 'view_status', 1, 'itemPosition');
        } else {
            $data['page'] = $this->Page_model->get_table_by_col_group_by('hris_plantilla', 'status', 1, 'itemPosition');
        }
        $data['pos'] = $this->Page_model->position_count();

        $this->load->view('templates/head');
        $this->load->view('templates/header');
        $this->load->view('pages/' . $page, $data);
        $this->load->view('templates/modal_apply');
        $this->load->view('templates/footer');
    }
    public function view_status_unview($param)
    {
        $data['page'] = $this->Page_model->get_single_table_by_id('hris_plantilla', 'id', $param);
        $item = $data['page']['itemPosition'];

        $this->Page_model->update_view_status_unview($param, $item);
        $this->Page_model->insert_at('Update Plantilla', $param);
        $this->session->set_flashdata('success', ' View Status Updated');
        redirect(base_url() . 'position');
    }
    public function view_status_view($param)
    {
        $data['page'] = $this->Page_model->get_single_table_by_id('hris_plantilla', 'id', $param);
        $item = $data['page']['itemPosition'];

        $this->Page_model->update_view_status_view($param, $item);
        $this->Page_model->insert_at('Update Plantilla', $param);
        $this->session->set_flashdata('success', ' View Status Updated');
        redirect(base_url() . 'position');
    }

    public function reg()
    {

        $page = "registered";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }

        $data['title'] = "Registered Applicant List";
        $data['pn'] = "New Applicant";
        $data['link'] = "reg_add";
        $data['registered'] = $this->Page_model->get_post_except('hris_registration', 'status', 1);

        $this->load->view('templates/head');
        $this->load->view('templates/header');
        $this->load->view('pages/' . $page, $data);
        $this->load->view('templates/modal_com');
        $this->load->view('templates/footer');
    }
    public function register()
    {

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        ', '</div>');
        $this->form_validation->set_rules('fname', 'First Name', 'required');
        //$this->form_validation->set_rules('termPeriodto', 'Term Period To', 'required');

        if ($this->form_validation->run() == FALSE) {

            $page = "registration_new";

            if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
                show_404();
            }
            $data['title'] = "Register";
            $data['count'] = $this->Page_model->get_single_table_by_id('count', 'id', 1);
            $data['per'] = $data['count']['number'];
            $data['per_id'] = $data['count']['id'];

            $this->load->view('pages/' . $page, $data);
        } else {

            $this->Page_model->insert_reg();
            $this->Page_model->insert_at('Add New user', $this->db->insert_id());
            $this->Page_model->update_count();
            $this->Page_model->insert_reg_user();

            //Email Notification
            $email = $this->input->post('email');
            $fname = $this->input->post('fname');
            $this->load->config('email');
            $this->load->library('email');
            $mail_message = 'Dear ' . $fname . ',' . "\r\n";
            $mail_message .= '<br><br>Your account has been created successfully.' . "\r\n";
            // $mail_message .= '<br>Course: <b>' . $Course . '</b>' ."\r\n";
            // $mail_message .= '<br>Major: <b>' . $Major . '</b>'."\r\n";
            // $mail_message .= '<br>Year Level: <b>' . $YearLevel . '</b>'."\r\n";
            // $mail_message .= '<br>Sem/SY: <b>' . $Semester . ', '. $SY .'</b>'."\r\n";
            // $mail_message .= '<br>Status: <b>For Validation</b>'."\r\n";

            // $mail_message .= '<br><br>You will be notified once validated.' ."\r\n";
            $mail_message .= '<br><br>Thanks & Regards,';
            $mail_message .= '<br>HRIS - Online';

            $this->email->from('no-reply@lxeinfotechsolutions.com', 'HRIS')
                ->to($email)
                ->subject('Account Created')
                ->message($mail_message);
            $this->email->send();


            $this->session->set_flashdata('danger', 'fdasdf fadfas');
            redirect(base_url());
        }
    }

    public function school($param)
    {

        $id = $this->session->userdata('username');
        $result['data'] = $this->Page_model->schoolInfo('schools', $id);
        $this->load->view('dashboard_school', $result);
    }

    public function registered_profile($param)
    {

        $this->Page_model->check_ownership($param);

        $page = "profile_reg";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }


        $res['page'] = $this->Page_model->get_single_row_by_id('settings', 'id', 2);
        $data['title'] = "Profile";
        $data['a_user'] = $this->Common->one_cond_row('hris_applicant', 'id', $param);
        $data['user'] = $this->Common->one_cond_row('users', 'user_id', $param);

        $data['awards'] = $this->Page_model->get_posts_by_col('hris_awards', 'IDNumber', $param);
        $data['files'] = $this->Page_model->get_posts_by_col('hris_files', 'IDNumber', $param);
        $data['trainings'] = $this->Page_model->get_posts_by_col('hris_trainings', 'IDNumber', $param);
        $data['educ'] = $this->Page_model->get_posts_by_col('hris_educ', 'IDNumber', $param);
        $data['family'] = $this->Page_model->get_posts_by_col('hris_family', 'IDNumber', $param);
        $data['employment'] = $this->Page_model->get_posts_by_col('hris_employment', 'IDNumber', $param);
        $data['ipcr'] = $this->Page_model->get_posts_by_col('hris_ipcr', 'IDNumber', $param);

        $data['training'] = $this->Common->one_cond('hris_trainings', 'IDNumber', $param);
        $data['experience'] = $this->Common->one_cond('hris_experience', 'id_number', $param);

        $data['training_sum'] = $this->Reg->gettotaltraining_staff('hris_trainings','noHours',$this->uri->segment(2));
        $data['ex_year_sum'] = $this->Reg->gettotaltraining('hris_experience','ny',$this->uri->segment(2));
        $data['ex_month_sum'] = $this->Reg->gettotaltraining('hris_experience','nm',$this->uri->segment(2));
        




        $this->load->view('templates/head');
        $this->load->view('templates/header');
        $this->load->view('pages/' . $page, $data);
        $this->load->view('templates/footer');
    }
    public function apply()
    {
        $this->Page_model->apply_insert();
        $this->Page_model->insert_at('Apply', $this->db->insert_id());
        $this->session->set_flashdata('success', ' Successfuly Applied');
        redirect(base_url() . 'registered_profile/' . $this->session->c_id);
    }
    public function applicant()
    {

        $page = "ap_application";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }

        $data['title'] = "Applicant";
        $data['page'] = $this->Page_model->get_posts_by_col('applied', 'status', 0);

        $this->load->view('templates/head');
        $this->load->view('templates/header');
        $this->load->view('pages/' . $page, $data);
        $this->load->view('templates/modal_com');
        $this->load->view('templates/footer');
    }
    public function ap_delete($param)
    {
        $this->Page_model->delete('2', 'id', 'applied');
        $this->Page_model->insert_at('Delete application', $this->db->insert_id());
        $this->session->set_flashdata('danger', ' Application was deleted');
        redirect(base_url() . 'applicant');
    }






    /* to delete */
    public function pass()
    {
        $this->Page_model->pass();
        redirect(base_url());
    }

    public function user_pass($param)
    {
        $this->Page_model->user_pass_change($param);
        $this->session->set_flashdata('success', 'Successfully Updated.');
        redirect(base_url() . "users");
    }

    public function log_in()
    {

        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'uassword', 'required');

        if ($this->form_validation->run() == FALSE) {

            $page = "login";

            if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
                show_404();
            }

            $data['page'] = $this->Page_model->get_single_row_by_id('settings', 'id', 1);
            $this->load->view('pages/' . $page, $data);
        } else {

            $user_id = $this->Page_model->login();



            if ($user_id) {

                $user_data = array(
                    'username' => $user_id['username'],
                    'user' => $user_id['fname'] . ' ' . $user_id['mname'] . ' ' . $user_id['lname'],
                    'position' => $user_id['position'],
                    //'office' => $user_id['office'],
                    'sex' => $user_id['sex'],
                    'image' => $user_id['image'],
                    'id' => $user_id['id'],
                    'sp' => $user_id['sp'],
                    'c_id' => $user_id['user_id'],
                    'eg' => $user_id['egroup'],
                    'user_id' => $user_id['user_id'],
                    'id' => $user_id['id'],
                    'd_id' => $user_id['d_id'],
                    'logged_in' => true

                );

                $ren_guapo = $this->Common->one_cond_row_select('mis_settings','settingsID,fy','settingsID','1');

                $this->session->set_userdata($user_data);
                $this->session->set_userdata('cur_fy', date('Y'));
                //$this->session->set_userdata('cur_fy', date('Y'));
                //$current_sy = date('Y').'-'.date('Y')+1;
                $this->session->set_userdata('cur_sy', $ren_guapo->fy);
                

                $logStat = 'success';
                $logType = 'login';
                $this->Page_model->insert_logs($logStat, $logType);

                if ($this->session->sp == 0) {
                    if ($this->session->position == "user") {
                        redirect(base_url() . 'Pages/view_employee');
                        $this->Page_model->insert_logs();
                    } elseif ($this->session->position === "reg") {
                        redirect(base_url() . 'registered_profile/' . $this->session->c_id);
                    } elseif ($this->session->position === "School") {
                        redirect(base_url() . 'Page/schoolDashboard/');
                    } elseif ($this->session->position === "SHNS") {
                        redirect(base_url() . 'Page/Health/');
                    } elseif ($this->session->position === "Staff") {
                        redirect(base_url());
                    } elseif ($this->session->position === "Accountant") {
                        redirect(base_url());
                    } else {
                        redirect(base_url());
                    }
                } else {
                    redirect(base_url());
                }
            } else {
                $this->session->set_flashdata('failed', 'Username/Password not match');
                $logStat = 'failed';
                $this->Page_model->insert_logs_failed($logStat);
                redirect(base_url() . 'log_in');
            }
        }
    }
    public function lock_user_screen()
    {

        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_rules('password', 'password', 'required');

        if ($this->form_validation->run() == FALSE) {

            $page = "lock_screen";

            if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
                show_404();
            }

            $this->load->view('pages/' . $page);
        } else {

            $user_id = $this->Page_model->lock_screen();

            if ($user_id) {

                $user_data = array(
                    'username' => $user_id['username'],
                    'user' => $user_id['fname'] . ' ' . $user_id['mname'] . ' ' . $user_id['lname'],
                    'position' => $user_id['position'],
                    'office' => $user_id['office'],
                    'image' => $user_id['image'],
                    'id' => $user_id['id'],
                    'logged_in' => true
                );

                $this->session->set_userdata($user_data);
                $this->session->set_flashdata('user_log', 'You are now loged in as '
                    . $this->session->position);
                redirect(base_url());
            } else {
                $this->session->set_flashdata('failed', 'Password not match');
                redirect(base_url() . 'lock_user_screen');
            }
        }
    }

    public function logout()
    {

        $logStat = 'success';
        $logType = 'logout';
        $this->Page_model->insert_logs_out($logStat, $logType);

        $this->session->unset_userdata('id');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('position');
        $this->session->unset_userdata('office');
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('aip');

        $this->session->set_flashdata('failed', 'You are logged out.');



        redirect(base_url() . 'log_in');
    }
    public function lock()
    {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('position');
        $this->session->unset_userdata('office');
        $this->session->unset_userdata('logged_in');

        $this->session->set_flashdata('danger', 'You are now in Locked Screen Mode');
        redirect(base_url() . 'lock_user_screen');
    }

    public function new_applicant()
    {


        $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        ', '</div>');
        $this->form_validation->set_rules('fname', 'First Name', 'required');
        $this->form_validation->set_rules('contact', 'Contact', 'required');
        //$this->form_validation->set_rules('termPeriodto', 'Term Period To', 'required');
        $stat = $this->Common->one_cond_row('settings', 'id', 1);
        if($stat->status == 1){
            redirect(base_url());
        }

        if ($this->form_validation->run() == FALSE) {

            $page = "applicant_new";

            if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
                show_404();
            }
            $data['title'] = "Register";
            $data['count'] = $this->Page_model->get_row_data('count', 'id', 1);
            $data['data1'] = $this->PersonnelModel->mis_settings(); // Additional settings data
            $data['provinces'] = $this->SettingsModel->get_provinces();
            $data['cities'] = $this->SettingsModel->get_cities();
            $data['brgy'] = $this->SettingsModel->get_barangays();

            $data['et'] = $this->Common->no_cond('settings_ethnicity');
            $data['re'] = $this->Common->no_cond('settings_religion');

            $data['mis_settings'] = $this->Common->one_cond_row('mis_settings','settingsID',1);


            $this->load->view('templates/header_public');
            $this->load->view('pages/' . $page, $data);
            $this->load->view('templates/footer_public');
        } else {

            $mis_settings = $this->Common->one_cond_row('mis_settings','settingsID',1);

            $recaptcha = $this->input->post('g-recaptcha-response');
            $secret = trim($mis_settings->secret_key);

            $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secret}&response={$recaptcha}");
            $responseKeys = json_decode($response, true);

            if (!$responseKeys["success"]) {
                $this->session->set_flashdata('danger', 'reCAPTCHA verification failed. Please try again.');
                redirect('Pages/new_applicant'); 
            }

            $r_no = $this->input->post('record_no');
            $fname = $this->input->post('fname');
            $lname = $this->input->post('lname');
            $email = $this->input->post('email');
            $bd = $this->input->post('bd');
            $contact = $this->input->post('contact');
            $record_no_check = $this->Page_model->check_single_row_exist('hris_applicant', 'record_no', $r_no);
            $check = $this->Page_model->check_exist('hris_applicant', $fname, $lname);
            $email_check = $this->Page_model->check_single_row_exist('hris_applicant', 'empEmail', $email);
            $num_check = $this->Page_model->check_single_row_exist('hris_applicant', 'contactNo', $contact);

            $renren = $this->input->post('renren');
            $ivykate = $this->input->post('ivykate');
            $ivankyle = $this->input->post('ivankyle');
            $ic = $this->input->post('ic');

            if (!empty($renren) || !empty($ivykate) || !empty($ivankyle) || !empty($ic)) {
                $this->session->set_flashdata('danger', 'I Got you');
                redirect(base_url() . 'new_applicant');
            }

            if ($num_check->num_rows() >= 1) {
                $this->session->set_flashdata('danger', 'A Duplicate Contact Number was found.');
                redirect(base_url() . 'new_applicant');
            }

            if ($email_check->num_rows() >= 1) {
                $this->session->set_flashdata('danger', 'Duplicate Email found.');
                redirect(base_url() . 'new_applicant');
            } else {
                if ($check->num_rows() >= 1) {
                    $this->session->set_flashdata('danger', 'Duplicate records found.');
                    redirect(base_url() . 'new_applicant');
                } else {
                    $this->Page_model->insert_application();
                    $id = $this->db->insert_id();
                    $this->Page_model->update_app_count();
                    $this->Page_model->insert_reg_user($id);

                    //Email Notification
                    $this->load->config('email');
                    $this->load->library('email');
                    $mail_message = 'Dear ' . $fname . ',' . "\r\n";
                    $mail_message .= '<br><br>Thank you for signing up!' . "\r\n";
                    $mail_message .= '<br><br>You may now login to the system using <span style="color:red; font-weight:bold;">' . $email . '</span> as your username and <span style="color:red; font-weight:bold;">' . $bd . ' </span> as your password.' . "\r\n";
                    $mail_message .= '<br><br>Thanks & Regards,';
                    $mail_message .= '<br>HRIS - Online';

                    $this->email->from('no-reply@depeddavor.com', 'Human Resource Information System')
                        ->to($email)
                        ->subject('Account Created')
                        ->message($mail_message);
                    $this->email->send();


                    $this->session->set_flashdata('success', 'Your registration has been processed successfully.  Please check your email for the login credentials.');
                    redirect(base_url() . 'log_in');
                }
            }
        }
    }


    public function get_cities_by_province()
    {
        $province = $this->input->post('province');
        $this->db->select('City');
        $this->db->where('Province', $province);
        $this->db->distinct();
        $query = $this->db->get('settings_address');

        $output = '<option value="">Select City/Municipality</option>';
        foreach ($query->result() as $row) {
            $output .= '<option value="' . $row->City . '">' . $row->City . '</option>';
        }
        echo $output;
    }

    public function get_barangays_by_city()
    {
        $city = $this->input->post('city');
        $this->db->select('Brgy');
        $this->db->where('City', $city);
        $this->db->distinct();
        $query = $this->db->get('settings_address');

        $output = '<option value="">Select Barangay</option>';
        foreach ($query->result() as $row) {
            $output .= '<option value="' . $row->Brgy . '">' . $row->Brgy . '</option>';
        }
        echo $output;
    }


    public function profile_reg_delete($param)
    {
        $this->Page_model->delete('3', 'id', 'hris_applicant');
        $id = $this->db->insert_id();
        $this->Page_model->delete('3', 'user_id', 'users');
        $this->Page_model->insert_at('Deleted Applicant', $id);
        $this->session->set_flashdata('danger', ' Applicant account was deleted.');
        redirect(base_url() . 'Page/regApplicants');
    }

    public function del_application($param)
    {
        $this->Page_model->delete('3', 'appID', 'hris_applications');
        $this->Page_model->insert_at('Deleted Application', $this->db->insert_id());
        $this->session->set_flashdata('danger', ' Applications was deleted.');
        redirect(base_url() . 'Page/myApplications?id=' . $this->input->get('ee'));
    }

    public function del_application_school($param)
    {
        $this->Page_model->delete('3', 'appID', 'hris_applications');
        $this->Page_model->insert_at('Deleted Application', $this->db->insert_id());
        $this->session->set_flashdata('danger', ' Applications was deleted.');
        redirect(base_url() . 'Pages/school_applicant/' . $this->uri->segment(4));
    }

    public function pass_change_in_school()
    {
        $this->Page_model->change_pass_school_emp();
        $this->session->set_flashdata('success', 'Updated successfully.');
        redirect(base_url() . 'Page/employeelist');
    }

    public function pass_change_in_district()
    {
        $this->Page_model->change_pass_school_emp();
        $this->session->set_flashdata('success', 'Updated successfully.');
        redirect(base_url() . 'Page/employee_list/' . $this->uri->segment(4));
    }

    // public function pass_change()
    // {
    //     if ($this->session->position == "Admin" || $this->session->position == "Super Admin" || $this->session->position == "Human Resource Admin" || $this->session->position == "HR Staff" || $this->session->position == "doceval") {
    //         $this->Page_model->change_pass_admin();
    //     } elseif ($this->session->position == "School") {

    //         $this->Page_model->change_pass_admin();
    //     } else {
    //         $this->Page_model->change_pass();
    //         $this->session->set_flashdata('success', 'Updated successfully.');
    //         //redirect('Pages/users');
    //     }
    //     $this->Page_model->insert_at('Change Applicant ', $this->db->insert_id());
    //     $this->session->set_flashdata('success', 'Password successfully changed.');
    //     $id = $this->input->post('id');

    //     if ($this->session->userdata('position') === 'Admin' || $this->session->position == 'Super Admin') :
    //         redirect(base_url() . 'users');
    //     elseif ($this->session->userdata('position') === 'School') :
    //         redirect(base_url() . 'Users/users_sub');
    //     elseif ($this->session->userdata('position') === 'reg') :
    //         redirect(base_url() . 'registered_profile/' . $id);
    //     elseif ($this->session->userdata('position') === 'user') :
    //         redirect('Pages/view_employee');
    //     elseif ($this->session->position === 'Evaluator' || $this->session->position == "Human Resource Admin" || $this->session->position == "HR Staff" || $this->session->position == "District") :
    //         redirect();
    //     endif;
    // }





    public function pass_change()
{
    if ($this->session->position == "Admin" || 
        $this->session->position == "Super Admin" || 
        $this->session->position == "Human Resource Admin" || 
        $this->session->position == "HR Staff" || 
        $this->session->position == "asds" || 
        $this->session->position == "doceval") { 
        
        $this->Page_model->change_pass_admin();
        redirect(base_url());
    
    } elseif ($this->session->position == "SHNS") {
        // SHNS-specific password change logic
        $this->Page_model->change_pass_admin();
        $this->session->set_flashdata('success', 'Password successfully changed.');
    
    } elseif ($this->session->position == "School") {
        $this->Page_model->change_pass_admin();
    
    } else {
        $this->Page_model->change_pass();
        $this->session->set_flashdata('success', 'Updated successfully.');
    }

    $this->Page_model->insert_at('Change Applicant ', $this->db->insert_id());

    $id = $this->input->post('id');

    if ($this->session->userdata('position') === 'Admin' || $this->session->position == 'Super Admin') :
        $this->session->set_flashdata('success', 'Password successfully changed.');
        redirect(base_url() . 'users');

    elseif ($this->session->userdata('position') === 'School') :
        $this->session->set_flashdata('success', 'Password successfully changed.');
        redirect(base_url() . 'Users/users_sub');

    elseif ($this->session->userdata('position') === 'reg') :
        $this->session->set_flashdata('success', 'Password successfully changed.');
        redirect(base_url() . 'registered_profile/' . $id);

    elseif ($this->session->userdata('position') === 'user') :
        $this->session->set_flashdata('success', 'Password successfully changed.');
        redirect('Pages/view_employee');

    elseif ($this->session->position === "SHNS") :
        $this->session->set_flashdata('success', 'Password successfully changed.');
        redirect(base_url() . 'Page/Health'); // Change to the correct SHNS redirect page

    elseif ($this->session->position === 'Evaluator' || 
            $this->session->position == "Human Resource Admin" || 
            $this->session->position == "HR Staff" || 
            $this->session->position == "District") :
        redirect();

    endif;
}

    public function other_settings()
    {

        $page = "settings_other";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }

        $data['title'] = "Other Settings";
        $data['page'] = $this->Page_model->get_all_posts('settings');


        $this->load->view('templates/head');
        $this->load->view('templates/header');
        $this->load->view('pages/' . $page, $data);
        $this->load->view('templates/footer');
    }

    public function update_settings()
    {
        $this->Page_model->close_open('3', 'id', 'settings', 'status', '4');
        $this->Page_model->insert_at('Update Other Settings', $this->db->insert_id());
        $this->session->set_flashdata('success', 'Successfully Updated');
        redirect(base_url() . 'Pages/other_settings');
    }

    public function profile_reg_edit($param)
    {

        $this->Page_model->check_ownership($param);

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        ', '</div>');
        $this->form_validation->set_rules('FirstName', 'First Name', 'required');
        //$this->form_validation->set_rules('termPeriodto', 'Term Period To', 'required');

        if ($this->form_validation->run() == FALSE) {

            $page = "profile_reg_update";

            if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
                show_404();
            }

            $data['title'] = "Applicant";
            $data['app'] = $this->Page_model->get_single_row_by_id('hris_applicant', 'id', $param);
            $data['et'] = $this->Common->no_cond('settings_ethnicity');
            $data['re'] = $this->Common->no_cond('settings_religion');

            $this->load->view('templates/head');
            $this->load->view('templates/header');
            $this->load->view('pages/' . $page, $data);
            $this->load->view('templates/modal_com');
            $this->load->view('templates/footer');
        } else {
            $this->Page_model->update_profile_reg();
            $id = $this->db->insert_id();
            $this->Reg->ai_sex_update();
            $this->Page_model->insert_at('Profile registration successfully ', $id);

            $this->Reg->educ_jhss_update();
            $this->Reg->educ_shss_update();

            $this->session->set_flashdata('success', 'Updated successfully');
            redirect(base_url() . 'Pages/registered_profile/' . $param);
        }
    }

    public function employee_edit($param)
    {

        if ($this->session->userdata('position') === 'Admin') {
        } elseif ($this->session->userdata('position') === 'Super Admin') {
        } elseif ($this->session->userdata('position') === 'School') {
        } elseif ($this->session->userdata('position') === 'Staff') {
        } else {
            $this->Page_model->check_ownership($param);
        }

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        ', '</div>');
        $this->form_validation->set_rules('FirstName', 'First Name', 'required');
        //$this->form_validation->set_rules('termPeriodto', 'Term Period To', 'required');

        if ($this->form_validation->run() == FALSE) {

            $page = "employee_update";

            if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
                show_404();
            }

            $data['title'] = "Employee Update";
            $data['app'] = $this->Page_model->get_single_row_by_id('hris_staff', 'IDNumber', $param);
            $data['position'] = $this->Common->no_cond_order_by('hris_positions','title','asc');

            $data['et'] = $this->Common->no_cond('settings_ethnicity');
            $data['re'] = $this->Common->no_cond('settings_religion');

            $this->load->view('templates/head');
            $this->load->view('templates/header');
            $this->load->view('pages/' . $page, $data);
            $this->load->view('templates/modal_com');
            $this->load->view('templates/footer');
        } else {
            if ($this->session->position == "user") {
                $this->Page_model->update_staff();
            } else {
                $this->Page_model->update_employee();
                $this->Page_model->update_user_account();
            }
            $this->Page_model->insert_at('Employee information updated successfully ', $this->input->post('id'));
            $this->session->set_flashdata('success', 'Updated successfully.');

            if ($this->session->position != 'user') {
                redirect(base_url() . 'Pages/personnel_profile/' . $this->input->post('empNo'));
            } else {
                redirect(base_url() . 'Pages/personnel_profile/' . $param);
            }
        }
    }


    public function ies()
    {
        $id = $this->uri->segment(3);
        $appId = $this->uri->segment(4);
        $jobId = $this->uri->segment(5);

        $job = $this->Page_model->get_single_row_by_id('hris_jobvacancy', 'jobID', $jobId);

        if ($job->position == 1) {
            $page = "ies_form";
        } else {
            $page = "ies_form_none";
        }

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }


        //$data['ap'] = $this->Page_model->get_single_row_by_id('hris_applicant', 'id', $id);
        
        if ($job->position == 1) {
            $data['rate'] = $this->Page_model->get_single_row_by_id('hris_applications_rating', 'appID', $appId);
        } else {
            $data['rate'] = $this->Page_model->get_single_row_by_id('hris_rating_none', 'appID', $appId);
        }
        $data['job'] = $this->Page_model->get_single_row_by_id('hris_jobvacancy', 'jobID', $jobId);
        $data['title'] = "INDIVIDUAL EVALUATION SHEET(IES)";

        $this->load->view('pages/' . $page, $data);
    }

    public function ies_promotion()
    {
        $id = $this->uri->segment(3);
        $appId = $this->uri->segment(4);
        $jobId = $this->uri->segment(5);

        $data['job'] = $this->Page_model->get_single_row_by_id('hris_jobvacancy', 'jobID', $jobId);

        $page = "ies_promotion";
       
        $data['ap'] = $this->Page_model->get_single_row_by_id('hris_staff', 'IDNumber', $id);

        $this->Reg->calculate_rating_promotion_ies($appId);

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }


        $data['rate'] = $this->Page_model->get_single_row_by_id('hris_rating_promotion', 'appID', $appId);
       

        
        $data['title'] = "INDIVIDUAL EVALUATION SHEET(IES)";

        $this->load->view('pages/' . $page, $data);
    }




   public function car_rqa()
{
    ob_start(); // Begin output buffering

    $page = "car_rqa_form";

    if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
        show_404();
    }

    $jobID = $this->uri->segment(3);
    $data['job'] = $this->Common->one_cond_row_select('hris_jobvacancy','jobID,jobTitle,job_type', 'jobID', $jobID);
    $data['car'] = $this->Page_model->rqa($jobID);
    $data['settings'] = $this->SettingsModel->get_mis_settings();

    $job = $this->Common->one_cond_row_select('hris_jobvacancy','jobID,sy,sign,ttype', 'jobID', $jobID);
    $data['sign'] = $this->Common->two_cond_row('hris_rqa_sign', 'fy', $job->sy, 'id', $job->sign);

    // Preload all applicants and staff into memory
    $applicants = $this->Page_model->get_all_applicants_indexed();
    $staff = $this->Page_model->get_all_staff_indexed();
    $data['applicants'] = $applicants;
    $data['staff'] = $staff;

    if($job->ttype == 1){
        $data['title'] = "COMPARATIVE ASSESSMENT RESULT FOR EXPANDED RECLASSIFICATION (CAReER)";
    }else{
        $data['title'] = "COMPARATIVE ASSESSMENT RESULT - REGISTRY OF QUALIFIED APPLICANTS (CAR - RQA)";
    }
    

    $this->load->view('pages/' . $page, $data);

    ob_end_flush(); // Output all content
}

public function car_rqa_promotion()
    {
        ob_start(); // Begin output buffering

        $page = "car_rqa_form_promotion";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }

        $jobID = $this->uri->segment(3);
        $data['job'] = $this->Common->one_cond_row_select('hris_jobvacancy','jobID,jobTitle,job_type,sy,sign,ttype', 'jobID', $jobID);
        $data['car'] = $this->Page_model->rqa_promotion($jobID);
        $data['settings'] = $this->SettingsModel->get_mis_settings();

        //$job = $this->Common->one_cond_row_select('hris_jobvacancy','jobID,sy,sign,ttype', 'jobID', $jobID);
        $data['sign'] = $this->Common->two_cond_row('hris_rqa_sign', 'fy', $data['job']->sy, 'id', $data['job']->sign);

        // Preload all applicants and staff into memory
        $applicants = $this->Page_model->get_all_applicants_indexed();
        $staff = $this->Page_model->get_all_staff_indexed();
        $data['applicants'] = $applicants;
        $data['staff'] = $staff;

        $data['title'] = "COMPARATIVE ASSESSMENT RESULT FOR EXPANDED RECLASSIFICATION (CAReER)";
       
        

        $this->load->view('pages/' . $page, $data);

        ob_end_flush(); // Output all content
    }






    public function car_rqa_complete()
{
    ob_start();

    $page = "car_rqa_complete";

    if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
        show_404();
    }

    $jobID = $this->uri->segment(3);
    $data['job'] = $this->Common->one_cond_row_select('hris_jobvacancy','jobID,jobTitle,job_type', 'jobID', $jobID);
    $data['car'] = $this->Page_model->rqa($jobID);
    $data['settings'] = $this->SettingsModel->get_mis_settings();

    $job = $this->Common->one_cond_row_select('hris_jobvacancy','jobID,sy,sign', 'jobID', $jobID);
    $data['sign'] = $this->Common->two_cond_row('hris_rqa_sign', 'fy', $job->sy, 'id', $job->sign);

    $data['applicants'] = $this->Page_model->get_all_applicants_indexed();
    $data['staff'] = $this->Page_model->get_all_staff_indexed();

    $data['title'] = "COMPARATIVE ASSESSMENT RESULT - REGISTRY OF QUALIFIED APPLICANTS (CAR - RQA)";

    $this->load->view('pages/' . $page, $data);

    ob_end_flush();
}

    public function car_rqa_non()
    {
        $page = "car_rqa_form";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }

        $jobID = $this->uri->segment(3);
        $data['job'] = $this->Page_model->get_single_row_by_id('hris_jobvacancy', 'jobID', $jobID);
        $data['car'] = $this->Common->rqa('hris_rating_none', $jobID);
        
        $job = $this->Common->one_cond_row_select('hris_jobvacancy','jobID,sy,sign', 'jobID', $jobID);
        $data['sign'] = $this->Common->two_cond_row('hris_rqa_sign', 'fy', $job->sy, 'id', $job->sign);

        $data['title'] = "COMPARATIVE ASSESSMENT RESULT - REGISTRY OF QUALIFIED APPLICANTS (CAR - RQA)";

        $this->load->view('pages/' . $page, $data);
    }



    public function car_rqa_administrative()
    {
        $page = "car_rqa_form_administrative";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }

        $jobID = $this->uri->segment(3);
        $data['job'] = $this->Page_model->get_single_row_by_id('hris_jobvacancy', 'jobID', $jobID);
        $data['car'] = $this->Common->rqa_non($jobID);
        $job = $this->Common->one_cond_row_select('hris_jobvacancy','jobID,sy,sign,ttype', 'jobID', $jobID);
        $data['sign'] = $this->Common->three_cond_row('hris_rqa_sign', 'fy', $job->sy, 'stat', 0, 'id', $job->sign);

        
        if($job->ttype == 1){
            $data['title'] = "COMPARATIVE ASSESSMENT RESULT FOR EXPANDED RECLASSIFICATION (CAReER)";
        }else{
            $data['title'] = "COMPARATIVE ASSESSMENT RESULT (CAR)";
        }


        $this->load->view('pages/' . $page, $data);
    }

    public function car_rqa_administrative_posting()
    {
        $page = "car_rqa_form_administrative_posting";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }

        $jobID = $this->uri->segment(3);
        $data['job'] = $this->Page_model->get_single_row_by_id('hris_jobvacancy', 'jobID', $jobID);
        $data['car'] = $this->Common->rqa_non($jobID);
        $job = $this->Common->one_cond_row_select('hris_jobvacancy','jobID,sy,sign,ttype', 'jobID', $jobID);
        $data['sign'] = $this->Common->three_cond_row('hris_rqa_sign', 'fy', $job->sy, 'stat', 0, 'id', $job->sign);


        if($job->ttype == 1){
            $data['title'] = "COMPARATIVE ASSESSMENT RESULT FOR EXPANDED RECLASSIFICATION (CAReER)";
        }else{
            $data['title'] = "COMPARATIVE ASSESSMENT RESULT (CAR)";
        }


        $this->load->view('pages/' . $page, $data);
    }

    public function car_rqa_administrative_region()
    {
        $page = "car_rqa_form_for_region";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }

        $jobID = $this->uri->segment(3);
        $data['job'] = $this->Page_model->get_single_row_by_id('hris_jobvacancy', 'jobID', $jobID);
        $data['car'] = $this->Common->rqa_non($jobID);
        $job = $this->Common->one_cond_row_select('hris_jobvacancy','jobID,sy,sign,ttype', 'jobID', $jobID);
        $data['sign'] = $this->Common->three_cond_row('hris_rqa_sign', 'fy', $job->sy, 'stat', 0, 'id', $job->sign);


        $data['title'] = "COMPARATIVE ASSESSMENT RESULT FOR EXPANDED RECLASSIFICATION (CAReER)";
       


        $this->load->view('pages/' . $page, $data);
    }


   

    public function car_rqa_related()
    {
        $page = "car_rqa_form_related";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }

        $jobID = $this->uri->segment(3);
        $data['job'] = $this->Page_model->get_single_row_by_id('hris_jobvacancy', 'jobID', $jobID);
        $data['car'] = $this->Common->rqa_non($jobID);
        $job = $this->Common->one_cond_row('hris_jobvacancy', 'jobID', $jobID);
        $data['sign'] = $this->Common->three_cond_row('hris_rqa_sign', 'fy', $job->sy, 'stat', 0, 'id', $job->sign);

        $data['title'] = "COMPARATIVE ASSESSMENT RESULT (CAR)";

        $this->load->view('pages/' . $page, $data);
    }

    public function car_rqa_related_posting()
    {
        $page = "car_rqa_form_related_posting";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }

        $jobID = $this->uri->segment(3);
        $data['job'] = $this->Page_model->get_single_row_by_id('hris_jobvacancy', 'jobID', $jobID);
        $data['car'] = $this->Common->rqa_non($jobID);
        $job = $this->Common->one_cond_row('hris_jobvacancy', 'jobID', $jobID);
        $data['sign'] = $this->Common->three_cond_row('hris_rqa_sign', 'fy', $job->sy, 'stat', 0, 'id', $job->sign);

        $data['title'] = "COMPARATIVE ASSESSMENT RESULT (CAR)";

        $this->load->view('pages/' . $page, $data);
    }

    public function car_rqa1_none()
    {
        $page = "car_rqa_form1_none";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }


        $jobID = $this->uri->segment(3);
        $data['job'] = $this->Page_model->get_single_row_by_id('hris_jobvacancy', 'jobID', $jobID);
        $data['car'] = $this->Common->rqa('hris_rating_none', $jobID);
        $job = $this->Common->one_cond_row('hris_jobvacancy', 'jobID', $jobID);
        $data['sign'] = $this->Common->two_cond_row('hris_rqa_sign', 'fy', $job->sy, 'stat', 0);

        $data['title'] = "COMPARATIVE ASSESSMENT RESULT - REGISTRY OF QUALIFIED APPLICANTS (CAR - RQA)";

        $this->load->view('pages/' . $page, $data);
    }

    public function car_rqa1()
{
    ob_start(); // Start streaming to browser

    $page = "car_rqa_form1";

    if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
        show_404();
    }

    $jobID = $this->uri->segment(3);
    $data['job'] = $this->Page_model->get_single_row_by_id('hris_jobvacancy', 'jobID', $jobID);
    $data['car'] = $this->Page_model->rqa($jobID);
    $data['settings'] = $this->SettingsModel->get_mis_settings();

    $job = $this->Common->one_cond_row_select('hris_jobvacancy','jobID,sy,sign,ttype', 'jobID', $jobID);
    $data['sign'] = $this->Common->two_cond_row('hris_rqa_sign', 'fy', $job->sy, 'id', $job->sign);

    // Preload all applicants and staff
    $data['all_applicants'] = $this->Page_model->get_all_applicants_indexed(); // record_no => object
    $data['all_staff'] = $this->Page_model->get_all_staff_indexed(); // IDNumber => object

    if($job->ttype == 1){
        $data['title'] = "COMPARATIVE ASSESSMENT RESULT FOR EXPANDED RECLASSIFICATION (CAReER)";
    }else{
        $data['title'] = "COMPARATIVE ASSESSMENT RESULT - REGISTRY OF QUALIFIED APPLICANTS (CAR - RQA)";
    }
    

    $this->load->view('pages/' . $page, $data);

    ob_end_flush(); // Send output
}

public function car_rqa1_promotion()
{
    ob_start(); // Start streaming to browser

    $page = "car_rqa_form1_promotion";

    if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
        show_404();
    }

    $jobID = $this->uri->segment(3);
    $data['job'] = $this->Page_model->get_single_row_by_id('hris_jobvacancy', 'jobID', $jobID);
    $data['car'] = $this->Page_model->rqa_promotion($jobID);
    $data['settings'] = $this->SettingsModel->get_mis_settings();

    $job = $this->Common->one_cond_row_select('hris_jobvacancy','jobID,sy,sign,ttype', 'jobID', $jobID);
    $data['sign'] = $this->Common->two_cond_row('hris_rqa_sign', 'fy', $job->sy, 'id', $job->sign);

    // Preload all applicants and staff
    $data['all_applicants'] = $this->Page_model->get_all_applicants_indexed(); // record_no => object
    $data['all_staff'] = $this->Page_model->get_all_staff_indexed(); // IDNumber => object

    $data['title'] = "COMPARATIVE ASSESSMENT RESULT FOR EXPANDED RECLASSIFICATION (CAReER)";
   
    

    $this->load->view('pages/' . $page, $data);

    ob_end_flush(); // Send output
}

public function car_rqa1_promotion_region()
{
    ob_start(); // Start streaming to browser

    $page = "car_rqa_form_promotion_for_region";

    if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
        show_404();
    }

    $jobID = $this->uri->segment(3);
    $data['job'] = $this->Page_model->get_single_row_by_id('hris_jobvacancy', 'jobID', $jobID);
    $data['car'] = $this->Page_model->rqa_promotion($jobID);
    $data['settings'] = $this->SettingsModel->get_mis_settings();

    $job = $this->Common->one_cond_row_select('hris_jobvacancy','jobID,sy,sign,ttype', 'jobID', $jobID);
    $data['sign'] = $this->Common->two_cond_row('hris_rqa_sign', 'fy', $job->sy, 'id', $job->sign);

    // Preload all applicants and staff
    $data['all_applicants'] = $this->Page_model->get_all_applicants_indexed(); // record_no => object
    $data['all_staff'] = $this->Page_model->get_all_staff_indexed(); // IDNumber => object

    $data['title'] = "COMPARATIVE ASSESSMENT RESULT FOR EXPANDED RECLASSIFICATION (CAReER)";
   
    

    $this->load->view('pages/' . $page, $data);

    ob_end_flush(); // Send output
}




    public function car()
    {
        $page = "car_rqa_form";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }

        $jobID = $this->uri->segment(3);
        $data['job'] = $this->Page_model->get_single_row_by_id('hris_jobvacancy', 'jobID', $jobID);
        $data['car'] = $this->Page_model->car($jobID);
        $data['settings'] = $this->SettingsModel->get_mis_settings();
        $job = $this->Common->one_cond_row('hris_jobvacancy', 'jobID', $jobID);
        $data['sign'] = $this->Common->two_cond_row('hris_rqa_sign', 'fy', $job->sy, 'stat', 0);

        $data['title'] = "COMPARATIVE ASSESSMENT RESULT (CAR)";

        $this->load->view('pages/' . $page, $data);
    }

    public function car_nlet()
    {
        $page = "car_rqa_form";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }

        $jobID = $this->uri->segment(3);
        $data['job'] = $this->Page_model->get_single_row_by_id('hris_jobvacancy', 'jobID', $jobID);
        $data['car'] = $this->Page_model->car_nlet($jobID);
        $job = $this->Common->one_cond_row('hris_jobvacancy', 'jobID', $jobID);
        $data['sign'] = $this->Common->two_cond_row('hris_rqa_sign', 'fy', $job->sy, 'stat', 0);
        $data['settings'] = $this->SettingsModel->get_mis_settings();

        $data['title'] = "COMPARATIVE ASSESSMENT RESULT - REGISTRY OF QUALIFIED APPLICANTS (CAR - RQA)";

        $this->load->view('pages/' . $page, $data);
    }

    public function rqa_specialization_print()
    {
        $page = "car_rqa_form_special";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }

        $jobID = $this->input->get('id');
        $spe = $this->input->get('spec');
        $data['job'] = $this->Page_model->get_single_row_by_id('hris_jobvacancy', 'jobID', $jobID);
        $data['car'] = $this->Page_model->rqa_specialization($jobID, $spe);

        $job = $this->Common->one_cond_row('hris_jobvacancy', 'jobID', $jobID);
        $data['sign'] = $this->Common->two_cond_row('hris_rqa_sign', 'fy', $job->sy, 'stat', 0);

        $data['title'] = "COMPARATIVE ASSESSMENT RESULT - REGISTRY OF QUALIFIED APPLICANTS (CAR - RQA)";

        $this->load->view('pages/' . $page, $data);
    }

    public function rqa_specialization_print1()
    {
        $page = "car_rqa_form_special_posting1";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }

        $jobID = $this->input->get('id');
        $spe = $this->input->get('spec');
        $data['job'] = $this->Page_model->get_single_row_by_id('hris_jobvacancy', 'jobID', $jobID);
        $data['car'] = $this->Page_model->rqa_specialization($jobID, $spe);

        $job = $this->Common->one_cond_row('hris_jobvacancy', 'jobID', $jobID);
        $data['sign'] = $this->Common->two_cond_row('hris_rqa_sign', 'fy', $job->sy, 'stat', 0);

        $data['title'] = "COMPARATIVE ASSESSMENT RESULT - REGISTRY OF QUALIFIED APPLICANTS (CAR - RQA)";

        $this->load->view('pages/' . $page, $data);
    }

    public function rqa_cluster()
    {
        $page = "rqacluster";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }
        $data['title'] = "COMPARATIVE ASSESSMENT RESULT-REGISTRY OF QUALIFIED APPLICANTS (CAR RQA)";

        $data['data'] = $this->Common->one_cond_group('hris_applications', 'jobID', $this->uri->segment(3), 'district');


        $this->load->view('templates/head');
        $this->load->view('templates/header');
        $this->load->view('pages/' . $page, $data);
        $this->load->view('templates/footer');
    }

    public function rqa_clusterv2()
    {
        $page = "rqaclusterv2";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }
        $data['title'] = "COMPARATIVE ASSESSMENT RESULT-REGISTRY OF QUALIFIED APPLICANTS (CAR RQA)";

        $data['data'] = $this->Common->one_cond_group('hris_applications', 'jobID', $this->uri->segment(3), 'district');


        $this->load->view('templates/head');
        $this->load->view('templates/header');
        $this->load->view('pages/' . $page, $data);
        $this->load->view('templates/footer');
    }


    public function rqa_cluster_jhs()
    {
        $page = "rqacluster_jhs";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }
        $data['title'] = "COMPARATIVE ASSESSMENT RESULT-REGISTRY OF QUALIFIED APPLICANTS (CAR RQA)";

        $data['data'] = $this->Page_model->cluster_jhs();


        $this->load->view('templates/head');
        $this->load->view('templates/header');
        $this->load->view('pages/' . $page, $data);
        $this->load->view('templates/footer');
    }
    public function rqa_cluster_jhsv2()
    {
        $page = "rqacluster_jhsv2";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }
        $data['title'] = "COMPARATIVE ASSESSMENT RESULT-REGISTRY OF QUALIFIED APPLICANTS (CAR RQA)";

        $data['data'] = $this->Page_model->cluster_jhs();


        $this->load->view('templates/head');
        $this->load->view('templates/header');
        $this->load->view('pages/' . $page, $data);
        $this->load->view('templates/footer');
    }

    public function rqa_cluster_shs()
    {
        $page = "rqacluster_shs";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }
        $data['title'] = "By Cluster";

        $data['data'] = $this->Page_model->cluster_shs();


        $this->load->view('templates/head');
        $this->load->view('templates/header');
        $this->load->view('pages/' . $page, $data);
        $this->load->view('templates/footer');
    }

    public function rqa_cluster_shs_mun()
    {
        $page = "rqacluster_shs_mun";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }
        $data['title'] = "By Cluster";

        $data['data'] = $this->Page_model->cluster_shs();


        $this->load->view('templates/head');
        $this->load->view('templates/header');
        $this->load->view('pages/' . $page, $data);
        $this->load->view('templates/footer');
    }
    
    public function rqa_cluster_shsv2()
    {
        $page = "rqacluster_shsv2";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }
        $data['title'] = "By Cluster";

        $data['data'] = $this->Page_model->cluster_shs();


        $this->load->view('templates/head');
        $this->load->view('templates/header');
        $this->load->view('pages/' . $page, $data);
        $this->load->view('templates/footer');
    }

   public function rqa_cluster_list()
{
    ob_start();

    $data['title'] = "COMPARATIVE ASSESSMENT RESULT-REGISTRY OF QUALIFIED APPLICANTS (CAR RQA)";
    $data['st'] = $this->input->get('district');

    $jobID = $this->uri->segment(3);
    $data['car'] = $this->Page_model->rqa_cluster($jobID, $data['st']);
    $data['job'] = $this->Page_model->get_single_row_by_id('hris_jobvacancy', 'jobID', $jobID);
    $job = $this->Common->one_cond_row('hris_jobvacancy', 'jobID', $jobID);
    $data['sign'] = $this->Common->two_cond_row('hris_rqa_sign', 'fy', $job->sy, 'stat', 0);
    $data['settings'] = $this->SettingsModel->get_mis_settings();

    $data['applicants'] = $this->Page_model->get_all_applicants_indexed();

    $this->load->view('pages/car_rqa_form_district', $data);

    ob_end_flush();
}

public function rqa_cluster_list_np()
{
    ob_start();

    $data['title'] = "COMPARATIVE ASSESSMENT RESULT-REGISTRY OF QUALIFIED APPLICANTS (CAR RQA)";
    $data['st'] = $this->input->get('district');

    $jobID = $this->uri->segment(3);
    $data['car'] = $this->Page_model->rqa_cluster($jobID, $data['st']);
    $data['job'] = $this->Page_model->get_single_row_by_id('hris_jobvacancy', 'jobID', $jobID);
    $job = $this->Common->one_cond_row('hris_jobvacancy', 'jobID', $jobID);
    $data['sign'] = $this->Common->two_cond_row('hris_rqa_sign', 'fy', $job->sy, 'stat', 0);
    $data['settings'] = $this->SettingsModel->get_mis_settings();

    $data['applicants'] = $this->Page_model->get_all_applicants_indexed();

    $this->load->view('pages/car_rqa_form_np', $data);

    ob_end_flush();
}

    public function job_vacancy_for_sds_only()
    {
        $data['title'] = "List of Job Vacancy";
        $data['data'] = $this->Common->one_cond('hris_jobvacancy', 'jvStatus', 'Open');
        $this->load->view('pages/job_list', $data);
    }

    public function rqa_clusterv3()
    {
        $page = "rqaclusterv3";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }
        $data['title'] = "COMPARATIVE ASSESSMENT RESULT-REGISTRY OF QUALIFIED APPLICANTS (CAR RQA)";

        $data['data'] = $this->Common->one_cond_group('hris_applications', 'jobID', $this->uri->segment(3), 'district');


        $this->load->view('pages/' . $page, $data);
    }

    public function rqa_cluster_jhsv3()
    {
        $page = "rqacluster_jhsv3";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }
        $data['title'] = "COMPARATIVE ASSESSMENT RESULT-REGISTRY OF QUALIFIED APPLICANTS (CAR RQA)";

        $data['data'] = $this->Page_model->cluster_jhs();


        $this->load->view('pages/' . $page, $data);
    }

    public function rqa_cluster_shsv3()
    {
        $page = "rqaclusterv4";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }
        $data['title'] = "By Cluster";

        $data['data'] = $this->Page_model->cluster_shs();


        $this->load->view('pages/' . $page, $data);
    }




    public function rqa_cluster_list_jhs()
    {
        $data['title'] = "COMPARATIVE ASSESSMENT RESULT-REGISTRY OF QUALIFIED APPLICANTS (CAR RQA)";
        $data['st'] = $this->input->get('s');

        $data['car'] = $this->Page_model->rqa_cluster_jhs($this->uri->segment(3), $this->input->get('s'));
        $data['job'] = $this->Page_model->get_single_row_by_id('hris_jobvacancy', 'jobID', $this->uri->segment(3));
        $job = $this->Common->one_cond_row('hris_jobvacancy', 'jobID', $this->uri->segment(3));
        $data['sign'] = $this->Common->two_cond_row('hris_rqa_sign', 'fy', $job->sy, 'stat', 0);
        $this->load->view('pages/car_rqa_form_jhs', $data);
    }

    public function rqa_cluster_list_jhsv2()
    {
        $data['title'] = "COMPARATIVE ASSESSMENT RESULT-REGISTRY OF QUALIFIED APPLICANTS (CAR RQA)";
        $data['st'] = $this->input->get('s');

        $data['car'] = $this->Page_model->rqa_cluster_jhs($this->uri->segment(3), $this->input->get('s'));
        $data['job'] = $this->Page_model->get_single_row_by_id('hris_jobvacancy', 'jobID', $this->uri->segment(3));
        $job = $this->Common->one_cond_row('hris_jobvacancy', 'jobID', $this->uri->segment(3));
        $data['sign'] = $this->Common->two_cond_row('hris_rqa_sign', 'fy', $job->sy, 'stat', 0);
                $data['settings'] = $this->SettingsModel->get_mis_settings();
        $this->load->view('pages/car_rqa_form_jhsv2', $data);
    }

    public function rqa_cluster_list_shs()
    {
        $data['title'] = "COMPARATIVE ASSESSMENT RESULT-REGISTRY OF QUALIFIED APPLICANTS (CAR RQA)";
        $data['st'] = $this->input->get('s');

        $data['car'] = $this->Page_model->rqa_cluster_shs($this->uri->segment(3), $this->input->get('s'));
        $data['job'] = $this->Page_model->get_single_row_by_id('hris_jobvacancy', 'jobID', $this->uri->segment(3));
        $job = $this->Common->one_cond_row('hris_jobvacancy', 'jobID', $this->uri->segment(3));
        $data['sign'] = $this->Common->two_cond_row('hris_rqa_sign', 'fy', $job->sy, 'stat', 0);
                $data['settings'] = $this->SettingsModel->get_mis_settings();
        $this->load->view('pages/car_rqa_form_jhs', $data);
    }

    public function rqa_cluster_list_shs_mun()
    {
        $data['title'] = "COMPARATIVE ASSESSMENT RESULT-REGISTRY OF QUALIFIED APPLICANTS (CAR RQA)";
        $data['st'] = $this->input->get('s');

        $data['car'] = $this->Page_model->rqa_cluster_shs_count_mun_print($this->uri->segment(3), $this->input->get('s'),$this->input->get('mun'));
        $data['job'] = $this->Page_model->get_single_row_by_id('hris_jobvacancy', 'jobID', $this->uri->segment(3));

        $job = $this->Common->one_cond_row_select('hris_jobvacancy','jobID,sy,sign', 'jobID', $this->uri->segment(3));
        $data['sign'] = $this->Common->two_cond_row('hris_rqa_sign', 'fy', $job->sy, 'id', $job->sign);
        
        $this->load->view('pages/car_rqa_form_jhs', $data);
    }

    public function rqa_cluster_list_shsv2()
    {
        $data['title'] = "COMPARATIVE ASSESSMENT RESULT-REGISTRY OF QUALIFIED APPLICANTS (CAR RQA)";
        $data['st'] = $this->input->get('s');

        $data['car'] = $this->Page_model->rqa_cluster_shs($this->uri->segment(3), $this->input->get('s'));
        $data['job'] = $this->Page_model->get_single_row_by_id('hris_jobvacancy', 'jobID', $this->uri->segment(3));
        $job = $this->Common->one_cond_row('hris_jobvacancy', 'jobID', $this->uri->segment(3));
        $data['sign'] = $this->Common->two_cond_row('hris_rqa_sign', 'fy', $job->sy, 'stat', 0);
                $data['settings'] = $this->SettingsModel->get_mis_settings();
        $this->load->view('pages/car_rqa_form_jhsv2', $data);
    }


  public function rqa_municipality_print()
{
    ob_start(); // Stream output to avoid timeout

    $page = "car_rqa_form_special2";
    if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
        show_404();
    }

    $jobID = $this->input->get('id');
    $mun = $this->input->get('mun');

    $data['job'] = $this->Page_model->get_single_row_by_id('hris_jobvacancy', 'jobID', $jobID);
    $data['car'] = $this->Page_model->rqa_mun($jobID, $mun);
    $data['settings'] = $this->SettingsModel->get_mis_settings();

    $job = $this->Common->one_cond_row_select('hris_jobvacancy','jobID,sy,sign', 'jobID', $jobID);
    $data['sign'] = $this->Common->two_cond_row('hris_rqa_sign', 'fy', $job->sy, 'id', $job->sign);

    // Preload applicants and staff
    $data['applicants'] = $this->Page_model->get_all_applicants_indexed();
    $data['staff'] = $this->Page_model->get_all_staff_indexed();

    $data['title'] = "COMPARATIVE ASSESSMENT RESULT - REGISTRY OF QUALIFIED APPLICANTS (CAR - RQA)";

    $this->load->view('pages/' . $page, $data);

    ob_end_flush();
}

public function rqa_municipality_print_jhs()
{
    ob_start(); // Stream output to avoid timeout

    $page = "car_rqa_form_special_jhs";
    if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
        show_404();
    }

    $jobID = $this->input->get('id');
    $mun = $this->input->get('mun');

    $data['job'] = $this->Page_model->get_single_row_by_id('hris_jobvacancy', 'jobID', $jobID);
    $data['settings'] = $this->SettingsModel->get_mis_settings();

    $data['grouped_applicants'] = $this->Reg->get_grouped_applicants_by_job($jobID,$mun);

    $job = $this->Common->one_cond_row_select('hris_jobvacancy','jobID,sy,sign', 'jobID', $jobID);
    $data['sign'] = $this->Common->two_cond_row('hris_rqa_sign', 'fy', $job->sy, 'id', $job->sign);

    // Preload applicants and staff
    $data['applicants'] = $this->Page_model->get_all_applicants_indexed();
    $data['staff'] = $this->Page_model->get_all_staff_indexed();

    $data['title'] = "COMPARATIVE ASSESSMENT RESULT (CAR)";

    $this->load->view('pages/' . $page, $data);

    ob_end_flush();
}

public function car_rqa_administrative_mun()
{
    ob_start(); // Stream output to avoid timeout

    $page = "car_rqa_form_administrative_mun";
    if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
        show_404();
    }

    $jobID = $this->uri->segment(3);
    //$mun = $this->input->get('mun');

    $data['job'] = $this->Page_model->get_single_row_by_id('hris_jobvacancy', 'jobID', $jobID);
    $data['settings'] = $this->SettingsModel->get_mis_settings();

    $data['grouped_applicants'] = $this->Reg->get_grouped_applicants_by_mun($jobID);

    $job = $this->Common->one_cond_row_select('hris_jobvacancy','jobID,sy,sign,ttype', 'jobID', $jobID);
    $data['sign'] = $this->Common->two_cond_row('hris_rqa_sign', 'fy', $job->sy, 'id', $job->sign);

    // Preload applicants and staff
    $data['applicants'] = $this->Page_model->get_all_applicants_indexed();
    $data['staff'] = $this->Page_model->get_all_staff_indexed();

    if($job->ttype == 1){
        $data['title'] = "COMPARATIVE ASSESSMENT RESULT FOR EXPANDED RECLASSIFICATION (CAReER)";
    }else{
       $data['title'] = "COMPARATIVE ASSESSMENT RESULT (CAR)";
    }

    $this->load->view('pages/' . $page, $data);

    ob_end_flush();
}

public function rqa_municipality_print_shs()
{
    ob_start(); // Stream output to avoid timeout

    $page = "car_rqa_form_special_shs";
    if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
        show_404();
    }

    $jobID = $this->input->get('id');
    $mun = $this->input->get('mun');

    $data['job'] = $this->Page_model->get_single_row_by_id('hris_jobvacancy', 'jobID', $jobID);
    $data['settings'] = $this->SettingsModel->get_mis_settings();

    $data['grouped_applicants'] = $this->Reg->get_grouped_applicants_by_shss($jobID,$mun);

    $job = $this->Common->one_cond_row_select('hris_jobvacancy','jobID,sy,sign', 'jobID', $jobID);
    $data['sign'] = $this->Common->two_cond_row('hris_rqa_sign', 'fy', $job->sy, 'id', $job->sign);

    // Preload applicants and staff
    $data['applicants'] = $this->Page_model->get_all_applicants_indexed();
    $data['staff'] = $this->Page_model->get_all_staff_indexed();

    $data['title'] = "COMPARATIVE ASSESSMENT RESULT - REGISTRY OF QUALIFIED APPLICANTS (CAR - RQA)";

    $this->load->view('pages/' . $page, $data);

    ob_end_flush();
}


   public function rqa_municipality_post()
{
    ob_start();

    $page = "car_rqa_form_special2_posting";
    if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
        show_404();
    }

    $jobID = $this->input->get('id');
    $mun = $this->input->get('mun');

    $data['job'] = $this->Page_model->get_single_row_by_id('hris_jobvacancy', 'jobID', $jobID);
    $data['car'] = $this->Page_model->rqa_mun($jobID, $mun);

    $job = $this->Common->one_cond_row_select('hris_jobvacancy','jobID,sy,sign', 'jobID', $jobID);
    $data['sign'] = $this->Common->two_cond_row('hris_rqa_sign', 'fy', $job->sy, 'id', $job->sign);
    $data['settings'] = $this->SettingsModel->get_mis_settings();


    $data['applicants'] = $this->Page_model->get_all_applicants_indexed();
    $data['staff'] = $this->Page_model->get_all_staff_indexed();

    $data['title'] = "COMPARATIVE ASSESSMENT RESULT - REGISTRY OF QUALIFIED APPLICANTS (CAR - RQA)";

    $this->load->view('pages/' . $page, $data);

    ob_end_flush();
}

    public function rqa_municipality_track()
    {
        $page = "car_rqa_form_special3";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }

        $jobID = $this->input->get('id');
        $mun = $this->input->get('mun');
        $spec = $this->input->get('spec');
        $data['job'] = $this->Page_model->get_single_row_by_id('hris_jobvacancy', 'jobID', $jobID);
        $data['car'] = $this->Page_model->rqa_mun_track($jobID, $mun, $spec);

        $job = $this->Common->one_cond_row('hris_jobvacancy', 'jobID', $jobID);
        $data['sign'] = $this->Common->two_cond_row('hris_rqa_sign', 'fy', $job->sy, 'stat', 0);

        $data['title'] = "COMPARATIVE ASSESSMENT RESULT - REGISTRY OF QUALIFIED APPLICANTS (CAR - RQA)";

        $this->load->view('pages/' . $page, $data);
    }

    public function rqa_municipality_spec()
    {
        $page = "car_rqa_form_special3";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }

        $jobID = $this->input->get('id');
        $mun = $this->input->get('mun');
        $spec = $this->input->get('spec');
        $data['job'] = $this->Page_model->get_single_row_by_id('hris_jobvacancy', 'jobID', $jobID);
        $data['car'] = $this->Page_model->rqa_mun_spec($jobID, $mun, $spec);
        $job = $this->Common->one_cond_row('hris_jobvacancy', 'jobID', $jobID);
        $data['sign'] = $this->Common->two_cond_row('hris_rqa_sign', 'fy', $job->sy, 'stat', 0);

        $data['title'] = "COMPARATIVE ASSESSMENT RESULT - REGISTRY OF QUALIFIED APPLICANTS (CAR - RQA)";

        $this->load->view('pages/' . $page, $data);
    }


    public function rqa_track_print()
    {
        $page = "car_rqa_form_special";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }

        $jobID = $this->input->get('id');
        $spe = $this->input->get('spec');
        $data['job'] = $this->Page_model->get_single_row_by_id('hris_jobvacancy', 'jobID', $jobID);
        $data['car'] = $this->Page_model->rqa_track($jobID, $spe);

        $job = $this->Common->one_cond_row('hris_jobvacancy', 'jobID', $jobID);
        $data['sign'] = $this->Common->two_cond_row('hris_rqa_sign', 'fy', $job->sy, 'stat', 0);

        $data['title'] = "COMPARATIVE ASSESSMENT RESULT - REGISTRY OF QUALIFIED APPLICANTS (CAR - RQA)";

        $this->load->view('pages/' . $page, $data);
    }

    public function rqa_track_print1()
    {
        $page = "car_rqa_form_special_posting";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }

        $jobID = $this->input->get('id');
        $spe = $this->input->get('spec');
        $data['job'] = $this->Page_model->get_single_row_by_id('hris_jobvacancy', 'jobID', $jobID);
        $data['car'] = $this->Page_model->rqa_track($jobID, $spe);

        $job = $this->Common->one_cond_row('hris_jobvacancy', 'jobID', $jobID);
        $data['sign'] = $this->Common->two_cond_row('hris_rqa_sign', 'fy', $job->sy, 'stat', 0);

        $data['title'] = "COMPARATIVE ASSESSMENT RESULT - REGISTRY OF QUALIFIED APPLICANTS (CAR - RQA)";

        $this->load->view('pages/' . $page, $data);
    }

    function schools()
    {
        $type = $this->input->get('type');
        $result['data'] = $this->Page_model->schools($type);
        $this->load->view('schools', $result);
    }

    // renren new code please don't touch

    public function ma($param)
    {
        $jobvacancy = $this->Common->one_cond_row('hris_jobvacancy', 'jobID', $this->uri->segment(4));

        if ($jobvacancy->position == 1) {
            if($jobvacancy->promotion == 0){
                $page = "rp";
            }else{
                $page = "rp_reg_promotion";
            }
        }elseif($jobvacancy->position == 5){
            $page = "rp_reg_promotion";
        } else {
            $page = "rp_reg_none";
        }


        if ($this->session->position == 'reg' || $this->session->position == 'user') {
            if ($this->session->c_id != $this->uri->segment(3)) {
                redirect(base_url());
            }
        }



        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }

        // if($this->session->position == 'reg'){
        //     $data['data'] = $this->Common->one_cond_row('hris_applicant', 'id', $param);
        // }else{

        //     $data['data'] = $this->Common->one_cond_row('hris_staff', 'IDNumber', $param);
        // }  


        $data['staff'] = $this->Common->one_cond_row('hris_applicant', 'id', $this->uri->segment(3));
        $data['user'] = $this->Common->one_cond_row('users', 'user_id', $param);


        $this->load->view('templates/head');
        $this->load->view('templates/header');
        $this->load->view('pages/' . $page, $data);
        $this->load->view('templates/footer');
    }

    public function ma_staff($param)
    {
        $jobvacancy = $this->Common->one_cond_row('hris_jobvacancy', 'jobID', $this->uri->segment(4));

        if ($jobvacancy->position == 1) {
            if($jobvacancy->promotion == 0){
                $page = "rp_staff";
            }else{
                $page = "rp_staff_promotion";
            }
        }elseif($jobvacancy->position == 5){
            $page = "rp_staff_promotion";
        } else {
            $page = "rp_none";
        }

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }


        $data['staff'] = $this->Common->one_cond_row('hris_staff', 'IDNumber', $this->uri->segment(3));

        $data['data'] = $this->Common->one_cond_row('hris_applications', 'empEmail', $param);




        $data['user'] = $this->Common->one_cond_row('users', 'user_id', $param);


        $this->load->view('templates/head');
        $this->load->view('templates/header');
        $this->load->view('pages/' . $page, $data);
        $this->load->view('templates/footer');
    }

    public function rate_applicant($param)
    {

        $page = "rp";


        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }


        $data['data'] = $this->Common->one_cond_row('hris_applicant', 'id', $param);
        $data['user'] = $this->Common->one_cond_row('users', 'user_id', $param);


        $this->load->view('templates/head');
        $this->load->view('templates/header');
        $this->load->view('pages/' . $page, $data);
        $this->load->view('templates/footer');
    }

    public function update_educ()
    {
        $this->Reg->educ_update();
        $this->session->set_flashdata('success', 'Successfuly Saved');
        if ($this->session->position == 'asds') {
            redirect(base_url() . 'pages/ma/' . $this->input->post('id') . '/' . $this->input->post('jobID') . '/' . $this->input->post('school_id') . '#efile');
        } else {
            redirect(base_url() . 'pages/ma/' . $this->session->c_id . '/' . $this->input->post('jobID') . '/' . $this->input->post('school_id') . '#efile');
        }
    }

    public function update_educ_staff()
    {
        $this->Reg->educ_update_staff();
        $this->session->set_flashdata('success', 'Successfuly Saved');
        if ($this->session->position == 'asds') {
            redirect(base_url() . 'pages/ma_staff/' . $this->input->post('id') . '/' . $this->input->post('jobID') . '/' . $this->input->post('school_id') . '#efile');
        } else {
            redirect(base_url() . 'pages/ma_staff/' . $this->session->c_id . '/' . $this->input->post('jobID') . '/' . $this->input->post('school_id') . '#efile');
        }
    }

    public function update_ai()
    {
        $this->Reg->ai_update();
        $this->Reg->ai_sex_update();
        $this->session->set_flashdata('success', 'Successfuly Saved');
        if ($this->session->position == 'asds') {
            redirect(base_url() . 'pages/ma/' . $this->input->post('id') . '/' . $this->input->post('jobID') . '/' . $this->input->post('school_id'));
        } else {
            redirect(base_url() . 'pages/ma/' . $this->session->c_id . '/' . $this->input->post('jobID') . '/' . $this->input->post('school_id'));
        }
    }

    public function update_ai_staff()
    {
        $this->Reg->ai_update_staff();
        $this->Reg->ai_sex_update();
        $this->session->set_flashdata('success', 'Successfuly Saved');
        if ($this->session->position == 'asds') {
            redirect(base_url() . 'pages/ma_staff/' . $this->input->post('id') . '/' . $this->input->post('jobID') . '/' . $this->input->post('school_id'));
        } else {
            redirect(base_url() . 'pages/ma_staff/' . $this->session->c_id . '/' . $this->input->post('jobID') . '/' . $this->input->post('school_id'));
        }
    }

    public function update_lr()
    {
        $this->Reg->lr_update();
        $this->session->set_flashdata('success', 'Successfuly Saved');
        redirect(base_url() . 'pages/ma/' . $this->session->c_id . '/' . $this->input->post('jobID') . '/' . $this->input->post('school_id') . '#lr');
    }

    public function update_lr_staff()
    {
        $this->Reg->lr_update_staff();
        $this->session->set_flashdata('success', 'Successfuly Saved');
        redirect(base_url() . 'pages/ma_staff/' . $this->session->c_id . '/' . $this->input->post('jobID') . '/' . $this->input->post('school_id') . '#lr');
    }

    public function update_ept()
    {
        $this->Reg->ept_update();
        $this->session->set_flashdata('success', 'Successfuly Saved');
        redirect(base_url() . 'pages/ma/' . $this->session->c_id . '/' . $this->input->post('jobID') . '/' . $this->input->post('school_id') . '#ept');
    }

    public function update_tc()
    {
        $this->Reg->tc_update();
        $this->session->set_flashdata('success', 'Successfuly Saved');
        redirect(base_url() . 'pages/ma/' . $this->session->c_id . '/' . $this->input->post('jobID') . '/' . $this->input->post('school_id') . '#tsc');
    }

    public function update_tc_staff()
    {
        $this->Reg->tc_update_staff();
        $this->session->set_flashdata('success', 'Successfuly Saved');
        redirect(base_url() . 'pages/ma_staff/' . $this->session->c_id . '/' . $this->input->post('jobID') . '/' . $this->input->post('school_id') . '#tsc');
    }

    public function update_master_file() {
        $config['allowed_types'] = 'pdf';
        $config['upload_path'] = './uploads/regfile';
        $new_name = time().'efile'.$this->input->post('id').$_FILES["file"]['name'];
        $config['file_name'] = $new_name;
        $this->load->library('upload', $config);
    
        if ($this->upload->do_upload('file')) {
            $id = $this->input->post('id');
            $empEmail = $this->input->post('empEmail');
            $jobID = $this->input->post('jobID');
            $reg = $this->Common->one_cond_row('hris_applicant', 'empEmail', $empEmail);
            
            if (!empty($reg->master_file)) {
                unlink("uploads/regfile/" . $reg->master_file);
            }
            
            $this->Reg->master_file_update();
            $this->session->set_flashdata('success', 'Successfully updated.');
        } else {
            $this->session->set_flashdata('danger', $this->upload->display_errors());
        }
        
        redirect(base_url() . 'pages/ma/' . $this->session->userdata('c_id') . '/' . $this->input->post('jobID') . '/' . $this->input->post('school_id') . '#lr');
    }

    public function update_doctor_file() {
        $config['allowed_types'] = 'pdf';
        $config['upload_path'] = './uploads/regfile';
        $new_name = $this->input->post('id').'efile'.time().$_FILES["file"]['name'];
        $config['file_name'] = $new_name;
        $this->load->library('upload', $config);
    
        if ($this->upload->do_upload('file')) {
            $id = $this->input->post('id');
            $empEmail = $this->input->post('empEmail');
            $jobID = $this->input->post('jobID');
            $reg = $this->Common->one_cond_row('hris_applicant', 'empEmail', $empEmail);
            
            if (!empty($reg->doctor_file)) {
                unlink("uploads/regfile/" . $reg->doctor_file);
            }
            
            $this->Reg->doctor_file_update();
            $this->session->set_flashdata('success', 'Successfully updated.');
        } else {
            $this->session->set_flashdata('danger', $this->upload->display_errors());
        }
        
        redirect(base_url() . 'pages/ma/' . $this->session->userdata('c_id') . '/' . $this->input->post('jobID') . '/' . $this->input->post('school_id') . '#lr');
    }

    public function update_efile() {
        $config['allowed_types'] = 'pdf';
        $config['upload_path'] = './uploads/regfile';
        $new_name = time().'efile'.$this->input->post('id').$_FILES["file"]['name'];
        $config['file_name'] = $new_name;
        $this->load->library('upload', $config);
    
        if ($this->upload->do_upload('file')) {
            $id = $this->input->post('id');
            $empEmail = $this->input->post('empEmail');
            $jobID = $this->input->post('jobID');
            $reg = $this->Common->one_cond_row('hris_applicant', 'empEmail', $empEmail);
            
            if (!empty($reg->efile)) {
                unlink("uploads/regfile/" . $reg->efile);
            }
            
            $this->Reg->educfile_update();
            $this->session->set_flashdata('success', 'Successfully updated.');
        } else {
            $this->session->set_flashdata('danger', $this->upload->display_errors());
        }
        
        redirect(base_url() . 'pages/ma/' . $this->session->userdata('c_id') . '/' . $this->input->post('jobID') . '/' . $this->input->post('school_id') . '#lr');
    }

    public function update_master_staff() {
        $config['allowed_types'] = 'pdf';
        $config['upload_path'] = './uploads/regfile';
        $new_name = time().'efile'.$this->input->post('id').$_FILES["file"]['name'];
        $config['file_name'] = $new_name;
        $this->load->library('upload', $config);
    
        if ($this->upload->do_upload('file')) {
            $id = $this->input->post('id');
            $empEmail = $this->input->post('empEmail');
            $jobID = $this->input->post('jobID');
            $reg = $this->Common->one_cond_row('hris_staff', 'IDNumber', $id);
            
            if (!empty($reg->master_file)) {
                unlink("uploads/regfile/" . $reg->master_file);
            }
            
            $this->Reg->master_update_staff();
            $this->session->set_flashdata('success', 'Successfully updated.');
        } else {
            $this->session->set_flashdata('danger', $this->upload->display_errors());
        }
        
        redirect(base_url() . 'pages/ma_staff/' . $this->session->userdata('c_id') . '/' . $this->input->post('jobID') . '/' . $this->input->post('school_id') . '#lr');
    }

    public function update_doctor_staff() {
        $config['allowed_types'] = 'pdf';
        $config['upload_path'] = './uploads/regfile';
        $new_name = time().'efile'.$this->input->post('id').$_FILES["file"]['name'];
        $config['file_name'] = $new_name;
        $this->load->library('upload', $config);
    
        if ($this->upload->do_upload('file')) {
            $id = $this->input->post('id');
            $empEmail = $this->input->post('empEmail');
            $jobID = $this->input->post('jobID');
            $reg = $this->Common->one_cond_row('hris_staff', 'IDNumber', $id);
            
            if (!empty($reg->doctor_file)) {
                unlink("uploads/regfile/" . $reg->doctor_file);
            }
            
            $this->Reg->doctor_update_staff();
            $this->session->set_flashdata('success', 'Successfully updated.');
        } else {
            $this->session->set_flashdata('danger', $this->upload->display_errors());
        }
        
        redirect(base_url() . 'pages/ma_staff/' . $this->session->userdata('c_id') . '/' . $this->input->post('jobID') . '/' . $this->input->post('school_id') . '#lr');
    }
    
    
      public function update_efile_staff() {
        $config['allowed_types'] = 'pdf';
        $config['upload_path'] = './uploads/regfile';
        $new_name = time().'efile'.$this->input->post('id').$_FILES["file"]['name'];
        $config['file_name'] = $new_name;
        $this->load->library('upload', $config);
    
        if ($this->upload->do_upload('file')) {
            $id = $this->input->post('id');
            $empEmail = $this->input->post('empEmail');
            $jobID = $this->input->post('jobID');
            $reg = $this->Common->one_cond_row('hris_staff', 'IDNumber', $id);
            
            if (!empty($reg->efile)) {
                unlink("uploads/regfile/" . $reg->efile);
            }
            
            $this->Reg->educfile_update_staff();
            $this->session->set_flashdata('success', 'Successfully updated.');
        } else {
            $this->session->set_flashdata('danger', $this->upload->display_errors());
        }
        
        redirect(base_url() . 'pages/ma_staff/' . $this->session->userdata('c_id') . '/' . $this->input->post('jobID') . '/' . $this->input->post('school_id') . '#lr');
    }
    
    public function update_outfile_staff()
    {
        $config['allowed_types'] = 'pdf';
        $config['upload_path'] = './uploads/regfile';
        $new_name = $this->input->post('id') . 'outfile' . time() .  $_FILES["file"]['name'];
        $config['file_name'] = $new_name;
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file')) {
            $id = $this->input->post('id');
            $empEmail = $this->input->post('empEmail');
            $jobID = $this->input->post('jobID');
            $reg = $this->Common->one_cond_row('hris_staff', 'IDNumber', $id);
            if (!empty($reg->efile)) {
            unlink("uploads/regfile/" . $reg->efile);
            }
            $this->Reg->outfile_update_staff();
            $this->session->set_flashdata('success', 'Successfully updated.');
            redirect(base_url() . 'pages/ma_staff/' . $this->session->c_id . '/' . $this->input->post('jobID') . '/' . $this->input->post('school_id') . '#lr');
        } else {
            $this->session->set_flashdata('danger', $this->upload->display_errors());
            redirect(base_url() . 'pages/ma_staff/' . $this->session->c_id);
        }
    }

    public function update_aefile_staff()
    {
        $config['allowed_types'] = 'pdf';
        $config['upload_path'] = './uploads/regfile';
        $new_name = $this->input->post('id'). 'aefile' . time()  .  $_FILES["file"]['name'];
        $config['file_name'] = $new_name;
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file')) {
            $id = $this->input->post('id');
            $empEmail = $this->input->post('empEmail');
            $jobID = $this->input->post('jobID');
            $reg = $this->Common->one_cond_row('hris_staff', 'IDNumber', $id);

            if (!empty($reg->eafile)) {
            unlink("uploads/regfile/" . $reg->eafile);
            }
            
            $this->Reg->aefile_update_staff();
            $this->session->set_flashdata('success', 'Successfully updated.');
            redirect(base_url() . 'pages/ma_staff/' . $this->session->c_id . '/' . $this->input->post('jobID') . '/' . $this->input->post('school_id') . '#lr');
        } else {
            $this->session->set_flashdata('danger', $this->upload->display_errors());
            redirect(base_url() . 'pages/ma_staff/' . $this->session->c_id);
        }
    }

    public function update_aefile()
    {
        $config['allowed_types'] = 'pdf';
        $config['upload_path'] = './uploads/regfile';
        $new_name = $this->input->post('id') . 'aefile' . time() .  $_FILES["file"]['name'];
        $config['file_name'] = $new_name;
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file')) {
            $id = $this->input->post('id');
            $empEmail = $this->input->post('empEmail');
            $jobID = $this->input->post('jobID');
            $reg = $this->Common->one_cond_row('hris_applicant', 'empEmail', $empEmail);
            if (!empty($reg->ae)) {
            unlink("uploads/regfile/" . $reg->ae);
            }
            $this->Reg->aefile_update();
            $this->session->set_flashdata('success', 'Successfully updated.');
            redirect(base_url() . 'pages/ma/' . $this->session->c_id . '/' . $this->input->post('jobID') . '/' . $this->input->post('school_id') . '#lr');
        } else {
            $this->session->set_flashdata('danger', $this->upload->display_errors());
            redirect(base_url() . 'pages/ma/' . $this->session->c_id);
        }
    }

    public function update_aldfile_staff()
    {
        $config['allowed_types'] = 'pdf';
        $config['upload_path'] = './uploads/regfile';
        $new_name = $this->input->post('id') . 'aldfile' . time()   . $_FILES["file"]['name'];
        $config['file_name'] = $new_name;
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file')) {
            $id = $this->input->post('id');
            $empEmail = $this->input->post('empEmail');
            $jobID = $this->input->post('jobID');
            $reg = $this->Common->one_cond_row('hris_staff', 'IDNumber', $id);
            if (!empty($reg->aldfile)) {
            unlink("uploads/regfile/" . $reg->aldfile);
            }
            $this->Reg->aldfile_update_staff();
            $this->session->set_flashdata('success', 'Successfully updated.');
            redirect(base_url() . 'pages/ma_staff/' . $this->session->c_id . '/' . $this->input->post('jobID') . '/' . $this->input->post('school_id') . '#lr');
        } else {
            $this->session->set_flashdata('danger', $this->upload->display_errors());
            redirect(base_url() . 'pages/ma_staff/' . $this->session->c_id);
        }
    }

    public function update_aldfile()
    {
        $config['allowed_types'] = 'pdf';
        $config['upload_path'] = './uploads/regfile';
        $new_name = $this->input->post('id') . 'aldfile'. time() . $_FILES["file"]['name'];
        $config['file_name'] = $new_name;
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file')) {
            $id = $this->input->post('id');
            $empEmail = $this->input->post('empEmail');
            $jobID = $this->input->post('jobID');
            $reg = $this->Common->one_cond_row('hris_staff', 'IDNumber', $id);
            if (!empty($reg->efile)) {
            unlink("uploads/regfile/" . $reg->efile);
            }
            $this->Reg->aldfile_update();
            $this->session->set_flashdata('success', 'Successfully updated.');
            redirect(base_url() . 'pages/ma/' . $this->session->c_id . '/' . $this->input->post('jobID') . '/' . $this->input->post('school_id') . '#er');
        } else {
            $this->session->set_flashdata('danger', $this->upload->display_errors());
            redirect(base_url() . 'pages/ma/' . $this->session->c_id);
        }
    }

    public function update_efile_staff_none()
    {
        $config['allowed_types'] = 'pdf';
        $config['upload_path'] = './uploads/regfile';
        $new_name = time() . 'torcav' . $this->input->post('id') . $_FILES["file"]['name'];
        $config['file_name'] = $new_name;
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file')) {
            $id = $this->input->post('id');
            $empEmail = $this->input->post('empEmail');
            $jobID = $this->input->post('jobID');
            $reg = $this->Common->one_cond_row('hris_staff', 'IDNumber', $id);
            unlink("uploads/regfile/" . $reg->tor_cav);
            $this->Reg->educfile_update_staff_none();
            $this->session->set_flashdata('success', 'Successfully updated.');
            redirect(base_url() . 'pages/ma_staff/' . $this->session->c_id . '/' . $this->input->post('jobID') . '/' . $this->input->post('school_id') . '#lr');
        } else {
            $this->session->set_flashdata('danger', $this->upload->display_errors());
            redirect(base_url() . 'pages/ma_staff/' . $this->session->c_id);
        }
    }

    public function update_efile_none()
    {
        $config['allowed_types'] = 'pdf';
        $config['upload_path'] = './uploads/regfile';
        $new_name = time() . 'torcav' . $this->input->post('id') . $_FILES["file"]['name'];
        $config['file_name'] = $new_name;
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file')) {
            $id = $this->input->post('id');
            $empEmail = $this->input->post('empEmail');
            $jobID = $this->input->post('jobID');
            $reg = $this->Common->one_cond_row('hris_applicant', 'empEmail', $empEmail);
            if (!empty($reg->tor_cav)) {
            unlink("uploads/regfile/" . $reg->tor_cav);
            }
            $this->Reg->educfile_update_none();
            $this->session->set_flashdata('success', 'Successfully updated.');
            redirect(base_url() . 'pages/ma/' . $this->session->c_id . '/' . $this->input->post('jobID') . '/' . $this->input->post('school_id') . '#lr');
        } else {
            $this->session->set_flashdata('danger', $this->upload->display_errors());
            redirect(base_url() . 'pages/ma/' . $this->session->c_id);
        }
    }

    public function update_wefile() {
        $config['allowed_types'] = 'pdf';
        $config['upload_path'] = './uploads/regfile';
        $new_name = time().'wefile'.$this->input->post('id').$_FILES["file"]['name'];
        $config['file_name'] = $new_name;
        $this->load->library('upload', $config);
    
        if ($this->upload->do_upload('file')) {
            $id = $this->input->post('id');
            $empEmail = $this->input->post('empEmail');
            $jobID = $this->input->post('jobID');
            $reg = $this->Common->one_cond_row('hris_applicant', 'empEmail', $empEmail);
            
            if (!empty($reg->wefile)) {
                unlink("uploads/regfile/" . $reg->wefile);
            }
            
            $this->Reg->wefile_update();
            $this->session->set_flashdata('success', 'Successfully updated.');
        } else {
            $this->session->set_flashdata('danger', $this->upload->display_errors());
        }
        
        redirect(base_url() . 'pages/ma/' . $this->session->userdata('c_id') . '/' . $this->input->post('jobID') . '/' . $this->input->post('school_id') . '#lr');
    }
    
     public function update_wefile_staff() {
        $config['allowed_types'] = 'pdf';
        $config['upload_path'] = './uploads/regfile';
        $new_name = time().'wefile'.$this->input->post('id').$_FILES["file"]['name'];
        $config['file_name'] = $new_name;
        $this->load->library('upload', $config);
    
        if ($this->upload->do_upload('file')) {
            $id = $this->input->post('id');
            $empEmail = $this->input->post('empEmail');
            $jobID = $this->input->post('jobID');
            $reg = $this->Common->one_cond_row('hris_staff', 'IDNumber', $id);
            
            if (!empty($reg->wefile)) {
                unlink("uploads/regfile/" . $reg->wefile);
            }
            
            $this->Reg->wefile_update_staff();
            $this->session->set_flashdata('success', 'Successfully updated.');
        } else {
            $this->session->set_flashdata('danger', $this->upload->display_errors());
        }
        
        redirect(base_url() . 'pages/ma_staff/' . $this->session->userdata('c_id') . '/' . $this->input->post('jobID') . '/' . $this->input->post('school_id') . '#lr');
    }

    
    public function update_eligibility_staff()
    {
        $config['allowed_types'] = 'pdf';
        $config['upload_path'] = './uploads/regfile';
        $new_name = time() . 'eligibility' . $this->input->post('id') . $_FILES["file"]['name'];
        $config['file_name'] = $new_name;
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file')) {
            $id = $this->input->post('id');
            $empEmail = $this->input->post('empEmail');
            $jobID = $this->input->post('jobID');
            $reg = $this->Common->one_cond_row('hris_staff', 'IDNumber', $id);
            if (!empty($reg->eligibility)) {
            unlink("uploads/regfile/" . $reg->eligibility);
            }
            $this->Reg->eligibility_update_staff();
            $this->session->set_flashdata('success', 'Successfully updated.');
            redirect(base_url() . 'pages/ma_staff/' . $this->session->c_id . '/' . $this->input->post('jobID') . '/' . $this->input->post('school_id') . '#lr');
        } else {
            $this->session->set_flashdata('danger', $this->upload->display_errors());
            redirect(base_url() . 'pages/ma_staff/' . $this->session->c_id);
        }
    }

    public function update_eligibility()
    {
        $config['allowed_types'] = 'pdf';
        $config['upload_path'] = './uploads/regfile';
        
        $new_name = time() . 'eligibility' . $this->input->post('id') . $_FILES["file"]['name'];
        $config['file_name'] = $new_name;
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file')) {
            $id = $this->input->post('id');
            $empEmail = $this->input->post('empEmail');
            $jobID = $this->input->post('jobID');
            $reg = $this->Common->one_cond_row('hris_applicant', 'empEmail', $empEmail);
            if (!empty($reg->wefile)) {
            unlink("uploads/regfile/" . $reg->wefile);
            }
            $this->Reg->eligibility_update();
            $this->session->set_flashdata('success', 'Successfully updated.');
            redirect(base_url() . 'pages/ma/' . $this->session->c_id . '/' . $this->input->post('jobID') . '/' . $this->input->post('school_id') . '#lr');
        } else {
            $this->session->set_flashdata('danger', $this->upload->display_errors());
            redirect(base_url() . 'pages/ma/' . $this->session->c_id);
        }
    }

    
  public function update_letfile() {
    $config['allowed_types'] = 'pdf';
    $config['upload_path'] = './uploads/regfile';
    $new_name = time().'letfile'.$this->input->post('id').$_FILES["file"]['name'];
    $config['file_name'] = $new_name;
    $this->load->library('upload', $config);

    if ($this->upload->do_upload('file')) {
        $id = $this->input->post('id');
        $empEmail = $this->input->post('empEmail');
        $jobID = $this->input->post('jobID');
        $reg = $this->Common->one_cond_row('hris_applicant', 'empEmail', $empEmail);
        
        if (!empty($reg->letfile)) {
            unlink("uploads/regfile/" . $reg->letfile);
        }
        
        $this->Reg->letfile_update();
        $this->session->set_flashdata('success', 'Successfully updated.');
    } else {
        $this->session->set_flashdata('danger', $this->upload->display_errors());
    }
    
    redirect(base_url() . 'pages/ma/' . $this->session->userdata('c_id') . '/' . $this->input->post('jobID') . '/' . $this->input->post('school_id') . '#lr');
}
   public function update_letfile_staff() {
    $config['allowed_types'] = 'pdf';
    $config['upload_path'] = './uploads/regfile';
    $new_name = time().'letfile'.$this->input->post('id').$_FILES["file"]['name'];
    $config['file_name'] = $new_name;
    $this->load->library('upload', $config);

    if ($this->upload->do_upload('file')) {
        $id = $this->input->post('id');
        $empEmail = $this->input->post('empEmail');
        $jobID = $this->input->post('jobID');
        $reg = $this->Common->one_cond_row('hris_staff', 'IDNumber', $id);
        
        if (!empty($reg->letfile)) {
            unlink("uploads/regfile/" . $reg->letfile);
        }
        
        $this->Reg->letfile_update_staff();
        $this->session->set_flashdata('success', 'Successfully updated.');
    } else {
        $this->session->set_flashdata('danger', $this->upload->display_errors());
    }
    
    redirect(base_url() . 'pages/ma_staff/' . $this->session->userdata('c_id') . '/' . $this->input->post('jobID') . '/' . $this->input->post('school_id') . '#lr');
}


    public function update_tscfile() {
        $config['allowed_types'] = 'pdf';
        $config['upload_path'] = './uploads/regfile';
        $new_name = time().'tscfile'.$this->input->post('id').$_FILES["file"]['name'];
        $config['file_name'] = $new_name;
        $this->load->library('upload', $config);
    
        if ($this->upload->do_upload('file')) {
            $id = $this->input->post('id');
            $empEmail = $this->input->post('empEmail');
            $jobID = $this->input->post('jobID');
            $reg = $this->Common->one_cond_row('hris_applicant', 'empEmail', $empEmail);
            
            if (!empty($reg->tscfile)) {
                unlink("uploads/regfile/" . $reg->tscfile);
            }
            
            $this->Reg->tscfile_update();
            $this->session->set_flashdata('success', 'Successfully updated.');
        } else {
            $this->session->set_flashdata('danger', $this->upload->display_errors());
        }
        
        redirect(base_url() . 'pages/ma/' . $this->session->userdata('c_id') . '/' . $this->input->post('jobID') . '/' . $this->input->post('school_id') . '#tsc');
    }
    
       public function update_tscfile_staff() {
        $config['allowed_types'] = 'pdf';
        $config['upload_path'] = './uploads/regfile';
        $new_name = time().'tscfile'.$this->input->post('id').$_FILES["file"]['name'];
        $config['file_name'] = $new_name;
        $this->load->library('upload', $config);
    
        if ($this->upload->do_upload('file')) {
            $id = $this->input->post('id');
            $empEmail = $this->input->post('empEmail');
            $jobID = $this->input->post('jobID');
            $reg = $this->Common->one_cond_row('hris_staff', 'IDNumber', $id);
            
            if (!empty($reg->tscfile)) {
                unlink("uploads/regfile/" . $reg->tscfile);
            }
            
            $this->Reg->tscfile_update_staff();
            $this->session->set_flashdata('success', 'Successfully updated.');
        } else {
            $this->session->set_flashdata('danger', $this->upload->display_errors());
        }
        
        redirect(base_url() . 'pages/ma_staff/' . $this->session->userdata('c_id') . '/' . $this->input->post('jobID') . '/' . $this->input->post('school_id') . '#tsc');
    }

    public function update_tcfile() {
        $config['allowed_types'] = 'pdf';
        $config['upload_path'] = './uploads/regfile';
        $new_name = time().'tcfile'.$this->input->post('id').$_FILES["file"]['name'];
        $config['file_name'] = $new_name;
        $this->load->library('upload', $config);
    
        if ($this->upload->do_upload('file')) {
            $id = $this->input->post('id');
            $empEmail = $this->input->post('empEmail');
            $jobID = $this->input->post('jobID');
            $reg = $this->Common->one_cond_row('hris_applicant', 'empEmail', $empEmail);
            
            if (!empty($reg->tcfile)) {
                unlink("uploads/regfile/" . $reg->tcfile);
            }
            
            $this->Reg->tcfile_update();
            $this->session->set_flashdata('success', 'Successfully updated.');
        } else {
            $this->session->set_flashdata('danger', $this->upload->display_errors());
        }
        
        redirect(base_url() . 'pages/ma/' . $this->session->userdata('c_id') . '/' . $this->input->post('jobID') . '/' . $this->input->post('school_id') . '#tsc');
    }
    
      public function update_tcfile_staff() {
        $config['allowed_types'] = 'pdf';
        $config['upload_path'] = './uploads/regfile';
        $new_name = time().'tcfile'.$this->input->post('id').$_FILES["file"]['name'];
        $config['file_name'] = $new_name;
        $this->load->library('upload', $config);
    
        if ($this->upload->do_upload('file')) {
            $id = $this->input->post('id');
            $empEmail = $this->input->post('empEmail');
            $jobID = $this->input->post('jobID');
            $reg = $this->Common->one_cond_row('hris_staff', 'IDNumber', $id);
            
            if (!empty($reg->tcfile)) {
                unlink("uploads/regfile/" . $reg->tcfile);
            }
            
            $this->Reg->tcfile_update_staff();
            $this->session->set_flashdata('success', 'Successfully updated.');
        } else {
            $this->session->set_flashdata('danger', $this->upload->display_errors());
        }
        
        redirect(base_url() . 'pages/ma_staff/' . $this->session->userdata('c_id') . '/' . $this->input->post('jobID') . '/' . $this->input->post('school_id') . '#tsc');
    }
    

    public function update_omni(){
        $config['allowed_types'] = 'pdf';
        $config['upload_path'] = './uploads/regfile';
        $new_name = time().'omni'.$this->input->post('id').$_FILES["file"]['name'];
        $config['file_name'] = $new_name;
        $this->load->library('upload', $config);
    
        if ($this->upload->do_upload('file')) {
            $id = $this->input->post('id');
            $empEmail = $this->input->post('empEmail');
            $jobID = $this->input->post('jobID');
            $reg = $this->Common->one_cond_row('hris_applicant', 'empEmail', $empEmail);
    
            // Check if omnibus exists and is a file before unlinking
            if (!empty($reg->omnibus)) {
                $file_path = "uploads/regfile/" . $reg->omnibus;
                if (file_exists($file_path) && is_file($file_path)) {
                    unlink($file_path);
                }
            }
    
            $this->Reg->omni_update();
            $this->session->set_flashdata('success', 'Successfully updated.');
        } else {
            $this->session->set_flashdata('danger', $this->upload->display_errors());
        }
    
        redirect(base_url() . 'pages/ma/' . $this->session->c_id . '/' . $this->input->post('jobID') . '/' . $this->input->post('school_id') . '#appen');
    }
    // public function update_omni_staff()
    // {
    //     $config['allowed_types'] = 'pdf';
    //     $config['upload_path'] = './uploads/regfile';
    //     $new_name = time() . 'omni' . $this->input->post('id') . $_FILES["file_name"]['name'];
    //     $config['file_name'] = $new_name;
    //     $this->load->library('upload', $config);

    //     if ($this->upload->do_upload('file')) {
    //         $id = $this->input->post('id');
    //         $empEmail = $this->input->post('empEmail');
    //         $jobID = $this->input->post('jobID');
    //         $reg = $this->Common->one_cond_row('hris_staff', 'IDNumber', $id);
    //         unlink("uploads/regfile/" . $reg->omnibus);
    //         $this->Reg->omni_update_staff();
    //         $this->session->set_flashdata('success', 'Successfully updated.');
    //         redirect(base_url() . 'pages/ma_staff/' . $this->session->c_id . '/' . $this->input->post('jobID') . '/' . $this->input->post('school_id') . '#appen');
    //     } else {
    //         $this->session->set_flashdata('danger', $this->upload->display_errors());
    //         redirect(base_url() . 'pages/ma_staff/' . $this->session->c_id . '/' . $this->input->post('jobID') . '/' . $this->input->post('school_id') . '#appen');
    //     }
    // }

    public function update_apfile() {
        $config['allowed_types'] = 'pdf';
        $config['upload_path'] = './uploads/regfile';
        $new_name = time().'application'.$this->input->post('id').$_FILES["file"]['name'];
        $config['file_name'] = $new_name;
        $this->load->library('upload', $config);
    
        if ($this->upload->do_upload('file')) {
            $id = $this->input->post('id');
            $empEmail = $this->input->post('empEmail');
            $jobID = $this->input->post('jobID');
            $school_id = $this->input->post('school_id');
            $reg = $this->Common->three_cond_row('hris_applications', 'empEmail', $empEmail, 'jobID', $jobID, 'pre_school', $school_id);
            
            // Unlink old file if exists
            if (!empty($reg->Application)) {
                $file_path = "uploads/regfile/" . $reg->Application;
                if (file_exists($file_path) && is_file($file_path)) {
                    unlink($file_path);
                }
            }
            
            $this->Reg->apfile_update();
            $this->session->set_flashdata('success', 'Successfully updated.');
        } else {
            $this->session->set_flashdata('danger', $this->upload->display_errors());
        }
        
        redirect(base_url() . 'pages/ma/' . $this->session->c_id . '/' . $this->input->post('jobID') . '/' . $this->input->post('school_id') . '#appen');
    }

    public function update_apfile_rploi() {
        $config['allowed_types'] = 'pdf';
        $config['upload_path'] = './uploads/regfile';
        $new_name = time().'application'.$this->input->post('id').$_FILES["file"]['name'];
        $config['file_name'] = $new_name;
        $this->load->library('upload', $config);
    
        if ($this->upload->do_upload('file')) {
            $id = $this->input->post('id');
            $empEmail = $this->input->post('empEmail');
            $jobID = $this->input->post('jobID');
            $school_id = $this->input->post('school_id');
            $reg = $this->Common->three_cond_row('hris_applications', 'empEmail', $empEmail, 'jobID', $jobID, 'pre_school', $school_id);
            
            // Unlink old file if exists
            if (!empty($reg->rploi)) {
                $file_path = "uploads/regfile/" . $reg->rploi;
                if (file_exists($file_path) && is_file($file_path)) {
                    unlink($file_path);
                }
            }
            
            $this->Reg->apfile_rploi_update();
            $this->session->set_flashdata('success', 'Successfully updated.');
        } else {
            $this->session->set_flashdata('danger', $this->upload->display_errors());
        }
        
        redirect($_SERVER['HTTP_REFERER']);
    }
    
    
        public function update_apfile_staff() {
        $config['allowed_types'] = 'pdf';
        $config['upload_path'] = './uploads/regfile';
        $new_name = time().'application'.$this->input->post('id').$_FILES["file"]['name'];
        $config['file_name'] = $new_name;
        $this->load->library('upload', $config);
    
        if ($this->upload->do_upload('file')) {
            //$id = $this->input->post('id');
            //$empEmail = $this->input->post('empEmail');
            //$jobID = $this->input->post('jobID');
            //$school_id = $this->input->post('school_id');
            $appid = $this->input->post('appid');
            $reg = $this->Common->one_cond_row('hris_applications', 'appID', $appid);
            
            // Unlink old file if exists
            if (!empty($reg->Application)) {
                $file_path = "uploads/regfile/" . $reg->Application;
                if (file_exists($file_path) && is_file($file_path)) {
                    unlink($file_path);
                }
            }
            
            $this->Reg->apfile_update_staff();
            $this->session->set_flashdata('success', 'Successfully updated.');
        } else {
            $this->session->set_flashdata('danger', $this->upload->display_errors());
        }
        
        redirect(base_url() . 'pages/ma_staff/' . $this->session->c_id . '/' . $this->input->post('jobID') . '/' . $this->input->post('school_id') . '#appen');
    }

       public function update_voters() {
        $config['allowed_types'] = 'pdf';
        $config['upload_path'] = './uploads/regfile';
        $new_name = time().'voters'.$this->input->post('id').$_FILES["file"]['name'];
        $config['file_name'] = $new_name;
        $this->load->library('upload', $config);
    
        if ($this->upload->do_upload('file')) {
            $id = $this->input->post('id');
            $empEmail = $this->input->post('empEmail');
            $jobID = $this->input->post('jobID');
            $reg = $this->Common->one_cond_row('hris_applicant', 'empEmail', $empEmail);
            
            // Unlink old file if exists
            if (!empty($reg->voters)) {
                $file_path = "uploads/regfile/" . $reg->voters;
                if (file_exists($file_path) && is_file($file_path)) {
                    unlink($file_path);
                }
            }
            
            $this->Reg->voters_update();
            $this->session->set_flashdata('success', 'Successfully updated.');
        } else {
            $this->session->set_flashdata('danger', $this->upload->display_errors());
        }
        
        redirect(base_url() . 'pages/ma/' . $this->session->c_id . '/' . $this->input->post('jobID') . '/' . $this->input->post('school_id') . '#appen');
    }
    
    
    public function update_omni_staff() {
        $config['allowed_types'] = 'pdf';
        $config['upload_path'] = './uploads/regfile';
        $new_name = time().'omni'.$this->input->post('id').$_FILES["file"]['name'];
        $config['file_name'] = $new_name;
        $this->load->library('upload', $config);
    
        if ($this->upload->do_upload('file')) {
            $id = $this->input->post('id');
            $empEmail = $this->input->post('empEmail');
            $jobID = $this->input->post('jobID');
            $reg = $this->Common->one_cond_row('hris_staff', 'IDNumber', $id);
            
            // Unlink old file if exists
            if (!empty($reg->omnibus)) {
                $file_path = "uploads/regfile/" . $reg->omnibus;
                if (file_exists($file_path) && is_file($file_path)) {
                    unlink($file_path);
                }
            }
            
            $this->Reg->omni_update_staff();
            $this->session->set_flashdata('success', 'Successfully updated.');
        } else {
            $this->session->set_flashdata('danger', $this->upload->display_errors());
        }
        
        redirect(base_url() . 'pages/ma_staff/' . $this->session->c_id . '/' . $this->input->post('jobID') . '/' . $this->input->post('school_id') . '#appen');
    }
    
    
    
    public function update_voters_staff() {
        $config['allowed_types'] = 'pdf';
        $config['upload_path'] = './uploads/regfile';
        $new_name = time().'voters'.$this->input->post('id').$_FILES["file"]['name'];
        $config['file_name'] = $new_name;
        $this->load->library('upload', $config);
    
        if ($this->upload->do_upload('file')) {
            $id = $this->input->post('id');
            $empEmail = $this->input->post('empEmail');
            $jobID = $this->input->post('jobID');
            $reg = $this->Common->one_cond_row('hris_staff', 'empEmail', $id);
            
            // Unlink old file if exists
            if (!empty($reg->voters)) {
                $file_path = "uploads/regfile/" . $reg->voters;
                if (file_exists($file_path) && is_file($file_path)) {
                    unlink($file_path);
                }
            }
            
            $this->Reg->voters_update_staff();
            $this->session->set_flashdata('success', 'Successfully updated.');
        } else {
            $this->session->set_flashdata('danger', $this->upload->display_errors());
        }
        
        redirect(base_url() . 'pages/ma_staff/' . $this->session->c_id . '/' . $this->input->post('jobID') . '/' . $this->input->post('school_id') . '#appen');
    }
    
      public function update_pdsfile() {
        $config['allowed_types'] = 'pdf';
        $config['upload_path'] = './uploads/regfile';
        $new_name = time().'pdsfile'.$this->input->post('id').$_FILES["file"]['name'];
        $config['file_name'] = $new_name;
        $this->load->library('upload', $config);
    
        if ($this->upload->do_upload('file')) {
            $id = $this->input->post('id');
            $empEmail = $this->input->post('empEmail');
            $jobID = $this->input->post('jobID');
            $reg = $this->Common->one_cond_row('hris_applicant', 'empEmail', $empEmail);
            
            // Unlink old file if exists
            if (!empty($reg->pdsfile)) {
                unlink("uploads/regfile/" . $reg->pdsfile);
            }
            
            $this->Reg->pdsfile_update();
            $this->session->set_flashdata('success', 'Successfully updated.');
        } else {
            $this->session->set_flashdata('danger', $this->upload->display_errors());
        }
        
        redirect(base_url() . 'pages/ma/' . $this->session->c_id . '/' . $this->input->post('jobID') . '/' . $this->input->post('school_id') . '#appen');
    }
    
       public function update_pdsfile_staff() {
        $config['allowed_types'] = 'pdf';
        $config['upload_path'] = './uploads/regfile';
        $new_name = time().'pdsfile'.$this->input->post('id').$_FILES["file"]['name'];
        $config['file_name'] = $new_name;
        $this->load->library('upload', $config);
    
        if ($this->upload->do_upload('file')) {
            $id = $this->input->post('id');
            $empEmail = $this->input->post('empEmail');
            $jobID = $this->input->post('jobID');
            $reg = $this->Common->one_cond_row('hris_staff', 'empEmail', $id);
            
            // Unlink old file if exists
            if (!empty($reg->pdsfile)) {
                unlink("uploads/regfile/" . $reg->pdsfile);
            }
            
            $this->Reg->pdsfile_update_staff();
            $this->session->set_flashdata('success', 'Successfully updated.');
        } else {
            $this->session->set_flashdata('danger', $this->upload->display_errors());
        }
        
        redirect(base_url() . 'pages/ma_staff/' . $this->session->c_id . '/' . $this->input->post('jobID') . '/' . $this->input->post('school_id') . '#appen');
    }
    
    
      public function update_oafile() {
        $config['allowed_types'] = 'pdf';
        $config['upload_path'] = './uploads/regfile';
        $new_name = time().'oafile'.$this->input->post('id').$_FILES["file"]['name'];
        $config['file_name'] = $new_name;
        $this->load->library('upload', $config);
    
        if ($this->upload->do_upload('file')) {
            $id = $this->input->post('id');
            $empEmail = $this->input->post('empEmail');
            $jobID = $this->input->post('jobID');
            $reg = $this->Common->one_cond_row('hris_applicant', 'empEmail', $empEmail);
            
            if (!empty($reg->oafile)) {
                unlink("uploads/regfile/" . $reg->oafile);
            }
            
            $this->Reg->oafile_update();
            $this->session->set_flashdata('success', 'Successfully updated.');
        } else {
            $this->session->set_flashdata('danger', $this->upload->display_errors());
        }
        
        redirect(base_url() . 'pages/ma/' . $this->session->userdata('c_id') . '/' . $this->input->post('jobID') . '/' . $this->input->post('school_id') . '#appen');
    }
    
       public function update_oafile_staff() {
        $config['allowed_types'] = 'pdf';
        $config['upload_path'] = './uploads/regfile';
        $new_name = time().'oafile'.$this->input->post('id').$_FILES["file"]['name'];
        $config['file_name'] = $new_name;
        $this->load->library('upload', $config);
    
        if ($this->upload->do_upload('file')) {
            $id = $this->input->post('id');
            $empEmail = $this->input->post('empEmail');
            $jobID = $this->input->post('jobID');
            $reg = $this->Common->one_cond_row('hris_staff', 'empEmail', $id);
            
            if (!empty($reg->oafile)) {
                unlink("uploads/regfile/" . $reg->oafile);
            }
            
            $this->Reg->oafile_update_staff();
            $this->session->set_flashdata('success', 'Successfully updated.');
        } else {
            $this->session->set_flashdata('danger', $this->upload->display_errors());
        }
        
        redirect(base_url() . 'pages/ma_staff/' . $this->session->c_id . '/' . $this->input->post('jobID') . '/' . $this->input->post('school_id') . '#appen');
    }
    
    
       public function update_outfile() {
        $config['allowed_types'] = 'pdf';
        $config['upload_path'] = './uploads/regfile';
        $new_name = time().'outfile'.$this->input->post('id').$_FILES["file"]['name'];
        $config['file_name'] = $new_name;
        $this->load->library('upload', $config);
    
        if ($this->upload->do_upload('file')) {
            $id = $this->input->post('id');
            $empEmail = $this->input->post('empEmail');
            $jobID = $this->input->post('jobID');
            $reg = $this->Common->one_cond_row('hris_applicant', 'empEmail', $empEmail);
            
            if (!empty($reg->oa)) {
                unlink("uploads/regfile/" . $reg->oa);
            }
            
            $this->Reg->outfile_update();
            $this->session->set_flashdata('success', 'Successfully updated.');
        } else {
            $this->session->set_flashdata('danger', $this->upload->display_errors());
        }
        
        redirect(base_url() . 'pages/ma/' . $this->session->c_id . '/' . $this->input->post('jobID') . '/' . $this->input->post('school_id') . '#appen');
    }
    
    public function update_app()
    {
        $this->Reg->update_application_district();
        $this->session->set_flashdata('success', 'Successfully updated.');
        redirect(base_url() . 'Pages/request_to_rr/' . $this->input->post('applicant_id') . '/' . $this->input->post('jobID') . '/' . $this->input->post('appID'));
    }

    public function update_app_dis_blank()
    {
        $this->Reg->update_application_district_blank();
        $this->session->set_flashdata('success', 'Successfully updated.');
        redirect(base_url() . 'Pages/request_to_rr/' . $this->uri->segment(3) . '/' . $this->uri->segment(4) . '/' . $this->uri->segment(5));
    }

    public function update_ipcrffile() {
        $config['allowed_types'] = 'pdf';
        $config['upload_path'] = './uploads/regfile';
        $new_name = time().'ipcrffile'.$this->input->post('id').$_FILES["file"]['name'];
        $config['file_name'] = $new_name;
        $this->load->library('upload', $config);
    
        if ($this->upload->do_upload('file')) {
            $id = $this->input->post('id');
            $empEmail = $this->input->post('empEmail');
            $jobID = $this->input->post('jobID');
            $reg = $this->Common->one_cond_row('hris_applicant', 'empEmail', $empEmail);
            
            if (!empty($reg->ipcrffile)) {
                unlink("uploads/regfile/" . $reg->ipcrffile);
            }
            
            $this->Reg->ipcrffile_update();
            $this->session->set_flashdata('success', 'Successfully updated.');
        } else {
            $this->session->set_flashdata('danger', $this->upload->display_errors());
        }
        
        redirect(base_url() . 'pages/ma/' . $this->session->userdata('c_id') . '/' . $this->input->post('jobID') . '/' . $this->input->post('school_id') . '#appen');
    }
    
    
    public function update_ipcrffile_staff() {
        $config['allowed_types'] = 'pdf';
        $config['upload_path'] = './uploads/regfile';
        $new_name = time().'ipcrffile'.$this->input->post('id').$_FILES["file"]['name'];
        $config['file_name'] = $new_name;
        $this->load->library('upload', $config);
    
        if ($this->upload->do_upload('file')) {
            $id = $this->input->post('id');
            $empEmail = $this->input->post('empEmail');
            $jobID = $this->input->post('jobID');
            $reg = $this->Common->one_cond_row('hris_staff', 'empEmail', $id);
            
            if (!empty($reg->ipcrffile)) {
                unlink("uploads/regfile/" . $reg->ipcrffile);
            }
            
            $this->Reg->ipcrffile_update_staff();
            $this->session->set_flashdata('success', 'Successfully updated.');
        } else {
            $this->session->set_flashdata('danger', $this->upload->display_errors());
        }
        
        redirect(base_url() . 'pages/ma_staff/' . $this->session->userdata('c_id') . '/' . $this->input->post('jobID') . '/' . $this->input->post('school_id') . '#appen');
    }

    public function update_ppstco() {
        $config['allowed_types'] = 'pdf';
        $config['upload_path'] = './uploads/regfile';
        $new_name = time().'ppstco'.$this->input->post('id').$_FILES["file"]['name'];
        $config['file_name'] = $new_name;
        $this->load->library('upload', $config);
    
        if ($this->upload->do_upload('file')) {
            $id = $this->input->post('id');
            $empEmail = $this->input->post('empEmail');
            $jobID = $this->input->post('jobID');
            $reg = $this->Common->one_cond_row('hris_staff', 'empEmail', $id);
            
            if (!empty($reg->ppstco)) {
                unlink("uploads/regfile/" . $reg->ppstco);
            }
            
            $this->Reg->ppstco_update_staff();
            $this->session->set_flashdata('success', 'Successfully updated.');
        } else {
            $this->session->set_flashdata('danger', $this->upload->display_errors());
        }
        
        redirect(base_url() . 'pages/ma_staff/' . $this->session->userdata('c_id') . '/' . $this->input->post('jobID') . '/' . $this->input->post('school_id') . '#appen');
    }

    public function update_ppstpa() {
        $config['allowed_types'] = 'pdf';
        $config['upload_path'] = './uploads/regfile';
        $new_name = time().'ppstpa'.$this->input->post('id').$_FILES["file"]['name'];
        $config['file_name'] = $new_name;
        $this->load->library('upload', $config);
    
        if ($this->upload->do_upload('file')) {
            $id = $this->input->post('id');
            $empEmail = $this->input->post('empEmail');
            $jobID = $this->input->post('jobID');
            $reg = $this->Common->one_cond_row('hris_staff', 'empEmail', $id);
            
            if (!empty($reg->ppstco)) {
                unlink("uploads/regfile/" . $reg->ppstpa);
            }
            
            $this->Reg->ppstpa_update_staff();
            $this->session->set_flashdata('success', 'Successfully updated.');
        } else {
            $this->session->set_flashdata('danger', $this->upload->display_errors());
        }
        
        redirect(base_url() . 'pages/ma_staff/' . $this->session->userdata('c_id') . '/' . $this->input->post('jobID') . '/' . $this->input->post('school_id') . '#appen');
    }

    public function submit_application()
    {

        $applications = $this->Common->two_cond_count_row('hris_applications', 'jobID', $this->input->post('id'), 'applicant_id', $this->session->c_id);

        if ($applications->num_rows() >= 1) {
            $this->session->set_flashdata('danger', 'Please double-check the same job position you applied.');
            redirect(base_url() . 'pages/ja/' . $this->session->c_id);
        } else {
            $this->Reg->ap_submit();
        }
        $app_id = $this->db->insert_id();

        $this->Page_model->insert_at('Submit Application', $app_id);
        if ($this->session->position == 'user') {
            $this->Reg->ap_track_apply_user('Application Submitted', $app_id);
        } else {
            $this->Reg->ap_track_apply('Application Submitted', $app_id);
        }

        $this->session->set_flashdata('success', 'Successfully Applied');
        redirect(base_url() . 'pages/ja/' . $this->session->c_id);
    }

    public function edit_application()
    {
        $this->Reg->edit_submit();
        $this->Page_model->insert_at('Edited  Application', $this->db->insert_id());
        //$this->Reg->ap_track_apply('Edited Application',);
        $this->session->set_flashdata('success', 'Successfully Updated.');
        redirect(base_url() . 'pages/ja/' . $this->session->c_id);
    }
    public function ir()
    {
        $this->Reg->insert_rate($this->uri->segment(3), $this->uri->segment(4));
        redirect(base_url() . 'pages/ma/' . $this->uri->segment(9) . '/' . $this->uri->segment(8) . '/' . $this->uri->segment(7) . '/' . $this->uri->segment(10));
    }

    public function validated()
    {
        $this->Reg->ap_track('Validated');
        $this->Page_model->insert_at('Submit Application', $this->db->insert_id());
        $this->Reg->ap_change_stat('Validated');

        $rate = $this->Common->two_cond_count_row('hris_applications_rating', 'appID', $this->uri->segment(4), 'record_no', $this->uri->segment(5));
        if ($rate->num_rows() <= 0) {

            $job = $this->Common->one_cond_row('hris_jobvacancy', 'jobID', $this->uri->segment(4));

            $this->Reg->insert_rate($job->position, $job->sy);
            //$this->Reg->ap_track('The submitted documents has been Validated.');
        }

        $this->session->set_flashdata('success', 'Successfully Validated');
        redirect(base_url() . 'pages/school_applicant/' . $this->uri->segment(4));
    }

    public function undo_validated()
    {
        $this->Reg->ap_track('Cancelled Validation');
        $this->Page_model->insert_at('Validation Canceled', $this->db->insert_id());
        $this->Reg->ap_change_stat('Application Submitted');

        $this->session->set_flashdata('success', 'Successfully Updated');
        redirect(base_url() . 'pages/school_applicant/' . $this->uri->segment(4));
    }

    public function efr()
    {
        $this->Reg->ap_track('Endorse for Rating');
        $this->Reg->ap_change_stat('Endorsed for Rating');
        $this->session->set_flashdata('success', 'Successfully endorsed for rating.');
        redirect(base_url() . 'pages/sa_view_applicant/' . $this->uri->segment(4));
    }

    public function endorse_all_app()
    {
        //$this->Reg->ap_track('Endorse for Rating');
        $this->Reg->ap_change_stat_all_application('Endorsed for Rating');
        $this->session->set_flashdata('success', 'Successfully endorsed for rating.');
        redirect(base_url() . 'pages/' . $this->uri->segment(6) .'/'.$this->uri->segment(3) .'/'.$this->uri->segment(4) .'/'.$this->uri->segment(5));
    }

    public function efrv2()
    {
        //$this->Reg->ap_track('Endorse for Rating');
        $this->Reg->ap_change_stat_all('Endorsed for Rating');
        $this->session->set_flashdata('success', 'Successfully endorsed for rating.');
        redirect(base_url() . 'pages/for_endorsement');
    }

    public function efr_district()
    {
        //$this->Reg->ap_track('Endorse for Rating');
        //$this->Reg->insert_va();
        $this->Reg->ap_change_stat_district('Endorsed for Rating');
        $this->session->set_flashdata('success', 'Successfully Endorsed for Rating');
        redirect(base_url() . 'pages/sa_view_applicant/' . $this->uri->segment(4));
    }

    public function Rated()
    {
        $this->Reg->ap_track('Rated');
        $this->Reg->ap_change_stat('Rated');
        $this->session->set_flashdata('success', 'Successfully Rated');
        redirect(base_url() . 'pages/' . $this->uri->segment(7) . '/' . $this->uri->segment(3) . '/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '/' . $this->uri->segment(6));
    }
    public function Ratednirenren()
    {
        $this->Reg->ap_track('Rated');
        $this->Reg->ap_change_stat('Rated');
        $this->session->set_flashdata('success', 'Successfully Rated');
        redirect(base_url() . 'pages/evaluator_applicant/' . $this->uri->segment(4));
    }
    public function confirmation()
    {
        $this->Reg->ap_trackv4('Confirmed');
        $this->Reg->ap_change_stat('Confirmed');
        $this->session->set_flashdata('success', 'Successfully Confirmed');
        redirect(base_url() . 'pages/' . $this->uri->segment(7) . '/' . $this->uri->segment(3) . '/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '/' . $this->uri->segment(6));
    }

    public function ap_cancel($param)
    {
        $this->Common->del('hris_applications', 'appID', $param);
        $this->Common->del('hris_applications_track', 'app_id', $param);
        $this->Page_model->insert_at('Cancel Application', $param);
        $this->session->set_flashdata('success', 'The Application has been Successfully Canceled.');
        redirect(base_url() . 'pages/ja/' . $this->session->c_id);
    }

    public function ap_cancel_hr($param)
    {
        $this->Common->del('hris_applications', 'appID', $param);
        $this->Common->del('hris_applications_track', 'app_id', $param);
        $this->Page_model->insert_at('Cancel Application', $param);
        $this->session->set_flashdata('success', 'The Application has been Successfully Canceled.');
        redirect(base_url() . 'Page/jobVacancy');
    }

    public function close_job()
    {
        $this->Reg->close_jv();
        $this->Page_model->insert_at('Cancel Application', $this->uri->segment(3));
        $this->session->set_flashdata('success', 'The Job Item has been Successfully Closed.');
        redirect(base_url() . 'page/jobVacancy');
    }

    public function open_job()
    {
        $this->Reg->open_jv();
        $this->Page_model->insert_at('Cancel Application', $this->uri->segment(3));
        $this->session->set_flashdata('success', 'The Job Item has been Successfully opened.');
        redirect(base_url() . 'page/jobArchieved');
    }

    public function ja()
    {

        $page = "job_application";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }

        $ee = $this->input->get('ee');

        if ($this->session->position == 'reg') {
            //$data['data'] = $this->Common->one_cond_loop_order_by('hris_applications', 'empEmail', $this->session->username,'appID','Desc');
            //$data['data'] = $this->Common->two_cond('hris_applications', 'empEmail', $this->session->username, 'app_year', date('Y'));
            $data['data'] = $this->Common->two_join_two_cond('hris_applications', 'hris_jobvacancy', 'a.jobID,a.empEmail,a.app_year,a.district,a.district,
            a.pre_school,a.applicant_id,a.appID,b.jobID,b.jobTitle,b.jvStatus', 'a.jobID = b.jobID', 'empEmail', $this->session->username,'jvStatus','Open','jobTitle', 'ASC');
        } elseif ($this->session->position == 'user') {
            $data['data'] = $this->Common->two_join_two_cond('hris_applications', 'hris_jobvacancy', 'a.jobID,a.empEmail,a.app_year,a.district,a.district,
            a.pre_school,a.applicant_id,a.appID,b.jobID,b.jobTitle,b.jvStatus', 'a.jobID = b.jobID', 'empEmail', $this->session->username,'jvStatus','Open','jobTitle', 'ASC');
        } else {
            $data['data'] = $this->Common->one_cond('hris_applications', 'empEmail', $ee);
        }


        $this->load->view('templates/head');
        $this->load->view('templates/header');
        $this->load->view('pages/' . $page, $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/ja_edit');
    }

    public function district_applicant()
    {

        $page = "list_applicant_district";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }

        $data['d'] = $this->Common->one_cond_row('district', 'id', $this->session->c_id);

        if ($this->uri->segment(4) == 0) {
            $data['data'] = $this->Common->three_cond('hris_applications', 'jobID', $this->uri->segment(3), 'pre_school', $this->uri->segment(5), 'appStatus', 'Application Submitted');
        } else {
            $data['data'] = $this->Common->two_cond('hris_applications', 'jobID', $this->uri->segment(3), 'pre_school', $this->uri->segment(5));
        }



        $this->load->view('templates/head');
        $this->load->view('templates/header');
        $this->load->view('pages/' . $page, $data);
        $this->load->view('templates/footer');
    }

    public function request_to_rr()
    {

        $page = "rtrr";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }

        $data['title'] = 'REQUEST TO RETAIN RATING';
        $data['applicant'] = $this->Common->one_cond_row('hris_applicant', 'id', $this->uri->segment(3));
        $data['job'] = $this->Common->one_cond_row('hris_jobvacancy', 'jobID', $this->uri->segment(4));
        $data['application'] = $this->Common->one_cond_row('hris_applications', 'appID', $this->uri->segment(5));
        $data['rating'] = $this->Common->one_cond_row('hris_applications_rating', 'appID', $this->uri->segment(5));

        $this->load->view('pages/' . $page, $data);
    }

    public function ssc_report()
    {

        $page = "ssc_vsr";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }
        $data['settings'] = $this->SettingsModel->get_mis_settings();
        $data['title'] = 'REQUEST TO RETAIN RATING';
        $data['applicant'] = $this->Common->one_cond_row('hris_applicant', 'id', $this->uri->segment(3));
        $data['job'] = $this->Common->one_cond_row('hris_jobvacancy', 'jobID', $this->uri->segment(4));

        $data['data'] = $this->Common->two_join_one_ne_cond('hris_applications', 'schools', 'a.pre_school,a.empEmail,b.schoolName,b.schoolID,a.district', 'b.schoolID=a.pre_school', 'appStatus', 'Application Submitted', 'a.pre_school', 'b.schoolName', 'ASC');

        $this->load->view('pages/' . $page, $data);
    }

    public function lva()
    {

        $page = "lva";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }
        $data['settings'] = $this->SettingsModel->get_mis_settings();
        $data['title'] = 'REQUEST TO RETAIN RATING';
        $data['applicant'] = $this->Common->one_cond_row('hris_applicant', 'id', $this->uri->segment(3));
        $data['job'] = $this->Common->one_cond_row('hris_jobvacancy', 'jobID', $this->uri->segment(4));

        $data['data'] = $this->Common->two_join_one_cond('hris_applications', 'schools', 'a.pre_school,a.empEmail,b.schoolName,b.schoolID', 'b.schoolID=a.pre_school', 'appStatus', 'Endorsed for Rating', 'a.pre_school', 'b.schoolName', 'ASC');

        $this->load->view('pages/' . $page, $data);
    }

    public function abd_report()
    {

        $page = "abd";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }
        $data['settings'] = $this->SettingsModel->get_mis_settings();
        $data['title'] = 'REQUEST TO RETAIN RATING';
        $data['applicant'] = $this->Common->one_cond_row('hris_applicant', 'id', $this->uri->segment(3));
        $data['job'] = $this->Common->one_cond_row('hris_jobvacancy', 'jobID', $this->uri->segment(4));

        $data['data'] = $this->Common->two_join_one_cond('hris_applications', 'schools', 'a.pre_school,a.district,a.empEmail,a.appStatus,b.schoolName,b.schoolID', 'b.schoolID=a.pre_school', 'a.appStatus', 'Endorsed for Rating', 'a.district', 'b.schoolName', 'ASC');

        $this->load->view('pages/' . $page, $data);
    }

    public function abd_report_multiple()
    {

        $page = "abd_multi";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }
        $data['settings'] = $this->SettingsModel->get_mis_settings();
        //$data['applicant'] = $this->Common->one_cond_row('hris_applicant', 'id', $this->uri->segment(3));
        //$data['job'] = $this->Common->one_cond_row('hris_jobvacancy', 'jobID', $this->uri->segment(4));

        //$data['data'] = $this->Common->two_join_one_cond('hris_applications', 'schools', 'a.pre_school,a.district,a.empEmail,a.appStatus,b.schoolName,b.schoolID', 'b.schoolID=a.pre_school', 'a.appStatus', 'Endorsed for Rating', 'a.district', 'b.schoolName', 'ASC');

        $data['data'] = $this->Common->one_cond_and_two_cond_ne_ob_select('hris_applications','app_year,appStatus,empEmail,jobID,appID,pre_school','app_year', date('Y'),'appStatus','Application Submitted','appStatus','Validated','empEmail','ASC');

        $this->load->view('pages/' . $page, $data);
    }

    public function abd_report_multiple_district()
    {

        $page = "abd_multi";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }
        $data['settings'] = $this->SettingsModel->get_mis_settings();
        $district = $this->input->get('d');
        //$data['applicant'] = $this->Common->one_cond_row('hris_applicant', 'id', $this->uri->segment(3));
        //$data['job'] = $this->Common->one_cond_row('hris_jobvacancy', 'jobID', $this->uri->segment(4));

        //$data['data'] = $this->Common->two_join_one_cond('hris_applications', 'schools', 'a.pre_school,a.district,a.empEmail,a.appStatus,b.schoolName,b.schoolID', 'b.schoolID=a.pre_school', 'a.appStatus', 'Endorsed for Rating', 'a.district', 'b.schoolName', 'ASC');

        $data['data'] = $this->Common->two_cond_and_two_cond_ne_ob_select('hris_applications','app_year,appStatus,empEmail,jobID,appID,pre_school,district','district',$district,'app_year', date('Y'),'appStatus','Application Submitted','appStatus','Validated','empEmail','ASC');

        $this->load->view('pages/' . $page, $data);
    }

    public function abd_report_multiple_for_endorsement()
    {

        $page = "abd_multiv2";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }
        $data['settings'] = $this->SettingsModel->get_mis_settings();
        //$data['applicant'] = $this->Common->one_cond_row('hris_applicant', 'id', $this->uri->segment(3));
        //$data['job'] = $this->Common->one_cond_row('hris_jobvacancy', 'jobID', $this->uri->segment(4));

        //$data['data'] = $this->Common->two_join_one_cond('hris_applications', 'schools', 'a.pre_school,a.district,a.empEmail,a.appStatus,b.schoolName,b.schoolID', 'b.schoolID=a.pre_school', 'a.appStatus', 'Endorsed for Rating', 'a.district', 'b.schoolName', 'ASC');

        $data['data'] = $this->Common->one_cond_and_one_cond_ne_ob_select_gb('hris_applications','app_year,appStatus,empEmail,jobID,appID,pre_school','app_year', date('Y'),'appStatus','Application Submitted','empEmail','ASC','empEmail');

        $this->load->view('pages/' . $page, $data);
    }

    // public function abd_report_shs()
    // {

    //     $page = "abd_shs";

    //     if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
    //         show_404();
    //     }
    //     $data['settings'] = $this->SettingsModel->get_mis_settings();
    //     //$data['applicant'] = $this->Common->one_cond_row('hris_applicant', 'id', $this->uri->segment(3));
    //     //$data['job'] = $this->Common->one_cond_row('hris_jobvacancy', 'jobID', $this->uri->segment(4));

    //     //$data['data'] = $this->Common->two_join_one_cond('hris_applications', 'schools', 'a.pre_school,a.district,a.empEmail,a.appStatus,b.schoolName,b.schoolID', 'b.schoolID=a.pre_school', 'a.appStatus', 'Endorsed for Rating', 'a.district', 'b.schoolName', 'ASC');

    //     $data['data'] = $this->Common->one_cond_and_two_cond_ne_ob_select('hris_applications','app_year,appStatus,empEmail,jobID,appID,pre_school','app_year', date('Y'),'appStatus','Application Submitted','appStatus','Validated','empEmail','ASC');

    //     $this->load->view('pages/' . $page, $data);
    // }

    public function abd_report_shs()
    {

        $page = "abd_shsv2";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }
        $data['settings'] = $this->SettingsModel->get_mis_settings();
       
        $data['data'] = $this->Common->one_cond_and_two_cond_ne_ob_select('hris_applications','app_year,appStatus,empEmail,jobID,appID,pre_school','app_year', date('Y'),'appStatus','Application Submitted','appStatus','Validated','empEmail','ASC');

        $this->load->view('pages/' . $page, $data);
    }

    public function abd_report_jhs()
    {

        $page = "abd_jhs";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }
        $data['settings'] = $this->SettingsModel->get_mis_settings();
        //$data['applicant'] = $this->Common->one_cond_row('hris_applicant', 'id', $this->uri->segment(3));
        //$data['job'] = $this->Common->one_cond_row('hris_jobvacancy', 'jobID', $this->uri->segment(4));

        //$data['data'] = $this->Common->two_join_one_cond('hris_applications', 'schools', 'a.pre_school,a.district,a.empEmail,a.appStatus,b.schoolName,b.schoolID', 'b.schoolID=a.pre_school', 'a.appStatus', 'Endorsed for Rating', 'a.district', 'b.schoolName', 'ASC');

        $data['data'] = $this->Common->one_cond_and_two_cond_ne_ob_select('hris_applications','app_year,appStatus,empEmail,jobID,appID,pre_school','app_year', date('Y'),'appStatus','Application Submitted','appStatus','Validated','empEmail','ASC');

        $this->load->view('pages/' . $page, $data);
    }

    public function abd_report_rr()
    {

        $page = "abd_rr";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }
        $data['settings'] = $this->SettingsModel->get_mis_settings();
        $data['title'] = 'APPLICANT WHO REQUEST TO RETAIN RATING';
        $data['applicant'] = $this->Common->one_cond_row('hris_applicant', 'id', $this->uri->segment(3));
        $data['job'] = $this->Common->one_cond_row('hris_jobvacancy', 'jobID', $this->uri->segment(4));

        $data['data'] = $this->Common->two_join_one_cond('hris_applications', 'schools', 'a.pre_school,a.district,a.empEmail,a.appStatus,b.schoolName,b.schoolID', 'b.schoolID=a.pre_school', 'a.appStatus', 'Endorsed for Rating', 'a.district', 'b.schoolName', 'ASC');

        $this->load->view('pages/' . $page, $data);
    }

    public function abd_report_validated()
    {

        $page = "abd_validated";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }
        $data['settings'] = $this->SettingsModel->get_mis_settings();
        $data['title'] = 'APPLICANT WHO REQUEST TO RETAIN RATING';
        $data['applicant'] = $this->Common->one_cond_row('hris_applicant', 'id', $this->uri->segment(3));
        $data['job'] = $this->Common->one_cond_row('hris_jobvacancy', 'jobID', $this->uri->segment(4));

        $data['data'] = $this->Common->two_join_one_cond('hris_applications', 'schools', 'a.pre_school,a.district,a.empEmail,a.appStatus,b.schoolName,b.schoolID', 'b.schoolID=a.pre_school', 'a.appStatus', 'Validated', 'a.district', 'b.schoolName', 'ASC');

        $this->load->view('pages/' . $page, $data);
    }

    public function abd_report_district()
    {

        $page = "abd_applied";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }
        $data['settings'] = $this->SettingsModel->get_mis_settings();
        $data['title'] = 'REQUEST TO RETAIN RATING';
        //$data['applicant'] = $this->Common->one_cond_row('hris_applicant', 'id', $this->uri->segment(3));
        $data['job'] = $this->Common->one_cond_row('hris_jobvacancy', 'jobID', $this->uri->segment(4));

        //$data['data'] = $this->Common->two_join_one_cond('hris_applications', 'schools', 'a.pre_school,a.district,a.empEmail,a.appStatus,b.schoolName,b.schoolID', 'b.schoolID=a.pre_school', 'a.appStatus', 'Endorsed for Rating', 'a.district', 'b.schoolName', 'ASC');
        $data['district'] = $this->Common->no_cond('district');

        $this->load->view('pages/' . $page, $data);
    }

    public function abd_reportv2()
    {

        $page = "abdv2";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }
        $data['settings'] = $this->SettingsModel->get_mis_settings();
        $data['title'] = 'REQUEST TO RETAIN RATING';
        $data['applicant'] = $this->Common->one_cond_row('hris_applicant', 'id', $this->uri->segment(3));
        $data['job'] = $this->Common->one_cond_row('hris_jobvacancy', 'jobID', $this->uri->segment(4));

        $data['data'] = $this->Common->two_join_one_cond('hris_applications', 'schools', 'a.pre_school,a.district,a.empEmail,a.appStatus,b.schoolName,b.schoolID', 'b.schoolID=a.pre_school', 'a.appStatus', 'Endorsed for Rating', 'a.district', 'b.schoolName', 'ASC');

        $this->load->view('pages/' . $page, $data);
    }

    public function abd_reportv3()
    {

        $page = "abdv3";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }
        $data['settings'] = $this->SettingsModel->get_mis_settings();

        $data['title'] = 'REQUEST TO RETAIN RATING';
        $data['applicant'] = $this->Common->one_cond_row('hris_applicant', 'id', $this->uri->segment(3));
        $data['job'] = $this->Common->one_cond_row('hris_jobvacancy', 'jobID', $this->uri->segment(4));

        $data['data'] = $this->Common->two_join_one_cond('hris_applications', 'schools', 'a.pre_school,a.district,a.empEmail,a.appStatus,b.schoolName,b.schoolID', 'b.schoolID=a.pre_school', 'a.dq', 1, 'a.district', 'b.schoolName', 'ASC');

        $this->load->view('pages/' . $page, $data);
    }

    public function abd_reportv4()
    {

        $page = "abdv4";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }
        $data['settings'] = $this->SettingsModel->get_mis_settings();

        $data['title'] = 'REQUEST TO RETAIN RATING';
        $data['applicant'] = $this->Common->one_cond_row('hris_applicant', 'id', $this->uri->segment(3));
        $data['job'] = $this->Common->one_cond_row('hris_jobvacancy', 'jobID', $this->uri->segment(4));

        $data['data'] = $this->Common->two_join_one_cond('hris_applications', 'schools', 'a.pre_school,a.district,a.empEmail,a.appStatus,b.schoolName,b.schoolID', 'b.schoolID=a.pre_school', 'a.appStatus', 'Endorsed for Rating', 'a.district', 'b.schoolName', 'ASC');

        $this->load->view('pages/' . $page, $data);
    }

    public function abd_reportv5()
    {

        $page = "abdv5";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }
        $data['settings'] = $this->SettingsModel->get_mis_settings();

        $data['title'] = 'REQUEST TO RETAIN RATING';
        $data['applicant'] = $this->Common->one_cond_row('hris_applicant', 'id', $this->uri->segment(3));
        $data['job'] = $this->Common->one_cond_row('hris_jobvacancy', 'jobID', $this->uri->segment(4));

        $data['data'] = $this->Common->two_join_one_cond('hris_applications', 'schools', 'a.pre_school,a.district,a.empEmail,a.appStatus,b.schoolName,b.schoolID', 'b.schoolID=a.pre_school', 'a.appStatus', 'Endorsed for Rating', 'a.district', 'b.schoolName', 'ASC');

        $this->load->view('pages/' . $page, $data);
    }
    public function hiring_non_all_applicant()
    {

        $page = "hqall";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }
        $data['settings'] = $this->SettingsModel->get_mis_settings();

        $data['title'] = 'List of Qaulified Applicants';
        $data['job'] = $this->Common->two_cond_order_by('hris_jobvacancy', 'sy', date('Y'), 'jvStatus', 'Open', 'jobID', 'DESC');

        $this->load->view('pages/' . $page, $data);
    }

    public function hiring_non_qaulified()
    {

        $page = "hq";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }
        $data['settings'] = $this->SettingsModel->get_mis_settings();

        $data['title'] = 'List of Qaulified Applicants';
        $data['job'] = $this->Common->one_cond_order_by('hris_jobvacancy', 'jvStatus', 'Open', 'jobID', 'DESC');

        $this->load->view('pages/' . $page, $data);
    }

    public function hiring_non_qaulified_rated()
    {

        $page = "hqd";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }
        $data['settings'] = $this->SettingsModel->get_mis_settings();
        $data['title'] = 'List of Qaulified Applicants';
        //$data['job'] = $this->Common->two_cond_order_by('hris_jobvacancy', 'sy', date('Y'), 'jvStatus', 'Open', 'jobTitle', 'DESC');
        $data['job'] = $this->Common->two_cond_order_by('hris_jobvacancy', 'jvStatus', 'Open','promotion',0, 'jobTitle', 'DESC');

        $this->load->view('pages/' . $page, $data);
    }

    public function qaulified_promotion()
    {

        $page = "hqd_promotion";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }
        $data['settings'] = $this->SettingsModel->get_mis_settings();
        $data['title'] = 'List of Qaulified Applicants';
        $data['job'] = $this->Common->two_cond_order_by_select('hris_jobvacancy','sy,jvStatus,jobID,promotion,jobTitle,job_type,assign','jvStatus', 'Open','promotion',1, 'jobTitle', 'DESC');


        $this->load->view('pages/' . $page, $data);
    }

    public function qaulified_promotion_job()
    {

        $jobID = $this->uri->segment(3);
        $page = "hqd_promotion";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }
        $data['settings'] = $this->SettingsModel->get_mis_settings();
        $data['title'] = 'List of Qaulified Applicants';
        //$data['job'] = $this->Common->three_cond_order_by('hris_jobvacancy', 'sy', date('Y'), 'jvStatus', 'Open','jobID',$jobID, 'jobTitle', 'DESC');
        $data['job'] = $this->Common->three_cond_order_by_select('hris_jobvacancy','sy,jvStatus,jobID,promotion,jobTitle,job_type,assign','jobID',$jobID, 'sy', date('Y'),'jvStatus', 'Open','promotion',1, 'jobTitle', 'DESC');


        $this->load->view('pages/' . $page, $data);
    }


    public function hiring_non_not_qaulified()
    {

        $page = "hqn";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }
        $data['settings'] = $this->SettingsModel->get_mis_settings();
        $data['title'] = 'List of Qaulified Applicants';
        $data['job'] = $this->Common->one_cond_order_by('hris_jobvacancy', 'jvStatus', 'Open', 'jobID', 'DESC');

        $this->load->view('pages/' . $page, $data);
    }

    public function not_qualify_promotion()
    {

        $page = "hqnv2";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }
        $data['settings'] = $this->SettingsModel->get_mis_settings();
        $data['title'] = 'List of Qaulified Applicants';
        $data['job'] = $this->Common->two_cond_order_by('hris_jobvacancy', 'sy', date('Y'), 'jvStatus', 'Open', 'jobID', 'DESC');

        $this->load->view('pages/' . $page, $data);
    }

    public function abd_reportv6()
    {

        $page = "abdv6";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }
        $data['settings'] = $this->SettingsModel->get_mis_settings();

        $data['title'] = 'REQUEST TO RETAIN RATING';
        $data['applicant'] = $this->Common->one_cond_row('hris_applicant', 'id', $this->uri->segment(3));
        $data['job'] = $this->Common->one_cond_row('hris_jobvacancy', 'jobID', $this->uri->segment(4));

        $data['a'] = $this->Common->two_cond_order_by('hris_applications', 'dq', 1, 'app_year', date('Y'), 'empEmail', 'ASC');


        $this->load->view('pages/' . $page, $data);
    }

    public function tr_special_update()
    {
        $this->Reg->trspecialupdate();
        redirect(base_url() . 'Pages/abd_reportv6');
    }


    public function dabd_report()
    {

        $page = "abdd";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }
        $data['settings'] = $this->SettingsModel->get_mis_settings();
        $data['title'] = 'List of Disqualified Applicant/s';
        $data['dqval'] = 2;
        $data['applicant'] = $this->Common->one_cond_row('hris_applicant', 'id', $this->uri->segment(3));
        $data['job'] = $this->Common->one_cond_row('hris_jobvacancy', 'jobID', $this->uri->segment(4));

        $data['data'] = $this->Common->two_join_one_cond('hris_applications', 'schools', 'a.pre_school,a.district,a.empEmail,a.appStatus,a.dq,b.schoolName,b.schoolID', 'b.schoolID=a.pre_school', 'a.dq', 2, 'a.district', 'b.schoolName', 'ASC');

        $this->load->view('pages/' . $page, $data);
    }

    public function dabq_report()
    {

        $page = "abdd";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }
        $data['settings'] = $this->SettingsModel->get_mis_settings();
        $data['title'] = 'Qualified Applicant/s';
        $data['dqval'] = 1;
        $data['applicant'] = $this->Common->one_cond_row('hris_applicant', 'id', $this->uri->segment(3));
        $data['job'] = $this->Common->one_cond_row('hris_jobvacancy', 'jobID', $this->uri->segment(4));

        $data['data'] = $this->Common->two_join_one_cond('hris_applications', 'schools', 'a.pre_school,a.district,a.empEmail,a.appStatus,a.dq,b.schoolName,b.schoolID', 'b.schoolID=a.pre_school', 'a.dq', 1, 'a.district', 'b.schoolName', 'ASC');

        $this->load->view('pages/' . $page, $data);
    }

    public function dabq_reportv2()
    {

        $page = "abddv2";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }
        $data['settings'] = $this->SettingsModel->get_mis_settings();
        $data['title'] = 'District list';

        $this->load->view('pages/' . $page, $data);
    }

    public function dabq_reportv2_summary()
    {

        $page = "abd_summary";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }
        $data['settings'] = $this->SettingsModel->get_mis_settings();
        $data['title'] = 'District list';

        $this->load->view('pages/' . $page, $data);
    }

    public function dabq_reportv2_list()
    {

        $page = "abddv2_list";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }
        $data['settings'] = $this->SettingsModel->get_mis_settings();
        $data['title'] = 'Qualified Applicant/s';

        $this->load->view('pages/' . $page, $data);
    }

    public function school_applicant()
    {

        $page = "applicant_list";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }

        if ($this->uri->segment(4) == 0) {
            $data['data'] = $this->Common->three_cond('hris_applications', 'jobID', $this->uri->segment(3), 'pre_school', $this->session->c_id, 'appStatus', 'Application Submitted');
        } else {
            $data['data'] = $this->Common->two_cond('hris_applications', 'jobID', $this->uri->segment(3), 'pre_school', $this->session->c_id);
        }



        $this->load->view('templates/head');
        $this->load->view('templates/header');
        $this->load->view('pages/' . $page, $data);
        $this->load->view('templates/footer');
    }

    public function sa_view_applicant()
    {

        $job = $this->Common->one_cond_row('hris_jobvacancy', 'jobID', $this->uri->segment(3));
        if ($job->position == 1) {
            $page = "applicant_list_sa";
        } else {
            $page = "applicant_list_sa_none";
        }



        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }


        $data['data'] = $this->Common->two_cond('hris_applications', 'jobID', $this->uri->segment(3), 'appStatus', 'Validated');
        $data['district'] = $this->Common->no_cond('district');
        $data['job'] = $this->Common->one_cond_row('hris_jobvacancy', 'jobID', $this->uri->segment(3));

        $this->load->view('templates/head');
        $this->load->view('templates/header');
        $this->load->view('pages/' . $page, $data);
        $this->load->view('templates/footer');
    }

    public function sa_view_applicant_endorsed()
    {

        $page = "applicant_list_sav2";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }


        $data['data'] = $this->Common->two_cond('hris_applications', 'jobID', $this->uri->segment(3), 'appStatus', 'Endorsed for Rating');
        $data['district'] = $this->Common->no_cond('district');
        $data['job'] = $this->Common->one_cond_row('hris_jobvacancy', 'jobID', $this->uri->segment(3));

        $this->load->view('templates/head');
        $this->load->view('templates/header');
        $this->load->view('pages/' . $page, $data);
        $this->load->view('templates/footer');
    }

    public function evaluator_applicant()
    {

        $page = "applicant_list";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }

        $jobID = $this->uri->segment(3);
		$data['data'] = $this->Common->get_applicant_by_appstatus($jobID,'Endorsed for Rating','1');

        // $d = $this->Common->one_cond_row('district', 'id', $this->session->c_id);


        // $job = $this->Common->one_cond_row('hris_jobvacancy', 'jobID', $this->uri->segment(3));
        // if ($job->position == 1) {
        //     $data['data'] = $this->Common->four_cond_or('hris_applications', 'jobID', $this->uri->segment(3),'district',$d->discription,'appStatus','Endorsed for Rating','dq',1,'appStatus','Rated','appStatus','Rated');
        //     //$data['data'] = $this->Common->four_cond('hris_applications', 'jobID', $this->uri->segment(3), 'appStatus', 'Endorsed for Rating', 'dq', 1, 'district', $d->discription);
        // } else {
        //     if ($this->session->eg == 1) {
        //         $data['data'] = $this->Common->three_cond('hris_applications', 'jobID', $this->uri->segment(3), 'appStatus', 'Endorsed for Rating', 'dq', 1);
        //     } else {
        //         $data['data'] = $this->Common->three_cond('hris_applications', 'jobID', $this->uri->segment(3), 'appStatus', 'Rated', 'dq', 1);
        //     }
        // }

        $this->load->view('templates/head');
        $this->load->view('templates/header');
        $this->load->view('pages/' . $page, $data);
        $this->load->view('templates/footer');
    }

    public function Unqualified()
    {
        $dq = $this->input->post('remarks');
        $this->Reg->update_dq($dq);
        $this->Reg->insert_dq();
        if ($dq == 1) {
            $this->Reg->ap_change_stat('Endorsed for Rating');
            $this->Reg->ap_trackv2('Endorsed for Rating.');
                $rate = $this->Common->two_cond_count_row('hris_applications_rating', 'appID', $this->input->post('appID'), 'record_no', $this->input->post('record_no'));
                if ($rate->num_rows() <= 0) {

                    $job = $this->Common->one_cond_row('hris_jobvacancy', 'jobID', $this->input->post('jobID'));

                    $this->Reg->insert_ndq_rate($job->position, $job->sy);
                    //$this->Reg->ap_track('The submitted documents has been Validated.');
                }

        }
        if ($this->input->post('job_type') == 3) {
            $this->Reg->educ_jhss_update();
        }
        if ($this->input->post('job_type') == 4) {
            $this->Reg->educ_shss_update();
        }

        $this->session->set_flashdata('success', 'Successfuly Updated');
        redirect(base_url() . 'pages/validated_list/' . $this->input->post('jobID') . '/?district=' . $this->input->post('dist'));
    }

    public function multi_remarks() {
        date_default_timezone_set('Asia/Manila');
        $date = date('Y-m-d');
        $fy = date('Y'); 
        $t = date('h:i:s a', time());
        $li = ($this->input->post('li') == '') ? 0 : 1;
        $da_pds = ($this->input->post('da_pds') == '') ? 0 : 1;
        $prc = ($this->input->post('prc') == '') ? 0 : 1;
        $trbd = ($this->input->post('trbd') == '') ? 0 : 1;
        $omni = ($this->input->post('omni') == '') ? 0 : 1;

        $educ = ($this->input->post('educ') == '') ? 0 : 1;
        $exp = ($this->input->post('exp') == '') ? 0 : 1;
        $tr = ($this->input->post('tr') == '') ? 0 : 1;
        $eli = ($this->input->post('eli') == '') ? 0 : 1;

        $dq = $this->input->post('remarks');

        $selected = $this->input->post('app'); 
        $job_ids = $this->input->post('job_id'); 
        if (!empty($selected)) {
            foreach ($selected as $appID => $val) {
                $jobID = $job_ids[$appID] ?? null;

                $data = [
                    'appID' => $val,
                    'jobID' => $jobID, 
                    'apID' => $this->input->post('id'), 
                    'li' => $li, 
                    'da_pds' => $da_pds, 
                    'prc' => $prc, 
                    'trbd' => $trbd, 
                    'omni' => $omni, 
                    'local' => $this->input->post('local'), 
                    'remarks' => $this->input->post('remarks'), 
                    'reason' => $this->input->post('reason'), 
                    'vdate' => $date,
                    'res' => $this->session->id,
                    'educ' => $educ,
                    'exp' => $exp,
                    'tr' => $tr,
                    'eli' => $eli,
                    'fy' =>  $fy
                ];
    
                $this->db->insert('hris_app_dq', $data);

                $ivyclaire = array(
                    'record_no' => $this->input->post('record_no'), 
                    'appID' => $val,
                    'education' => .00001, 
                    'training' => .00001, 
                    'experience' => .00001, 
                    'let_rating' => .00001, 
                    'demo_rating' => .00001, 
                    'tr_rating' => .00001,
                    'job_type' => $this->input->post('job_type'),
                    'fy' => $this->input->post('fy'),
                );

                $this->db->insert('hris_applications_rating', $ivyclaire);

                if($dq == 1){
                    $stat = 'Endorsed for Rating';
                }else{
                    $stat = 'Validated'; 
                }

                $update_data = [
                    'appStatus' => $stat,
                    'dq' => $dq,
                ];
                $this->db->where('appID', $val);
                $this->db->update('hris_applications', $update_data);

            }
            $this->session->set_flashdata('success', 'Data successfully inserted!');
        } else {
            $this->session->set_flashdata('error', 'No job selected.');
        }
    
        redirect(base_url() . 'pages/validated_list/' . $this->input->post('jobID') . '/?district=' . $this->input->post('dist'));
    }

    public function Unqualified_none()
    {
        $dq = $this->input->post('remarks');
        $this->Reg->update_dq($dq);
        $this->Reg->insert_dq();
        if ($dq == 1) {
            $this->Reg->ap_change_stat('Endorsed for Rating');
            $this->Reg->ap_trackv2('Endorsed for Rating.');
        }
        $this->Reg->insert_rate_none();


        $this->session->set_flashdata('success', 'Successfuly Updated');
        redirect(base_url() . 'pages/validated_list/' . $this->input->post('jobID') . '/?district=' . $this->input->post('dist'));
    }

    public function Unqualified_promotion()
    {
        $dq = $this->input->post('remarks');
        $this->Reg->update_dq($dq);
        $this->Reg->insert_dq();
        if ($dq == 1) {
            $this->Reg->ap_change_stat('Endorsed for Rating');
            $this->Reg->ap_trackv2('Endorsed for Rating.');
        }
        $this->Reg->insert_rate_promotion();


        $this->session->set_flashdata('success', 'Successfuly Updated');
        redirect(base_url() . 'pages/validated_list/' . $this->input->post('jobID') . '/?district=' . $this->input->post('dist'));
    }

    public function Unqualifiededit()
    {
        $dq = $this->input->post('remarks');
        $this->Reg->update_dq($dq);
        $this->Reg->update_dq2();
        if ($dq == 2) {
            $this->Reg->ap_change_stat('Validated');
            $this->Common->tcd('hris_applications_track', 'app_id', $this->input->post('appID'), 'appStatus', 'Endorsed for Rating.');
        }
        if ($dq == 1) {
            $this->Reg->ap_change_stat('Endorsed for Rating');
            $this->Reg->ap_trackv2('Endorsed for Rating.');
        }
        // if($this->input->post('job_type') == 2){
        //     $this->Reg-> educ_jhss_update();
        // }
        // if($this->input->post('job_type') == 3){
        //     $this->Reg-> educ_shss_update();
        // }

        $this->session->set_flashdata('success', 'Successfuly Updated');
        redirect(base_url() . 'pages/validated_list/' . $this->input->post('jobID') . '/?district=' . $this->input->post('dist'));
    }

    public function qualified()
    {
        $this->Reg->update_dq(0);
        $this->session->set_flashdata('success', 'Successfuly Updated');
        redirect(base_url() . 'pages/evaluator_applicant/' . $this->input->post('jobID'));
    }

    public function update_educ_rate()
    {

        $rn = $this->input->post('record_no');
        $appID = $this->input->post('app_id');
        $user = $this->input->post('page');
        if (empty($user)) {
            $page = 'ma';
        } else {
            $page = 'ma_staff';
        }

        $check = $this->Common->two_cond_row('hris_applications_rating', 'record_no', $rn, 'appId', $appID);
        if ($this->input->post('education') <= 10) {

            if ($check->eval_id1 == 0) {
                $this->Reg->update_eval('eval_id1');
            }

            $this->Reg->update_rate('education');
            $this->Reg->update_remarks('educ_remarks');

            $this->Reg->ap_track('The education rating has been encoded.');
            $this->session->set_flashdata('success', 'Successfuly Saved');
            redirect(base_url() . 'pages/' . $page . '/' . $this->uri->segment(3) . '/' . $this->uri->segment(4) . '/' . $this->input->post('school_id') . '/' . $this->input->post('app_id') . '/' . $this->input->post('record_no') . '#efile');
        } else {
            $this->session->set_flashdata('danger', 'The points exceeded the maximum allowed value.');
            redirect(base_url() . 'pages/' . $page . '/' . $this->uri->segment(3) . '/' . $this->uri->segment(4) . '/' . $this->input->post('school_id') . '/' . $this->input->post('app_id') . '/' . $this->input->post('record_no'));
        }
    }

    public function update_educ_rate_none()
    {

        $rn = $this->input->post('record_no');
        $appID = $this->input->post('app_id');

        $check = $this->Common->two_cond_row('hris_rating_none', 'record_no', $rn, 'appId', $appID);
        if ($this->input->post('educ') <= $this->input->post('max')) {

            if ($check->eval_id1 == 0) {
                $this->Reg->update_eval_none('eval_id1');
            }

            $this->Reg->update_rate_none('educ');
            $this->Reg->update_remarks('educ_remarks');
            
            $this->Reg->ap_track('The TOR & CAV - College / Graduate Studies rating has been encoded.');
            $this->session->set_flashdata('success', 'Successfuly Saved');
            redirect(base_url() . 'pages/' . $this->input->post('page') . '/' . $this->uri->segment(3) . '/' . $this->uri->segment(4) . '/' . $this->input->post('school_id') . '/' . $this->input->post('app_id') . '/' . $this->input->post('record_no') . '#efile');
        } else {
            $this->session->set_flashdata('danger', 'The points exceeded the maximum allowed value.');
            redirect(base_url() . 'pages/' . $this->input->post('page') . '/' . $this->uri->segment(3) . '/' . $this->uri->segment(4) . '/' . $this->input->post('school_id') . '/' . $this->input->post('app_id') . '/' . $this->input->post('record_no'));
        }
    }

    public function update_educ_rate_promotion()
    {

        $rn = $this->input->post('record_no');
        $appID = $this->input->post('app_id');

        $check = $this->Common->two_cond_row('hris_rating_promotion', 'record_no', $rn, 'appId', $appID);
        if ($this->input->post('educ') <= $this->input->post('max')) {

            if ($check->eval_id1 == 0) {
                $this->Reg->update_eval_promotion('eval_id1');
            }

            $this->Reg->update_rate_promotion('educ');
            $this->Reg->ap_track('The TOR & CAV - College / Graduate Studies rating has been encoded.');
            $this->session->set_flashdata('success', 'Successfuly Saved');
            redirect(base_url() . 'pages/' . $this->input->post('page') . '/' . $this->uri->segment(3) . '/' . $this->uri->segment(4) . '/' . $this->input->post('school_id') . '/' . $this->input->post('app_id') . '/' . $this->input->post('record_no') . '#efile');
        } else {
            $this->session->set_flashdata('danger', 'The points exceeded the maximum allowed value.');
            redirect(base_url() . 'pages/' . $this->input->post('page') . '/' . $this->uri->segment(3) . '/' . $this->uri->segment(4) . '/' . $this->input->post('school_id') . '/' . $this->input->post('app_id') . '/' . $this->input->post('record_no'));
        }
    }

    public function update_let_rate(){

        $rn = $this->input->post('record_no');
        $appID = $this->input->post('app_id');
        $user = $this->input->post('page');
        if (empty($user)) {
            $page = 'ma';
        } else {
            $page = 'ma_staff';
        }

        $check = $this->Common->two_cond_row('hris_applications_rating', 'record_no', $rn, 'appId', $appID);
        if ($this->input->post('let_rating') <= 10) {

            if ($check->eval_id1 == 0) {
                $this->Reg->update_eval('eval_id1');
            }

            $this->Reg->update_rate('let_rating');
            $this->Reg->ap_track('The LET rating has been encoded.');
            $this->session->set_flashdata('success', 'Successfuly Saved');
            redirect(base_url() . 'pages/' . $page . '/' . $this->uri->segment(3) . '/' . $this->uri->segment(4) . '/' . $this->input->post('school_id') . '/' . $this->input->post('app_id') . '/' . $this->input->post('record_no') . '#lr');
        } else {
            $this->session->set_flashdata('danger', 'The points exceeded the maximum allowed value.');
            redirect(base_url() . 'pages/' . $page . '/' . $this->uri->segment(3) . '/' . $this->uri->segment(4) . '/' . $this->input->post('school_id') . '/' . $this->input->post('app_id') . '/' . $this->input->post('record_no') . '#lr');
        }
    }

    public function update_tr_ic_rate()
    {

        $rn = $this->input->post('record_no');
        $appID = $this->input->post('app_id');
        $user = $this->input->post('page');
        if (empty($user)) {
            $page = 'ma';
        } else {
            $page = 'ma_staff';
        }

        $check = $this->Common->two_cond_row('hris_applications_rating', 'record_no', $rn, 'appId', $appID);
        if ($this->input->post('tr_rating') <= 25) {

            if ($check->eval_id1 == 0) {
                $this->Reg->update_eval('eval_id3');
            }

            $this->Reg->update_rate('tr_rating');
            $this->Reg->ap_track('Teachers Reflection rating has been encoded.');
            $this->session->set_flashdata('success', 'Successfuly Saved');
            redirect(base_url() . 'pages/' . $page . '/' . $this->uri->segment(3) . '/' . $this->uri->segment(4) . '/' . $this->input->post('school_id') . '/' . $this->input->post('app_id') . '/' . $this->input->post('record_no') . '#lr');
        } else {
            $this->session->set_flashdata('danger', 'The points exceeded the maximum allowed value.');
            redirect(base_url() . 'pages/' . $page . '/' . $this->uri->segment(3) . '/' . $this->uri->segment(4) . '/' . $this->input->post('school_id') . '/' . $this->input->post('app_id') . '/' . $this->input->post('record_no') . '#lr');
        }
    }

    public function update_demo_ic_rate()
    {

        $rn = $this->input->post('record_no');
        $appID = $this->input->post('app_id');
        $user = $this->input->post('page');
        if (empty($user)) {
            $page = 'ma';
        } else {
            $page = 'ma_staff';
        }

        $check = $this->Common->two_cond_row('hris_applications_rating', 'record_no', $rn, 'appId', $appID);
        if ($this->input->post('demo_rating') <= 35) {

            if ($check->eval_id1 == 0) {
                $this->Reg->update_eval('eval_id2');
            }

            $this->Reg->update_rate('demo_rating');
            $this->Reg->ap_track('Demo rating has been encoded.');
            $this->session->set_flashdata('success', 'Successfuly Saved');
            redirect(base_url() . 'pages/' . $this->uri->segment(7) . '/' . $this->uri->segment(3) . '/' . $this->uri->segment(4) . '/' . $this->input->post('school_id') . '/' . $this->input->post('app_id') . '/' . $this->input->post('record_no') . '#lr');
        } else {
            $this->session->set_flashdata('danger', 'The points exceeded the maximum allowed value.');
            redirect(base_url() . 'pages/' . $page . '/' . $this->uri->segment(3) . '/' . $this->uri->segment(4) . '/' . $this->input->post('school_id') . '/' . $this->input->post('app_id') . '/' . $this->input->post('record_no') . '#lr');
        }
    }

    public function update_training_rate(){
        $rn = $this->input->post('record_no');
        $appID = $this->input->post('app_id');
        $user = $this->input->post('page');
        if (empty($user)) {
            $page = 'ma';
        } else {
            $page = 'ma_staff';
        }
        $check = $this->Common->two_cond_row('hris_rating_none', 'record_no', $rn, 'appId', $appID);
        if($this->input->post('training') <= 10){
            // if($check->eval_id1 == 0){
            //     $this->Reg->update_eval('eval_id1');
            // }
            $this->Reg->update_rate('training');
            $this->Reg->update_remarks('training_remarks');

            $this->Reg->ap_track('The trainings and seminars rating has been encoded.');
            $this->session->set_flashdata('success', 'Successfuly Saved');
            redirect(base_url() . 'pages/' . $page . '/' . $this->uri->segment(3) . '/' . $this->uri->segment(4) . '/' . $this->input->post('school_id') . '/' . $this->input->post('app_id') . '/' . $this->input->post('record_no') . '#tsc');
        } else {
            $this->session->set_flashdata('danger', 'The points exceeded the maximum allowed value.');
            redirect(base_url() . 'pages/' . $page . '/' . $this->uri->segment(3) . '/' . $this->uri->segment(4) . '/' . $this->input->post('school_id') . '/' . $this->input->post('app_id') . '/' . $this->input->post('record_no') . '#tsc');
        }
    }

    public function update_rate_none()
    {

        $rn = $this->input->post('record_no');
        $appID = $this->input->post('app_id');
        $col = $this->input->post('col');
        $remarks = $this->input->post('remark_col');
        $message = $this->input->post('message');
        $maxpoint = $this->input->post('maxpoint');

        $check = $this->Common->two_cond_row('hris_rating_none', 'record_no', $rn, 'appId', $appID);
        if ($this->input->post($col) <= $maxpoint) {

            if ($check->eval_id1 == 0) { 
                $this->Reg->update_eval_none('eval_id1');
            }

            $this->Reg->update_rate_none($col);
            $this->Reg->update_remarks($remarks);
            $this->Reg->ap_track('The ' . $message . ' rating has been encoded.');
            $this->session->set_flashdata('success', 'Successfuly Saved');
            redirect(base_url() . 'pages/' . $this->input->post('page') . '/' . $this->uri->segment(3) . '/' . $this->uri->segment(4) . '/' . $this->input->post('school_id') . '/' . $this->input->post('app_id') . '/' . $this->input->post('record_no') . '#tsc');
        } else {
            $this->session->set_flashdata('danger', 'The points exceeded the maximum allowed value.');
            redirect(base_url() . 'pages/' . $this->input->post('page') . '/' . $this->uri->segment(3) . '/' . $this->uri->segment(4) . '/' . $this->input->post('school_id') . '/' . $this->input->post('app_id') . '/' . $this->input->post('record_no') . '#tsc');
        }
    }

    public function update_rate_nonev2()
    {

        $rn = $this->input->post('record_no');
        $appID = $this->input->post('app_id');
        $col = $this->input->post('col');
        $remarks = $this->input->post('remark_col');
        $message = $this->input->post('message');
        $maxpoint = $this->input->post('maxpoint');

        $check = $this->Common->two_cond_row('hris_rating_none', 'record_no', $rn, 'appId', $appID);
        if ($this->input->post($col) <= $maxpoint) {

            if ($check->eval_id1 == 0) { 
                $this->Reg->update_eval_none('eval_id1');
            }

            $this->Reg->update_rate_none($col);
            $this->Reg->ap_track('The ' . $message . ' rating has been encoded.');
            $this->session->set_flashdata('success', 'Successfuly Saved');
            redirect(base_url() . 'pages/' . $this->input->post('page') . '/' . $this->uri->segment(3) . '/' . $this->uri->segment(4) . '/' . $this->input->post('school_id') . '/' . $this->input->post('app_id') . '/' . $this->input->post('record_no') . '#tsc');
        } else {
            $this->session->set_flashdata('danger', 'The points exceeded the maximum allowed value.');
            redirect(base_url() . 'pages/' . $this->input->post('page') . '/' . $this->uri->segment(3) . '/' . $this->uri->segment(4) . '/' . $this->input->post('school_id') . '/' . $this->input->post('app_id') . '/' . $this->input->post('record_no') . '#tsc');
        }
    }

    public function update_rate_promotion()
    {

        $rn = $this->input->post('record_no');
        $appID = $this->input->post('app_id');
        $col = $this->input->post('col');
        $message = $this->input->post('message');
        $maxpoint = $this->input->post('maxpoint');

        $check = $this->Common->two_cond_row('hris_rating_promotion', 'record_no', $rn, 'appId', $appID);
        if ($this->input->post($col) <= $maxpoint) {

            if ($check->eval_id1 == 0) {
                $this->Reg->update_eval_none('eval_id1');
            }

            $this->Reg->update_rate_promotion($col);
            $this->Reg->ap_track('The ' . $message . ' rating has been encoded.');
            $this->session->set_flashdata('success', 'Successfuly Saved');
            redirect(base_url() . 'pages/' . $this->input->post('page') . '/' . $this->uri->segment(3) . '/' . $this->uri->segment(4) . '/' . $this->input->post('school_id') . '/' . $this->input->post('app_id') . '/' . $this->input->post('record_no') . '#tsc');
        } else {
            $this->session->set_flashdata('danger', 'The points exceeded the maximum allowed value.');
            redirect(base_url() . 'pages/' . $this->input->post('page') . '/' . $this->uri->segment(3) . '/' . $this->uri->segment(4) . '/' . $this->input->post('school_id') . '/' . $this->input->post('app_id') . '/' . $this->input->post('record_no') . '#tsc');
        }
    }

    public function update_rate_none_eval2()
    {

        $rn = $this->input->post('record_no');
        $appID = $this->input->post('app_id');
        $col = $this->input->post('col');
        $message = $this->input->post('message');
        $maxpoint = $this->input->post('maxpoint');

        $check = $this->Common->two_cond_row('hris_rating_none', 'record_no', $rn, 'appId', $appID);
        if ($this->input->post($col) <= $maxpoint) {

            if ($check->eval_id2 == 0) {
                $this->Reg->update_eval_none('eval_id2');
            }

            $this->Reg->update_rate_none($col);
            //$this->Reg->ap_track('The '. $message. ' rating has been encoded.');
            $this->session->set_flashdata('success', 'Successfuly Saved');
            redirect(base_url() . 'pages/' . $this->input->post('page') . '/' . $this->uri->segment(3));
        } else {
            $this->session->set_flashdata('danger', 'The points exceeded the maximum allowed value.');
            redirect(base_url() . 'pages/' . $this->input->post('page') . '/' . $this->uri->segment(3));
        }
    }

    public function update_rate_none_eval3()
    {

        $rn = $this->input->post('record_no');
        $appID = $this->input->post('app_id');
        $col = $this->input->post('col');
        $message = $this->input->post('message');
        $maxpoint = $this->input->post('maxpoint');

        $check = $this->Common->two_cond_row('hris_rating_none', 'record_no', $rn, 'appId', $appID);
        if ($this->input->post($col) <= $maxpoint) {

            if ($check->eval_id3 == 0) {
                $this->Reg->update_eval_none('eval_id3');
            }

            $this->Reg->update_rate_none($col);
            //$this->Reg->ap_track('The '. $message. ' rating has been encoded.');
            $this->session->set_flashdata('success', 'Successfuly Saved');
            redirect(base_url() . 'pages/' . $this->input->post('page') . '/' . $this->uri->segment(3));
        } else {
            $this->session->set_flashdata('danger', 'The points exceeded the maximum allowed value.');
            redirect(base_url() . 'pages/' . $this->input->post('page') . '/' . $this->uri->segment(3));
        }
    }

    public function update_we_rate()
    {

        $rn = $this->input->post('record_no');
        $appID = $this->input->post('app_id');
        $user = $this->input->post('page');
        if (empty($user)) {
            $page = 'ma';
        } else {
            $page = 'ma_staff';
        }

        $check = $this->Common->two_cond_row('hris_applications_rating', 'record_no', $rn, 'appId', $appID);
        if ($this->input->post('training') <= 10) {

            if ($check->eval_id1 == 0) {
                $this->Reg->update_eval('eval_id1');
            }

            $this->Reg->update_rate('experience');
            $this->Reg->update_remarks('experience_remarks');
            
            $this->Reg->ap_track('The experience rating has been encoded.');
            $this->session->set_flashdata('success', 'Successfuly Saved');
            redirect(base_url() . 'pages/' . $page . '/' . $this->uri->segment(3) . '/' . $this->uri->segment(4) . '/' . $this->input->post('school_id') . '/' . $this->input->post('app_id') . '/' . $this->input->post('record_no') . '#ept');
        } else {
            $this->session->set_flashdata('danger', 'The points exceeded the maximum allowed value.');
            redirect(base_url() . 'pages/' . $page . '/' . $this->uri->segment(3) . '/' . $this->uri->segment(4) . '/' . $this->input->post('school_id') . '/' . $this->input->post('app_id') . '/' . $this->input->post('record_no') . '#ept');
        }
    }

    public function update_dm_rate()
    {
        if ($this->input->post('demo_rating') <= 35) {

            $this->Reg->update_rate('demo_rating');
            $this->Reg->update_eval('eval_id2');
            $this->Reg->ap_track_apply('The demo rating has been encoded.', $this->input->post('app_id'));
            $this->session->set_flashdata('success', 'Successfuly Saved');
            if ($this->session->position == 'asds') {
                redirect(base_url() . 'pages/applicant_app/' . $this->input->post('record_no'));
            }
            redirect(base_url() . 'pages/evaluator_applicant/' . $this->uri->segment(4));
        } else {
            $this->session->set_flashdata('danger', 'The points exceeded the maximum allowed value.');
            redirect(base_url() . 'pages/evaluator_applicant/' . $this->uri->segment(4));
        }
    }

    public function update_cdm_rate()
    {
        if ($this->input->post('demo_rating') <= 35) {
            $this->Reg->update_rate('demo_rating');
            $this->Reg->ap_track_apply('The demo rating has been encoded.', $this->input->post('app_id'));
            $this->session->set_flashdata('success', 'Successfuly Saved');
            redirect(base_url() . 'pages/evaluator_applicant/' . $this->uri->segment(3));
        } else {
            $this->session->set_flashdata('danger', 'The points exceeded the maximum allowed value.');
            redirect(base_url() . 'pages/evaluator_applicant/' . $this->uri->segment(3));
        }
    }

    public function update_tr_rate()
    {
        if ($this->input->post('tr_rating') <= 25) {
            $this->Reg->update_rate('tr_rating');
            $this->Reg->update_eval('eval_id3');
            $this->Reg->ap_track_apply("The teacher's reflection rating has been encoded.", $this->input->post('app_id'));
            $this->session->set_flashdata('success', 'Successfuly Saved');
            if ($this->session->position == 'asds') {
                redirect(base_url() . 'pages/applicant_app/' . $this->input->post('record_no'));
            }
            redirect(base_url() . 'pages/evaluator_applicant/' . $this->uri->segment(4));
        } else {
            $this->session->set_flashdata('danger', 'The points exceeded the maximum allowed value.');
            redirect(base_url() . 'pages/evaluator_applicant/' . $this->uri->segment(4));
        }
    }

    public function update_trc_rate()
    {
        if ($this->input->post('tr_rating') <= 25) {
            $this->Reg->ap_track_apply("The teacher's reflection rating has been encoded.", $this->input->post('app_id'));
            $this->session->set_flashdata('success', 'Successfuly Saved');
            redirect(base_url() . 'pages/evaluator_applicant/' . $this->uri->segment(4));
        } else {
            $this->session->set_flashdata('danger', 'The points exceeded the maximum allowed value.');
            redirect(base_url() . 'pages/evaluator_applicant/' . $this->uri->segment(4));
        }
    }

    public function closed_vacancy()
    {
        $this->Reg->applicant_stat(1);
        $this->Reg->application_close_open(1);
        $this->Reg->lock_applicant_application('hris_staff', $this->uri->segment(3), 'IDNumber');
        $this->Reg->lock_applicant_application('hris_applicant', $this->uri->segment(3), 'empEmail ');
        $this->session->set_flashdata('success', 'Successfuly Saved');
        redirect(base_url() . 'page/jobVacancy');
    }
    public function open_vacancy()
    {
        $this->Reg->applicant_stat(0);
        $this->Reg->application_close_open(0);
        $this->session->set_flashdata('success', 'Successfuly Saved');
        redirect(base_url() . 'page/jobVacancy');
    }

    public function lock_applications()
    {
        $this->Reg->lock_application(1);
        $this->Reg->lock_applications(1);
        $this->Reg->applicant_stat(1);
        $this->session->set_flashdata('success', 'Successfuly Saved');
        redirect(base_url() . 'page/jobVacancy');
    }

    public function unlock_ads()
    {
        $this->Reg->lock_applicant_document_submission('hris_applicant', 0);
        $this->Reg->lock_applicant_document_submission('hris_staff', 0);
        $this->session->set_flashdata('success', 'Successfuly Saved');
        redirect(base_url() . 'page/jobVacancy');
    }

    public function lock_ads()
    {
        $this->Reg->lock_applicant_document_submission('hris_applicant', 1);
        $this->Reg->lock_applicant_document_submission('hris_staff', 1);
        $this->session->set_flashdata('success', 'Successfuly Saved');
        redirect(base_url() . 'page/jobVacancy');
    }

    public function unlock_applications()
    {
        $this->Reg->lock_application(0);
        $this->Reg->lock_applications(0);
        $this->Reg->applicant_stat(0);
        $this->session->set_flashdata('success', 'Successfuly Saved');
        redirect(base_url() . 'page/jobVacancy');
    }

    public function in_lock_applications()
    {
        $this->Reg->in_lock_application(1);

        // $ee = $this->input->get('ee');
        // if(strpos($ee, '@deped.gov.ph') !== false) { 
        //     $this->Reg->lock_staff(1);
        // }else{
        //     $this->Reg->lock_applicant(1);
        // }


        $this->session->set_flashdata('success', 'Successfuly Saved');
        redirect(base_url() . 'page/viewApplicants?jobID=' . $this->uri->segment(3) . '&jobTitle=' . $this->input->get('jt'));
    }



    public function unlock_applicant()
    {
        $this->Reg->applicant_status(0);
        $this->Reg->application_status(0);
        $this->session->set_flashdata('success', 'Successfuly Updated');
        redirect(base_url() . 'page/jobVacancy');
    }
    public function lock_applicant()
    {
        $this->Reg->application_status(1);
        $this->Reg->applicant_status(1);
        $this->session->set_flashdata('success', 'Successfuly Updated');
        redirect(base_url() . 'page/jobVacancy');
    }

    public function in_unlock_applications()
    {
        $this->Reg->in_lock_application(0);
        $this->Reg->unlock_applicant(0);
        $this->session->set_flashdata('success', 'Successfuly Saved');
        redirect(base_url() . 'page/viewApplicants?jobID=' . $this->uri->segment(3) . '&jobTitle=' . $this->input->get('jt'));
    }

    public function open_applications()
    {
        $id = $this->uri->segment(4);

        $this->Reg->in_lock_application(0);
        $this->Reg->unlock_applicant($id);
        $this->session->set_flashdata('success', 'Successfuly Saved');
        redirect(base_url() . 'page/viewApplicants?jobID=' . $this->uri->segment(3) . '&jobTitle=' . $this->input->get('jt'));
    }

    public function close_applications()
    {
        $id = $this->uri->segment(4);

        $this->Reg->in_lock_application(1);
        $this->Reg->lock_applicant($id);
        $this->session->set_flashdata('success', 'Successfuly Saved');
        redirect(base_url() . 'page/viewApplicants?jobID=' . $this->uri->segment(3) . '&jobTitle=' . $this->input->get('jt'));
    }

    public function edit_vacancy()
    {

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        ', '</div>');
        $this->form_validation->set_rules('empType', 'Position Type', 'required');

        if ($this->form_validation->run() == FALSE) {

            $page = "jobvacancy_edit";

            if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
                show_404();
            }

            $data['data'] = $this->Common->one_cond_row('hris_jobvacancy', 'jobID', $this->uri->segment(3));
            $data['pos_title'] = $this->Common->no_cond_order_by('hris_positions', 'title', 'ASC');

            $this->load->view('templates/head');
            $this->load->view('templates/header');
            $this->load->view('pages/' . $page, $data);
            $this->load->view('templates/footer');
        } else {

            $this->Reg->edit_jobvacancy();
            $this->session->set_flashdata('success', 'Update Job Vacancy.');
            redirect(base_url() . 'Page/jobVacancy');
        }
    }

    public function jobVacancy_file_update()
    {
        $config['allowed_types'] = 'pdf';
        $config['upload_path'] = './uploads/regfile';
        $new_name = time() . 'documents' . $this->input->post('jobID') . $_FILES["file_name"]['name'];
        $config['file_name'] = $new_name;
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('file')) {
            $jobID = $this->input->post('jobID');
            $reg = $this->Common->one_cond_row('hris_jobvacancy', 'jobID', $jobID);
            if (!empty($reg->file)) {
            unlink("uploads/regfile/" . $reg->file);
            }
            $this->Reg->doc_update();
            $this->session->set_flashdata('success', 'Successfully updated.');
            redirect(base_url() . 'Page/jobVacancy');
        } else {
            $this->session->set_flashdata('danger', $this->upload->display_errors());
            redirect(base_url() . 'Page/jobVacancy');
        }
    }

    public function application_history()
    {

        $page = "application_history";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }

        $data['data'] = $this->Common->two_cond_order_by('hris_applications_track', 'applicant_id', $this->uri->segment(3), 'app_id', $this->uri->segment(5), 'trackID', 'DESC');
        $data['job'] = $this->Common->one_cond_row('hris_jobvacancy', 'jobID', $this->uri->segment(4));
        $data['app'] = $this->Common->two_cond_row('hris_applications', 'applicant_id', $this->uri->segment(3), 'jobID', $this->uri->segment(4));


        $this->load->view('templates/head');
        $this->load->view('templates/header');
        $this->load->view('pages/' . $page, $data);
        $this->load->view('templates/footer');
    }

    public function inquiry()
    {

        $page = "application_inquiry";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }

        $data['data'] = $this->Common->two_cond_order_by('hris_application_inquiry', 'applicant_id', $this->uri->segment(3), 'application_id', $this->uri->segment(6), 'id', 'DESC');
        $data['job'] = $this->Common->one_cond_row('hris_jobvacancy', 'jobID', $this->uri->segment(4));
        $data['app'] = $this->Common->two_cond_row('hris_applications', 'applicant_id', $this->uri->segment(3), 'jobID', $this->uri->segment(4));
        $data['a'] = $this->Common->one_cond_row('hris_applicant', 'id', $this->uri->segment(3));


        $this->load->view('templates/head');
        $this->load->view('templates/header');
        $this->load->view('pages/' . $page, $data);
        $this->load->view('templates/footer');
    }

    public function inquiry_non()
    {

        $page = "application_inquiry_non";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }
        $applicant = $this->uri->segment(3);
        $appID = $this->uri->segment(6);
        $jobID = $this->uri->segment(4);

        $data['data'] = $this->Common->one_cond_order_by('hris_application_inquiry', 'application_id', $appID, 'id', 'DESC');
        $data['job'] = $this->Common->one_cond_row('hris_jobvacancy', 'jobID', $jobID);
        $data['app'] = $this->Common->one_cond_row('hris_applications', 'appID', $appID);
        //$data['a'] = $this->Common->one_cond_row('hris_applicant','id',$this->uri->segment(3));
        $this->Reg->update_query_stat($applicant,$jobID);


        $this->load->view('templates/head');
        $this->load->view('templates/header');
        $this->load->view('pages/' . $page, $data);
        $this->load->view('templates/footer');
    }

    public function appinquiry()
    {
        $this->Reg->app_inquiry();
        $this->session->set_flashdata('success', 'Successfuly Saved');
        redirect($_SERVER['HTTP_REFERER']); 
    }

    public function comment()
    {
        $comment = $this->input->post('comment');
        $this->Reg->ap_track_comment($comment);
        $this->session->set_flashdata('success', 'Successfuly Saved');
        redirect(base_url() . 'pages/application_history/' . $this->uri->segment(3) . '/' . $this->uri->segment(4) . '/' . $this->uri->segment(5) . '/' . $this->uri->segment(6));
    }


    public function remove_attachment()
    {
        $col = $this->uri->segment(6);
        $id = $this->uri->segment(3);
        $reg = $this->Common->one_cond_row('hris_applicant', 'id', $id);
        $this->Page_model->insert_at('Removed Attachment', $id);
        if (!empty($reg->$col)) {
        unlink("uploads/regfile/" . $reg->{$col});
        }
        $this->Reg->remove_attach($col);
        $this->session->set_flashdata('success', 'Successfuly Removed');
        redirect(base_url() . 'pages/ma/' . $this->uri->segment(3) . '/' . $this->uri->segment(4) . '/' . $this->uri->segment(5));
    }

    public function remove_attachment_staff()
    {
       $col = $this->uri->segment(6);
      $id = $this->uri->segment(3);
      $reg = $this->Common->one_cond_row('hris_staff', 'IDNumber', $id);
      $this->Page_model->insert_at('Removed Attachment', $id);

      $file = "uploads/regfile/" . $reg->{$col};
      if (is_file($file)) {
        unlink($file);
    }

    $this->Reg->remove_attach_staff($col);
    $this->session->set_flashdata('success', 'Successfully Removed');

    redirect(base_url() . 'pages/ma_staff/' . $this->uri->segment(3) . '/' . $this->uri->segment(4) . '/' . $this->uri->segment(5));
    }

    public function remove_attachment_app()
    {
        $col = $this->uri->segment(6);
        $id = $this->uri->segment(7);
        $reg = $this->Common->one_cond_row('hris_applications', 'appID', $id);
        if (!empty($reg->$col)) {
        unlink("uploads/regfile/" . $reg->{$col});
        }
        $this->Reg->remove_attach_app($col);
        $this->session->set_flashdata('success', 'Successfuly Removed');
        redirect(base_url() . 'pages/ma/' . $this->uri->segment(3) . '/' . $this->uri->segment(4) . '/' . $this->uri->segment(5));
    }

    public function remove_attachment_app_none()
    {
        $col = $this->uri->segment(6);
        $id = $this->uri->segment(7);
        $reg = $this->Common->one_cond_row('hris_applications', 'appID', $id);
        if (!empty($reg->$col)) {
        unlink("uploads/regfile/" . $reg->{$col});
        }
        $this->Reg->remove_attach_app($col);
        $this->session->set_flashdata('success', 'Successfuly Removed');
        redirect(base_url() . 'pages/ma_staff/' . $this->uri->segment(3) . '/' . $this->uri->segment(4) . '/' . $this->uri->segment(5));
    }

    public function nofitychangestat()
    {
        $this->Reg->notifychange();
        redirect(base_url() . 'Pages/application_history/' . $this->uri->segment(3) . '/' . $this->uri->segment(4) . '/0/' . $this->uri->segment(5));
    }

    public function nofitychangestatadmin()
    {
        $this->Reg->notifychangeadmin();
        redirect(base_url() . 'Pages/application_history/' . $this->uri->segment(3) . '/' . $this->uri->segment(4) . '/0/' . $this->uri->segment(5));
    }

    public function school_list_applicant()
    {

        $page = "list_school_applicant";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }

        $dist = $this->Common->one_cond_row('district', 'id', $this->session->c_id);

        $data['data'] = $this->Common->two_cond_group('hris_applications', 'jobID', $this->uri->segment(3), 'district', $dist->discription, 'pre_school');




        $this->load->view('templates/head');
        $this->load->view('templates/header');
        $this->load->view('pages/' . $page, $data);
        $this->load->view('templates/footer');
    }

    public function school_list()
    {

        $page = "school_list";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }

        $dist = $this->Common->one_cond_row('district', 'id', $this->session->c_id);

        $data['data'] = $this->Common->one_cond('schools', 'district', $dist->discription);


        $this->load->view('templates/head');
        $this->load->view('templates/header');
        $this->load->view('pages/' . $page, $data);
        $this->load->view('templates/footer');
    }

    public function school_generate_report()
    {

        $page = "school_report";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }

        $fy = date('Y');
        //$dist = $this->Common->one_cond_row('district', 'id',$this->session->c_id);
        //$data['data'] = $this->Common->one_cond('schools', 'district',$dist->discription);
        $data['title'] = 'Validated Applicant';
        //$data['data'] = $this->Common->three_cond_not_equal('hris_applications', 'pre_school',$this->session->c_id,'app_year',$fy,'appStatus','Application Submitted','applicant_id','ASC');
        $data['job'] = $this->Common->one_cond_loop_order_by('hris_jobvacancy', 'sy', $fy, 'jobID', 'Desc');

        $this->load->view('pages/' . $page, $data);
    }

    public function district_generate_report()
    {

        $page = "district_report";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }

        $fy = $this->input->post('fy');
        $dist = $this->Common->one_cond_row('district', 'id', $this->session->c_id);
        $data['district'] = $this->Common->one_cond_row('district', 'id', $this->session->c_id);
        $data['title'] = 'Validated Applicant';
        $data['data'] = $this->Common->three_cond_not_equal('hris_applications', 'district', $dist->discription, 'app_year', $fy, 'appStatus', 'Application Submitted', 'applicant_id', 'ASC');


        $this->load->view('pages/' . $page, $data);
    }

    public function dgr()
    {

        $page = "district_transmittal";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }

        $fy = date('Y');
        $dist = $this->Common->one_cond_row('district', 'id', $this->session->c_id);
        $data['district'] = $this->Common->one_cond_row('district', 'id', $this->session->c_id);
        $data['title'] = 'Validated Applicant';
        $data['data'] = $this->Common->three_cond_not_equal_gb('hris_applications', 'district', $dist->discription, 'app_year', $fy, 'appStatus', 'Application Submitted', 'applicant_id', 'ASC', 'pre_school');


        $this->load->view('pages/' . $page, $data);
    }

    public function validated_applicant()
    {

        $page = "validated";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }

        $fy = date('Y');
        $dist = $this->Common->one_cond_row('district', 'id', $this->session->c_id);
        $data['district'] = $this->Common->one_cond_row('district', 'id', $this->session->c_id);
        $data['title'] = 'Validated Applicant';
        if ($this->session->position === 'HR Staff' || $this->session->position === 'Human Resource Admin' || $this->session->position === 'asds' || $this->session->position === 'Super Admin' || $this->session->position === 'Admin') {
            //$data['data'] = $this->Common->two_cond('hris_applications', 'app_year', $fy, 'appStatus', 'Validated');
            $data['data'] = $this->Common->get_applicant_staff_validated('Open','Validated');
        } else {
            $data['data'] = $this->Page_model->get_applicant_staff_validated_school_account('Open','Validated');
        }

        $this->load->view('templates/head');
        $this->load->view('templates/header');
        $this->load->view('pages/' . $page, $data);
        $this->load->view('templates/footer');
    }






    public function applicant_list()
    {

        $page = "validated";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }

        $fy = date('Y');
        $dist = $this->Common->one_cond_row('district', 'id', $this->session->c_id);
        $data['district'] = $this->Common->one_cond_row('district', 'id', $this->session->c_id);
        $data['title'] = 'Validated Applicant';
        $data['data'] = $this->Page_model->list_of_applicant();


        $this->load->view('templates/head');
        $this->load->view('templates/header');
        $this->load->view('pages/' . $page, $data);
        $this->load->view('templates/footer');
    }

    public function validated_list()
    {
        $job = $this->Common->one_cond_row('hris_jobvacancy', 'jobID', $this->uri->segment(3));

        if ($job->position == 1) {
            $page = "validated";
        } else {
            $page = "validated_none";
        }


        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }

        $fy = date('Y');
        $data['title'] = 'Validated Applicant';
        $jobID = $this->uri->segment(3);
        $district = $this->input->get('district');
        
        if ($job->position == 1) {
            //$data['data'] = $this->Common->five_cond('hris_applications', 'dq', 0, 'app_year', $job->sy, 'district', $this->input->get('district'), 'jobID', $this->uri->segment(3), 'appStatus', 'Validated');
            $data['data'] = $this->Common->get_endorsed_applicant_with_stat('Open',1,$district,$jobID,'Validated');
        } else {
            //$data['data'] = $this->Common->five_cond('hris_applications', 'dq', 0, 'app_year', $job->sy, 'district', $this->input->get('district'), 'jobID', $this->uri->segment(3), 'appStatus', 'Application Submitted');
            $data['data'] = $this->Common->get_endorsed_applicant_with_stat('Open',1,$district,$jobID,'Application Submitted');
        }


        $data['job'] = $this->Common->one_cond_row('hris_jobvacancy', 'jobID', $this->uri->segment(3));

        $this->load->view('templates/head');
        $this->load->view('templates/header');
        $this->load->view('pages/' . $page, $data);
        $this->load->view('templates/footer');
    }

    public function endorsed_list()
    {
        $data['job'] = $this->Common->one_cond_row('hris_jobvacancy', 'jobID', $this->uri->segment(3));

        $page = "validated";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }

        $fy = date('Y');
        $data['title'] = 'Validated Applicant';
        // if ($job->position == 1) {
        //     $data['data'] = $this->Common->five_cond('hris_applications', 'dq', 1, 'app_year', $fy, 'district', $this->input->get('district'), 'jobID', $this->uri->segment(3), 'appStatus', 'Endorsed for Rating');
        // } else {
        //     $data['data'] = $this->Common->five_cond('hris_applications', 'dq', 1, 'app_year', $fy, 'district', $this->input->get('district'), 'jobID', $this->uri->segment(3), 'appStatus', 'Endorsed for Rating');
        // }
        // $data['job'] = $this->Common->one_cond_row('hris_jobvacancy', 'jobID', $this->uri->segment(3));

        $district = $this->input->get('district');
        $jobID = $this->uri->segment(3);

        $data['data'] = $this->Common->get_endorsed_applicant('Open',1,$district,$jobID);


        $this->load->view('templates/head');
        $this->load->view('templates/header');
        $this->load->view('pages/' . $page, $data);
        $this->load->view('templates/footer');
    }



    public function for_endorsement()
    {

        $page = "validated";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }

        $fy = date('Y');
        $dist = $this->Common->one_cond_row('district', 'id', $this->session->c_id);
        $data['district'] = $this->Common->one_cond_row('district', 'id', $this->session->c_id);
        $data['title'] = 'Validated Applicant';

        $data['data'] = $this->Common->get_applicant_staff_validated('Open','Endorsed for Rating');

        $data['efr'] = $this->Common->two_cond_count_row('hris_applications', 'appStatus', 'Validated', 'app_year', $fy);


        $this->load->view('templates/head');
        $this->load->view('templates/header');
        $this->load->view('pages/' . $page, $data);
        $this->load->view('templates/footer');
    }

    public function endorsed_applicants()
    {

        $page = "validated";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }

        $fy = date('Y');
        $dist = $this->Common->one_cond_row('district', 'id', $this->session->c_id);
        $data['district'] = $this->Common->one_cond_row('district', 'id', $this->session->c_id);
        $data['title'] = 'Validated Applicant';
        $data['data'] = $this->Common->get_applicant_staff_validated('Open','Endorsed for Rating');


        $this->load->view('templates/head');
        $this->load->view('templates/header');
        $this->load->view('pages/' . $page, $data);
        $this->load->view('templates/footer');
    }

    public function rated_applicants()
    {

        $page = "validated";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }

        $fy = date('Y');
        $dist = $this->Common->one_cond_row('district', 'id', $this->session->c_id);
        $data['district'] = $this->Common->one_cond_row('district', 'id', $this->session->c_id);
        $data['title'] = 'Validated Applicant';
        //$data['data'] = $this->Common->two_cond('hris_applications', 'appStatus', 'Rated', 'app_year', $fy);
        $data['data'] = $this->Common->get_applicant_staff_validated('Open','Rated');


        $this->load->view('templates/head');
        $this->load->view('templates/header');
        $this->load->view('pages/' . $page, $data);
        $this->load->view('templates/footer');
    }

    public function confirmed_applicants()
    {

        $page = "validated";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }

        $fy = date('Y');
        $dist = $this->Common->one_cond_row('district', 'id', $this->session->c_id);
        $data['district'] = $this->Common->one_cond_row('district', 'id', $this->session->c_id);
        $data['title'] = 'Validated Applicant';
        //$data['data'] = $this->Common->two_cond('hris_applications', 'appStatus', 'Confirmed', 'app_year', $fy);
        $data['data'] = $this->Common->get_applicant_staff_validated('Open','Confirmed');


        $this->load->view('templates/head');
        $this->load->view('templates/header');
        $this->load->view('pages/' . $page, $data);
        $this->load->view('templates/footer');
    }

    public function query_applicants()
    {

        $page = "applicant_query";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }

        //$data['data'] = $this->Common->one_cond_group('hris_application_inquiry', 'stat', 0, 'application_id');
        //$data['data'] = $this->Common->two_join_two_cond('hris_application_inquiry','hris_jobvacancy', 'a.*, b.*', 'a.job_id=b.jobID', 'stat', 0, 'jvStatus', 'Open', 'b.jobTitle', 'ASC');
        $data['data'] = $this->Common->get_applications_with_rating_status();

        $this->load->view('templates/head');
        $this->load->view('templates/header');
        $this->load->view('pages/' . $page, $data);
        $this->load->view('templates/footer');
    }

    public function dq_applicants()
    {

        $page = "validated";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }

        $fy = date('Y');
        $dist = $this->Common->one_cond_row('district', 'id', $this->session->c_id);
        $data['district'] = $this->Common->one_cond_row('district', 'id', $this->session->c_id);
        $data['title'] = 'Validated Applicant';
        //$data['data'] = $this->Common->three_cond('hris_applications', 'appStatus', 'Validated', 'app_year', $fy, 'dq', 2);
        $data['data'] = $this->Common->get_applicant_staff_dq('Open',2);


        $this->load->view('templates/head');
        $this->load->view('templates/header');
        $this->load->view('pages/' . $page, $data);
        $this->load->view('templates/footer');
    }

    public function pdf()
    {

        $page = "pdf";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }
        $data['data'] = $this->Common->one_cond_row('hris_applicant', 'id', $this->uri->segment(3));

        $data['title'] = 'title';
        $this->load->view('pages/' . $page, $data);
    }

    public function pdf_staff()
    {

        $page = "pdf"; 

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }
        $data['data'] = $this->Common->one_cond_row('hris_staff', 'IDNumber', $this->uri->segment(3));

        $data['title'] = 'title';
        $this->load->view('pages/' . $page, $data);
    }

    public function pdfv2()
    {

        $page = "pdf";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }
        $data['data'] = $this->Common->one_cond_row('hris_applications', 'appID', $this->uri->segment(3));


        $data['title'] = 'title';
        $this->load->view('pages/' . $page, $data);
    }



    public function applicant_applications()
    {

        $page = "aa";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }

        $d = $this->Common->one_cond_row('district', 'id', $this->session->c_id);

        if ($this->session->position === 'Human Resource Admin' || $this->session->position === 'HR Staff' || $this->session->position === 'Super Admin' || $this->session->position === 'asds') {
            $data['data'] = $this->Common->one_cond('hris_applications_rating', 'record_no', $this->input->post('record_no'));
        } else {
            $data['data'] = $this->Common->two_cond('hris_applications_rating', 'record_no', $this->input->post('record_no'), 'fy', $this->input->post('fy'));
        }


        $data['applicant'] = $this->Common->one_cond_row('hris_applicant', 'record_no', $this->input->post('record_no'));

        $this->load->view('templates/head');
        $this->load->view('templates/header');
        $this->load->view('pages/' . $page, $data);
        $this->load->view('templates/footer');
    }

    public function applicant_app()
    {

        $page = "aa";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }

        $rn = $this->uri->segment('3');


        $d = $this->Common->one_cond_row('district', 'id', $this->session->c_id);



        if ($this->session->position === 'Human Resource Admin' || $this->session->position === 'HR Staff' || $this->session->position === 'Super Admin' || $this->session->position === 'asds') {
            $data['data'] = $this->Common->one_cond('hris_applications_rating', 'record_no', $rn);
        } else {
            $data['data'] = $this->Common->two_cond('hris_applications_rating', 'record_no', $rn, 'fy', date('Y'));
        }

        $data['applicant'] = $this->Common->one_cond_row('hris_applicant', 'record_no', $rn);

        $this->load->view('templates/head');
        $this->load->view('templates/header');
        $this->load->view('pages/' . $page, $data);
        $this->load->view('templates/footer');
    }

    public function forgot_password()
    {

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        ', '</div>');
        $this->form_validation->set_rules('email', 'Email', 'required');

        if ($this->form_validation->run() == FALSE) {

            $page = "fp";

            if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
                show_404();
            }

            $this->load->view('pages/' . $page);
        } else {
            if ($this->input->post('at') == 1) {
                $email_check = $this->Common->one_cond_count_row('users', 'username', $this->input->post('email'));
            } elseif ($this->input->post('at') == 2) {
                $email_check = $this->Common->one_cond_count_row('hris_staff', 'empEmail', $this->input->post('email'));
            } else {
                $email_check = $this->Common->one_cond_count_row('schools', 'schoolEmail', $this->input->post('email'));
            }



            if ($email_check->num_rows() == 0) {
                $this->session->set_flashdata('failed', 'We could not find your email address.');
                redirect(base_url() . 'Pages/forgot_password');
            } else {
                $this->Reg->update_request_password();
                $this->session->set_flashdata('success', 'The new password has been sent to your email.');

                redirect(base_url() . 'log_in');
            }
        }
    }


    public function rqa_list()
    {
        $page = "rqa";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }
        $jobID = $this->input->get('jobID');

        $data['job'] = $this->Common->one_cond_row('hris_jobvacancy', 'jobID', $jobID);


        $job = $this->Common->one_cond_row('hris_jobvacancy', 'jobID', $jobID);
        if ($job->promotion == 1) {
            $this->Reg->calculate_rating_promotion($this->uri->segment(3));
        }else{
            if ($job->position == 1) {
                $this->Reg->calculate_rating($this->uri->segment(3));
            } else {
                $this->Reg->calculate_rating_none($this->uri->segment(3));
        }
        }

        $data['title'] = 'Registry of Qualified Applicants';

        // $data['data'] = $this->Common->promotion_list($jobID);

        // $data['job'] = $this->Common->one_cond_row('hris_jobvacancy', 'jobID', $this->input->get('jobID'));
        // $data['data1'] = $this->PersonnelModel->rqa_group($jobID);
        // $data['data2'] = $this->PersonnelModel->rqa_group_shs($jobID);
        // $data['data3'] = $this->PersonnelModel->rqa_group_jhs($jobID);



        $this->load->view('templates/head');
        $this->load->view('templates/header');
        $this->load->view('pages/' . $page, $data);
        $this->load->view('templates/footer');
    }

    public function aq()
    {
        $this->Reg->update_aq();
        $this->session->set_flashdata('success', 'Successfully Saved.');
        redirect(base_url() . 'Pages/query_applicants');
    }

    public function dcp_report()
    {

        $page = "dcp_report";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }

        $data['title'] = 'DCP Recipient Reports';
        $data['school'] = $this->Common->no_cond_order_by('schools', 'schoolName', 'ASC');


        $this->load->view('pages/' . $page, $data);
    }

    public function district_report()
    {

        $page = "district_emp_list";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }

        $data['title'] = 'Employee Report';
        $data['district'] = $this->Common->one_cond_row('district', 'id', $this->session->c_id);
        $dist = $this->Common->one_cond_row('district', 'id', $this->session->c_id);
        $data['school'] = $this->Common->one_cond('schools', 'district', $dist->discription);


        $this->load->view('pages/' . $page, $data);
    }

    // public function employee_report()
    // {

    //     $page = "employee_report";

    //     if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
    //         show_404();
    //     }

    //     $data['title'] = 'PLANTILLA OF PERSONNEL AS OF' . strtoupper(date('F-Y'));

    //     $data['plantilla'] = $this->Common->no_cond_group('hris_plantilla', 'pGroup');

    //     // if (!$this->input->post('pgroup')) {
    //     //     $data['plantilla'] = $this->Common->no_cond_group('hris_plantilla', 'pGroup');
    //     // } else {
    //     //     //$data['plantilla'] = $this->Common->one_cond_group('hris_plantilla', 'pGroup', $this->input->post('pgroup'), 'pGroup');
    //     //     $data['plantilla'] = $this->Common->one_cond_group('hris_plantilla', 'pGroup', $this->input->post('pgroup'), 'pGroup');
    //     // }
        

    //     $this->load->view('pages/' . $page, $data);
    // }

    public function employee_report()
    {

        $page = "employee_report";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }

        $data['title'] = 'PLANTILLA OF PERSONNEL AS OF' . strtoupper(date('F-Y'));
        
        $data['plan'] = $this->Common->no_cond_group('hris_plantilla', 'pGroup');
 
                $data['grouped'] = [];

                if (!$this->input->post('pgroup')) {
                    $results = $this->Common->get_grouped_staff();
                }else{
                    $results = $this->Common->get_grouped_staff_limit($this->input->post('pgroup'));
                    
                }

                // Group staff by pGroup
                foreach ($results as $row) {
                    $group = $row->pGroup ?? 'Undefined';
                    $data['grouped'][$group][] = $row;
                }

            

        $this->load->view('pages/' . $page, $data);
    }

    public function employee_report_it()
    {

        $page = "employee_report_it";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }

        $data['title'] = 'PLANTILLA OF PERSONNEL AS OF' . strtoupper(date('F-Y'));
        
        $data['plan'] = $this->Common->no_cond_group('hris_plantilla', 'pGroup');
 
                $data['grouped'] = [];

                if (!$this->input->post('pgroup')) {
                    $results = $this->Common->get_grouped_staff();
                }else{
                    $results = $this->Common->get_grouped_staff_limit($this->input->post('pgroup'));
                    
                }

                // Group staff by pGroup
                foreach ($results as $row) {
                    $group = $row->pGroup ?? 'Undefined';
                    $data['grouped'][$group][] = $row;
                }

            

        $this->load->view('pages/' . $page, $data);
    }

    public function ah()
    {

        $page = "job_history";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }

        $ee = $this->input->get('ee');

        if ($this->session->position == 'reg') {
            //$data['data'] = $this->Common->one_cond_loop_order_by('hris_applications', 'empEmail', $this->session->username,'appID','Desc');
            $data['data'] = $this->Common->one_cond('hris_applications', 'empEmail', $this->session->username);
        } elseif ($this->session->position == 'user') {
            $data['data'] = $this->Common->one_cond('hris_applications', 'empEmail', $this->session->username);
        } else {
            $data['data'] = $this->Common->one_cond('hris_applications', 'empEmail', $ee);
        }


        $this->load->view('templates/head');
        $this->load->view('templates/header');
        $this->load->view('pages/' . $page, $data);
        $this->load->view('templates/footer');
    }

    public function rr_all()
    {
        $check = $this->Common->three_cond_count_row('hris_rating_request', 'job_id', $this->uri->segment(4),'app_id',$this->uri->segment(5),'applicant_id',$this->uri->segment(3));
        if($check->num_rows() >= 1){
            $this->session->set_flashdata('danger', 'This is a duplicate request.');
        }else{
            $this->Reg->rrall();
            $this->session->set_flashdata('success', 'Succesfully saved.');
            
        }
        redirect(base_url() . 'Pages/'.$this->uri->segment(7).'/'.$this->uri->segment(3).'/'.$this->uri->segment(4).'/'.$this->uri->segment(8));
    }

    public function request_rating()
    {

        $page = "rating_request";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }

        $fy = date('Y');
        $data['title'] = 'Request Rating';
        $data['data'] = $this->Common->two_cond('hris_rating_request','fy', $fy, 'stat',0);
        $data['granted'] = $this->Common->two_cond('hris_rating_request','fy', $fy,'stat',1);


        $this->load->view('templates/head');
        $this->load->view('templates/header');
        $this->load->view('pages/' . $page, $data);
        $this->load->view('templates/footer');
    }

    public function request_rating_granted()
    {

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        ', '</div>');
        $this->form_validation->set_rules('application', 'application', 'required');

        if ($this->form_validation->run() == FALSE) {

            $page = "rating_request_granted";

            if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
                show_404();
            }

            $fy = date('Y');
            $data['title'] = 'Request Rating';
            $data['data'] = $this->Common->one_cond('hris_rating_request','id', $this->uri->segment(3));
            $data['job'] = $this->Common->one_cond_row('hris_jobvacancy','jobID', $this->uri->segment(4));

            $this->load->view('templates/head');
            $this->load->view('templates/header');
            $this->load->view('pages/' . $page, $data);
            $this->load->view('templates/footer');
        } else {
            if($this->input->post('r_type') == 1){
                $this->Reg->copy_rating($this->input->post('record_no'), $this->input->post('application'));
                //$this->Reg->ap_track('Retained Ratings (All Criteria)');
                $this->Reg->application_change_stat('Rated');
            }else{
                $this->Reg->copy_limited_rating($this->input->post('record_no'), $this->input->post('application')); 
                //$this->Reg->ap_track('Retention of Demo and TR Ratings');
                $this->Reg->application_change_stat('Endorsed for Rating');
            }
            

            $this->Reg->update_request_stat();
            $this->session->set_flashdata('success', 'Saved successfully');
            redirect(base_url() . 'Pages/request_rating');
        }
    }

    public function request_rating_applicant()
    {

        $page = "rating_request_applicant";

        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }

        $fy = date('Y');
        $data['title'] = 'Request Rating';
        $data['data'] = $this->Common->two_cond('hris_rating_request','fy', $fy,'applicant_id',$this->session->c_id);


        $this->load->view('templates/head');
        $this->load->view('templates/header');
        $this->load->view('pages/' . $page, $data);
        $this->load->view('templates/footer');
    }

    public function rr_delete()
    {
        $this->Page_model->delete('3', 'id', 'hris_rating_request');
        $this->Page_model->insert_at('Delete application', $this->db->insert_id());
        $this->session->set_flashdata('danger', 'Request was deleted');
        if($this->session->position == 'reg'){
            redirect(base_url() . 'Pages/request_rating_applicant');
        }else{
            redirect(base_url() . 'Pages/request_rating');
        }
    }

        public function validated_by_job_id() {
            $this->Reg->insert_rate_by_job();
            $this->session->set_flashdata('success', 'Successfully Validated');
            redirect(base_url() . 'Page/jobVacancy');
        }

        public function special_change_stat() {
            if($this->uri->segment(3) == 1){
                $this->Reg->special_change_stat('Rated');
            }else{
                $this->Reg->special_change_stat('Endorsed for Rating');
            }
            $this->session->set_flashdata('success', 'Saved successfully');
            redirect(base_url() . 'Pages/request_rating');
        }

        public function resetempno() {
            $this->Reg->resetemployeeno();
            $this->session->set_flashdata('success', 'Saved successfully');
            redirect(base_url() . 'personnel');
        }




    public function get_provinces()
    {
        $provinces = $this->SettingsModel->get_provinces();
        echo json_encode($provinces);
    }

    public function get_cities()
    {
        $province = $this->input->post('province');  // Ensure province is being received
        $cities = $this->SettingsModel->get_cities($province);
        echo json_encode($cities);
    }

    public function get_barangays()
    {
        $city = $this->input->post('city');  // Ensure city is being received
        $barangays = $this->SettingsModel->get_barangays($city);
        echo json_encode($barangays);
    }

    function regApplicantshire()
	{
		$result['data'] = $this->Reg->join_applicant_and_staff();
		$this->load->view('list_reg_applicants_hired', $result);
	}

    public function submit_application_non_teaching()
    {

        $applications = $this->Common->two_cond_count_row('hris_applications', 'jobID', $this->uri->segment(3), 'applicant_id', $this->session->c_id);

        if ($applications->num_rows() >= 1) {
            $this->session->set_flashdata('danger', 'Please double-check the same job position you applied.');
            redirect(base_url() . 'pages/ja/' . $this->session->c_id);
        } else {
            $this->Reg->ap_submit_non_teaching();
        }

        $this->Reg->unlock_hris_staff();

        $app_id = $this->db->insert_id();

        $this->Page_model->insert_at('Submit Application', $app_id);
        if ($this->session->position == 'user') {
            $this->Reg->ap_track_apply_user_none_teaching('Application Submitted', $app_id,$this->uri->segment(3));
        } else {
            $this->Reg->ap_track_apply_non_teaching('Application Submitted', $app_id);
        }

        $this->session->set_flashdata('success', 'Successfully Applied');
        redirect(base_url() . 'pages/ja/' . $this->session->c_id);
    }

    public function davor_confession()
    {


        $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        ', '</div>');
        $this->form_validation->set_rules('con', 'Confession', 'required');
       
        if ($this->form_validation->run() == FALSE) {

            $page = "confessions";

            if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
                show_404();
            }
            $data['mis_settings'] = $this->Common->one_cond_row('mis_settings','settingsID',1);
            $data['title'] = "Register";
            $data['school'] = $this->Common->no_cond('schools');

            $this->load->view('templates/header_public');
            $this->load->view('pages/' . $page, $data);
            $this->load->view('templates/footer_public');
        } else {

            $mis_settings = $this->Common->one_cond_row('mis_settings','settingsID',1);

            $recaptcha = $this->input->post('g-recaptcha-response');
            $secret = trim($mis_settings->secret_key);

            $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secret}&response={$recaptcha}");
            $responseKeys = json_decode($response, true);

            if (!$responseKeys["success"]) {
                $this->session->set_flashdata('danger', 'reCAPTCHA verification failed. Please try again.');
                redirect('davor_confession'); 
            }


            $renren = $this->input->post('renren');
            $ivykate = $this->input->post('ivykate');
            $ivankyle = $this->input->post('ivankyle');
            $ic = $this->input->post('ic');

            if (!empty($renren) || !empty($ivykate) || !empty($ivankyle) || !empty($ic)) {
                $this->session->set_flashdata('danger', 'I Got you');
                redirect(base_url() . 'davor_confession');
            }

            $this->Reg->new_confession();

            $this->session->set_flashdata('success', 'Your confession has been processed successfully.');
            redirect(base_url() . 'log_in');
                
            
        }
    }

    public function all_non_teaching_applicant()
    {

        $page = "ha_all_by_jp";
        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }

        $data['title'] = "Initial Evaluation Result (IER)";
        $data['mis_settings'] = $this->SettingsModel->mis_settings();
        $data['data'] = $this->Common->get_submitted_applicant($this->uri->segment(3));

        

        $this->load->view('pages/' . $page, $data);
    }

    public function all_non_teaching_applicantv2()
    {

        $page = "ha_all_by_jp_v2";
        if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
            show_404();
        }

        $data['title'] = "Initial Evaluation Result (IER)";
        $data['mis_settings'] = $this->SettingsModel->mis_settings();
        $data['data'] = $this->Common->get_submitted_applicant($this->uri->segment(3));

        

        $this->load->view('pages/' . $page, $data);

    }

public function ier_group_mun()
{
    ob_start(); // Stream output to avoid timeout

    $page = "ha_all_by_jp_mun";
    if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
        show_404();
    }

    $jobID = $this->uri->segment(3);
    //$mun = $this->input->get('mun');
    $data['mis_settings'] = $this->SettingsModel->mis_settings();

    $data['job'] = $this->Page_model->get_single_row_by_id('hris_jobvacancy', 'jobID', $jobID);
    $data['settings'] = $this->SettingsModel->get_mis_settings();

    $data['grouped_applicants'] = $this->Reg->get_grouped_applicants_by_mun_ier($jobID);

    $job = $this->Common->one_cond_row_select('hris_jobvacancy','jobID,sy,sign', 'jobID', $jobID);
    $data['sign'] = $this->Common->two_cond_row('hris_rqa_sign', 'fy', $job->sy, 'id', $job->sign);

    // Preload applicants and staff
    $data['applicants'] = $this->Page_model->get_all_applicants_indexed();
    $data['staff'] = $this->Page_model->get_all_staff_indexed();

    $data['title'] = "Initial Evaluation Result (IER)";

    $this->load->view('pages/' . $page, $data);

    ob_end_flush();
}

    public function change_fy() {
        $new_fy = $this->input->post('new_fy');
        if (!empty($new_fy)) {
            $this->session->set_userdata('cur_fy', $new_fy);
        }
        redirect($_SERVER['HTTP_REFERER']); 
    }

    public function change_sy() {
        $new_fy = $this->input->post('new_fy');
        if (!empty($new_fy)) {
            $this->session->set_userdata('cur_sy', $new_fy);
        }
        redirect($_SERVER['HTTP_REFERER']); 
    }

    public function copy_application() {
            $id = $this->input->post('id');
            $jobid = $this->input->post('cur_id');
                
            if (!$id) {
                show_error('No application ID provided.');
                return;
            }

            $row = $this->db->get_where('hris_applications', ['appID' => $id])->row_array();

            if ($row) {
                unset($row['appID']);

                $row['dateSubmitted'] = date('Y-m-d H:i:s'); 
                $row['jobID'] = $jobid;  

                $this->db->insert('hris_applications', $row);
                $newAppId = $this->db->insert_id();
            }

            $rate = $this->db->get_where('hris_rating_none', ['appID' => $id])->row_array();

            if ($rate) {
                unset($rate['id']);

                //$rate['dateSubmitted'] = date('Y-m-d H:i:s'); 
                $rate['appID'] = $newAppId;  

                $this->db->insert('hris_rating_none', $rate);
            }

        redirect($_SERVER['HTTP_REFERER']);
    }

    public function copy_application_promotion() {
            $id = $this->input->post('id');
            $jobid = $this->input->post('cur_id');
            $applicant = $this->input->post('applicant_id');

            if ($jobid === 0 || $applicant === '') {
                $this->session->set_flashdata('danger', 'Missing applicant or job ID.');
                redirect($this->agent->referrer() ?: base_url());
                return; 
            }

            $exists = $this->db->where('empEmail', $applicant)
                            ->where('jobID',   $jobid)
                            ->limit(1)
                            ->count_all_results('hris_applications');

            if ($exists > 0) {
                $this->session->set_flashdata('danger', 'Application already exists for this job.');
                redirect($this->agent->referrer() ?: base_url());
                return; 
            }

                
            if (!$id) {
                show_error('No application ID provided.');
                return;
            }

            $row = $this->db->get_where('hris_applications', ['appID' => $id])->row_array();

            if ($row) {
                unset($row['appID']);

                $row['dateSubmitted'] = date('Y-m-d H:i:s'); 
                $row['jobID'] = $jobid;  

                $this->db->insert('hris_applications', $row);
                $newAppId = $this->db->insert_id();
            }

            $rate = $this->db->get_where('hris_rating_promotion', ['appID' => $id])->row_array();

            if ($rate) {
                unset($rate['id']);

                //$rate['dateSubmitted'] = date('Y-m-d H:i:s'); 
                $rate['appID'] = $newAppId;  

                $this->db->insert('hris_rating_promotion', $rate);
            }
        $this->session->set_flashdata('success', 'Copied successfully.');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function application_delete()
    {
        $this->Common->delete('hris_applications', 'appID','3');
        $this->Common->delete('hris_rating_promotion', 'appID','3');
        //$this->session->set_flashdata('danger', 'Successfully deleted.');
        redirect(base_url() . 'Pages/qaulified_promotion');
    }

    public function application_delete_regular()
    {
        $this->Common->delete('hris_applications', 'appID','3');
        $this->Common->delete('hris_rating_none', 'appID','3');
        //$this->session->set_flashdata('danger', 'Successfully deleted.');
        redirect(base_url() . 'Pages/hiring_non_qaulified_rated');
    }

    function sbm_checklist_final()
    {
        $this->Page_model->sbm_cecklist_lock_unloc(1);
        $this->session->set_flashdata('success', 'Saved successfully.');
        redirect(base_url() . 'Page/sbm_checklist');
    }

    public function ier_insert_info()
    {

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        ', '</div>');
        $this->form_validation->set_rules('disability', 'Disability', 'required');
        //$this->form_validation->set_rules('termPeriodto', 'Term Period To', 'required');

        if ($this->form_validation->run() == FALSE) {

            $page = "eir";

            if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
                show_404();
            }

            $data['data'] = $this->Common->find_by_idnumber_union($this->uri->segment(5));

            $data['title'] = "Initial Evaluation Result(IER) Info";

            $this->load->view('templates/head');
            $this->load->view('templates/header');
            $this->load->view('pages/' . $page, $data);
            $this->load->view('templates/footer');
        } else {
                $this->Page_model->insert_ier();
                $this->Page_model->update_ier_person($this->input->post('table'));
                $this->session->set_flashdata('success', ' New User Save');
                redirect(base_url() . 'Pages/all_non_teaching_applicant/'.$this->input->post('jobID'));

        }

    }

    public function ier_update_info()
    {

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        ', '</div>');
        $this->form_validation->set_rules('disability', 'Disability', 'required');
        //$this->form_validation->set_rules('termPeriodto', 'Term Period To', 'required');

        if ($this->form_validation->run() == FALSE) {

            $page = "eir_update";

            if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
                show_404();
            }

            $data['data'] = $this->Common->find_by_idnumber_union($this->uri->segment(5));
            $data['ier'] = $this->Common->two_cond_row('ier_info','jobID',$this->uri->segment(3),'code',$this->uri->segment(5));

            $data['title'] = "Initial Evaluation Result(IER) Info";

            $this->load->view('templates/head');
            $this->load->view('templates/header');
            $this->load->view('pages/' . $page, $data);
            $this->load->view('templates/footer');
        } else {
                $this->Page_model->update_ier();
                $this->Page_model->update_ier_person($this->input->post('table'));
                $this->session->set_flashdata('success', ' New User Save');
                redirect(base_url() . 'Pages/all_non_teaching_applicant/'.$this->input->post('jobID'));

        }

    }

    public function validators_remarks(){
        $this->Page_model->validators_remarks();
        $this->session->set_flashdata('success', 'Successfully Saved.');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function rftp()
    {

        $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        ', '</div>');
        $this->form_validation->set_rules('id', 'ID Number', 'required');
        //$this->form_validation->set_rules('termPeriodto', 'Term Period To', 'required');

        if ($this->form_validation->run() == FALSE) {

            $data['check'] = $this->Common->two_cond_row('hris_rftp','IDNumber',$this->session->username,'fy',$this->session->cur_fy);

            if($data['check']){
             $page = "rftp_update";
             $data['res'] = $this->Reg->count_ones_twos($this->session->username, $this->session->cur_fy);
             $data['coi'] = $this->Reg->count_coi($this->session->username, $this->session->cur_fy);
             $data['ncoi'] = $this->Reg->count_ncoi($this->session->username, $this->session->cur_fy);
            }else{
                $page = "rftp";
            }

            if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
                show_404();
            }
            $data['rftp'] = $this->Common->no_cond('hris_rftp_domain');

            $data['data'] = $this->Common->find_by_idnumber_union($this->uri->segment(5));
            $data['ier'] = $this->Common->two_cond_row('ier_info','jobID',$this->uri->segment(3),'code',$this->uri->segment(5));

            $data['title'] = "RECLASIFICATION FORM FOR TEACHING POSITIONS (RFTP)";

            $this->load->view('templates/head');
            $this->load->view('templates/header');
            $this->load->view('pages/' . $page, $data);
            $this->load->view('templates/footer');
        } else {
                $this->Reg->insert_rftp();
                $this->session->set_flashdata('success', 'Successfully Saved.');
                redirect($_SERVER['HTTP_REFERER']);

        }

    }

    public function rftp_update(){
        $this->Reg->update_rftp();
        $this->session->set_flashdata('success', 'Successfully Updated.');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function rftp_print()
    {
            $page = "rftp_print";

            if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
                show_404();
            }
            $data['rftp'] = $this->Common->no_cond('hris_rftp_domain');
            $data['id'] = $this->session->username;
            $data['fy'] = $this->session->cur_fy;

            $data['title'] = "RECLASIFICATION FORM FOR TEACHING POSITIONS (RFTP)";

            $this->load->view('pages/' . $page, $data);

    }




}
