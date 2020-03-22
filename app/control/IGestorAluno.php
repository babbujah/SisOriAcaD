<?php
interface IGestorAluno{
    // inserir aluno na base de dados
    public function inserirAluno( $aluno );
    // busca aluno pelo nome de usuário na base de dados
    public function buscarAlunoPorLogin( $aluno );
    // busca aluno pmatrícula na base de dados
    public function buscarAlunoPorMatricula( $aluno );   
    
}
