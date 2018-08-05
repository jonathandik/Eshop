$(document).ready(function() {
  $('#subMenu a').click(function(e) {
   e.preventDefault();
   $('#newPageContent').load($(this).attr('href'));
  });
 });