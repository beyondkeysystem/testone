<?php

App::uses('Controller', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class AdminController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        //load model
        $this->loadModel('User');
        $this->loadModel('DmeAssignPatient');
        $this->loadModel('Report');
        //set loggeg in user in @user variable
        if ($this->Auth->user()) {
            $this->set('user', $this->Auth->user());
        }
        //manage user authentication
        $auth_data = $this->Auth->user();
        if (isset($auth_data) && !empty($auth_data)) {
            if ($auth_data['type'] == 'patient') {
                $this->redirect(array('controller' => 'patients', 'action' => 'index'));
            }
            if ($auth_data['type'] == 'clinician') {
                $this->redirect(array('controller' => 'clinicians', 'action' => 'index'));
            }
        }
    }

////////////////////////////////////////////////////////////////////////////////

    /**
     * index method
     * @throws NotFoundException
     * @return void
     */
    public function index() {
//         //fetch and set value of logged in DME
//         $login_user = $this->Auth->user('id');
//         $dme_data = $this->User->find('first', array('conditions' => array('User.id' => $login_user)));
//         $this->set('dme_data', $dme_data);

//         //set login user type for default view
//         $userType = $this->Auth->user('type');
//         $this->set('userType', $userType);

//         //set dynamically dme name for view
//         $dme_did = $this->Auth->user('id');
//         $dme_data = $this->User->find('first', array('conditions' => array('User.id' => $dme_did), 'fields' => array('User.name')));
//         if (!empty($dme_data)) {
//             $this->set('dme_name', $dme_data['User']['name']);
//         }

//         //set users detail
//         $this->set('users', $this->paginate('User'));

//         //Dynamically manage title 
//         $this->set("title_for_layout", "DMEs");

//         //set selected action detail
//         $this->set('action_detail', 'MY PROFILE');
		$this->redirect(array('action' => 'view/patient'));
    }

////////////////////////////////////////////////////////////////////////////////

    /**
     * add method
     * @return void
     */
    public function add() {
        $url_type = $this->params['pass'][0];
        if (!empty($url_type)) {
            $this->set('url_type', $url_type);
        }
         //set login user type for default view
        $userType = $this->Auth->user('type');
        $this->set('userType', $userType);
        
        //set loggeg in user
        $auth_data = $this->Auth->user('name');
        
        //fetch all clinician 
        $user_data = $this->User->find('all', array('conditions' => array('User.type' => "clinician")), array('fields' => array('User.id', 'User.name')));

        //set clinicians name for select box
        $options = array();
        foreach ($user_data as $d) {
            $options[$d['User']['id']] = $d['User']['name'];
        }
        $this->set(compact('options'));
        $this->set('user_data', $user_data);

        //save data into user table
        if (isset($this->data) && !empty($this->data)) {
            $data = array('User' => array(
                    'name' => $this->data['User']['name'],
                    'sex' => $this->data['User']['sex'],
                    'email' => $this->data['User']['email'],
                    'password' => $this->data['User']['password'],
                    'mobile' => $this->data['User']['mobile'],
                    'type' => $this->data['User']['type'],
                    'address' => $this->data['User']['address'],
                    'created_date' => date("Y-m-d H:i:s")));
        }
        //save data into dme_assign_patient table
        if (isset($data) && !empty($data)) {
            if (!empty($this->data['User']['emp_name'])) {
                $this->User->save($data);
                $patientId = $this->User->getLastInsertId();
                $dmeId = $this->Auth->user('id');
                $clinicId = $this->data['User']['emp_name'];
                $dmeData = array('DmeAssignPatient' => array('id' => null,
                        'dme_id' => $dmeId,
                        'patient_id' => $patientId,
                        'clinician_id' => $clinicId,
                        'create_date' => date("Y-m-d H:i:s")));
                $save_result = $this->DmeAssignPatient->save($dmeData);
            }
            //save dummy report data into reports table
            $this->loadModel('User');
            $pId = $this->User->getLastInsertId();
            $Dummydata = array('Report' => array(
                    'icode' => '0',
                    'serial_no' => '0',
                    'patient_id' => $pId,
                    'icode_period' => '0',
                    'days' => '0',
                    'minutes' => '0',
                    'p95' => '0',
                    'best30' => '0',
                    'ahi' => '0',
                    'sni' => '0',
                    'percentage' => '0',
                    'status' => 'D',
                    'created_date' => date("Y-m-d H:i:s"),
                    ));
            $this->Report->save($Dummydata);
            //end of dummy report data 
            if (!empty($save_result)) {
                //send mail
                $PatientEmail = new CakeEmail();
                $PatientEmail->from(array('sameer@mailinator.com'));
                $PatientEmail->to($this->data['User']['email']);
                $PatientEmail->subject('Your login detail from connect.3bproducts.com');
                $PatientEmail->emailFormat('html');
                $body = "Hello , <br/>";
                $body .=" <br/><br/> Patient registered by DME-" . $auth_data;
                $name = $this->data['User']['name'];
                $email = $this->data['User']['email'];
                $password = $this->data['User']['password'];
                $body .="<br/> Patient Name : " . $name;
                $body .="<br/> Patient Email : " . $email;
                $body .="<br/> Patient password : " . $password;

                $PatientEmail->send($body);

                $this->redirect(array('controller' => 'admin', 'action' => 'view', $this->data['User']['type']));
            }
        }
        //set dynamically dme name for view
        $dme_did = $this->Auth->user('id');
        $dme_data = $this->User->find('first', array('conditions' => array('User.id' => $dme_did), 'fields' => array('User.name')));
        if (!empty($dme_data)) {
            $this->set('dme_name', $dme_data['User']['name']);
        }
        
        //set selected action detail
        $this->set('action_detail', 'ADD NEW PATIENT');
    }

