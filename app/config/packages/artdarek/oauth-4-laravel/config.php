<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| oAuth Config
	|--------------------------------------------------------------------------
	*/

	/**
	 * Storage
	 */
	'storage' => 'Session',

	/**
	 * Consumers
	 */
	'consumers' => array(

		/**
		 * Facebook
		 */
        'Facebook' => array(
            'client_id'     => '',
            'client_secret' => '',
            'scope'         => array(),
        ),

				'Google' => array(
					'client_id' => '438455429852-q0f29m3am8sdmhfa9jpmrupo495k9ddj.apps.googleusercontent.com',
					'client_secret' => 'uutxLDMDfccA1nL_je-19ax5',
					'scope' => array('userinfo_email', 'userinfo_profile')
				)
	)

);
