// Ne fonctionne pas
    function activeLink() 
    {

         let activePage = window.location.pathname;     
         let nav_item = document.querySelectorAll('.navItem');

         for(i=0; i<nav_item.length; i++)
         {
          let activeLink = nav_item.item(i);
          console.log('activeLink')
               if( activePage.href == activeLink) 
               {
                    nav_item.addEventListener('click', () => 
                    {
                         nav_item.classList.add('actualPage');
                    }) 
          
               };
     

          };


    }
    
activeLink();
