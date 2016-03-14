
module.exports = function ( app ) {
    app.get('/home', function (req, res) {
        if(req.session.user){
            var Commodity = global.dbHelper.getModel('commodity');
            var info=req.session.user.info;
            Commodity.find({}, function (error, doc) {
                res.render('home',{
                    Commoditys:doc,
                    info:info
                });
            });
        }else{
            req.session.error = "Please Log In First";
            res.redirect('/login');
        }
    });

    app.get('/addcommodity', function(req, res) {
        res.render('addcommodity');
    });

    app.post('/addcommodity', function (req, res) {
        var Commodity = global.dbHelper.getModel('commodity');
        var uId = req.session.user._id;
        Commodity.create({
            uId:uId,
            uName:req.session.user.name,
            cName: req.body.name,
            cPrice: req.body.price,
            cImgSrc: req.body.imgSrc
        }, function (error,doc) {
            if (error) {
                req.session.error = 'Add Item errors!';
                res.send(404);
            }else{
                console.log(doc);
                req.session.error = 'Add item success !';
                res.redirect('/home');
            }
        });
    });
};
