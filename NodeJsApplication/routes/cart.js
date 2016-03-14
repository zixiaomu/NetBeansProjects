
    
module.exports = function ( app ) {
    //check shopping car
    app.get('/cart', function(req, res) {
        var Cart = global.dbHelper.getModel('cart');
        if(!req.session.user){
            req.session.error = "The user has expired, please sign in again";
            res.redirect('/login');
        }else{
            Cart.find({"uId":req.session.user._id}, function (error, docs) {
                res.render('cart',{carts:docs});
            });
        }
    });


    //Add itme to shopping car
    app.post('/cart',function(req,res){
        var Cart = global.dbHelper.getModel('cart');
        if(!req.session.user){
            req.session.error = "The user has expired, please sign in again";
            res.redirect('/login');
        }else{
            var Commodity = global.dbHelper.getModel('commodity'),
                Cart = global.dbHelper.getModel('cart');
            Cart.findOne({"uId":req.session.user._id, "cId":req.body.cId},function(error,doc){
                //have same item+1
                if(doc){
                    Cart.update({"uId":req.session.user._id, "cId":req.body.cId},{$set : { cQuantity : doc.cQuantity + 1 }},function(error,doc){
                        // successful return 1  Failure to return0
                        if(doc > 0){
                            res.redirect('/home');
                        }
                    });
                //dont have item ,add it
                }else{
                     Cart.create({
                            uId: req.session.user._id,
                            cId: req.body.cId,
                            cName:req.body.cName,
                            cPrice: req.body.cPrice,
                            cImgSrc: req.body.cImgSrc,
                            cQuantity : 1
                        },function(error,doc){
                            if(doc){
                                console.log(doc.cId);
                                res.send(200);
                            }
                        });
                }
            });
        }
    });
    
    
    //delete item from shopping car
    app.get("/delFromCart/:id", function(req, res) {
        //req.params.id get item id number
        var Cart = global.dbHelper.getModel('cart');
        Cart.remove({"_id":req.params.id},function(error,doc){
            // successful return 1  Failure to return0
            if(doc > 0){
                res.redirect('/cart');
            }
        });
    });

    //shopping  car check out 
    app.post("/cart/clearing",function(req,res){
        var Cart = global.dbHelper.getModel('cart');
        Cart.update({"_id":req.body.id},{$set : { cQuantity : req.body.cnum,cStatus:true }},function(error,doc){
            //Update successful return 1  Failure to return 0
            if(doc > 0){
                res.send(200);
            }
        });
    });


}

