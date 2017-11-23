<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controlador de erros de página não encontrada
 * @author Gabriel Vieira - gabrielvra@outlook.com
 */
class Erro404 extends MY_Controller {
	
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
        $this->data['content'] = 'erro/404';
		parent::index();
    }
    
    /**
     * {@inheritDoc}
     * @see MY_Controller::getModel()
     */
    protected function getModel(){}

    /**
     * {@inheritDoc}
     * @see MY_Controller::isVerificaLogin()
     */
    protected function isVerificaLogin(){
        return false;
    }
    
    /**
     * {@inheritDoc}
     * @see MY_Controller::getPermissionName()
     */
    protected function getPermissionName(){
        return "";
    }
}