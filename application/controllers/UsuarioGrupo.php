<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controller responsável pelo cadastro de grupos de usuário no sistema.
 * Controla as permissões por grupo de usuário.
 * 
 * @author Gabriel Vieira - gabrielvra@outlook.com
 */
class UsuarioGrupo extends MY_Controller {
    
    /**
     * Contrutor padrão
     */
    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'codegen_helper'));
        $this->load->model('UsuarioGrupoModel', '', TRUE);
    }
	
    /**
     * {@inheritDoc}
     * @see MY_Controller::index()
     */
    public function index(){
	    $this->data['content'] = 'usuario_grupo/index';	    
	    parent::index();
	}
	
	/**
	 * {@inheritDoc}
	 * @see MY_Controller::isVerificaLogin()
	 */
	public function isVerificaLogin(){
	    return true;
	}
	
	/**
	 * {@inheritDoc}
	 * @see MY_Controller::getModel()
	 */
	protected function getModel(){
	    return $this->UsuarioGrupoModel;
	}
    
	/**
	 * Salvar o registro cadastrado no formulário
	 * Recebe os dados, faz a validação, verifica se o registro já existe e salva os dados.
	 */
    public function save(){
        //Recuperar os dados do formulário
        $id = set_value('id_registro');
        $ds_chave = array(
            '-r-dashboard' => set_value('-r-dashboard'), '-c-dashboard' => set_value('-c-dashboard'), '-u-dashboard' => set_value('-u-dashboard'), '-d-dashboard' => set_value('-d-dashboard'),
            '-r-grupousuario' => set_value('-r-grupousuario'), '-c-grupousuario' => set_value('-c-grupousuario'), '-u-grupousuario' => set_value('-u-grupousuario'), '-d-grupousuario' => set_value('-d-grupousuario'),
            '-r-usuario' => set_value('-r-usuario'), '-c-usuario' => set_value('-c-usuario'), '-u-usuario' => set_value('-u-usuario'), '-d-usuario' => set_value('-d-usuario'),
            '-r-pessoa' => set_value('-r-pessoa'), '-c-pessoa' => set_value('-c-pessoa'), '-u-pessoa' => set_value('-u-pessoa'), '-d-pessoa' => set_value('-d-pessoa'),
            '-r-objeto' => set_value('-r-objeto'), '-c-objeto' => set_value('-c-objeto'), '-u-objeto' => set_value('-u-objeto'), '-d-objeto' => set_value('-d-objeto'),
            '-r-lancamento' => set_value('-r-lancamento'), '-c-lancamento' => set_value('-c-lancamento'), '-u-lancamento' => set_value('-u-lancamento'), '-d-lancamento' => set_value('-d-lancamento'),
            '-r-sobre' => set_value('-r-sobre'), '-c-sobre' => set_value('-c-sobre'), '-u-sobre' => set_value('-u-sobre'), '-d-sobre' => set_value('-d-sobre')
            );
        $dados = array(
            'cd_usuario_grupo' => set_value('cd_usuario_grupo'),
            'ds_denominacao' => set_value('ds_denominacao'),
            'fl_situacao' => set_value('fl_situacao'),
            'ds_chave' => serialize($ds_chave)
        );        
        $this->load->library('form_validation');
        if ($this->form_validation->run('usuariogrupo') == false) {
            echo json_encode(array('result' => false, 'msg' => validation_errors()));
        } else {            
            //Cadastrar no banco de dados a informação. Se existir ID, registro deve ser atualizado, senão é inserido.
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
            $array['cd'] = $dados->cd_usuario_grupo;
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
     * Visualizar o registro.
     * Se não existir id no parâmetro, será apresentado tela com os campos vazios.
     */
    public function view(){
        $this->data['content'] = 'usuario_grupo/form';
        parent::view();
    }
    
    /**
     * Selecionar os dados para apresentar no componente de visualização
     * {@inheritDoc}
     * @see MY_Controller::getData()
     */
    public function getData() {
        $list = parent::getData();
        $data = array();
        foreach ($list as $usuarioGrupo) {
            $row = array();
            $row[] = $usuarioGrupo->id;
            $row[] = $usuarioGrupo->cd_usuario_grupo;
            $row[] = $usuarioGrupo->ds_denominacao;
            $row[] = $usuarioGrupo->dt_criacao;
            $row[] = $usuarioGrupo->fl_situacao;
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
     * Selecionar os grupos de usuário para apresentar em componente de seleção.
     */
    public function getSelectByData() {
        $list = parent::getData();
        $data = array();
        foreach ($list as $usuarioGrupo) {
            $data[] = ['id'=>$usuarioGrupo->id, 'text'=>$usuarioGrupo->ds_denominacao];
        }
        echo json_encode($data);
    }
    
    /**
     * {@inheritDoc}
     * @see MY_Controller::getPermissionName()
     */
    protected function getPermissionName() {
        return "grupousuario";
    }

}