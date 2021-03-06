<?php
class HistoricoEscolar extends TRecord
{
    const TABLENAME = 'historico_escolar';
    const PRIMARYKEY= 'id';
    const IDPOLICY =  'max'; // {max, serial}
    
    private $listaRegistrosHistorico;
    
    /**
     * Constructor method
     * @param $id Primary key to be loaded (optional)
     */
    public function __construct($id = NULL, $callObjectLoad = TRUE)
    {
        parent::__construct($id, $callObjectLoad);
        
        parent::addAttribute('matricula_aluno');
        parent::addAttribute('cod_componente');              
        parent::addAttribute('nota');
        parent::addAttribute('situacao');
        parent::addAttribute('ano');
        
        $this->listaRegistrosHistorico = [];
        
    }
    
    public function get_componenteCurricular(){
    
    echo 'entrei aqui';
        if( empty( $this->componenteCurricular ) ){
        echo 'entrei na condição';
            $this->componenteCurricular = new ComponenteCurricular( $this->cod_componente );
            var_dump( $this->componenteCurricular );
            
        }
        
        return $this->componenteCurricular;
    }
    
    
    public function adicionarResgistroHistorico( $registroHistorico ){
        $this->listaRegistrosHistorico[] = $registroHistorico;
        
    }
    
    public function removerRegistoHistorico( $indiceRegistro ){
        unset($input[ $indiceRegistro ]);
        
    }
    
    public function pegarTodoHistoricoEscolar(){
        $this->listaRegistrosHistorico;
        
    }    
    
}
