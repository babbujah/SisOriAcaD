<?php
class Aluno extends Usuario{

    public $historicoEscolarAluno;
    public $perfilAluno;
    
    public function __construct(){
        parent::__construct();
        $this->historicoEscolarAluno = [];
        $this->perfilAluno = [];
    }
    
    public function getHistoricoEscolarAluno(){
        return $this->historicoEscolarAluno;
    }
    
    public function setHistoricoEscolarAluno( $historicoEscolarAluno ){
        $this->historicoEscolarAluno = $historicoEscolarAluno;
    }
}
