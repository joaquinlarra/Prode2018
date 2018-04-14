$(document).ready(function () {
  if ($(window).width() < 768) {
  } else {
    var tour = introJs()
    tour.setOptions({ doneLabel: 'Listo', showBullets: false }).start()
  }
})