////////////////////////////////////////////////////////////////////////////////

    /**
     * view method
     * @return void
     */
    public function view() {
        
        //set login user type for default view
        $userType = $this->Auth->user('type');
        $this->set('userType', $userType);
        
        //get user type 
        if (isset($this->params['pass'][0]) && !empty($this->params['pass'][0])) {
            $url_type = $this->params['pass'][0];
            $this->set('user_type', $url_type);
        }
        $limit = 10;
        //for clinician view
        if ($url_type == 'clinician') {
            //find logged in DME id and fetch related clinician data and set pagination for clinician
            $dme_id = $this->Auth->user('id');
            $this->DmeAssignPatient->recursive = -1;
            $this->paginate = array('joins' => array(
                    array(
                        'table' => 'users',
                        'alias' => 'u',
                        'type' => 'LEFT',
                        'conditions' => array(
                            'DmeAssignPatient.dme_id=u.id'
                        )
                    ),
                    array(
                        'table' => 'users',
                        'alias' => 'User',
                        'type' => 'LEFT',
                        'conditions' => array(
                            'DmeAssignPatient.patient_id=User.id'
                        )
                    ),
                    array(
                        'table' => 'users',
                        'alias' => 'u2',
                        'type' => 'LEFT',
                        'conditions' => array(
                            'DmeAssignPatient.clinician_id=u2.id'
                        )
                    )
                ),
                'fields' => array('DmeAssignPatient.id', 'u.name as dme', 'User.id', 'User.name', 'User.email', "User.mobile", "User.type", "User.address", "User.created_date as patient", "u2.name", "u2.email", "u2.mobile", "u2.type", "u2.address as clinician"),
                'conditions' => array(
                    'DmeAssignPatient.dme_id' => $dme_id
                ),
                'group' => array('u2.email'),
                'limit' => $limit,
            );
            $complete_data = $this->paginate('DmeAssignPatient');
            $this->set('complete_data', $complete_data);
            
            //set selected action detail
            $this->set('action_detail', 'CLINICIANS OVERVIEW');
        }
        //end
        //for patient view
        if ($url_type == 'patient') {
            //find logged in DME id and set pagination for patient view
            $dme_id = $this->Auth->user('id');
            $this->DmeAssignPatient->recursive = -1;
            $this->User->virtualFields = array('per' => 'per', 'clinician' => 'clinician');
            $this->paginate = array('joins' => array(
                    array(
                        'table' => 'users',
                        'alias' => 'u',
                        'type' => 'LEFT',
                        'conditions' => array(
                            'DmeAssignPatient.dme_id=u.id'
                        )
                    ),
                    array(
                        'table' => 'users',
                        'alias' => 'User',
                        'type' => 'LEFT',
                        'conditions' => array(
                            'DmeAssignPatient.patient_id=User.id'
                        )
                    ),
                    array(
                        'table' => 'users',
                        'alias' => 'u2',
                        'type' => 'LEFT',
                        'conditions' => array(
                            'DmeAssignPatient.clinician_id=u2.id'
                        )
                    ),
                    array(
                        'table' => 'reports',
                        'alias' => 'Report',
                        'type' => 'LEFT',
                        'conditions' => array(
                            'DmeAssignPatient.patient_id = Report.patient_id',
                        )
                    )
                ),
                'fields' => array('SUBSTRING_INDEX(GROUP_CONCAT(Report.patient_id ORDER BY Report.created_date DESC SEPARATOR ", "),", ",1) as per', 'DmeAssignPatient.id', 'u.name as dme', 'User.id', 'User.name', 'User.email', "User.mobile", "User.type", "User.address", "User.created_date as patient", "u2.name as clinician"),
                'conditions' => array(
                    'DmeAssignPatient.dme_id' => $dme_id
                ),
                'limit' => $limit,
                'group' => 'Report.patient_id',
                'order' => 'User.created_date DESC'
            );

            $complete_data = $this->paginate('DmeAssignPatient');
            $this->set('complete_data', $complete_data);
            //fetch compliance percentage from reports table
            $Compliance = array();
            foreach ($complete_data as $values) {
                $patient_id = $values['User']['id'];
                $Compliance[] = $this->Report->find('first', array('fields' => array('Report.patient_id,id,icode_period,days'), 'conditions' => array('patient_id' => $patient_id), 'order' => 'created_date DESC'));
            }
            $this->set(compact('Compliance', $Compliance));
            
             //set selected action detail
            $this->set('action_detail', 'MY PATIENTS');
        }
        $this->set('limit', $limit);

        //set dynamically dme name for view
        $dme_did = $this->Auth->user('id');
        $dme_data = $this->User->find('first', array('conditions' => array('User.id' => $dme_did), 'fields' => array('User.name')));
        if (!empty($dme_data)) {
            $this->set('dme_name', $dme_data['User']['name']);
        }
    }

