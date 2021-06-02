function fetchPage(link) {
  const content = $("#mainContent");

  link.onclick = function (e) {
    e.preventDefault();
    fetch(link.href)
      .then((resp) => resp.text())
      .then((page) => content.html(page));
  };
}

const links = $("[link]");
links.each((i, link) => fetchPage(link));

(() => {
  const home = $("[home]")[0];
  const content = $("#mainContent");

  fetch(home.href)
    .then((resp) => resp.text())
    .then((page) => content.html(page));
})();
