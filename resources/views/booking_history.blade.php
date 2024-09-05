@extends("layouts/user_side_master")
@section("pagename" , "Booking History")
@section("content")
   @foreach($userBookings as $userBooking)
       <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
           <div class="container">
               <div class="booking p-5">
                   <div class="row g-5 align-items-center">
                       <div class="col-md-6 text-white">
                           <h6 class="text-white text-uppercase">Booking</h6>
                           <h1 class="text-white mb-4">Online Booking</h1>
                           <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam
                               et eos. Clita erat ipsum et lorem et sit.</p>
                           <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam
                               et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat
                               amet</p>
                           <a class="btn btn-outline-light py-3 px-5 mt-2" href="">Read More</a>
                       </div>
                       <div class="col-md-6">


                       </div>
                   </div>
               </div>
           </div>
       </div>

   @endforeach
@endsection



