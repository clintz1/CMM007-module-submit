<?php

class Pages extends Controller
{
    public function __construct()
    {
    }
    public function index()
    {
        if(isLoggedIn()){
            redirect('experiments');
        }
        $data = [
            'title' => 'RGU Experiment Ethical Monitoring System',
            'description' => 'A system to monitor Experiment Compliance to the ethical policy document '
        ];

        $this->view('pages/index', $data);
    }
    public function about()
    {
        $data = [
            'title' => 'About Us',
            'description' => 'Experiment Ethical Approval Monitoring System'
        ];
        $this->view('pages/about', $data);
    }

    public function admin()
    {
        $data = [
            'title' => 'Admin Page',
            'description' => 'Experiment Ethical Approval Monitoring System'
        ];
        $this->view('pages/admin', $data);
    }

    public function eofficer()
    {
        $data = [
            'title' => 'Experiment Approval Officer',
            'description' => 'Experiment Ethical Approval Monitoring System'
        ];
        $this->view('pages/eofficer', $data);
    }
}
