   <!DOCTYPE html>
   <html lang="en">

   <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <meta http-equiv="X-UA-Compatible" content="ie=edge">

       <style>
           @import url(https://fonts.googleapis.com/css?family=Pacifico|Montserrat:400,700|Open+Sans:400,300italic,300,400italic,600);

           body {
               background-color: #EAEDF1;
           }

           .profile-card {
               background-color: #ffffff;
               border-radius: 24px;
               box-shadow: 0 68px 118px rgba(233, 249, 210, 0.5);
               margin: 50px auto 0;
               padding: 100px;
               width: 800px;
           }

           header img {
               float: left;
               height: 90px;
               width: 90px;
               margin-right: 30px;
           }

           header h1 {
               font-family: "Montserrat", sans-serif;
               font-size: 28px;
               font-weight: bold;
               padding-top: 6px;
               text-transform: uppercase;
           }


           header h2 {
               font-family: "Montserrat", sans-serif;
               font-size: 20px;
               font-weight: normal;
               line-height: 0;
           }


           .profile-bio {
               margin-bottom: 50px;
               margin-top: 80px;
           }


           .profile-bio p {
               font-family: "Open Sans", sans-serif;
               font-size: 20px;
               font-weight: lighter;
               line-height: 34px;
           }


           .profile-social-links {
               border-top: 1px solid #efefef;
               list-style: outside none none;
               padding-top: 30px;
               text-align: center;
               margin-left: -40px;
           }

           .profile-social-links li {
               display: inline-block;
           }


           .profile-social-links img {
               height: 60px;
           }

       </style>
   </head>

   <body>


       <aside class="profile-card">

           <header>
               <!-- the username -->
               <h1>Puskar Unmer Malang</h1>

               <!-- and role or location -->
           </header>

           <!-- bit of a bio; who are you? -->
           <div class="profile-bio">

               <p>{!! $email['body'] !!}</p>
           </div>
           <!-- some social links to show off -->
           <ul class="profile-social-links">

               <li>
                   <a href="{{ route('home') }}">
                       <img src="{{ asset('user/assets/img/logos/pusat-karir.svg') }}">
                   </a>
               </li>
           </ul>
       </aside>

   </body>

   </html>
