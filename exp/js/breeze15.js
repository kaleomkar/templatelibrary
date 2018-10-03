(function(jQuery,undefined){jQuery.HoverDir=function(options,element){this.jQueryel=jQuery(element);this._init(options);};jQuery.HoverDir.defaults={hoverDelay:0,reverse:false};jQuery.HoverDir.prototype={_init:function(options){this.options=jQuery.extend(true,{},jQuery.HoverDir.defaults,options);this._loadEvents();},_loadEvents:function(){var _self=this;this.jQueryel.on('mouseenter.hoverdir, mouseleave.hoverdir',function(event){var jQueryel=jQuery(this),evType=event.type,jQueryhoverElem=jQueryel.find('span'),direction=_self._getDir(jQueryel,{x:event.pageX,y:event.pageY}),hoverClasses=_self._getClasses(direction);jQueryhoverElem.removeClass();if(evType==='mouseenter'){jQueryhoverElem.hide().addClass(hoverClasses.from);clearTimeout(_self.tmhover);_self.tmhover=setTimeout(function(){jQueryhoverElem.show(0,function(){jQuery(this).addClass('da-animate').addClass(hoverClasses.to);});},_self.options.hoverDelay);}else{jQueryhoverElem.addClass('da-animate');clearTimeout(_self.tmhover);jQueryhoverElem.addClass(hoverClasses.from);}});},_getDir:function(jQueryel,coordinates){var w=jQueryel.width(),h=jQueryel.height(),x=(coordinates.x-jQueryel.offset().left-(w/2))*(w>h?(h/w):1),y=(coordinates.y-jQueryel.offset().top-(h/2))*(h>w?(w/h):1),direction=Math.round((((Math.atan2(y,x)*(180/Math.PI))+180)/90)+3)%4;return direction;},_getClasses:function(direction){var fromClass,toClass;switch(direction){case 0:(!this.options.reverse)?fromClass='da-slideFromTop':fromClass='da-slideFromBottom';toClass='da-slideTop';break;case 1:(!this.options.reverse)?fromClass='da-slideFromRight':fromClass='da-slideFromLeft';toClass='da-slideLeft';break;case 2:(!this.options.reverse)?fromClass='da-slideFromBottom':fromClass='da-slideFromTop';toClass='da-slideTop';break;case 3:(!this.options.reverse)?fromClass='da-slideFromLeft':fromClass='da-slideFromRight';toClass='da-slideLeft';break;};return{from:fromClass,to:toClass};}};var logError=function(message){if(this.console){console.error(message);}};jQuery.fn.hoverdir=function(options){if(typeof options==='string'){var args=Array.prototype.slice.call(arguments,1);this.each(function(){var instance=jQuery.data(this,'hoverdir');if(!instance){logError("cannot call methods on hoverdir prior to initialization; "+"attempted to call method '"+options+"'");return;}
if(!jQuery.isFunction(instance[options])||options.charAt(0)==="_"){logError("no such method '"+options+"' for hoverdir instance");return;}
instance[options].apply(instance,args);});}else{this.each(function(){var instance=jQuery.data(this,'hoverdir');if(!instance){jQuery.data(this,'hoverdir',new jQuery.HoverDir(options,this));}});}
return this;};})(jQuery);