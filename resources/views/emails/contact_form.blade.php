<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Template</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <!-- You can also use your own compiled Tailwind CSS file -->
</head>

<body class="bg-gray-100">
     <div class="flex items-center justify-center m-3">
        <img width="200" src="{{ asset('uploads/img/general/'.$general_site_image->site_white_logo_image) }}" alt="Placeholder Image" class="text-center" />
    </div>

    <div class="max-w-screen-lg mx-auto p-6 bg-white rounded shadow-md">
        <!-- Header -->
        <header class="text-center">
              
            <h1 class="text-2xl font-bold text-gray-800">Dear Author New One Client Message You.</h1>
           
        </header>

        <!-- Content -->
        <main class="mt-6">
             <p class="text-gray-700 mt-2">Subject: {{$data['subject']}}</p>
           
             <p class="text-gray-700">Dear {{$general_seo->site_name}},</p>
             <p class="text-gray-700 mt-2">{{$data['message']}}</p>
            <br>
            <hr>
            <p class="text-gray-700 mt-2 text-left">By</p>
            <p class="text-gray-700 mt-2 text-left">{{$data['name']}}</p>
            <p class="text-gray-700 mt-2 text-left">{{$data['email']}}</p>
          
        </main>

 
        
    </div>

</body>

</html>


