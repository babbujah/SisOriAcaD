<?php
class ControladorAluno extends ControladorUsuario{
    
    // inserir aluno na base de dados
    public function inserirAluno( $aluno ){
        ControladorUsuario::inserirUsuario( $aluno, 'Aluno' );
    }
    
    public function comporHistoricoAluno( $matriculaAluno ){
        $controladorHistoricoEscolar = new ControladorHistoricoEscolar;
        // lista de objetos do tipo historicoEscolar
        $historicoEscolarAluno = [];
        $historicoEscolarAluno = $controladorHistoricoEscolar->buscarHistoricoAluno( $matriculaAluno ); 
    }
    
    /*
    // Busca aluno por nome
    public function buscarUsuarioPorNome( $nomeAluno ){
        //echo '<pre>'; print_r( $nomeAluno ); echo '</prep>';
        
        $usuarioDAO = new UsuarioDAO;
        
        $aluno = $usuarioDAO->buscarUsuarioPorNome( $nomeAluno );
        
        return $aluno;
    }
    
    // busca aluno por matrícula na base de dados
    public function buscarUsuarioPorMatricula( $matriculaAluno ){
    
        $listaCaracterMatriculaTemp = str_split( $matriculaAluno );
        $primeiroCaracter = chr( $listaCaracterMatriculaTemp[0] );
        echo $primeiroCaracter;
        
        $usuarioDAO = new UsuarioDAO;
        
        $aluno = $usuarioDAO->buscarUsurioPorMatricula( $matriculaAluno );
        
        return $aluno;
    }
    */  
}
