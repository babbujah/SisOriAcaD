<?php
class UsuarioDAO extends TRecord{

    // inserir um objeto do tipo Usuario na base de dados
    public function inserirUsuario( $usuario, $tipoUsuario ){
        try{
            TTransaction::open( 'basedados' );
          
            $usuario->store();
            
            new TMessage( 'info', $tipoUsuario.' inserido com sucesso.' );
            
        }catch( Exception $e ){
            new TMessage( 'error', $e->getMessage() );
            
        }
    }
    
    // busca usuário pelo nome de usuário na base de dados
    // obsoleta
    public function buscarUsuarioPorNome( $nomeUsuario ){
        //echo '<pre>'; print_r( $loginAluno ); echo '</pre>';
        try{
            TTransaction::open( 'basedados' );
            //TTransaction::dump();
            
            $usuarios = Aluno::where( 'nome', '=', $nomeUsuario )->load();
            //echo '<pre>'; print_r( $alunos ); echo '</pre>';
            
            TTransaction::close();
            
            return $usuarios[0];
            
            /*
            $descricao = 'Joystick XBox 360';
            $produtos = Produto::where( 'descricao', '=', $descricao )->load();
            echo '<pre>'; print_r( $produtos ); echo '</prep>';
            */
            
        }catch( Exception $e ){
            new TMessage( 'error', $e->getMessage() );
            
        }
    }
    
    // busca usuário por matrícula na base de dados
    public function buscarAlunoPorMatricula( $matriculaUsuario ){
        try{
            TTransaction::open( 'basedados' );
            
            $alunos = Aluno::where( 'matricula', '=', $matriculaUsuario );
            //echo '<pre>'; print_r( $alunos ); echo '</prep>';
            
            TTransaction::close();
            
            return $alunos[0];
            
        }catch( Exception $e ){
            new TMessage( 'error', $e->getMessage() );
            
        }
    }
}
