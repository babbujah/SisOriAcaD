<?php
class ProfessorDAO extends TRecord{

    // inserir professor na base de dados
    public function inserirProfessor( $professor ){
        try{
            TTransaction::open( 'minhabasedados' );
            //TTransaction::open( 'basedados' );
          
            $professor->store();
            
            new TMessage( 'info', 'Professor inserido com sucesso.' );
            
        }catch( Exception $e ){
            new TMessage( 'error', $e->getMessage() );
        }
    }
    
    // busca professor pelo nome de usuário na base de dados
    public function buscarProfessorPorLogin( $loginProfessor ){
        echo '<pre>'; print_r( $loginProfessor ); echo '</prep>';
        try{
            TTransaction::open( 'basedados' );
            TTransaction::dump();
            
            $alunos = Aluno::where( 'nome', '=', $loginProfessor )->load();
            echo '<pre>'; print_r( $professor ); echo '</prep>';
            
            TTransaction::close();
            
            return $professor[0];
            
        }catch( Exception $e ){
            new TMessage( 'error', $e->getMessage() );
        }
    }
        
    // busca professor pmatrícula na base de dados
    public function buscarProfessorPorMatricula( $professor ){
        try{
            TTransaction::open( 'basedados' );
            
            $professor = Professor::where( 'matricula', '=', $matricula );
            echo '<pre>'; print_r( $professor ); echo '</prep>';
            
            TTransaction::close();
            
            return $professor[0];
            
        }catch( Exception $e ){
            new TMessage( 'error', $e->getMessage() );
        }
    }
    
    // busca professor pelo nome parcial na base de dados
    public function buscarProfessorPorNome( $nomeProfessor ){
        echo '<pre>'; print_r( $nomeProfessor ); echo '</prep>';
        try{
            TTransaction::open( 'basedados' );
            TTransaction::dump();
            
            $alunos = Aluno::where( 'nome', ' LIKE ', $nomeProfessor )->load();
            echo '<pre>'; print_r( $professor ); echo '</prep>';
            
            TTransaction::close();
            
            return $professor[0];
            
        }catch( Exception $e ){
            new TMessage( 'error', $e->getMessage() );
        }
    }
}
