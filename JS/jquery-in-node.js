// # Failed example of trying to use jQuery's '$' using node.js:
// ## Ran `$ npm install jquery` and `$ npm install jsdom` first

const jsdom = require("jsdom");
const dom = new jsdom.JSDOM(`<!DOCTYPE html>
<body>
<h1 class="heading"></h1>
</body>
`);

const jquery = require("jquery")(dom.window);
jquery("body").append("<p></p>");
const content = dom.window.document.querySelector("body");

console.log(content.textContent);




// # I believe the above was close, based on this other SO answer.
// # Note the "$" assignment.

var jsdom = require('jsdom');
const { JSDOM } = jsdom;
const { window } = new JSDOM();
const { document } = (new JSDOM('')).window;
global.document = document;

var $ = jQuery = require('jquery')(window);
