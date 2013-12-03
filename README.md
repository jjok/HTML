HTML
====

[![Build Status](https://travis-ci.org/jjok/HTML.png?branch=master)](https://travis-ci.org/jjok/HTML)

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


	use jjok\HTML\Element;
	
	echo new Element(
		'span',
		'Some text content',
		array(
			'class' => 'my-class'
		)
	);
	
	// <span class="my-class">Some text content</span>

Copyright (c) 2013 Jonathan Jefferies
