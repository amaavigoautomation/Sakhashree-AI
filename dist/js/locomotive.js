const scroll = new LocomotiveScroll({
    el: document.querySelector('#mainwrapper'),
    smooth: true
});

scroll.on('scroll', (instance) => {
    if (instance.scroll.y > 39) {
      $(".topband").addClass("active");
    } else {
      $(".topband").removeClass("active");
    }
  });