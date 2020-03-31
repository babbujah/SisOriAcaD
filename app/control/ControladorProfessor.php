<?php
class ControladorProfessor extends ControladorUsuario{
    
    // inserir professor na base de dados
    public function inserirProfessor( $professor ){
        ControladorUsuario::inserirUsuario( $professor, 'Professor' );
    }
    
}
