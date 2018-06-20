<?php
class idiomas{
	private $idiomaPadrao = '';
	private $idiomas = array();
	private $url = array();
	
	public function setIdiomas($idiomas, $url){
		$this->idiomas = $idiomas;
		$this->url = $url;
	}
	
	public function setIdiomaPadrao($idiomaPadrao){
		$this->idiomaPadrao = $idiomaPadrao;
		if(in_array($this->idiomaPadrao,$this->idiomas)){
			if(empty($_SESSION['idioma'])){
				$_SESSION['idioma'] = $this->idiomaPadrao;
			}
		
		}else{
			$_SESSION['idioma'] = $this->idiomaPadrao;
		}
	}
	
	public function getPosicaoUrl(){
		$this->posicao = 0;
		$i=0;
		foreach($this->url as $linha){
			if(in_array($linha,$this->idiomas)){
				$_SESSION['idioma'] = $linha;
				$this->reloaderPage();
				die();
			}
			$i++;
		}
	}
	

	public function reloaderPage(){
		$fullUrl = $_SERVER['SERVER_NAME'].$_SERVER ['REQUEST_URI'];
		$explode_url = explode($_SESSION['idioma']."/",$fullUrl);
		header("Location: http://".$explode_url[0]);
	}
}
?>