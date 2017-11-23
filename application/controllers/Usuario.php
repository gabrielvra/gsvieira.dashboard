<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controller responsável pelo cadastro de usuário no sistema.
 * @author Gabriel Vieira - gabrielvra@outlook.com
 */
class Usuario extends MY_Controller{
    
    /**
     * Contrutor padrão
     */
    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'codegen_helper'));
        $this->load->model('UsuarioModel', '', TRUE);
    }
    
    /**
     * {@inheritDoc}
     * @see MY_Controller::index()
     */
    public function index(){
        $this->data['content'] = 'usuario/index';
        parent::index();
    }
    
    /**
     * Carrega os dados do perfil do usuário.
     */
    public function perfil(){
        if ($this->is_logged_in()){
            $id = $this->session->userdata('user_id_login');
            if (isset($id)){
                $page_data = $this->getModel()->getById($id);
                //Carrega informações vindas de outras tabelas
                $page_data = $this->loadJoinedTableData($page_data);
                $this->data['page_data'] = $page_data;
            }
            $this->data['content'] = 'usuario/perfil';
            $dados = empty($this->data) ? null : $this->data;
            $this->load->view('theme/index', $dados);
        }
    }
    
    /**
     * {@inheritDoc}
     * @see MY_Controller::getModel()
     */
    protected function getModel(){
        return $this->UsuarioModel;
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
            'cd_usuario' => set_value('cd_usuario'),
            'ds_nome' => set_value('ds_nome'),
            'ds_email' => set_value('ds_email'),
            'ds_login' => set_value('ds_login'),
            'nr_telefone' => set_value('nr_telefone'),
            'fl_situacao' => set_value('fl_situacao'),
            'usuario_grupo_id' => set_value('usuario_grupo_id')
        );
        $ds_senha = set_value('ds_senha');
        if (isset($ds_senha) && !empty($ds_senha)){
            $this->load->helper('security');
            $ds_senha = do_hash($ds_senha);
            $dados['ds_senha'] = $ds_senha;
        }
        $this->load->library('form_validation');
        if ($this->form_validation->run('usuario') == false) {
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
            $array['cd'] = $dados->cd_usuario;
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
        $this->data['content'] = 'usuario/form';
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
            $row[] = $usuario->cd_usuario;
            $row[] = $usuario->ds_nome;
            $row[] = $usuario->ds_email;
            $row[] = $usuario->ds_login;
            $row[] = $usuario->nr_telefone;
            $row[] = $usuario->fl_situacao;
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
     * Carregar os dados do grupo do usuário.
     * {@inheritDoc}
     * @see MY_Controller::loadJoinedTableData()
     */
    public function loadJoinedTableData($page_data) {
        $page_data = parent::loadJoinedTableData($page_data);
        //Carrega os campos do grupo de usuário para carregar na tela os dados necesários.
        if (isset($page_data->usuario_grupo_id)){
            $this->load->model('UsuarioGrupoModel', '', TRUE);
            $usuario_data = $this->UsuarioGrupoModel->getById($page_data->usuario_grupo_id);
            if (isset($usuario_data)){
                $page_data_array = (array) $page_data;
                $page_data_array['usuario_grupo_ds_denominacao'] = $usuario_data->ds_denominacao;
                return (object) $page_data_array;
            }
        }
        return $page_data;
    }
    
    /**
     * Realiza o acesso do usuário no sistema.
     * Inserir uma session com os dados do usuário.
     */
    public function processUsuarioLogin(){
        $ds_login = set_value('ds_login');
        $ds_senha = set_value('ds_senha');
        $this->load->library('form_validation');
        if ($this->form_validation->run('usuario_login') == false) {
            echo json_encode(array('result' => false, 'msg' => validation_errors()));
        } else {
            $this->load->helper('security');
            $ds_senha = do_hash($ds_senha);
            $usuario = $this->getModel()->getUsuarioLoginValido($ds_login, $ds_senha);
            if (isset($usuario) && count($usuario) > 0){
                $dados = array('user_name_login' => $usuario->ds_nome, 'user_id_login' => $usuario->id, 'user_login' => true, 'usuario_grupo_id' => $usuario->usuario_grupo_id);
                $this->session->set_userdata($dados);
                echo json_encode(array('result' => true, 'msg' => "Acesso permitido."));
            } else {
                echo json_encode(array('result' => false, 'msg' => "Usuário ou senha inválidos."));
            }
        }
    }
    
    /**
     * Remover a session do usuário e voltar para tela de login.
     */
    public function processUsuarioExit() {
        $this->session->sess_destroy();
        redirect('principal');
    }
    
    /**
     * Carrega os dados do componente de seleção do usuário.
     */
    public function getSelectByData() {
        $list = parent::getData();
        $data = array();
        foreach ($list as $usuario) {
            $data[] = ['id'=>$usuario->id, 'text'=>$usuario->ds_login];
        }
        echo json_encode($data);
    }
    
    /**
     * {@inheritDoc}
     * @see MY_Controller::getPermissionName()
     */
    protected function getPermissionName(){
        return "usuario";
    }
    
    /**
     * 
     * @return boolean
     */
    public function uploadImageFile(){
        //please note that the request will fail if you upload a file larger than what is supported by your PHP or Webserver settings
        $ajax = isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH']==='XMLHttpRequest';
        $result = array();
        $file = $_FILES['avatar'];
        if(!preg_match('/^image\//' , $file['type']) || !preg_match('/\.(jpe?g|gif|png)$/', $file['name']) || getimagesize($file['tmp_name']) === FALSE ) {
                $result['status'] = 'ERR';
                $result['message'] = 'Formato inválido.';
            } else if($file['size'] > 110000) {
                $result['status'] = 'ERR';
                $result['message'] = 'Tamanho da imagem ultrapassa o limite de 100kb.!';
            } else if($file['error'] != 0 || !is_uploaded_file($file['tmp_name'])) {
                $result['status'] = 'ERR';
                $result['message'] = 'Erro não identificado, contate administrador.';
            } else {
                $id_registro = set_value('id_registro');
                $save_path = 'assets/images/avatars/_'.$id_registro.'_'.$file['name'];
                $thumb_path = 'assets/images/avatars/_'.$id_registro.'_thumb_'.$file['name'];
                if (!move_uploaded_file($file['tmp_name'] , $save_path) OR !$this->resize($save_path, $thumb_path, 150)){
                    $result['status'] = 'ERR';
                    $result['message'] = 'Não foi possível salvar a imagem!';
                }
                else {
                    //Atualiza a entidade
                    $dados = array('ds_avatar' => $thumb_path);
                    $this->edit($dados, $id_registro);
                    //Envia mensagem de sucesso
                    $result['status'] = 'OK';
                    $result['message'] = 'Imagem atualizada com sucesso.';
                    $result['url'] = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']).'/'.$thumb_path;
                }
            }
            $result = json_encode($result);
            if($ajax) {
                echo $result;
            }
            else {
                //for browsers that don't support uploading via ajax,
                //we have used an iframe instead and the response is sent as a script
                echo '<script language="javascript" type="text/javascript">';
                echo 'var iframe = window.top.window.jQuery("#'.$_POST['temporary-iframe-id'].'").data("deferrer").resolve('.$result.');';
                echo '</script>';
            }
    }
    
    private function resize($in_file, $out_file, $new_width, $new_height=FALSE)
    {
        $image = null;
        $extension = strtolower(preg_replace('/^.*\./', '', $in_file));
        switch($extension)
        {
            case 'jpg':
            case 'jpeg':
                $image = imagecreatefromjpeg($in_file);
                break;
            case 'png':
                $image = imagecreatefrompng($in_file);
                break;
            case 'gif':
                $image = imagecreatefromgif($in_file);
                break;
        }
        if(!$image || !is_resource($image)) return false;
        $width = imagesx($image);
        $height = imagesy($image);
        if($new_height === FALSE)
        {
            $new_height = (int)(($height * $new_width) / $width);
        }
        
        $new_image = imagecreatetruecolor($new_width, $new_height);
        imagecopyresampled($new_image, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
        $ret = imagejpeg($new_image, $out_file, 80);
        imagedestroy($new_image);
        imagedestroy($image);
        return $ret;
    }
}