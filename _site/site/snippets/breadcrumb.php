<ul class="breadcrumb">
	<?php 
		$x = 0; foreach($site->breadcrumb() AS $crumb) {
			
			$li_template = "<li class=\"%ACTIVE%\"><a href=\"%HREF%\">%TITLE%</a> <span class=\"divider\">/</span></li>";
			
			if($crumb->isActive()) {
				$li_template = str_replace("%ACTIVE%", "active", $li_template);
			} else {
				$li_template = str_replace("%ACTIVE%", "", $li_template);
			}
			
			if ($x==0) {
				$li_template = str_replace("%TITLE%", "Home", $li_template);
			} else {
				$li_template = str_replace("%TITLE%", $crumb->title(), $li_template);
			}
			
			$li_template = str_replace("%HREF%", $crumb->url(), $li_template);
			
			echo $li_template;
			$x++;

		}
		
	?>
</ul>
	