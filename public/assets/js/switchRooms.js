
const hamburger = document.querySelector('.header-hamburger-icon');
const standardTableSelector = document.querySelector('#standard-table')
const executiveTableSelector = document.querySelector('#executive-table')
const kingTableSelector = document.querySelector('#king-table')

standardTableSelector.addEventListener('click', () => {
  standardTableSelector.classList.add('active-header');
  executiveTableSelector.classList.remove('active-header');
  kingTableSelector.classList.remove('active-header');
});

executiveTableSelector.addEventListener('click', () => {
  executiveTableSelector.classList.add('active-header');
  standardTableSelector.classList.remove('active-header');
  kingTableSelector.classList.remove('active-header');
});

kingTableSelector.addEventListener('click', () => {
  kingTableSelector.classList.add('active-header');
  standardTableSelector.classList.remove('active-header');
  executiveTableSelector.classList.remove('active-header');
});
