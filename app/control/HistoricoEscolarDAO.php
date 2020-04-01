<?php
class HistoricoEscolarDAO extends TRecord{

    // busca usuário por matrícula na base de dados
    public function buscarHistoricoPorMatricula( $matriculaUsuario ){
        try{
            TTransaction::open( 'basedados' );
            
            $alunos = HistoricoEscolar::where( 'matricula', '=', $matriculaUsuario );
            //echo '<pre>'; print_r( $alunos ); echo '</prep>';
            
            TTransaction::close();
            
            return $alunos[0];
            
        }catch( Exception $e ){
            new TMessage( 'error', $e->getMessage() );
            
        }
    }
}
