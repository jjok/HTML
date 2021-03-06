<?php

namespace jjok\HTML;

class SelfClosingElement {

	/**
	 * The name of the HTML tag.
	 * @var string
	 */
	protected $name;

	/**
	 * 
	 * @var array
	 */
	protected $attributes;
	
	/**
	 * 
	 * @param string $name
	 * @param array $attributes
	 */
	public function __construct($name, array $attributes = array()) {
		$this->name = $name;
		$this->attributes = $attributes;
	}

// 	public function getName() {
// 		return $this->name;
// 	}
	
	/**
	 * 
	 * @param string $name
	 * @param string $value
	 * @return \jjok\HTML\SelfClosingElement
	 */
	public function addAttribute($name, $value) {
		$this->attributes[$name] = $value;
		
		return $this;
	}
	
	/**
	 * 
	 * @return string
	 */
	public function __toString() {
		$attributes = array();
		foreach($this->attributes as $name => $value) {
			$attributes[] = sprintf('%s="%s"', $name, $value);
		}
		
		return sprintf(
			'<%s %s/>',
			$this->name,
			implode(' ', $attributes)
		);
	}
}
