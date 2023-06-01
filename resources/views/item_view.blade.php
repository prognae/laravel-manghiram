<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- favicon -->
<link rel="shortcut icon" href="img/favlogo.ico" type="image/x-icon">
<link rel="icon" href="img/favlogo.ico" type="image/x-icon">

    <title>Mang Hiram</title>
   <link rel="stylesheet" href="{{ asset('css/view-item.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- for latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>


<!-- for date picker -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<!-- for leflet.js (map)-->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
crossorigin=""></script>

<!-- favicon -->
<link rel="shortcut icon" href="/views/images/favlogo.ico" type="image/x-icon">
<link rel="icon" href="/views/images/favlogo.ico" type="image/x-icon">
    <title>Mang Hiram</title>
</head>


  <!-- Navbar -->
  @include('_navbar')

  <body>
    <div class="main">
      <div class="container">
          <div class="row align-items-start">
            <div class="col">
              <div class="polaroid">
                  <img src="{{ $itemInfo[0]->image_path }}" alt="" style="width:100%">
                    <div class="p-container"></div>
                </div>

            <h4 style="font-weight: bold;">Description:</h4>

            <div class="desc" style="font: weight 1px; color: darkslategrey; white-space: pre-wrap;">{{ $itemInfo[0]->item_description }}</div>
                <!-- line separator -->
              <hr style="height:2px;border-width:0;color:gray;background-color:gray">

              <p style="font-weight: bold;">Rental fee: ₱{{ $itemInfo[0]->rental_rate }}<br>
                  Deposit fee: ₱{{ $itemInfo[0]->replacement_cost }}<br>

               </p>
            </div>
            <div class="col">
              <h3 style="text-align: center;">{{ $itemInfo[0]->item_name }}</h3>
              <div class="box1">

                  <div>
                    <h4>Choose dates</h4>
                    <input type="text" id="daterange" name="daterange"/>  
                    <br>
                  </div>
                    <!-- Button trigger modal -->                    
                    @if ($user_id == $itemInfo[0]->account_id)
                        <h6 style="text-align: center;">YOU ARE THE OWNER</h6>
                    @else
                        <button type="button" class="btna btna-primary" data-bs-toggle="modal" data-bs-target="#agreementModal" onclick="insertDate()">Check Availability</button>
                    @endif
                </div>

  <!-- MAP -->
          <br>
          <p style="font-weight: bold;">INTERACTIVE MAP</p>
          @if ($mapInfo[0]->map_x_coordinate == null || $mapInfo[0]->map_y_coordinate == null)
            <p>There is no map info for this user.</p>
          @elseif($mapInfo[0]->map_x_coordinate != null || $mapInfo[0]->map_y_coordinate != null)
            <div id="map"></div>
          @endif



  <!-- MAP END-->
          <br>
       <h4>Item owned by {{ $itemInfo[0]->vusername }}</h4>
       <a target="_blank" href="/profile/{{ $itemInfo[0]->account_id }}">
        <img class="img2" src="/images/profile.png" alt="profile" style="width:100px"> </a>
  
  <!--  /rating end  -->
            <br>
            <br>
        <a href="/chat/show/{{ $itemInfo[0]->account_id }}/<%=user_id%>{{ $itemInfo[0]->account_id }}"><button class="btn-message">Message</button></a>
        <a href="/profile/{{ $itemInfo[0]->account_id }}"><button class="btn-profile">See Profile</button></a>
            </div>
          </div>

        </div>
  </div>

  <div class="container" style="margin-top: -100px;">
    <hr>
    <% if(ratingsTotal == 0){ %>
      <% } else if(ratingsTotal){ %>
    <div class="row" style="margin-bottom: 40px;">
      <div class="col-sm-3">
          <div class="rating-block">
              <h4>Average user rating</h4>
    <p class="mb-4"><strong><%=ratingsTotal[0].average %></strong><i class="fa-solid fa-star" style="color: orange;"></i> <span class="text-primary font-italic me-1"><%=ratingsTotal[0].total %> Reviews</span> 
    </p>
          </div>
      </div>
      
  
    <div class="col-sm-3">
      <h4>Rating Breakdown</h4>
      <p class="mb-1" style="font-size: .77rem;"><i class="fa-solid fa-star" style="color: orange;"></i> 5.0 (<%=ratingsTotal[0].rating5 %>)</p>
    <div class="progress rounded" style="height: 8px;">
      <div class="progress-bar" role="progressbar" id="progress5"  aria-valuenow="85"
        aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    <p class="mt-4 mb-1" style="font-size: .77rem;"><i class="fa-solid fa-star" style="color: orange;"></i> 4.0 (<%=ratingsTotal[0].rating4 %>) </p>
    <div class="progress rounded" style="height: 8px;">
      <div class="progress-bar" role="progressbar" id="progress4"  aria-valuenow="43"
        aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    <p class="mt-4 mb-1" style="font-size: .77rem;"><i class="fa-solid fa-star" style="color: orange;"></i> 3.0 (<%=ratingsTotal[0].rating3 %>)</p>
    <div class="progress rounded" style="height: 8px;">
      <div class="progress-bar" role="progressbar" id="progress3"  aria-valuenow="19"
        aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    <p class="mt-4 mb-1" style="font-size: .77rem;"><i class="fa-solid fa-star" style="color: orange;"></i> 2.0 (<%=ratingsTotal[0].rating2 %>) </p>
    <div class="progress rounded" style="height: 8px;">
      <div class="progress-bar" role="progressbar" id="progress2"  aria-valuenow="0"
        aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    <p class="mt-4 mb-1" style="font-size: .77rem;"><i class="fa-solid fa-star" style="color: orange;"></i> 1.0 (<%=ratingsTotal[0].rating1 %>) </p>
    <div class="progress rounded mb-1" style="height: 8px;">
      <div class="progress-bar" role="progressbar" id="progress1"  aria-valuenow="0"
        aria-valuemin="0" aria-valuemax="100"></div>
    </div>
  </div>
  <% } %>

    <h4 style="margin-bottom: 30px;">Reviews / Comments</h4>

    <section id="reviews">

          <div class="review-container">
            <% if(ratings == 0){ %>
              <h6>This item has no reviews yet</h6>
            <% }else if(ratings){ %>
              <% ratings.forEach(function(rating){ %>
                <div class="review-box">
                  <div class="box-top">
                      <div class="profile"> 
                          <div class="profile-img">
                              <img src="/images/profile.png"/>
                          </div>
                          <div class="username">
                              <strong><%=rating.username %></strong>
                              <span>@<%=rating.username %></span>
                          </div>
                      </div>
                      
                      <div class="reviews">
                          <i class="fas fa-star"></i>
                          <span><%=rating.rating %></span>
                      </div>
                  </div>
                   <!-- comments ----------------->
                   <div class="comments">
                      <p><%=rating.comment %></p>
                   </div>
              </div>
              <% }) %>              
            <% } %>
          </div>

      </section>
      <section>
          <br><br>
        <h2 style="margin-top:20px">Others Also Looked For</h2>
        <div class="card-container" >
        <% recommend.forEach(function(item, i){ %>
        <% if(i >= 5 ){ %>
            <% return; }%>
            <% console.log(i)%>
        <% if(result[0].item_id != item.item_id ){ %>

          <div class="card-content-row" > 
            <a href="/items/view/<%= item.item_id %>">
              <div class="card" style="max-height: 300px; overflow:visible;">
                <img class="w-100" src="<%= item.image_path %>" alt="First slide"  data-slide-to="1">
              <div class="card-body">
                <h5 class="Item-Name"><%= item.item_name %></h5>
                <p class="Item-category" style="color: gray;"><%= item.item_category %></p>
                <p class="Item-Description" style="white-space: pre-wrap;" > Rate: ₱<%= item.rental_rate %> per day</p>
                </a>
                
                <form method="post" action="/items">
                  <input type="hidden" name="itemId" value="<%= item.item_id %>">
                  <!-- <button name="addtocart" type="submit" value="<%= item.item_id %>">Add To Wishlist</button> -->
                </form>
              </div>
              </div>
          </div>
            <%  }%>
        <% }) %>
        </div>
      </section>
  </div>

  <br>
    <section style="height: 99px;">


    </section>



    <!-- Modal -->
    <form action="/items/view/<%= result[0].item_id %>/reserve" method="post">
    <div class="modal fade" id="btnModal" tabindex="-1" aria-labelledby="btnModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" >
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="btnModalLabel"><%= result[0].item_name %></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <div class="container">
                  <div class="row align-items-start">
                    <div class="col">
                      <div class="polaroid">
                          <img src="<%= result[0].image_path %>" alt="" style="width:100%">
                            <div class="p-container"></div>
                        </div>
                    </div>
                    <div class="col" >                    
                          <label for="Startdate"><b>Reservation Start:</b></label>
                          <input type="text" id="start_date" name="start_date" value="" readonly><br>


                          <label for="enddate"><b>Reservation End:</b></label><br>
                          <input type="text" id="end_date" name="end_date" value="" readonly><br>

                        <p>
                        <b>Rental fee:  <%= result[0].rental_rate %></b><br>
                        <b>Deposit fee: <%= result[0].replacement_cost %></b><br>
                       <label for="quantity"><b>Quantity:</b></label>
                        <input type="number" name="modalQty" id="modalQty" value="1" min="1" max="<%= result[0].item_quantity %>" required> <br> <span style="font-size:smaller; color: grey;">Available Stock: <%= result[0].item_quantity %></span> <br><br>
                        <p><b>Mode of Payment:</b></p>
                          <input type="radio" id="gcash"  name="modeOfPayment" onClick="showModal()" value="2">
                          <label for="gcash">GCash</label><br>                    
                          <input type="radio" id="cod" name="modeOfPayment" onClick="codModal()" value="3">
                          <label for="cod">Cash on Delivery</label>
                     </p>
                    </div>
                  </div>
                </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-dark" value="reserve" name="submitButton"><i class="fa-solid fa-tag"></i>Request Reservation</button>
            <button type="submit" class="btn btn-dark" value="addToCart" name="submitButton"><i class="fa-solid fa-heart"></i> Add to Watchlist</button>
           <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button> -->

          </div>
        </div>
      </div>
    </div>
  </form>
 <form action="/dashboard/user/rentals/ongoing/accept" method="post">
