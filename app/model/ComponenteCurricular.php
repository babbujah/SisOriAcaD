<?php
class Componente_curricular extends TRecord
{
    const TABLENAME = 'componente_curricular';
    const PRIMARYKEY= 'cod_disciplina';
    const IDPOLICY =  'max'; // {max, serial} 
    
    /**
     * Constructor method
     * @param $id Primary key to be loaded (optional)
     */
    public function __construct($id = NULL, $callObjectLoad = TRUE)
    {
        parent::__construct($id, $callObjectLoad);
        parent::addAttribute('nome_disciplina');
        parent::addAttribute('nivel');
        parent::addAttribute('deparamento');
        parent::addAttribute('carga_horaria');  
        parent::addAttribute('tipo');      
    }
}
