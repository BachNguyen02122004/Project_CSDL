const endpoint = '../php/indexdata.php'; // Relative path to the PHP file
let pageNumber = 1;

// Function to handle page change
function handlePageChange(page) {
  // Update the current page
  pageNumber = page;
  // Update the URL with the new page number
  const url = `${endpoint}?pageNumber=${pageNumber}`;
  
  fetchData(url);

  // Update active state of page links
  updateActivePage(page);
}
// fetch data-product
function fetchData(url) {
  fetch(url, {
    method: 'GET',
    headers: {
      'Content-Type': 'application/json',
    },
  })
    .then(response => {
      if (!response.ok) {
        throw new Error('Network response was not ok');
      }
      return response.text();
    })
    .then(htmlResponse => {
      document.getElementById('main_page').innerHTML = htmlResponse;
    })
    .catch(error => {
      console.error('There has been a problem with your fetch operation:', error);
    });
}
// đổi page active
function updateActivePage(page) {
  const pageLinks = document.getElementsByClassName('pagination-item__link');
  for (let i = 0; i < pageLinks.length; i++) {
    const link = pageLinks[i];
    if (parseInt(link.textContent) === page) {
      link.parentElement.classList.add('pagination-item--active');
    } else {
      link.parentElement.classList.remove('pagination-item--active');
    }
  }
}

document.addEventListener('DOMContentLoaded', function() {
  const pageLinks = document.getElementsByClassName('pagination-item__link');
  for (let i = 0; i < pageLinks.length; i++) {
    const link = pageLinks[i];
    link.addEventListener('click', function(event) {
      event.preventDefault();
      const page = parseInt(this.textContent);
      handlePageChange(page);
    });
  }

  // Call fetchData with the initial URL for page 1
  fetchData(`${endpoint}?pageNumber=${pageNumber}`);

  const endpoint2 = '../php/headerData.php'; // Relative path to the PHP file
  const url2 = `${endpoint2}`;

  fetch(url2, {
    method: 'GET',
    headers: {
      'Content-Type': 'application/json',
    },
  })
    .then(response => {
      if (!response.ok) {
        throw new Error('Network response was not ok');
      }
      return response.text();
    })
    .then(htmlResponse => {
      document.getElementById('headerData').innerHTML = htmlResponse;
    })
    .catch(error => {
      console.error('There has been a problem with your fetch operation 2:', error);
    });
});