// JavaScript Document
/* ==== slider nameSpace ==== */
var slider = function() {
	/* ==== private methods ==== */
	function getElementsByClass(object, tag, className) {
		var o = object.getElementsByTagName(tag);
		for ( var i = 0, n = o.length, ret = []; i < n; i++) {
			if (o[i].className == className) ret.push(o[i]);
		}
		if (ret.length == 1) ret = ret[0];
		return ret;
	}
	function setOpacity (obj,o) {
		if (obj.filters) obj.filters.alpha.opacity = Math.round(o);
		else obj.style.opacity = o / 100;
	}
	/* ==== Slider Constructor ==== */
	function Slider(oCont, speed, iW, iH, oP) {
		this.slides = [];
		this.over   = false;
		this.S      = this.S0 = speed;
		this.iW     = iW;
		this.iH     = iH;
		this.oP     = oP;
		this.oc     = document.getElementById(oCont);
		this.frm    = getElementsByClass(this.oc, 'div', 'slide');
		this.NF     = this.frm.length;
		this.resize();
		for (var i = 0; i < this.NF; i++) {
			this.slides[i] = new Slide(this, i);
		}
		this.oc.parent = this;
		this.view      = this.slides[0];
		this.Z         = this.mx;
		/* ==== on mouse out event ==== */
		this.oc.onmouseout = function () {
			this.parent.mouseout();
			return false;
		}
	}
	Slider.prototype = {
		/* ==== animation loop ==== */
		run : function () {
			this.Z += this.over ? (this.mn - this.Z) * .5 : (this.mx - this.Z) * .5;
			this.view.calc();
			var i = this.NF;
			while (i--) this.slides[i].move();
		},
		/* ==== resize  ==== */
		resize : function () {
			this.wh = this.oc.clientWidth;
			this.ht = this.oc.clientHeight;
			this.wr = this.wh * this.iW;
			this.r  = this.ht / this.wr;
			this.mx = this.wh / this.NF;
			this.mn = (this.wh * (1 - this.iW)) / (this.NF - 1);
		},
		/* ==== rest  ==== */
		mouseout : function () {
			this.over      = false;
			setOpacity(this.view.img, this.oP);
		}
	}
	/* ==== Slide Constructor ==== */
	Slide = function (parent, N) {
		this.parent = parent;
		this.N      = N;
		this.x0     = this.x1 = N * parent.mx;
		this.v      = 0;
		this.loaded = false;
		this.cpt    = 0;
		this.start  = new Date();
		this.obj    = parent.frm[N];
		this.txt    = getElementsByClass(this.obj, 'div', 'text');
		this.img    = getElementsByClass(this.obj, 'img', 'diapo');
		this.bkg    = document.createElement('div');
		this.bkg.className = 'backgroundText';
		this.obj.insertBefore(this.bkg, this.txt);
		if (N == 0) this.obj.style.borderLeft = 'none';
		this.obj.style.left = Math.floor(this.x0) + 'px';
		setOpacity(this.img, parent.oP);
		/* ==== mouse events ==== */
		this.obj.parent = this;
		this.obj.onmouseover = function() {
			this.parent.over();
			return false;
		}
	}
	Slide.prototype = {
		/* ==== target positions ==== */
		calc : function() {
			var that = this.parent;
			// left slides
			for (var i = 0; i <= this.N; i++) {
				that.slides[i].x1 = i * that.Z;
			}
			// right slides
			for (var i = this.N + 1; i < that.NF; i++) {
				that.slides[i].x1 = that.wh - (that.NF - i) * that.Z;
			}
		},
		/* ==== HTML animation : move slides ==== */
		move : function() {
			var that = this.parent;
			var s = (this.x1 - this.x0) / that.S;
			/* ==== lateral slide ==== */
			if (this.N && Math.abs(s) > .5) {
				this.obj.style.left = Math.floor(this.x0 += s) + 'px';
			}
			/* ==== vertical text ==== */
			var v = (this.N < that.NF - 1) ? that.slides[this.N + 1].x0 - this.x0 : that.wh - this.x0;
			if (Math.abs(v - this.v) > .5) {
				this.bkg.style.top = this.txt.style.top = Math.floor(2 + that.ht - (v - that.Z) * that.iH * that.r) + 'px';
				this.v = v;
				this.cpt++;
			} else {
				if (!this.pro) {
					/* ==== adjust speed ==== */
					this.pro = true;
					var tps = new Date() - this.start;
					if(this.cpt > 1) {
						that.S = Math.max(2, (28 / (tps / this.cpt)) * that.S0);
					}
				}
			}
			if (!this.loaded) {
				if (this.img.complete) {
					this.img.style.visibility = 'visible';
					this.loaded = true;
				}
			}
		},
		/* ==== light ==== */
		over : function () {
			this.parent.resize();
			this.parent.over = true;
			setOpacity(this.parent.view.img, this.parent.oP);
			this.parent.view = this;
			this.start = new Date();
			this.cpt = 0;
			this.pro = false;
			this.calc();
			setOpacity(this.img, 100);
		}
	}
	/* ==== public method - script initialization ==== */
	return {
		init : function() {
			// create instances of sliders here
			// parameters : HTMLcontainer name, speed (2 fast - 20 slow), Horizontal ratio, vertical text ratio, opacity
			this.s1 = new Slider("slider", 12, 8/10, 1/2.5, 100);
			setInterval("slider.s1.run();", 16);
		}
	}
}();


