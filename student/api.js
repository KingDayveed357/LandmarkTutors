let input = document.getElementById('input'); 
let display = document.getElementById('display');
let loader = document.getElementById('loader');
// let main = document.querySelector('main');

function searchBook() {
    event.preventDefault();
    loader.style.display = 'block';
    let api = `https://www.googleapis.com/books/v1/volumes?q=${input.value}`;
    fetch(api)
    .then((response) => response.json())
    .then((data) => {
        loader.style.display = 'none'; // Hide loader
        display.innerHTML = "";
        let item = data.items;
        let row;

        item.forEach((book, index) => {
            if (index % 3 === 0) {
                // Start a new row for every third book
                row = document.createElement("div");
                // row.classList.add("mb-5");
                display.appendChild(row);
            }

            let books = document.createElement("div");
            let boo = `
                <div class="card h-100 w-100 mb-4">
                    <img class="card-img-top" src="${book.volumeInfo.imageLinks.thumbnail}" alt="Book-image" />
                    <div class="card-body">
                        <h5 class="card-title">${book.volumeInfo.title}</h5>
                        <a href="${book.volumeInfo.infoLink}" class="btn btn-outline-primary">Know More</a>
                        <a href="${book.volumeInfo.previewLink}" class="btn btn-outline-primary">Read Book</a>
                    </div>
                </div>
            `;
            books.innerHTML = boo;
            row.appendChild(books);
            console.log(data);
        });
    })

    // .catch((err) => alert('error'));
    // input.value = "";   
}
input.addEventListener('keydown', function (event) {
    // Check if the key is "Enter"
    if (event.key === 13) {
        searchBook();
    }
});
let colorBtn = document.getElementById("btn1")
function generateColorCode() {
    let colorFormer = 'abcdef0123456789';
    let newColor = '';
  
    for (let i = 0; i < 6; i++) {
      let randomColor = Math.floor(Math.random() * colorFormer.length);
      newColor += colorFormer.charAt(randomColor);
    }
  
    return `#${newColor}`;
  }
  
  
colorBtn.onclick = function(){
    let randomColor = generateColorCode();
    console.log(randomColor);
    colorBtn.style.backgroundColor = randomColor;
    document.body.style.backgroundColor = randomColor;

    
}

//    <div class="col-lg-4">
//                 <div class="card h-100">
//                     <img class="card-img-top" src="${book.volumeInfo.imageLinks.thumbnail}" alt="Card image cap" />
//                     <div class="card-body">
//                         <h5 class="card-title">${book.volumeInfo.title}</h5>
//                         <a href="${book.volumeInfo.infoLink}" class="btn btn-outline-primary">Know More</a>
//                         <a href="${book.volumeInfo.previewLink}" class="btn btn-outline-primary">Read Book</a>
//                     </div>
//                 </div>
//                 </div>



