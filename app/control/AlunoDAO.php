<?php
class AlunoDAO extends TRecord{

    // inserir aluno na base de dados
    public function inserirAluno( $aluno ){
        try{
            TTransaction::open( 'basedados' );
          
            $aluno->store();
            
            new TMessage( 'info', 'Aluno inserido com sucesso.' );
            
        }catch( Exception $e ){
            new TMessage( 'error', $e->getMessage() );
        }
    }
    
    // busca aluno pelo nome de usuário na base de dados
    public function buscarAlunoPorNome( $nomeAluno ){
        //echo '<pre>'; print_r( $loginAluno ); echo '</pre>';
        try{
            TTransaction::open( 'basedados' );
            //TTransaction::dump();
            
            $alunos = Aluno::where( 'nome', '=', $nomeAluno )->load();
            //echo '<pre>'; print_r( $alunos ); echo '</pre>';
            
            TTransaction::close();
            
            return $alunos[0];
            
            /*
            $descricao = 'Joystick XBox 360';
            $produtos = Produto::where( 'descricao', '=', $descricao )->load();
            echo '<pre>'; print_r( $produtos ); echo '</prep>';
            */
            
        }catch( Exception $e ){
            new TMessage( 'error', $e->getMessage() );
        }
    }
    
    // busca aluno pmatrícula na base de dados
    public function buscarAlunoPorMatricula( $matriculaAluno ){
        try{
            TTransaction::open( 'basedados' );
            
            $alunos = Aluno::where( 'matricula', '=', $matriculaAluno );
            //echo '<pre>'; print_r( $alunos ); echo '</prep>';
            
            TTransaction::close();
            
            return $alunos[0];
            
        }catch( Exception $e ){
            new TMessage( 'error', $e->getMessage() );
        }
    }
}
