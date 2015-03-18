<?php
namespace Wysiwyg;

class WysiwygWidgetFactory implements \Asgard\Form\WidgetFactoryInterface {
	protected $html;

	public function __construct($html) {
		$this->html = $html;
	}

	public function create($name, $value, $options, $form) {
		$widget = new WysiwygWidget($name, $value, $options, $form);
		$widget->setHTML($this->html);
		return $widget;
	}
}