<?php

App::uses('AppController', 'Controller');

/**
 * Jobpost Controller
 *
 * @property User $User
 * @property AuthComponent $Auth
 */
class JobpostController extends AppController {


    //public $components = array('Auth');
    var $uses = array('TransMember', 'JobAd');

function index()
{

    $totalJobs = $this->JobAd->find('count');
    $this->set('rsRec', $totalJobs);
   


}

}