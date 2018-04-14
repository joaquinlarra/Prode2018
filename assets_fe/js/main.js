$(document).ready(function () {
  if ($(window).width() > 768) {
    var tour = introJs()
    tour.setOptions({ doneLabel: 'Listo', showBullets: false }).start()

    $('#sticker').sticky({ topSpacing: 0, zIndex: 9999 })
  }
})
