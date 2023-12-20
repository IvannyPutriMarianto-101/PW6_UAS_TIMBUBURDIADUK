//Toggle class active untuk  humburger menu
const navbarNav = document.querySelector('.navbar-nav');
//Toggle class active untuk  search form

const searchForm = document.querySelector('.search-form');
const searchBox = document.querySelector('#search-box');

document.querySelector('#search-button').onclick = (e) => {
  searchForm.classList.toggle('active');
  searchBox.focus();
  e.preventDefault();
};

// Sticky
window.addEventListener("scroll",function(){
  var nav = document.querySelector("nav");
  nav.classList.toggle("sticky",window.scrollY > 0)
})

// klik di luar elemen

const menu = document.querySelector('#menu');
const sb = document.querySelector('#search-button');


// ketika menu di klik
document.querySelector('#menu').onclick = () => {
  navbarNav.classList.toggle('active');
};

document.addEventListener('click', function (e) {
  if (!menu.contains(e.target) && !navbarNav.contains(e.target)) {
    navbarNav.classList.remove('active');
  }
  if (!sb.contains(e.target) && !searchForm.contains(e.target)) {
    searchForm.classList.remove('active');
  }

});

// Modal Box
const itemDetailModal = document.querySelector('#item-detail-modal');
const itemDetailButton = document.querySelectorAll('.item-detail-button');

itemDetailButton.forEach((btn) => {
  btn.onclick = (e) => {
    itemDetailModal.style.display = 'flex';
    e.preventDefault();
  };
});


//  Klik Tombol Close
document.querySelector('.modal .close-icon').onclick = (e) => {
  itemDetailModal.style.display = 'none';
  e.preventDefault();
};

// Klik diluar Modal

window.onclick = (e) => {
  if (e.target === itemDetailModal) {
    itemDetailModal.style.display = 'none';
  }
};

