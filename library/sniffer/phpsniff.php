<?php

class sniffer_phpsniff extends sniffer_phpsniffcore
{   var $_version = '2.1.3';

    var $_temp_file_path        = '/tmp/'; // with trailing slash
    var $_check_cookies         = NULL;
    var $_default_language      = 'en-us';
    var $_allow_masquerading    = NULL;
    var $_php_version           = '';
    
    var $_browsers = array(
        'microsoft internet explorer' => 'IE',
		'chrome'                      => 'CR',
        'msie'                        => 'IE',
        'netscape6'                   => 'NS',
        'netscape'                    => 'NS',
        'galeon'                      => 'GA',
        'phoenix'                     => 'PX',
        'mozilla firebird'            => 'FB',
        'firebird'                    => 'FB',
        'chimera'                     => 'CH',
        'camino'                      => 'CA',
        'safari'                      => 'SF',
        'k-meleon'                    => 'KM',
        'mozilla'                     => 'MZ',
        'opera'                       => 'OP',
        'konqueror'                   => 'KQ',
        'icab'                        => 'IC',
        'lynx'                        => 'LX',
		'links'                       => 'LI',					
        'ncsa mosaic'                 => 'MO',
        'amaya'                       => 'AM',
        'omniweb'                     => 'OW',
		'hotjava'					  => 'HJ',
        'browsex'                     => 'BX',
        'amigavoyager'                => 'AV',
        'amiga-aweb'                  => 'AW',
        'ibrowse'                     => 'IB'
		);

    var $_javascript_versions = array(
        '1.5'   =>  'NS5+,MZ,PX,FB,GA,CH,CA,SF,KQ3+,KM,CR', // browsers that support JavaScript 1.5
        '1.4'   =>  '',
        '1.3'   =>  'NS4.05+,OP5+,IE5+',
        '1.2'   =>  'NS4+,IE4+',
        '1.1'   =>  'NS3+,OP,KQ',
        '1.0'   =>  'NS2+,IE3+',
		'0'     =>	'LI,LX,HJ'	
        );
		
	var $_browser_features = array(
		/**
		 *	the following are true by default
		 *	(see phpSniff.core.php $_feature_set array)
		 *	browsers listed here will be set to false
		 **/
		'html'		=>	'',
		'images'	=>	'LI,LX',
		'frames' 	=>	'LI,LX',
		'tables'	=>	'',
		'java'		=>	'OP3,LI,LX,NS1,MO,IE1,IE2',
		'plugins'	=>	'IE1,IE2,LI,LX',
		/**  
		 *	the following are false by default
		 *	(see phpSniff.core.php $_feature_set array)
		 *	browsers listed here will be set to true
		 **/
		'css2'		=>	'NS5+,IE5+,MZ,PX,FB,CH,CA,SF,GA,KQ3+,OP7+,KM',
		'css1'		=>	'NS4+,IE4+,MZ,PX,FB,CH,CA,SF,GA,KQ,OP7+,KM',
		'iframes'	=>	'IE3+,NS5+,MZ,PX,FB,CH,CA,SF,GA,KQ,OP7+,KM',
		'xml'		=>	'IE5+,NS5+,MZ,PX,FB,CH,CA,SF,GA,KQ,OP7+,KM',
		'dom'		=>	'IE5+,NS5+,MZ,PX,FB,CH,CA,SF,GA,KQ,OP7+,KM',
		'hdml'		=>	'',
		'wml'		=>	''
		);
		
	var $_browser_quirks = array(
		'must_cache_forms'			=>	'NS,MZ,FB,PX',
		'avoid_popup_windows'		=>	'IE3,LI,LX',
		'cache_ssl_downloads'		=>	'IE',
		'break_disposition_header'	=>	'IE5.5',
		'empty_file_input_value'	=>	'KQ',
		'scrollbar_in_way'			=>	'IE6'
		);

    function __construct()
    {   //  populate the HTTP_USER_AGENT string
        //  20020425 :: rraymond
        //      routine for easier configuration of the client at runtime
        if(is_array($settings)) {
            $run = true;
            extract($settings);
            $this->_check_cookies = $check_cookies;
            $this->_default_language = $default_language;
            $this->_allow_masquerading = $allow_masquerading;
        } else {
            // for backwards compatibility with 2.0.x series
            $run = $settings;
        }
        
        // 20020425 :: besfred
        if(empty($UA)) $UA = getenv('HTTP_USER_AGENT');
        if(empty($UA)) {
            $pv = explode(".", PHP_VERSION);
            $UA = ( $pv[0] > 3 && $pv[1] > 0 ) ? $_SERVER['HTTP_USER_AGENT'] : $HTTP_SERVER_VARS['HTTP_USER_AGENT'];
        }
        // 20020910 :: rraymond
        if(empty($UA)) return false;
        
        $this->_set_browser('ua',$UA);
        /*if($run)*/ $this->init();
    }
}
?>