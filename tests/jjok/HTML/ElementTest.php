<?php

namespace jjok\HTML;

use jjok\HTML\Element;
use PHPUnit_Framework_TestCase;

require_once 'src/jjok/HTML/SelfClosingElement.php';
require_once 'src/jjok/HTML/Element.php';

class ElementTest extends PHPUnit_Framework_TestCase {
	
	public function testEmptyElementCanBeCreated() {
		$this->assertSame('<a></a>', (string) new Element('a'));
	}
	
	public function testElementWithTextCanBeCreated() {
		$this->assertSame('<a>some content</a>', (string) new Element('a', 'some content'));
	}
	
	public function testElementWithChildElementCanBeCreated() {
		$this->assertSame('<a><span></span></a>', (string) new Element('a', new Element('span')));
	}
	
	public function testElementWithAttributesCanBeCreated() {
		$this->assertSame(
			'<div class="my-class-name" id="my-id">initial content</div>',
			(string) new Element(
			'div',
			'initial content',
			array(
				'class' => 'my-class-name',
				'id' => 'my-id'
			)
		));
	}
	
	public function testElementTextCanBeAppended() {
		$element = new Element('div', 'initial content');
		$this->assertSame('<div>initial content</div>', (string) $element);
		
		$this->assertSame($element, $element->append('some text'));
		$this->assertSame('<div>initial contentsome text</div>', (string) $element);
		
		$this->assertSame($element, $element->append(new Element('span', 'some more text')));
		$this->assertSame(
			'<div>initial contentsome text<span>some more text</span></div>',
			(string) $element
		);
	}
	
	public function testElementTextCanBePrepended() {
		$element = new Element('div', 'initial content');
		//$this->assertSame('<div>initial content</div>', (string) $element);
		
		$this->assertSame($element, $element->prepend(new Element('span', 'some more text')));
		$this->assertSame(
			'<div><span>some more text</span>initial content</div>',
			(string) $element
		);
		
		$this->assertSame($element, $element->prepend('some text'));
		$this->assertSame(
			'<div>some text<span>some more text</span>initial content</div>',
			(string) $element
		);
	}
	
	public function testElementTextCanBeEmptied() {
		$element = new Element('div', 'initial content');
		$this->assertSame('<div></div>', (string) $element->clear());
	}
}
