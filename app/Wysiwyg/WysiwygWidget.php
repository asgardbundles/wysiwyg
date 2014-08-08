<?php
namespace Wysiwyg;

class WysiwygWidget extends \Asgard\Form\Widget {
	public function render(array $options=[]) {
		$options = $this->options+$options;
		
		if(isset($options['attrs']))
			$attrs = $options['attrs'];
		else {
			$attrs = [
				'rows'	=>	10,
				'cols'	=>	80,
			];
		}

		$id = isset($options['id']) ? $options['id']:null;
		if(!isset($options['config']))
			$options['config'] = $this->form->getRequest()->url->to('wysiwyg/ckeditor/config.js');
		
		$this->form->getContainer()['html']->includeJS('wysiwyg/ckeditor/ckeditor.js');
		return \Asgard\Form\HTMLHelper::tag('textarea', [
			'name'	=>	$this->name,
			'id'	=>	$id,
		]+$attrs,
		$this->value ? $this->form->getContainer()['html']->sanitize($this->value):'').
		"<script>
		//<![CDATA[
		$(function(){
			var CKEDITOR_BASEPATH = '".$this->form->getRequest()->url->to('wysiwyg/ckeditor/')."';
			CKEDITOR.basePath = '".$this->form->getRequest()->url->to('wysiwyg/ckeditor/')."';
			var editor = CKEDITOR.instances['".$id."'];
			if (editor)
				editor.destroy(true);
			CKEDITOR.replace('".$id."'
										, {
							customConfig : '".$options['config']."'
						}
								);
		});
		//]]>
		</script>";
	}
}