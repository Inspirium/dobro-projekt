var jDfp = {

    init: function(){
        
        googletag.cmd.push(function () {

            // add class 'empty' to ad div if the inserted iframe document is, in fact, empty
            googletag.on("gpt-slot_rendered", function(e,level,message,service,slot,reference){
                var slotId = slot.getSlotId(),
                    $slot = $("#"+slotId.getDomId());

                if(slotId.getName() === "/11425286/jl_nas_wp")
                {
                    $("body").addClass("has_wp");
                }

                if($slot.find("iframe:not([id*=hidden])")
                    .map(function () { return this.contentWindow.document; })
                    .find("body")
                    .children().length === 0
                ){
                    
                    $slot.addClass("empty");
                }
            });
        });

    }

};


var jSocial = {
    
    defaults: {
        centerBrowser:0, // center window over browser window? {1 (YES) or 0 (NO)}. overrides top and left
        centerScreen:0, // center window over entire screen? {1 (YES) or 0 (NO)}. overrides top and left
        height:500, // sets the height in pixels of the window.
        left:0, // left position when the window appears.
        location:0, // determines whether the address bar is displayed {1 (YES) or 0 (NO)}.
        menubar:0, // determines whether the menu bar is displayed {1 (YES) or 0 (NO)}.
        resizable:0, // whether the window can be resized {1 (YES) or 0 (NO)}. Can also be overloaded using resizable.
        scrollbars:0, // determines whether scrollbars appear on the window {1 (YES) or 0 (NO)}.
        status:0, // whether a status line appears at the bottom of the window {1 (YES) or 0 (NO)}.
        width:500, // sets the width in pixels of the window.
        windowName:null, // name of window set from the name attribute of the element that invokes the click
        windowURL:null, // url used for the popup
        top:0, // top position when the window appears.
        toolbar:0 // determines whether a toolbar (includes the forward and back buttons) is displayed {1 (YES) or 0 (NO)}.
    },

    init: function(){
        
        var self = this;

        $(document).on("click", ".popupsocial", function(e){
            e.preventDefault();
            self.popup({windowURL: $(this).attr("href")});
        });
    },

    popup: function(options) {

        settings = $.extend({}, this.defaults, options || {});
        
        var windowFeatures =    'height=' + settings.height +
                                ',width=' + settings.width +
                                ',toolbar=' + settings.toolbar +
                                ',scrollbars=' + settings.scrollbars +
                                ',status=' + settings.status + 
                                ',resizable=' + settings.resizable +
                                ',location=' + settings.location +
                                ',menuBar=' + settings.menubar;

        settings.windowName = settings.windowName;
        settings.windowURL = settings.windowURL;
        var centeredY,centeredX;
    
        if(settings.centerBrowser){
                
            if ($.browser.msie) {//hacked together for IE browsers
                centeredY = (window.screenTop - 120) + ((((document.documentElement.clientHeight + 120)/2) - (settings.height/2)));
                centeredX = window.screenLeft + ((((document.body.offsetWidth + 20)/2) - (settings.width/2)));
            }else{
                centeredY = window.screenY + (((window.outerHeight/2) - (settings.height/2)));
                centeredX = window.screenX + (((window.outerWidth/2) - (settings.width/2)));
            }
            window.open(settings.windowURL, settings.windowName, windowFeatures+',left=' + centeredX +',top=' + centeredY).focus();
        }else if(settings.centerScreen){
            centeredY = (screen.height - settings.height)/2;
            centeredX = (screen.width - settings.width)/2;
            window.open(settings.windowURL, settings.windowName, windowFeatures+',left=' + centeredX +',top=' + centeredY).focus();
        }else{
            window.open(settings.windowURL, settings.windowName, windowFeatures+',left=' + settings.left +',top=' + settings.top).focus();  
        }
    }
};


