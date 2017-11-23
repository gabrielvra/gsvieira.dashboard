<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Acesso aos dados da entidade Pessoa.
 *
 * @author Gabriel Vieira - gabrielvra@outlook.com
 */
class PessoaModel extends MY_Model {
    
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
        return array(id, cd_pessoa, ds_documento, tp_pessoa, dt_nascimento, nr_telefone, ds_email);
    }
    
    /**
     * {@inheritDoc}
     * @see MY_Model::getColumnCode()
     */
    public function getColumnCode(){
        return 'cd_pessoa';
    }
    
    /**
     * {@inheritDoc}
     * @see MY_Model::getTableName()
     */
    public function getTableName(){
        return "pessoa";
    }
    
    /**
     * {@inheritDoc}
     * @see MY_Model::getOrder()
     */
    public function getOrder(){
        return array('cd_pessoa' => 'asc');
    }
    
    /**
     * {@inheritDoc}
     * @see MY_Model::getColumnSearch()
     */
    public function getColumnSearch(){
        return array('ds_nome', 'ds_documento', 'ds_email');
    }
}