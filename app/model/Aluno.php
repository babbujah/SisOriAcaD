<?php
class Aluno extends Usuario{

    private $historicoEscolarAluno;
    
    public function __construct(){
        parent::__construct();
        $this->historicoEscolarAluno = [];
    }
    
    public function getHistoricoEscolarAluno(){
        return $this->historicoEscolarAluno;
    }
    
    public function setHistoricoEscolarAluno( $historicoEscolarAluno ){
        $this->historicoEscolarAluno = $historicoEscolarAluno;
    }
}
