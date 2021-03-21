/*
    js of main
    --------------------------
    ** hover Button (letter Effect)
    --------------------------
    ** Effect on Menu for Mobile
    --------------------------
    ** Smooth Scrollspy to (For Navbar)
    --------------------------
    ** Collapse - icon in Collapse
    --------------------------
    ** Dropdown Select for Language
    --------------------------
    ** Hide and Show Password
    --------------------------
    ** animation (page of Fire Report) by anime.js
    --------------------------
    ** loading before open page
    --------------------------
    ** Back to top with progress indicator
    --------------------------
    ** Swiper for Testimonial
    --------------------------
    ** Swiper WorkSpace
    --------------------------
    ** Swiper for Testimonial (Interior)
    --------------------------
    ** Video Modal
    --------------------------
    ** COUNTER-UP JQUERY PLUGIN
    --------------------------
    ** show Toast
    --------------------------
    ** ScrollMagic
    --------------------------
    ** animation on Scroll AOS.js
    --------------------------
    ** Mousehover for dropdown
    --------------------------
    **cover-parallax
    --------------------------

*/

(function ($) {
    "use strict";

    jQuery(document).on("ready", function () {
        /*-----------------------------
      Fixed Navigation
    -----------------------------*/
        if ($("header").offset().top > 50) {
            $("body").addClass("fixed-header");
        } else {
            $("body").removeClass("fixed-header");
        }
        /* Scroll Function */
        $(window).on("scroll", function () {
            /* Fixed Navigation */
            if ($("header").offset().top > 50) {
                $("body").addClass("fixed-header");
            } else {
                $("body").removeClass("fixed-header");
            }
        });

        /*-----------------------------
      hover Button (letter Effect)
    -----------------------------*/

        document.querySelectorAll(".effect-letter").forEach(button => {
            let div = document.createElement("div"),
                letters = button.textContent.trim().split("");

            function elements(letter, index, array) {
                let element = document.createElement("span"),
                    part = index >= array.length / 2 ? -1 : 1,
                    position =
                        index >= array.length / 2 ?
                            array.length / 2 - index + (array.length / 2 - 1) :
                            index,
                    move = position / (array.length / 2),
                    rotate = 1 - move;

                element.innerHTML = !letter.trim() ? "&nbsp;" : letter;
                element.style.setProperty("--move", move);
                element.style.setProperty("--rotate", rotate);
                element.style.setProperty("--part", part);

                div.appendChild(element);
            }

            letters.forEach(elements);

            button.innerHTML = div.outerHTML;

            button.addEventListener("mouseenter", e => {
                if (!button.classList.contains("out")) {
                    button.classList.add("in");
                }
            });

            button.addEventListener("mouseleave", e => {
                if (button.classList.contains("in")) {
                    button.classList.add("out");
                    setTimeout(() => button.classList.remove("in", "out"), 950);
                }
            });
        });

        /*-----------------------------
      Effect on Menu for Mobile
    -----------------------------*/
        document.querySelectorAll(".menu").forEach(btn => {
            btn.addEventListener("click", e => {
                btn.classList.toggle("active");
            });
        });

        /*-----------------------------
      Smooth Scrollspy to (For Navbar)
    -----------------------------*/

        // Add scrollspy to <body>
        $("body").scrollspy({target: ".navbar", offset: 50});

        // Add smooth scrolling on all links inside the navbar
        $("#myNavbar a").on("click", function (event) {
            // Make sure this.hash has a value before overriding default behavior
            if (this.hash !== "") {
                // Prevent default anchor click behavior
                event.preventDefault();

                // Store hash
                var hash = this.hash;

                // Using jQuery's animate() method to add smooth page scroll
                // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
                $("html, body").animate({
                        scrollTop: $(hash).offset().top
                    },
                    800,
                    function () {
                        // Add hash (#) to URL when done scrolling (default click behavior)
                        window.location.hash = hash;
                    }
                );
            } // End if
        });

        /*-----------------------------
      Collapse - icon in Collapse
    -----------------------------*/
        $(".collapse").on("show.bs.collapse", function () {
            $(this)
                .siblings(".card-header")
                .addClass("active");
        });

        $(".collapse").on("hide.bs.collapse", function () {
            $(this)
                .siblings(".card-header")
                .removeClass("active");
        });

        /*-----------------------------
      Dropdown Select for Language
    -----------------------------*/
        $("select[data-menu]").each(function () {
            let select = $(this),
                options = select.find("option"),
                menu = $("<div />").addClass("select-menu"),
                button = $("<div />").addClass("button"),
                list = $("<ul />"),
                arrow = $("<em />").prependTo(button);

            options.each(function (i) {
                let option = $(this);
                list.append($("<li />").text(option.text()));
            });

            menu.css("--t", select.find(":selected").index() * -41 + "px");

            select.wrap(menu);

            button.append(list).insertAfter(select);

            list.clone().insertAfter(button);
        });

        $(document).on("click", ".select-menu", function (e) {
            let menu = $(this);

            if (!menu.hasClass("open")) {
                menu.addClass("open");
            }
        });

        $(document).on("click", ".select-menu > ul > li", function (e) {
            let li = $(this),
                menu = li.parent().parent(),
                select = menu.children("select"),
                selected = select.find("option:selected"),
                index = li.index();

            menu.css("--t", index * -41 + "px");
            selected.attr("selected", false);
            select
                .find("option")
                .eq(index)
                .attr("selected", true);

            menu.addClass(index > selected.index() ? "tilt-down" : "tilt-up");

            setTimeout(() => {
                menu.removeClass("open tilt-up tilt-down");
            }, 500);
        });

        $(document).on("click", e => {
            e.stopPropagation();
            if ($(".select-menu").has(e.target).length === 0) {
                $(".select-menu").removeClass("open");
            }
        });

        /*-----------------------------
      Hide and Show Password
    -----------------------------*/
        $("#show_hide_password").on("click", "a", function (event) {
            event.preventDefault();
            if ($("#show_hide_password input").attr("type") == "text") {
                $("#show_hide_password input").attr("type", "password");
                $("#show_hide_password .hide_show span").addClass(
                    "hidden_outlined"
                );
                $("#show_hide_password .hide_show span").removeClass(
                    "visible_outlined"
                );
            } else if (
                $("#show_hide_password input").attr("type") == "password"
            ) {
                $("#show_hide_password input").attr("type", "text");
                $("#show_hide_password .hide_show span").removeClass(
                    "hidden_outlined"
                );
                $("#show_hide_password .hide_show span").addClass(
                    "visible_outlined"
                );
            }
        });

        /*-----------------------------
      loading before open page
    -----------------------------*/
        // Fakes the loading setting a timeout
        setTimeout(function () {
            $("body").addClass("loaded_page");
        }, 3000);

        /*-----------------------------
      Back to top with progress indicator
    -----------------------------*/
        var progressPath = document.querySelector(".prgoress_indicator path");
        var pathLength = progressPath.getTotalLength();
        progressPath.style.transition = progressPath.style.WebkitTransition =
            "none";
        progressPath.style.strokeDasharray = pathLength + " " + pathLength;
        progressPath.style.strokeDashoffset = pathLength;
        progressPath.getBoundingClientRect();
        progressPath.style.transition = progressPath.style.WebkitTransition =
            "stroke-dashoffset 10ms linear";
        var updateProgress = function () {
            var scroll = $(window).scrollTop();
            var height = $(document).height() - $(window).height();
            var progress = pathLength - (scroll * pathLength) / height;
            progressPath.style.strokeDashoffset = progress;
        };
        updateProgress();
        $(window).on("scroll", updateProgress);
        var offset = 250;
        var duration = 550;
        jQuery(window).on("scroll", function () {
            if (jQuery(this).scrollTop() > offset) {
                jQuery(".prgoress_indicator").addClass("active-progress");
            } else {
                jQuery(".prgoress_indicator").removeClass("active-progress");
            }
        });
        jQuery(".prgoress_indicator").on("click", function (event) {
            event.preventDefault();
            jQuery("html, body").animate({scrollTop: 0}, duration);
            return false;
        });

        /*-----------------------------
      Slider and Swiper for Testimonial
    -----------------------------*/
        var galleryThumbs = new Swiper(".img_persong", {
            spaceBetween: 10,
            slidesPerView: 4,
            freeMode: true,
            watchSlidesVisibility: true,
            watchSlidesProgress: true
        });
        var galleryTop = new Swiper(".content_swiper", {
            spaceBetween: 10,
            autoplay: {
                delay: 2500,
                disableOnInteraction: true
            },
            thumbs: {
                swiper: galleryThumbs
            }
        });

        /*-----------------------------
      Swiper WorkSpace
    -----------------------------*/
        var galleryThumbs = new Swiper(".person_thumbs", {
            spaceBetween: 10,
            slidesPerView: 4,
            freeMode: true,
            watchSlidesVisibility: true,
            watchSlidesProgress: true
        });
        var galleryTop = new Swiper(".swipe_circle", {
            spaceBetween: 10,
            autoplay: {
                delay: 2500,
                disableOnInteraction: true
            },
            thumbs: {
                swiper: galleryThumbs
            }
        });

        /*-----------------------------
    Slider and Swiper for Testimonial (Interior)
    -----------------------------*/
        var swiper = new Swiper(".swiper_default", {
            pagination: {
                el: ".swiper-pagination",
                dynamicBullets: true
            },
            autoplay: {
                delay: 2500,
                disableOnInteraction: true
            }
        });

        /*-----------------------------
      swip__topic
    -----------------------------*/

        var swiper = new Swiper(".swipe_basic_topic", {
            slidesPerView: 4,
            spaceBetween: 30,
            freeMode: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false
            },
            breakpoints: {
                240: {
                    slidesPerView: 1,
                    spaceBetween: 0
                },
                540: {
                    slidesPerView: 2,
                    spaceBetween: 20
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 40
                },
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 30
                }
            }
        });

        /*-----------------------------
      feature_strories
    -----------------------------*/

        var swiper = new Swiper(".feature_strories", {
            slidesPerView: 4,
            spaceBetween: 30,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev"
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true
            },
            breakpoints: {
                240: {
                    slidesPerView: 1,
                    spaceBetween: 0
                },
                540: {
                    slidesPerView: 2,
                    spaceBetween: 20
                },
                768: {
                    slidesPerView: 3,
                    spaceBetween: 40
                },
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 30
                }
            }
        });

        /*-----------------------------
      countdown Timer
    -----------------------------*/
        $(".countdown").countdown();

        /*-----------------------------
      progress-bar
    -----------------------------*/
        const delay = 400;
        $(".progress-bar").each(function (i) {
            $(this)
                .delay(delay * i)
                .animate({
                        width: $(this).attr("aria-valuenow") + "%"
                    },
                    delay
                );
        });

        /*-----------------------------
      bxslider for Logos (animation like news)
    -----------------------------*/
        $(".bxslider").bxSlider({
            minSlides: 1,
            maxSlides: 8,
            slideWidth: 160,
            slideMargin: 0,
            ticker: true,
            speed: 20000
        });

        /*-----------------------------
      COUNTER-UP JQUERY PLUGIN
    -----------------------------*/
        $(".counter").counterUp({
            delay: 10,
            time: 1000
        });

        /*-----------------------------
      swiper__center
    -----------------------------*/
        var swiper = new Swiper(".swiper__center", {
            slidesPerView: 3,
            centeredSlides: false,
            spaceBetween: 30,
            grabCursor: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev"
            },
            breakpoints: {
                240: {
                    slidesPerView: 1,
                    spaceBetween: 20
                },
                540: {
                    slidesPerView: 2,
                    spaceBetween: 20
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 40
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 30
                }
            }
        });

        /*-----------------------------
      Mousehover for dropdown
    -----------------------------*/
        $(".dropdown.dropdown-hover").hover(
            function () {
                $(this).addClass("show");
            },
            function () {
                $(this).removeClass("show");
            }
        );

        $(".dropdown-submenu.dropdown-hover").hover(
            function () {
                $(this).addClass("show");
            },
            function () {
                $(this).removeClass("show");
            }
        );

        /*-----------------------------
    Dropdown menu for mobile
  -----------------------------*/
        var coll = document.getElementsByClassName("dropdown_menu");
        var i;

        for (i = 0; i < coll.length; i++) {
            coll[i].addEventListener("click", function () {
                this.classList.toggle("active");
                var content = this.nextElementSibling;
                if (content.style.height) {
                    content.style.height = null;
                } else {
                    content.style.height = content.scrollHeight + "px";
                }
            });
        }

        // End.
    });

    /*-----------------------------
    Video Modal
  -----------------------------*/
    // Gets the video src from the data-src on each button
    var $videoSrc;
    $(".btn_video").on("click", function () {
        $videoSrc = $(this).data("src");
    });

    console.log($videoSrc);

    // when the modal is opened autoplay it
    $("#mdllVideo").on("shown.bs.modal", function (e) {
        // set the video src to autoplay and not to show related video. Youtube related video is like a box of chocolates... you never know what you're gonna get
        $("#video").attr(
            "src",
            $videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0"
        );
    });

    // stop playing the youtube video when I close the modal
    $("#mdllVideo").on("hide.bs.modal", function (e) {
        // a poor man's stop video
        $("#video").attr("src", $videoSrc);
    });

    /*-----------------------------
    show Toast after (8000)
  -----------------------------*/
    setTimeout(() => {
        $("#myTost").toast("show");
    }, 8000);

    /*-----------------------------
    animation on Scroll AOS.js
  -----------------------------*/
    AOS.init({
        easing: "ease-in-out", // default easing for AOS animations
        once: false, // whether animation should happen only once - while scrolling down
        duration: 500 // values from 0 to 3000, with step 50ms
    });

    /*-----------------------------
    cover-parallax
  -----------------------------*/
    var image = document.getElementsByClassName("cover-parallax");
    new simpleParallax(image, {
        delay: 0.6,
        transition: "cubic-bezier(0,0,0,1)"
    });

    var image = document.getElementsByClassName("basic-parallax");
    new simpleParallax(image, {
        delay: 0.6,
        transition: "cubic-bezier(0,0,0,1)"
    });

    var image = document.getElementsByClassName("horizontal-parallax");
    new simpleParallax(image, {
        orientation: "right"
    });

    var image = document.getElementsByClassName("scale-parallax");
    new simpleParallax(image, {
        scale: 1.5
    });

    var image = document.getElementsByClassName("transition-parallax");
    new simpleParallax(image, {
        delay: 0.6,
        transition: "cubic-bezier(0,0,0,1)"
    });

    /*-----------------------------
    Checkbox Select
  -----------------------------*/
    $(".checkbox-item .item-select").on("click", function () {
        $(this)
            .parent()
            .find(".item-select.active")
            .removeClass("active");
        $(this).addClass("active");
    });

    /*-----------------------------
      feature_strories
    -----------------------------*/

    var swiper = new Swiper(".blog-slider", {
        slidesPerView: 3,
        spaceBetween: 30,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev"
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true
        },
        breakpoints: {
            240: {
                slidesPerView: 1,
                spaceBetween: 20
            },
            540: {
                slidesPerView: 2,
                spaceBetween: 20
            },
            768: {
                slidesPerView: 2,
                spaceBetween: 20
            },
            1024: {
                slidesPerView: 3,
                spaceBetween: 30
            }
        }
    });

    /*-----------------------------
      swiper_vertical
    -----------------------------*/
    var swiper = new Swiper(".swiper_vertical", {
        direction: "vertical",
        slidesPerView: 1,
        paginationClickable: true,
        spaceBetween: 20,
        loop: true,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true
        }
        // mousewheel: {
        //   enable: true
        // },
    });

    /*-----------------------------
     tooltip
   -----------------------------*/
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });

    /*-----------------------------
   fixSide_scroll
 -----------------------------*/
    var sticky = new Sticky(".fixSide_scroll");
})(jQuery);