/*-----------------------------------------------------------------------------------*/
/* Fixed navigation
/*-----------------------------------------------------------------------------------*/
var fixedNavigation = {

    lastPos: null,
    trigger: 112,
    resizeTimeout: null,
    header: '.mainHead',
    branding: '#siteHead',
    nav: '.navbar.main_nav',
    navLvl2: '.subLevelNavbar',
    navheight: null,

    init: function() {

        var self = this;
        
        self.setup();

        self.bindEvents();
        self.observeDOM('body > .container');

    },

    setup: function() {

        var self = this;

        self.lastPos = $(window).scrollTop();
        self.navheight = $(self.nav).outerHeight();

        if ( $(self.header).hasClass('brandedHead') ) {
            
            self.offset = $(self.branding).offset().top;
            self.trigger = ( self.navheight - $(self.navLvl2).outerHeight() ) + self.offset;

        } else {
            
            //self.offset = $(self.branding).length ? $(self.branding).offset().top : 0;
            self.offset = $(self.branding).offset().top;
            self.trigger = $(self.branding).outerHeight() + self.offset;

        }

    },

    bindEvents: function() {

        var self = this;

        //$(window).on('scroll.fixedNavigation', function(event){
        $(window).scroll(function() {  

            self.scrollMe();

        });

        // Resze lisiner             
        var onResize = function () {
            if(self.resizeTimeout){
                clearTimeout(self.resizeTimeout);
            }
            self.resizeTimeout = setTimeout(function(){
                
                self.resizeMe();

            }, 200);
        };
        
        $(window).resize(onResize);
        self.resizeMe();

    },

    addheight: function() {

        var self = this;

        $('.mainHead').css('padding-bottom',(self.navheight-1));

    },

    recalcNavheight: function() {

        var self = this;

        if ( self.navheight !== $(self.nav).outerHeight() ) {

            self.setup();
            self.addheight();

        }

    },

    resizeMe: function() {

        var self = this;

        if ( $(window).width() > 767 ) 
        {
           //desktop
           self.addheight();
        }
        else
        {
            //mobile
            $(self.header).removeAttr('style');
        }

    },

    scrollMe: function() {

        var self = this;

        if ( $(self.header).hasClass('brandedHead') ) {

            self.scrollBrandedAction();

        } else {

            self.scrollAction();

        }

        self.lastPos = $(window).scrollTop();

    },

    scrollBrandedAction: function() {

        var self = this;
        var ww = $(window).width();
        var subLvlPoz = ww > 767 ? $(self.navLvl2).position().top : 0;

        if( $(window).scrollTop() > self.lastPos ) {
            
            //down
            if( $(window).scrollTop() > self.trigger ) {

                $('body').removeClass('up').addClass('scrolled down');

                $(self.nav).css('top',-subLvlPoz);

                if ( $(self.nav).hasClass('desktopOpen') ) {

                    desktopNavigation.close();
                    
                }

            } else {

                $('body').removeClass('scrolled down up');
                
                $(self.nav).css('top','0');

            }

        } else if( $(window).scrollTop() < self.lastPos ) {
            
            //up
            if( $(window).scrollTop() > self.trigger ) {

                $('body').removeClass('down').addClass('scrolled up');

                $(self.nav).css('top',-subLvlPoz);

            } else {

                $('body').removeClass('scrolled down up');

                $(self.nav).css('top','0');
                
            }

        }

        if( $(window).scrollTop() > ( self.trigger + self.navheight ) ) {

            $('body').removeClass('lock').addClass('unlock');
           
        } else {

            $('body').removeClass('unlock').addClass('lock');

        }

    },

    scrollAction: function() {

        var self = this;

        if( $(window).scrollTop() > self.lastPos ) {
            
            //down
            if( $(window).scrollTop() > self.trigger ) {

                $('body').removeClass('up').addClass('scrolled down');

            } else {

                $('body').removeClass('scrolled down up');

            }

        } else if( $(window).scrollTop() < self.lastPos ) {
            
            //up
            if( $(window).scrollTop() > self.trigger ) {

                $('body').removeClass('down').addClass('scrolled up');

            } else {

                $('body').removeClass('scrolled down up');
                
            }

        }

        if( $(window).scrollTop() > ( self.trigger + self.navheight ) ) {

            $('body').removeClass('lock').addClass('unlock');
           
        } else {

            $('body').removeClass('unlock').addClass('lock');

        }

    },

    observeDOM: function(selector) {

        var self = this;

        // select the target node
        var target = document.querySelector(selector);
         
        // create an observer instance
        var observer = new MutationObserver(function(mutations) {
            mutations.forEach(function(mutation) {
                
                //console.log(mutation.type);
                self.setup();
                $('html, body').animate({scrollTop:(self.lastPos+1)});

            });    
        });
         
        // configuration of the observer:
        var config = { attributes: true, childList: true, characterData: true };
         
        // pass in the target node, as well as the observer options
        observer.observe(target, config);
         
        // later, you can stop observing
        //observer.disconnect();


    },

    unbindEvents: function() {

        $(window).off('scroll.fixedNavigation');

    }
};

