<?php
class AlunoView extends TPage{

    private $html;
    
    public function __construct(){
        parent::__construct();
        
        try{
            $this->html = new THtmlRenderer( 'app/templates/identificador-aluno.html' );
            
            // recebe nome de usuario do aluno. Deverá ser capturado das informações de sessão do usuário
            $loginAluno = 'bruno';
            
            // busca um aluno por nome de usuário na base de dados
            $controladorAluno = new ControladorAluno;
            $aluno = $controladorAluno->buscarAlunoPorLogin( $loginAluno );
            
            // lista para substituição dos valores na tela
            $listaSubstituicao = [];
            $listaSubstituicao['matricula'] = $aluno->matricula;
            $listaSubstituicao['nome'] = $aluno->nome;
            $listaSubstituicao['login'] = $aluno->login;
            $listaSubstituicao['curso'] = $aluno->matricula;
            
            // habilita sessão html
            $this->html->enableSection( 'cardAluno', $listaSubstituicao );
            
            $vbox = new VBox;
            $vbox->style - 'width:100%';
            // adicionar opcao no menu para visualizar navegação do sistema
            //$vbox->add( new TXMLBreadCrumb( 'menu.xml', __CLASS__ ) );
            $vbox->add( $this->html );
            
            
         }catch( Exception $e ){
             new TMessage( 'error', $e->getMessage() );
         
         }
        
    }
}
