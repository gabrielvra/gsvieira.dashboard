<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controller responsável pelo cadastro de lançamento no sistema.
 * @author Gabriel Vieira - gabrielvra@outlook.com
 */
class Pessoa extends MY_Controller{
    
    /**
     * Contrutor padrão
     */
    public function __construct() {
            parent::__construct();
            $this->load->helper(array('form', 'codegen_helper'));
            $this->load->model('LancamentoModel', '', TRUE);
    }
    
    /**
     * {@inheritDoc}
     * @see MY_Controller::index()
     */
    public function index(){
        $this->data['content'] = 'lancamento/index';
        parent::index();
    }
    
    /**
     * {@inheritDoc}
     * @see MY_Controller::getModel()
     */
    protected function getModel(){
        return $this->LancamentoModel;
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
        $dt_emissao = $this->convert->getDateStringToMySQLDateTime(set_value('dt_emissao'));
        $dt_vencimento = $this->convert->getDateStringToMySQLDateTime(set_value('dt_vencimento'));
        $dados = array(
            'cd_lancamento' => set_value('cd_lancamento'),
            'ds_complemento' => set_value('ds_complemento'),
            'tp_lancamento' => set_value('tp_lancamento'),
            'dt_emissao' => $dt_emissao,
            'dt_vencimento' => $dt_vencimento,
            'vl_lancamento' => set_value('vl_lancamento'),
            'vl_desconto' => set_value('vl_desconto'),
            'fl_baixado' => set_value('fl_baixado')
        );
        //Se existir pessoa, deve inserir/atualizar
        $pessoa_id = set_value('pessoa_id');
        if (isset($pessoa_id) && !empty($pessoa_id)){
            $dados['pessoa_id'] = $usuario_id;
        }
        //Se existir objeto, deve inserir/atualizar
        $objeto_id = set_value('objeto_id');
        if (isset($objeto_id) && !empty($objeto_id)){
            $dados['objeto_id'] = $objeto_id;
        }
        $this->load->library('form_validation');
        if ($this->form_validation->run('lancamento') == false) {
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
     * Lançamento deve enviar o código gerado.
     * {@inheritDoc}
     * @see MY_Controller::getReturnData()
     */
    protected function getReturnData($id, $message){
        $array = parent::getReturnData($id, $message);
        $dados = $this->getModel()->getById($id);
        if(isset($dados) && !is_null($dados)){
            $array['cd'] = $dados->cd_lancamento;
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
        $this->data['content'] = 'lancamento/form';
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
            $row[] = $usuario->cd_lancamento;
            $row[] = $usuario->objeto_ds_descricao;
            $row[] = $usuario->ds_complemento;
            $row[] = $usuario->tp_lancamento;
            $row[] = $usuario->dt_emissao;
            $row[] = $usuario->vl_lancamento;
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
     * Carrega os dados do objeto.
     * {@inheritDoc}
     * @see MY_Controller::loadJoinedTableData()
     */
    public function loadJoinedTableData($page_data) {
        $page_data = parent::loadJoinedTableData($page_data);
        //Carrega os campos do usuário para carregar na tela os dados necesários.
        if (isset($page_data->objeto_id)){
            $this->load->model('ObjetoModel', '', TRUE);
            $objeto_data = $this->ObjetoModel->getById($page_data->objeto_id);
            if (isset($objeto_data)){
                $page_data_array = (array) $page_data;
                $page_data_array['objeto_ds_descricao'] = $objeto_data->ds_descricao;
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
        return "lancamento";
    }
}