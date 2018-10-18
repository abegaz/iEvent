const express = require('express');
const Router = express.Router();

// User Profile Page Route
Router.get('/:id', (req, res) => {
    // How long the page is cached in Google's CDNs
    res.set('Cache-Control', 'public, max-age=300, s-maxage=600');

    var foobar = {
        name: "Stacy's Mom",
        bio: "Has it going on"
    }
    // Renders the ejs page into html, which is sent to the client
    res.render('profile', {foobar});

    // Inside the brackets above, add any data in json format needed in the ejs file.
    // This includes the username, url to the profile pic in storage, etc.
});

module.exports = Router;