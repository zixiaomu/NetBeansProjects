module.exports = function ( app ) {
    app.get('/register', function(req, res) {
        res.render('register');
    });

    app.post('/register', function (req, res) {

        var userModel=req.body;

        if(userModel.upwd != userModel.upwd_re){
            res.send("Twice to enter the password does not match! !");
            return res.redirect('/register');
        }

        checkID(userModel);

        function checkID(user){
            switch(user.info){
                case "1":
                    var Company=global.dbHelper.getModel("company");
                    checkRegister(Company,userModel);
                    break;
                case "0":
                    var User=global.dbHelper.getModel("user");
                    checkRegister(User,userModel);
                    break;
            };
        }

        function checkRegister(person,user){
            person.findOne({name: user.uname}, function (error, doc) {
                if (error) {
                    res.send(500);
                    req.session.error = 'Network exception error!';
                    console.log(error);
                } else if (doc) {
                    req.session.error = 'Username already exists!';
                    res.send(500);
                } else {
                    if(user.info == 1){
                        person.create({
                            name: user.uname,
                            password: user.upwd,
                            companyname:user.companyname,
                            info:user.info
                        },function (error, doc) {
                            if (error) {
                                res.send(500);
                                console.log(error);
                            } else {
                                req.session.error = 'Username successfully created!';
                                res.send(200);
                            }
                        });
                    }else{
                        person.create({
                            name: user.uname,
                            password: user.upwd,
                            info:user.info
                        }, function (error, doc) {
                            if (error) {
                                res.send(500);
                                console.log(error);
                            } else {
                                req.session.error = 'Username successfully created!';
                                res.send(200);
                            }
                        });
                    }
                }
            });
        }
        
    });
}