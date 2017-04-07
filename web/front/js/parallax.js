function castParallax() {
  changerLesClassPourAnimerLaTyro();
  var parallaxContainers = $('.parallax-container');
  var heightContainers = [parallaxContainers[0].offsetHeight, parallaxContainers[1].offsetHeight];

  window.addEventListener("scroll", function(event){

    for (var j = 0; j < parallaxContainers.length; j++) {
      var heightContainer = heightContainers[j];
      
      // Si c'est le premier parallax et si on est toujours sur lui
      if (j == 0 && this.pageYOffset < heightContainer) {
        effetParallax(this.pageYOffset, j);
      } else if (j == 1 &&
          this.pageYOffset >= parallaxContainers[j].offsetTop - 500 &&
          this.pageYOffset < parallaxContainers[j].offsetTop + heightContainer - 200) {

        effetParallax(this.pageYOffset - parallaxContainers[j].offsetTop, j);
      }
    }
  });
}

function effetParallax(pageYOffset, numParallax) {
  var layers = document.getElementsByClassName("parallax".concat((numParallax+1).toString()));
  var layer, speed, yPos;
  for (var i = 0; i < layers.length; i++) {
    layer = layers[i];
    speed = layer.getAttribute('data-speed');
    yPos = -(pageYOffset * speed / 100);
    if (layer.id == 'keyart2-3') {
      var xPos = yPos*15;
      yPos = Math.round(yPos*0.3);
      layer.setAttribute('style', 'transform: translate3d(' + xPos + 'px, 0px, 0px)');
    } else {
      layer.setAttribute('style', 'transform: translate3d(0px, ' + yPos + 'px, 0px)');
    }
  }
}

function optimisationYoutubeIframe() {
  /* Light YouTube Embeds by @labnol */
  /* Web: http://labnol.org/?p=27941 */

  document.addEventListener("DOMContentLoaded",
    function() {
      var div, n,
          v = document.getElementsByClassName("youtube-player");
      for (n = 0; n < v.length; n++) {
        div = document.createElement("div");
        div.setAttribute("data-id", v[n].dataset.id);
        div.innerHTML = labnolThumb(v[n].dataset.id);
        div.onclick = labnolIframe;
        v[n].appendChild(div);
      }
    });
}

function labnolThumb(id) {
  var thumb = '<img src="https://i.ytimg.com/vi/ID/hqdefault.jpg">',
      play = '<div class="play"></div>';
  return thumb.replace("ID", id) + play;
}

function labnolIframe() {
  var iframe = document.createElement("iframe");
  var embed = "https://www.youtube.com/embed/ID?autoplay=1";
  iframe.setAttribute("src", embed.replace("ID", this.dataset.id));
  iframe.setAttribute("frameborder", "0");
  iframe.setAttribute("allowfullscreen", "1");
  this.parentNode.replaceChild(iframe, this);
}

function dispelParallax() {
  $("#nonparallax").css('display','block');
  $("#parallax").css('display','none');
}

function castSmoothScroll() {
  $.srSmoothscroll({
    step: 80,
    speed: 300,
    ease: 'linear'
  });

  // Add smooth scrolling to all links
  $("a").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top - 100
      }, 800, function(){

        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
}

function changerLesClassPourAnimerLaTyro() {
  $('#keyart2-3').removeClass('keyartTyroForIOSDevice');
  $('#keyart2-3').addClass('keyartTyro');
}

function startSite() {
  var platform = navigator.platform.toLowerCase();
  optimisationYoutubeIframe();

  if ( platform.indexOf('ipad') != -1  ||  platform.indexOf('iphone') != -1 )
  {
    dispelParallax();
  }

  else if (platform.indexOf('win32') != -1 || platform.indexOf('linux') != -1)
  {
    castParallax();
    if ($.browser.webkit)
    {
      castSmoothScroll();
    }
  }

  else
  {
    castParallax();
  }

}

document.body.onload = startSite();