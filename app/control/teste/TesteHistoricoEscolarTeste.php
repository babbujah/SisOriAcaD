<?php
class TesteHistoricoEscolarTeste extends TPage{
    public function __construct(){
        parent::__construct();
        
        try{
            TTransaction::open( 'minhabasedados' );
            $historicoEscolarDAO = new HistoricoEscolarDAO();
            $historicoEscolar = $historicoEscolarDAO->buscarHistoricoPorMatricula(7);
            //echo $historicoEscolar[0]->componenteCurricular->nome;
            //var_dump($historicoEscolar[0]).
            $componenteCurricular = new ComponenteCurricular( 'IMD1010' );
            echo $componenteCurricular->nome;
            echo $historicoEscolar[0]->componenteCurricular->nome;
            
            
            TTransaction::close();
        
        }catch( Exception $e ){
            new TMessage( 'error', $e->getMessage() );
        }
    }
}
