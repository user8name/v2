$(function () {
    function gotopFn() {
        let gotop=document.querySelector(".gotop"),
            isScroll=false,
            beforeScrolltop=document.documentElement.scrollTop||document.body.scrollTop;
        window.addEventListener("scroll",function (e) {
            let viewHeight=document.documentElement.clientHeight,
                scrolltop=document.documentElement.scrollTop||document.body.scrollTop;

            if(scrolltop>beforeScrolltop)
                isScroll=true;
            if(scrolltop>700)
                $(gotop).show();
            else
                $(gotop).hide();
            beforeScrolltop=scrolltop;
        },false);

        if(gotop!==null)
            gotop.addEventListener("click",function (ec) {
                let isSpeed=0,iTimer;
                clearInterval(iTimer);
                isScroll=false;
                iTimer=setInterval(function () {
                    let scrolltop=document.documentElement.scrollTop||document.body.scrollTop;
                    isSpeed=Math.floor((0-scrolltop)/8);
                    document.body.scrollTop=document.documentElement.scrollTop=scrolltop+isSpeed;
                    if((document.body.scrollTop<=0&&document.documentElement.scrollTop<=0)||isScroll)
                    {
                        clearInterval(iTimer);
                    }
                },30)
            },false);
    }
    gotopFn();
    function topnaviFn() {
        let topnavi=document.querySelector(".header-shell"),
            scrolltop=document.documentElement.scrollTop||document.body.scrollTop;
        if(scrolltop>100)
            $(topnavi).addClass("fixed_header-shell");
        window.addEventListener("scroll",function (e) {
            let viewHeight=document.documentElement.clientHeight,
                scrolltop=document.documentElement.scrollTop||document.body.scrollTop;
            if(scrolltop>100)
                $(topnavi).addClass("fixed_header-shell");
            else
                $(topnavi).removeClass("fixed_header-shell");
        },false);
    }
    topnaviFn();



    $.fn.navigationp=function (options) {
        let self,opts,opt={
            overlap : 20,
            speed : 500,
            reset : 1500,
            color : '#0b2b61',
            easing : 'easeOutExpo'
        };
        $.isEmptyObject(options)? opts=opt:opts=$.extend(opt,options);
        function navigationp(obj,opts) {
            self=this;
            this.$obj=$(obj);
            this.options=opts;
            this._Init();
            this._Event();
        }
        navigationp.prototype={
            _Init()
            {
                self.tablist=self.$obj.children("li");
                self.startobj=self.$obj.children("li").first();
                self.navi_cont_chtitle=self.$obj.find(".navi_cont_chtitle>li");
                self.child_li=self.$obj.find(".navi_cont_chtitle li");
                // self.startobj.children("a").css("color","rgba(21,21,21,0.4)");
                self.noleave=false;
                let templi=self.$obj.children("li");
                self.windows_height=document.documentElement.clientHeight;
                self.windows_width=document.documentElement.clientWidth;

                if(self.windows_width<1081)
                {
                    self.tablist.each(function(index,item){
                        var temp_navigation_Solutions=$(item).find(".navigation_Solutions");
                        var navi_cont_chtitle=$(item).find(".navi_cont_chtitle>li");
                        if(temp_navigation_Solutions.length>0)
                        {
                            temp_navigation_Solutions.before("<span class='fa fa-angle-right'></span>");
                            var child_span=$(item).children("span");
                            if(child_span.length>0)
                                child_span[0].onclick=function(){
                                    child_span.toggleClass("rotate-angle");
                                    child_span.next().slideToggle();
                                }
                        }
                        navi_cont_chtitle.each(function(indexul,itemul){
                            var child_ul=$(itemul).children("ul");
                            if(child_ul.length>0)
                            {
                                child_ul.before("<span class='fa fa-angle-right'></span>");
                                var child_span=$(itemul).children("span");
                                if(child_span.length>0)
                                    child_span[0].onclick=function(){
                                        child_span.toggleClass("rotate-angle");
                                        child_span.next().slideToggle();
                                    }
                            }
                        });
                    });
                }else
                {
                    templi.each((index,item)=>{
                        let temp=$(item).children(".navigation_Solutions");
            /*            var temp_html=$(item).children("a").html();
                        $(item).children("a").html("<span>"+temp_html+"</span>");*/
                        if(temp.length!==0)
                        {
                            if(temp.width()>400) temp.css("right","-322px");
                            self.objviewwidth=temp.outerWidth();
                        }
                    });
                }
            },

            _Event()
            {
                let reset=null,
                    resetl=null,
                    tempobj=self.$obj.children(".navigation_titlenow"),
                    timout_out;
                /*       self.navi_cont_chtitle.each(function(index,item){
                           var temp_ul=$(item).children("ul");
                           if(temp_ul.length>0)
                           {
                               temp_ul.before("<span class='fa fa-caret-right'></span>");
                               item.addEventListener("mouseenter",function(e){
                                   temp_ul.show();
                               });
                               item.addEventListener("mouseleave",function(e){
                                   temp_ul.hide();
                               })
                           }
                       });*/
                self.tablist.each(function (index,item) {

                    item.addEventListener("mouseenter",function (e) {
                        if(self.windows_width>1080)
                        {
                           var navigation_Solutions=$(item).children(".navigation_Solutions");
                           if(navigation_Solutions.length>0)
                           {
                               navigation_Solutions.show();
                           }
                        }
                    });
                    item.addEventListener("mouseleave",function (e) {
                        if(self.windows_width>1080)
                        {
                            var navigation_Solutions=$(item).children(".navigation_Solutions");
                            if(navigation_Solutions.length>0)
                            {
                                navigation_Solutions.hide();
                            }
                        }
                    });
                });
                self.child_li.each(function(index,item){
                    var temp_child_ul=$(item).children("ul");
                    if(self.windows_width>1080)
                    {
                        item.addEventListener("mouseenter",function(e){
                            if(temp_child_ul.length>0)
                            {
                                temp_child_ul.show();
                            }
                        });
                        item.addEventListener("mouseleave",function(e){
                            if(temp_child_ul.length>0)
                            {
                                temp_child_ul.hide();
                            }
                        });
                    }
                });
            }
        };
        return this.each(function () {
            new navigationp(this,opts);
        })
    };
    $(".navigation_title").navigationp();


    $.fn.barmobile=function (options) {
        let self,opts,opt={};
        $.isEmptyObject(options)? opts=opt:opts=$.extend(opt,options);
        function Barmobile(obj,opts) {
            self=this;
            this.opts=opts;
            this.$obj=$(obj);
            this._Init();
            this._event();
        }
        Barmobile.prototype={
            _Init(){
                self.rectFirst=self.$obj.find("svg rect:first-child");
                self.rectLast=self.$obj.find("svg rect:last-child");
                self.rectSecond=self.$obj.find("svg rect:nth-child(2)");
                self.isshow=false;
                self.target_navi=$(self.opts.target_navi);
                self.main_=$("main");
            },
            _event()
            {
                self.$obj.click(function (ev) {
                    if(!self.isshow)
                    {
                        self.rectFirst.attr("y",18.188);
                        self.rectLast.attr("y",18.188);
                        setTimeout(function () {
                            self.rectFirst.attr("y",29.625);
                            self.rectLast.attr("y",29.625);
                            self.rectFirst.attr("width",35.667);
                            self.rectLast.attr("width",35.667);
                            self.rectSecond.hide();
                            self.rectFirst.css("transform","rotateZ(-45deg) translateX(-17px)");
                            self.rectLast.css("transform","rotateZ(45deg) translate3D(-8px,-35px,0)");
                            self.isshow=true;
                        },900);
                        // self.target_navi.removeClass(self.opts.mobile_move);
                        self.main_.css({"transform":"translateX(-300px)"});
                    }else
                    {
                        self.rectFirst.attr("y",18.188);
                        self.rectLast.attr("y",18.188);
                        self.rectFirst.attr("width",19.333);
                        self.rectLast.attr("width",16.333);
                        self.rectFirst.css("transform","");
                        self.rectLast.css("transform","");
                        setTimeout(function () {
                            self.rectSecond.show();
                            self.rectFirst.attr("y",6);
                            self.rectLast.attr("y",29.625);
                            self.isshow=false;
                        },900);
                        // self.target_navi.addClass(self.opts.mobile_move);
                        self.main_.css({"transform":"translateX(0)"});
                    }
                });
            }
        };
        return this.each(function () {
            new Barmobile(this,opts);
        });
    };
    $(".barmobile").barmobile({});

    $.fn.bannerCarousel=function (options) {
        let self,opts,opt={};
        $.isEmptyObject(options)? opts=opt:opts=$.extend(opt,options);
        function BannerCarousel(obj,opts) {
            self=this;
            this.opts=opts;
            this.$obj=$(obj);
            this._Init();
            this._event();
            this.loop();
        }
        BannerCarousel.prototype={
            _Init(){
                self.$obj.append("<ul class='scroll'></ul>");
                self.scroll=self.$obj.find(".scroll");
                self.contentLi=self.$obj.find(".carousel-content>li:not(:first-child)");
                self.opLeft=self.$obj.find(".left");
                self.opRight=self.$obj.find(".right");
                self.$obj.before("<div class='newEmpty'></div>");
                self.currentPage=-10;
                self.nextPage=-10;

                for (let sc=0;sc<self.contentLi.length;sc++)
                {
                    if(sc===0)
                    {
                        self.scroll.append("<li class='current'></li>");
                    }else
                        self.scroll.append("<li></li>");
                }
                self.scrollLi=self.$obj.find(".scroll>li");
                $(self.contentLi[0]).addClass("show_");
                self.contentLi.each((index,item)=>{
                    if(index===0)
                $(item).attr("data-text",0);
            else
                $(item).attr("data-text",-1);
            });
                self.startTime=Date.parse(new Date());
                self.endTime=Date.parse(new Date());
            },
            turn(){
                self.contentLi.each((index,item)=>{
                    $(item).removeClass("current");
                $(item).removeClass("after");
                $(item).removeClass("show_");
                let img=$(item).find('img'),
                    ptemp=$(item).find('p');
                img.removeClass("imgCurrent");
                ptemp.removeClass("titleCurrent");
                let dataText=parseInt($(item).attr("data-text"));

                if(dataText===0)
                {
                    $(item).addClass("current");
                    img.addClass("imgCurrent");
                    ptemp.addClass("titleCurrent");
                    $(self.scrollLi[index]).addClass("current");
                }else
                    $(self.scrollLi[index]).removeClass("current");
                if(dataText===1)
                {
                    $(item).addClass("after");
                }
            });
            },

            done(param)
            {
                if(self.currentPage===-10)
                {
                    self.currentPage=0;
                    self.nextPage=1;
                    if(param==="prev")
                    {
                        $(self.contentLi[1]).attr("data-text",1);
                    }else
                    if(param==="next")
                        $(self.contentLi[self.contentLi.length-1]).attr("data-text",1);

                }
                let currenttb,aftertb,prevtb;
                self.contentLi.each((index,item)=>{
                    let dataText=parseInt($(item).attr("data-text"));
                if(dataText===self.nextPage)
                    prevtb=index;
                if(dataText===self.currentPage)
                {
                    currenttb=index;
                    let nmb=index;
                    if(param==="prev")
                    {
                        if(index===0)
                            nmb=self.contentLi.length-1;
                        else
                            nmb-=1;
                    }else
                    if(param==="next")
                    {
                        if(index===self.contentLi.length-1)
                            nmb=0;
                        else
                            nmb+=1;
                    }
                    aftertb=nmb;
                }
            });
                $(self.contentLi[prevtb]).attr("data-text",-1);
                $(self.contentLi[currenttb]).attr("data-text",self.nextPage);
                $(self.contentLi[aftertb]).attr("data-text",self.currentPage);


                if(param==="prev")
                {
                    self.$obj[0].style.setProperty('--y', -1);
                }else
                if(param==="next")
                    self.$obj[0].style.setProperty('--y', 1);

                self.turn();
            },
            scrollDone(param)
            {
                if(self.currentPage===-10)
                {
                    self.currentPage=0;
                    self.nextPage=1;
                    $(self.contentLi[1]).attr("data-text",1);
                }

                let currenttb,aftertb,prevtb;
                self.contentLi.each((index,item)=>{
                    let dataText=parseInt($(item).attr("data-text"));
                if(dataText===self.nextPage)
                    prevtb=index;
                if(dataText===self.currentPage)
                {
                    currenttb=index;

                }
            });
                aftertb=param;
                $(self.contentLi[prevtb]).attr("data-text",-1);
                $(self.contentLi[currenttb]).attr("data-text",self.nextPage);
                $(self.contentLi[aftertb]).attr("data-text",self.currentPage);
                if(param-currenttb>0)
                    self.$obj[0].style.setProperty('--y', 1);
                else
                if(param-currenttb<0)
                    self.$obj[0].style.setProperty('--y', -1);

                self.turn();
            },
            loop()
            {
                self.endTime=Date.parse(new Date());
                if(self.endTime-self.startTime>6000)
                {
                    self.done("next");
                    self.startTime=Date.parse(new Date());
                }
                requestAnimationFrame(self.loop);
            },
            _event()
            {
                self.opLeft[0].addEventListener("click",e=>{
                    self.startTime=Date.parse(new Date());
                self.done("prev");
            });
                self.opRight[0].addEventListener("click",e=>{
                    self.startTime=Date.parse(new Date());
                self.done("next");
            });
                self.scrollLi.each((index,item)=>{
                    item.addEventListener("click",e=>{
                        self.startTime=Date.parse(new Date());
                self.scrollDone(index);
            });
            });
            }
        };
        return this.each(function () {
            new BannerCarousel(this,opts);
        });
    };
    $(".banner-carousel").bannerCarousel();
    $.fn.side_navi=function(option){
        var options,opt={
        },self;
        $.isEmptyObject(option)? options=opt:options=$.extend(opt,option);
        function Side_navi(obj,options)
        {
            self=this;
            this.$obj=$(obj);
            this.options=options;
            this.Init_();
            this.Event_();
        }
        Side_navi.prototype={
            deeploop:function(obj_)
            {
                var target_obj=obj_;
                var child_a=target_obj.children("a"),
                    child_ul=target_obj.children("ul");
                if(child_a.length>0)
                {
                    var str_href=child_a.attr("href");
                    if(self.current_url.indexOf(str_href)>-1&&str_href!=="")
                    {
                        child_a.css({"font-weight":"bold","color":"rgba(243, 96, 24,1)"});
                        target_obj.css({"background":"rgb(211, 211, 212)","border-left":"2px solid rgba(49, 121, 172,1)"});
                        return true;
                    }
                    else
                    {
                        if(child_ul.length>0)
                        {
                            var temp_child_li=child_ul.children("li"),
                                temp_back=false;
                            temp_child_li.each(function(index,item){
                                if(self.deeploop($(item)))
                                {
                                    child_ul.show();
                                    child_ul.parent().children("span").addClass("rotate_angle");
                                    temp_back=true;
                                }
                            });
                            return temp_back;
                        }
                        else
                            return false;
                    }
                }else
                    return false;
            },
            Init_:function(){
                self.parent_li=self.$obj.children("li");
                self.child_li=self.$obj.find("li");
                self.nomain_service_navcnt=self.$obj.find(".nomain-service-navcnt");
                self.current_url=document.URL.toLocaleLowerCase();
                self.child_li.each(function(index,item){
                    //  $(item).children("a").after("<span class='fa fa-angle-right'></span>");
                    var temp_child_ul=$(item).children("ul"),
                        span_temp=$(item).children("span");
                    if(temp_child_ul.length>0)
                    {
                        if(span_temp.length===0)
                        {
                            $(item).children("a").after("<span class='fa fa-angle-right'></span>");
                            span_temp=$(item).children("span");
                        }
                        span_temp[0].addEventListener("click",function(e){
                            temp_child_ul.slideToggle();
                            span_temp.toggleClass("rotate_angle");
                            $(item).siblings().children("span").removeClass("rotate_angle");
                            $(item).siblings().children("ul").slideUp();
                        });
                    }
                });
                /*       self.child_li.each(function (index,item) {
                           var temp_child_ul=$(item).children("ul"),
                               temp_child_span=$(item).children("span");
                           if(temp_child_ul.length===0&&temp_child_span.length>0)
                           {
                               temp_child_span.remove();
                           }
                       });*/
                //      self.nomain_service_navcnt.each(function(index,item){
                //  var temp_li=$(item).children("li");
                self.parent_li.each(function(indexli,itemli){
                    var back_rest=self.deeploop($(itemli));
                    if(back_rest)
                    {
                        $(itemli).show();
                        $(itemli).parent().children("span").addClass("rotate_angle");
                    }
                });
                //    })
            },
            Event_:function(){

            },
        }
        return this.each(function(){
            new Side_navi(this,options);
        });
    }
    $(".product-navi").side_navi({});
    function searchFn()
    {
        var searchShow=$(".header-search>.search-show"),
            searchClose=$(".header-search>.search-close"),
            searchPlatform=$(".search-platform");
        if(searchShow.length>0)
        {
            searchShow[0].addEventListener("click",function(e){
                if(searchPlatform.length>0)
                {
                    searchPlatform.show();
                    if(searchClose.length>0)
                    {
                        searchClose.css({"display":"flex"});
                        searchShow.hide();
                    }
                }
            })
        }
        if(searchClose.length>0)
        {
            searchClose[0].addEventListener("click",function(e){
                if(searchPlatform.length>0)
                {
                    searchPlatform.hide();
                    if(searchShow.length>0)
                    {
                        searchShow.css({"display":"flex"});
                        searchClose.hide();
                    }
                }
            })
        }
    }
    searchFn();
    function Fn()
    {
        var tempSimple=$(".simply-table");
        tempSimple.each(function(index,item){
            var td=$(item).find("td");
            td.each(function(tdindex,tditem){
                if($(tditem).children("strong").length>0)
                {
                    $(tditem).css({"background":"rgba(112,48,160,1)","color":"rgba(255,255,255,1)"});
                }
            })
        })
    }
    Fn();
});
