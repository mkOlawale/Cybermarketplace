<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
      <style>
         .center{
            /* margin: 0 auto; */
            text-align: center;
            padding-bottom: 20px;
         }
         .txt_comments{
            font-weight: bold;
            font-family: sans serif;
            /* font-size: 20px; */
         }
         .reply_section{
            padding-left: 60px;
         }
    
      </style>
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
        @include('home.header')
         <!-- end header section -->
         <!-- slider section -->
         @include('home.slider')
         <!-- end slider section -->
      </div>
      <!-- why section -->
      @include('home.why')
      <!-- end why section -->
      
      <!-- arrival section -->
      @include('home.arrival')
      <!-- end arrival section -->
      
      <!-- product section -->
      @include('home.product')
      <!-- end product section -->
      <!-- comment section starts from here -->
         <div class="center">

         <h1 class="txt_comments">All Comments</h1>
            <form action="{{ url('add_comments') }}" method="POST">
               @csrf
               <textarea name="comment" 
               id="commentid" cols="10" 
               rows="10"
               placeholder="Enter Your comments here"
               style="width: 400px"></textarea>
               <input type="submit" class="btn btn-primary" value="Comments">
            </form>
         </div>
         <div class="container">
  
            @foreach($comment as $comment)
             <div class="reply_section">
                  <b>{{$comment->name}}</b>
                  <p>{{$comment->comments}}</p>
                  <a style="color: blue;" href="javascript::void(0)" onclick="reply(this)" data-commentId="{{$comment->id}}"> Reply</a>
               @foreach($reply as $rep)
                  @if($rep->comment_id == $comment->id)
                  <div style="padding-left: 25px;">
                     <b>{{$rep->name}}</b>
                     <p>{{$rep->reply}}</p>
                     <a style="color: blue;" href="javascript::void(0)" onclick="reply(this)" data-commentId="{{$comment->id}}"> Reply</a>
                  </div>
                  @endif
                  @endforeach
             </div>
            @endforeach

            <div class="replydiv" style="padding-left: 70px; display: none;">
               <form action="{{ url('add_reply') }}" method="post">
                  @csrf
                  <input type="text" id="commentId" name="commentId" hidden>
               <textarea style="width: 400px;" name="reply" id="reply" cols="10" rows="10"></textarea> <br>
               <button  class="btn btn-primary" style="margin-bottom: 10px;">reply</button>
               <a href="javascript::void(0);" class="btn btn-danger" style="margin-bottom: 10px;" onclick="close(this)"> close</a>
            </form>
            </div>
            
         </div>
         
      <!-- comment section ends from here -->
      <!-- subscribe section -->
      @include('home.subscribe')
      <!-- end subscribe section -->
      <!-- client section -->
      @include('home.client')
      <!-- end client section -->
      <!-- footer start -->
      @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">Xcode</a>
         
         </p>
      </div>
      <script>
         function reply(caller) {
            document.getElementById('commentId').value = $(caller).attr('data-commentId');

            $('.replydiv').insertAfter($(caller));

            $('.replydiv').show();
         }

         function close(caller) {
            $('.replydiv').hide();
         }
      </script>
      <script>
         document.addEventListener("DOMContentLoaded", function(event){
            var scrollpos = localStorage.getItem('scrollpos');
            if(scrollpos) window.scrollTo(0, scrollpos);
         });

         window.onbeforeunload = function(e){
            localStorage.setItem('scrollpos', window.scrollY);
         }
      </script>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>