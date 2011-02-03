<?php

/**
 * the main application class
 * @package models
 */
class models_Main {
	
	/**
     * will hold the config singleton object
     * @access public
     * @var models_Config
     */
	public $cfg;
	
	/**
     * will hold the browser singleton object
     * @access public
     * @var models_Browser
     */
	public $browser;
	
	/**
     * will hold the page object
     * @access public
     * @var models_Page
     */
	public $page;
	
	/**
     * array with script objects
     * @access public
     * @var array
     */
	public $scripts;
	
	/**
     * will hold the output
     * @access public
     * @var string
     */
	public $output;
	
	/**
     * main constructor
	 * @param string $docroot
	 * @param string $siteroot
     */
	public function __construct($docroot, $siteroot, $sitename, $config){
		$this->init($docroot, $siteroot, $sitename, $config);
	}
	
	/**
     * initializes the application
	 * @param string $docroot
	 * @param string $siteroot
     */
	private function init($docroot, $siteroot, $sitename, $config){
		/* init site configuration */
		$this->cfg = models_Config::getInstance();
		$this->cfg->load(new string($docroot. $config . 'application.xml'));
		$this->cfg->set('siteroot', $siteroot);
		$this->cfg->set('docroot', $docroot);
		$this->cfg->set('sitename', $sitename);
		$this->cfg->set('pageuri', str_replace($this->cfg->get('siteroot'), '', array_shift(explode('?', 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']))));
		
		/* get browser info */
		$this->browser = models_Browser::getInstance();
		$this->browser->load();
		
		/* load site scripts */
		$this->scripts = new controllers_ScriptController(str_replace($sitename . '/' . $sitename . '/', $sitename . '/',$this->cfg->get('docroot') . $this->cfg->get('sitename') . '/'. $this->cfg->get('scriptpath')));
		$this->scripts = $this->scripts->load();
		
		/* get page object */
		$pageController = new controllers_PageController();
		$this->page = $pageController->getPage($this->cfg->get('pageuri'));
		
		/* get page template and content templates */
		ob_start();
		include($this->cfg->get('docroot') . $this->cfg->get('templatespath') . 'templates/page/' . $this->page->get('template') . '.php');
		$input = ob_get_contents();
		ob_end_clean();
		
		/* get parsed output */
		//$tpl=new controllers_TemplateController($this->scripts);
		//$tpl->parse($this->page, $this->page->content);
		
		/* translate template output */
		$this->output=$input;
		
	}
	
}