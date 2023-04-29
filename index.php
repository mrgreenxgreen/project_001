
<!DOCTYPE html>
<html lang="en">
  
    <head>
        <!-- meta tags -->
        <meta charset="UTF-8">
        <meta name="description" content="Free Web tutorials">
        <meta name="keywords" content="HTML, CSS, JavaScript">
        <meta name="author" content="John Doe">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!-- title -->
        <title>homepage</title>

        <!-- css links -->
        <link rel="stylesheet" href="./css/topnav.css"/>
        <link rel="stylesheet" href="./css/sidenav.css"/>

        <style>
           .modal{
            display:none;
            width:100vmax;
            height:100vmax;
            background-color: red;
            position:fixed;
            z-index:1;
            top:0;
            left:0;
           
           }

           .modal-box{
            margin:auto;
            margin-top:20vh;
            width:500px;
            height:500px;
            background-color:gray;

           }
        </style>
    </head>

    <body>
    <div>
    <!-- heading div -->
    <div id="aaa" class="heading"><img src="./css/dbslogo.png" width=60 height=60 /></div>

    <!-- navigation bar -->
    <div id="bbb" class="topnav">

            <div><a>Home </a></div>
            <div><a>Grades</a><a>Subjects</a></div>
            <div><a onclick="openSideNav()">&#9776</a></div>

    </div>
    </div>
    <!-- side navigation bar -->
    <div class="sidenav" id="sidenav">
        <a style="color:white;" onclick="closeSideNav()">x</a>
        <a>side nav here</a>
        <a>side nav here</a>
        <a>side nav here</a>
        <a>side nav here</a>
    </div>
    <table>
        <tr><th>f</th>
</tr>
<tr>
    <td>me</td>
</tr>
</table>

<!--box -->
        <div style="width:500px;background-color:green;margin:auto;padding:10px;border-radius:15px;">
            <!-- box header-->
            <div style="flex-direction:row;display:flex;background-color:;align-items:center;justify-content:space-between;">
            <!-- image/avatar container -->
                <div style="flex-direction:row;display:flex;align-items:center;">
                    <div style="height:30px;width:30px;background-color:green;border-radius:50%;overflow:; ">
                        <img src="./css/dbslogo.png" placeholder="AAA" width="30" height="30"/>
                    </div>

                    John Doe

                </div>
                <div>
                    03/19/2023 5:00PM
                </div>
            </div>
            <!-- image -->
            <div style="text-align:center;">
                <img src="./css/  height="300" width="300"/>
            </div>
            <!-- caption/text -->
            <div>
                lorem ipsum dolor. The quick brown fox jumped over the lazy dog. lorem ipsum dolor. The quick brown fox jumped over the lazy dog.
                lorem ipsum dolor. The quick brown fox jumped over the lazy dog. lorem ipsum dolor. The quick brown fox jumped over the lazy dog.
            </div>
          <div>
            <h1>Hello Kitty</h1>
            <?php
                if(isset($_POST['y'])){
                    echo "hello.....";
                    echo $_POST['value'];
                }
            ?>
            <form method="post" name="form" action="index.php">
                <select name="value">
                    <option value="1" > 1</option>
                    <option value="2" > 2</option>
            </select>
                <input name="y"  type="submit"/>
                
        </form>
        </div>


           
        </div>
        </br>
        <br/>
        
         
            <div id="modal" class="modal" >
                <div class="modal-box">
                <h1> This is a modal </h1>
                <button  onclick="closeModal()"> X </button>
                </div>
            </div>
            <button id="btn" onclick="openModal()"> Open </button>
            <script>
            //openModal js
            
           var a = document.getElementById("modal");
            var b = document.getElementById("modal-box");
            var c = document.getElementById("btn");
           
          function openModal(){
            a.style.display = "block";
         }
         
          function closeModal(){
            a.style.display = "none";
          }

          window.onclick = (event) =>{
            if(event.target == a){
                a.style.display = "none";
            }
          }
            

        
          </script>
        
    </body>
</html>
<!-- 
=
