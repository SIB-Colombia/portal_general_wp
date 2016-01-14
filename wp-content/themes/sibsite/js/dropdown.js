$(document).ready(function() {
  $('.menu > li').bind('mouseover', openSubMenu);
  $('.menu > li').bind('mouseout', closeSubMenu);

  function openSubMenu() {
    $(this).find('ul').css('visibility', 'visible');
    $(this).find('ul').css('opacity', '1');
    $(this).find('ul').css('margin-top', '0');
  };

  function closeSubMenu() {
    $(this).find('ul').css('visibility', 'hidden');
    $(this).find('ul').css('opacity', '0');
    $(this).find('ul').css('margin-top', '-10px');
  };

});