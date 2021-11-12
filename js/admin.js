(function(){
	$.addEvent(window,"load",function(){
		var submit=$.a("submit");
		var reply=$.a("reply");
		$.addEvent(submit,"click",function(event){
			if(reply.value.length==0){
				alert("回复内容不能为空！");
				event.preventDefault();
			}
		})
	})
})();