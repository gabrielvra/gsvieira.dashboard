<?php
defined('BASEPATH') OR exit('No direct script access allowed');

abstract class MY_Controller extends CI_Controller {

	public function __construct(){
	    parent::__construct();
    }
	
    /**
     * Verifica se o login é exigido para acessar métodos no controller.
     */
    abstract protected function isVerificaLogin();
    
    /**
     * Retorna o model que pertence ao controller. Se o controller não possuir model, retornar nulo.
     */
    abstract protected function getModel();
    
    
    /**
     * Retorna o nome da permissão utilizada no cadastro de grupo de usuários.
     */
    abstract protected function getPermissionName();
    
    /**
     * Carregar a página principal do tema e passar os dados para a página.
     */
	public function index(){
	    if ($this->is_logged_in()){
	        if (!$this->permission->checkPermission($this->session->userdata('usuario_grupo_id'), '-r-'.$this->getPermissionName())){
	            $this->data['content'] = 'erro/Permissao';
	            $this->load->view('theme/index',  $this->data);
	        } else {
    	        $dados = empty($this->data) ? null : $this->data;
    	        $this->load->view('theme/index', $dados);
	        }
	    }
	}
	
	/**
	 * Verifica se o usuário está logado
	 * @return boolean
	 */
    public function is_logged_in(){
        if ($this->isVerificaLogin() && !$this->session->userdata('user_login')) {
		    //Mostrar mensagem na tela de login que é necessário estar ativo no sistema para acessar a opção
		    $this->load->view('login/login');
		    return false;
		}
		return true;
    }
    
    /**
     * Retorna os dados do cadastro para serem exibidos.
     */
    public function getData(){
        return $this->getModel()->get_datatables();
    }
    
    /**
     * Carrega os dados das tabelas filhas.
     * @param $page_data - Conteúdo da página
     * @return 
     */
    public function loadJoinedTableData($page_data){
        return $page_data;
    }
    
    /**
     * Abre o formulário do cadastro.
     * Verifica se existe id do registro, se existir abre o registro, senão abre um formulário limpo 
     */
    public function view(){
        if ($this->is_logged_in()){
            $id = $this->uri->segment(3);
            if (isset($id)){
                $page_data = $this->getModel()->getById($id);   
                //Carrega informações vindas de outras tabelas
                $page_data = $this->loadJoinedTableData($page_data);
                $this->data['page_data'] = $page_data;
            }
            $this->load->view('theme/index', $this->data);
        }
    }
    
    /**
     * Remove o registro utilizando o model 
     * @param Integer $id
     * @return String - Mensagem
     */
    protected function del($id){
        if (!$this->permission->checkPermission($this->session->userdata('usuario_grupo_id'), '-d-'.$this->getPermissionName())){
            return json_encode(array('result' => false, 'msg' => MSG_PERMITION));
        }
        if ($this->getModel()->delete($id)){
            return json_encode(array('result' => true, 'msg' => MSG_DELETED));
        } else {
            return json_encode(array('result' => false, 'msg' => MSG_ERROR_DELETED));
        }
    }
    
    /**
     * Edita um registro utilizando o identificador
     * @param Array $dados
     * @param Integer $id
     * @return String - Mensagem
     */
    protected function edit($dados, $id){
        if (!$this->permission->checkPermission($this->session->userdata('usuario_grupo_id'), '-u-'.$this->getPermissionName())){
            return json_encode(array('result' => false, 'msg' => MSG_PERMITION));
        }
        $id = $this->getModel()->edit($dados, $id);
        if ($id > 0) {
            return json_encode($this->getReturnData($id, MSG_UPDATED));
        } else {
            return json_encode(array('result' => false, 'msg' => MSG_ERROR));
        }
    }
    
    protected function getReturnData($id, $message){
        return array('result' => true, 'msg' => $message, 'id' => $id);
    }
    
    /**
     * Adiciona o registro conforme os dados do parâmetro
     * @param um Array $dados
     */
    protected function add($dados){
        if (!$this->permission->checkPermission($this->session->userdata('usuario_grupo_id'), '-c-'.$this->getPermissionName())){
            return json_encode(array('result' => false, 'msg' => MSG_PERMITION));
        }
        $id = $this->getModel()->add($dados);
        if ($id > 0) {
            return json_encode($this->getReturnData($id, MSG_SUCESS));
        } else {
            return json_encode(array('result' => false, 'msg' => MSG_ERROR));
        }
    } 

}