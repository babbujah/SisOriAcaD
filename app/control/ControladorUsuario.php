<?php
abstract class ControladorUsuario{
    
    // inserir usuario na base de dados
    public static function inserirUsuario( $usuario, $vinculo ){
        $usuarioDAO = new UsuarioDAO;
        $usuarioDAO->inserirUsuario( $aluno, $vinculo );
    }
    
    // Busca usuario por nome
    public function buscarUsuarioPorNome( $nomeUsuario ){
        //echo '<pre>'; print_r( $nomeAluno ); echo '</prep>';
        
        $usuarioDAO = new UsuarioDAO;
        
        $usuario = $usuarioDAO->buscarUsuarioPorNome( $nomeUsuario );
        
        return $usuario;
    }
    
    // busca usuario por matrícula na base de dados
    public function buscarUsuarioPorMatricula( $matriculaUsuario ){
    
        $listaCaracterMatriculaTemp = str_split( $matriculaUsuario );
        $primeiroCaracter = chr( $listaCaracterMatriculaTemp[0] );
        echo $primeiroCaracter;
        
        $usuarioDAO = new UsuarioDAO;
        
        $usuario = $usuarioDAO->buscarUsurioPorMatricula( $matriculaUsuario );
        
        return $usuario;
    }  
}
