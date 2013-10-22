<?php

namespace jjok\HTML;

use jjok\HTML\SelfClosingElement;
use PHPUnit_Framework_TestCase;

require_once 'src/jjok/HTML/SelfClosingElement.php';

class SelfClosingElementTest extends PHPUnit_Framework_TestCase {
	
	/**
	 * @expectedException PHPUnit_Framework_Error
	 */
	public function testElementNameIsRequired() {
		new SelfClosingElement();
	}
	
	public function testEmptyElementCanBeCreated() {
		$this->assertSame('<img />', (string) new SelfClosingElement('img'));
		$this->assertSame('<p />', (string) new SelfClosingElement('p'));
		$this->assertSame('<some:tagname />', (string) new SelfClosingElement('some:tagname'));
	}
	
	public function testElementCanBeCreatedWithAttributes() {
		$this->assertSame(
			'<img href="some-value" class="another-value"/>',
			(string) new SelfClosingElement(
				'img',
				array(
					'href' => 'some-value',
					'class' => 'another-value'
				)
			)
		);
	}
	
	public function testAttributesCanBeAddedToElement() {
		$element = new SelfClosingElement('a');
		$this->assertSame('<a />', (string) $element);
		$this->assertSame($element, $element->addAttribute('name', 'value'));
		$this->assertSame('<a name="value"/>', (string) $element);
		$this->assertSame($element, $element->addAttribute('another-name', ' another value '));
		$this->assertSame('<a name="value" another-name=" another value "/>', (string) $element);
	}
}
