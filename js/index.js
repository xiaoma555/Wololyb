(function(){
	var $={};
	function addEvent(elem,ety,func){
		try{
			if( elem && typeof elem == "object"){
				if(window.addEventListener){
					elem.addEventListener(ety,func);
				}else{
					elem.attachEvent("on"+ety,func);
				}
			}
		}catch(e){
			console.log(e);
		}
	}
	$.addEvent=addEvent;
	window.$=$;
})();
(function(){
	function a(_id){
		return document.getElementById(_id);
	}
	$.a=a;
})();
(function(){
	$.addEvent(window,"load",function(){
		var img1=$.a("img1");
		var face=$.a("face");
		var switch1=$.a("switch1");
		var message=$.a("message");
		var fbly=$.a("fbly");
		var flag=true;
		var login_out=$.a("who_cancellation");
		var pop1=$.a("pop1");
		var post_content=$.a("post_content");
		var pop_tips=$.a("pop_tips");
		var post_button=$.a("post_button");
		var who_register=$.a("who_register");
		$.addEvent(face,"change",function(){
			img1.src="images/"+face.value;
		})
		$.addEvent(switch1,"click",function(){
			if(flag){
				message.style.display="none";
				fbly.style.display="block";
				switch1.innerText="查 看 留 言";
				flag=false;
			}else{
				message.style.display="block";
				fbly.style.display="none";
				switch1.innerText="发 布 留 言";
				flag=true;
			}
		})
		$.addEvent(login_out,"click",function(){
			location.href="php/login_out.php";
		})
		$.addEvent(post_content,"input",function(){
					if(this.value.length>20)
					{
						pop1.style.display="block";
						pop_tips.innerText=(this.value.length-20)+"个字哦！";
					}
					else
					{
						pop1.style.display="none";
					}
		})
		$.addEvent(post_button,"click",function(event){
			if(post_content.value.length>20){
				alert("超出字数");
				event.preventDefault();
			}else if(post_content.value==""){
				alert("请输入内容");
				event.preventDefault();
			}
		})
		$.addEvent(who_register,"click",function(){
			location.href="admin/zhuce.php";
		})
	})
})();