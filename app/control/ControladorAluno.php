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
        self::calculaQntSemestres( $aluno );
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
    
    private function calculaQntSemestres( $aluno ){
        $tempHistoricoAluno = $aluno->historicoEscolarAluno;
        foreach(){
            $tempDisciplinaAndamento
        }
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
