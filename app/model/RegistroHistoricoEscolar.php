<?php
class RegistroHistoricoEscolar{
    
    private $matriculaAluno;
    private $codigoComponente;
    private $nota;
    private $situacao;
    private $ano;
    
    public function __construct(){
        //$this->matriculaAluno;
        //$this->codigoComponente;
        $this->nota = 0.0;
        $this->situacao = 'em andamento';
        $this->ano = 1900;
    }
    
    public function getMatriculaAluno(){
        return $this->matriculaAluno;
        
    }
    
    public function setMatriculaAluno( $matriculaAluno ){
        $this->matriculaAluno = $matriculaAluno;
        
    }
    
    public function getCodigoComponente(){
        return $this->codigoComponente;
        
    }
    
    public function setCodigoComponente( $codigoComponente ){
        $this->codigoComponente = $codigoComponente;
        
    }
    
    public function getNota(){
        return $this->nota;
        
    }    
    
    public function setNota( $nota ){
        $this->nota = $nota;
        
    }
    
    public function getSituacao(){
        return $this->situacao;
        
    }
    
    public function setSituacao( $situacao ){
        $this->situacao = $situacao;
    }
    
    public function getAno(){
        return $this->ano;
    }  
    
    public function setAno( $ano ){
        $this->ano = $ano;
        
    }
}
