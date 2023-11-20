document.addEventListener('DOMContentLoaded', function(){
    changePage();
})
function changePage(){
    
    let url = `../php/changdata.php?index=${index}`;
      fetch(url, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
       
      })
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            console.log(data);

          } else {
            console.error('Error:', data.error);
          }
        })
        .catch(error => {
          console.error('Error:', error);
        });
    }