function dataFormatoBr(value) {
  var options = {
    year: "numeric",
    month: "2-digit",
    day: "2-digit",
  };

  if (value) {
    if (value.includes("T")) {
      value = new Date(value).toLocaleDateString("pt-BR", options);
    } else if (value.indexOf("-") >= 0) {
      value = value.replace(/-/g, ",");
      value = new Date(value).toLocaleDateString("pt-BR", options);
    }
    return value;
  }
}

module.exports = dataFormatoBr;
