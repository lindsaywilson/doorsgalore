/*
 Copyright (c) 2003-2014, CKSource - Frederico Knabben. All rights reserved.
 For licensing, see LICENSE.md or http://ckeditor.com/license
*/

CKEDITOR.addTemplates("default",
{

    
    // The name of the subfolder that contains the preview images of the templates.
    imagesPath:CKEDITOR.getUrl(CKEDITOR.plugins.getPath("templates")+"templates/images/"),
    
    // Template definitions.
    templates:
        [
            {
                title:"Image on Left + Text on Right",
                image:"template1.gif",
                description:"One main image on left with text on the right.",
                html:'<div class="tpl clearfix"><div class="tpl_body_2_col tpl_left"><div class="wrapper"><img src="'+CKEDITOR.getUrl(CKEDITOR.plugins.getPath("templates")+"templates/images/")+'media-insert.png" alt="" /></div></div><div class="tpl_body_2_col tpl_right"><div class="wrapper"><p>Type the text here</p></div></div></div>'
            },
            {
                title:"Image on Right + Text on Left",
                image:"template2.gif",
                description:"One main image on right with text on the left.",
                html:'<div class="tpl clearfix"><div class="tpl_body_2_col tpl_left"><div class="wrapper"><p>Type the text here</p></div></div><div class="tpl_body_2_col tpl_right"><div class="wrapper"><img src="'+CKEDITOR.getUrl(CKEDITOR.plugins.getPath("templates")+"templates/images/")+'media-insert.png" alt="" /></div></div></div>'
            }
        ]
    });
    
    