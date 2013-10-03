$(function(){


$('.add').hover(function(){
	$(this).tooltip('show');

});
	
$('.edit').hover(function(){
	$(this).tooltip('show');

});

$('.delete').hover(function(){
	$(this).tooltip('show');

});

$('.titleBack').click(function() {
    history.back();
});

$(".delete").click(function(){


   var deletar = confirm("Deseja deletar este registro?")
	if(deletar){
	    
	                   
	  return true;
	}else{ 
	    
	    return false;

	  }

});		

	


});
