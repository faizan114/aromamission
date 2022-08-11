<?php 
include_once('common/header.php');

include('controllers/AdminController.php');

$admin=new AdminManager();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Aroma</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/pricing/">

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
  .odd  tr:nth-child(even){


 
  background-color: #f2f2f2;


  }



</style>
  </head>

  <body ng-app="App" ng-controller="appController">



<!-- <div class=" text-center" style="background-color: #FFFFFF;">
   <h4 class="">
CSIR-Indian Institute of Integrative Medicine<br>
(Council of Scientific & Industrial Research)</h4>
   <a href="report.php" class="btn btn-primary">View Report</a>
   <hr>-->
   <!-- <p class="lead">Quickly build an effective pricing table for your potential customers with this Bootstrap example. It's built with default Bootstrap components and utilities with little customization.</p>
  -->
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

            
         </td>
       </tr>

         <tr>
           <td class="report" colspan="3">

          
     <a    href="report.php" class="btn btn-success"><b>View Project Report</b></a>
</td>
</tr>
       
 
     </table>



     <input type="text" style="height:60px" class="form-control" ng-model="search" name="searchs" placeholder="Search Project By Name" aria-label="Recipient's username" aria-describedby="basic-addon2">

   </div>
 </div>

 <div class="container">
   <div class=" mb-3 ">

     <div class="card">
       <h5 class="card-header" style="background-color:#007bff; color:white">PROJECT REPORTS</h5>
       <div class="card-body">
         <h3 ng-If="scientists.length==0">NO RESULUT FOUND</h3>
         <div class="card" style="margin-bottom: 10px;" ng-repeat="S in scientists  | filter : search track by $index">
           <h5 class="card-header " style="background-color:#007bff; color:white" data-toggle="collapse" data-target="#proj{{$index+1}}"> [{{$index+1}}] {{S.name}} </h5>
           <div class="collapse" id="proj{{$index+1}}">
             <div class="card-body">
               <table class="odd">
               <tr class="action">

                 <th class=qua>
                   SNO


                 </th>   

                 <th>
                 PROJECT NAME

                 </th>  
                   <th >
                  
                   MONTH NAME

                 </th> 
                  <th >
                  
                   WEEK NAME

                 </th> 

                 <th >
                  
                  Description

                </th>

                  <th class="act">
                  
                   FILES

                 </th> 
               </tr>

                 <tr  ng-repeat="Q in S.entries track by $index">

                 <td class="quater" >
<b> {{$index+1}}</b>


</td>
<td class="quater" >
<b> {{Q.ProjectName}}</b>


</td>

<td class="quater">
 {{Q.MonthName}}

</td>
<td class="quater">
 {{Q.WeekName}}

 </td>
 <td class="quater">
 {{Q.description}}

 </td>
 <td class="pdf">
    <a ng-If="Q.filename.length>0" href="uploads/{{Q.filename}}" class="btn btn-danger">VIEW PDF</a>
                   <a ng-If="Q.ppt_name.length>0" href="uploads/{{Q.ppt_name}}" class="btn btn-warning">VIEW PPT </a>
  
                   <span ng-If="Q.filename.length==0 && Q.ppt_name.length==0">Files not uploaded</span>

 </td>


                     </tr>



               </table>

         <!--      <div class="card" style="margin: 50px;" ng-repeat="Q in S.quaters">
                 <h5 class="card-header"> {{Q.name}} </h5>
                 <div class="card-body">
                   <p>{{Q.description}}</p>
                   <a ng-If="Q.filename.length>0" href="admin/uploads/{{Q.filename}}" class="btn btn-primary">view Pdf</a>
                   <a ng-If="Q.pptname.length>0" href="admin/uploads/{{Q.pptname}}" class="btn btn-primary">view PPT </a>
                 </div>
               </div>-->
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

 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>


</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>

<!-- ANGULAR SECTION -->
<script type="text/javascript">
   

    var app = angular.module("App", []);

    app.controller("appController", function ($scope, $http) {
      $scope.scientists=[];
      $scope.search = '';
 
     $http.get('controllers/GetScientists.php').then(function(data){
         $scope.scientists = data.data;
         console.log($scope.scientists)
         console.log("data loaded")
        });

    });


    </script>