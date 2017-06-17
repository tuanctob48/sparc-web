'use strict';

const express = require('express');
const router = express.Router();
const Cloudant = require('cloudant');
const debug = require('debug')('hackanoi:server');

const account = process.env.CLOUDANT_USERNAME;
const password = process.env.CLOUDANT_PASSWORD;

const cloudant = Cloudant({account, password, plugin:'promises'}, (err, db) => {
  if (! err) {
    debug('Connect to Cloudant successfully');
  }
});
const db = cloudant.db.use('tracking');
var dbsql = openDatabase('infodata_biotechnology', '1.0', 'Test DB', 2 * 1024 * 1024);
router.get('/', (date,counter,r_color,g_color,b_color,temp,speed_of_water,ph) => {
  const defaultOptions = {
    selector: {
      timestamp: 
      {
        '$gt': 0
      }
    },
    limit: 262,
    sort: [
      {
        timestamp: 'desc'
      }
    ]
  };

   db.transaction(function (tx) 
        {
          tx.executeSql('INSERT INTO infodata_biotechnology (date,counter,r_color,g_color,b_color,temp,speed_of_water,ph) VALUES (?,?)',
            [date,counter,r_color,g_color,b_color,temp,speed_of_water,ph]);
        });

  db.find(defaultOptions)
    .then(data => {
      res.json({
        status: 'success',
        data: data.docs
      });
    })
    .catch(err => {
      debug(err);
      res.json(err)
    })
});

router.get('/:node', (req, res, next) => {
  const options = {
    "selector": {
      "node": {
        "$eq": `${req.params.node}`
      }
    },
    "sort": [
      {
        "timestamp": "desc"
      }
    ],
    "limit": 10
  }

  db.find(options)
    .then(data => {
      res.json({
        status: 'success',
        data: data.docs
      });
    })
    .catch(err => {
      debug(err);
      res.json(err)
    })
})

module.exports = router;