////////////////////////////////////////////////////////////////////////////////

    /**
     * edit method
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        
         //set login user type for default view
        $userType = $this->Auth->user('type');
        $this->set('userType', $userType);
        
        //check authenticated user
        $login_user_id = $this->Auth->user('id');
        $return_value = $this->DmeAssignPatient->UserValidate($login_user_id, $id);
        if ($return_value == '1') {

            $user_data = $this->User->find('all', array('conditions' => array('User.type' => "clinician")), array('fields' => array('User.id', 'User.name')));

            //set clinicians name for select box
            $assigned_data = $this->DmeAssignPatient->find('first', array('conditions' => array('DmeAssignPatient.patient_id' => $id), 'fields' => 'DmeAssignPatient.clinician_id'));
            if (!empty($assigned_data)) {
                $clinician_ids = $assigned_data['DmeAssignPatient']['clinician_id'];
                $clinican_data = $this->User->find('first', array('conditions' => array('User.id' => $clinician_ids), 'fields' => array('User.name')));
                $this->set('clinican_name', $clinican_data['User']['name']);
                //make array for select box option
                $options = array();
                $options[$clinician_ids] = $clinican_data['User']['name'];
                foreach ($user_data as $d) {
                    if ($d['User']['id'] != $clinician_ids)
                        $options[$d['User']['id']] = $d['User']['name'];
                }

                $this->set(compact('options'));
            }
            $edit_data = $this->User->find('first', array('conditions' => array('User.id' => $id)));
            $this->set('edit_data', $edit_data);

            if (!$this->User->exists($id)) {
                throw new NotFoundException(__('Invalid user'));
            }
            //saving edit data into user and dme_assign_patient table
            if ($this->request->is('post') || $this->request->is('put')) {
                if ($this->User->save($this->request->data)) {
                    $patientId = $this->data['User']['id'];
                    $dmeId = $this->Auth->user('id');

                    $findAssignId_data = $this->DmeAssignPatient->find('first', array('conditions' => array('DmeAssignPatient.dme_id' => $dmeId, 'DmeAssignPatient.patient_id' => $patientId), 'fields' => 'DmeAssignPatient.id'));
                    $findAssignId = $findAssignId_data['DmeAssignPatient']['id'];
                    $clinicId = $this->data['User']['emp_name'];
                    $dmeData = array('DmeAssignPatient' => array('id' => $findAssignId,
                            'dme_id' => $dmeId,
                            'patient_id' => $patientId,
                            'clinician_id' => $clinicId,
                            'create_date' => date("Y-m-d H:i:s")));
                    $this->DmeAssignPatient->save($dmeData);

                    // $this->Session->setFlash(__('The user has been saved'));
                    $this->redirect(array('action' => 'view/patient'));
                } else {
                    // $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
                }
            } else {
                $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
                $this->request->data = $this->User->find('first', $options);
            }
        } else {
            $this->redirect(array('controller' => 'dmes', 'action' => 'index'));
        }
        //set dynamically dme name for view
        $dme_did = $this->Auth->user('id');
        $dme_data = $this->User->find('first', array('conditions' => array('User.id' => $dme_did), 'fields' => array('User.name')));
        if (!empty($dme_data)) {
            $this->set('dme_name', $dme_data['User']['name']);
        }
        //set selected action detail
        $this->set('action_detail', 'EDIT PROFILE');
    }

////////////////////////////////////////////////////////////////////////////////

    /**
     * delete method
     * @throws NotFoundException
     * @throws MethodNotAllowedException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        //find ids from reports and dme_assign_patient table for delete
        $DmeAssignData = $this->DmeAssignPatient->findByPatientId($id);
        if (!empty($DmeAssignData)) {
            $DmeAssignId = $DmeAssignData['DmeAssignPatient']['id'];
        }
        $ReportData = $this->Report->findAllByPatientId($id);
        if (!empty($ReportData)) {
            foreach ($ReportData as $value) {
                $ReportId[] = $value['Report']['id'];
            }
            $this->Report->id = $ReportId;
        }
        $this->User->id = $id;
        if (!empty($DmeAssignId)) {
            $this->DmeAssignPatient->id = $DmeAssignId;
        }
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        //delete record from user,dme_assign_patient and report table
        $this->request->onlyAllow('post', 'delete');
        if (!empty($DmeAssignData)) {
            $this->User->delete();
            if (!empty($DmeAssignId)) {
                $this->DmeAssignPatient->delete();
            }
            if (!empty($ReportData)) {
                $this->Report->delete();
            }
            $this->redirect(array('action' => '/view/patient'));
        }

        $this->redirect(array('action' => 'index'));
    }

////////////////////////////////////////////////////////////////////////////////

    /**
     * report method
     * @throws NotFoundException
     * @throws MethodNotAllowedException
     * @param string $id
     * @return void
     */
    public function report($id) {
        //set login user type for default view
        $userType = $this->Auth->user('type');
        $this->set('userType', $userType);
        //check authenticated user
        $login_user_id = $this->Auth->user('id');
        $return_value = $this->DmeAssignPatient->UserValidate($login_user_id, $id);
        if ($return_value == '1') {
            //loadModel
            $this->loadModel('Report');
            $this->loadModel('User');

            $patient_data = $this->User->findById($id);
            $this->set('patient_data', $patient_data);
            //fetch data from reports table for patient report
            $this->paginate = array(
                'conditions' => array('Report.patient_id' => $id, 'Report.status' => 'P'),
                'limit' => 10,
                'order' => 'Report.created_date DESC',
            );
            $patient_reports = $this->paginate('Report');
            if (isset($patient_reports) && !empty($patient_reports)) {
                $this->set('report_data', $patient_reports);
            }
        } else {
            $this->redirect(array('controller' => 'admin', 'action' => 'index'));
        }

        //set dynamically dme name for view
        $dme_did = $this->Auth->user('id');
        $dme_data = $this->User->find('first', array('conditions' => array('User.id' => $dme_did), 'fields' => array('User.name')));
        if (!empty($dme_data)) {
            $this->set('dme_name', $dme_data['User']['name']);
        }
        //set selected action detail
        $this->set('action_detail', 'PATIENT REPORT');
    }

