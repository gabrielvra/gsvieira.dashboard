<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Classe utilizada para conversões diversas
 * Pode ser utilizada em todo o sistema através do $this->convert
 * @author Gabriel Vieira - gabrielvra@outlook.com
 */
class Convert{
    
    /**
     * Recebe uma data no formado MySQL e converte para formado pt-BR
     * @param $date
     * @return uma String.
     */
	public function getMySQLDateTimeToString($date){
	    if (isset($date) && !empty($date)){
	        $format_date = DateTime::createFromFormat('Y-m-d H:i:s', $date);
	        return $format_date->format('d/m/Y');
	    }
	    return null;
	}
	
	/**
	 * Recebe uma data em formato pt-BR e converte para MySQL
	 * @param $date
	 * @return Uma data formatada
	 */
	public function getDateStringToMySQLDateTime($date){
	    if (isset($date) && !empty($date)){
	        $format_date = DateTime::createFromFormat('d/m/Y', $date);
            return $format_date->format('Y-m-d');
	    }
	    return null;
	}
}