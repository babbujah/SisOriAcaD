<?php
class ControladorHistorico{
    
    // busca historico por matrícula na base de dados
    public function buscarHistoricoPorMatricula( $matriculaUsuario ){
    
        $listaCaracterMatriculaTemp = str_split( $matriculaUsuario );
        $primeiroCaracter = chr( $listaCaracterMatriculaTemp[0] );
        echo $primeiroCaracter;
        
        $historicoDAO = new HistoricoEscolarDAO;
        
        $historico = $historicoDAO->buscarHistoricoPorMatricula( $matriculaUsuario );
        
        return $historico;
    }  
}
