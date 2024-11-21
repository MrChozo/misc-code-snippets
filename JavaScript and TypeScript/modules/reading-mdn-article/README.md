# Trying some code while reading on MDN

## 11/21/2024 - looking back at "import-in-function"

I was reading about JS modules on MDN back in January and wanted to check
whether or not I could use an `import` statement from within a function. The
_what-doesnt-work_ directory is an attempt at that, and the
_sanity-check_ directory is an attempt to run an `import` the correct way.

While coming back to this, I discovered that Node.js wouldn't run either of them
as they were. I had to add a _package.json_ file for each, telling Node to use
each \*.js file as an ES Module, as Node uses CommonJS by default, which
typically expects `require` statements instead.