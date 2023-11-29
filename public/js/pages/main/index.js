import { initHistories } from '../../history-glide.js';

const projects = document.querySelector('.main-page__projects-list');

if (projects) {
  new Glide(projects, {
    type: 'carousel',
    startAt: 0,
    perView: 6,
    autoplay: 2000,
    breakpoints: {
      1280: {
        perView: 5,
      },
      992: {
        perView: 4,
      },
      768: {
        perView: 3,
      },
      576: {
        perView: 2,
        gap: 0,
      }
    }
  }).mount();
}

initHistories();
