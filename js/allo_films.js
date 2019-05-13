      
      $('.m-nav-toggle').click(function(e){
        e.preventDefault();
        $('#Navbar').toggleClass('is-open');
    })
      
      /********************************** CAROUSEL ***********************************/
      
      
      const mySiema = new Siema({
          perPage: 8
      });
      document.querySelector('.prev').addEventListener('click', () => mySiema.prev());
      document.querySelector('.next').addEventListener('click', () => mySiema.next());


      var coll = document.getElementsByClassName("collapsible");
      var i;

      for (i = 0; i < coll.length; i++) {
          coll[i].addEventListener("click", function () {
              this.classList.toggle("active");
              var content = this.nextElementSibling;
              if (content.style.display === "block") {
                  content.style.display = "none";
              } else {
                  content.style.display = "block";
              }
          });
      }

      /********************************** BACK TO TOP ***********************************/


      document.addEventListener('DOMContentLoaded', function () {
          window.onscroll = function (ev) {
              document.getElementById("cRetour").className = (window.pageYOffset > 100) ? "cVisible" :
                  "cInvisible";
          };
      });

      $('#sidebarCollapse').click(function (e) {
          e.preventDefault();
          $('#sidebar').toggleClass('active');
      })

      function openModal() {
          document.getElementById("modal").style.top = "0px";
      }

      function closeModal() {
          document.getElementById("modal").style.top = "-780px";
      }