<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controlador principal do sistema, primeiro acesso se dá através desse controlador.
 * Carrega a página com os gráficos e dados principais.
 * @author Gabriel Vieira - gabrielvra@outlook.com
 */
class Principal extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper(['url','html','form']);
		$this->load->library(['form_validation','session']);
	}
	
	/**
	 * {@inheritDoc}
	 * @see MY_Controller::index()
	 */
	public function index(){
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
        return "dashboard";
    }
}