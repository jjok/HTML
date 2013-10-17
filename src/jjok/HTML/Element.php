<?php

namespace jjok\HTML;

class Element extends SelfClosingElement {
	
	protected $text;
	
	public function __construct($name, $text = '', $attributes = array()) {
		$this->text = $text;
		
		parent::__construct($name, $attributes);
	}

// 	public function append($text) {
// 		$this->text .= $text;
// 	}
	
// 	public function prepend($text) {}
	
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
