<html>
  <head>
    <title>AJAX quotes</title>

  <style>
   
    @import url('https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Tulpen+One&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Qwitcher+Grypen:wght@700&display=swap');



        /* CSS to hide the quote container initially and apply fade-in animation */
        #quoteContainer {
            display: none;
           font-size:xx-large;
            text-shadow: 4px 4px 4px #aaa;
        }

        /* CSS for the fade-in animation */
        .fade-in {
            animation: fadeIn 1s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }

          
        }
</style>


    
  </head>
  <body>
    <h1>AJAX quotes</h1>
  <p> Click below to return a random quote </p>
  <div id="quoteContainer"> Quotes go here </div>
    <p>
    This webpage, titled 'AJAX Quotes,' utilizes AJAX to fetch and display random quotes from a server. Users can click for a new quote, which appears in a rotating set of Google Fonts—Shadows Into Light, Tulpen One, and Qwitcher Grypen. The quotes also feature a subtle fade-in animation for a polished visual effect. The code fetches quotes at 5-second intervals, demonstrating the dynamic potential of AJAX, font manipulation, and animation in web development.
    </p>
    <script>

       //helps us to loop the array of fonts
  var counter = 0
      
      function getRandomQuotes() {

        var fonts = ["Shadows Into Light", "Tulpen One", "Qwitcher Grypen"]
        //alert("it works")
        //create ajax object
        var xhr = new XMLHttpRequest();
        
        //traget the server page
        xhr.open("GET", 'random_quotes.php',true);
       //if data comes back, show it here
        xhr.onload = function () {
          if (xhr.status >= 200 && xhr.status < 300 ) {//all okay, show data
            // document.querySelector("#quoteContainer").innerText = 
            //   xhr.responseText;
          var quoteContainer = document.querySelector("#quoteContainer");
             // add font family
            quoteContainer.style.fontFamily = fonts[counter]
            counter++;
            if (counter >= fonts.length){
              counter = 0; 
            }
            quoteContainer.style.display = "block"; //make elmnet visible 
            quoteContainer.innerText = xhr.responseText; // retrive text from php page
            
           
            
            quoteContainer.classList.add("fade-in")  //add fade in class            

            setTimeout(function () {
              
               quoteContainer.classList.remove("fade-in")
            }, 1000)//
          } else {// show error
            
            document.querySelector("#quoteContainer").innerText = 
            "failed to fetch  quotes" + xhr.status;
            
          }
          
        };
          // if trouble, investigate here
        xhr.onerror = function () {
          alert("Oh oh! We recieved an XHR error!")
        };

        //send data to server
        xhr.send(); 

      }  

      function displayRandomQuote() {

        //retrive quotes
        getRandomQuotes();
        setInterval(getRandomQuotes,5000);
        
      }
      
 //run on page load
      displayRandomQuote();
    </script>
  </body>
</html>
