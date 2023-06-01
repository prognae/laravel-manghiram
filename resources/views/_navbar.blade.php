<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow fixed-top">
    <div class="container">
      <a class="navbar-brand" href="/"><img src="/images/logoMH.png" width="200px"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- alert placeholder -->
      
      <div class="collapse navbar-collapse" id="navbarResponsive">        
        <ul class="navbar-nav ms-auto">
          <li class="nav-item active">
            <a class="nav-link" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/items">Browse</a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li> -->
          @if(!$user)
            <li class="nav-item">
              <a class="nav-link" href="#">No User</a>
            </li>
          @elseif($user)
          <li class="nav-item">
            <a class="nav-link" href="/chat/show">Chat</a>
          </li>
            <li class="nav-item">
              <a class="nav-link" href="/dashboard">Dashboard</a>
            </li>
            <div class="dropdown">
              <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{ $user }}
              </a>
            
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="/profile/<%= user_id %>">Your Profile</a></li>
                <li><a class="dropdown-item" href="/seller/items">Your Items</a></li>
                <li><a class="dropdown-item" href="/email/check-verified">List an Item</a></li>
                <li>
                    <a class="dropdown-item" href="/cart">Cart <i class="fa-solid fa-cart-shopping"></i>
                      
                      <span class='badge badge-warning' id='lblCartCount'> <%= cart_count %> </span>
                    </a>
                </li>                      
                <li><a class="dropdown-item" href="/logout">Logout</a></li>
              </ul>
            </div>
            @endif
          
        </ul>
      </div>
    </div>
  </nav>    
