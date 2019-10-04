/* >>>>>>>>>> SMOOTH SCROLL <<<<<<<<<< */
$(document).ready(function(){
    $("a").on('click', function(event) {
        if (this.hash !== "") {
            event.preventDefault();
            var hash = this.hash;
            if ((hash.includes("carousel") || hash.includes("Carousel")) == false) {
              $('html, body').animate({
                  scrollTop: ($(hash).offset().top - $('#menu').innerHeight())
              }, 800, function(){
                  history.pushState(null,null,hash);
              });
            }
        }
    });
});


/* Display commentaries */
function showCommentaries(type){
  var commentaries = document.getElementsByClassName('commentary');
  var commentarySelected = 0;
  var commentaryToShow = 0;
  var nbCommentaries = commentaries.length;

  for(var i=0 ; i<nbCommentaries ; i++){
    if(commentaries[i].classList.contains("d-block")){
      commentarySelected = i;
      break;
    }
  }

  if(type == 1){
    if(commentarySelected != 0)
      commentaryToShow = commentarySelected - 1;
    else
      commentaryToShow = nbCommentaries -1;
  }
  else{
    if(commentarySelected != (nbCommentaries -1))
      commentaryToShow = commentarySelected + 1;
    else
      commentaryToShow = 0;
  }

  for(var i=0 ; i<commentaries.length ; i++){
    if(i == commentaryToShow){
      commentaries[i].classList.remove('d-none');
      commentaries[i].classList.add('d-block');
      show(commentaries[i]);
    }
    else{
      commentaries[i].classList.remove('d-block');
      commentaries[i].classList.add('d-none');
    }
  }
}

/* Display an element by increasing his opacity */
function show(showEle){
  showEle.style.opacity = 0;
  var i = 0;
  fadeIn(showEle,i);

  function fadeIn(showEle,i){
    i = i + 0.05;
    seto(showEle,i);
    if (i<1){
      setTimeout(function(){
        fadeIn(showEle,i);
      }, 40);
    }
  }

  function seto(el,i){
    el.style.opacity = i;
  }
}

/* CAROUSEL */
$('#myCarousel').carousel({
  interval: 10000
})

$('.carousel .carousel-item').each(function(){
    var minPerSlide = 3;
    var next = $(this).next();
    if (!next.length) {
    next = $(this).siblings(':first');
    }
    next.children(':first-child').clone().appendTo($(this));

    for (var i=0;i<minPerSlide;i++) {
        next=next.next();
        if (!next.length) {
        	next = $(this).siblings(':first');
      	}

        next.children(':first-child').clone().appendTo($(this));
      }
});

/* Progress bar */
$(function() {
  $(".progress").each(function() {
    var value = $(this).attr('data-value');
    var left = $(this).find('.progress-left .progress-bar');
    var right = $(this).find('.progress-right .progress-bar');

    if (value > 0) {
      if (value <= 50) {
        right.css('transform', 'rotate(' + percentageToDegrees(value) + 'deg)')
      } else {
        right.css('transform', 'rotate(180deg)')
        left.css('transform', 'rotate(' + percentageToDegrees(value - 50) + 'deg)')
      }
    }
  })

  function percentageToDegrees(percentage) {
    return percentage / 100 * 360
  }
});


/* Features */
function overFeature(el, nb){
  var container = el.getElementsByClassName('img-element');
  var images = container[0].getElementsByTagName('img');
  images[0].src = "img/bg_feature_1.png";
  images[1].src = "img/bg_feature_2.png";
}

function leaveFeature(el){
  var container = el.getElementsByClassName('img-element');
  var images = container[0].getElementsByTagName('img');
  images[0].src = "img/bg_feature_2.png";
  images[1].src = "img/bg_feature_1.png";
}


/* Fix features bug */
window.onresize = function(event) {
  var elements = document.getElementsByClassName('img-element');

  if(document.body.clientWidth <= 576 && document.body.clientWidth >= 419){
    for(var i=0 ; i<elements.length ; i++){
      elements[i].classList.remove("px-0");
    }
  }
  else {
    for(var i=0 ; i<elements.length ; i++){
      elements[i].classList.add("px-0");
    }
  }
};

/* Accept cookies */
function acceptCookie(){
  document.getElementById('cookieBar').style.display = "none";
}

/* Scroll top Button */
mybutton = document.getElementById("myBtn");

window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

function topFunction() {
  $('body,html').animate({
        scrollTop : 0
    }, 500);
}

/* Number count */
var observer = new IntersectionObserver(function(entries) {
	if(entries[0].isIntersecting === true){
    $('.countNumber').each(function () {
        $(this).prop('Counter',0).animate({
            Counter : $(this).data('value')
        }, {
            duration: $(this).data('value') * 15,
            easing: 'swing',
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
        });
    });

    observer.unobserve(document.querySelector("#fact"));
  }
}, { threshold: [1] });

observer.observe(document.querySelector("#fact"));


/* Navbar sticky */
var padding_apply = false;

$( window ).on("load", function() {
  window.onscroll = function() {myFunction()};

  var navbar = document.getElementById("menu");
  var sticky = navbar.offsetTop;

  function myFunction() {
    if (window.pageYOffset  >= sticky) {
      navbar.classList.add("sticky");
      if(padding_apply == false){
        $('body').css('padding-top', $('#menu').innerHeight());
        padding_apply = true;
      }
    } else {
      navbar.classList.remove("sticky");
      if(padding_apply == true){
        $('body').css('padding-top', 0);
        padding_apply = false;
      }
    }
  }
});