var mobileNavigation = {

    header: '.mainHead',
    branding: '#siteHead',
    button: 'nav.main_nav > .navbar-header > .navbar-toggle',
    currentSection: '#navbar-collapse-1',
    navigation: '.wrap-megadropdown-menu',
    navLvl2: '.subLevelNavbar',
    resizeTimeout: null,
    brandedCheck: false,

    init: function() {

        var self = this;
        
        self.checkLocation();       
        self.bindEvents();
       
        // Resze lisiner             
        var onResize = function () {
            if(self.resizeTimeout){
                clearTimeout(self.resizeTimeout);
            }
            self.resizeTimeout = setTimeout(function(){
                
                $(self.navigation).height(self.avalableSpace());
                self.cleanup();
                self.checkLocation();

            }, 200);
        };
        
        $(window).resize(onResize);

    },

    bindEvents: function() {

        var self = this;
 
        $(this.button).on('click', function(e) {

            e.stopPropagation(); //diable bubling odnosno makuli smo boostrap event
            //e.stopImmediatePropagation();
            //e.preventDefault();

            if ( $(this).hasClass('mobileOpen') ) 
            {
                self.close();
            }
            else
            {
                self.open();
            }


        });

    },

    open: function() {

        var self = this;

        $(self.button).addClass('mobileOpen');
        $(self.currentSection).addClass('mobileOpen');
        $(self.navigation).addClass('mobileOpen');
        $('body').addClass('mobileOpen');
        
        $(self.navigation).height(self.avalableSpace());

        if ( self.brandedCheck === true ) {
            self.cloneBranded();
        }

    },

    close: function() {

        var self = this;

        $(self.button).removeClass('mobileOpen');
        $(self.currentSection).removeClass('mobileOpen');
        $(self.navigation).removeClass('mobileOpen');
        $('body').removeClass('mobileOpen');

        $(self.navigation).height('auto');

        if ( self.brandedCheck === true ) {
            self.removeBranded();
        }

    },

    checkLocation: function() {

        var self = this;

        self.brandedCheck = $(this.header).hasClass('brandedHead') ? true : false;

    },

    cloneBranded: function() {

        var self = this;

        var trig = "<a class='rest' href='#'>Sve rubrike</a>"
        var html = $("<div />").append($(".subLevelNavbar .sub.nav.navbar-nav").clone()).html();
        var html = "<div class='subLevelNavbar'>"+html+trig+"</div>";

        $('.dropdown-menu.megadropdown-menu').prepend(html);

        $('a.rest').bind('click', function(e) {

            e.preventDefault();

            if ( $(this).hasClass('mobileSubOpen') ) 
            {
                $(this).removeClass('mobileSubOpen');  
                $(self.navigation).find('.sections').hide();
                $(self.navigation).find('.magazin').hide();
                $(self.navigation).height(self.avalableSpace()); 
            }
            else
            {
                $(this).addClass('mobileSubOpen');
                $(self.navigation).find('.sections').show();
                $(self.navigation).find('.magazin').show();
                $(self.navigation).height(self.avalableSpace());
            }
        });

    },  

    removeBranded: function() {

        var self = this;

        $('.dropdown-menu.megadropdown-menu .subLevelNavbar').remove();

        $('a.rest').unbind('click');

        $(self.navigation).find('.sections').removeAttr('style');
        $(self.navigation).find('.magazin').removeAttr('style');

    },   

    avalableSpace: function() {

        var head = $('#siteHead').outerHeight(),
            current = $(this.currentSection).outerHeight(),
            wh = $(window).height(),
            avsCalc = wh - (head + current );

        return avsCalc;

    },

    cleanup: function() {

        var self = this;

        if ( $(window).width() > 767 ) 
        {
            self.close();
            self.removeBranded();
        }

    }

};