let post_id = "";
let has_next_page = false;
let end_cursor = "";
let count = 0;
let comments = [];
let post_img = "";
let type = "";

function getComments() {
    var instagramPostUrl = $("#scanner-text").val();
    var commentsCount = $("#comment-count").val();

    if (instagramPostUrl !== "") {
        var res = instagramPostUrl.split("/");
        post_id = res[res.length - 2];

        if (post_id !== "") {
            $("#progress-bar").show();

            $.ajax({
                type: "GET",
                url: "/instagram/comments/p/" + post_id + "/",
                error: function () {
                    $("#progress-bar").hide();
                    $("#error-text").html("please enter a validate url");
                },
                success: function (data) {
                    setTimeout(function () {

                        
                        comments = data.comments;
                        has_next_page = data.has_next_page;
                        end_cursor = data.end_cursor;
                        count = data.count;
                        post_img = data.post_img;

                        $("#count").html(count);
                        $("#post-img").attr("src", post_img);
                        if (has_next_page && comments.length < commentsCount){
                            console.log('load more');
                            loadMoreComment();
                        } else {
                            $("#progress-bar").hide();
                            $("#search-area").hide();
                            $("#comments-area").show();
                        }
                    }, 3000);
                }
            });
        }
    } else {
        $("#progress-bar").hide();
        $("#error-text").html("* Please enter an instagram post url");
        $("#scanner-text").addClass("border-danger");
    }
}


