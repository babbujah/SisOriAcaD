<?php
class ControladorAluno implements IGestorAluno{
    
    // inserir aluno na base de dados
    public function inserirAluno( $aluno ){
        $alunoDAO = new AlunoDAO;
        $alunoDAO->inserirAluno( $aluno );
    }
    
    // Busca aluno por login
    public function buscarAlunoPorLogin( $loginAluno ){
        echo '<pre>'; print_r( $loginAluno ); echo '</prep>';
        $alunoDAO = new AlunoDAO;
        
        $aluno = $alunoDAO->buscarAlunoPorLogin( $loginAluno );
        
        return $aluno;
    }
    
    // busca aluno pmatrícula na base de dados
    public function buscarAlunoPorMatricula( $aluno ){}  
}
