"use strict";var $event=$.event,$special,resizeTimeout;$special=$event.special.debouncedresize={setup:function(){$(this).on("resize",$special.handler)},teardown:function(){$(this).off("resize",$special.handler)},handler:function(i,e){var t=this,s=arguments,n=function(){i.type="debouncedresize",$event.dispatch.apply(t,s)};resizeTimeout&&clearTimeout(resizeTimeout),e?n():resizeTimeout=setTimeout(n,$special.threshold)},threshold:250};var BLANK="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw==";$.fn.imagesLoaded=function(i){function e(){var e=$(r),t=$(d);n&&(d.length?n.reject(o,e,t):n.resolve(o)),$.isFunction(i)&&i.call(s,o,e,t)}function t(i,t){i.src!==BLANK&&-1===$.inArray(i,h)&&(h.push(i),t?d.push(i):r.push(i),$.data(i,"imagesLoaded",{isBroken:t,src:i.src}),a&&n.notifyWith($(i),[t,o,$(r),$(d)]),o.length===h.length&&(setTimeout(e),o.unbind(".imagesLoaded")))}var s=this,n=$.isFunction($.Deferred)?$.Deferred():0,a=$.isFunction(n.notify),o=s.find("img").add(s.filter("img")),h=[],r=[],d=[];return $.isPlainObject(i)&&$.each(i,function(e,t){"callback"===e?i=t:n&&n[e](t)}),o.length?o.bind("load.imagesLoaded error.imagesLoaded",function(i){t(i.target,"error"===i.type)}).each(function(i,e){var s=e.src,n=$.data(e,"imagesLoaded");return n&&n.src===s?void t(e,n.isBroken):e.complete&&void 0!==e.naturalWidth?void t(e,0===e.naturalWidth||0===e.naturalHeight):void((e.readyState||e.complete)&&(e.src=BLANK,e.src=s))}):e(),n?n.promise(s):s};var Grid=function(){function i(i){x=$.extend(!0,{},x,i),d.imagesLoaded(function(){t(!0),a(),s()})}function e(i){c=c.add(i),i.each(function(){var i=$(this);i.data({offsetTop:i.offset().top,height:i.height()})}),n(i)}function t(i){c.each(function(){var e=$(this);e.data("offsetTop",e.offset().top),i&&e.data("height",e.height())})}function s(){n(c),u.on("debouncedresize",function(){f=0,g=-1,t(),a(),void 0!==$.data(this,"preview")&&h()})}function n(i){i.on("click","span.og-close",function(){return h(),!1}).children("a").on("click",function(i){var e=$(this).parent();return l===e.index()?h():o(e),!1})}function a(){m={width:u.width(),height:u.height()}}function o(i){var e=$.data(this,"preview"),t=i.data("offsetTop");if(f=0,void 0!==e){if(g===t)return e.update(i),!1;t>g&&(f=e.height),h()}g=t,e=$.data(this,"preview",new r(i)),e.open()}function h(){l=-1,$.data(this,"preview").close(),$.removeData(this,"preview")}function r(i){this.$item=i,this.expandedIdx=this.$item.index(),this.create(),this.update()}var d=$("#og-grid"),c=d.children("li"),l=-1,g=-1,f=0,p=10,u=$(window),m,v=$("html, body"),w={WebkitTransition:"webkitTransitionEnd",MozTransition:"transitionend",OTransition:"oTransitionEnd",msTransition:"MSTransitionEnd",transition:"transitionend"},A=w[Modernizr.prefixed("transition")],T=Modernizr.csstransitions,x={minHeight:500,speed:350,easing:"ease"};return r.prototype={create:function(){this.$title=$("<h3></h3>"),this.$description=$("<p></p>"),this.$href=$('<a href="#">Visit website</a>'),this.$details=$('<div class="og-details"></div>').append(this.$title,this.$description,this.$href),this.$loading=$('<div class="og-loading"></div>'),this.$fullimage=$('<div class="og-fullimg"></div>').append(this.$loading),this.$closePreview=$('<span class="og-close"></span>'),this.$previewInner=$('<div class="og-expander-inner"></div>').append(this.$closePreview,this.$fullimage,this.$details),this.$previewEl=$('<div class="og-expander"></div>').append(this.$previewInner),this.$item.append(this.getEl()),T&&this.setTransition()},update:function(i){if(i&&(this.$item=i),-1!==l){c.eq(l).removeClass("og-expanded"),this.$item.addClass("og-expanded"),this.positionPreview()}l=this.$item.index();var e=this.$item.children("a"),t={href:e.attr("href"),largesrc:e.data("largesrc"),title:e.data("title"),description:e.data("description")};this.$title.html(t.title),this.$description.html(t.description),this.$href.attr("href",t.href);var s=this;void 0!==s.$largeImg&&s.$largeImg.remove(),s.$fullimage.is(":visible")&&(this.$loading.show(),$("<img/>").load(function(){var i=$(this);i.attr("src")===s.$item.children("a").data("largesrc")&&(s.$loading.hide(),s.$fullimage.find("img").remove(),s.$largeImg=i.fadeIn(350),s.$fullimage.append(s.$largeImg))}).attr("src",t.largesrc))},open:function(){setTimeout($.proxy(function(){this.setHeights(),this.positionPreview()},this),25)},close:function(){var i=this,e=function(){T&&$(this).off(A),i.$item.removeClass("og-expanded"),i.$previewEl.remove()};return setTimeout($.proxy(function(){void 0!==this.$largeImg&&this.$largeImg.fadeOut("fast"),this.$previewEl.css("height",0);var i=c.eq(this.expandedIdx);i.css("height",i.data("height")).on(A,e),T||e.call()},this),25),!1},calcHeight:function(){var i=m.height-this.$item.data("height")-10,e=m.height;i<x.minHeight&&(i=x.minHeight,e=x.minHeight+this.$item.data("height")+10),this.height=i,this.itemHeight=e},setHeights:function(){var i=this,e=function(){T&&i.$item.off(A),i.$item.addClass("og-expanded")};this.calcHeight(),this.$previewEl.css("height",this.height),this.$item.css("height",this.itemHeight).on(A,e),T||e.call()},positionPreview:function(){var i=this.$item.data("offsetTop"),e=this.$previewEl.offset().top-f,t=this.height+this.$item.data("height")+10<=m.height?i:this.height<m.height?e-(m.height-this.height):e;v.animate({scrollTop:t},x.speed)},setTransition:function(){this.$previewEl.css("transition","height "+x.speed+"ms "+x.easing),this.$item.css("transition","height "+x.speed+"ms "+x.easing)},getEl:function(){return this.$previewEl}},{init:i,addItems:e}}();$(function(){console.log(">>>>>",$(".page-videos").length),console.log(">>>>>Grid=",Grid),$(".page-videos").length>0&&Grid.init()});