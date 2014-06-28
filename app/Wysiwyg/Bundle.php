<?php
namespace Wysiwyg;

class Bundle extends \Asgard\Core\BundleLoader {
	public function run($app) {
		$app['widgetsManager']->setWidget('wysiwyg', 'Wysiwyg\WysiwygWidget');
	}
}