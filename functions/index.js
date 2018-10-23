const functions = require('firebase-functions');
const express = require('express');
const engines = require('consolidate');
const firebase = require('firebase-admin');

// Initializes an admin app instance from which Realtime Database changes can be made.
const firebaseApp = firebase.initializeApp(functions.config().firebase);

// ------------------------------- //

// Initialize app and set view engine
let app = express();

// Views are our dynamic web pages that get rendered to HTML in our routes.js.
app.set("views", __dirname + "/views");
app.set("view engine", "ejs");
app.engine('ejs', require('ejs').__express);
app.set("strict routing", true);

// Require our routes.js file, which handles incoming HTTP requests and responses.
const mainRoute = require('./routes/main.js');
const eventsRoute = require('./routes/events.js');
const userRoute = require('./routes/user.js');

// Anytime we get a request to '/', routes handles it.
app.use('/', mainRoute);
app.use('/events/', eventsRoute);
app.use('/user/', userRoute);

// Handles error where not having a trailing '/' errors out
app.use('*', mainRoute);

// MUST BE LAST
// Exports our function.
exports.main = functions.https.onRequest(app);

// // Create and Deploy Your First Cloud Functions
// // https://firebase.google.com/docs/functions/write-firebase-functions
//
// exports.helloWorld = functions.https.onRequest((request, response) => {
//  response.send("Hello from Firebase!");
// });
