<?php
/**
 * CommonPage
 *
 * @version    1.0
 * @package    control
 * @author     Pablo Dall'Oglio
 * @copyright  Copyright (c) 2006 Adianti Solutions Ltd. (http://www.adianti.com.br)
 * @license    http://www.adianti.com.br/framework-license
 */
class CommonPage extends TPage
{
    public function __construct()
    {
        parent::__construct();
        
        $html = new HtmlRendererConstructor('app/resources/teste_bloco/principal.html');        
        
        parent::add($html);  
        
        self::renderBloco(['bloco'=>1]);      
    }
    
    public static function renderBloco( $param )
    {
        $bloco = $param['bloco'].'.html';
        
        $html_bloco = new HtmlRendererConstructor('app/resources/teste_bloco/bloco'.$bloco);
        $html_bloco->enableSection('main');
        $html_bloco->loadHtmlScreen('main-content');
    }
}
