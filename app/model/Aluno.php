<?php
class Aluno extends Usuario{

    public $historicoEscolarAluno;
    public $perfilAluno;
    public $anoIngresso;
    
    public function __construct(){
        parent::__construct();
        $this->historicoEscolarAluno = [];
        $this->perfilAluno = new PerfilAluno();
        $this->anoIngresso = new AnoSemestre();
         
    }
    
    public function getAnoIngresso(){
        return $this->anoIngresso;
        
    }
    
    public function setAnoIngresso(){
        $this->anoIngresso->setAnoSemestreData( $this->dataIngresso );
        
    }
    
    public function getPerfilAluno(){
        return $this->perfilAluno;
        
    }
    
    public function setPerfilAluno( $perfilAluno ){
        $this->perfilAluno->setQntSemestres( $perfilAluno->getQntSemestres() );
        $this->perfilAluno->setQntDisciplinas( $perfilAluno->getQntDisciplinas() );
        $this->perfilAluno->setCargaHoraria( $perfilAluno->getCargaHoraria() );
        $this->perfilAluno->setMedia( $perfilAluno->getMedia() );
        $this->perfilAluno->setNotaMaxima( $perfilAluno->getNotaMaxima() );
        $this->perfilAluno->setNotaMinima( $perfilAluno->getNotaMinima() );
        $this->perfilAluno->setDisciplinasAprovadas( $perfilAluno->getDisciplinasAprovadas() );
        $this->perfilAluno->setDisciplinasReprovadas( $perfilAluno->getDisciplinasReprovadas() );
        
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
