<?php
namespace Wysiwyg;

class Bundle extends \Asgard\Core\BundleLoader {
	public function run(\Asgard\Container\ContainerInterface $container) {
		$container['widgetManager']->setWidgetFactory('wysiwyg', new WysiwygWidgetFactory($container['html']));
	}
}