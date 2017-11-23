<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Acesso aos dados da entidade Usuario.
 *
 * @author Gabriel Vieira - gabrielvra@outlook.com
 */
class UsuarioModel extends MY_Model {
    
    /**
     * Construtor padrão do model.
     */
    public function __construct(){
        parent::__construct();
    }
    
    /**
     * {@inheritDoc}
     * @see MY_Model::getColumnOrder()
     */
    public function getColumnOrder(){
        return array(id, cd_usuario, ds_nome, ds_email, ds_login, nr_telefone, fl_situacao);
    }

    /**
     * {@inheritDoc}
     * @see MY_Model::getColumnCode()
     */
    public function getColumnCode(){
        return 'cd_usuario';
    }

    /**
     * {@inheritDoc}
     * @see MY_Model::getTableName()
     */
    public function getTableName(){
        return "usuario";
    }

    /**
     * {@inheritDoc}
     * @see MY_Model::getOrder()
     */
    public function getOrder(){
        return array('cd_usuario' => 'asc');
    }

    /**
     * {@inheritDoc}
     * @see MY_Model::getColumnSearch()
     */
    public function getColumnSearch(){
        return array('ds_nome', 'ds_login', 'ds_email');
    }
    
    public function getUsuarioLoginValido($ds_login, $ds_senha){
        if (isset($ds_login) && isset($ds_senha)){
            $this->db->select("*");
            $this->db->from($this->getTableName());
            $this->db->where($this->getTableName().'.ds_login', $ds_login);
            $this->db->where($this->getTableName().'.ds_senha', $ds_senha);
            $this->db->limit(1);
            return $this->db->get()->row();
        }
        return null;
    }
}