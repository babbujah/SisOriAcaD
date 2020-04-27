<?php
class UsuarioDAO extends TRecord{

    // inserir um objeto do tipo Usuario na base de dados
    public function inserirUsuario( $usuario, $tipoUsuario ){
        try{
            TTransaction::open( 'minhabasedados' );
            //TTransaction::open( 'basedados' );
          
            $usuario->store();
            
            new TMessage( 'info', $tipoUsuario.' inserido com sucesso.' );
            
            TTransaction::close();
            
        }catch( Exception $e ){
            new TMessage( 'error', $e->getMessage() );
            
        }
    }
    
    // busca usuário por matrícula na base de dados
    public function buscarUsuarioPorMatricula( $matriculaUsuario, $toArray = false ){
                
        try{
            TTransaction::open( 'minhabasedados' );
            //TTransaction::open( 'basedados' );
            
            if( $toArray ){
                $repository = new RepositoryConstructor( 'Usuario' );
                $usuario = $repository->where('matricula','=',$matriculaUsuario)->firstToArray(); 
                              
            }else {
                $modeloUsuario = Usuario::where('matricula','=',$matriculaUsuario)->first();
                $usuario = self::construirObjeto( $modeloUsuario );                
                
            }
                
            return $usuario;
            
            TTransaction::close();
            
        }catch( Exception $e ){
            new TMessage( 'erro', $e->getMessage() );
            
        }
    }
    
    // busca usuário pelo nome de usuário na base de dados
    // obsoleta
    public function buscarUsuarioPorNome( $nomeUsuario, $toArray = false ){
        //echo '<pre>'; print_r( $loginAluno ); echo '</pre>';
        try{
            TTransaction::open( 'minhabasedados' );
            //TTransaction::open( 'basedados' );
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
    
    private function construirObjeto( Usuario $usuario ){
        if( $usuario->vinculo == 'A' ){
            //echo 'Entrei no aluno';
            $modeloUsuario = new Aluno();            
                        
        }elseif( $usuario->vinculo == 'P' ){
            //echo 'Entrei no professor';
            $modeloUsuario = new Professor();
            
        }else{
            //echo 'Entrei no usuário';
            $modeloUsuario = new Usuario();
            
        }
        
        $modeloUsuario->matricula = $usuario->matricula;
        $modeloUsuario->nome = $usuario->nome;
        $modeloUsuario->status = $usuario->status;                
        $modeloUsuario->email =$usuario->email;
        $modeloUsuario->dataIngresso = $usuario->dataIngresso;
        $modeloUsuario->vinculo = $usuario->vinculo;
               
        //echo get_class( $modeloUsuario );
        
        return $modeloUsuario;
    }
}
