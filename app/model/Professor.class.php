<?php
class Professor extends TRecord
{
    const TABLENAME = 'professor';
    const PRIMARYKEY= 'matricula';
    const IDPOLICY =  'max'; // {max, serial} 
    
    /**
     * Constructor method
     * @param $id Primary key to be loaded (optional)
     */
    public function __construct($id = NULL, $callObjectLoad = TRUE)
    {
        parent::__construct($id, $callObjectLoad);
        parent::addAttribute('nome');
        parent::addAttribute('status');
        parent::addAttribute('email');
        parent::addAttribute('dataIngresso');        
    }
}
