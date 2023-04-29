  //get the element of side navigation bar
  let sidy = document.getElementById("sidenav");
  let switchsidy = 0;

  //to open the side nav bar
  function openSideNav(){
     
      sidy.style.width = "150px";

  }
  //to close the side nav bar thru x
  function closeSideNav(){

      sidy.style.width = "0px";
  }



  document.addEventListener('click', function(event) {
      if( !event.target.closest("#sidenav") && !event.target.closest('#heaven') ){
          
          sidy.style.width = "0px";

      }});
