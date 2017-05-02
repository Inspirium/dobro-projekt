/**
 * Gallery
 */
var jGallery = {

	debug: false,
    defaults : {},
    setup: {},

    _tpl : {},

    tooltipEnable: false,

    variant: [1180, 1080, 980, 880, 780, 680, 580, 480, 380, 280, 180, 80],
 
    pswp : null,
    pswpElement : null,
    pswpOptions : {

        barsSize: {top:0, bottom:0},
        escKey : false,
        closeOnScroll : false,
        pinchToClose: false,
        closeOnVerticalDrag: false,
        verticalDragRange: 2,

        // Buttons/elements
        mainClass: '',
        closeEl: false,
        captionEl: false,
        fullscreenEl: false,
        zoomEl: false,
        shareEl: false,
        counterEl: false,
        arrowEl: true,
        preloaderEl: true,

        arrowKeys: false,

        // Tap on sliding area should close gallery
        tapToClose: false,

        // Tap should toggle visibility of controls
        tapToToggleControls: true,

        // Mouse click on image should close the gallery,
        // only when image is smaller than size of the viewport
        clickToCloseNonZoomable: false,

        showHideOpacity: true,

        showAnimationDuration: 500,
        hideAnimationDuration: 200,

        modal: true,
        history: true,
        loop: true,

        clickedRect: false,
        useImageSizes: false,
        defaultImageSize: 1180,

        //set to disable zoom
        maxSpreadZoom: 1,
        allowUserZoom: false,
        getDoubleTapZoom: function (isMouseClick, item) {
            return item.initialZoomLevel;
        }

    },

    init: function(setup) {
        
        var self = this;

        this.setup = $.extend( this.defaults, setup);
        //this._tpl = _.template($("#pswp__tooltip_tpl").html());
        this.pswpElement = document.querySelectorAll('.pswp')[0];


        this.bindEvents();

        this.setContainerHeight();

        $( window ).resize(function() {
            self.setContainerHeight()            
        });
    },

    setContainerHeight: function() {

        var self = this;

        var wW = $(window).width();
        var wH = $(window).height();
        var toolH = $(this.pswpElement).find('.pswp__tooltip').height();

        if ( wW < 1023 ) 
        {
            $(this.pswpElement).find('.pswp__container').height(wH-toolH);
        } 
        else 
        {
            $(this.pswpElement).find('.pswp__container').removeAttr('height');
        }

    },

    bindEvents: function() {

        var self = this;


        $("article.galleryCall").on("click", function(e){
            e.preventDefault();
            self.domPhotoswipe(e, this);
        });


        $(document).on("click touchstart", ".pswp__tooltip .md-close", function(e){
            e.preventDefault();

            setTimeout(function(){
                self.pswp.close();
            });
        });

        $(document).on("click touchstart", ".pswp__next-prev .next", function(e){
            e.preventDefault();
            self.next();
        });

        $(document).on("click touchstart", ".pswp__next-prev .back", function(e){
            e.preventDefault();
            self.back();
        });


    
    },

    next : function() {
        this.pswp.next();
    },

    back : function() {
        this.pswp.prev();
    },

    tooltip: function(item) {
        $(".pswp__tooltip").html(item.content_html);
    },

    domPhotoswipe: function(evt, clicedEl) {

    	// main image
    	var pid = $(clicedEl).find(".slideshow > div > img").attr("data-image-id");

    	// guid
    	var ident = $(clicedEl).find("div.modal").attr("id");
    	var resarr = /.*-(.[0-9]*)/g.exec(ident);
    	var guid = resarr[1] !== undefined ? resarr[1] : '';


  		// items
        var items = this.domCollection($(clicedEl).find("div.modal .item"));
       
        this.photoswipe(items, {
            pid: pid, 
            galleryUID: guid,
            useImageSizes: true,
            clickedRect: $(evt.target).get(0).getBoundingClientRect() 
        });

    },

    domCollection: function(slides) {
        
        var self = this;

        var items = [];
        slides.each(function(index, item){

    
            var img = $(item).find("img");
            var pid = $(img).attr("data-image-id")
            var template_url = $(img).attr("data-template-url");
            var image_ratio = $(img).attr("data-image-ratio");
            var modal_content = $(item).find(".modal_content").html();


            var alternates = false;
            var resarr = /.*\/alternates\/(.*)_\{size\}/g.exec(template_url);
            if(resarr[1] !== undefined)
            {
            	alternates = resarr[1];
            }

            items.push({
               	alternates: alternates,
                pid: pid,
                template_url: template_url,
                content_html: modal_content,
                image_ratio: image_ratio,
          		w: 0,
          		h: 0
            });

        });

        return items;
    },

    photoswipe : function(items, pswpOptions) {


        var self = this;
    


        pswpOptions.index = 0;
        for(var i=0; i<items.length; i++) {

            if( pswpOptions.pid!==undefined && pswpOptions.pid==items[i].slug ) {
                pswpOptions.index = i;
            }
        }

        if(pswpOptions.clickedRect)
        {        
            pswpOptions.getThumbBoundsFn = function() {
                var pageYScroll = window.pageYOffset || document.documentElement.scrollTop;

                return {
                    x: pswpOptions.clickedRect.left, 
                    y: pswpOptions.clickedRect.top + pageYScroll, 
                    w: pswpOptions.clickedRect.width
                };
            };
        }

        var options = $.extend({}, self.pswpOptions, pswpOptions);
        self.pswp = new PhotoSwipe( self.pswpElement, PhotoSwipeUI_Default, items, options);
        self.pswp.tooltipSize = {};
        self.pswp.tooltipSize.w = $(window).width() / (100/$('.pswp__tooltip').width());
        self.pswp.tooltipSize.h = self.pswp.viewportSize.y;

        var imageSize = options.defaultImageSize;
        if(options.useImageSizes)
        {        
            var realViewportWidth,
                realViewportHeight,
                firstResize = true,
                imageSrcWillChange = false;

            self.pswp.listen('beforeResize', function() {
 
                // self.pswp.viewportSize.x - width of PhotoSwipe viewport
                // self.pswp.viewportSize.y - height of PhotoSwipe viewport
                // window.devicePixelRatio - ratio between physical pixels and device independent pixels (Number)
                //                          1 (regular display), 2 (@2x, retina) ...
				         	
                self.pswp.viewportSize.x = $(".pswp .pswp__item").last().width();
                self.pswp.viewportSize.y = $(".pswp .pswp__item").last().height();

                
                if(self.pswp.currItem.alternates === "LANDSCAPE")
                {

                	realViewportWidth = self.pswp.viewportSize.x; //window.devicePixelRatio;
	                
	                if(realViewportWidth <= 480) 
	                {
	                    imageSrcWillChange = true;
	                    imageSize =  480;
	                } 
	                else if(realViewportWidth <= 980) 
	                {
	                    imageSrcWillChange = true;
	                    imageSize = 980;
	                }  
	                else if(realViewportWidth <= 1024) 
	                {
	                    imageSrcWillChange = true;
	                    imageSize = 1080;
	                } 
	                else
	                {
	                    imageSrcWillChange = true;
	                    imageSize =  1180;
	                }

                }
                else if(self.pswp.currItem.alternates === "PORTRAIT")
                {
                	realViewportHeight = self.pswp.viewportSize.y; // window.devicePixelRatio;

                	var rtio = 0.99;
                	if(self.pswp.currItem.rtio !== undefined)
                	{  
                		rtio = self.pswp.currItem.rtio;
                	}

	                imageSize = self.variant[0];
	                for(var i = 0; i<self.variant.length; i++)
	                {
	                	if( realViewportHeight >= self.variant[i] / self.pswp.currItem.rtio )
	                	{
	                		imageSrcWillChange = true;
	                		imageSize = self.variant[i];
	                		break;
	                	}
	                } 
                }
                

      
                if(imageSrcWillChange && !firstResize) {
                    self.pswp.invalidateCurrItems();
                }

                if(firstResize) {
                    firstResize = false;
                }

                imageSrcWillChange = false;
                
                
            });
   
        }


        self.pswp.listen('gettingData', function(index, item) {


			if (item.w < 1 || item.h < 1) {
				
				var img = new Image(); 
				img.onload = function() { // will get size after load
					
					var multpl = 1;
					item.rtio = this.width / this.height;
					item.w = this.width; //self.pswp.viewportSize.x; // set image width
					item.h = this.height; //self.pswp.viewportSize.y; // set image height
					

					if(item.alternates === "LANDSCAPE")
					{
						item.w = self.pswp.viewportSize.x;
						multpl = self.pswp.viewportSize.x / this.width;
						item.h = this.height * multpl;
					}
					else if(item.alternates === "PORTRAIT")
					{
						item.h = self.pswp.viewportSize.y;
						multpl = self.pswp.viewportSize.y / this.height;
						item.w = this.width * multpl;
					}
					else if(item.alternates === "SQUARE")
					{
						if(self.pswp.viewportSize.x>self.pswp.viewportSize.y)
						{
							item.h = item.w = self.pswp.viewportSize.y;
						}
						else
						{
							item.h = item.w = self.pswp.viewportSize.x;
						}
					}	

					self.pswp.invalidateCurrItems(); // reinit Items
					self.pswp.updateSize(true); // reinit Items

				};
				
			}
    		item.src = self.wfutil(item.template_url, imageSize);


        	if (item.w < 1 || item.h < 1) {
        		img.src = item.src;
        	}

            
        });

        self.pswp.listen('afterURLChange', function() {
            var index = self.pswp.getCurrentIndex();
            self.tooltip(items[index]);
        });
        
        self.pswp.listen('afterChange', function() { 
            
            setTimeout(function(){          
                var index = self.pswp.getCurrentIndex();
                self.tooltip(items[index]);
                
                if( self.setup.afterChange !== undefined && typeof self.setup.afterChange === "function")
                {
                    self.setup.afterChange(items[index]);
                }
            });

        });

        self.pswp.listen('close', function() { 
            //disableScroll.off();
        }); 

        self.pswp.init(); 

    },


    wfutil: function(str, size){
        return  str.replace(/\{size\}/i, size);
    }

};


$(document).ready(function() {

    jGallery.init({
        afterChange: function(item){
            if(ga !== undefined) ga('send', 'event', 'fotogalerija', 'click', item.src, 1);
        }
    });

});   
