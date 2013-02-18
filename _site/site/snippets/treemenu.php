<?php
	
	if(!isset($subpages)) {
		$subpages = $site->pages();
	}
	
	$page_url = '';
	
?>

<ul class="nav nav-list">

<?php
	
	$icon_template = " <i class=\"icon-chevron-right\"></i>";
	
	foreach($subpages->visible() AS $p) {
		
		$li_template = "<li class=\"nav-header %ACTIVE%\"><a href=\"%HREF%\">%TITLE% %ICON%</a></li>";
					
		if($p->isActive()) {
			$li_template = str_replace("%ACTIVE%", "active", $li_template);
		} else {
			$li_template = str_replace("%ACTIVE%", "", $li_template);
		}
		
		$li_template = str_replace("%TITLE%", $p->title(), $li_template);
		$li_template = str_replace("%HREF%", $p->url(), $li_template);

		$request_URI = $_SERVER['REQUEST_URI'];
	
		// subpage?		
		if (strlen($request_URI) > 1) {
			$url = explode('/', substr($request_URI, 1));
				
			for ($i = 0; $i < count($url); $i++) {
				$url_array[] = implode("/", array_slice($url, 0, $i+1));
			
				$page_url = parse_url($p->url());
				$page_url = $page_url['path'];
				$page_url = substr($page_url, 1);
			}
		
		}
	
		if($p->depth() > 1 AND $p->hasChildren()) {
			$li_template = str_replace("%ICON%", $icon_template, $li_template);
		} else {
			$li_template = str_replace("%ICON%", "", $li_template);
		}
		
		
		if ($p->depth() > 1) {
			$li_template = str_replace("nav-header", "", $li_template);
		} 
		
		echo $li_template;
		
		if ($p->hasChildren()) {
			if ($p->depth()<2) {
				echo "<li>";
				snippet('treemenu', array('subpages' => $p->children()));
				echo "</li>";
			} else if (!empty($page_url) AND !empty($url_array) AND in_array($page_url, $url_array)) {
				echo "<li>";
				snippet('treemenu', array('subpages' => $p->children()));
				echo "</li>";
			}
		}

	}
	
?>
	
</ul>