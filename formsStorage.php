<!doctype html>
<!--
  Author: Pedro Santana
  Date: 12/7/2014
-->
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        
    <link rel="stylesheet" href="css/main.css">
<!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/freelancer.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="jquery.serializeObject.js"</script>
    

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    
    
     <script src="https://apis.google.com/js/client.js?onload=handleClientLoad"></script>
     <script src="js/plugins/plugins.js"></script>
    <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>


   <script type="text/javascript">

          window.addEventListener('load', function() {
          var status = document.getElementById("status");

          function updateOnlineStatus(event){
            var condition = "Network statues " + navigator.onLine ? "online" : "offline";
            status.className = condition;
            status.innerHTML =condition;
          }
          window.addEventListener('online',  updateOnlineStatus);
          window.addEventListener('offline', updateOnlineStatus);
          

          //detects if local storage is supported
          var local = document.getElementById("localstatus");
            if (Modernizr.localstorage){
              local.innerHTML = "Supported";
              local.style.backgroundColor = "#00CC00";
              local.style.color= "#FFFFFF";
            }else{
                local.innerHTML = " Not Supported";
                local.style.backgroundColor = "red";
               local.style.color= "#FFFFFF";
            }

            var name = document.getElementById("username");
            if(Modernizr.input.required){
             name.style.backgroundColor = "#00CC00";
             name.style.color= "#FFFFFF";
             name.innerHTML ="Required Attribute Supported";
            }else{
              name.style.backgroundColor = "red";
              name.style.color= "#FFFFFF";
              name.innerHTML = "Required Attribute Not Supported";
            }

            //detects if date type is supported
            var date = document.getElementById("dateSpan");
            if(Modernizr.inputtypes.date){
              date.style.backgroundColor = "#00CC00";
              date.style.color= "#FFFFFF";
              date.innerHTML = "Date Type Supported";
            }else{
              date.style.backgroundColor = "red";
              date.style.color= "#FFFFFF";
              date.innerHTML = "Date Type Not Supported";
            }


            //detects if E-mail Type is Supported
            var email = document.getElementById("E-mail");
             if(Modernizr.inputtypes.email){
              email.style.backgroundColor = "#00CC00";
              email.style.color= "#FFFFFF";
              email.innerHTML = "Email Type Supported";
             }else{
              email.style.backgroundColor = "red";
              email.style.color= "#FFFFFF";
              email.innerHTML = "Email Type Not Supported";
             }

             //detects if Number Type is Supported
             var age = document.getElementById("age");
             if(Modernizr.inputtypes.number){
              age.style.backgroundColor = "#00CC00";
              age.style.color= "#FFFFFF";
              age.innerHTML = "Number Type Supported";
             }else{
              age.style.backgroundColor = "red";
              age.style.color= "#FFFFFF";
              age.innerHTML = "Number Type Not Supported";
             }

             //Detects if Pattern Attribute is Supported
             var Postal = document.getElementById("PostalCode");
             if(Modernizr.input.pattern){
              Postal.style.backgroundColor = "#00CC00";
              Postal.style.color= "#FFFFFF";
              Postal.innerHTML="Pattern Attribute Supported";
             }else{
              Postal.style.backgroundColor = "red";
              Postal.style.color= "#FFFFFF";
              Postal.innerHTML = "Pattern Attribute Not Supported";
             }
        });

  //to populate form with good input
    function populateForm(){
      document.getElementById("name").value="Kevin Duran";
      document.getElementById("birth").value="1990-05-03";
      document.getElementById("email").value="Kevin.Duran@mohawkcollege.ca";
      document.getElementById("userAge").value="25";
      document.getElementById("cndCode").value="H8M 4Q8";
      document.getElementById("Male").checked = true;
      document.getElementById("InterestInput").checked = true;
      document.getElementById("ontario").selected = true;
    };

   var formData;

   //saves values to local storage
   function save_values_local(){
      formData = $('form#contactForm').serializeObject();
      localStorage.setItem('formData', JSON.stringify(formData));
      document.getElementById("saveToLocal").innerHTML = "Form Values have been saved to Local Storage";
     $('#saveToLocal').hide(20000);
   };

   //to clear local storage
   function clear_local_storage(){
    localStorage.clear();
    document.getElementById("clearLocalStor").innerHTML = "Local Storage is destroyed and form has been cleared";
    $('#clearLocalStor').hide(20000);
   };

   //populate form from local storage
   function populate_form(){
    var retrieve = localStorage.getItem('formData');
     var data = JSON.parse(retrieve);
     $('form').populate(data);
     document.getElementById("populate").innerHTML ="Form has been loaded with values retrieved from Local Storage";
     $('#populate').hide(20000);
   };

    $(document).ready(function() {
       function postForm(url, formData) {
          // Post to server or post to web storage
          if(!navigator.onLine) {
            formData = $('form#contactForm').serializeObject();
            localStorage.setItem('formData', JSON.stringify(formData));
            
          }
        };
        $('form#contactForm').submit(function(event) {
        if (!navigator.onLine){
          event.preventDefault();
          document.getElementById("offlineForm").innerHTML="Since we are OFFLINE! Form values have been save to local storage";
        }
        var url = $(this).attr('action');
        postForm(url, formData);
       
      });
    });
                      
   </script>

    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Forms and Local Storage</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <form class="navbar-form navbar-right" role="form">  
          </form>
        </div><!--/.navbar-collapse -->
      </div>
    </nav>

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div>
        
      </div>
    </div>
          <p id ="saveToLocal"></p>
          <p id ="clearLocalStor"></p>
          <p id="populate"></p>
          <p id="offlineForm"></p>
          <div id ="Network"></div>  
          <div id="status"></div>
          <div id="localStor">Local storage is</div>
          <div id="localstatus"></div>
      </div>
      
         
    <noscript>
          <h4 id="JavaScript">Please turn on JavaScript.</h4>
    </noscript>
     <div>
        <button id ="saveForm" class="btn btn-info" onclick="save_values_local()">Save Form Values To Local Storage</button>
        <button id="clearLocalStorage" class="btn btn-info" onclick="clear_local_storage()">Clear Local Storage and Form</button>
        <button id="loadFormFromStorage" class="btn btn-info" onclick="populate_form()">Load Form Values From Local Storage</button>
    </div>
    <div class="formContainer">
      
      <h3 id="Interest">Personal Interest Form</h3>
        
        <form id ="contactForm" action="https://csu.mohawkcollege.ca/tooltime/echo.php" >

          <label>Name:</label>
          <input type="text" name="firstname" id ="name" placeholder="First and Lastname" class="inputInfo" required>
          <span id ="username"></span>
          <br><br>

          <label>Date of birth:</label>
          <input type = "date" name ="DateOfBirth" id="birth" placeholder="Date of Birth (yyyy/mm/dd)" class="dateOfBirth" required>
          <span id="dateSpan"></span><br><br>

          <label>Email:</label>
          <input type = "email" name="email" id = "email"placeholder="E-mail" class="inputInfo"required>
          <span id ="E-mail"></span>
          <br><br>

          <label>Age:</label>
          <input type="number" name="age" id="userAge" min ="18" max="90" placeholder="Your age(18-90)" class="inputInfo" required>
          <span id="age"></span>
          <br><br>

          <label>Cdn Postal Code:</label>
          <input type="text" name="cndPostalCode" id="cndCode" placeholder="Cnd Postal Code" class="inputInfo"  pattern="^[A-Z,a-z]\d[A-Z,a-z][\s{1}]?\d[A-Z,a-z]\d" required>
          <span id = "PostalCode"></span>
          <br><br>

          <label id="interest">Interest:</label>
          <span>
            <input type="checkbox" name="music" Value="Music" id="InterestInput"> Music
          </span>

          <span>
            <input type="checkbox" name="software" Value="Software" id="InterestInput"> Software
          </span>

          <span>
            <input type="checkbox" name="hardware" Value="Hardware" id="InterestInput"> Hardware
          </span>

          <label>Gender:</label>

          <span>
            <input type="radio" name="male" id ="Male" Value="Male" > Male
          </span>

          <span>
            <input type="radio" name ="female" value ="Female" > Female
          </span>

          <label id ="provinceLabel">Provice:</label>
          <select name ="canadaProvinces" multiple>
            <option disabled>----Select a Province----</option>
            <option name = "Ontario" id ="ontario" value ="Ontario">Ontario(ON)</option>
            <option name = "Quebec" value ="Quebec">Quebec(QC)</option>
            <option name = "NovaScotia" value ="Nova Scotia">Nova Scotia(NS)</option>
            <option name = "NewBrunswick" value ="New Brunswick">New Brunswick(NB)</option>
            <option name ="Manitoba" value="Manitoba">Manitoba(MB)</option>
            <option name ="BritishColumbia" value ="British Columbia">British Columbia(BC)</option>
            <option name ="PrinceEdwardIsland" value="Prince Edward Island">Prince Edward Island(PE)</option>
            <option name="Saskatchewan" value="Saskatchewan">Saskatchewan</option>
            <option name="Alberta" value="Alberta">Alberta</option>
            <option name="NewfoundlandandLabrador" value="Newfoundland and Labrador">Newfoundland and Labrador</option>
          </select>
          <button type="submit" id="submit" class="btn btn-info" title="Submit Form Values to Server">Submit to Server</button>
          <a href="formsStorage.php" class="btn btn-info" id ="reload">Reload Page</a>
         <i><img  src="iconmonstr-checkbox-12-icon-256.png" height="15px" width="15px" title="Click me to load correct data into form." onClick="populateForm()" id ="icon"></i>
        </form>

        
    
    </div> <!-- /container -->        
        
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
        <script src="js/vendor/bootstrap.min.js"></script>

        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>
