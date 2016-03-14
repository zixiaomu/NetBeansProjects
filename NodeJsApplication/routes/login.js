module.exports = function ( app ) {
    app.get('/login',function(req,res){
        res.render('login');
    });

    app.post('/login', function (req, res) {
        var userModel=req.session.user=req.body;
        if(userModel.info == 1){
          var Company = global.dbHelper.getModel("company");
          checkLogin(Company,userModel);
        }else{
          var User = global.dbHelper.getModel("user");
          checkLogin(User,userModel);
        }

        function checkLogin(person,user){
          person.findOne({name: user.uname}, function (error, doc) {
              if (error) {
                  res.send(500);
                  console.log(error);
              } else if (!doc) {
                  req.session.error = 'Username does not exist!';
                  res.send(404);
              } else {
                  if(user.info == "1"){
                       if(user.upwd != doc.password){
                           req.session.error = "wrong password!";
                           res.send(404);
                       }else if(user.companyname != doc.companyname){
                          req.session.error="Company names do not match!";
                          res.send(404);
                       }else{
                           req.session.user=doc;
                           res.send(200);
                       }
                  }else{
                      if(user.upwd != doc.password){
                           req.session.error = "wrong password!";
                           res.send(404);
                       }else{
                           req.session.user=doc;
                           console.log(doc);
                           res.send(200);
                       }
                  }
              }
          });
        }
    });
}