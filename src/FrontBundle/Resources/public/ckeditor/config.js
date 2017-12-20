/**
 * @license Copyright (c) 2003-2016, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here.
	// For complete reference see:
	// http://docs.ckeditor.com/#!/api/CKEDITOR.config

	// The toolbar groups arrangement, optimized for two toolbar rows.
	config.toolbarGroups = [
		{ name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
		{ name: 'links' },
		{ name: 'insert' },
		{ name: 'forms' },
		{ name: 'tools' },
		{ name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'others' },
		'/',
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
		{ name: 'styles' },
		{ name: 'colors' },
		{ name: 'about' }
	];

	// Remove some buttons provided by the standard plugins, which are
	// not needed in the Standard(s) toolbar.
	config.removeButtons = 'Underline,Subscript,Superscript';

	// Set the most common block elements.
	config.format_tags = 'p;h1;h2;h3;pre';

	// Simplify the dialog windows.
	config.removeDialogTabs = 'image:advanced;link:advanced';
    //KCFinder
    var base_path = Routing.getBaseUrl().replace(/\w+\.php$/gi,'');
    config.filebrowserBrowseUrl = base_path + '/bundles/mdwebadmin/kcfinder/browse.php?type=files';
    config.filebrowserImageBrowseUrl = base_path + '/bundles/mdwebadmin/kcfinder/browse.php?type=images';
    config.filebrowserFlashBrowseUrl = base_path + '/bundles/mdwebadmin/kcfinder/browse.php?type=flash';
    config.filebrowserUploadUrl = base_path + '/bundles/mdwebadmin/kcfinder/upload.php?type=files';
    config.filebrowserImageUploadUrl = base_path + '/bundles/mdwebadmin/kcfinder/upload.php?type=images';
    config.filebrowserFlashUploadUrl = base_path + '/bundles/mdwebadmin/kcfinder/upload.php?type=flash';

    config.youtube_related = false;
    config.youtube_responsive = true;
};
