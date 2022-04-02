//tinymce.init({selector:'textarea'});

$(document).ready(function(){
                
$('#SelectAllBoxes').click(function(event){
    
  if(this.checked)  {
      
      $('.checkBoxes').each(function(){
          
          this.checked = true;
          
          
          
      });
     
 } else{
     $('.checkBoxes').each(function(){
          
          this.checked = false;
          
          
          
      });
     
     
     
 }
    
    
    
});    
                

 });

function loadusersonline(){

    $.get("functions.php?onlineusers=result", function(data){

        $(".usersonline").text(data);

    });


}


setInterval(function(){

    loadusersonline();

},500);