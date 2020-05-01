<?php
class PerfilAluno {
    private $qntSemestres;
    private $qntDisciplinas;
    private $cargaHoraria;
    private $media;
    private $notaMaxima;
    private $notaMinima;
    private $disciplinasAprovadas;
    private $disciplinasReprovadas;
    
    public function __construct(){
        $qntSemestres = 0;
        $qntDisciplinas = 0;
        $cargaHoraria = 0;
        $media = 0;
        $notaMaxima = 0;
        $notaMinima = 0;
        $disciplinasAprovadas = 0;
        $disciplinasReprovadas = 0;
    }
    
    public static function calculaQntSemestres( AnoSemestre $anoPeriodoAtual, AnoSemestre $anoPeriodoEntrada ){                
        $qntSemestres = 0;
        if( ($anoPeriodoAtual->getAno() - $anoPeriodoEntrada->getAno()) == 0 ){
            if( $anoPeriodoAtual->getSemestre() == $anoPeriodoEntrada->getSemestre() ){
                $qntSemestres = 1;
                
            }else{
                $qntSemestres = 2;
                
            }
            
        }else{
            if( $anoPeriodoAtual->getAno() - $anoPeriodoEntrada->getAno() > 1 ){
                $qntSemestres = ($anoPeriodoAtual->getAno() - $anoPeriodoEntrada->getAno() - 1) * 2;
                
            }
            
            if( $anoPeriodoEntrada->getSemestre() == 1 ){
                $qntSemestres += 2;
                
            }else{
                $qntSemestres += 1;
                
            }
            
            $qntSemestres += $anoPeriodoAtual->getSemestre();
        }
        
        return $qntSemestres;        
    }
    
    public static function calculaQntDisciplinas( $historicoEscolarAluno ){
        $qntDisciplinas = 0;
        foreach( $historicoEscolarAluno as $registro ){
            if( $registro['situacao'] == 'APROVADO' ){
                $qntDisciplinas += 1;
                
            }
        }
        
        return $qntDisciplinas;
    }
    
    public static function calculaCargaHoraria( $historicoEscolarAluno ){
        $qntDisciplinas = 0;
        
        foreach( $historicoEscolarAluno as $registro ){
            $codigoComponente = $registro['cod_componente'];
            $componenteCurricular = new ComponenteCurricular( $codigoComponente );
            if( $registro['situacao'] == 'APROVADO' ){
                $qntDisciplinas += $componenteCurricular->carga_horaria;
                
            }
        }
        
        return $qntDisciplinas;
    }
    
    public static function calculaMedia( $historicoEscolarAluno ){
        $media = 0;
        $qntDisciplinasAprovadas = 0;
        foreach( $historicoEscolarAluno as $registro ){
            if( $registro['situacao'] == 'APROVADO' ){
                $media += $registro['nota'];
                $qntDisciplinasAprovadas += 1;
                
            }
        }
        
        if( $qntDisciplinasAprovadas != 0 ){
            $media /= $qntDisciplinasAprovadas;
            
        }
        
        return $media;
    }
    
    public static function buscarNotaMaxima( $historicoEscolarAluno ){
        $notaMaxima = 0;
        $notaAtual = 0;
        foreach( $historicoEscolarAluno as $registro ){
            $notaAtual = $registro['nota'];
            if( $notaAtual > $notaMaxima && $notaAtual != NULL ){
                $notaMaxima = $notaAtual;
                  
            }
        }
        
        return $notaMaxima;
    }
    
    public static function buscarNotaMinima( $historicoEscolarAluno ){
        $notaMinima = 10;
        $notaAtual = 10;
        foreach( $historicoEscolarAluno as $registro ){
            $notaAtual = $registro['nota'];
            if( $notaAtual < $notaMinima && $notaAtual != NULL ){
                $notaMinima = $notaAtual;
                  
            }
        }
        
        return $notaMinima;
    }
    
    public static function calcularQntDisciplinasAprovado( $historicoEscolarAluno ){
        $notaMinima = 10;
        $notaAtual = 10;
        //echo 'Entrei aqui';
        foreach( $historicoEscolarAluno as $registro ){
            $notaAtual = $registro['nota'];
            if( $notaAtual < $notaMinima && $notaAtual != NULL ){
                $notaMinima = $notaAtual;
                  
            }
        }
        
        return $notaMinima;
    }
    
    public static function calculaDisciplinasAprovadas( $historicoEscolarAluno ){
        $qntDisciplinasAprovadas = 0;
        foreach( $historicoEscolarAluno as $registro ){
            if( $registro['situacao'] == 'APROVADO' ){
                $qntDisciplinasAprovadas += 1;
                  
            }
        }
        
        return $qntDisciplinasAprovadas;
    }
    
    public static function calculaDisciplinasReprovadas( $historicoEscolarAluno ){
        $qntDisciplinasReprovadas = 0;
        foreach( $historicoEscolarAluno as $registro ){
            if( $registro['situacao'] == 'REPROVADO' ){
                $qntDisciplinasReprovadas += 1;
                  
            }
        }
        
        return $qntDisciplinasReprovadas;
    }
    
    public function copiarPerfilAluno( PerfilAluno $perfilAluno ){        
        $this->qntSemestres = $perfilAluno->getQntSemestres();
        $this->qntDisciplinas = $perfilAluno->getQntDisciplinas();
        $this->cargaHoraria = $perfilAluno->getCargaHoraria();
        $this->media = $perfilAluno->getMedia();
        $this->notaMaxima = $perfilAluno->getNotaMaxima();
        $this->notaMinima = $perfilAluno->getNotaMinima();
        $this->disciplinasAprovadas = $perfilAluno->getDisciplinasAprovadas();
        $this->disciplinasReprovadas = $perfilAluno->getDisciplinasReprovadas();
        
    }
    
    public function getQntSemestres(){
        return $this->qntSemestres;
        
    }
    
    public function setQntSemestres( $qntSemestres ){
        $this->qntSemestres = $qntSemestres;
        
    }
    
    public function getQntDisciplinas(){
        return $this->qntDisciplinas;
        
    }
    
    public function setQntDisciplinas( $qntDisciplinas ){
        $this->qntDisciplinas = $qntDisciplinas;
        
    }
    
    public function getCargaHoraria(){
        return $this->cargaHoraria;
    }
    
    public function setCargaHoraria( $cargaHoraria ){
        $this->cargaHoraria = $cargaHoraria;
        
    }
    
    public function getMedia(){
        return $this->media;
    }
    
    public function setMedia( $media ){
        $this->media = $media;
        
    }
    
    public function getNotaMaxima(){
        return $this->notaMaxima;
    }
    
    public function setNotaMaxima( $notaMaxima ){
        $this->notaMaxima = $notaMaxima;
        
    }
    
    public function getNotaMinima(){
        return $this->notaMinima;
        
    }
    
    public function setNotaMinima( $notaMinima ){
        $this->notaMinima = $notaMinima;
        
    }
    
    public function getDisciplinasAprovadas(){
        return $this->disciplinasAprovadas;
    
    }
    
    public function setDisciplinasAprovadas( $disciplinasAprovadas ){
        $this->disciplinasAprovadas = $disciplinasAprovadas;
        
    }
    
    public function getDisciplinasReprovadas(){
        return $this->disciplinasReprovadas;
    
    }
    
    public function setDisciplinasReprovadas( $disciplinasReprovadas ){
        $this->disciplinasReprovadas = $disciplinasReprovadas;
        
    }
    
    public function toArray(){        
        $data = array();
        
        foreach( $this as $key => $value ){
            $data[$key] = $value;
            
        }        
        
        return $data;
    }
}
