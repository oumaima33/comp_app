<x-app-layout>
    
    <link href="import/css/styles.css" rel="stylesheet" />
    <style>
        .body{
            background-color: blueviolet;
        }
        h1{
            text-align: center;
            font-size: 2rem;
            margin-top: 5rem;

        }
        .img{
            position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);


        }
        .span{
            font-size: 14px;
        }
        

    </style>
     <header class="py-3">
        <div class="container px-3 pb-3">
            <div class="row gx-3 align-center">
                <div class="col-xxl-3">
                    <!-- Header text content-->
                    <div class="text-center text-xxl-start">
    <div>
        <h1 class="display-3 fw-bolder mb-5"><span class="text-gradient d-inline">Hello!, <span >{{auth()->user()->name}}</span></span></h1>

    </div>
    <div class="d-flex justify-content-center mt-5 mt-xxl-0">
        
            <!-- TIP: For best results, use a photo with a transparent background like the demo example below-->
            <!-- Watch a tutorial on how to do this on YouTube (link)-->
            <img class="profile-img" src="images/hello (1).png" alt="..." />
        </div>

<h1 class="display-3 fw-bolder mb-5"><span class="text-gradient d-inline">Welcome To Our APP</span></h1>
</div>
</div>
</div>
</div>

</header>

</div>

</x-app-layout>
