<?php
namespace Wysiwyg;

class Bundle extends \Asgard\Core\BundleLoader {
	public function run($container) {
		$container['widgetsManager']->setWidget('wysiwyg', 'Wysiwyg\WysiwygWidget');
	}
}