<?php
class ControladorHistoricoEscolar{
    
    // retornar uma lista de objetos do tipo historicoEscolar baseado na matricula do aluno
    public function buscarHistoricoAluno( $matriculaAluno, $loadArray = false ){
        $historicoEscolarDAO = new HistoricoEscolarDAO;
        $historicoEscolarAluno = [];
        $historicoEscolarAluno = $historicoEscolarDAO->buscarHistoricoPorMatricula( $matriculaAluno, $loadArray );
        
        return $historicoEscolarAluno;                
    }    
    
}
