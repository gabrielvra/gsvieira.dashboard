<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Sobre extends MY_Controller {
	
    /**
     * Construtor padrão
     */
	public function __construct() {
		parent::__construct();
    } 

    /**
     * {@inheritDoc}
     * @see MY_Controller::index()
     */
    public function index(){ 
        $this->data['content'] = 'sobre/index';
        parent::index();
    }
    
    /**
     * {@inheritDoc}
     * @see MY_Controller::getModel()
     */
    protected function getModel(){
        return null;
    }
    
    /**
     * {@inheritDoc}
     * @see MY_Controller::isVerificaLogin()
     */
    protected function isVerificaLogin() {
        return true;
    }
    
    /**
     * {@inheritDoc}
     * @see MY_Controller::getPermissionName()
     */
    protected function getPermissionName(){
        return "sobre";
    }

}