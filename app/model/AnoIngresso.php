<?php
class AnoIngresso {
    private $ano;
    private $semestre;
    
    public function __construct(){
        $this->ano = 1900;
        $this->semestre = 1;
    }
    
    public function getAno(){
        return $this->ano;
        
    }
    
    public function setAno( $ano ){
        $this->ano = $ano;
        
    }
    
    public function getSemestre(){
        return $this->semestre;
        
    }
    
    public function setSemestre( $semestre ){
        $this->semestre = $semestre;
        
    }
    
}
