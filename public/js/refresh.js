function getCookie(cname) {
  let name = cname + "=";
  let decodedCookie = decodeURIComponent(document.cookie);
  let ca = decodedCookie.split(';');
  for(let i = 0; i < ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

    $('input').click(function(){
            $('.mess').hide()
    })
    
    $(document).keydown(function(event) {
      if (event.which == 116) {
        location.href='/login'
      }
    });
    
    
     
  
    
    
   
    
    