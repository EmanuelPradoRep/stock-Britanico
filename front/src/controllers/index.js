import Home from "./home.controller";
import Articulos from "./articulos.controller";
import NotFound from "./404.controller";

const pages = {
  home: Home,
  articulos: Articulos,
  notFound: NotFound,
};

export { pages };
