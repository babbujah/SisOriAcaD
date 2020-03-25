<?php
class Plano_curso extends TRecord
{
    const TABLENAME = 'plano_curso';
    const PRIMARYKEY= 'cod_plano_curso';
    const IDPOLICY =  'max'; // {max, serial} 
    
    /**
     * Constructor method
     * @param $id Primary key to be loaded (optional)
     */
    public function __construct($id = NULL, $callObjectLoad = TRUE)
    {
        parent::__construct($id, $callObjectLoad);
        parent::addAttribute('data');     
    }
}
