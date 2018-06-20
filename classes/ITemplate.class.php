<?php
interface IPage {
    public function setTitle($title);
    public function setKeyword($keyword);
    public function setDescription($description);
}

class ITemplate implements IPage {
    private $title, $keyword, $description, $template, $data, $css = array();
    
    public function setTitle($title){
        if (empty($title))
        trigger_error('A pagina esta sem titulo',E_USER_NOTICE);
        
        $this->title = $title;
        return $this;
    }
    
    public function setKeyword($keyword){
        $this->keyword = $keyword;
        return $this;
    }
    
    public function setDescription($description){
        $this->description = $description;
    }
    
    public function display($template){
        if (empty($template))
        trigger_error('Nenhum template foi informado',E_USER_ERROR);
        
        if (!file_exists($template))
        trigger_error('O template informado nao foi encontrado.',E_USER_ERROR);
        
        $this->template = $template;
        
        echo $this->render();
    }
    
    public function assign($name,$value){
        $this->data[$name] = $value;
    }
    
    public function addCSS($file){
        $this->css[] = $file;
    }
    
    public function render(){
        ob_start();
        $css  = $this->css;
        $data = $this->data;
        include $this->template;
        return ob_get_clean();
    }
}
?>