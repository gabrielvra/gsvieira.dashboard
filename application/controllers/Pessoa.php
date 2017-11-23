<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controller responsável pelo cadastro de pessoa no sistema.
 * @author Gabriel Vieira - gabrielvra@outlook.com
 */
class Pessoa extends MY_Controller{
    
    /**
     * Contrutor padrão
     */
    public function __construct() {
            parent::__construct();
            $this->load->helper(array('form', 'codegen_helper'));
            $this->load->model('PessoaModel', '', TRUE);
    }
    
    /**
     * {@inheritDoc}
     * @see MY_Controller::index()
     */
    public function index(){
        $this->data['content'] = 'pessoa/index';
        parent::index();
    }
    
    /**
     * {@inheritDoc}
     * @see MY_Controller::getModel()
     */
    protected function getModel(){
        return $this->PessoaModel;
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
        $nascimento = $this->convert->getDateStringToMySQLDateTime(set_value('dt_nascimento'));
        $dados = array(
            'cd_pessoa' => set_value('cd_pessoa'),
            'ds_nome' => set_value('ds_nome'),
            'ds_documento' => set_value('ds_documento'),
            'dt_nascimento' => $nascimento,
            'nr_telefone' => set_value('nr_telefone'),
            'tp_pessoa' => set_value('tp_pessoa'),
            'ds_email' => set_value('ds_email'),
            'tp_pessoa' => set_value('tp_pessoa')
        );
        
        $usuario_id = set_value('usuario_id');
        if (isset($usuario_id) && !empty($usuario_id)){
            $dados['usuario_id'] = $usuario_id;
        }
        
        $this->load->library('form_validation');
        if ($this->form_validation->run('pessoa') == false) {
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
            $array['cd'] = $dados->cd_pessoa;
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
        $this->data['content'] = 'pessoa/form';
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
            $row[] = $usuario->cd_pessoa;
            $row[] = $usuario->ds_nome;
            $row[] = $usuario->ds_documento;
            $row[] = $usuario->nr_telefone;
            $row[] = $usuario->ds_email;
            $row[] = $usuario->tp_pessoa;
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
     * Carrega os dados do usuário.
     * {@inheritDoc}
     * @see MY_Controller::loadJoinedTableData()
     */
    public function loadJoinedTableData($page_data) {
        $page_data = parent::loadJoinedTableData($page_data);
        //Carrega os campos do usuário para carregar na tela os dados necesários.
        if (isset($page_data->usuario_id)){
            $this->load->model('UsuarioModel', '', TRUE);
            $usuario_data = $this->UsuarioModel->getById($page_data->usuario_id);
            if (isset($usuario_data)){
                $page_data_array = (array) $page_data;
                $page_data_array['usuario_ds_login'] = $usuario_data->ds_login;
                return (object) $page_data_array;
            }
        }
        return $page_data;
    }
    
    /**
     * {@inheritDoc}
     * @see MY_Controller::getPermissionName()
     */
    protected function getPermissionName() {
        return "pessoa";
    }
}