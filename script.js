
function greet() 
{
  window.alert('Hello ');
}

function addItem() {
  const item = document.getElementById('item').value;
  const listUl = document.getElementById('list_items');
  const liNode = document.createElement('li');
  const importantCheck = document.getElementById('important_check').checked;
  const grocerieCheck = document.getElementById('grocerie_check').checked;
  liNode.appendChild(document.createTextNode(item));
    if (importantCheck) {
      liNode.style.color = 'red';
   }
    if (grocerieCheck) {
      liNode.style['text-decoration'] = 'underline';
    }
    listUl.appendChild(liNode);
}


function removeItem() {
      const itemId = Math.abs(document.getElementById('item_remove').value) - 1;
      const listLi = document.getElementById('list_items').getElementsByTagName('li');
      if (listLi.length > itemId) {
        listLi[itemId].remove();
      } else {
        window.alert('Item doesn\'t exist!');
      } 
}
function init() {
  // Modifying src of image.
  document.getElementById('first').src = 'icons/car1.png';
  const images = document.getElementById('container2').getElementsByTagName('img');
  images[1].src = 'icons/flower2.png';
  images[3].src = 'icons/flower2.png';

  // Adding html to html code by using js.
  const inerJs = document.getElementById('inerJs'); inerJs.innerHTML = '<div><p>You are great!</p></div>';
  // Create element with js then injecting in documents
  const image = document.createElement('img');
  image.src = 'icons/flower2.png';
  const missingSpan = document.getElementById('new_element');
  missingSpan.appendChild(image);

  // Raimbow part
  const spans = document.getElementById('rainbow').getElementsByTagName('span');
  const colors = ['red', 'orange', 'yellow', 'green', 'blue', 'purple', 'pink'];
  for (let i = spans.length - 1; i > -1; i -= 1) {
    spans[i].style.color = colors[i];
  }

  // Flowers event on mouse over
  const changeSrc = function (event) {
    const actualEvent = event;
    if (actualEvent.target.src) {
      const filename = actualEvent.target.src.replace(/^.*[\\/]/, '');
      if (filename === 'flower2.png') {
        actualEvent.target.src = 'icons/flower1.png';
      } else {
        actualEvent.target.src = 'icons/flower2.png';
      }
    }
  };

  document.getElementById('event').addEventListener('mouseover', changeSrc);
}