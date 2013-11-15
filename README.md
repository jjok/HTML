HTML
====

[![Build Status](https://travis-ci.org/jjok/HTML.png?branch=master)](https://travis-ci.org/jjok/HTML) [![Coverage Status](https://coveralls.io/repos/jjok/HTML/badge.png)](https://coveralls.io/r/jjok/HTML)

Examples
--------

	use jjok\HTML\SelfClosingElement;
	
	echo new SelfClosingElement(
		'img',
		array(
			'src' => 'some-image.png',
			'alt' => 'My image',
			'width' => '400',
			'height' => '300'
		)
	);
	
	// <img src="some-image.png" alt="My image" width="400" height="300"/>


Copyright (c) 2013 Jonathan Jefferies
