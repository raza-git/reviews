jQuery.fn.initMenu=function(){return this.each(function(){$(".acitem",this).hide(),$("li.expand > .acitem",this).show().prev().addClass("active"),$("li h5",this).on("click",function(){var a=$(this).next(),b=this.parentNode.parentNode;return $(b).hasClass("noaccordion")?(void 0===a[0]&&(window.location.href=this.href),$(a).slideToggle("normal",function(){var a=$(this);a.is(":visible")?a.prev().addClass("active"):a.prev().removeClass("active")}),!1):a.hasClass("acitem")&&a.is(":visible")?$(b).hasClass("collapsible")?($(".acitem:visible",b).first().slideUp("normal",function(){$(this).prev().removeClass("active")}),!1):!1:a.hasClass("acitem")&&!a.is(":visible")?($(".acitem:visible",b).slideUp("normal",function(){$(this).prev().removeClass("active")}),a.slideDown("normal",function(){$(this).prev().addClass("active")}),!1):void 0})})},function(){CL.page.enableHomepageSearchCounts=homeUIexperiment;var a=$(".body"),b=$("#search"),c=$("#rightbar");c.find("h5").addClass("hot").end().find(".more").remove().end().find("li").addClass("s").end().initMenu(),$("#chlang").on("change",function(){window.location.href=this.value});var d=$("#query"),e=$(".ui-autocomplete");if(CL.page.enableHomepageSearchCounts){var f=function(a,b){return $("<li>").data("item.autocomplete",b).append("<a>"+b.label+"</a>").appendTo(a)},g=function(a,b){var c=this;$.each(b,function(b,d){c._renderItemData(a,d)}),$(a).find("li").sort(function(a,b){var c=parseInt($(a).find("span").data("count")),d=parseInt($(b).find("span").data("count"));return d-c}).appendTo(a)};d.autocomplete({focus:function(){return!1},select:function(a){return 9===parseInt(a.which,10)?!1:(b.trigger("submit"),!1)},source:function(a,b){i(a,b)},autoFocus:!0,delay:100,minLength:1}),d.data("autocomplete")._renderItem=f,d.data("autocomplete")._renderMenu=g;var h,i=function(a,b){var c=d.val().trim();if(c!==h){h=c;var e=[],f=CL.util.escapeHtml(c);if(c.length<3)return void $(".hasresults").removeClass("hasresults");var g={bbb:"services",ccc:"community",ggg:"gigs",hhh:"housing",jjj:"jobs",rrr:"resumes",sss:"for sale"};$.getJSON("/count-search",{query:c}).fail(function(){$(".hasresults").removeClass("hasresults")}).done(function(a){(a.ccc||a.eee)&&(a.ccc=a.ccc||{},$.extend(a.ccc,a.eee),delete a.eee),Object.keys(a).forEach(function(b){var c=a[b],d=0;Object.keys(c).forEach(function(a){var b=c[a];d+=b}),e.push({label:'<b><span class="search-results-number" data-count="'+d+'">'+d+"</span></b> &ldquo;"+f+'&rdquo; in <span class="search-results-category" data-abbr="'+b+'">'+g[b]+"</span> ",val:f})}),b(e)})}};b.on("submit",function(a){a.preventDefault(),e=$(".ui-autocomplete");var b=e.find(".ui-state-focus").find(".search-results-category").data("abbr");null===b&&(b=e.find("li:first").find(".search-results-category").data("abbr")||"sss"),window.location="/search/"+b+"?sort=rel&query="+CL.util.escapeHtml(d.val().trim())})}if(a.on("click","a.hasresults",function(a){a.preventDefault();var c=$(this).data("cat").split(" ")[0];window.location.href=b.attr("action")+c+"?"+d.attr("name")+"="+d.val().trim()}),d.val()&&d.trigger("change"),CL.page.isMobile){var j=$("#topban"),k=$(".sublinks"),l=k.children(),m=$(".cal"),n=$("#calban"),o=$("#center"),p=$("#leftbar"),q=$(".wrapper"),r=j.find(".mobile-menu-button"),s=$(".view-submenu"),t=$("#mobile-subarea");c.detach().addClass("mobile-submenu").appendTo($("#mobile-area")).show(),$("#langlinks").detach().appendTo($("#mobile-languages")),l.length>0?(l.each(function(){var a=$(this).find("a");a.html(a.attr("title"))}),k.prepend('<li><a href="//'+window.location.hostname+'" title="'+window.allText+'">'+window.allText+"</a></li>").prependTo(a).hide(),t.append(k.addClass("mobile-submenu")),k.show()):t.hide(),c.find(".expand h5").trigger("click");var u=function(a){var b={},c=$("#"+a),d=c.find(".ban a"),e=d.clone().html(d.data("alltitle")).wrapAll("<li></li>").parent(),f=c,g=c.find("li");g.each(function(){b[$(this).find("a").html()]=this});var h=Object.keys(b).sort();if(h.length){for(;"["===h[0].charAt(0);)h.push(h.shift());h=h.map(function(a){return b[a]}),h.unshift(e[0]),f.find(".cats").html($('<ul id="'+a+'0"></ul>').html(h))}return f};r.on("click",function(a){a.preventDefault(),p.add(o).add(q).toggleClass("active-nav"),p.hasClass("active-nav")?(o.on("click",function(a){a.preventDefault(),a.stopPropagation(),r.trigger("click")}),b.find("input, select").on("mousedown",function(a){a.preventDefault(),a.stopPropagation(),r.trigger("click")}),$(".ban").add(o.find("a")).addClass("disabled")):(o.off("click"),b.find("input, select").off("mousedown"),$(".ban").add(o.find("a")).removeClass("disabled"))}),s.on("click","a",function(a){a.stopPropagation()}),s.on("click",function(a){a.preventDefault();var b=$(this).find(".mobile-submenu");b.toggleClass("active-menu"),$(this).find(".right-arrow").toggleClass("active")}),$(".right-arrow").on("click",function(a){a.preventDefault()}),["sss","jjj","hhh","ppp","ccc","bbb","ggg"].forEach(function(a){var b=u(a);$("#"+a).remove(),o.append(b)});var v=[$(".community"),$(".jobs"),n[0],m[0]].filter(function(a){return a});$.each(v,function(a,b){o.append(b)}),n.addClass("ban").on("click","a",function(a){a.preventDefault(),m.toggleClass("active-cal")}),$(".ban").filter(function(){return $(this).siblings(".cats").children().length}).on("click",function(a){var b=$(this);if("forums"!==b.parent().attr("id"))return a.preventDefault(),b.hasClass("disabled")?(r.trigger("click"),!1):void b.siblings(".cats").toggleClass("active-category")}),o.append($(".leftlinks").show())}}();
/* {"sources":{"homepage-concat.js":"2dac5c769c34c2bbb962daa519e18865"}} */