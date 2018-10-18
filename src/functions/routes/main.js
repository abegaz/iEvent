const express = require('express');
const Router = express.Router();

// Landing Page Route
Router.get('/', (req, res) => {
    // How long the page is cached in Google's CDNs
    res.set('Cache-Control', 'public, max-age=300, s-maxage=600');

    // Renders the ejs page into html, which is sent to the client
    res.render('home', {});

    // Inside the brackets above, add any data in json format needed in the ejs file.
    // This includes the username, url to the profile pic in storage, etc.
});

module.exports = Router;