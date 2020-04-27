<?php
class Aluno extends Usuario{

    public $historicoEscolarAluno;
    public $perfilAluno;
    public $anoIngresso;
    
    public function __construct(){
        parent::__construct();
        $this->historicoEscolarAluno = [];
        $this->perfilAluno = [];
        $this->anoIngresso = new AnoIngresso();
         
    }
    
    public function getAnoIngresso(){
        return $this->anoIngresso;
    }
    
    public function setAnoIngresso(){
    
        $tempData = explode( '/', $this->dataIngresso );
        $tempMes = $tempData[1];
        $tempAno = $tempData[2];        
        
        $this->anoIngresso->setAno( intval( $tempAno ) );
        
        if( intval( $tempMes ) < 1 || intval( $tempMes ) > 12 ){
            throw new Exception('Mês fora do intervalo válido.');
            
        }elseif( intval( $tempMes ) <= 6 ){
            $this->anoIngresso->setSemestre( 1 );
            
        }else{
            $this->anoIngresso->setSemestre( 2 );
        }
    }
    /*
    public function getHistoricoEscolarAluno(){
        return $this->historicoEscolarAluno;
    }
    
    public function setHistoricoEscolarAluno( $historicoEscolarAluno ){
        $this->historicoEscolarAluno = $historicoEscolarAluno;
    }
    */
}
