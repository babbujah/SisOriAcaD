<?php
class Turma extends TRecord
{
    const TABLENAME = 'turma';
    const PRIMARYKEY= 'cod_turma';
    const IDPOLICY =  'max'; // {max, serial} 
    
    /**
     * Constructor method
     * @param $id Primary key to be loaded (optional)
     */
    public function __construct($id = NULL, $callObjectLoad = TRUE)
    {
        parent::__construct($id, $callObjectLoad);
        parent::addAttribute('horario');
        parent::addAttribute('ano_semestre');
        parent::addAttribute('departamento');     
    }
}
