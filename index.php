<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Covid 19 case</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        
    }
    
    .box{
        margin-top: 15px;
        padding:30px 50px;
        border: 1px solid orange;
      }
      .My_table{
          margin:10px;
           
      }
      .mystyle{
        color: red;
        margin-top: 10px;
        padding: 10px 20px;
        font-weight: unset;
        letter-spacing: 1.5px;
      }
    
</style>

</head>
<body>
    <h1 class="text-center text-uppercase bg-dark mystyle">covid 19 report in world </h1>
    <div class="container">
    <h3 id="contry" class="text-center text-uppercase"style="color: blue; font-size:50px" ></h3>
    <h3 id="date"  class="text-center" ></h3>
        <div class="row">
            <div class="col-md-4">
                <div class="activeCase justify-content-center box ">
                    <h3 style="color: #FFB300" class="text-center" >TOTAL ACTIVE CASE OF INDIA</h3>
                    <h4 id="active" class="text-center" style="color: yellow"></h4>
                    
                </div>
            </div>
            <div class="col-md-4">
                <div class=" box">
                    <h3 style="color: red" class="text-center" >TOTAL DEAD CASE OF INDIA</h3>
                    <h4 id="dead" class="text-center" style="color: red" ></h4>
                </div>
            </div>
            <div class="col-md-4">
                <div class="PureCase justify-content-center box ">
                        <h3 style="color: green" class="text-center" >TOTAL CURE CASE OF INDIA</h3>
                        <h4 id="recover" class="text-center" style="color: green" ></h4>

                    
                </div>
            </div> 
        </div>

        <table class="table My_table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Countery Name</th>
                    <th scope="col">Active Case</th>
                    <th scope="col">Dead Case</th>
                    <th scope="col">Recover Case</th>
                </tr>
            </thead>
            <tbody id="list" >
            
            </tbody>
         </table>



    </div>



    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
        //fetch('http://localhost/covidx/data.json')
        fetch('https://api.covid19api.com/summary')
         .then((apidata)=>{
        //    console.log(apidata);
            return apidata.json();
         })
         .then((data)=>{
             console.log(data)
            // console.log(Object.keys(data.Countries).length);

            document.querySelector("#contry").innerHTML=(data.Countries[76].Country);
            document.querySelector("#date").innerHTML=(data.Countries[76].Date);
            document.querySelector("#active").innerHTML=(data.Countries[76].TotalConfirmed);
            document.querySelector("#dead").innerHTML=(data.Countries[76].TotalDeaths);
            document.querySelector("#recover").innerHTML=(data.Countries[76].TotalRecovered);
            // table ka data////////
            var str="";
           for (var i=0; i<=(Object.keys(data.Countries).length); i++){
                str+="<tr><td>"+(data.Countries[i].Country)+"</td><td>"+(data.Countries[i].TotalConfirmed)+"</td><td>"+(data.Countries[i].TotalConfirmed)+"</td> <td>"+(data.Countries[i].TotalRecovered)+"</td></tr>";
                //str +='<td>'+ data.Countries[i].Country +'</td>';
                document.getElementById("list").innerHTML=str;
            }
            console.log(str);
           
         });
    </script>

</body>
</html>
