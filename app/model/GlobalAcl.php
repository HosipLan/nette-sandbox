<?php
/**
 * The global ACL
 *
 * @author Pavel Ptacek
 */
class GlobalAcl extends \Nette\Security\Permission {
    /**
     * Setup acl module
     */
    public function __construct() {
        UsersModel::setAcl($this);

        // append further models in here.
    }
}