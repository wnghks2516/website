(function(e) {
	e.fn.aceResponsiveMenu=function(t) {
		function f() {
			var t=e(window).innerWidth();
			if(t<=i) {
				u.find("li.menu-active").removeClass("menu-active");
				u.find("ul.slide").removeClass("slide").removeAttr("style");
				u.addClass("collapse hide-menu");
				u.attr("data-menu-style","");
				e(".menu-toggle").show()
			}
			else {
				u.attr("data-menu-style",a);
				u.removeClass("collapse hide-menu").removeAttr("style");
				e(".menu-toggle").hide();
				if(u.attr("data-menu-style")=="accordion") {
					u.addClass("collapse");
					return
				}
				u.find("li.menu-active").removeClass("menu-active");
				u.find("ul.slide").removeClass("slide").removeAttr("style")
			}
		}
		var n= {
			resizeWidth:"768",animationSpeed:"fast",accoridonExpAll: false
		}
		;
		var t=e.extend(n,t),r=t,i=r.resizeWidth,s=r.animationSpeed,o=r.accoridonExpAll,u=e(this),a=e(this).attr("data-menu-style");
		u.find("ul").addClass("sub-menu");
		u.find("ul").siblings("a").append('<span class="arrow "></span>');
		if(a=="accordion") {
			e(this).addClass("collapse")
		}
		if(e(window).innerWidth()<=i) {
			f()
		}
		e(window).resize(function() {
			f()
		}
		);
		e("#menu-btn").click(function() {
			u.slideToggle().toggleClass("hide-menu")
		}
		);
		return this.each(function() {
			u.on("mouseover",">li a",function() {
				if(u.hasClass("collapse")===true) {
					return false
				}
				e(this).off("click",">li a");
				e(this).parent("li").siblings().children(".sub-menu").stop(true,true).slideUp(s).removeClass("slide").removeAttr("style").stop();
				e(this).parent().addClass("menu-active").children(".sub-menu").slideDown(s).addClass("slide");
				return
			}
			);
			u.on("mouseleave","li",function() {
				if(u.hasClass("collapse")===true) {
					return false
				}
				e(this).off("click",">li a");
				e(this).removeClass("menu-active");
				e(this).children("ul.sub-menu").stop(true,true).slideUp(s).removeClass("slide").removeAttr("style");
				return
			}
			);
			u.on("click",">li a",function() {
				if(u.hasClass("collapse")===false) {
					return false
				}
				e(this).off("mouseover",">li a");
				if(e(this).parent().hasClass("menu-active")) {
					e(this).parent().children(".sub-menu").slideUp().removeClass("slide");
					e(this).parent().removeClass("menu-active")
				}
				else {
					if(o==true) {
						e(this).parent().addClass("menu-active").children(".sub-menu").slideDown(s).addClass("slide");
						return
					}
					e(this).parent().siblings().removeClass("menu-active");
					e(this).parent("li").siblings().children(".sub-menu").slideUp().removeClass("slide");
					e(this).parent().addClass("menu-active").children(".sub-menu").slideDown(s).addClass("slide")
				}
			}
			)
		}
		)
	}
}
)(jQuery)