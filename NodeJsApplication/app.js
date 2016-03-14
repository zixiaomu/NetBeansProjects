var express = require('express');
var app = express();
var path = require('path');
var mongoose = require("mongoose");

var bodyParser = require('body-parser');
var multer = require('multer');
var session = require('express-session');

global.dbHelper = require( './common/dbHelper' );

global.db = mongoose.connect("mongodb://localhost/mongodb/mall/test1.0");

app.use(session({
    secret:'secret',
      cookie:{
        maxAge:1000*60*30
    },
    proxy: true,
    resave: true,
    saveUninitialized: true,
    
}));

// set views，folder for views
app.set('views', path.join(__dirname, 'views'));


// set view engine
//app.set('view engine', 'ejs');
// change engin to html
app.set( 'view engine', 'html' );
// run ejs moudle
app.engine( '.html', require( 'ejs' ).__express );

app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true }));
app.use(multer());

// set static file folder ex.local file
app.use(express.static(path.join(__dirname, 'public')));

app.use(function(req, res, next){
    res.locals.user = req.session.user;
    var err = req.session.error;
    res.locals.message = '';
    if (err) res.locals.message = '<div class="alert alert-danger" style="margin-bottom: 20px;color:red;">' + err + '</div>';
    next();
});


require('./routes')(app);

app.get('/', function(req, res) {
    res.render('login');
});

app.listen(8057);



