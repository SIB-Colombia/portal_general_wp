$(document).ready(function() {
  
  $( "#grid" ).click(function() {
    $( "#main-content" ).addClass( "grid" );
    $( "aside" ).fadeOut( "slow" );
  });
  
  $( "#lines" ).click(function() {
    if($("#main-content").hasClass("grid")) {
      $( "#main-content" ).removeClass( "grid" );
      $( "aside" ).fadeIn( "slow" );
    }
  });

});