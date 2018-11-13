if (typeof TinyMCE == 'undefined') {
 	$.getScript(base_url+'/bc/tinymce/tinymce.min.js', function() {
	$.getScript(base_url+'/bc/tinymce/jquery.tinymce.min.js', function() {
		window.tinymce.dom.Event.domLoaded = true;
		//alert('Loaded!');
		tinymce.baseURL=base_url+'/theme/bc/tinymce';
		tinymce.suffix = '.min';
		tinymce.init({
			selector: 'textarea.tinymce',
			//content_css : '/mycontent.css',  // resolved to http://domain.mine/mycontent.css
			menubar: true,
			statusbar: true,
			relative_urls: false,
			theme : "modern",
			schema: 'html5',
			setup: function(editor) {
                    editor.on('change', function() {
                        tinymce.triggerSave();
                    });
            },
			external_plugins: {
                'bootstrap': base_url + '/theme/js/tinymce_plugin/bootstrap/plugin.js',
                'youtube': base_url + '/theme/js/tinymce_plugin/youtube/plugin.min.js',
                //'filemanager': base_url + 'src/js/vendor/filemanager/plugin.min.js',
                'responsivefilemanager': base_url + '/theme/js/tinymce_plugin/responsivefilemanager/plugin.min.js',
                //'document' : base_url+'src/js/vendor/document/prism.js',
                'linkpage' : base_url + '/theme/js/tinymce_plugin/linkpage/plugin.min.js',
                'tag': base_url + '/theme/js/tinymce_plugin/tag/plugin.js',
            },
			skin: 'lightgray',  // use the name of your skin, not lightgray
  			plugins: [
                            'advlist autolink lists image charmap print preview hr anchor pagebreak'
                            , 'bootstrap', 'youtube','linkpage','tag',
                            'searchreplace wordcount visualblocks visualchars code fullscreen',
                            'insertdatetime media nonbreaking save table contextmenu directionality', 'emoticons template paste textcolor colorpicker textpattern imagetools'
                        ],
			//toolbar: "image undo redo styleselect bold italic alignleft aligncenter alignright bullist numlist outdent indent code",
            toolbar1: "bootstrap",
            toolbar2: "| responsivefilemanager  linkpage tag| link unlink anchor | image media | forecolor backcolor  | print preview code | filemanager | fullscreen",
            toolbar3: "insertfile | undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
                                    
            filemanager_subfolder: '/upload',
            filemanager_crossdomain: true,
  			imagetools_toolbar: "rotateleft rotateright | flipv fliph | editimage imageoptions",
  			theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,styleselect,formatselect,|,table,removeformat,code",
            theme_advanced_buttons2 : "",
            theme_advanced_buttons3 : "",
            theme_advanced_buttons4 : "",
            theme_advanced_toolbar_location : "top",
            theme_advanced_toolbar_align : "left",
            theme_advanced_statusbar_location : "bottom",
            theme_advanced_resizing : true,
            editor_deselector : "no_tiny",  //?????
  			style_formats : [
                    {title : 'Bold text', inline : 'b'},
                    {title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
                    {title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
                    {title : 'Example 1', inline : 'span', classes : 'example1'},
                    {title : 'Example 2', inline : 'span', classes : 'example2'},
                    {title : 'Table styles'},
                    {title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
            ],

            formats : {
                    alignleft : {selector : 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', classes : 'left'},
                    aligncenter : {selector : 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', classes : 'center'},
                    alignright : {selector : 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', classes : 'right'},
                    alignfull : {selector : 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', classes : 'full'},
                    bold : {inline : 'span', 'classes' : 'bold'},
                    italic : {inline : 'span', 'classes' : 'italic'},
                    underline : {inline : 'span', 'classes' : 'underline', exact : true},
                    strikethrough : {inline : 'del'},
                    customformat : {inline : 'span', styles : {color : '#00ff00', fontSize : '20px'}, attributes : {title : 'My custom format'}}
            },
		});
	});
 	});
}