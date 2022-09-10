/**
 * PIXBUILDER
 * By PixFort
 * Copyright 2017
 * www.pixfort.com
 */

$( window ).load(function() {		

	// add the animation to the modal
	$( ".modal" ).each(function(index) {
        var self = $(this);
		$(this).on('show.bs.modal', function (e) {
			$(this).addClass('in');
        	$(this).find('.modal-dialog').velocity('transition.fadeIn');
       		$(this).show();	    	      
		}); 
		$(this).on('hide.bs.modal', function (e) {
			$(this).find('.modal-dialog').velocity('transition.fadeOut');
			$(this).removeClass('in');
			var self = this;
			$(this).delay(500).queue(function() {
		     	$(self).hide();	    	
				$(this).dequeue();
		  	});
			$('body').removeClass('modal-open');
            $('iframe').each(function(){
                var leg=$(this).attr("src");
                $(this).attr("src",leg);
            });
			e.stopPropagation();
	    	e.preventDefault();
	    	return false;
		});
        if(self.hasClass('pix_popup')&&self.attr('data-wait')&&self.attr('data-wait')!=''){
            var wait_time = self.attr('data-wait')*1000;
            setTimeout(
                function(){
                    self.modal('show');
                }, wait_time);
        }
	});



	$("input, textarea, select").keyup(function() { 
		$(this).css('border-color',''); 
        $('.alert').slideUp();
    });



    $('.pix-countdown').each(function(){
        var self = $(this);
        var endDate = $(this).attr('data-date');
        self.countdown({
            date: endDate,
            render: function(data) {
                $.each(data, function(key, value) {
                    self.find('.pix-count-'+key).html(value);
                });
            },
            onEnd: function(){
                if($(this.el).attr('data-redirect')){
                    window.location.href = $(this.el).attr('data-redirect');
                }
                if($(this.el).attr('data-popup')){
                    $($(this.el).attr('data-popup')).modal('show');
                }
            }
        });
    });


	
	var width = $(window).width();
	if(($('.pix_scroll_menu').length==0)&&(width>768)){
		pix_scroll_menu();
	}
	
	pix_mobile_bg();
	
	

	$(window).on('resize', function(){
		if($(this).width() != width){
			width = $(this).width();
       		if(width>768){
       			if($('.pix_scroll_menu').length==0){
       				pix_scroll_menu();
       			}
       		}else{
       			if($('.pix_scroll_header').length>0){
					$('.pix_scroll_menu').remove();
				}
       		}
       		$('.pix_scroll_menu, .pix_nav_menu').find(".dropdown, .btn-group").removeClass('hover_open');
       		$('.pix_scroll_menu, .pix_nav_menu').find(".dropdown, .btn-group").removeClass('open');
		}
	});

	$(document).on({
        mouseenter: function () {
        	if(width>768){
	        	$('.pix_scroll_menu').find(".dropdown, .btn-group").removeClass('hover_open');
	            var dropdownMenu = $(this).children(".dropdown-menu");
	            if(dropdownMenu.is(":visible")){
	                dropdownMenu.parent().toggleClass("hover_open");
	            }
        	}
        },
        mouseleave: function () {
            if(width>768){
	            var dropdownMenu = $(this).children(".dropdown-menu");
	            if(dropdownMenu.is(":visible")){
	                dropdownMenu.parent().toggleClass("hover_open");
	            }
	            $('.pix_scroll_menu').find(".dropdown, .btn-group").removeClass('hover_open');
	        }
        }
    }, ".dropdown, .btn-group");

	$(window).scroll(function() {
		if (jQuery(window).scrollTop() >= 400) {
			$('.pix_scroll_menu').css({
				'top' : '0px',
				'visibility': 'visible',
			});
			$('.pix_scroll_menu').find(".dropdown, .btn-group").children(".dropdown-menu").css({
				'display': 'block'
			});
			$('.pix_scroll_menu').find(".dropdown, .btn-group").removeClass('open');
		} else {
			$('.pix_scroll_menu').css({
				'top' : '-80px',
				'visibility': 'hidden'
			});
			$('.pix_scroll_menu').find(".dropdown, .btn-group").removeClass('hover_open');
			$('.pix_scroll_menu').find(".dropdown, .btn-group").children(".dropdown-menu").css({
				'display': 'none'
			});
			$('.pix_nav_menu').find(".dropdown, .btn-group").removeClass('open');
		}	
	});


    if($('body').find('.pix_nav_menu')){
        var header_sec = $('body').find('.pix_section.pix_nav_menu');
        if(header_sec.hasClass('pix-over-header')||header_sec.hasClass('pix-fixed-top')){
            var sec_index = header_sec.index();
            var header_h = header_sec.outerHeight();
            sec_index++;
            // $('[data-pix-offset]').each(function(){
            //     var el_padding = $(this).css('padding-top').replace("px", "");
            //     var el_offset = $(this).attr('data-pix-offset');
            //     var new_padding = el_padding - el_offset;
            //     $(this).css('padding-top', new_padding);
            //     $(this).removeAttr('data-pix-offset');
            // });
            var sec = $('body > .pix_section').eq(sec_index);
            if(sec.length){
                if(!sec.attr('data-pix-offset')){
                    sec.attr('data-pix-offset', header_h);
                    var sec_padding = sec.css('padding-top').replace("px", "");
                    sec_padding=Number(sec_padding)+Number(header_h);
                    //sec.css('padding-top', sec_padding);
                }
            }
        }
    }



});


