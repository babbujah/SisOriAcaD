<?php
class AnoSemestre {
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
    
    public function setAnoSemestre( $stringAnoPeriodo ){
        $tempData = explode( '.', $stringAnoPeriodo );        
        $tempAno = $tempData[0];
        $tempSemestre = $tempData[1];       
        
        $this->ano = intval( $tempAno );
        
        if( intval( $tempSemestre ) < 1 || intval( $tempSemestre ) > 2 ){
            throw new Exception('Período inválido.');
            
        }else{
            $this->semestre = intval( $tempSemestre );
            
        }
    }
    
    public function setAnoSemestreData( $stringData ){
    
        $tempData = explode( '/', $stringData );
        $tempMes = $tempData[1];
        $tempAno = $tempData[2];        
        
        $this->ano = intval( $tempAno );
        
        if( intval( $tempMes ) < 1 || intval( $tempMes ) > 12 ){
            throw new Exception('Mês fora do intervalo válido.');
            
        }elseif( intval( $tempMes ) <= 6 ){
            $this->semestre = 1;
            
        }else{
            $this->semestre = 2;
            
        }
    }
    
}
