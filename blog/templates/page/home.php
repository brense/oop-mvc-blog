<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href="<?php print $this->cfg->get('siteroot'); ?>" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php print $this->page->get('pagetitle').' | '.$this->cfg->get('sitetitle'); ?></title>
<meta name="description" content="<?php print $this->page->get('description'); ?>" />
<link rel="stylesheet" href="<?php print $this->cfg->get('themespath') . $this->cfg->get('sitetheme') . '/' . $this->page->get('style'); ?>.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php print $this->cfg->get('themespath') . $this->cfg->get('sitetheme'); ?>/print.css" type="text/css" media="print" />
<?php
if(is_array($this->scripts)){
	foreach($this->scripts as $item){
		print '<script type="text/javascript" src="' . $item->get() . '"></script>' . "\n";
	}
}
?>
</head>
<body>

<div id="header" class="part">
	<div id="header-main">
		<div class="wrapper">
			<div class="holder">
<?php
include($this->cfg->get('docroot') . $this->cfg->get('templatespath') . 'templates/page/header.php');
print "\n";
?>
			</div>
		</div>
	</div>
</div>
<div id="body" class="part">
	<div class="wrapper">
		<div class="holder">
			<div class="spacer">
<?php
if(is_array($this->page->content)){
	foreach($this->page->content as $item){
		if(substr($item,0,10)=='templates/'){
			include($this->cfg->get('docroot') . $this->cfg->get('templatespath') . $item . '.php');
			print "\n";
		}
		else {
			print $item."\n";
		}
	}
}
?>
			</div>
		</div>
	</div>
</div>
<div id="footer" class="part">
	<div class="wrapper">
<?php
include($this->cfg->get('docroot') . $this->cfg->get('templatespath') . 'templates/page/footer.php');
print "\n";
?>
	</div>
</div>

</body>
</html>