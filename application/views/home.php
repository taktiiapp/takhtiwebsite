
<div id="map" style="width:100%; height:400px;"></div>
	<script>
    function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center:new google.maps.LatLng(28.5355161,77.39102649999995),
          zoom: 13
        });
        var card = document.getElementById('pac-card');
        var input = document.getElementById('pac-input');
        var types = document.getElementById('type-selector');
        var strictBounds = document.getElementById('strict-bounds-selector');
		map.controls[google.maps.ControlPosition.TOP_RIGHT].push(card);
		var autocomplete = new google.maps.places.Autocomplete(input);
		autocomplete.bindTo('bounds', map);
		autocomplete.setFields(
            ['address_components', 'geometry', 'icon', 'name']);

        var infowindow = new google.maps.InfoWindow();
        var infowindowContent = document.getElementById('infowindow-content');
        infowindow.setContent(infowindowContent);
        var marker = new google.maps.Marker({
          map: map,
          anchorPoint: new google.maps.Point(0, -29)
        });

        autocomplete.addListener('place_changed', function() {
          infowindow.close();
          marker.setVisible(false);
          var place = autocomplete.getPlace();
          if (!place.geometry) {
            window.alert("No details available for input: '" + place.name + "'");
            return;
          }

          if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
          } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);  
          }
          marker.setPosition(place.geometry.location);
          marker.setVisible(true);

          var address = '';
          if (place.address_components) {
            address = [
              (place.address_components[0] && place.address_components[0].short_name || ''),
              (place.address_components[1] && place.address_components[1].short_name || ''),
              (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
          }

          infowindowContent.children['place-icon'].src = place.icon;
          infowindowContent.children['place-name'].textContent = place.name;
          infowindowContent.children['place-address'].textContent = address;
          infowindow.open(map, marker);
        });

        // Sets a listener on a radio button to change the filter type on Places
        // Autocomplete.
        function setupClickListener(id, types) {
          var radioButton = document.getElementById(id);
          radioButton.addEventListener('click', function() {
            autocomplete.setTypes(types);
          });
        }

        setupClickListener('changetype-all', []);
        setupClickListener('changetype-address', ['address']);
        setupClickListener('changetype-establishment', ['establishment']);
        setupClickListener('changetype-geocode', ['geocode']);

        document.getElementById('use-strict-bounds')
            .addEventListener('click', function() {
              console.log('Checkbox clicked! New state=' + this.checked);
              autocomplete.setOptions({strictBounds: this.checked});
            });
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDkmRzgPT_YinELO77cj-Sju5IsqUrfrn0&libraries=places&callback=initMap" async defer></script>
  
  <div class="container-fluid" style="background-color:#9dbff9;">
