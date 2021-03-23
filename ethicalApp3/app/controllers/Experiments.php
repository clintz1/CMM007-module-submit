<?php
class Experiments extends Controller
{
    public function __construct()
    {
        if (!isLoggedIn()) {
            redirect('users/login');
        }

        $this->experimentModel = $this->model('Experiment');
        $this->userModel = $this->model('User');
    }

    public function index()
    {
        // Get posts
        $experiments = $this->experimentModel->getExperiments();

        $data = [
            'experiments' => $experiments
        ];

        $this->view('experiments/index', $data);
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // sanitize post array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'name' => trim($_POST['name']),
                'supervisor' => trim($_POST['supervisor']),
                'school' => trim($_POST['school']),
                'course' => trim($_POST['course']),
                'project_title' => trim($_POST['project_title']),
                'lay_summary' => trim($_POST['lay_summary']),
                'user_id' => $_SESSION['user_id'],
                'name_err' => '',
                'supervisor_err' => '',
                'school_err' => '',
                'course_err' => '',
                'project_title_err' => '',
                'lay_summary_err' => '',
            ];

            // validate title
            if (empty($data['name'])) {
                $data['name_err'] = 'Please Enter name text';
            }
            // validate title
            if (empty($data['supervisor'])) {
                $data['supervisor_err'] = 'Please Enter supervisor text';
            }
            // validate bdy
            if (empty($data['school'])) {
                $data['school_err'] = 'Please Enter school text';
            }
            // validate bdy
            if (empty($data['course'])) {
                $data['course_err'] = 'Please Enter course text';
            }
            // validate bdy
            if (empty($data['project_title'])) {
                $data['project_title_err'] = 'Please Enter project title text';
            }
            // validate bdy
            if (empty($data['lay_summary'])) {
                $data['lay_summary_err'] = 'Please Enter lay summary text';
            }
            // make sure no errors
            if (empty($data['name_err']) && empty($data['supervisor_err'])&& empty($data['school_err']) && empty($data['course_err']) && empty($data['project_title_err']) && empty($data['lay_summary_err'])) {
                // Validated
                if ($this->experimentModel->addExperiment($data)) {
                    flash('experiment_message', 'EXPERIMENT Added');
                    redirect('experiments');
                } else {
                    die('something went wrong');
                }
            } else {
                // load views with errors
                $this->view('experiments/add', $data);
            }
        } else {
            $data = [
                'name' => '',
                'supervisor' => '',
                'school' => '',
                'course' => '',
                'project_title' => '',
                'lay_summary' => ''
            ];

            $this->view('experiments/add', $data);
        }
    }
    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // sanitize post array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'name' => trim($_POST['name']),
                'supervisor' => trim($_POST['supervisor']),
                'school' => trim($_POST['school']),
                'course' => trim($_POST['course']),
                'project_title' => trim($_POST['project_title']),
                'lay_summary' => trim($_POST['lay_summary']),
                'user_id' => $_SESSION['user_id'],
                'name_err' => '',
                'supervisor_err' => '',
                'school_err' => '',
                'course_err' => '',
                'project_title_err' => '',
                'lay_summary_err' => '',
                'id' => $id,
            ];
            // validate title
            if (empty($data['name'])) {
                $data['name_err'] = 'Please Enter name text';
            }
            // validate title
            if (empty($data['supervisor'])) {
                $data['supervisor_err'] = 'Please Enter supervisor text';
            }
            // validate bdy
            if (empty($data['school'])) {
                $data['school_err'] = 'Please Enter school text';
            }
            // validate bdy
            if (empty($data['course'])) {
                $data['course_err'] = 'Please Enter course text';
            }
            // validate bdy
            if (empty($data['project_title'])) {
                $data['project_title_err'] = 'Please Enter project title text';
            }
            // validate bdy
            if (empty($data['lay_summary'])) {
                $data['lay_summary_err'] = 'Please Enter lay summary text';
            }
            // make sure no errors
            if (empty($data['name_err']) && empty($data['supervisor_err'])&& empty($data['school_err']) && empty($data['course_err']) && empty($data['project_title_err']) && empty($data['lay_summary_err'])) {
                // Validated
                if ($this->experimentModel->updateExperiment($data)) {
                    flash('experiment_message', 'EXPERIMENT Updated');
                    redirect('experiments');
                } else {
                    die('something went wrong');
                }
            } else {
                // load views with errors
                $this->view('experiments/edit', $data);
            }
        } else {
            // get existing post from model
            $experiment = $this->experimentModel->getExperimentById($id);
            // check for owner
            if ($experiment->user_id != $_SESSION['user_id']) {
                redirect('experiments');
            }
            $data = [
                'id' => $id,
                'name' => $experiment->name,
                'supervisor' => $experiment->supervisor,
                'school' => $experiment->school,
                'course' => $experiment->course,
                'project_title' => $experiment->project_title,
                'lay_summary' => $experiment->lay_summary
            ];

            $this->view('experiments/edit', $data);
        }
    }
    public function show($id)
    {
        $experiment = $this->experimentModel->getExperimentById($id);
        $user = $this->userModel->getUserById($experiment->user_id);
        $data = [
            'experiment' => $experiment,
            'user' => $user,
        ];
        $this->view('experiments/show', $data);
    }
    public function delete($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // get existing post from model
            $experiment = $this->experimentModel->getExperimentById($id);
            // check for owner
            if ($experiment->user_id != $_SESSION['user_id']) {
                redirect('experiments');
            }
            if ($this->experimentModel->deleteExperiment($id)) {
                flash('experiment_message', 'EXPERIMENT Removed');
                redirect('experiments');
            } else {
                die('something went wrong');
            }
        } else {
            redirect('experiments');
        }
    }

    public function ethics($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // get existing post from model
            $experiment = $this->experimentModel->getExperimentById($id);
            // check for owner
            if ($experiment->user_id != $_SESSION['user_id']) {
                redirect('experiments');
            }
            if ($this->experimentModel->ethicsExperiment($id)) {
                flash('experiment_message', 'EXPERIMENT Removed');
                redirect('experiments');
            } else {
                die('something went wrong');
            }
        } else {
            redirect('experiments');
        }
    }

       
}
