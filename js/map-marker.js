'use strict';

(function() {

  var map = document.getElementById('sweetcake-map');
  var marker = map.querySelector('sweetcake-map-marker');
    console.log(marker);
    //marker = marker[0];
    //console.log(marker);
    marker.addEventListener('click', function(event){
      event.preventDefault();
      if (marker.classList.contains('closed')) {
        marker.classList.remove('closed');
        marker.classList.add('opened');
      }
      else {
        console.log('1');
        marker.classList.remove('opened');
        marker.classList.add('closed');
      }
    });

})();
