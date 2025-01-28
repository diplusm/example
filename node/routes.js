"use strict"

const express = require('express');
const router = express.Router();

module.exports = router;

router.get('/', (req, res) => {
    res.sendFile(__dirname + '/index.html');
})

router.get('/test', (req, res) => {
    res.send('test');
})