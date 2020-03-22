<?php
class AlunoDAO extends TRecord{

    // inserir aluno na base de dados
    public function inserirAluno( $aluno ){
        try{
            TTransaction::open( 'baseteste' );
          
            $aluno->store();
            
            new TMessage( 'info', 'Aluno inserido com sucesso.' );
            
        }catch( Exception $e ){
            new TMessage( 'error', $e->getMessage() );
        }
    }
    
    // busca aluno pelo nome de usuário na base de dados
    public function buscarAlunoPorLogin( $loginAluno ){
        try{
            TTransaction::open( 'baseteste' );
            
            $alunos = Aluno::where( 'login', '=', $loginAluno );
            echo '<pre>'; print_r( $alunos ); echo '</prep>';
            
            TTransaction::close();
            
            return $alunos[0];
            
        }catch( Exception $e ){
            new TMessage( 'error', $e->getMessage() );
        }
    }
    
    // busca aluno pmatrícula na base de dados
    public function buscarAlunoPorMatricula( $aluno ){
        try{
            TTransaction::open( 'baseteste' );
            
            $alunos = Aluno::where( 'matricula', '=', $matricula );
            echo '<pre>'; print_r( $alunos ); echo '</prep>';
            
            TTransaction::close();
            
            return $alunos[0];
            
        }catch( Exception $e ){
            new TMessage( 'error', $e->getMessage() );
        }
    }
}
