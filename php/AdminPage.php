<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/theme.css">
  <link rel="stylesheet" href="../css/sheet.css">
  <link rel="stylesheet" href="../css/tab.css">
  <link rel="stylesheet" href="../css/modifiche.css">
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script
      src="https://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  <script type="text/javascript" src="../js/modifiche.js"></script>
  <!-- Page informations and icon -->
  <title>UniHungry - Modifiche</title>
  <link rel="shortcut icon" href="../res/icon.ico" />
</head>
  <body>
    <?php
    include 'navbar.php';
     ?>
     <div class="modifyBox">
       <nav>
         <div class="nav nav-tabs" id="nav-tab" role="tablist">
           <a class="nav-item nav-link active tabLink" id="inProgress-tab" data-toggle="tab" href="#inProgress" role="tab" aria-controls="inProgress" aria-selected="true">Modifiche in corso</a>
           <a class="nav-item nav-link tabLink" id="approved-tab" data-toggle="tab" href="#approved" role="tab" aria-controls="approved" aria-selected="false">Modifiche approvate</a>
           <a class="nav-item nav-link tabLink" id="denied-tab" data-toggle="tab" href="#denied" role="tab" aria-controls="denied" aria-selected="false">Modifiche rifiutate</a>
         </div>
       </nav>
       <div class="tab-content">
         <div class="tab-pane active blackCol" id="inProgress">
           <div class="container fullScreen">
             <div class="row title">
               <div class="col-4">
                 OGGETTO
               </div>
               <div class="col-6">
                 DESCRIZIONE
               </div>
             </div>
             <hr/>
             <div class="row">
               <div class="col-4">
                 Ciao
               </div>
               <div class="col-6">
                 Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
               </div>
               <div class="col-2">
                 <div class="row">
                   <div class="col-6">
                     <button class="btn green">Approva</button>
                   </div>
                   <div class="col-6">
                     <button class="btn purple">Rifiuta</button>
                   </div>
                 </div>
               </div>
             </div>
           </div>
         </div>
         <div class="tab-pane fade in blackCol" id="approved">
           MADIO
         </div>
         <div class="tab-pane fade in blackCol" id="denied">
           PDIO
         </div>
       </div>
     </div>
  </body>
</html>
