<?php
class Aluno extends TRecord
{
    //const TABLENAME = 'tbarmacao';
    const PRIMARYKEY= 'id';
    const IDPOLICY =  'max'; // {max, serial} 
    
    /**
     * Constructor method
     * @param $id Primary key to be loaded (optional)
     */
    public function __construct($id = NULL, $callObjectLoad = TRUE)
    {
        parent::__construct($id, $callObjectLoad);
        
        parent::addAttribute('matricula');
        parent::addAttribute('nome');
        parent::addAttribute('login');
        parent::addAttribute('curso');
        
    }
}
