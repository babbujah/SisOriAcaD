<?php
class Reuniao extends TRecord
{
    const TABLENAME = 'reuniao';
    const PRIMARYKEY= 'cod_reuniao';
    const IDPOLICY =  'max'; // {max, serial} 
    
    /**
     * Constructor method
     * @param $id Primary key to be loaded (optional)
     */
    public function __construct($id = NULL, $callObjectLoad = TRUE)
    {
        parent::__construct($id, $callObjectLoad);
        parent::addAttribute('data');
        parent::addAttribute('horario')
        parent::addAttribute('assunto');
        parent::addAttribute('mensagem');     
    }
}