////////////////////////////////////////////////////////////////////////////////

    /**
     * editdme method
     * @throws NotFoundException
     * @throws MethodNotAllowedException
     * @param string $id
     * @return void
     */
    public function editdme($id = null) {
        //set login user type for default view
        $userType = $this->Auth->user('type');
        $this->set('userType', $userType);

        //check authenticated user
          $login_user_id = $this->Auth->user('id');
            if ($login_user_id == $id) {

                if ($this->request->is('post') || $this->request->is('put')) {
                    $data = array('User' => array(
                            'name' => $this->data['User']['name'],
                            'sex' => $this->data['User']['sex'],
                            'mobile' => $this->data['User']['mobile'],
                            'type' => "admin",
                            'address' => $this->data['User']['address'],
                            'id' => $id
                            ));
                    $this->User->save($data);
                    $this->redirect(array('action' => 'index'));
                    $this->Session->setFlash(__('The user has been saved'));
                } else {
                    $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
                    $this->request->data = $this->User->find('first', $options);
                }
            }
         else {
            $this->redirect(array('controller' => 'dmes', 'action' => 'index'));
        }

        //set dynamically dme name for view
        $dme_did = $this->Auth->user('id');
        $dme_data = $this->User->find('first', array('conditions' => array('User.id' => $dme_did), 'fields' => array('User.name')));
        if (!empty($dme_data)) {
            $this->set('dme_name', $dme_data['User']['name']);
        }

        //set selected action detail
        $this->set('action_detail', 'EDIT MY PROFILE');
    }

