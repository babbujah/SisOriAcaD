<?php
class HistoricoEscolar extends TRecord
{
    const TABLENAME = 'historico_escolar';
    const PRIMARYKEY= 'id';
    const IDPOLICY =  'serial'; // {max, serial} 
    
    /**
     * Constructor method
     * @param $id Primary key to be loaded (optional)
     */
    public function __construct($id = NULL, $callObjectLoad = TRUE)
    {
        parent::__construct($id, $callObjectLoad);
        
        //parent::addAttribute('matricula');
        parent::addAttribute('matricula_aluno');
        parent::addAttribute('cod_componente');                
        parent::addAttribute('nota');
        parent::addAttribute('situacao');
        parent::addAttribute('ano');        
    }
}
