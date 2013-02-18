<?php 

class kirbytextExtended extends kirbytext {
	
	function __construct($text, $markdown=true) {
	    parent::__construct($text, $markdown);
		
	    $this->addTags('pheader1');
	    $this->addTags('pheader2');
	    $this->addTags('pheader3');
	    $this->addTags('pheader4');
	}  

	function pheader1($params) {
    	$search = $params['pheader1'];

    	$defaults = array(
			'text'	=> $search
		);

    	$options = array_merge($defaults, $params);
		
		return '<div class="page-header"><h1>' . html($options['text']) . '</h1></div>';    
	}
	
	function pheader2($params) {
    	$search = $params['pheader2'];

    	$defaults = array(
			'text'	=> $search
		);

    	$options = array_merge($defaults, $params);
		
		return '<div class="page-header"><h2>' . html($options['text']) . '</h2></div>';    
	}
	
	function pheader3($params) {
    	$search = $params['pheader3'];

    	$defaults = array(
			'text'	=> $search
		);

    	$options = array_merge($defaults, $params);
		
		return '<div class="page-header"><h3>' . html($options['text']) . '</h3></div>';    
	}
	
	function pheader4($params) {
    	$search = $params['pheader4'];
		
    	
    	$defaults = array(
			'text'	=> $search
		);

    	$options = array_merge($defaults, $params);
		
		return '<div class="page-header"><h4>' . html($options['text']) . '</h4></div>';    
	}

}

?>