const express = require('express');
const router = express.Router();

// Event Page Route
Router.get('/', (req, res) => {
    // How long the page is cached in Google's CDNs
    res.set('Cache-Control', 'public, max-age=300, s-maxage=600');

    // Renders the ejs page into html, which is sent to the client
    res.render('events', {});

    // Inside the brackets above, add any data in json format needed in the ejs file.
    // This includes the username, url to the profile pic in storage, etc.
});

// Event Page Route
Router.get('/:id', (req, res) => {
    // How long the page is cached in Google's CDNs
    res.set('Cache-Control', 'public, max-age=300, s-maxage=600');

    // Renders the ejs page into html, which is sent to the client
    res.render('index', {});

    // Inside the brackets above, add any data in json format needed in the ejs file.
    // This includes the username, url to the profile pic in storage, etc.
});

// Edit Event Page Route
Router.get('/:id/edit', (req, res) => {
    // How long the page is cached in Google's CDNs
    res.set('Cache-Control', 'public, max-age=300, s-maxage=600');

    // Renders the ejs page into html, which is sent to the client
    res.render('event-edit', {});

    // Inside the brackets above, add any data in json format needed in the ejs file.
    // This includes the username, url to the profile pic in storage, etc.
});

// Edit Event Put Route
Router.put('/:id/edit', (req, res) => {
    // Edit event in the database from the form response data in req.body
    
});

// New Event Page Route
Router.get('/new', (req, res) => {
    // How long the page is cached in Google's CDNs
    res.set('Cache-Control', 'public, max-age=300, s-maxage=600');

    // Renders the ejs page into html, which is sent to the client
    res.render('event-new', {});

    // Inside the brackets above, add any data in json format needed in the ejs file.
    // This includes the username, url to the profile pic in storage, etc.
});

// New Event Post Route
Router.post('/new', (req, res) => {
    // Create new event in the database from the form response data in req.body

});

// Delete Event Route
Router.delete('/:id', (req, res) => {
    // Delete event from the database and disassociate the event id from its owner and members
});

module.exports = router;