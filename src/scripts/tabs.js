'use strict';
exports.Tabs = () => {
  if( document.querySelector('.picotab') ){
    const picotab = document.querySelector('.picotab');
    const tab = ( ) => {
        let active = picotab.querySelector('.active');
        let active_class = active.getAttribute('data-tab');
        // Get all elements with class="tabcontent" and hide them
        let tabcontent = document.getElementsByClassName('fields-wrapper');
        for (let i = 0; i < tabcontent.length; i++) {
          tabcontent[i].style.display = 'none';
        }
        let tablinks = document.getElementsByClassName(active_class);
        for (let i = 0; i < tablinks.length; i++) {
          tablinks[i].style.display = '';
        }
    }
    // Add event listener to table
    const el = picotab.querySelectorAll(".tablinks");
    for (let i = 0; i < el.length; i++) {
        el[i].addEventListener("click", ( event ) => {
            event.preventDefault();
            let active = picotab.querySelectorAll('.active');
            for (let j = 0; j < active.length; j++) {
              active[ j ].classList.remove("active");
            }
            event.target.classList.add("active");
            tab();
        } );
    }
    tab();
  }

};
