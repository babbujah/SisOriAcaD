<?php
class ControladorAluno implements IGestorAluno{
    
    // inserir aluno na base de dados
    public function inserirAluno( $aluno ){}
    
    // Busca aluno por login
    public function buscarAlunoPorLogin( $loginAluno ){
        $alunoDAO = new AlunoDAO;
        
        $aluno = alunoDAO( $loginAluno );
        
        return $aluno;        
    }
    
    // busca aluno pmatrícula na base de dados
    public function buscarAlunoPorMatricula( $aluno ){}  
}
