<?php
class ControladorHistoricoEscolar{
    
    // retornar uma lista de objetos do tipo historicoEscolar baseado na matricula do aluno
    public function buscarHistoricoAluno( $matriculaAluno ){
        $historicoEscolarDAO = new HistoricoEscolarDAO;
        $historicoEscolarAluno = [];
        $historicoEscolarAluno = $historicoEscolarDAO->buscarHistoricoPorMatricula( $matriculaAluno );
        
        return $historicoEscolarAluno;
    }
}
