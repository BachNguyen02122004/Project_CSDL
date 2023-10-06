document.addEventListener('DOMContentLoaded', function () {
  const endpoint = '../php/indexdata.php'; // Relative path to the PHP file
  const pageNumber = 1;

  // Construct the URL with query parameters
  const url = `${endpoint}?pageNumber=${pageNumber}`;

  // Make a GET request to the PHP endpoint with parameters

  fetch(url, {
    method: 'GET',
    headers: {
      'Content-Type': 'application/json',
    },
  })
    .then(response => {
      // Check if the response is successful
      if (!response.ok) {
        throw new Error('Network response was not ok');
      }
      // Parse the response as text
      return response.text();
    })
    .then(htmlResponse => {
      // Use the HTML response in your JavaScript code
      // For example, insert the HTML into a div with id "result"
      document.getElementById('main_page').innerHTML = htmlResponse;
    })
    .catch(error => {
      // Handle errors during the fetch operation
      console.error('There has been a problem with your fetch operation 1:', error);
    });



  const endpoint2 = '../php/headerData.php'; // Relative path to the PHP file

  // Construct the URL with query parameters
  const url2 = `${endpoint2}`;

  // Make a GET request to the PHP endpoint with parameters


  fetch(url2, {
    method: 'GET',
    headers: {
      'Content-Type': 'application/json',
    },
  })
    .then(response => {
      // Check if the response is successful
      if (!response.ok) {
        throw new Error('Network response was not ok');
      }
      // Parse the response as text
      return response.text();
    })
    .then(htmlResponse => {
      // Use the HTML response in your JavaScript code
      // For example, insert the HTML into a div with id "result"
      document.getElementById('headerData').innerHTML = htmlResponse;
    })
    .catch(error => {
      // Handle errors during the fetch operation
      console.error('There has been a problem with your fetch operation 2:', error);
    });

});