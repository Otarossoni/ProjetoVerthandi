function fetchPage(page) {
  const content = $("#mainContent");
  const url = window.location.href.replace("app.php", page);

  fetch(url)
    .then((resp) => resp.text())
    .then((rawPage) => content.html(rawPage));
}

const queryString = window.location.search;
const params = new URLSearchParams(queryString);
const page = params.get("page");

if (window.location.href.includes("app.php")) {
  switch (page) {
    case "autor": {
      fetchPage("Autor/index.php");
      break;
    }
    case "midia": {
      fetchPage("Midia/index.php");
      break;
    }
    case "tipo": {
      fetchPage("Tipo/index.php");
      break;
    }
    case "perfil": {
      fetchPage("Perfil/index.php");
      break;
    }
    default: {
      fetchPage("home.php");
      break;
    }
  }
}
