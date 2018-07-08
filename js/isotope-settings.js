'use strict';

(function() {
var filterButtons = document.querySelectorAll('.terms-buttons-item');
var filterBtnsContainer = document.querySelector('.terms-buttons');
var iso = new Isotope( '.works-list', {
  itemSelector: '.works-item',
  layoutMode: 'fitRows'
});

var onFilterButtonClick = function(event) {
  var filterValue = this.getAttribute('data-filter');
  iso.arrange({ filter: filterValue });
  var checkedButton = filterBtnsContainer.querySelector(".is-checked");
  if (checkedButton) {
    checkedButton.classList.remove("is-checked");
  }
  this.classList.add("is-checked");
}

for(var i=0 ;i<filterButtons.length; i++) {
  filterButtons[i].addEventListener('click',onFilterButtonClick);
}

window.addEventListener('load',function() {
    iso.layout();
  });
}

)();
