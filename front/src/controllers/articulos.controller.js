import view from '../view/articulos.html';

const getArticulos = async () => {
  const response = await fetch("https://jsonplaceholder.typicode.com/posts");
  
  return await response.json();
};

export default async () => {
  const divElement = document.createElement("div");
  divElement.innerHTML = view;

  const articulosElement = divElement.querySelector("#articulos");
  const totalArticulos = divElement.querySelector('#total');

  const articulos = await getArticulos();

  articulos.forEach((i) => {
    articulosElement.innerHTML += `
      <li class="list-group-item border-primary bg-dark text-white">
      <h5>${i.title}</h5>
      <p>
      ${i.body}
      </p>
      </li>
    `;
  });

  totalArticulos.innerHTML += articulos.length;

  return divElement;
};
