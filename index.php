<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Example for Data Class</title>
    <style>
        body{
	            background-image: linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)),url("restaurant.jpg");
                background-repeat: no-repeat;
                background-size: cover;
	            width:100%;
	            height:100vh;
        }
        h1{
	            font-size:3vw;
	            margin-top: 50px;
	            color: tomato;
        }

        #menu {
	            margin-top:3vh;
	            width:750px;
	            height:40px;
	            font-size:1vw;
	            border:0.5px solid white;
	            border-radius:10px;
	            background-color:rgba(0,0,0,0.2);
	            color:white;
        } 

        #container label{
    
                font-size: 2vw;
                color:violet;
                letter-spacing: 3px;
                font-weight: bold;
   
        }

        .footer{
                position: absolute;
                bottom: 0px;
                color: rgb(209, 161, 5);
                text-align: center;
                left: 650px;
                font-weight: bold;
        }

        #center{
                width:70%;
                margin-left: 15%;
                margin-right : 15%;
                color:white;
        }

        table td{
                border: 1.5px solid black;
        }

        table tr th{
                 border: 1.5px solid black;
        }

    </style>
</head>
<body>
    <div id="container">
            <center>
               <h1>Imperial Restaurant</h1>
                <label>MENU</label>
                <br>
                <br>
                <div>
                    <select id="menu">
                        <option value=" ">Select Item</option>    
                    </select>
                </div>
                <br>
            </center>
    </div>
        <br><br><br><br><br>
    <div class="table" id="table" style="display:none">
    <table id="center">
            <tr>
              <th>Name</th>
              <td id="name"></td>
            </tr>
            <tr>
              <th>ID</th>
              <td id="id"></td>
            </tr>
            <tr>
              <th>Short Name</th>
              <td id="sname"></td>
            </tr>
            <tr>
              <th>Description</th>
              <td id="descp"></td>
            </tr>
            <tr>
              <th>Price Small</th>
              <td id="ps"></td>
            </tr>
            <tr>
              <th>Price Large</th>
              <td id="pl"></td>
            </tr>
            <tr>
              <th>Small Portion Name</th>
              <td id="spn"></td>
            </tr>
            <tr>
              <th>Large Portion Name</th>
              <td id="lpn"></td>
            </tr>
          </table>
    </div>
    <div class="footer">
            <p>All Right Reserved &COPY; 2020</p>
    </div>

    <script src="jquery-3.5.1.min.js"></script>
    <script>
        let base_url = "http://localhost/Shubham/restaurant.php";

        $("document").ready(function(){
            getMenuList();
            document.querySelector("#menu").addEventListener("change",getMenuItem);
        });

        function getMenuList() {
            let url = base_url + "?req=menu_list";
            $.get(url,function(data,success){
                for (const key in data) {
                let opt = document.createElement("option");
                opt.textContent = data[key].name;
                opt.value = data[key].name; 
                document.querySelector('#menu').appendChild(opt);
            }
            });
        }
        
            function getMenuItem(e)
            {
                
                let ItemName=e.target.value;
                
                let url=base_url + "?req=menu_item&name="+ItemName;
                $.get(url,function(data,success){
              
                        if(data != null){

                        document.getElementById("name").innerHTML = data.name;
                        document.getElementById("id").innerHTML = data.id;
                        document.getElementById("sname").innerHTML = data.short_name;
                        document.getElementById("descp").innerHTML = data.description;
                        document.getElementById("ps").innerHTML = data.price_small;
                        document.getElementById("pl").innerHTML = data.price_large;
                        document.getElementById("spn").innerHTML = data.small_portion_name;
                        document.getElementById("lpn").innerHTML = data.large_portion_name;
                    }
                    document.getElementById("table").style.display = "block";
                });
                
            }
    </script>
</body>
</html>