<?php

namespace jjok\HTML;

class Element extends SelfClosingElement {
	
	/**
	 * 
	 * @var unknown
	 */
	protected $children = array();
	
	/**
	 * 
	 * @param string $name
	 * @param SelfClosingElement|string $text
	 * @param unknown $attributes
	 */
	public function __construct($name, $text = '', $attributes = array()) {
		$this->children[] = $text;
		
		parent::__construct($name, $attributes);
	}

	/**
	 * 
	 * @param SelfClosingElement|string $child
	 * @return \jjok\HTML\Element
	 */
	public function append($child) {
		$this->children[] = $child;
		
		return $this;
	}
	
	/**
	 * 
	 * @param SelfClosingElement|string $child
	 * @return \jjok\HTML\Element
	 */
	public function prepend($child) {
		array_unshift($this->children, $child);
		
		return $this;
	}
	
	/**
	 * 
	 * @return \jjok\HTML\Element
	 */
	public function clear() {
// 		$this->text = '';
		$this->children = array();
		
		return $this;
	}
	
	/**
	 * (non-PHPdoc)
	 * @see \jjok\HTML\SelfClosingElement::__toString()
	 */
	public function __toString() {
		$attributes = array();
		foreach($this->attributes as $name => $value) {
			$attributes[] = sprintf('%s="%s"', $name, $value);
		}
		
		$str_attr = implode(' ', $attributes);
		if($str_attr !== '') {
			$str_attr = ' '.$str_attr;
		}
		
		return sprintf(
			'<%s%s>%s</%s>',
			$this->name,
			$str_attr,
			implode('', $this->children),
			$this->name
		);
	}
}
