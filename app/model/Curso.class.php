<?php
class Curso extends TRecord
{
    const TABLENAME = 'curso';
    const PRIMARYKEY= 'cod_curso';
    const IDPOLICY =  'max'; // {max, serial} 
    
    /**
     * Constructor method
     * @param $id Primary key to be loaded (optional)
     */
    public function __construct($id = NULL, $callObjectLoad = TRUE)
    {
        parent::__construct($id, $callObjectLoad);
        parent::addAttribute('nivel');
        parent::addAttribute('nome_curso');
    }
}
