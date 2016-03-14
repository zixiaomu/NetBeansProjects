module.exports={
	checkInfo:function(req,res,next){
		var userModel=req.body;
		if(userModel.info == "1"){
			next();
		}else{
			req.session.error="You are not admin user";
			res.send(404);
			res.redirect("back");
		}
	}
};