////////////////////////////////////////////////////////////////////////////////

    /**
     * search method
     * @throws NotFoundException
     * @throws MethodNotAllowedException
     * @param string $query
     * @return void
     */
    public function search($query = null) {
       //set login user type for default view
        $userType = $this->Auth->user('type');
        $this->set('userType', $userType);
        
        //find logged in user id
        $login_user = $this->Auth->user('id');
        if (!empty($this->data['dmes']['search_query']) && isset($this->data['dmes']['search_query'])) {
            $this->Session->write("search_data", $this->data['dmes']['search_query']);
        }
        $session_data = $this->Session->read("search_data");
        //check submit data is empty or not 
        if (!empty($session_data) && isset($session_data)) {
            $search_query = $session_data;
            $user_data = $this->User->findAllByName($search_query);
            //find patient_id from users table
            if (!empty($user_data)) {
                foreach ($user_data as $val) {
                    $patient_id[] = $val['User']['id'];
                }
            }
            //find patient_id from reports table    
            else {
                $report_data = $this->Report->findAllBySerialNo($search_query);

                foreach ($report_data as $val) {
                    $patient_id[] = $val['Report']['patient_id'];
                }
            }
            // fetch the patient search result according logged in DME 
            if (!empty($patient_id)) {
                $dme_id = $this->Auth->user('id');
                $this->DmeAssignPatient->recursive = -1;
                $this->User->virtualFields = array('per' => 'per', 'clinician' => 'clinician');
                $this->paginate = array('joins' => array(
                        array(
                            'table' => 'users',
                            'alias' => 'u',
                            'type' => 'LEFT',
                            'conditions' => array(
                                'DmeAssignPatient.dme_id=u.id'
                            )
                        ),
                        array(
                            'table' => 'users',
                            'alias' => 'User',
                            'type' => 'LEFT',
                            'conditions' => array(
                                'DmeAssignPatient.patient_id=User.id'
                            )
                        ),
                        array(
                            'table' => 'users',
                            'alias' => 'u2',
                            'type' => 'LEFT',
                            'conditions' => array(
                                'DmeAssignPatient.clinician_id=u2.id'
                            )
                        ),
                        array(
                            'table' => 'reports',
                            'alias' => 'Report',
                            'type' => 'LEFT',
                            'conditions' => array(
                                'DmeAssignPatient.patient_id = Report.patient_id',
                            )
                        )
                    ),
                    'fields' => array('SUBSTRING_INDEX(GROUP_CONCAT(Report.percentage ORDER BY Report.created_date DESC SEPARATOR ", "),", ",1) as per', 'DmeAssignPatient.id', 'u.name as dme', 'User.id', 'User.name', 'User.email', "User.mobile", "User.type", "User.address", "User.created_date as patient", "u2.name as clinician","Report.percentage "),
                    'conditions' => array(
                        'DmeAssignPatient.dme_id' => $dme_id, 'DmeAssignPatient.patient_id' => $patient_id
                    ),
                    'limit' => 10,
                    'group' => array('Report.patient_id', 'User.id'),
                    'order' => 'User.created_date DESC'
                );
                $complete_data = $this->paginate('DmeAssignPatient');
                //set search result(patient) for search view
                $this->set('complete_data', $complete_data);
                //fetch the compliance percentage from report table.
                $Compliance = array();
                foreach ($complete_data as $values) {
                    $patient_id = $values['User']['id'];
                    $Compliance[] = $this->Report->find('first', array('fields' => array('Report.patient_id,id,icode_period,days'), 'conditions' => array('patient_id' => $patient_id), 'order' => 'created_date DESC'));
                }
                $this->set(compact('Compliance', $Compliance));
                $this->request->data['dmes']['search_query'] = $session_data;
            }
        }

        //set dynamically dme name for view
        $dme_did = $this->Auth->user('id');
        $dme_data = $this->User->find('first', array('conditions' => array('User.id' => $dme_did), 'fields' => array('User.name')));
        if (!empty($dme_data)) {
            $this->set('dme_name', $dme_data['User']['name']);
        }
        
        //set selected action detail
        $this->set('action_detail', 'SEARCH RESULT');
    }

////////////////////////////////////////////////////////////////////////////////
       
    /**
     * chart method
     *
     * @throws NotFoundException
     * @throws MethodNotAllowedException
     * @param string $id
     * @return void
     */

    public function chart($id=null) {
        $login_dmeid = $this->Auth->user('id');
        //use ValidReport function for valid report 
        $return_value = $this->Report->ValidReport($id, $login_dmeid);
        if ($return_value == '1') {
            $patient_reports = $this->Report->find('all', array('conditions' => array('id' => $id, 'status' => 'P')));
            if (!empty($patient_reports)) {
                $this->set('report_data', $patient_reports);
            }
        }
        //set dynamically dme name for view
        $dme_did = $this->Auth->user('id');
        $dme_data = $this->User->find('first', array('conditions' => array('User.id' => $dme_did), 'fields' => array('User.name')));
        if (!empty($dme_data)) {
            $this->set('dme_name', $dme_data['User']['name']);
        }
        //set login user type for default view
        $userType = $this->Auth->user('type');
        $this->set('userType', $userType);

        //set selected action detail
        $this->set('action_detail', 'GRAPH AND REPORT');
    }

////////////////////////////////////////////////////////////////////////////////    
}
