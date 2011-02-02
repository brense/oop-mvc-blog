<div id="logo">
	<a href="">&nbsp;</a>
</div>
<div id="top-right">
	<form action="search/" method="post">
		<fieldset>
			<input type="text" name="term" />
			<input type="submit" name="search" value="search" />
		</fieldset>
	</form>
	<div id="topnav">
		<ul>
			<li><a href="search/">advanced search</a></li>
			<li><a href="sitemap/">sitemap</a></li>
			<li><a href="about/privacy/">privacy</a></li>
			<li><a href="about/etiquette/">etiquette</a></li>
			<li><a href="about/tos/">terms of service</a></li>
			<li><a href="help/">helpdesk</a></li>
		</ul>
	</div>
</div>
<div id="mainnav">
	<ul>
		<li<?php if($this->page->get('uri')==''){print' class="active"';}?>><a href="">home</a></li>
		<li<?php if($this->page->get('uri')=='bands'){print' class="active"';}?>><a href="bands/">bands <span>(67343)</span></a></li>
		<li<?php if($this->page->get('uri')=='fans'){print' class="active"';}?>><a href="fans/">fans <span>(346489)</span></a></li>
		<li<?php if($this->page->get('uri')=='stages'){print' class="active"';}?>><a href="stages/">stages <span>(3732)</span></a></li>
		<li<?php if($this->page->get('uri')=='events'){print' class="active"';}?>><a href="events/">events <span>(6858)</span></a></li>
		<li<?php if($this->page->get('uri')=='music'){print' class="active"';}?>><a href="music/">music <span>(34579)</span></a></li>
		<li<?php if($this->page->get('uri')=='art'){print' class="active"';}?>><a href="art/">art <span>(34579)</span></a></li>
		<li<?php if($this->page->get('uri')=='shop'){print' class="active"';}?>><a href="shop/">shop <span>(237)</span></a></li>
	</ul>
</div>