/*
 *  Document   : be_ui_icons.js
 *  Author     : pixelcave
 *  Description: Custom JS code used in Icons Page
 */

class pageIcons {
  /*
   * Icon Search functionality
   *
   */
  static iconSearch() {
    let searchItems = document.querySelectorAll('.js-icon-list > div > code');
    let searchForm = document.querySelector('.js-form-icon-search');
    let searchInput = document.querySelector('.js-icon-search');
    let searchValue = '';

    // Disable form submission
    searchForm.addEventListener('submit', e => e.preventDefault());

    // When user types
    searchInput.addEventListener('keyup', e => {
      searchValue = searchInput.value;

      if (searchValue.length > 2) { // If ore than 2 characters, search the icons
        searchItems.forEach(item => {
          if (item.textContent.includes(searchValue)) {
            item.parentNode.classList.remove('d-none');
          } else {
            item.parentNode.classList.add('d-none');
          }
        });
      } else if (searchValue.length === 0) { // If text was deleted, show all icons
        searchItems.forEach(item => {
          item.parentNode.classList.remove('d-none');
        });
      }
    });
  }

  /*
   * Init functionality
   *
   */
  static init() {
    this.iconSearch();
  }
}

// Initialize when page loads
One.onLoad(pageIcons.init());