function loadMoreComment() {

    var more_comments_url = 'https://www.instagram.com/graphql/query/?query_hash=bc3296d1ce80a24b1b6e40b1e72903f5&variables={"shortcode":"' +post_id +'","first":50,"after":"' +end_cursor +'"}';

    console.log(more_comments_url);
    $.ajax({
        type: "GET",
        url: more_comments_url,
        success: function (data) {
            var d = data;
            console.log(d);
            try {
                for (var i = 0; i < d.data.shortcode_media.edge_media_to_parent_comment.edges.length; i++)
                    comments.push(
                        d.data.shortcode_media.edge_media_to_parent_comment
                            .edges[i]
                    );

                has_next_page =
                    d.data.shortcode_media.edge_media_to_parent_comment
                        .page_info.has_next_page;

                end_cursor =
                    d.data.shortcode_media.edge_media_to_parent_comment
                        .page_info.end_cursor;
            } catch (error) {
                has_next_page = false;
                end_cursor = "";
            }

            if (has_next_page && comments.length < commentsCount) {
                loadMoreComment();
            } else {
                $("#progress-bar").hide();
                $("#search-area").hide();
                $("#comments-area").show();
                $(".navigator")
                    .find(".item:nth-child(2)")
                    .removeClass("active");
                $(".navigator")
                    .find(".item:nth-child(3)")
                    .addClass("active");
            }
        }
    });
}


