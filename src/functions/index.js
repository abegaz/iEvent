const functions = require('firebase-functions');
const express = require('express');
const engines = require('consolidate');
const firebase = require('firebase-admin');

// Initializes an admin app instance from which Realtime Database changes can be made.
const firebaseApp = firebase.initializeApp(functions.config().firebase);

// ------------------------------- //

// Initialize app and set view engine
const app = express();
app.engine('ejs', engines.ejs);

// Views are our dynamic web pages that get rendered to HTML in our routes.js.
app.set('views', './views');

// EJS is an easy-to-understand templating engine.
// Templating engines let you put JS into HTML that is executed when the page is being rendered.
app.set('view engine', 'ejs');

// Require our routes.js file, which handles incoming HTTP requests and responses.
const routes = require('./routes.js');

// Anytime we get a request to '/', routes handles it.
app.use('/', routes);

// MUST BE LAST
// Exports our function.
exports.app = functions.https.onRequest(app);