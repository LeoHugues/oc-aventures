function castParallax() {

  var parallaxContainers = $('.parallax-container');

  window.addEventListener("scroll", function(event){

    for (var j = 0; j < parallaxContainers.length; j++) {
      var topParallaxContainer = this.pageYOffset - parallaxContainers[j].offsetTop;

      var heightContainer = parallaxContainers[j].offsetHeight;
      if (topParallaxContainer >= 0 && topParallaxContainer < heightContainer) {
        var layers = document.getElementsByClassName("parallax".concat((j+1).toString()));
        var layer, speed, yPos;
        for (var i = 0; i < layers.length; i++) {
          layer = layers[i];
          speed = layer.getAttribute('data-speed');
          yPos = -(topParallaxContainer * speed / 100);
          layer.setAttribute('style', 'transform: translate3d(0px, ' + yPos + 'px, 0px)');
          layer.setAttribute('style', 'transform: translate3d(0px, ' + yPos + 'px, 0px)');
        }
        parallaxContainers[j].style.transform = 'translate3d(0px, ' + heightContainer - topParallaxContainer + 'px, 0px)';
      }
    }
  });


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
}



function startSite() {

  var platform = navigator.platform.toLowerCase();
  var userAgent = navigator.userAgent.toLowerCase();

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