<div class="row">
<br>
<form action="">
	<div class="col-md-2">
		<select class="form-control" data-style="select-with-transition" onchange="getclass(this.value)" name="name">
		<option value="disabled">Select Course </option>
		<?php
		foreach ($courses as $coursevalue) {?>
		<option value="<?php echo $coursevalue['id'];?>"><?php echo $coursevalue['name'];?></option>  					
		<?php } ?>    					
		</select>
	</div>

	<div class="col-md-2">
		<select class="form-control" data-style="select-with-transition" id="add_class"  onchange="getsubject(this.value);" name="class_id" >
		<option value="disabled">Select Class</option>				
		</select>
	</div>

	<div class="col-md-2">
		   <select class="form-control" data-style="select-with-transition" id="add_subject" name="subject_id" >
		   <option value="disabled">Select Subjects </option>	
		   </select>
	</div>

	<div class="col-md-2">
	  <select class="form-control">
        <option>Select Tutor Type</option>
        <option>Home Tutor</option>
        <option>Institute Tutor</option>
		 <option>Institute</option>
        <option>Non-Academic Tutor</option>
      </select>
	  </div>
	  	<div class="col-md-2">
	  <input type="text" class="form-control" id="pac-input" placeholder="Enter Location">
	  </div>
	  	<div class="col-md-2">
	  <button type="submit" class="btn btn-danger" style="background:#e61875">Search Tutor</button>
	  </div>
	</form>
	</div>
	<br>
  </div>
  
  <div class="navbar navbar-default navbar-fixed-top" style="height:70px;">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navscroll"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
				<a class="navbar-brand" href="#home" title="Dove - Modern Start Up landing Page"><img src="<?= base_url()?>assest/img/logo-dark2.png" width="82" height="40" alt="Dove"></a> </div>
			<div class="navbar-collapse collap se navscroll">
				<div class="navbar-form navbar-right"> <a href="https://play.google.com/store/apps/details?id=com.takktistudentapp" title="Download App Now" class="btn btn-default download-link"><i class="icon_cloud-download_alt"></i> Download App</a> </div>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#home">Home</a></li>
					<li><a href="#tutor">Request For Tutors</a></li>
					<li><a href="#features">Features</a></li>
					<li><a href="#screens">Screens</a></li>
					<li><a href="#team">Team</a></li>
					<li><a href="<?= base_url()?>assest/pre-board-page.html">Pre-Board</a></li>
					<li><a href="https://taktii.co.in/">IMS</a></li>
					<li><a href="#contact">Contact Us</a></li>
				</ul>
			</div>
			<!--/.navbar-collapse --> 
		</div>
	</div>
	<!-- top navigation end -->
	<!----End Search Tecaher Portal------>
	
	<!-- main banner start -->
	<div class="banner" id="home">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-sm-7">
					<a href="#home" class="logo" title="Taktii"><img src="<?= base_url()?>assest/img/logo-light2.png" width="250" height="100" alt="Taktii"></a>
					<h4>
					<div>We bring blended solutions for current education landscape.</div>
					</h4>
					<h4>Our mantra ‘Back to Basics’ emphasize on traditional method as well as digital arena of education and learning. Whether you want to study, prepare or just learn – we have a solution! Not just for academic purpose we deliver solutions for non-academic sectors as well.</h4>
						<h4><br>Improve your grades,learn new skills,Get to the epitome of success.</br><h4>
						<div class="cta-btns">
						<a href="https://play.google.com/store/apps/details?id=com.takktistudentapp" class="btn btn-primary btn-lg download-link" title="Download App Now"><i class="icon_cloud-download_alt"></i> Download App</a>
					</div>
					
				</div>
				<div class="col-sm-5 hidden-xs">
					<!-- iPhone mockup style1 start -->
					<div class="phone-mockup style1">
						<div class="wrapper">
							<!-- phone mockup (back layer) -->
							<img class="layer-one wow fadeInLeft visible-lg" data-wow-delay="1s" src="<?= base_url()?>assest/img/mockups/iphone-white2.png" width="379" height="608" alt="iPhone app presentation">
							<!-- phone mockup (back layer) -->
							<img class="layer-two" src="<?= base_url()?>assest/img/mockups/iphone-dark2.png" width="379" height="608" alt="iPhone app presentation">							
						</div>
					</div>
				</div>
			</div>
			
			<!-- available on -->
			<small class="available-on">Available on Google Play Store.</small>
			
		</div>
	</div>
	<!-- main banner end -->
	
	
	<!-- features section start -->
	<div class="features section" id="features">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h2 class="h1 text-center">Some of the app features <small>This app is blended with a lot of awesome features that will cater to the needs of students, teachers and parents alike!</small></h2>
				</div>
			</div>
			
			<!-- spacer -->
			<hr class="spacer">
			
			<div class="row">
				<div class="col-lg-5 col-md-6 col-sm-5 hidden-xs">
					
					<!-- iPhone mockup style2 start -->
					<div class="phone-mockup style2">
						<div class="wrapper">
							<!-- phone mockup (back layer) -->
							<img class="layer-one wow fadeIn" data-wow-delay="0.5s" src="<?= base_url()?>assest/img/mockups/iphone-white-no-shadow1.png" width="316" height="581" alt="iPhone app presentation">
							
						</div>
						<div class="wrapper">
							<!-- phone mockup (back layer) -->
						
							<img class="layer-one wow fadeIn" data-wow-delay="0.5s" src="<?= base_url()?>assest/img/mockups/iphone-white-no-shadow11.png" width="316" height="581" alt="iPhone app presentation">
							<!-- phone mockup (back layer) -->
							<!-- <img class="layer-two wow fadeInLeft hidden-sm" data-wow-delay="1s" src="img/mockups/iphone-screen11.png" width="316" height="581" alt="iPhone app presentation"> -->							
						</div>
					</div>
					<!-- iPhone mockup style2 end -->
					
				</div>
				
				<div class="col-lg-7 col-md-6 col-sm-7">
					<div class="row">
						<div class="col-lg-12">
						
							<!-- feature style1 -->
							<div class="feature style1 wow fadeInRight" data-wow-delay="1s">
								<i class="icon_pin_alt"></i>
								<h4>Geo Locate Tutors</h4>
								<p>The platform uses geolocation, which works with GPS & IP identification, to suggest educators who are closer to the student seeking the service.</p>
							</div>
							<!-- feature style1 -->
							
						</div>
						<div class="col-lg-12">
						
							<!-- feature style1 -->
							<div class="feature style1 wow fadeInRight" data-wow-delay="1.2s">
								<i class="icon_profile"></i>
								<h4>Perfect Fit Teachers</h4>
								<p>The app has the perfect fit teachers for students. A lot of filter criteria such as Location, Qualification, Achievements, Experience,Verified, Fees etc.</p>
							</div>
							<!-- feature style1 -->
							
						</div>

						<div class="col-lg-12">
						
							<!-- feature style1 -->
							<div class="feature style1 wow fadeInRight" data-wow-delay="1.4s">
								<i class="icon_desktop"></i>
								<h4>Interactive Live Classes</h4>
								<p>The app has an amazing feature of Live Classes. A teacher can take classes going online and simultaneously provide lecture to thousands of students via live-class feature. A teacher can share screen, interact with students through whiteboard and many more functions. </p>
							</div>
							<!-- feature style1 -->
							
						</div>
						<div class="col-lg-12">
						
							<!-- feature style1 -->
							<div class="feature style1 wow fadeInRight" data-wow-delay="1.6s">
								<i class="icon_flowchart_alt"></i>
								<h4>Batch, Attendance and Fees Management</h4>
								<p>Manage your Batch,fees and student attendance via digitally.</p>
							</div>
							
							<!-- feature style1 -->
							
						</div>


							<div class="col-lg-12">
						
							<!-- feature style1 -->
							<div class="feature style1 wow fadeInRight" data-wow-delay="1.8s">
								<i class="icon_mail"></i>
								<h4>Instant Notification & Alerts</h4>
								<p>Teacher may send notification and alerts to students and parents for various dates, announcement of classes, fee update and many other things so that the students are informed real time.</p>
							</div>
							<!-- feature style1 -->
							
						</div>
						<div class="col-lg-12">
						
							<!-- feature style1 -->
							<div class="feature style1 wow fadeInRight" data-wow-delay="1.8s">
								<i class="icon_currency_alt"></i>
								<h4>Secure Payments</h4>
								<p>Payments are sent and received via Taktii App. A student can pay and a teacher can receive the payments securely without any hassle through Taktii’s secure payment gateway.</p>
							</div>
							<!-- feature style1 -->
							
						</div>
						
						<div class="col-lg-12">
						
							<!-- feature style1 -->
							<div class="feature style1 wow fadeInRight" data-wow-delay="1.6s">
								<i class="icon_volume-low"></i>
								<h4>Query Management</h4>
								<p>Track every visitor and response/follow up to student enquiry for tution classes instantly.</p>
							</div>
							<!-- feature style1 -->
							
						</div>
					
						<div class="col-lg-12">
						
							<!-- feature style1 -->
							<div class="feature style1 wow fadeInRight" data-wow-delay="1.6s">
								<i class="icon_house_alt"></i>
								<h4>Integrated Management System</h4>
								<p>A whole new game changer for Teacher and Institute. Taktii features an Integrated Management System for managing and administering the day-to-day operations such as attendance, scheduling exams, fees etc. can be done with few clicks.</p>
							</div>
							<!-- feature style1 -->
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- features section end -->
	
	
	<!-- app details section start -->
	<div class="app-details section">
		<div class="container">
			<div class="row">
				<div class="col-md-6 wow fadeInRight" data-wow-delay="1s">
				
					<h2 class="h1">About Us</h2>
					<p>Taktii App is a simple Platform in which users can register and get informed if they want to receive or offer classes. Anyone who has a proven track record in any subject (Academic or Non-Academic) and, conversely, anyone who is in need of instruction in any area will have the application to find what they want. The platform allows you to offer a course and wait for the demand. On the other hand, people who wish to find teachers in certain areas or even specific courses on offer will find alternatives.</p>
					<p>The Taktii App connects students and educators using the geo location tool, which works with GPS & IP identification, and is able to inform about the country, the city and the current time from where you are and thus can offer the services of private lessons easily, safely and quickly. </p><p>This process helps the student to analyze issues such as teaching methods, teaching quality, distance and safety. </p>
					<p><h4 style="color: #FFFFFF;"><br>Get Success in Your hand!</br>
					Download our FREE App & Teach and Learn Anytime Anywhere</h4></p>
					<a href="https://play.google.com/store/apps/details?id=com.takktistudentapp" target="_blank" class="btn"><i class="fa fa-android"> Google Play</i></a>
					
					
				</div>
				<div class="col-md-6 wow fadeInLeft" data-wow-delay="1s">
					
					<!-- responsive video wrapper -->
					<div class="video-wrap">
						<iframe width="560" height="315" src="https://www.youtube.com/embed/x5yAiZ0ZxJY" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
					</div>					
					
				</div>
			</div>
		</div>
	</div>
	<!-- app details section end -->	
	
	
	<!-- some of the app screenshots start -->
	<div class="app-screenshots section" id="screens">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h2 class="h1 text-center">Some of the app screenshots</h2>
					<div id="app-screenshots" class="owl-carousel">
						<div class="screen"><a href="<?= base_url()?>assest/img/app-screenshots/screenshot-1%402x%40.html" title="app screen" class="lightbox"><img src="<?= base_url()?>assest/img/app-screenshots/screenshot-1%40.png" alt="App screen one"></a></div>
						<div class="screen"><a href="<?= base_url()?>assest/img/app-screenshots/screenshot-2%402x%40.png" title="app screen" class="lightbox"><img src="<?= base_url()?>assest/img/app-screenshots/screenshot-2%40.png" alt="App screen one"></a></div>
						<div class="screen"><a href="<?= base_url()?>assest/img/app-screens%20%20%20hots/screenshot-3%402x%40.html" title="app screen" class="lightbox"><img src="<?= base_url()?>assest/img/app-screenshots/screenshot-3%40.png" alt="App screen one"></a></div>
						<div class="screen"><a href="<?= base_url()?>assest/img/app-screenshots/screenshot-4%402x%40.png" title="app screen" class="lightbox"><img src="<?= base_url()?>assest/img/app-screenshots/screenshot-4%40.png" alt="App screen one"></a></div>
						<div class="screen"><a href="<?= base_url()?>assest/img/app-screenshots/screenshot-5%402x%40.png" title="app screen" class="lightbox"><img src="<?= base_url()?>assest/img/app-screenshots/screenshot-5%40.png" alt="App screen one"></a></div>
						<div class="screen"><a href="<?= base_url()?>assest/img/app-screenshots/screenshot-6%402x%40.png" title="app screen" class="lightbox"><img src="<?= base_url()?>assest/img/app-screenshots/screenshot-6%40.png" alt="App screen one"></a></div>
						<div class="screen"><a href="<?= base_url()?>assest/img/app-screenshots/screenshot-7%402x%40.png" title="app screen" class="lightbox"><img src="<?= base_url()?>assest/img/app-screenshots/screenshot-7%40.png" alt="App screen one"></a></div>
						<div class="screen"><a href="<?= base_url()?>assest/img/app-screenshots/screenshot-8%402x%40.png" title="app screen" class="lightbox"><img src="<?= base_url()?>assest/img/app-screenshots/screenshot-8%40.png" alt="App screen one"></a></div>
						<div class="screen"><a href="<?= base_url()?>assest/img/app-screenshots/screenshot-9%402x%40.jpg" title="app screen" class="lightbox"><img src="<?= base_url()?>assest/img/app-screenshots/screenshot-9%40.jpg" alt="App screen one"></a></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- trial download CTA start -->
	<div class="trial-download section" id="download">
	
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h2 class="h1 text-center">Request a free Demo to see how our app can grow your Institute!</h2>
					<!-- email capture form start -->
					<form class="form-inline text-center wow zoomIn" action="https://taktii.com/php/download.php" method="post" id="downloadForm" role="form">
						<div class="form-group">
							<input type="text" class="form-control input-lg" id="nameDownload" name="name" placeholder="Your Name">
					  	</div>
						<div class="form-group">
							<input type="email" class="form-control input-lg" id="emailDownload" name="email" placeholder="Email Address">
					  	</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary btn-lg" id="dLoad"><i class="icon_cloud-download_alt"></i> Get your trial</button>
						</div>
					</form>
					<!-- email capture form end -->
					<div id="dLoadResponse"></div>
					<p class="text-center"><small>By downloading trial you are agree to our terms and conditions.</small></p>
				</div>
			</div>
		</div>
	</div>
	<!-- trial download CTA start -->
	
	
	<!-- team section start -->
	<div class="team-container section" id="team">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h2 class="h1 text-center">Our awesome little team <small>ASHISH & RAHUL WORKED HARD TOGETHER AND CAME UP WITH AN AMAZING APP</small></h2>
					<!-- spacer -->
					<hr class="spacer">
					<div class="row">
						<div class="col-lg-6">
							<!-- team member left carousel start -->
							<div class="owl-carousel" id="team-left">
							<div class="team-member left">
								<a href="<?= base_url();?>assets/img/team/9.png" title="Deeksha Gupta" class="lightbox"><img class="member-photo" src="<?= base_url()?>assest/img/team/9.png" width="768" height="862" alt="Deeksha Gupta"></a>
								<div class="content">
									<h3 class="member-desig"><h3>Deeksha Gupta</h3><h4>Project Lead/QA Engineer</h4></h3>
									<p class="member-detail">I am responsible for planning, executing and promoting activities that a project undertakes and Creating detailed, Comprehensive and well-structured test plans , test cases.Estimating, prioritizing, planning and coordinating quality testing activities.</p>
								</div>
							</div>
							<div class="team-member left">
								<a href="<?= base_url();?>assets/img/team/8.png" title="Aman Rajput" class="lightbox"><img class="member-photo" src="<?= base_url()?>assest/img/team/8.png" width="768" height="862" alt="Aman Rajput"></a>
								<div class="content">
									<h3 class="member-desig"><h3>Aman Rajput</h3><h4>UI/UX Designer</h4></h3>
									<p class="member-detail">Gathering and evaluating user requirements, in collaboration with product managers and engineers. Illustrating design ideas using storyboards, process flows and sitemaps.</p>
								</div>
							</div>
							<div class="team-member left">
								<a href="<?= base_url();?>assets/img/team/5.png" title="Smriti Priya" class="lightbox"><img class="member-photo" src="<?= base_url()?>assest/img/team/5.png" width="768" height="862" alt="Smriti Priya"></a>
								<div class="content">
									<h3 class="member-desig"><h3>Smriti Priya</h3><h4>PHP Developer</h4></h3>
									<p class="member-detail">I am  responsible for writing server-side web application logic and maintain a databases to ensure strong optimization and functionality.</p>
								</div>
							</div>

						  	 <div class="team-member right">
								<a href="<?= base_url();?>assets/img/team/11.png" title="Rajan kumar Jha" class="lightbox"><img class="member-photo" src="<?= base_url()?>assest/img/team/11.png" width="768" height="862" alt="Rajan kumar Jha"></a>
								<div class="content">
									<h3 class="member-desig"><h3>Rajan kumar Jha</h3><h4>Marketing Head</h4></h3>
									<p class="member-detail"> I am developing the marketing strategy for the company in line with company objectives. Co-ordinating marketing campaigns with sales activities. Overseeing the company's marketing budget.</p>
								</div>
							</div>
							</div>
							<!-- team member left carousel end -->
							
						</div>
						<div class="col-lg-6">
							
							<!-- team member right carousel start -->
							<div class="owl-carousel" id="team-right">
							<div class="team-member right">
								<a href="<?= base_url();?>assets/img/team/7.png" title="Vikash Keshabani" class="lightbox"><img class="member-photo" src="<?= base_url()?>assest/img/team/7.png" width="768" height="862" alt="Vikash Keshabani"></a>
								<div class="content">
									<h3 class="member-desig"><h3>Vikash Kesharvani</h3><h4>Sr. Android Developer</h4></h3>
									<p class="member-detail">I lead the Android side of our product and  also responsible for developing, enhancing, and designing a world-class mobile application for our product.</p>
								</div>
							</div>

							<div class="team-member right">
								<a href="<?= base_url();?>assets/img/team/6.png" title="Saurabh Singh" class="lightbox"><img class="member-photo" src="<?= base_url()?>assest/img/team/6.png" width="768" height="862" alt="Saurabh Singh"></a>
								<div class="content">
									<h3 class="member-desig"><h3>Saurabh Singh</h3><h4>Sr. Android Developer</h4></h3>
									<p class="member-detail">I lead the Android side of our product and  also responsible for developing, enhancing, and designing a world-class mobile application for our product.</p>
								</div>
							</div>

							<div class="team-member right">
								<a href="<?= base_url();?>assets/img/team/10.png" title="Harish Mehta" class="lightbox"><img class="member-photo" src="<?= base_url()?>assest/img/team/10.png" width="768" height="862" alt="Harish Mehta"></a>
								<div class="content">
									<h3 class="member-desig"><h3>Harish Mehra</h3><h4>Server Administrator</h4></h3>
									<p class="member-detail">I maintain the computer networking system in an office environment by tracking server activity, performing upgrades of software, maintaining computer hardware,and improving efficiency by evaluating system network functions.</p>
								</div>
							</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- team section start -->
	
	
	<!-- testimonials start -->	
	<div class="testimonials section">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-offset-2">
					
					<!-- client carousel start -->
					<div class="owl-carousel" id="client-carousel">
						<div>
							<img class="client" src="<?= base_url()?>assest/img/clients/client1.png" width="80" height="80" alt="Ashish Chhikara">
							<blockquote>
								<small>Ashish Chhikara <small>Director at TAKTII.</small></small>
							</blockquote>
						</div>
						<div>
							<img class="client" src="<?= base_url()?>assest/img/clients/client2.png" width="80" height="80" alt="Rahul Khatri">
							<blockquote>
								<small>Rahul Khatri <small>Director at TAKTII.</small></small>
							</blockquote>
							</div>
							<div>
							<img class="client" src="<?= base_url()?>assest/img/clients/client3.png" width="80" height="80" alt="Gaurav Kumar Singh">
							<blockquote>
								<small>Gaurav Kumar Singh <small>Co-Founder at TAKTII.</small></small>
							</blockquote>
						</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- testimonials end -->	
	
	
	<!-- contact and subscription forms start -->
	<div class="forms" id="contact">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
				<!-- contact form start -->
					<div class="subscribe-form">
						<h2 class="h1 text-center">If you have an idea, complain or suggestion. <small>Feel free to contact us!</small></h2>
						<form method="post" id="contactForm" action="https://taktii.com/php/send.php" role="form" >
							<div class="row">
								<div class="col-lg-5 col-lg-offset-1">
									<div class="form-group">
										<input type="text" class="form-control input-lg" id="name" name="name" placeholder="Your Name">
									</div>
								</div>
								<div class="col-lg-5">
									<div class="form-group">
										<input type="email" class="form-control input-lg" id="email2" name="email" placeholder="Email Address">
									</div>
								</div>
								<div class="col-lg-10 col-lg-offset-1">
									<div class="form-group">
										<input type="text" class="form-control input-lg" id="subject" name="subject" placeholder="Subject">
									</div>
								</div>
								<div class="col-lg-10 col-lg-offset-1">
									<div class="form-group">
										<textarea class="form-control" rows="6" name="message" placeholder="Message..."></textarea>
									</div>
								</div>
								<div class="col-lg-10 col-lg-offset-1">
									<div class="form-group text-right">
										<button type="submit" class="btn btn-primary btn-lg" id="send"><i class="icon-paper-plane"></i> Send Message</button>
									</div>
								</div>
							</div>							
						</form>
						<div id="response"></div>
					</div>
					<!-- contact form end -->
					
					<!-- form switch buttons start -->
					<div class="form-switch">
						<button class="contact-btn active tool-tip" id="onpen-sub-form" data-original-title="subscribe-form"><i class="fa fa-envelope-o"></i></button>
					</div>
					<!-- form switch buttons end -->
					
				</div>
			</div>
		</div>
	</div>

	<script>
		function getclass(courses_id){		 
			data_arr = {'courses_id':courses_id};  
				$.ajax({
					type:'GET',
					data:data_arr,
					url:'<?= base_url()?>home/get_classes_by_course/',
					success:function(response)
					{
						$('#add_class').html(response);
						
					}
				});
			}	

			function getsubject(class_id){	
			data_arr = {'class_id':class_id};  
				$.ajax({
					type:'GET',
					data:data_arr,
					url:'<?= base_url()?>home/get_subjects_by_classes/',
					success:function(response)
					{
						$('#add_subject').html(response);
						
					}
				});
			}		
</script>