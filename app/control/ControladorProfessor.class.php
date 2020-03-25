<?php
class ControladorProfessor{
    
    // inserir professor na base de dados
    public function inserirProfessor( $professor ){
        $professorDAO = new ProfessorDAO;
        $professorDAO->inserirProfessor( $professor );
    }
    
    // Busca professor por login
    public function buscarProfessorPorLogin( $loginProfessor ){
        echo '<pre>'; print_r( $loginProfessor ); echo '</prep>';
        $professorDAO = new ProfessorDAO;
        
        $professor = $professorDAO->buscarProfessorPorLogin( $loginProfessor );
        
        return $professor;
    }
    
    // busca professor por matrícula na base de dados
    public function buscarProfessorPorMatricula( $professor ){
        echo '<pre>'; print_r( $matricula ); echo '</prep>';
        $professorDAO = new ProfessorDAO;
        
        $professor = $professorDAO->buscarProfessorPorMatricula( $matricula );
        
        return $professor;
    }  
    
    public function visualizarTurma
}
