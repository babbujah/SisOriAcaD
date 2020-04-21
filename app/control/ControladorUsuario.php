<?php
abstract class ControladorUsuario{

    const QNT_CARACTERES_MATRICULA = 1;
    
    // inserir usuario na base de dados
    public static function inserirUsuario( $usuario, $vinculo ){
        $usuarioDAO = new UsuarioDAO;
        $usuarioDAO->inserirUsuario( $aluno, $vinculo );
    }
    
    // Busca usuario por nome
    public function buscarUsuario( $dadoUsuario, $toArray = false ){
        //verifica qual o dados do usuário que está sendo passado;
        $tamanhoString = strlen( $dadoUsuario );
        $primeiroCaracter = substr( $dadoUsuario, 0, 1 );
         
        if( $tamanhoString == self::QNT_CARACTERES_MATRICULA && is_numeric( $primeiroCaracter ) ){
            $usuario = self::buscarUsuarioPorMatricula( $dadoUsuario, $toArray );
            
        }else{
            $usuario = self::buscarUsuarioPorNome( $dadoUsuario, $toArray );
            
        }
        
        return $usuario;
    }
    
    // Busca usuario por nome
    public function buscarUsuarioPorNome( $nomeUsuario, $toArray = false ){
        //echo '<pre>'; print_r( $nomeAluno ); echo '</prep>';
        
        $usuarioDAO = new UsuarioDAO;
        
        $usuario = $usuarioDAO->buscarUsuarioPorNome( $nomeUsuario, $toArray );
        
        return $usuario;
    }
    
    // busca usuario por matrícula na base de dados
    public function buscarUsuarioPorMatricula( $matriculaUsuario, $toArray = false ){
    
        //echo '<pre>'; print_r( $nomeAluno ); echo '</prep>';
        
        $usuarioDAO = new UsuarioDAO;
        
        $usuario = $usuarioDAO->buscarUsuarioPorMatricula( $matriculaUsuario, $toArray );
        
        return $usuario;
    }  
}