<!-- Modal -->
        <div class="modal fade" id="GModal" role="dialog">
        <div class="modal-dialog">

<!-- Modal content-->
            <div class="modal-content" style= "width: 750px; ">
              <div class="modal-header" style ="background-color: #33cccc; color: white;">
                  <h4 class="modal-title" style ="background-color: #33cccc; color: white;">Payment Confirmation</h4>
                <span class="close" data-dismiss="modal" style = " color: white;" onClick="backModal()">&times;</span>
              </div>
              <div class="modal-body" style="background-color: white;">

                    <div class="container" style="color: black; width: 650px; height: auto; background-color: white; font-family: 'Poppins'; font-size: medium;" >
                        <div class="p-5 my-4 bg-white rounded-3">
                            <img src="/images/GCash-Logo.png" style="width: 200px; height:120px;">
                            <p><strong>Name: <%= result[0].vusername %></strong>  <br>
                                <strong>Contact no.: <%= map[0].phone_num %> </strong><br>
                                <hr>
                                <strong>Reservation Start: <span id="gResStart"></strong></span><br>
                                <strong >Reservation End:  <span id="gResEnd"></span></strong><br>
                                <strong >Item Name:</strong> <%= result[0].item_name %><br>
                                <strong >Quantity</strong> <span id="gQuantity"></span> <br>
                                <strong>Rental Fee:</strong> ₱<span id="gRental"></span><br>
                                <strong>Deposit Fee:</strong> ₱<span id="gReplacement"></span> <br>
                                <br>
                                <strong>Total:</strong> ₱<span id="gTotal"></span><br>
                                <hr>
                                <h4 style="color:#FF0000">IMPORTANT!</h4>
                                <span>Make sure that you have contacted the rental owner before proceeding to pay!</span>
                                <span style="text-decoration-line: underline";>NOTE: After requesting: Payment confirmation is uploaded in the <a href="/dashboard/user/requests" target="_blank">Rental Requests</a> Tab!</span>


                    <br>
                    <br>


              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" onClick="backModal()" >Next</button>
               <button type="button" class="btn btn-default" data-dismiss="modal" onClick="backModal()">Cancel</button>
              </div>
            </div>
          </div>
          </div>
        </div>
        </div>
  </form> 

