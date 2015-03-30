<?php
App::uses('AppModel', 'Model');
class TransMemberMembershipScheme extends Model {

    public $name = 'TransMemberMembershipScheme';
    
    public $useTable = 'trans_member_membership_scheme';

    public function getTransMemberMembershipScheme() // Try to avoid naming a function as get()
    {
    /** Choose either of 2 lines below **/
        return $this->query("SELECT * FROM TransMemberMembershipScheme"); // if table name is `Location` since your public name is `Location`
    }
    
    public function getTransMemberMembershipSchemeByID($id) 
    {
        return $this->query("SELECT * FROM trans_member_membership_scheme WHERE member_id ='".$id."'");
    }
    
    
}