//首页大图轮换
(function(a){
	a.fn.jdSlide=function(k){
		var p=a.extend({
			width:null,height:null,pics:[],index:0,type:"num",current:"curr",delay1:300,delay2:3000
		}
		,k||{});
		var i=this;
		var g,f,d,h=0,e=true,b=true;
		var n=p.pics.length;
		var o=function(){
			var q="<ul style='position:absolute;top:0;left:0;'><li><a href='"+p.pics[0].href+"' target='_blank'><img src='"+p.pics[0].src+"' width='"+p.width+"' height='"+p.height+"' /></a></li></ul>";
			i.css({
				//position:"relative"
			}).html(q);
			i.find("ul").css({
				width:n*p.width+"px",height:p.height+"px"
			});
			a(function(){
				c()
			})
		};
		o();
		var j=function(){
			var s=[];
			s.push("<div class=\"slide-num\">");
			var r;
			var q;
			for(var t=0;t<n;t++){
				r=(t==p.index)?p.current:"";
				switch(p.type){
					case"num":q=t+1;
					break;
					case"string":q=p.pics[t].alt;
					break;
					case"image":q="<img src='"+p.pics[t].breviary+"' />";
					default:break
				}
				s.push("<span class='");
				s.push(r);
				s.push("'><a href='");
				s.push(p.pics[t].href);
				s.push("' target='_blank'>");
				s.push(q);
				s.push("</a></span>")
			}
			s.push("</div>");
			i.append(s.join(""));
			var x=[];
			x.push("<div id='goback' class='o-control'><a class='control'></a></div><div id='forward' class='o-control'><a class='control'></a></div>");
			i.append(x.join(""));
			i.find("#goback").bind("mouseover",function(){
				b=false;
				clearTimeout(g);
				clearTimeout(d)
			}).bind("click",function(){
				var u=p.index-1;
				if(u<0){
					u=t-1
				};
				l(u)
			}).bind("mouseleave",function(){
				b=true;
			});
			i.find("#forward").bind("mouseover",function(){
				b=false;
				clearTimeout(g);
				clearTimeout(d)
			}).bind("click",function(){
				var u=p.index+1;
				l(u)
			}).bind("mouseleave",function(){
				b=true;
			});
			i.find("span").bind("mouseover",function(){
				b=false;
				clearTimeout(g);
				clearTimeout(d);
				var u=i.find("span").index(this);
				if(p.index==u){
					return
				}
				else{
					d=setInterval(function(){
						if(e){
							l(u)
						}
					}
					,p.delay1)
				}
			}).bind("mouseleave",function(){
				b=true;
				clearTimeout(g);
				clearTimeout(d);
				g=setTimeout(function(){
					l(p.index+1,true)
				}
				,p.delay2)
			});
			i.bind("mouseover",function(){
				$("#slide .o-control").show();
				$("#slide .slide-num").show();
			}).bind("mouseleave",function(){
				$("#slide .o-control").hide();
				$("#slide .slide-num").hide();
			})
		};
		var l=function(r,q){
			if(r==n){
				r=0
			}
			f=setTimeout(function(){
				i.find("span").eq(p.index).removeClass(p.current);
				i.find("span").eq(r).addClass(p.current);
				m(r,q)
			}
			,20)
		};
		var m=function(u,q){
			var s=parseInt(h);
			var v=Math.abs(s+p.index*p.width);
			var t=Math.abs(u-p.index)*p.width;
			var r=Math.ceil((t-v)/4);
			if(v==t){
				clearTimeout(f);
				if(q){
					p.index++;
					if(p.index==n){
						p.index=0
					}
				}
				else{
					p.index=u
				}
				e=true;
				if(e&&b){
					clearTimeout(g);
					g=setTimeout(function(){
						l(p.index+1,true)
					}
					,p.delay2)
				}
			}
			else{
				if(p.index<u){
					h=s-r;
					i.find("ul").css({
						left:h+"px"
					})
				}
				else{
					h=s+r;
					i.find("ul").css({
						left:h+"px"
					})
				}
				e=false;
				f=setTimeout(function(){
					m(u,q)
				}
				,20)
			}
		};
		var c=function(){
			var q=[];
			for(var r=1;r<n;r++){
				q.push("<li><a href='");
				q.push(p.pics[r].href);
				q.push("' target='_blank'><img src='");
				q.push(p.pics[r].src);
				q.push("' width='");
				q.push(p.width);
				q.push("' height='");
				q.push(p.height);
				q.push("' /></a></li>")
			}
			i.find("ul").append(q.join(""));
			g=setTimeout(function(){
				l(p.index+1,true)
			}


			,p.delay2);
			if(p.type){
				j()
			}
		}
	}
})(jQuery);