<!-- COD Modal -->
        <div class="modal fade" id="codModal" role="dialog">
        <div class="modal-dialog">
<!-- COD Modal content-->
            <div class="modal-content" style= "width: 750px; ">
              <div class="modal-header" style ="background-color: #33cccc; color: white;">
                  <h4 class="modal-title" style ="background-color: #33cccc; color: white;">Payment Details</h4>
                <span class="close" data-dismiss="modal" style = " color: white;" onClick="codModal()">&times;</span>
              </div>
              <div class="modal-body" style="background-color: white;">

                    <div class="container" style="color: black; width: 650px; height: auto; background-color: white; font-family: 'Poppins'; font-size: medium;" >
                        <div class="p-5 my-4 bg-white rounded-3">
                            <img src="/images/system_images/deliver.png" style="width: 200px; height:150px;">
                            <p><strong>Name: <%= result[0].vusername %></strong>  <br>
                                <strong>Contact no.: <%= map[0].phone_num %> </strong><br>
                                <hr>
                                <strong>Reservation Start: <span id="cResStart"></strong></span><br>
                                <strong >Reservation End:  <span id="cResEnd"></span></strong><br>
                                <strong >Item Name:</strong> <%= result[0].item_name %><br>
                                <strong >Quantity</strong> <span id="cQuantity"></span> <br>
                                <strong>Rental Fee:</strong> ₱<span id="cRental"></span><br>
                                <strong>Deposit Fee:</strong> ₱<span id="cReplacement"></span> <br>
                                <br>
                                <strong>Total:</strong> ₱<span id="cTotal"></span><br>
                                <hr>
                    <br>
                    <br>


              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" onClick="backModal()" >Next</button>
               <button type="button" class="btn btn-default" data-dismiss="modal" onClick="backModal()">Cancel</button>
              </div>
            </div>
          </div>
          </div>
        </div>
        </div>
  </form> 

  <div class="modal fade" id="agreementModal" tabindex="-1" aria-labelledby="agreementModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg" >
      <div class="modal-content">
        <div class="modal-header" style="background-color: #33cccc;">
          <h4 class="modal-title" id="agreementModalLabel" style="color: white;">Rental Agreement</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="container">
                
    <h5>Overview</h5>
            <p>This website is operated by Mang Hiram. Throughout the site, the terms “we”, “us” and “our” refer to Mang Hiram. 
                Mang Hiram offers this website, including all information, tools and services available from this site to you, the user, conditioned upon your acceptance of all terms, conditions, policies and notices stated here. 
                By visiting our site and/ or purchasing something from us, you engage in our “Service” and agree to be bound by the following terms and conditions (“Terms of Service”, “Terms”), including those additional terms and conditions and policies referenced herein and/or available by hyperlink. These Terms of Service apply to all users of the site, including without limitation users who are browsers, vendors, customers, merchants, and/ or contributors of content. 
                <br><br><b>Please read these Terms of Service carefully before accessing or using our website. By accessing or using any part of the site, you agree to be bound by these Terms of Service. If you do not agree to all the terms and conditions of this agreement, then you may not access the website or use any services. </b>
                If these Terms of Service are considered an offer, acceptance is expressly limited to these Terms of Service.
                <br>
                <br>
                Any new features or tools which are added to the current store shall also be subject to the Terms of Service. You can review the most current version of the Terms of Service at any time on this page. We reserve the right to update, 
                change or replace any part of these Terms of Service by posting updates and/or changes to our website. It is your responsibility to check this page periodically for changes. Your continued use of or access to the website following the posting of any changes constitutes acceptance of those changes. </p>
    <h5>SECTION 1 - ONLINE STORE TERMS</h5>
         <p>By agreeing to these Terms of Service, you represent that you are at least the age of majority in your state or province of residence, 
             or that you are the age of majority in your state or province of residence and you have given us your consent to allow any of your minor dependents to use this site. 
             You may not use our products for any illegal or unauthorized purpose nor may you, in the use of the Service, violate any laws in your jurisdiction (including but not limited to copyright laws). 
             You must not transmit any worms or viruses or any code of a destructive nature. A breach or violation of any of the Terms will result in an immediate termination of your Services.</p>
        <br>
    <h5>SECTION 2 - GENERAL CONDITIONS</h5>    
            <p>We reserve the right to refuse service to anyone for any reason at any time. 
              You understand that your content, may be transferred unencrypted and involve 
              (a) transmissions over various networks; and (b) changes to conform and adapt to technical requirements of connecting networks or devices. 
                 You agree not to reproduce, duplicate, copy, sell, resell or exploit any portion of the Service, use of the Service, or access to the Service or any contact on the website through which the service is provided, without express written permission by us. The headings used in this agreement are included for convenience only and will not limit or otherwise affect these Terms.</p>
        <br>
    <h5>SECTION 3 - ACCURACY, COMPLETENESS AND TIMELINESS OF INFORMATION</h5> 
                <p>We are not responsible if information made available on this site is not accurate, complete or current. 
                    The material on this site is provided for general information only and should not be relied upon or used as the sole basis for making decisions without consulting primary, 
                    more accurate, more complete or more timely sources of information. Any reliance on the material on this site is at your own risk. 
                    This site may contain certain historical information. Historical information, necessarily, is not current and is provided for your reference only. 
                    We reserve the right to modify the contents of this site at any time, but we have no obligation to update any information on our site. 
                    You agree that it is your responsibility to monitor changes to our site.</p>
          <br>          
    <h5>SECTION 4 - MODIFICATIONS TO THE SERVICE AND PRICES</h5>
                    <p>Prices for our products are subject to change without notice. 
                        We reserve the right at any time to modify or discontinue the Service (or any part or content thereof) without notice at any time. 
                        We shall not be liable to you or to any third-party for any modification, 
                        price change, suspension or discontinuance of the Service.</p>
            <br>
    <h5>SECTION 5 - PRODUCTS OR SERVICES (if applicable)</h5>
                    <p>Certain products or services may be available exclusively online through the website. 
                            These products or services may have limited quantities and are subject to return or exchange only according to our Return Policy. 
                            We have made every effort to display as accurately as possible the colors and images of our products that appear at the store. 
                            We cannot guarantee that your computer monitor's display of any color will be accurate. We reserve the right, but are not obligated, 
                            to limit the sales of our products or Services to any person, geographic region or jurisdiction. We may exercise this right on a case-by-case basis. 
                            We reserve the right to limit the quantities of any products or services that we offer. All descriptions of products or product pricing are subject to change at anytime without notice, 
                            at the sole discretion of us. We reserve the right to discontinue any product at any time. Any offer for any product or service made on this site is void where prohibited. We do not warrant that the quality of any products, services, information, 
                            or other material purchased or obtained by you will meet your expectations, or that any errors in the Service will be corrected.</p>
            <br>
    <h5>SECTION 6 - ACCURACY OF BILLING AND ACCOUNT INFORMATION</h5>
                    <p>We reserve the right to refuse any order you place with us. We may, in our sole discretion, limit or cancel quantities purchased per person, per household or per order. 
                        These restrictions may include orders placed by or under the same customer account, and/or orders that use the same billing and/or shipping address. 
                        In the event that we make a change to or cancel an order, we may attempt to notify you by contacting the e‑mail and/or billing address/phone number provided at the time the order was made. 
                        We reserve the right to limit or prohibit orders that, in our sole judgment, appear to be placed by dealers, resellers or distributors. You agree to provide current, complete and accurate purchase and account information for all purchases made at our store. 
                        You agree to promptly update your account and other information, including your email address, so that we can complete your transactions and contact you as needed. </p>
            <br>
    <h5>SECTION 7 - OPTIONAL TOOLS</h5>
                        <p>We may provide you with access to third-party tools over which we neither monitor nor have any control nor input. 
                            You acknowledge and agree that we provide access to such tools ”as is” and “as available” without any warranties, representations or conditions of any kind and without any endorsement. 
                            We shall have no liability whatsoever arising from or relating to your use of optional third-party tools.<br>

                            <br>Any use by you of optional tools offered through the site is entirely at your own risk and discretion 
                            and you should ensure that you are familiar with and approve of the terms on which tools are provided by the relevant third-party provider(s). 
                            We may also, in the future, offer new services and/or features through the website (including, the release of new tools and resources). 
                            Such new features and/or services shall also be subject to these Terms of Service.</p>
            <br>

    <h5>SECTION 8 - THIRD-PARTY LINKS</h5>
                         <p>Certain content, products and services available via our Service may include materials from third-parties. 
                            Third-party links on this site may direct you to third-party websites that are not affiliated with us.
                             We are not responsible for examining or evaluating the content or accuracy and we do not warrant and will not have any liability or responsibility for any third-party materials or websites, or for any other materials, products, or services of third-parties. 
                             We are not liable for any harm or damages related to the purchase or use of goods, services, resources, content, or any other transactions made in connection with any third-party websites. Please review carefully the third-party's policies and practices and make sure you understand them before you engage in any transaction. 
                            Complaints, claims, concerns, or questions regarding third-party products should be directed to the third-party.</p>
            <br>
    <h5>SECTION 9 - USER COMMENTS, FEEDBACK AND OTHER SUBMISSIONS</h5>
                        <p>If, at our request, you send certain specific submissions (for example contest entries) or without a request from us you send creative ideas, suggestions, proposals, plans, or other materials, whether online, 
                            by email, by postal mail, or otherwise (collectively, 'comments'), you agree that we may, at any time, without restriction, edit, copy, publish, distribute, translate and otherwise use in any medium any comments that you forward to us. 
                            We are and shall be under no obligation (1) to maintain any comments in confidence; (2) to pay compensation for any comments; or (3) to respond to any comments. We may, but have no obligation to, monitor, edit or remove content that we determine in our sole discretion are unlawful, 
                            offensive, threatening, libelous, defamatory, pornographic, obscene or otherwise objectionable or violates any party’s intellectual property or these Terms of Service. You agree that your comments will not violate any right of any third-party, including copyright, trademark, privacy, personality or other 
                            personal or proprietary right. You further agree that your comments will not contain libelous or otherwise unlawful, abusive or obscene material, or contain any computer virus or other malware that could in any way affect the operation of the Service or any related website. You may not use a false e‑mail address, 
                            pretend to be someone other than yourself, or otherwise mislead us or third-parties as to the origin of any comments. You are solely responsible for any comments you make and their accuracy. 
                            We take no responsibility and assume no liability for any comments posted by you or any third-party.</p>
            <br>
    <h5>SECTION 10 - PERSONAL INFORMATION</h5>
                        <p>Your submission of personal information through the store is governed by our Privacy Policy. To view our <a href="privacy-policy.html">Privacy Policy</a></p>
            <br>
    <h5>SECTION 11 - ERRORS, INACCURACIES AND OMISSIONS</h5>
                        <p>Occasionally there may be information on our site or in the Service that contains typographical errors, inaccuracies or omissions that may relate to product descriptions, pricing, promotions, offers, product shipping charges, 
                            transit times and availability. We reserve the right to correct any errors, inaccuracies or omissions, and to change or update information or cancel orders if any information in the Service or on any related website is inaccurate 
                            at any time without prior notice (including after you have submitted your order). 
                            We undertake no obligation to update, amend or clarify information in the Service or on any related website, including without limitation, pricing information, except as required by law.
                            No specified update or refresh date applied in the Service or on any related website, should be taken to indicate that all information in the Service or on any related website has been modified or updated.</p>
            <br>
    <h5>SECTION 12 - PROHIBITED USES</h5>
                        <p>In addition to other prohibitions as set forth in the Terms of Service, you are prohibited from using the site or its content: 
                            (a) for any unlawful purpose; (b) to solicit others to perform or participate in any unlawful acts; (c) to violate any international, federal, provincial or state regulations, rules, laws, or local ordinances; 
                            (d) to infringe upon or violate our intellectual property rights or the intellectual property rights of others; (e) to harass, abuse, insult, harm, defame, slander, disparage, intimidate, or discriminate based on 
                            gender, sexual orientation, religion, ethnicity, race, age, national origin, or disability; (f) to submit false or misleading information; (g) to upload or transmit viruses or any other type of malicious code that will 
                            or may be used in any way that will affect the functionality or operation of the Service or of any related website, other websites, or the Internet; (h) to collect or track the personal information of others; 
                            (i) to spam, phish, pharm, pretext, spider, crawl, or scrape; (j) for any obscene or immoral purpose; or (k) to interfere with or circumvent the security features of the Service or any related website, other websites, or the Internet. 
                            We reserve the right to terminate your use of the Service or any related website for violating any of the prohibited uses.</p>
            <br>
    <h5>SECTION 13 - DISCLAIMER OF WARRANTIES; LIMITATION OF LIABILITY</h5>
                        <p>We do not guarantee, represent or warrant that your use of our service will be uninterrupted, timely, secure or error-free. We do not warrant that the results that may be obtained from the use of the service will be accurate or reliable. 
                            You agree that from time to time we may remove the service for indefinite periods of time or cancel the service at any time, without notice to you. You expressly agree that your use of, or inability to use, the service is at your sole risk. 
                            The service and all products and services delivered to you through the service are (except as expressly stated by us) provided 'as is' and 'as available' for your use, without any representation, warranties or conditions of any kind, either express or implied, 
                            including all implied warranties or conditions of merchantability, merchantable quality, fitness for a particular purpose, durability, title, and non-infringement.

                            <br><br>In no case shall Mang Hiram, our directors, developers, affiliates, suppliers, service providers or licensors be liable for any injury, loss, claim, or any direct, indirect, incidental, punitive, special, or consequential damages of any kind, 
                            including, without limitation lost profits, lost revenue, lost savings, loss of data, replacement costs, or any similar damages, whether based in contract, tort (including negligence), strict liability or otherwise, arising from your use of any of the service or any products procured using the service, or for any other claim related in any way to your use of the service or any product, including, but not limited to, any errors or omissions in any content, or any loss or damage of any kind incurred as a result of the use of the service or any content (or product) posted, transmitted, or otherwise made available via the service, even if advised of their possibility. Because some states or jurisdictions do not allow the exclusion or the limitation of liability for consequential or incidental damages, in such states or jurisdictions, our liability shall be limited to the maximum extent permitted by law.</p>
            <br>
    <h5>SECTION 14 - TERMINATION</h5>
                        <p>The obligations and liabilities of the parties incurred prior to the termination date shall survive the termination of this agreement for all purposes. 
                            These Terms of Service are effective unless and until terminated by either you or us. You may terminate these Terms of Service at any time by notifying us that you no longer wish to use our Services, 
                            or when you cease using our site. If in our sole judgment you fail, or we suspect that you have failed, to comply with any term or provision of these Terms of Service, we also may terminate this agreement at any time without notice and you will remain liable for all amounts due up to 
                            and including the date of termination; and/or accordingly may deny you access to our Services (or any part thereof).</p>
            <br>
    <h5>SECTION 15 - ENTIRE AGREEMENT</h5>
                         <p>You can review the most current version of the Terms of Service at any time at this page. 
                            We reserve the right, at our sole discretion, to update, change or replace any part of these Terms of Service by posting updates and changes to our website. 
                            It is your responsibility to check our website periodically for changes. Your continued use of or access to our website or the Service following the posting of any changes to these Terms of Service constitutes acceptance of those changes.</p>
            <br>
    <h5>SECTION 16 - CHANGES TO TERMS OF SERVICE</h5>
                         <p>The failure of us to exercise or enforce any right or provision of these Terms of Service shall not constitute a waiver of such right or provision. 
                            These Terms of Service and any policies or operating rules posted by us on this site or in respect to The Service constitutes the entire agreement and understanding between you and us and govern your use of the Service, 
                            superseding any prior or contemporaneous agreements, communications and proposals, whether oral or written, between you and us (including, but not limited to, any prior versions of the Terms of Service). 
                            Any ambiguities in the interpretation of these Terms of Service shall not be construed against the drafting party.</p>
            <br>
    <h5>SECTION 17 - CONTACT INFORMATION</h5>
                            <p>Questions about the Terms of Service should be sent to us at info@manghiram.com.</p>
            <br>
            <br>
            
              </div>
        </div>
        <div class="modal-footer" >
            <p><strong>You must read and agree to the above Terms of Service to use
                this product. By canceling you will not gain access to the service.</strong></p>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" onclick="enableButton()" required>
                <label class="form-check-label" for="flexCheckDefault">
                  I agree to the Rental Terms & Condition
                </label>
              </div>
            <button type="button" class="btn btn-dark" id="acceptButton" data-bs-toggle="modal" data-bs-target="#btnModal" onclick="insertDate()" disabled>Accept</button>
          <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
          
        </div>
      </div>
    </div>
  </div>




    <!-- Footer -->
  <footer class="text-center text-lg-start bg-light text-muted" style="margin-left: -300px; margin-right: -300px">
    <!-- Section: Social media -->
    <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
      <!-- Left -->
      <div class="me-5 d-none d-lg-block">
        <span>Get connected with us on social networks:</span>
      </div>
      <!-- Left -->

      <!-- Right -->
      <div>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-facebook-f"></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-twitter"></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-google"></i>
        </a>
        <a href="" class="me-4 text-reset">
          <i class="fab fa-instagram"></i>
        </a>
      </div>
      <!-- Right -->
    </section>
    <!-- Section: Social media -->

    <!-- Section: Links  -->
    <section class="">
      <div class="container text-center text-md-start mt-5">
        <!-- Grid row -->
        <div class="row mt-3">
          <!-- Grid column -->
          <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
            <!-- Content -->
            <h6 class="text-uppercase fw-bold mb-4">
              <i class="fas fa-gem me-3"></i>Mang Hiram
            </h6>
            <p>
              Our technology encourages people to share and brings local communities together. We'd love for you to join us, whether you're looking for a low-cost way to rent what you need locally, or you're a business or individual looking to make money from items you own that are sitting idle.
            </p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">
              Products
            </h6>
            <p>
              <a href="#!" class="text-reset"></a>
            </p>
            <p>
              <a href="#!" class="text-reset"></a>
            </p>
            <p>
              <a href="#!" class="text-reset"></a>
            </p>
            <p>
              <a href="#!" class="text-reset"></a>
            </p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">
              Useful links
            </h6>
            <p>
              <a href="#!" class="text-reset">Pricing</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Settings</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Orders</a>
            </p>
            <p>
              <a href="#!" class="text-reset">Help</a>
            </p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
            <!-- Links -->
            <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
            <p><i class="fas fa-home me-3"></i> Manila City, Philippines</p>
            <p>
              <i class="fas fa-envelope me-3"></i>
              manghiram@gmail.com
            </p>
            <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
            <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
          </div>
          <!-- Grid column -->
        </div>
        <!-- Grid row -->
      </div>
    </section>
    <!-- Section: Links  -->

    <!-- Copyright -->
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
      © 2021 Copyright:
      <a class="text-reset fw-bold" href="#">MangHiram.com</a>
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer -->

  </body>

  <script>

    function enableButton(){
      const cb = document.querySelector('#flexCheckDefault');
      if(cb.checked == true){
        document.getElementById("acceptButton").disabled = false
      }
      else if(cb.checked == false){
        document.getElementById("acceptButton").disabled = true
      }
    }
      var dateToday = new Date() 
      var getDate
            //document.getElementById("acceptItemModal").style.display='block'
            //document.getElementById("btnModal").style.display='block'
      function codModal(){
          cQty = document.getElementById("modalQty").value;
                gRent = <%= result[0].rental_rate %> * cQty
                gRep =  <%= result[0].replacement_cost %> * cQty
                gTotalsing = ((getDate * gRent)) + (gRep)
          cRental.innerHTML = gRent; 
          cReplacement.innerHTML = gRep; 
            cTotal.innerHTML = gTotalsing
                cQuantity.innerHTML = cQty; 
                $('#btnModal').modal('hide')
                $('#codModal').modal('show')
        }
            //<a data-dismiss="modal" data-toggle="modal" href="#lost">Click</a>
      function showModal(){
          gQty = document.getElementById("modalQty").value;
                gRent = <%= result[0].rental_rate %> * gQty
                gRep =  <%= result[0].replacement_cost %> * gQty
                gTotalsing = ((getDate * gRent)) + (gRep)
          gRental.innerHTML = gRent; 
          gReplacement.innerHTML = gRep; 
            gTotal.innerHTML = gTotalsing
                gQuantity.innerHTML = gQty; 
                $('#btnModal').modal('hide')
                $('#GModal').modal('show')
        }
      function backModal(){
            $('#GModal').modal('hide')
            $('#codModal').modal('hide')
                $('#btnModal').modal('show')
        }
      
      $(function() {
        $('input[name="daterange"]').daterangepicker({
          opens: 'left',
          minDate: dateToday,
  
          //for invalid dates
          isInvalidDate: function(date) {
            var dateRanges = [];       
            
            if('<%= sum_quantity %>' == 0){
              return null
            }
            else if('<%= sum_quantity %>' > 0){
              if(parseInt('<%= result[0].item_quantity %>') <= parseInt('<%= sum_quantity %>')){
                <% result_date.forEach(function(reserved){ %>
                  dateRanges.push({ 'start': moment('<%= reserved.start_date %>'), 'end': moment('<%= reserved.end_date %>')})  
                <% }) %>
                return dateRanges.reduce(function(bool, range) {
                    return bool || (date >= range.start._d && date <= range.end._d);
                  }, false);
                  
              }
            }
            
            console.log(dateRanges)
  
                  
             
        }
    },
        function(start, end, label) {
          startTxtField = document.getElementById("start_date");
          endTxtField = document.getElementById("end_date");
          startTxtField.setAttribute("value", start.format('YYYY-MM-DD'));
          endTxtField.setAttribute("value", end.format('YYYY-MM-DD'));
            
                    
          gQty = document.getElementById("modalQty").value;
                gRent = <%= result[0].rental_rate %> * gQty
                gRep =  <%= result[0].replacement_cost %> * gQty
                getDate = Math.ceil(Math.abs(start -end)/ (1000 * 60 * 60 * 24)) -1;
                  console.log(getDate)
          gRental.innerHTML = gRent; 
          gReplacement.innerHTML = gRep; 
          gstartTxtField = document.getElementById("gResStart");
          gendTxtField = document.getElementById("gResEnd");
          gstartTxtField.innerHTML = start.format('YYYY-MM-DD');
          gendTxtField.innerHTML = end.format('YYYY-MM-DD');
          cstartTxtField = document.getElementById("cResStart");
          cendTxtField = document.getElementById("cResEnd");
          cstartTxtField.innerHTML = start.format('YYYY-MM-DD');
          cendTxtField.innerHTML = end.format('YYYY-MM-DD');
          
          });
      });
  
      x_coord = '<%= map[0].map_x_coordinate %>';
      y_coord = '<%= map[0].map_y_coordinate %>';
      
      var map = L.map('map').setView([x_coord, y_coord], 17);
       L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
       maxZoom: 19,
       attribution: '© OpenStreetMap'
      }).addTo(map);
      var marker = L.marker([x_coord, y_coord]).addTo(map);
      
      
  
      function insertDate(){
  
      }
      document.getElementById("modalQty").addEventListener("click", function(e) {
      const value = this.value,
        max = this.getAttribute("max"),
        min = this.getAttribute("min"),
        minned = this.dataset.minned === "true";
      maxed = this.dataset.maxed === "true";
      if (value === max && maxed) {
        alert("The max available quantity is <%= result[0].item_quantity %>");
      }      
      this.dataset.maxed = value === max ? "true" : "false";
      this.dataset.minned = value === min ? "true" : "false";
    })
    
    document.getElementById("progress5").style.width = "<%=ratingsTotal[0].percent5 %>%"
    document.getElementById("progress4").style.width = "<%=ratingsTotal[0].percent4 %>%"
    document.getElementById("progress3").style.width = "<%=ratingsTotal[0].percent3 %>%"
    document.getElementById("progress2").style.width = "<%=ratingsTotal[0].percent2 %>%"
    document.getElementById("progress1").style.width = "<%=ratingsTotal[0].percent1 %>%"
   </script>
</html>
