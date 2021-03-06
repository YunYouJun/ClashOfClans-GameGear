function compare(mycode,enemycode,order){ //比大
	if(order-1 > mycode.length){
		return ;
	}

	var big;
	if(order==0)	order = 7;
	if(mycode[order-1] > enemycode[order-1]){
		big = 1;
	}else if(mycode[order-1] < enemycode[order-1]){
		big = -1;
	}else if(mycode[order-1] == enemycode[order-1]){
		big = compare(mycode,enemycode,order+1);
	}
	return big;
}

function lottery_judge(firstnum,secondnum,thirdnum,mycode,enemycode){
	var flag;
	var count = firstnum*secondnum+thirdnum;
	var odevity = count%2;
	var date = new Date(); //获取当前日期，=。=如果开奖和查看隔了一天怎么办，……之后再说
	var weekday	= date.getDay();
	if(odevity==1){
		//奇数
		flag = compare(enemycode,mycode,weekday);
	}else if(odevity==0){
		//偶数
		flag = compare(mycode,enemycode,weekday);
	}else{
		$('#result').removeClass();
		$('#result').addClass("btn-warning");
		$('#result').append('<i class="glyphicon glyphicon-warning-sign"></i> - 出错 - <i class="glyphicon glyphicon-warning-sign"></i>');
	}
	
	if(flag>0){
		$('#result').removeClass();
		$('#result').addClass("btn btn-block btn-success btn-lg");
		$('#result').html('<i class="glyphicon glyphicon-ok"></i> - 胜 - <i class="glyphicon glyphicon-ok"></i>');
	}else if(flag<0){
		$('#result').removeClass();
		$('#result').addClass("btn btn-block btn-danger btn-lg");
		$('#result').html('<i class="glyphicon glyphicon-remove"></i> - 败 - <i class="glyphicon glyphicon-remove"></i>');
	}else if(flag == null){
		$('#result').removeClass();
		$('#result').addClass("btn btn-block btn-warning btn-lg");
		$('#result').html('<i class="glyphicon glyphicon-warning-sign"></i> -位数不足以继续比较- <i class="glyphicon glyphicon-warning-sign"></i>');
	}else{
		$('#result').removeClass();
		$('#result').addClass("btn btn-block btn-warning btn-lg");
		$('#result').html('<i class="glyphicon glyphicon-warning-sign"></i> - 出错 - <i class="glyphicon glyphicon-warning-sign"></i>');
	}
}

function orange_lottery_judge(){  
	var myclancode = $("#myclancode").val().replace(/#/g,"").toUpperCase();
	var enemyclancode = $("#enemyclancode").val().replace(/#/g,"").toUpperCase();
	var firstnum = parseInt($("#firstnum").text().replace(/[^0-9]/ig,""));
	var secondnum = parseInt($("#secondnum").text().replace(/[^0-9]/ig,""));
	var thirdnum = parseInt($("#thirdnum").text().replace(/[^0-9]/ig,""));
	lottery_judge(firstnum,secondnum,thirdnum,myclancode,enemyclancode);
}
// 定输赢方式：
// -按彩票（排列三）的三位数字第一位 ‘乘以’ 第二位 ‘加上’ 第三位
// -计算结果【为奇数-开小】【为偶数-开大】 
// -当天星期几决定比第几位
// -字母比数字大 1<9#2PPLGYO对方：# 9OP8VO 
// 今天星期五，排列三结果2，3，5
// 2x3+5=11【奇数，第二位比小。如果相同，比下以位：第三位】
// 我方第二位“P"对方第二位”O"
// 根据字母图，O比P小，所以这场我方输