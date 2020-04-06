<?php
/**
 * MenuCategory Active Record
 * @author  Daniel Franklin
 */
class HtmlRendererConstructor extends THtmlRenderer
{    
    public function __construct( $path, $enableMain = true )
    {
        parent::__construct( $path );  
        
        if($enableMain)
            $this->enableSection('main');  
    }
    
    public function loadHtmlScreen( $idDom )
    {
        $content = $this->getContents();   
        TScript::create("
            $('#{$idDom}').html('{$content}');
        ");    
    }  
    
    public static function clearDom( $idDom )
    {
        TScript::create("
            $('#{$idDom}').html('');
        ");     
    } 
    
    private function minify($buffer)
    {
        $search = array(
            "\n",
            "\t",
            "\r",
            "\r\n",
            "\n\r",
        );
        $replace = array();
        
        $buffer = str_replace($search, $replace, trim($buffer));
        
        $search = array(
            '/(\s){2,}/',
            '/\>(\s)+/',
            '/(\s)+\</',
            '/\{(\s)+/',
            '/(\s)+\{/',
            '/\}(\s)+/',
            '/(\s)+\}/',
            '/\((\s)+/',
            '/(\s)+\(/',
            '/\)(\s)+/',
            '/(\s)+\)/',
            '/\=(\s)+/',
            '/(\s)+\=/',
            '/&&(\s)+/',
            '/(\s)+&&/',
            '/(\s)+!/',
            '/<!--[^\[](.*?)-->/',
            '/\/\*(.*?)\*\//',
        );
        
        $replace = array(
            ' ',
            '>',
            '<',
            '{',
            '{',
            '}',
            '}',
            '(',
            '(',
            ')',
            ')',
            '=',
            '=',
            '&&',
            '&&',
            '!',
        );
        $buffer = preg_replace($search, $replace, $buffer);
        
        return $buffer;
    }
 
        
}