
(function($) {

    "use strict";

    /*-- Integrate style in before & after elements --*/
    
    $.fn.pseudoStyle = function(className,element,prop,value){
        var _this = this;
        var _sheetId = ("#Ex_pseudoStyles");
        var _head = $.head || $('head')[0];
        var _sheet = document.getElementById(_sheetId) || document.createElement('style');
        _sheet.id = _sheetId;

        _sheet.innerHTML += "\n."+className+":"+element+"{"+prop+":"+value+"}";
        _head.appendChild(_sheet);
        return this;
    };


    /*=================================*/
    /*  Section Shape
    /*=================================*/

    var exelShape = function ($scope, $) {

        var target = $scope,
            sectionId = target.data("id"),
            settings = false,
            editMode = elementorFrontend.isEditMode();


        /*-- Elementor editor settings in live preview --*/
        if (editMode) {
            settings = generateEditorSettings(sectionId);

        }

        /*-- Elementor editor settings for live preview --*/
        function generateEditorSettings(targetId) {
            var editorElements = null,
                exshapeArgs   = {},
                settings       = {};

            if (!window.elementor.hasOwnProperty('elements')) {
                return false;
            }

            editorElements = window.elementor.elements;

            if (!editorElements.models) {
                return false;
            }

            /*-- Retrieve shape element settings --*/
            $.each(editorElements.models, function (i, el) {
                if (targetId == el.id) {
                    exshapeArgs = el.attributes.settings.attributes;

                } else if (el.id == $scope.closest('.elementor-top-section').data('id')) {
                    $.each(el.attributes.elements.models, function (i, col) {
                        $.each(col.attributes.elements.models, function (i, subSec) {
                            exshapeArgs = subSec.attributes.settings.attributes;
                        });
                    });
                }
            });


            /*-- Shape switch --*/
            settings.shapeonesw = exshapeArgs['ex_sec_shape_one'];
            settings.shapetwosw = exshapeArgs['ex_sec_shape_two'];

            /*-- Add a class if any shape switch is active --*/
            if (settings.shapeonesw  == 'yes' || settings.shapetwosw=='yes') {
                $scope.addClass('ex-section-shape-'+targetId);
            }

            /*-- shape-1 style --*/
            if(settings.shapeonesw  == 'yes'){

                /*-- Shape-1 attribute set with specific variable --*/
                settings.shapeonePosition =  'absolute';
                settings.shapeoneContent =  "''";
                settings.shapeoneHeight = exshapeArgs['ex_shape_one_height']['size'] + exshapeArgs['ex_shape_one_height']['unit'];
                settings.shapeoneWidth = exshapeArgs['ex_shape_one_width']['size'] + exshapeArgs['ex_shape_one_width']['unit'];
                settings.shapeoneTransform = exshapeArgs['ex_shape_one_transform'];
                settings.shapeoneRadius = exshapeArgs['ex_shape_one_border_radius'];
                settings.shapeoneZindex = exshapeArgs['ex_shape_one_z_index'];


                settings.shapeonebgColor =  exshapeArgs['ex_shape_one_bg_color'];
                settings.shapeonebgImage =  exshapeArgs['ex_shape_one_bg_image']['url'];
                settings.shapeonebgImagePosX =  exshapeArgs['ex_shape_one_bg_image_pos_x']['size'] + exshapeArgs['ex_shape_one_bg_image_pos_x']['unit'];
                settings.shapeonebgImagePosY =  exshapeArgs['ex_shape_one_bg_image_pos_y']['size'] + exshapeArgs['ex_shape_one_bg_image_pos_y']['unit'];
                settings.shapeonebgImageSize =  exshapeArgs['ex_shape_one_bg_image_size']['size'] + exshapeArgs['ex_shape_one_bg_image_size']['unit'];

                settings.shapeonebgType =  exshapeArgs['ex_shape_one_bg_type'];
                settings.shapeonegradecolorType =  exshapeArgs['ex_shape_one_grad_color_type'];
                settings.shapeonelocationOne = exshapeArgs['ex_shape_one_grad_color_1_location']['size'] + exshapeArgs['ex_shape_one_grad_color_1_location']['unit'];
                settings.shapeonelocationTwo = exshapeArgs['ex_shape_one_grad_color_2_location']['size'] + exshapeArgs['ex_shape_one_grad_color_2_location']['unit'];
                settings.shapeonegradecolorOne = exshapeArgs['ex_shape_one_grad_color_1'];
                settings.shapeonegradecolorTwo = exshapeArgs['ex_shape_one_grad_color_2'];

                settings.shapeonepositionH = exshapeArgs['ex_shape_one_position_h'];
                settings.shapeonepositionHr = exshapeArgs['ex_shape_one_offset_x']['size'] + exshapeArgs['ex_shape_one_offset_x']['unit'];
                settings.shapeonepositionY = exshapeArgs['ex_shape_one_position_v'];
                settings.shapeonepositionVr = exshapeArgs['ex_shape_one_offset_y']['size'] + exshapeArgs['ex_shape_one_offset_y']['unit'];


                settings.shapeoneStyle = exshapeArgs['ex_shape_one_style'];
                settings.shapeonepoValue1 = exshapeArgs['ex_shape_one_style_value_1'] + '%';
                settings.shapeonepoValue2 = exshapeArgs['ex_shape_one_style_value_2'] + '%';
                settings.shapeonepoValue3 = exshapeArgs['ex_shape_one_style_value_3'] + '%';
                settings.shapeonepoValue4 = exshapeArgs['ex_shape_one_style_value_4'] + '%';
                settings.shapeonepoValue5 = exshapeArgs['ex_shape_one_style_value_5'] + '%';
                settings.shapeonepoValue6 = exshapeArgs['ex_shape_one_style_value_6'] + '%';
                settings.shapeonepoValue7 = exshapeArgs['ex_shape_one_style_value_7'] + '%';
                settings.shapeonepoValue8 = exshapeArgs['ex_shape_one_style_value_8'] + '%';
                settings.shapeonepoValue9 = exshapeArgs['ex_shape_one_style_value_9'] + '%';
                settings.shapeonepoValue10 = exshapeArgs['ex_shape_one_style_value_10'] + '%';


                /*-- Shape-1 style integrate with html before:: element following added section class --*/
                var div = $('ex-section-shape-'+targetId);
                div.pseudoStyle('ex-section-shape-'+targetId,"before","content",settings.shapeoneContent);
                div.pseudoStyle('ex-section-shape-'+targetId,"before","position",settings.shapeonePosition);
                div.pseudoStyle('ex-section-shape-'+targetId,"before","height",settings.shapeoneHeight);
                div.pseudoStyle('ex-section-shape-'+targetId,"before","width",settings.shapeoneWidth);

                if(settings.shapeonepositionH == 'left'){
                    div.pseudoStyle('ex-section-shape-'+targetId,"before",'left',settings.shapeonepositionHr);
                    div.pseudoStyle('ex-section-shape-'+targetId,"before",'right','unset');
                }

                if(settings.shapeonepositionH == 'right'){
                    div.pseudoStyle('ex-section-shape-'+targetId,"before",'right',settings.shapeonepositionHr);
                    div.pseudoStyle('ex-section-shape-'+targetId,"before",'left','unset');
                }

                if(settings.shapeonepositionY == 'top'){
                    div.pseudoStyle('ex-section-shape-'+targetId,"before",'top',settings.shapeonepositionVr);
                    div.pseudoStyle('ex-section-shape-'+targetId,"before",'bottom','unset');
                }

                if(settings.shapeonepositionY == 'bottom'){
                    div.pseudoStyle('ex-section-shape-'+targetId,"before",'bottom',settings.shapeonepositionVr);
                    div.pseudoStyle('ex-section-shape-'+targetId,"before",'top','unset');
                }


                if(settings.shapeonebgColor !='' && settings.shapeonebgType == 'classic'){
                    div.pseudoStyle('ex-section-shape-'+targetId,"before","background-color",settings.shapeonebgColor);
                }

                if(settings.shapeonebgImage !='' && settings.shapeonebgType == 'classic'){
                    div.pseudoStyle('ex-section-shape-'+targetId,"before","background-image",'url("'+settings.shapeonebgImage+'")');
                    div.pseudoStyle('ex-section-shape-'+targetId,"before","background-position", settings.shapeonebgImagePosX+ ' '+settings.shapeonebgImagePosY);
                    div.pseudoStyle('ex-section-shape-'+targetId,"before","background-repeat","no-repeat");
                    div.pseudoStyle('ex-section-shape-'+targetId,"before","background-size", settings.shapeonebgImageSize );
                }


                if(settings.shapeonebgType == 'gradient' && settings.shapeonegradecolorType == 'linear-gradient' ){
                    settings.shapeoneAngle = exshapeArgs['ex_shape_one_grad_color_lin_angle']['size'] + exshapeArgs['ex_shape_one_grad_color_lin_angle']['unit'];

                    div.pseudoStyle('ex-section-shape-'+targetId,"before","background",'linear-gradient('+settings.shapeoneAngle+',' +settings.shapeonegradecolorOne+' '+settings.shapeonelocationOne+','+settings.shapeonegradecolorTwo+' '+settings.shapeonelocationTwo+ ')');
                }

                if(settings.shapeonebgType == 'gradient' && settings.shapeonegradecolorType == 'radial-gradient' ){
                    settings.shapeonePosition = exshapeArgs['ex_shape_one_grad_color_rad_position'];

                    div.pseudoStyle('ex-section-shape-'+targetId,"before","background",'radial-gradient(at '+settings.shapeonePosition+',' +settings.shapeonegradecolorOne+' '+settings.shapeonelocationOne+','+settings.shapeonegradecolorTwo+' '+settings.shapeonelocationTwo+ ')');
                }

                    if(settings.shapeoneStyle == 'default') {
                        div.pseudoStyle('ex-section-shape-' + targetId, "before", "clip-path", 'none');
                    }

                    if (settings.shapeoneStyle == 'triangle') {
                        div.pseudoStyle('ex-section-shape-' + targetId, "before", "clip-path", 'polygon(' + settings.shapeonepoValue1 + ' ' + settings.shapeonepoValue2 + ',' + settings.shapeonepoValue3 + ' ' + settings.shapeonepoValue4 + ',' + settings.shapeonepoValue5 + ' ' + settings.shapeonepoValue6 + ')');
                    }

                    if (settings.shapeoneStyle == 'parallelogram') {
                        div.pseudoStyle('ex-section-shape-' + targetId, "before", "clip-path", 'polygon(' + settings.shapeonepoValue1 + ' ' + settings.shapeonepoValue2 + ',' + settings.shapeonepoValue3 + ' ' + settings.shapeonepoValue4 + ',' + settings.shapeonepoValue5 + ' ' + settings.shapeonepoValue6 + ',' + settings.shapeonepoValue7 + ' ' + settings.shapeonepoValue8 + ')');
                    }

                    if (settings.shapeoneStyle == 'pentagon') {
                        div.pseudoStyle('ex-section-shape-' + targetId, "before", "clip-path", 'polygon(' + settings.shapeonepoValue1 + ' ' + settings.shapeonepoValue2 + ',' + settings.shapeonepoValue3 + ' ' + settings.shapeonepoValue4 + ',' + settings.shapeonepoValue5 + ' ' + settings.shapeonepoValue6 + ',' + settings.shapeonepoValue7 + ' ' + settings.shapeonepoValue8 + ',' + settings.shapeonepoValue9 + ' ' + settings.shapeonepoValue10 + ')');
                    }


                if(settings.shapeoneTransform == 'yes') {
                    var shapeoneTransform = [];

                    settings.shapeoneTscale = exshapeArgs['ex_shape_one_transform_scale'];
                    settings.shapeoneTrotate = exshapeArgs['ex_shape_one_transform_rotate']['size'] + exshapeArgs['ex_shape_one_transform_rotate']['unit'];
                    settings.shapeoneTtranslatex = exshapeArgs['ex_shape_one_transform_translate_x']['size'] + exshapeArgs['ex_shape_one_transform_translate_x']['unit'];
                    settings.shapeoneTtranslatey = exshapeArgs['ex_shape_one_transform_translate_y']['size'] + exshapeArgs['ex_shape_one_transform_translate_y']['unit'];
                    settings.shapeoneTskewx = exshapeArgs['ex_shape_one_transform_skew_x']['size'] + exshapeArgs['ex_shape_one_transform_skew_x']['unit'];
                    settings.shapeoneTskewy = exshapeArgs['ex_shape_one_transform_skew_y']['size'] + exshapeArgs['ex_shape_one_transform_skew_y']['unit'];
                    settings.shapeoneTransformorigin = exshapeArgs['ex_shape_one_transform_origin'];

                    if (settings.shapeoneTscale != '1') {
                        shapeoneTransform[0] = 'scale(' + settings.shapeoneTscale + ')';
                    }

                    if (exshapeArgs['ex_shape_one_transform_rotate']['size'] != '0') {
                        shapeoneTransform[1] = 'rotate(' + settings.shapeoneTrotate + ')';
                    }

                    if (exshapeArgs['ex_shape_one_transform_translate_x']['size'] != '0' || exshapeArgs['ex_shape_one_transform_translate_y']['size'] != '0') {
                        shapeoneTransform[2] = 'translate(' + settings.shapeoneTtranslatex + ',' + settings.shapeoneTtranslatey + ')';
                    }

                    if (exshapeArgs['ex_shape_one_transform_skew_x']['size'] != '0' || exshapeArgs['ex_shape_one_transform_skew_y']['size'] != '0') {
                        shapeoneTransform[3] = 'skew(' + settings.shapeoneTskewx + ',' + settings.shapeoneTskewy + ')';
                    }

                    if (shapeoneTransform.length > '0') {
                        div.pseudoStyle('ex-section-shape-' + targetId, "before", "transform", shapeoneTransform.join(' '));
                    }

                    if (settings.shapeoneTransformorigin != 'default') {
                        div.pseudoStyle('ex-section-shape-' + targetId, "before", "transform-origin", settings.shapeoneTransformorigin);
                    }
                }

                    if(settings.shapeoneRadius){
                        settings.shapeoneradiusTop = exshapeArgs['ex_shape_one_border_radius']['top'] + exshapeArgs['ex_shape_one_border_radius']['unit'];
                        settings.shapeoneradiusRight = exshapeArgs['ex_shape_one_border_radius']['right'] + exshapeArgs['ex_shape_one_border_radius']['unit'];
                        settings.shapeoneradiusBottom = exshapeArgs['ex_shape_one_border_radius']['bottom'] + exshapeArgs['ex_shape_one_border_radius']['unit'];
                        settings.shapeoneradiusLeft = exshapeArgs['ex_shape_one_border_radius']['left'] + exshapeArgs['ex_shape_one_border_radius']['unit'];



                        div.pseudoStyle('ex-section-shape-'+targetId,"before","border-top-left-radius",settings.shapeoneradiusTop);
                        div.pseudoStyle('ex-section-shape-'+targetId,"before","border-top-right-radius",settings.shapeoneradiusRight);
                        div.pseudoStyle('ex-section-shape-'+targetId,"before","border-bottom-right-radius",settings.shapeoneradiusBottom);
                        div.pseudoStyle('ex-section-shape-'+targetId,"before","border-bottom-left-radius",settings.shapeoneradiusLeft);
                    }

                    if(settings.shapeoneZindex){
                        div.pseudoStyle('ex-section-shape-'+targetId,"before","z-index",settings.shapeoneZindex);
                    }
            }

            /*-- shape-2 --*/
            if(settings.shapetwosw  == 'yes'){

                /*-- Shape-2 attribute set with specific variable --*/
                settings.shapetwoPosition =  'absolute';
                settings.shapetwoContent =  "''";
                settings.shapetwoHeight = exshapeArgs['ex_shape_two_height']['size'] + exshapeArgs['ex_shape_two_height']['unit'];
                settings.shapetwoWidth = exshapeArgs['ex_shape_two_width']['size'] + exshapeArgs['ex_shape_two_width']['unit'];
                settings.shapetwoTransform = exshapeArgs['ex_shape_two_transform'];
                settings.shapetwoRadius = exshapeArgs['ex_shape_two_border_radius'];
                settings.shapetwoZindex = exshapeArgs['ex_shape_two_z_index'];


                settings.shapetwobgColor =  exshapeArgs['ex_shape_two_bg_color'];
                settings.shapetwobgImage =  exshapeArgs['ex_shape_two_bg_image']['url'];
                settings.shapetwobgImagePosX =  exshapeArgs['ex_shape_two_bg_image_pos_x']['size'] + exshapeArgs['ex_shape_two_bg_image_pos_x']['unit'];
                settings.shapetwobgImagePosY =  exshapeArgs['ex_shape_two_bg_image_pos_y']['size'] + exshapeArgs['ex_shape_two_bg_image_pos_y']['unit'];
                settings.shapetwobgImageSize =  exshapeArgs['ex_shape_two_bg_image_size']['size'] + exshapeArgs['ex_shape_two_bg_image_size']['unit'];

                settings.shapetwobgType =  exshapeArgs['ex_shape_two_bg_type'];
                settings.shapetwogradecolorType =  exshapeArgs['ex_shape_two_grad_color_type'];
                settings.shapetwolocationOne = exshapeArgs['ex_shape_two_grad_color_1_location']['size'] + exshapeArgs['ex_shape_two_grad_color_1_location']['unit'];
                settings.shapetwolocationTwo = exshapeArgs['ex_shape_two_grad_color_2_location']['size'] + exshapeArgs['ex_shape_two_grad_color_2_location']['unit'];
                settings.shapetwogradecolorOne = exshapeArgs['ex_shape_two_grad_color_1'];
                settings.shapetwogradecolorTwo = exshapeArgs['ex_shape_two_grad_color_2'];


                settings.shapetwopositionX = exshapeArgs['ex_shape_two_position_h'];
                settings.shapetwopositionHr = exshapeArgs['ex_shape_two_offset_x']['size'] + exshapeArgs['ex_shape_two_offset_x']['unit'];
                settings.shapetwopositionY = exshapeArgs['ex_shape_two_position_v'];
                settings.shapetwopositionVr = exshapeArgs['ex_shape_two_offset_y']['size'] + exshapeArgs['ex_shape_two_offset_y']['unit'];


                settings.shapetwoStyle = exshapeArgs['ex_shape_two_style'];
                settings.shapetwopoValue1 = exshapeArgs['ex_shape_two_style_value_1'] + '%';
                settings.shapetwopoValue2 = exshapeArgs['ex_shape_two_style_value_2'] + '%';
                settings.shapetwopoValue3 = exshapeArgs['ex_shape_two_style_value_3'] + '%';
                settings.shapetwopoValue4 = exshapeArgs['ex_shape_two_style_value_4'] + '%';
                settings.shapetwopoValue5 = exshapeArgs['ex_shape_two_style_value_5'] + '%';
                settings.shapetwopoValue6 = exshapeArgs['ex_shape_two_style_value_6'] + '%';
                settings.shapetwopoValue7 = exshapeArgs['ex_shape_two_style_value_7'] + '%';
                settings.shapetwopoValue8 = exshapeArgs['ex_shape_two_style_value_8'] + '%';
                settings.shapetwopoValue9 = exshapeArgs['ex_shape_two_style_value_9'] + '%';
                settings.shapetwopoValue10 = exshapeArgs['ex_shape_two_style_value_10'] + '%';


                /*-- Shape-2 style integrate with html after:: element following added section class --*/
                var div = $('ex-section-shape-'+targetId);
                div.pseudoStyle('ex-section-shape-'+targetId,"after","content",settings.shapetwoContent);
                div.pseudoStyle('ex-section-shape-'+targetId,"after","position",settings.shapetwoPosition);
                div.pseudoStyle('ex-section-shape-'+targetId,"after","height",settings.shapetwoHeight);
                div.pseudoStyle('ex-section-shape-'+targetId,"after","width",settings.shapetwoWidth);


                if(settings.shapetwopositionX == 'left'){
                    div.pseudoStyle('ex-section-shape-'+targetId,"after",'left',settings.shapetwopositionHr);
                    div.pseudoStyle('ex-section-shape-'+targetId,"after",'right','unset');
                }

                if(settings.shapetwopositionX == 'right'){
                    div.pseudoStyle('ex-section-shape-'+targetId,"after",'right',settings.shapetwopositionHr);
                    div.pseudoStyle('ex-section-shape-'+targetId,"after",'left','unset');
                }


                if(settings.shapetwopositionY == 'top'){
                    div.pseudoStyle('ex-section-shape-'+targetId,"after",'top',settings.shapetwopositionVr);
                    div.pseudoStyle('ex-section-shape-'+targetId,"after",'bottom','unset');
                }

                if(settings.shapetwopositionY == 'bottom'){
                    div.pseudoStyle('ex-section-shape-'+targetId,"after",'bottom',settings.shapetwopositionVr);
                    div.pseudoStyle('ex-section-shape-'+targetId,"after",'top','unset');
                }

                if(settings.shapetwobgColor !='' && settings.shapetwobgType == 'classic'){
                    div.pseudoStyle('ex-section-shape-'+targetId,"after","background-color",settings.shapetwobgColor);
                }

                if(settings.shapetwobgImage !='' && settings.shapetwobgType == 'classic'){

                    div.pseudoStyle('ex-section-shape-'+targetId,"after","background-image",'url("'+settings.shapetwobgImage+'")');
                    div.pseudoStyle('ex-section-shape-'+targetId,"after","background-position", settings.shapetwobgImagePosX+ ' '+settings.shapetwobgImagePosY);
                    div.pseudoStyle('ex-section-shape-'+targetId,"after","background-repeat","no-repeat");
                    div.pseudoStyle('ex-section-shape-'+targetId,"after","background-size", settings.shapetwobgImageSize );
                }

                if(settings.shapetwobgType == 'gradient' && settings.shapetwogradecolorType == 'linear-gradient' ){
                    settings.shapetwoAngle = exshapeArgs['ex_shape_two_grad_color_lin_angle']['size'] + exshapeArgs['ex_shape_two_grad_color_lin_angle']['unit'];

                    div.pseudoStyle('ex-section-shape-'+targetId,"after","background",'linear-gradient('+settings.shapetwoAngle+',' +settings.shapetwogradecolorOne+' '+settings.shapetwolocationOne+','+settings.shapetwogradecolorTwo+' '+settings.shapetwolocationTwo+ ')');
                }

                if(settings.shapetwobgType == 'gradient' && settings.shapetwogradecolorType == 'radial-gradient' ){
                    settings.shapetwoPosition = exshapeArgs['ex_shape_two_grad_color_rad_position'];
                    div.pseudoStyle('ex-section-shape-'+targetId,"after","background",'radial-gradient(at '+settings.shapetwoPosition+',' +settings.shapetwogradecolorOne+' '+settings.shapetwolocationOne+','+settings.shapetwogradecolorTwo+' '+settings.shapetwolocationTwo+ ')');
                }

                if(settings.shapetwoStyle == 'default') {
                    div.pseudoStyle('ex-section-shape-' + targetId, "after", "clip-path", 'none');
                }

                if(settings.shapetwoStyle == 'triangle'){
                    div.pseudoStyle('ex-section-shape-'+targetId,"after","clip-path",'polygon('+settings.shapetwopoValue1+' ' +settings.shapetwopoValue2+','+settings.shapetwopoValue3+' '+settings.shapetwopoValue4+ ','+ settings.shapetwopoValue5+' '+ settings.shapetwopoValue6+')');
                }

                if(settings.shapetwoStyle == 'parallelogram'){
                    div.pseudoStyle('ex-section-shape-'+targetId,"after","clip-path",'polygon('+settings.shapetwopoValue1+' ' +settings.shapetwopoValue2+','+settings.shapetwopoValue3+' '+settings.shapetwopoValue4+ ','+ settings.shapetwopoValue5+' '+ settings.shapetwopoValue6+','+ settings.shapetwopoValue7+' '+ settings.shapetwopoValue8+')');
                }

                if(settings.shapetwoStyle == 'pentagon'){
                    div.pseudoStyle('ex-section-shape-'+targetId,"after","clip-path",'polygon('+settings.shapetwopoValue1+' ' +settings.shapetwopoValue2+','+settings.shapetwopoValue3+' '+settings.shapetwopoValue4+ ','+ settings.shapetwopoValue5+' '+ settings.shapetwopoValue6+','+ settings.shapetwopoValue7+' '+ settings.shapetwopoValue8+','+ settings.shapetwopoValue9+' '+ settings.shapetwopoValue10+')');
                }

                if(settings.shapetwoTransform == 'yes') {
                    var shapetwoTransform = [];

                    settings.shapetwoTscale = exshapeArgs['ex_shape_two_transform_scale'];
                    settings.shapetwoTrotate = exshapeArgs['ex_shape_two_transform_rotate']['size'] + exshapeArgs['ex_shape_two_transform_rotate']['unit'];
                    settings.shapetwoTtranslatex = exshapeArgs['ex_shape_two_transform_translate_x']['size'] + exshapeArgs['ex_shape_two_transform_translate_x']['unit'];
                    settings.shapetwoTtranslatey = exshapeArgs['ex_shape_two_transform_translate_y']['size'] + exshapeArgs['ex_shape_two_transform_translate_y']['unit'];
                    settings.shapetwoTskewx = exshapeArgs['ex_shape_two_transform_skew_x']['size'] + exshapeArgs['ex_shape_two_transform_skew_x']['unit'];
                    settings.shapetwoTskewy = exshapeArgs['ex_shape_two_transform_skew_y']['size'] + exshapeArgs['ex_shape_two_transform_skew_y']['unit'];
                    settings.shapetwoTransformorigin = exshapeArgs['ex_shape_two_transform_origin'];

                    if (settings.shapetwoTscale != '1') {
                        shapetwoTransform[0] = 'scale(' + settings.shapetwoTscale + ')';
                    }

                    if (exshapeArgs['ex_shape_two_transform_rotate']['size'] != '0') {
                        shapetwoTransform[1] = 'rotate(' + settings.shapetwoTrotate + ')';
                    }

                    if (exshapeArgs['ex_shape_two_transform_translate_x']['size'] != '0' || exshapeArgs['ex_shape_two_transform_translate_y']['size'] != '0') {
                        shapetwoTransform[2] = 'translate(' + settings.shapetwoTtranslatex + ',' + settings.shapetwoTtranslatey + ')';
                    }

                    if (exshapeArgs['ex_shape_two_transform_skew_x']['size'] != '0' || exshapeArgs['ex_shape_two_transform_skew_y']['size'] != '0') {
                        shapetwoTransform[3] = 'skew(' + settings.shapetwoTskewx + ',' + settings.shapetwoTskewy + ')';
                    }

                    if (shapetwoTransform.length > '0') {
                        div.pseudoStyle('ex-section-shape-' + targetId, "after", "transform", shapetwoTransform.join(' '));
                    }

                    if (settings.shapetwoTransformorigin != 'default') {
                        div.pseudoStyle('ex-section-shape-' + targetId, "after", "transform-origin", settings.shapetwoTransformorigin);
                    }
                }


                if(settings.shapetwoRadius){
                    settings.shapetworadiusTop = exshapeArgs['ex_shape_two_border_radius']['top'] + exshapeArgs['ex_shape_two_border_radius']['unit'];
                    settings.shapetworadiusRight = exshapeArgs['ex_shape_two_border_radius']['right'] + exshapeArgs['ex_shape_two_border_radius']['unit'];
                    settings.shapetworadiusBottom = exshapeArgs['ex_shape_two_border_radius']['bottom'] + exshapeArgs['ex_shape_two_border_radius']['unit'];
                    settings.shapetworadiusLeft = exshapeArgs['ex_shape_two_border_radius']['left'] + exshapeArgs['ex_shape_two_border_radius']['unit'];



                    div.pseudoStyle('ex-section-shape-'+targetId,"after","border-top-left-radius",settings.shapetworadiusTop);
                    div.pseudoStyle('ex-section-shape-'+targetId,"after","border-top-right-radius",settings.shapetworadiusRight);
                    div.pseudoStyle('ex-section-shape-'+targetId,"after","border-bottom-right-radius",settings.shapetworadiusBottom);
                    div.pseudoStyle('ex-section-shape-'+targetId,"after","border-bottom-left-radius",settings.shapetworadiusLeft);
                }

                if(settings.shapetwoZindex){
                    div.pseudoStyle('ex-section-shape-'+targetId,"after","z-index",settings.shapetwoZindex);
                }


            }


            /*-- shape-1 remove when the shape-1 switch is getting off  --*/
            if (settings.shapeonesw  === '' || settings.shapeonesw  === 'no' ){
                var remove_div = $('ex-section-shape-'+targetId);
                remove_div.pseudoStyle('ex-section-shape-'+targetId,"before","content","none");
            }


            /*-- shape-2 remove when the shape-2 switch is getting off  --*/
            if (settings.shapetwosw  === '' || settings.shapetwosw  === 'no' ){
                var remove_div = $('ex-section-shape-'+targetId);
                remove_div.pseudoStyle('ex-section-shape-'+targetId,"after","content","none");
            }

            /*-- Remove class if both shape switch is inactive --*/
            if (settings.shapeonesw  === '' && settings.shapetwosw  === '') {

                $scope.hasClass('ex-section-shape-'+targetId)
                {
                    $scope.removeClass('ex-section-shape-' + targetId);
                }
            }
        }

    };

    /*-- Elementor js hook for live preview --*/
    jQuery(window).on('elementor/frontend/init', function () {
        elementorFrontend.hooks.addAction( 'frontend/element_ready/section', exelShape );
    });

})(jQuery);
