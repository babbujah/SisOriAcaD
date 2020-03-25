<?php
class Pre_requisito extends TRecord
{
    const TABLENAME = 'pre_requisito';
    const PRIMARYKEY= 'id';
    const IDPOLICY =  'max'; // {max, serial} 
    
    /**
     * Constructor method
     * @param $id Primary key to be loaded (optional)
     */
    public function __construct($id = NULL, $callObjectLoad = TRUE)
    {
        parent::__construct($id, $callObjectLoad);
        parent::addAttribute('componente_curricular_id');
        parent::addAttribute('pre_requisito_id');     
    }
}
