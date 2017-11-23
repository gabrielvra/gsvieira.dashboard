<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Acesso aos dados da entidade UsuarioGrupo.
 * 
 * @author Gabriel Vieira - gabrielvra@outlook.com
 */
class UsuarioGrupoModel extends MY_Model {

    /**
     * Construtor padrão do model.
     */
    public function __construct(){
        parent::__construct();
    }
    
    /**
     * {@inheritDoc}
     * @see MY_Model::getTable()
     */
    public function getTableName(){
        return 'usuario_grupo';
    }
    
    /**
     * {@inheritDoc}
     * @see MY_Model::getColumnOrder()
     */
    public function getColumnOrder(){
        return array('id', 'cd_usuario_grupo', 'ds_denominacao', 'dt_criacao', 'fl_situacao'); //set column field database for datatable orderable
    }
    
    /**
     * {@inheritDoc}
     * @see MY_Model::getOrder()
     */
    public function getOrder() {
        return array('cd_usuario_grupo' => 'asc'); // default order
    }
    
    /**
     * {@inheritDoc}
     * @see MY_Model::getColumnSearch()
     */
    public function getColumnSearch(){
        return array('ds_denominacao'); //set column field database for datatable searchable
    }
    
    /**
     * {@inheritDoc}
     * @see MY_Model::getColumnCode()
     */
    public function getColumnCode(){
        return 'cd_usuario_grupo';
    }
}