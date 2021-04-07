const helpers = require("./helpers.js");
// const  = require("./dataFormatoBr.js");

it("Convert date in br formater", () => {
  var data = helpers.dataFormatoBr("2020-06-10");
  expect(data).toBe("10/06/2020");
});
