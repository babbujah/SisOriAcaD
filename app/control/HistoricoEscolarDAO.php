<?php
class HistoricoEscolarDAO extends TRecord{

    // busca usuário por matrícula na base de dados
    public function buscarHistoricoPorMatricula( $matriculaUsuario ){
        try{
            TTransaction::open( 'basedados' );
            
            $alunos = HistoricoEscolar::where( 'matricula_aluno', '=', $matriculaUsuario );
            echo '<pre>'; print_r( $alunos ); echo '</prep>';
            
            TTransaction::close();
            
            return $alunos;
            
        }catch( Exception $e ){
            new TMessage( 'error', $e->getMessage() );
            
        }
    }
}
