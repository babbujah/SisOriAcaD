<?php
class AlunoView extends TPage{

    private $html;
    
    public function __construct(){
        parent::__construct();
        
        try{
            $this->html = new THtmlRenderer( 'app/templates/identificador-aluno.html' );
            
            // recebe nome de usuario do aluno. Deverá ser capturado das informações de sessão do usuário
            $nomeAluno = 'Bruno César';
            //recebe a matricula do aluno
            $matriculaTeste = 20170001198;
            
            // busca um aluno por nome de usuário na base de dados
            $controladorAluno = new ControladorAluno;
            $aluno = $controladorAluno->buscarUsuarioPorNome( $nomeAluno );
            
            //busca por um historico na base de dados
            $controladorHistorico = new ControladorHistoricoEscolar;
            
            $historicoAluno = $controladorHistorico->buscarHistoricoAluno( $matriculaTeste );
            $aluno->setHistoricoEscolarAluno( $historicoAluno );
            
            $historicoTeste = $aluno->getHistoricoEscolarAluno(); 
            foreach( $historicoTeste as $disciplina ){
                echo 'Disciplina: ' . $disciplina->cod_componente.' | ';
                echo 'Nota: ' . $disciplina->nota.' | ';
                echo 'Situação: ' . $disciplina->situacao.' | ';
                echo 'Ano: ' . $disciplina->ano.'<br>';
                
            }
            
            
            // lista para substituição dos valores na tela
            $listaSubstituicao = [];
            $listaSubstituicao['matricula'] = $aluno->matricula;
            $listaSubstituicao['nome'] = $aluno->nome;            
            $listaSubstituicao['status'] = $aluno->status;
            $listaSubstituicao['email'] = $aluno->email;
            $listaSubstituicao['dataIngresso'] = $aluno->dataIngresso;
            $listaSubstituicao['vinculo'] = $aluno->vinculo;
            /*
            $listaSubstituicao['matricula_aluno'] = $historico->matricula_aluno;
            $listaSubstituicao['cod_componente'] = $historico->cod_componente;
            $listaSubstituicao['nota'] = $historico->nota;
            $listaSubstituicao['situacao'] = $historico->situacao;
            $listaSubstituicao['ano'] = $historico->ano;
            */
            // habilita sessão html
            $this->html->enableSection( 'cardAluno', $listaSubstituicao );
            
            $vbox = new TVBox;
            $vbox->style = 'width:100%';
            // adicionar opcao no menu para visualizar navegação do sistema
            $vbox->add( new TXMLBreadCrumb( 'menu.xml', __CLASS__ ) );
            $vbox->add( $this->html );
            
            parent::add($vbox);
            //parent::add($this->html);
            
         }catch( Exception $e ){
             new TMessage( 'error', $e->getMessage() );
         
         }
        
    }
}
