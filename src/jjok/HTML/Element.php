<?php

namespace jjok\HTML;

class Element extends SelfClosingElement {
	
	protected $text;
	protected $children = array();
	
	public function __construct($name, $text = '', $attributes = array()) {
		$this->text = $text;
		$this->children[] = $text;
		
		parent::__construct($name, $attributes);
	}

	public function append($child) {
		$this->children[] = $child;
		
		return $this;
	}
	
	public function prepend($child) {
		array_unshift($this->children, $child);
		
		return $this;
	}
	
	public function clear() {
		$this->text = '';
		$this->children = array();
		
		return $this;
	}
	
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
			$this->text,
			$this->name
		);
	}
}
