function changePage(element) {
  var url = window.location.href;
  if(url.includes("pageno")) {
    url = url.replace(/(pageno=)[^\&]+/, '$1' + $(element).attr("id"));
  } else {
    url += "&pageno=" + $(element).attr("id");
  }
  window.location.href = url;
}