// ===========================================================
// Functions
// ===========================================================

function pix_scroll_menu(){
    if($('.pix_scroll_header').length>0){
        var logo_img = 'images/showcase/logo-thin.png';
        var logo_text = false;
        if($('.pix-logo-img').length>0){
            logo_img = $('.pix-logo-img')[0].src;
            pix_fix_heights();
        }else{
            logo_text = $('.logo-img.logo-img-a').html();
        }
        var scroll_bg = 'background: #fff;';
        if($('.pix_scroll_header').attr('data-scroll-bg')){
            scroll_bg = 'background: '+$('.pix_scroll_header').attr('data-scroll-bg')+';';
        }
        var nav_menu = '';
        if($('#pix-header-nav').length>0){
            nav_menu = $('<div>').append($('#pix-header-nav').clone().attr('id', 'pix-scroll-nav').addClass('navbar-right').addClass('pix-adjust-scroll').css('margin-top', 0)).html();
        }
        var header_btn = false;
        var header_btn_div = "";
        if($('#pix-header-btn').length>0){
            header_btn_div = '<div class="col-md-2"><div class="pix-content pix-adjust-scroll text-right">';
            var btns = $('#pix-header-btn').clone();
            btns.find('a').css('margin-top',0);
            header_btn_div += btns.html();
            header_btn_div += '</div></div>';
            header_btn=true;
        }

        var scroll_col = "col-md-12";
        if(header_btn){
            scroll_col = "col-md-10";
        }

        var sh2 = '<div class="pix_scroll_menu pix_menu_hidden" style="padding-top: 10px; padding-bottom: 10px; '+scroll_bg+'">'+
            '<div class="container">'+
            '<div class="row">'+
            '<div class="pix-inner-col '+scroll_col+'">'+
            '<div class="pix-content">'+
            '<nav class="navbar navbar-default pix-no-margin-bottom pix-navbar-default">'+
            '<div class="container-fluid">'+
            '<div class="navbar-header">'+
            '<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">'+
            '<span class="sr-only">Toggle navigation</span>'+
            '<span class="icon-bar"></span>'+
            '<span class="icon-bar"></span>'+
            '<span class="icon-bar"></span>'+
            '</button>';
        if(!logo_text){
            sh2 += '<a class="navbar-brand logo-img pix-adjust-scroll" href="#"><img src="'+logo_img+'" alt="" class="img-responsive scroll_logo_img"></a>';
        }else{
            sh2 += '<a class="navbar-brand logo-img logo-text pix-adjust-scroll" href="#">'+logo_text+'</a>';
        }
        sh2 += '</div>'+
            '<div class="collapse navbar-collapse">'+
            nav_menu+
            '</div>'+
            '</div>'+
            '</nav>'+
            '</div>'+
            '</div>';
        if(header_btn){
            sh2 += header_btn_div;
        }
        sh2+='</div>'+
            '</div>'+
            '</div>'+
            '</div>';
        $('body').append(sh2);
        pix_fix_scroll_heights();
    }
}

function pix_mobile_bg(){
	$('.pix_nav_menu').each(function(){
		$(this).attr('data-main-bg',$(this).css('background'));
	});
	var width = $(window).width();
	if(width<768){
		$('.pix_nav_menu').each(function(){
	        if($(this).attr('data-scroll-bg')){
	        	var bg = $(this).attr('data-scroll-bg');

	        	$(this).css('background',bg);
	        }
		});
	}
	$(window).on('resize', function(){
		if($(this).width() != width){
			width = $(this).width();
			if(width<768){
				$('.pix_nav_menu').each(function(){
			        if($(this).attr('data-scroll-bg')){
			        	var bg = $(this).attr('data-scroll-bg');
			        	$(this).css('background-color',bg);
			        }
				});
			}else{
				$('.pix_nav_menu').each(function(){
					$(this).css('background-color',$(this).attr('data-main-bg'));
				});
			}
		}
	});
}
function pix_fix_heights(){
    $('.pix_nav_menu').each(function(){
        var max_h = 0;
        $(this).find('.pix-adjust-height').each(function(item){
            if($(this).outerHeight()>max_h){max_h=$(this).outerHeight();}
        });
        if(max_h>0){
            $(this).find('.pix-adjust-height').each(function(item){
                var item_h = +$(this).outerHeight();
                if(item_h<max_h){
                    var diff = max_h - item_h;
                    diff /=2;
                    $(this).css('margin-top', diff);
                }
            });
        }
	});
}
function pix_fix_scroll_heights(){
	var max_h = 0;
	$('.pix-adjust-scroll').each(function(item){
		if($(this).outerHeight()>max_h){max_h=$(this).outerHeight();}
	});
	if(max_h>0){
		var logo_h = $('.logo-img-a').outerHeight();
		$('.pix-adjust-scroll').each(function(item){
			var item_h = $(this).outerHeight();
			if(item_h<max_h){
				var diff = max_h - item_h;
				diff /=2;
				$(this).css('margin-top', diff);
			}
		});
	}
}


function pix_disable_nav_click(){
	$('.pix_scroll_menu, .pix_nav_menu').find(".dropdown, .btn-group").on('click', function(e){
		if($(window).width()>768){
			e.stopPropagation();
	    	e.preventDefault();
	    	return false;
    	}
	});
}

function pix_replace_chars(string){
	return string.replace(/[^a-zA-Z0-9]/g,'_');
}