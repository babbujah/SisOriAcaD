<?php
class AlunoView extends TPage{

    private $html;
    private $matriculaAluno;
    
    public function __construct(){
        parent::__construct();
        
        try{
            $this->html = new THtmlRenderer( 'app/templates/identificador-aluno/index.html' );
            
            // recebe nome de usuario do aluno. Deverá ser capturado das informações de sessão do usuário
<<<<<<< HEAD
            $nomeAluno = 'Bruno César';            
=======
            $nomeAluno = 'Bruno César';
            //recebe a matricula do aluno
            $matriculaTeste = 20170001198;
>>>>>>> c64efcf73b91ae7f523599275cbbe2fe5c44f20c
            
            // busca um aluno por nome de usuário na base de dados
            $controladorAluno = new ControladorAluno;
            $aluno = $controladorAluno->buscarUsuarioPorNome( $nomeAluno );
            
            // lista para substituição dos valores na tela
            $listaSubstituicao = [];
            $listaSubstituicao['matricula'] = $aluno->matricula;
            $listaSubstituicao['nome'] = $aluno->nome;            
            $listaSubstituicao['status'] = $aluno->status;
            $listaSubstituicao['email'] = $aluno->email;
            $listaSubstituicao['dataIngresso'] = $aluno->dataIngresso;
            $listaSubstituicao['vinculo'] = $aluno->vinculo;
            /*
            $listaSubstituicao['matricula_aluno'] = $listaSubstituicao['matricula_aluno'];
            $listaSubstituicao['cod_componente'] = $listaSubstituicao['cod_componente'];
            $listaSubstituicao['nota'] = $listaSubstituicao['nota'];
            $listaSubstituicao['situacao'] = $listaSubstituicao['situacao'];
            $listaSubstituicao['ano'] = $listaSubstituicao['ano'];
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
            
            self::renderBloco(['bloco' => 'list']);
            //self::renderBloco(['bloco' => 'list']);
            
         }catch( Exception $e ){
             new TMessage( 'error', $e->getMessage() );
         
         }
        
    }
    
    public static function renderBloco( $param ){
        if( $param['bloco'] == 'list' )
            self::renderList();
        elseif( $param['bloco'] == 'indice' && !empty($param['key']) )
            self::renderIndice( $param['key'] );
    }
    
    private static function renderList(){
        /*
        TTransaction::open('minhabase');
        $objs = new TRepository('MeuRep');
        TTransaction:close();
        
        $indices = [];
        foreach($objs as $obj)
        {
            $new = $obj->toArray();
            $new['key'] = $obj->id;
            $indices[] = $new;
        }
        */
               
        $indice1 = ["key" => 'ira', "valor" => 70];
        $indice2 = ["key" => 'media', "valor" => 50];
        $indice3 = ["key" => 'desempenho', "valor" => 30];
        $indice4 = ["key" => 'producao', "valor" => 80];
        
        $indices = [$indice1, $indice2, $indice3, $indice4];
        
        
        $html = new HtmlRendererConstructor('app/templates/identificador-aluno/list.html');
        $html->enableSection('list',$indices,true);
        $html->loadHtmlScreen('bloco-indice');       
    }
    
    private static function renderIndice( $indice ){        
       $html = new HtmlRendererConstructor('app/templates/identificador-aluno/indice.html');
       $html->enableSection('indice',[ 'key' => $indice ] );
       $html->loadHtmlScreen('bloco-indice');   
    }
    
    private static function renderHistorico( $indice ){
        //recebe a matricula do aluno
       $matriculaAluno = '5';
       
       //busca por um historico na base de dados
        $controladorHistorico = new ControladorHistoricoEscolar;
        
        $historicoAluno = $controladorHistorico->buscarHistoricoAluno( $matriculaTeste );
        $aluno->setHistoricoEscolarAluno( $historicoAluno );
        
        $historicoTeste = $aluno->getHistoricoEscolarAluno(); 
        /*
        foreach( $historicoTeste as $disciplina ){
            echo 'Disciplina: ' . $disciplina->cod_componente.' | ';
            echo 'Nota: ' . $disciplina->nota.' | ';
            echo 'Situação: ' . $disciplina->situacao.' | ';
            echo 'Ano: ' . $disciplina->ano.'<br>';
            
        }
        */
    
       $html = new HtmlRendererConstructor('app/templates/identificador-aluno/historico.html');
       $html->enableSection('indice',[ 'key' => $indice ] );
       $html->loadHtmlScreen('bloco-indice');   
    }
    
    public function viewChart( $param ){
        parent::clearChildren();
        
        $indice = $param['indice'];
        
        
                
        $html = new HtmlRendererConstructor('app/templates/identificador-aluno/chart.html');
        //$html->enableSection('indice',$indice);        
                
        $data = array();
        $data[] = [ 'Day', 'Value 1', 'Value 2'];
        $data[] = [ 'Day 1',   100,       120      ];
        $data[] = [ 'Day 2',   120,       140      ];
        $data[] = [ 'Day 3',   140,       160      ];
        
        
        // replace the main section variables
        $html->enableSection("main", array('data'   => json_encode($data),
                                           'key' => $indice,
                                           'tipo' => 'Indice de notas', 
                                           'width'  => "100%",
                                           'height'  => "300px",
                                           'title'  => "Accesses by day",
                                           'ytitle' => "Accesses", 
                                           'xtitle' => "Day",
                                           'uniqid' => uniqid()));
        
        parent::add($html);        
    }
}
