document.addEventListener('DOMContentLoaded', function () {
  const removeContentBtn = document.getElementById('cuahang');
  const insertCategoriesContainer = document.getElementById('index_home_page');

  removeContentBtn.addEventListener('click', function () {
    insertCategoriesContainer.innerHTML = '';
    fetch('./web_page/cuahang.php')
      .then(response => response.text())
      .then(data => {
        insertCategoriesContainer.innerHTML = data;
        window.history.pushState('', '', './web_page/cuahang.php');
      })
      .catch(error => console.error('Error:', error));
    event.preventDefault();
  });
});

// if (window.location.href.indexOf('?homepage') === -1) {
//   window.history.pushState('', '', window.location.href + '?homepage');
// }