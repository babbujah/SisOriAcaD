<?php
class ProfessorView extends TPage{

    private $html;
    
    public function __construct(){
        parent::__construct();
        
        try{
            $this->html = new THtmlRenderer( 'app/templates/identificador-professor.html' );
            
            // recebe nome de usuario do professor. Deverá ser capturado das informações de sessão do usuário
            $nomeProfessor = 'Jair Fonseca';
            
            // busca um professor por nome de usuário na base de dados
            $controladorProfessor = new ControladorProfessor;
            $professor = $controladorProfessor->buscarUsuarioPorNome( $nomeProfessor );
            
            // lista para substituição dos valores na tela
            $listaSubstituicao = [];
            $listaSubstituicao['matricula'] = $professor->matricula;
            $listaSubstituicao['nome'] = $professor->nome;            
            $listaSubstituicao['status'] = $professor->status;
            $listaSubstituicao['email'] = $professor->email;
            $listaSubstituicao['dataIngresso'] = $professor->dataIngresso;
            $listaSubstituicao['vinculo'] = $professor->vinculo;
            
            // habilita sessão html
            $this->html->enableSection( 'cardProfessor', $listaSubstituicao );
            
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
