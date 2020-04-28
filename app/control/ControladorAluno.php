<?php
class ControladorAluno extends ControladorUsuario{
    
    // inserir aluno na base de dados
    public function inserirAluno( $aluno ){
        ControladorUsuario::inserirUsuario( $aluno, 'Aluno' );
    }
    
    public function comporHistoricoAluno( $aluno ){
        $controladorHistoricoEscolar = new ControladorHistoricoEscolar;
        // lista de objetos do tipo historicoEscolar
        $matriculaAluno = $aluno->matricula;
        $historicoEscolarAluno = [];
        $historicoEscolarAluno = $controladorHistoricoEscolar->buscarHistoricoAluno( $matriculaAluno, true );
        
        $aluno->historicoEscolarAluno = $historicoEscolarAluno;
    }
    
    public function comporPerfilAluno( $aluno ){
        
        //$aluno->setAnoIngresso();
        $perfilAluno = new PerfilAluno();
        $perfilAluno->setQntSemestres( self::calculaQntSemestres( $aluno ) );
        /*
        self::calculaQntDisciplinas( $aluno );
        serlf::calculaCargaHoraria( $aluno );
        self::calculaMedia( $aluno );
        self::calculaNotaMaxima( $aluno );
        self::calculaNotaMinima( $aluno );
        self::calculaDisciplinasAprovadas( $aluno );
        self::calculaDisciplinasReprovadas( $aluno );
        */
        
        return $perfilAluno;
    }
    
    private function calculaQntSemestres( $aluno ){
        $tempHistoricoAluno = $aluno->historicoEscolarAluno;
        $tempRegistro = [];
        
        foreach( $tempHistoricoAluno as $registro ){
            if( $registro['situacao'] == 'EM ANDAMENTO' ){
                $tempRegistro = $registro;
                break;
            }
        }
        
        $anoPeriodoAtual = new AnoSemestre();
        $anoPeriodoAtual->setAnoSemestre( $tempRegistro['ano'] );
        
        $anoPeriodoEntrada = new AnoSemestre();
        $anoPeriodoEntrada->setAno( $aluno->getAnoIngresso()->getAno() );
        $anoPeriodoEntrada->setSemestre( $aluno->getAnoIngresso()->getSemestre() );
        
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
    /*
    self::calculaQntDisciplinas( $aluno );
    serlf::calculaCargaHoraria( $aluno );
    self::calculaMedia( $aluno );
    self::calculaNotaMaxima( $aluno );
    self::calculaNotaMinima( $aluno );
    self::calculaDisciplinasAprovadas( $aluno );
    self::calculaDisciplinasReprovadas( $aluno );
    */
   
}
