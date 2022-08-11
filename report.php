<?php 
include_once('common/header.php');

include('controllers/AdminController.php');

$admin=new AdminManager();
?>

<!doctype html>
<html lang="en">
  <head>
 
    <style> 
  .inst{
  font-weight:bold;
  font-size:24px;
}
.logo
{
  width: 70px;
  height: 70px;
  margin-top: 10px;
}
.council
{
  padding-top:5px;
  padding-bottom: 5px;
  padding-left:70px;
  background-color:#CCCCFF; 

}
.inst-name
{
  text-align:center; 
}
table
{
  width:100%;
  border: 1px solid #CCCCFF;
}
.logo2{
  text-align: right;
}
.report
{
  text-align:center; 
}
.pdf{
  text-align: right;
    padding-top:10px;
  padding-bottom: 10px;

}
.action{
  background-color: green;
  color: #FFFFFF;
}
.act{
  text-align: right;
  padding-right: 100px;
  padding-top:10px;
  padding-bottom: 10px;

}
.quater{
  padding-top:10px;
  padding-bottom: 10px;
  padding-left: 10px;
}
.qua{
   padding-left: 10px;

}
.table tr:nth-child(even){
  background-color: #f2f2f2;

}




</style>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Aroma</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/pricing/">

 
  </head>

  <body ng-app="App" ng-controller="appController">

    <div class="container">
      <table>
        <tr>
          <td>
             <img src="https://iiim.res.in/wp-content/uploads/2017/10/cropped-Council_of_Scientific_and_Industrial_Research_logo.png" class="logo"> 

             
          </td>

          <td class="inst-name">
            <span class="inst"> CSIR-INDIAN INSTITUTE OF INTEGRATIVE MEDICINE</span><br>
            (Council of Scientific & Industrial Research)

          </td>
           <td class="logo2">
             <img src="https://iiim.res.in/wp-content/uploads/2017/10/cropped-Council_of_Scientific_and_Industrial_Research_logo.png" class="logo"> 


</tr>
        
  
      </table>
      

         
       <table class="table">
  <thead>
    <tr>
      <th scope="col">S.no</th>
      <th scope="col">Project Name</th>
      <th scope="col">Month Name</th>
      <th scope="col">Week Name</th>
      <th scope="col">Report Submitted</th>
      
   
    </tr>
  </thead>
  <tbody>
    <tr ng-repeat="p in scientists   track by $index">
      <th scope="row">{{$index+1}}</th>
      <td>{{p.projectName}} </td>
      
      <td> 
      {{p.MonthName}}
    </td>
    
    
    <td> 
    {{p.WeekName}}
    </td>
    
    <td><span ng-if="p.status>0">YES</span>
      <span ng-if="p.status==null">No</span> 
    
    </td>
    </tr>
    
  </tbody>
</table>
       
    </div>
        
    
    
    </div>
         </div>
         </div>
       
      
      </div>



      </div>
     
      </div>

    







      <footer class="pt-4 my-md-5 pt-md-5 border-top">
       
      </footer>
    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
   
   
  
  </body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>

<!-- ANGULAR SECTION -->
<script type="text/javascript">
   

    var app = angular.module("App", []);

    app.controller("appController", function ($scope, $http) {
      $scope.scientists=[];
      $scope.search = '';
    // console.log("Working")

     $http.get('controllers/GetReport.php').then(function(data){
        $scope.scientists = data.data;
         console.log(data.data)
         console.log("Working")
        });
        $scope.search=function(arr,id)
      {
        let index =-1
        console.log(arr)
        console.log(id);
         index = arr.findIndex(obj => obj.id == id);
        
         if(index==-1)
         return false


         return true;
      }
    });


    


    </script>