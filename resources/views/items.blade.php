<!DOCTYPE html>
<html lang="en">
<head>
  <!-- favicon -->
<link rel="shortcut icon" href="images/favlogo.ico" type="image/x-icon">
<link rel="icon" href="images/favlogo.ico" type="image/x-icon">

    <title>Mang Hiram</title>
   <link rel="stylesheet" href="{{ asset('css/item-page.css') }}">

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>
<style>
  .navbar{
    background-color: #20dbc2;
  }
</style>
<body>

  <!-- Navigation -->
  @include('_navbar');
    <div id="liveAlertPlaceholder" style="text-align: center; margin-top: 85px;"></div>

<!-- END NAV -->


<!-- 2 COLUMN SIDE AND MAIN -->

<div class="row">
    <div class="side"> 
      <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
        <center style="font-weight:bold;">Categories</center>
      <div class="position-sticky">
      <div class="list-group list-group-flush mx-3 mt-4">
        <a href="/items/" class="list-group-item list-group-item-action py-2 ripple">
          <span>View All Items</span>
        </a>
        <a href="/items/Gowns & Suits" class="list-group-item list-group-item-action py-2 ripple">
          <span>Gowns & Suits</span>
        </a>
        <a href="/items/Musical Instrument" class="list-group-item list-group-item-action py-2 ripple">
         <span>Musical Instruments</span>
        </a>
        <a href="/items/Tools" class="list-group-item list-group-item-action py-2 ripple">
           <span>Tools</span></a>
        <a href="/items/Books" class="list-group-item list-group-item-action py-2 ripple">
          <span>Books</span></a>
        <a href="/items/Entertainment" class="list-group-item list-group-item-action py-2 ripple">
         <span>Entertainment</span>
        </a>
        <a href="/items/Film And Photography" class="list-group-item list-group-item-action py-2 ripple">
          <span>Film/Photography</span></a>
        <a href="/items/Drones" class="list-group-item list-group-item-action py-2 ripple">
          <span>Drones</span></a>
        <a href="/items/Projectors" class="list-group-item list-group-item-action py-2 ripple">
          <span>Projectors</span></a>
        <a href="/items/Costumes" class="list-group-item list-group-item-action py-2 ripple">
          <span>Costumes</span></a>
        <a href="/items/Camping Tents" class="list-group-item list-group-item-action py-2 ripple">
          <span>Camping Tents</span></a>
        <a href="/items/Furnitures" class="list-group-item list-group-item-action py-2 ripple">
          <span>Furnitures</span></a>
      </div>
      </div>
    </div></div>
    <div class="main" style="margin-left: 200px;">

<!-- END 2 COLUMN SIDE AND MAIN -->

<div class="container" style="margin-top: 100px; margin-left: 20px;;">
    <form action="/search" method="post" class="d-flex" style="margin-bottom: 50px; margin-right: 750px">
        <input class="form-control me-1" type="search" placeholder="Search" aria-label="Search" name="searchfield" required>
        <button class="btn btn-primary" type="submit">Search</button>
    </form>
  <div class="row" id="gallery" data-toggle="modal" data-target="#eModal">
  <div class="row">
   
    
    <!-- Force next columns to break to new line at md breakpoint and up -->
    
    <!-- 4 COLUMN MAX PER ROW-->
    @foreach ($itemInfo as $item)
        <div class="col-6 col-sm-3" style="margin-bottom: 70px;"> 
            <a href="/items/view/{{ $item->item_id }}">
              <div class="card" style="max-height: 550px; overflow:visible;">
                <img class="w-100" src="{{ $item->image_path }}" alt="First slide"  data-slide-to="1">
              <div class="card-body">
                <h5 class="Item-Name">{{ $item->item_name }}</h5>
                <p class="Item-category" style="color: gray;">{{ $item->item_category }}</p>
                <p class="Item-Description" style="white-space: pre-wrap;" > Rate: ₱{{ $item->rental_rate }} per day</p>
                </a>
                
                <form method="post" action="/items">
                  <input type="hidden" name="itemId" value="{{ $item->item_id }}">
                </form>
              </div>
              <div class="card-footer">
                <small id="dateVal" class="text-muted">Date Posted: {{ $item->date_posted }}</small>
                
              </div>
              </div>
            
          </div>
    @endforeach


    
   
  </div>
</div>
</div>

</div> <!--main end-->
</div>



  </body>

<script>
// async function getStatus(){  
//     var status = '<%=status%>'
   
//     if(status == 'requestSuccess'){
//       const alertPlaceholder = document.getElementById('liveAlertPlaceholder')    
//       const wrapper = document.createElement('div')
//       wrapper.innerHTML = [
//         `<div class="alert alert-success alert-dismissible" role="alert">`,
//         `   <div>The rental has been requested! View <a href="/dashboard/user/requests">here</a></div>`,
//         '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
//         '</div>'
//       ].join('')
       
//       alertPlaceholder.append(wrapper)  
//     }


//   }
 
//   getStatus()
</script>
  </html>
