<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controller responsável pelo cadastro de objeto no sistema.
 * @author Gabriel Vieira - gabrielvra@outlook.com
 */
class Objeto extends MY_Controller{
    
    /**
     * Contrutor padrão
     */
    public function __construct() {
            parent::__construct();
            $this->load->helper(array('form', 'codegen_helper'));
            $this->load->model('ObjetoModel', '', TRUE);
    }
    
    /**
     * {@inheritDoc}
     * @see MY_Controller::index()
     */
    public function index(){
        $this->data['content'] = 'objeto/index';
        parent::index();
    }
    
    /**
     * {@inheritDoc}
     * @see MY_Controller::getModel()
     */
    protected function getModel(){
        return $this->ObjetoModel;
    }

    /**
     * {@inheritDoc}
     * @see MY_Controller::isVerificaLogin()
     */
    protected function isVerificaLogin(){
        return true;
    }
    
    /**
     * Salvar o registro cadastrado no formulário
     * Recebe os dados, faz a validação, verifica se o registro já existe e salva os dados.
     */
    public function save(){
        $id = set_value('id_registro');
        $dados = array(
            'cd_objeto' => set_value('cd_objeto'),
            'ds_descricao' => set_value('ds_descricao')
        );              
        $this->load->library('form_validation');
        if ($this->form_validation->run('objeto') == false) {
            echo json_encode(array('result' => false, 'msg' => validation_errors()));
        } else {
            if (isset($id) && !empty($id)){
                echo $this->edit($dados, $id);
            } else {
                echo $this->add($dados);
            }
        }
    }
    
    /**
     * Carrega os dados que são alterados ao salvar um registro.
     * Pessoa deve enviar o código gerado.
     * {@inheritDoc}
     * @see MY_Controller::getReturnData()
     */
    protected function getReturnData($id, $message){
        $array = parent::getReturnData($id, $message);
        $dados = $this->getModel()->getById($id);
        if(isset($dados) && !is_null($dados)){
            $array['cd'] = $dados->cd_objeto;
        }        
        return $array;
    } 
    
    /**
     * Deleta o registro pelo id
     */
    public function delete(){
        echo $this->del(set_value('id'));
    }
    
    /**
     * Carrega o formulário
     * {@inheritDoc}
     * @see MY_Controller::view()
     */
    public function view(){
        $this->data['content'] = 'objeto/form';
        parent::view();
    }
    
    /**
     * Carrega os usuários para demonstrar na lista com as ações.
     * {@inheritDoc}
     * @see MY_Controller::getData()
     */
    public function getData() {
        $list = parent::getData();
        $data = array();
        foreach ($list as $usuario) {
            $row = array();
            $row[] = $usuario->id;
            $row[] = $usuario->cd_objeto;
            $row[] = $usuario->ds_descricao;
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->getModel()->count_all(),
            "recordsFiltered" => $this->getModel()->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }
    
    /**
     * {@inheritDoc}
     * @see MY_Controller::getPermissionName()
     */
    protected function getPermissionName() {
        return "objeto";
    }
}