<?php

class AclHelper extends Helper {

/**
 * Other helpers used by this helper
 *
 * @var array
 * @access public
 */
	public $helpers = array();

/**
 * Cached actions per Role
 * 
 * @var array
 * @access public
 */
	public $allowedActions = array();

/** Generate allowed actions for current logged in Role
 *
 * @return array
 */
	public function getAllowedActionsByRoleId($roleId) {
		if (!empty($this->allowedActions[$roleId])) {
			return $this->allowedActions[$roleId];
		}

		$this->allowedActions[$roleId] = ClassRegistry::init('Acl.AclPermission')->getAllowedActionsByRoleId($roleId);
		return $this->allowedActions[$roleId];
	}

/**
 * Check if url is allowed for the Role
 * 
 * @return boolean
 */
	public function linkIsAllowedByRoleId($roleId, $url) {
		$linkAction = Inflector::camelize($url['controller']) . '/' . $url['action'];
		if (isset($url['admin']) && $url['admin']) {
			$linkAction = Inflector::camelize($url['controller']) . '/admin_' . $url['action'];
		}
		if (in_array($linkAction, $this->getAllowedActionsByRoleId($roleId))) {
			return true;
		}
		return false;
	}

}