var desktopNavigation = {

    button: '.megadropdown',
    navigation: 'nav.main_nav',
    resizeTimeout: null,
    breadcrumb: '.breadcrumb',

    init: function() {

        var self = this;

        self.bindEvents();

        // Resze lisiner             
        var onResize = function () {
            if(self.resizeTimeout){
                clearTimeout(self.resizeTimeout);
            }
            self.resizeTimeout = setTimeout(function(){
                
                self.cleanup();

            }, 200);
        };
        
        $(window).resize(onResize);

    },

    bindEvents: function() {

        var self = this;

        $(this.button).on('click', function(e) {

            e.preventDefault();

            if ( $(this).hasClass('desktopOpen') ) 
            {
                self.close();
            }
            else
            {
                self.open();
            }

        });

        
        $('body').click(function(event) {

            if ( $('nav.main_nav').hasClass('desktopOpen') ) 
            {
                var $target = $(event.target);

                if ($target.parents('.wrap-megadropdown-menu').length === 0 && $target.parents('.megadropdown').length === 0) {
                    self.close();
                }
            }
        }); 

    },

    open: function() {

        var self = this;

        $(self.button).addClass('desktopOpen');
        $(self.navigation).addClass('desktopOpen');
        //$('body').addClass('desktopOpen');

        self.setStamp();

    },

    close: function() {

        var self = this;

        $(self.button).removeClass('desktopOpen');
        $(self.navigation).removeClass('desktopOpen');

        self.removeStamp();

    },

    setStamp: function() {

        var html = "";
        if ( $(this.breadcrumb).length ) 
        {
            html = $("<div />").append($(".breadcrumb").clone()).html();
        }
        else 
        {
            html = '<ul class="breadcrumb"><li><a href="/">Naslovnica</a></li></ul>';
        }


        $('#navbar-collapse-1').append(html);
        

    },

    removeStamp: function() {

        $('#navbar-collapse-1 .breadcrumb').remove();

    },

    cleanup: function() {

        var self = this;

        if ( $(window).width() < 768 ) 
        {
            self.close();
        }

    }

};


var navHoverAction = function(selector) {

    return $(selector).each(function() {

        var self = this;

        $(this).find('a').hover(
            function() {
                $(self).find('a').not(this).addClass('hover');
            },
            function() {
                $(self).find('a').removeClass('hover');
            }
        );

    });

};

$(document).ready(function() {

    fixedNavigation.init();
    mobileNavigation.init();
    desktopNavigation.init();

    navHoverAction('.mainHead .main.nav');
    navHoverAction('.mainHead .sub.nav');
    navHoverAction('.siteFoot .footNav');

    $('a[href="#top"]').on('click', function(e) {
        e.preventDefault();
        $("html, body").animate({ scrollTop: 0 }, "slow");
    }); 

    jSocial.init();
    jDfp.init();
});   
