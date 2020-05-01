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
        $perfilAluno->setQntDisciplinas( self::calculaQntDisciplinas( $aluno ) );
        $perfilAluno->setCargaHoraria( self::calculaCargaHoraria( $aluno ) );
        $perfilAluno->setMedia( self::calculaMedia( $aluno ) );
        $perfilAluno->setNotaMaxima( self::buscarNotaMaxima( $aluno ) );
        $perfilAluno->setNotaMinima( self::buscarNotaMinima( $aluno ) );
        $perfilAluno->setDisciplinasAprovadas( self::calculaDisciplinasAprovadas( $aluno ) );
        $perfilAluno->setDisciplinasReprovadas( self::calculaDisciplinasReprovadas( $aluno ) );
                
        $aluno->setPerfilAluno( $perfilAluno );
        
        //return $perfilAluno;
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
        
        $qntSemestres = PerfilAluno::calculaQntSemestres( $anoPeriodoAtual, $anoPeriodoEntrada );        
        
        return $qntSemestres;        
    }
    
    private function calculaQntDisciplinas( $aluno ){
        $tempHistoricoAluno = $aluno->historicoEscolarAluno;
                
        $qntDisciplinas = PerfilAluno::calculaQntDisciplinas( $tempHistoricoAluno );
        
        return $qntDisciplinas;
    }
    
    private function calculaCargaHoraria( $aluno ){
        $tempHistoricoAluno = $aluno->historicoEscolarAluno;
        // Chamada para função estática calculaCargaHoraria de PerfilAluno
        $qntCargaHoraria = PerfilAluno::calculaCargaHoraria( $tempHistoricoAluno );
        
        return $qntCargaHoraria;
    }
    
    private function calculaMedia( $aluno ){
        $tempHistoricoAluno = $aluno->historicoEscolarAluno;
                
        // Chamada para função estática calculaMedia de PerfilAluno
        $media = PerfilAluno::calculaMedia( $tempHistoricoAluno );
        
        return $media;
    }
    
    private function buscarNotaMaxima( $aluno ){
        $tempHistoricoAluno = $aluno->historicoEscolarAluno;
                
        // Chamada para função estática calculaNotaMaxima de PerfilAluno
        $notaMaxima = PerfilAluno::buscarNotaMaxima( $tempHistoricoAluno );
        
        return $notaMaxima;
    }
    
    private function buscarNotaMinima( $aluno ){
        $tempHistoricoAluno = $aluno->historicoEscolarAluno;
                
        // Chamada para função estática calculaNotaMinima de PerfilAluno
        $notaMinima = PerfilAluno::buscarNotaMinima( $tempHistoricoAluno );
        
        return $notaMinima;
    }
    
    private function calculaDisciplinasAprovadas( $aluno ){
        $tempHistoricoAluno = $aluno->historicoEscolarAluno;
                
        // Chamada para função estática calculaDisciplinasAprovadas de PerfilAluno
        $qntDisciplinasAprovadas = PerfilAluno::calculaDisciplinasAprovadas( $tempHistoricoAluno );
        
        return $qntDisciplinasAprovadas;
    }
    
    private function calculaDisciplinasReprovadas( $aluno ){
        $tempHistoricoAluno = $aluno->historicoEscolarAluno;
                
        // Chamada para função estática calculaDisciplinasReprovadas de PerfilAluno
        $qntDisciplinasReprovadas = PerfilAluno::calculaDisciplinasReprovadas( $tempHistoricoAluno );
        
        return $qntDisciplinasReprovadas;
    }
}
