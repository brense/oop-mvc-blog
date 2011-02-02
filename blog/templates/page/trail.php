<div id="trail">
	<div class="spacer">
		you are here: <a href="">home</a><?php
if(is_array($this->page->trail)){
	foreach($this->page->trail as $key=>$value){
		print' &gt; <a href="'.$key.'">'.$value.'</a>';
	}
}
?>
	</div>
</div>