<?php
class HistoricoEscolarDAO extends TRecord{
    
    /*
    // busca usuário por matrícula na base de dados
    public function buscarHistoricoPorMatricula( $matriculaUsuario ){
        try{
            TTransaction::open( 'basedados' );
            
            echo '<pre>'; print_r( $matriculaUsuario ); echo '</prep>';
            $alunos = HistoricoEscolar::where( 'matricula_aluno', '=', $matriculaUsuario );
            
            
            TTransaction::close();
            
            return $alunos[0];
            
        }catch( Exception $e ){
            new TMessage( 'error', $e->getMessage() );
            
        }
    }
    */
    
    public function buscarHistoricoPorMatricula( $matriculaAluno ){
        try{
            TTransaction::open( 'basedados' );
            
            $criteria = new TCriteria;
            $criteria->add( new TFilter( 'matricula_aluno', '=', $matriculaAluno ) );
            
            $repository = new TRepository( 'HistoricoEscolar' );
            
            $historicoEscolarAluno = $repository->load( $criteria );
            
            return $historicoEscolarAluno;
            
            TTransaction::close();
            
        }catch( Exception $e ){
            new TMessage( 'erro', $e->getMessage() );
            
        }
    }
}
