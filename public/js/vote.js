function vote(id,type,currentVote){
	
	if (type > 0) type = 1;
	else type = -1;
	if (type == currentVote) return;
		$.ajax({
	        type: 'POST',
	        url: '{{URL::to("vote")}}',
	        data: { id: id, type:type, current:currentVote}
	    }).done(function(msg){
		    alert(msg);
		    $("#upvotes-"+id).removeClass("current");
		    $("#novotes-"+id).removeClass("current");
		    $("#downvotes-"+id).removeClass("current");
		    if (type == 1){
								$("#upvotes-"+id).addClass("current");
								$("#upBtn-"+id).addClass("voted");
							}
							else{
								$("#downvotes-"+id).addClass("current");
								$("#downBtn-"+id).addClass("voted");
							}
							$("#upBtn-"+id).attr("onclick","vote("+id+",1,"+type+")");
							$("#downBtn-"+id).attr("onclick","vote("+id+",-1,"+type+")");
		});
}