$('#error-btn').on('click', function () {
    console.log('try again')
    $("#progress-bar").hide();
    $("#comments-area").hide();
    $("#winners-area").hide();
    $("#error-area").hide();
    $("#search-area").show();
});


function findWinners() {
    $("#progress-bar").show();
    setTimeout(function () {
            var winner = $("#winner").val(); // winners_count
            var mention = $("#min-mention").val(); // mention_count
            var timer = $("#timer"); // timer


            var new_arr = [];
            var arr_winner = [];

            // loop over commets array
            for (var i = 0; i < comments.length; i++) {

                // split comment into array
                var c = comments[i].node.text.split(" ");


                // x refered to number of mentions
                var x = 0;

                //check mentions
                if (c.length >= Number(mention)) {
                    for (var i2 = 0; i2 < c.length; i2++) {
                        if (c[i2].substring(0, 1) == "@" && c[i2].length >= 5) {
                            // if is a mention
                            x++;
                        }
                    }
                }

                // if number of mention > or = x add this comment to new_arr
                if (x >= Number(mention)) {
                    new_arr.push(comments[i]);
                }
            }

            if (new_arr.length == 0) {
                // there no winner
                $("#progress-bar").hide();
                $("#winners-area").hide();
                $("#comments-area").hide();
                $("#error-area").show();
            }

            // check if new arr is bigger than number of winners
            else if (new_arr.length <= Number(winner)) {

                arr_winner = new_arr;
            } else {
                for (var i = 0; i < Number(winner); i++) {


                    // get randome number start from 0 to new_array.lenght
                    var r = Math.floor(Math.random() * new_arr.length);

                    //. winner id
                    var uid = new_arr[r].node.owner.id;

                    // add winner to winners_array
                    arr_winner.push(new_arr[r]);
                    //new_arr.splice(r, 1);

                    //remove same users
                    var l = new_arr.length;

                    for (i2 = 0; i2 < l; i2++) {
                        var index = new_arr.findIndex(n => n.node.owner.id == uid);
                        if (index > -1) new_arr.splice(index, 1);
                    }
                }
            }

            //print winners
            for (var i = 0; i < arr_winner.length; i++) {
                var u = arr_winner[i].node;


                $("#winners").append(
                    '<div class="col-12 col-md-6 " style="padding: 15px"><a target="_blank"  href="https://www.instagram.com/' + u.owner.username + '/"> <div class="winner card "> <br> <br> <div id="img-container"> <img style="height: 100px;width: 100px; border-radius: 50%; border: 2px solid red" src="' + u.owner.profile_pic_url + '" alt="" class="winner-img"> </div> <br> <br> <div><span id="winner-name">' + u.owner.username + '</span></div> <br> <br> <div><p id="winner-comment" style="padding: 10px">' + u.text + '</p></div> </div></a> </div>'
                );
            }


            // push to serve

            $.ajax({
                type: "POST",
                url: 'http://127.0.0.1:8000/api/instaUrl',
                data: {
                    'winners': arr_winner,
                    'scrapped_comments': comments,
                    'post_id': post_id,
                    'mentions': mention,
                    'comment_count': count,
                    'like_count': null,
                    'quantite': 66,
                    'timer': null,
                    'keyword': null,
                    'user_id': $('meta[name="user_id"]').attr('content')
                }

            });


            $("#progress-bar").hide();
            $("#comments-area").hide();
            $("#winners-area").show();


            var data = {
                post: $("#scanner-text").val(),
                comments: comments.length,
                winners: arr_winner.length
            };


        }

        ,
        3000
    );
}
