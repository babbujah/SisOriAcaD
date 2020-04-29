<?php
class AlunoView extends TPage{

    private $html;
    private $matriculaAluno;
    //private $pathHtml;
    
    public function __construct(){
        parent::__construct();
        //$this->pathHtml = "app/resources/identificador-aluno/";
        
        try{
           
            // habilita sessão html
            //$this->html->enableSection( 'viewAluno', $listaSubstituicao );
            $this->html = new HtmlRendererConstructor( 'app/resources/identificador-aluno/index.html' );
            $this->html->enableSection( 'viewAluno', [] );         
            
            $vbox = new TVBox;
            $vbox->style = 'width:100%';
            // adicionar opcao no menu para visualizar navegação do sistema
            $vbox->add( new TXMLBreadCrumb( 'menu.xml', __CLASS__ ) );
            $vbox->add( $this->html );
            
            parent::add($vbox);
            //parent::add($this->html);
            
            $this->matriculaAluno = 5;
            
            self::renderBloco( $this->matriculaAluno );
            
            /*
            $paramRenderizacao = [];
            $paramRenderizacao['bloco'] = 'dados-aluno';
            $paramRenderizacao['matriculaUsuario'] = 7; 
            
            //self::renderBloco(['bloco' => 'dados-aluno', 'listaSubstituicao' => $listaSubstituicao]);
            self::renderBloco($paramRenderizacao);
            self::renderBloco(['bloco' => 'perfil']);
            self::renderBloco(['bloco' => 'historico']);
            self::renderBloco(['bloco' => 'plano-curso']);
            self::renderBloco(['bloco' => 'disciplinas']);
            
            
            self::renderBloco(['bloco' => 'list']);
            */
            
         }catch( Exception $e ){
             new TMessage( 'error', $e->getMessage() );
         
         }
        
    }
    
    public static function renderBloco( $matriculaAluno ){
        
        $controladorAluno = new ControladorAluno();
        //$dadosAluno = [];
        //$dadosAluno = $controladorAluno->buscarUsuario( $matriculaAluno, true );
        $aluno = new Aluno();
        $aluno = $controladorAluno->buscarUsuario( $matriculaAluno ); // necessário downcast de usuário para aluno
        $aluno->setAnoIngresso();
        $controladorAluno->comporHistoricoAluno( $aluno );
        $controladorAluno->comporPerfilAluno( $aluno );
        //var_dump($aluno->getPerfilAluno());
        
        self::renderDadosAluno( $aluno );
        
        self::renderDisciplinas( $matriculaAluno );        
        
        self::renderPerfil( $aluno );        
        
        self::renderHistorico( $aluno );
        
        
        
        
        self::renderPlanoCurso( $matriculaAluno );
    }
    
    
    
    private static function renderDadosAluno( $aluno ){        
        $html = new HtmlRendererConstructor( 'app/resources/identificador-aluno/dados-aluno.html' );
        $html->enableSection( 'main', $aluno->toArray() );
        $html->loadHtmlScreen( 'bloco-dados-aluno' );
        
    }
    
    private static function renderDisciplinas( $param ){
        // Carrega as disciplinas integralizadas
    }
    
    private static function renderPerfil( $aluno ){
        $perfilAluno = new PerfilAluno();
        $perfilAluno->copiarPerfilAluno( $aluno->getPerfilAluno() );
        //var_dump( $perfilAluno->getQntSemestres() );
        //echo get_class($perfilAluno->toArray());
        //echo gettype( $perfilAluno->toArray() ) + '<br>';
        var_dump($perfilAluno->toArray());
        
        $html = new HtmlRendererConstructor( 'app/resources/identificador-aluno/perfil.html' );
        $html->enableSection( 'viewPerfil', $perfilAluno->toArray() );
        $html->loadHtmlScreen( 'bloco-perfil' );
        
    }
    
    private static function renderPlanoCurso( $param ){
        $html = new HtmlRendererConstructor( 'app/resources/identificador-aluno/plano-curso.html' );
        $html->enableSection( 'viewPlanoCurso', $param );
        $html->loadHtmlScreen( 'bloco-plano-curso' );
        
    }    
    
    private static function renderIndice( $indice ){        
       $html = new HtmlRendererConstructor('app/resources/identificador-aluno/indice.html');
       $html->enableSection('indice',[ 'key' => $indice ] );
       $html->loadHtmlScreen('bloco-indice');   
    }
    
    private static function renderHistorico( $aluno ){
       
       $historicoAluno = $aluno->historicoEscolarAluno;
       //var_dump( $historicoAluno );       
       $html = new HtmlRendererConstructor('app/resources/identificador-aluno/historico.html');
       //$html->enableSection('historico',[ 'key' => $indice ] );
       $html->enableSection('historico', $historicoAluno, true );
       
       $html->loadHtmlScreen('bloco-historico');   
    }
    
    /*
    public static function renderBloco( $param ){
        if( $param['bloco'] == 'list' ){
            self::renderList();
        
        }elseif( $param['bloco'] == 'indice' && !empty($param['key']) ){
            self::renderIndice( $param['key'] );
            
        }elseif( $param['bloco'] == 'historico' ){
            self::renderHistorico();
            
        }elseif( $param['bloco'] == 'dados-aluno' ){
            self::renderDadosAluno( $param );
            
        }elseif( $param['bloco'] == 'disciplinas' ){
            self::renderDisciplinas( $param );
            
        }elseif( $param['bloco'] == 'perfil' ){
            self::renderPerfil( $param );
            
        }elseif( $param['bloco'] == 'plano-curso' ){
            self::renderPlanoCurso( $param );
            
        }
    }
    */
    
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
        
        
        $html = new HtmlRendererConstructor('app/resources/identificador-aluno/list.html');        
        $html->enableSection('list',$indices,true);
        $html->loadHtmlScreen('bloco-indice');       
    }
    
    public function viewChart( $param ){
        parent::clearChildren();
        
        $indice = $param['indice'];
        
        
                
        $html = new HtmlRendererConstructor('app/resources/identificador-aluno/chart.html');
        //$html->enableSection('indice',$ind$usuario = $repository->loadToArray( $criteria );ice);        
                
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
