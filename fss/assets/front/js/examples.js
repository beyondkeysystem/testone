$(document).ready(function() {
    (function() {
        $(".tabs-content li").each(function() {
            if (!$(this).hasClass("active")) {
                $(this).css("display", "none")
            }
        });
        $(".tabs a").click(function() {
            $(this).parent().parent().find("a").removeClass("active");
            $(this).addClass("active");
            $(this).parent().parent().next().find("li").css("display", "none");
            $($(this).attr("href")).css("display", "block");
            return false
        })
    }());
    (function() {
        var c = $("#featured"),
            a = {
                easing: "easeOutBounce",
                timeout: 5500,
				slideClass: "frame"
            };

        function b(d) {
            var e, f;
            if (!$.isEmptyObject(c.data())) {
                f = c.data("current");
                e = $.extend({
                    startingSlide: f
                }, a, d);
                c.zAccordion("destroy", {
                    removeStyleAttr: true,
                    removeClasses: true,
                    destroyComplete: {
                        rebuild: e
                    }
                })
            } else {
                e = $.extend(a, d);
                c.zAccordion(e)
            }
        }
        if (c.length > 0) {
            enquire.register("screen and (min-width: 1169px)", {
                match: function() {
                    c.find("img").each(function() {
                        $(this).attr("src", $(this).attr("data-src-full"));
                        $(this).attr("width", "600");
                        $(this).attr("height", "390")
                    });
                    b({
                        slideWidth: 600,
                        width: 1140,
                        height: 390
                    })
                }
            }, true).register("screen and (min-width: 960px) and (max-width: 1024px)", {
                match: function() {
                    c.find("img").each(function() {
                        $(this).attr("src", $(this).attr("data-src-standard"));
                        $(this).attr("width", "490");
                        $(this).attr("height", "315")
                    });
                    b({
                        slideWidth: 490,
                        width: 932,
                        height: 315
                    })
                }
            }).register("screen and (min-width: 860px) and (max-width: 980px)", {
                match: function() {
                    c.find("img").each(function() {
                        $(this).attr("src", $(this).attr("data-src-standard"));
                        $(this).attr("width", "460");
                        $(this).attr("height", "270")
                    });
                    b({
                        slideWidth: 460,
                        width: 800,
                        height: 270
                    })
                }
            }).register("screen and (min-width: 800px) and (max-width: 859px)", {
                match: function() {
                    c.find("img").each(function() {
                        $(this).attr("src", $(this).attr("data-src-standard"));
                        $(this).attr("width", "460");
                        $(this).attr("height", "248")
                    });
                    b({
                        slideWidth: 380,
                        width: 720,
                        height: 248
                    })
                }
            }).register("screen and (min-width: 768px) and (max-width: 799px)", {
                match: function() {
                    c.find("img").each(function() {
                        $(this).attr("src", $(this).attr("data-src-standard"));
                        $(this).attr("width", "365");
                        $(this).attr("height", "235")
                    });
                    b({
                        slideWidth: 365,
                        width: 694,
                        height: 235
                    })
                }
            }).register("screen and (min-width: 720px) and (max-width: 767px)", {
                match: function() {
                    c.find("img").each(function() {
                        $(this).attr("src", $(this).attr("data-src-standard"));
                        $(this).attr("width", "460");
                        $(this).attr("height", "235")
                    });
                    b({
                        slideWidth: 460,
                        width: 690,
                        height: 235
                    })
                }
            }).register("screen and (min-width: 640px) and (max-width: 719px)", {
                match: function() {
                    c.find("img").each(function() {
                        $(this).attr("src", $(this).attr("data-src-standard"));
                        $(this).attr("width", "460");
                        $(this).attr("height", "210")
                    });
                    b({
                        slideWidth: 320,
                        width: 610,
                        height: 210
                    })
                }
            }).register("screen and (min-width: 568px) and (max-width: 639px)", {
                match: function() {
                    c.find("img").each(function() {
                        $(this).attr("src", $(this).attr("data-src-standard"));
                        $(this).attr("width", "282");
                        $(this).attr("height", "185")
                    });
                    b({
                        slideWidth: 282,
                        width: 540,
                        height: 185
                    })
                }
            }).register("screen and (min-width: 480px) and (max-width: 567px)", {
                match: function() {
                    c.find("img").each(function() {
                        $(this).attr("src", $(this).attr("data-src-tablet"));
                        $(this).attr("width", "250");
                        $(this).attr("height", "160")
                    });
                    b({
                        slideWidth: 250,
                        width: 450,
                        height: 160
                    })
                }
            }).register("screen and (min-width: 360px) and (max-width: 479px)", {
                match: function() {
                    c.find("img").each(function() {
                        $(this).attr("src", $(this).attr("data-src-tablet"));
                        $(this).attr("width", "330");
                        $(this).attr("height", "120")
                    });
                    b({
                        slideWidth: 175,
                        width: 330,
                        height: 120
                    })
                }
            }).register("screen and (max-width: 359px)", {
                match: function() {
                    c.find("img").each(function() {
                        $(this).attr("src", $(this).attr("data-src-mobile"));
                        $(this).attr("width", "170");
                        $(this).attr("height", "110")
                    });
                    b({
                        slideWidth: 170,
                        width: 290,
                        height: 110
                    })
                }
            }).listen(5)
        }
    }());
    (function() {
        if ($("#slideshow").length > 0) {
            $("#slideshow").zAccordion({
                invert: true,
                width: 700,
                height: 390,
                tabWidth: 100
            })
        }
    }());
    (function() {
        var a = $("#splash"),
            b = {
                timeout: 4500,
                speed: 500,
                slideClass: "slide",
                animationStart: function() {
                    $("#splash").find("li.slide-previous div").fadeOut()
                },
                animationComplete: function() {
                    $("#splash").find("li.slide-open div").fadeIn()
                },
                buildComplete: function() {
                    a.find("li.slide-closed div").css("display", "none");
                    a.find("li.slide-open div").fadeIn()
                },
                startingSlide: 1
            };

        function c(d) {
            var e, f;
            if (!$.isEmptyObject(a.data())) {
                f = a.data("current");
                e = $.extend({
                    startingSlide: f
                }, b, d);
                a.zAccordion("destroy", {
                    removeStyleAttr: true,
                    removeClasses: true,
                    destroyComplete: {
                        rebuild: e
                    }
                })
            } else {
                e = $.extend(b, d);
                a.zAccordion(e)
            }
        }
        if (a.length > 0) {
            $("#controls a.goto").click(function() {
                $("#splash").zAccordion("trigger", 3);
                $("#controls p").html("Switching to Slide 4");
                return false
            });
            $("#controls a.startstop").click(function() {
                if ($(this).text() === "Stop") {
                    $("#splash").zAccordion("stop");
                    $("#controls p").html("Slideshow Stopped");
                    $(this).text("Start")
                } else {
                    $("#splash").zAccordion("start");
                    $("#controls p").html("Slideshow Started");
                    $(this).text("Stop")
                }
                return false
            });
            enquire.register("screen and (min-width: 960px)", {
                match: function() {
                    c({
                        slideWidth: 600,
                        width: 1140,
                        height: 390
                    })
                }
            }, true).register("screen and (min-width: 768px) and (max-width: 959px)", {
                match: function() {
                    c({
                        slideWidth: 460,
                        width: 700,
                        height: 235
                    })
                }
            }).listen(5)
        }
    }());
    (function() {
        var a = $("#slider"),
            b = {
                tabWidth: 100,
                speed: 650,
                slideClass: "slider",
                animationStart: function() {
                    $("#slider").find("li.slider-open div").css("display", "none");
                    $("#slider").find("li.slider-previous div").css("display", "none")
                },
                animationComplete: function() {
                    $("#slider").find("li div").fadeIn(600)
                }
            };

        function c(d) {
            var e, f;
            if (!$.isEmptyObject(a.data())) {
                f = a.data("current");
                e = $.extend({
                    startingSlide: f
                }, b, d);
                a.zAccordion("destroy", {
                    removeStyleAttr: true,
                    removeClasses: true,
                    destroyComplete: {
                        rebuild: e
                    }
                })
            } else {
                e = $.extend(b, d);
                a.zAccordion(e)
            }
        }
        if (a.length > 0) {
            enquire.register("screen and (min-width: 960px)", {
                match: function() {
                    c({
                        width: 1140,
                        height: 400
                    })
                }
            }, true).register("screen and (min-width: 768px) and (max-width: 959px)", {
                match: function() {
                    c({
                        width: 700,
                        height: 265
                    })
                }
            }).listen(5)
        }
    }());
    (function() {
        var b = $("#media"),
            a = {
                easing: "easeOutExpo",
                slideClass: "media",
                buildComplete: function() {
                    b.css("visibility", "visible")
                },
                timeout: 5500
            };

        function c(d) {
            var e, f;
            if (!$.isEmptyObject(b.data())) {
                b.css("visibility", "hidden");
                f = b.data("current");
                e = $.extend({
                    startingSlide: f
                }, a, d);
                b.zAccordion("destroy", {
                    removeStyleAttr: true,
                    removeClasses: true,
                    destroyComplete: {
                        afterDestroy: function() {
                            try {
                                console.log("zAccordion destroyed! Attempting to rebuild...")
                            } catch (g) {}
                        },
                        rebuild: e
                    }
                })
            } else {
                b.css("visibility", "hidden");
                e = $.extend(a, d);
                b.zAccordion(e)
            }
        }
        if (b.length > 0) {
            enquire.register("screen and (min-width: 960px)", {
                match: function() {
                    c({
                        slideWidth: 600,
                        width: 1140,
                        height: 345
                    })
                }
            }, true).register("screen and (min-width: 768px) and (max-width: 959px)", {
                match: function() {
                    c({
                        slideWidth: 460,
                        width: 700,
                        height: 265
                    })
                }
            }).register("screen and (min-width: 480px) and (max-width: 767px)", {
                match: function() {
                    c({
                        slideWidth: 250,
                        width: 450,
                        height: 145
                    })
                }
            }).register("screen and (max-width: 479px)", {
                match: function() {
                    if (!$.isEmptyObject(b.data())) {
                        b.zAccordion("destroy", {
                            removeStyleAttr: true,
                            removeClasses: true,
                            destroyComplete: {
                                afterDestroy: function() {
                                    try {
                                        console.log("zAccordion destroyed!")
                                    } catch (d) {}
                                }
                            }
                        })
                    }
                }
            }).listen(5)
        }
    }())
});
$(window).load(function() {
    if ($("#slides").length > 0) {
        $("#slides").zAccordion({
            width: 700,
            slideWidth: 400,
            height: 400,
            buildComplete: function() {
                $("#inner").fadeIn(3000)
            }
        })
    }
});
$(window).load(function() {
    $(".accordion-offset").css({
        position: "static",
        left: 0
    })
});



/***my
$(function(){
var fea=$("#featured"),
feaL=fea.find("li");
feaL.addClass('close_tab');

setTimeout(function(e){
	alert('');
$(document).ready(function(e) {
	if(feaL.css('cursor', 'default') == true){
	  alert('yes');
	}    
});

},5000);

});**/



/***My Js**/

$(document).ready(function(e) {
    var accor = $('.resp-tabs-container');
	accor.find(".resp-accordion:nth-child(1)").addClass("resp-tab-active");
	accor.find(".resp-accordion-closed").removeClass("resp-accordion-closed");
	
});