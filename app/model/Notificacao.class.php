<?php
class Notificacao extends TRecord
{
    const TABLENAME = 'notificacao';
    const PRIMARYKEY= 'cod_notificacao';
    const IDPOLICY =  'max'; // {max, serial} 
    
    /**
     * Constructor method
     * @param $id Primary key to be loaded (optional)
     */
    public function __construct($id = NULL, $callObjectLoad = TRUE)
    {
        parent::__construct($id, $callObjectLoad);
        parent::addAttribute('data');
        parent::addAttribute('assunto');
        parent::addAttribute('mensagem');
        parent::addAttribute('confirmacao');     
    }
}
