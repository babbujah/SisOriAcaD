<?php
class ComponenteCurricular extends TRecord{
    const TABLENAME = 'componente_curricular';
    const PRIMARYKEY= 'cod_componente';
    //const IDPOLICY =  'max'; // {max, serial} 
    
    /**
     * Constructor method
     * @param $id Primary key to be loaded (optional)
     */
    public function __construct( $cod_componente = NULL, $callObjectLoad = TRUE ){
        parent::__construct($cod_componente,$callObjectLoad);
        parent::addAttribute('cod_componente');
        parent::addAttribute('deparamento');
        parent::addAttribute('nome');
        parent::addAttribute('nivel');        
        parent::addAttribute('carga_horaria');  
        parent::addAttribute('tipo');      
    }
}
