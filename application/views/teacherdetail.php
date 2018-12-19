<div class="imgwrapper">
   <img src="<?= base_url()?>assest/img/teacherbanner.jpg" style="height:20%;width:100%;margin-top:3%;border:groove;">
	</div>
	<br>
	<div class="container-fluid">
        <div class="row">
		    <div class="col-xs-12 col-sm-4 col-md-3 resume-profile">
			<img width="250" src="https://taktii.com/etc/api/profile_image/<?php echo $info->profile_img;?>" class="img-thumbnail" alt="Your Name">
                <h1><?php echo $info->name;?> <small class="text-muted">
                    <?php

                        if($info->user_role == "1"){

                        echo "Institute Tutor";

                        }elseif($info->user_role == "2"){

                        echo "Home Tutor";

                        }elseif($info->user_role == "3"){

                        echo "Non-Academic";

                        }else{

                        echo "Institute";

                        }

                        ?>


               </small></h1>

				<ul class="list-unstyled">
                    <li>Location: <?php echo $info->inst_address;?></li>
                    <!-- <li>Student Strength: <a href="#">10</a></li>
                    <li>Distance by You: <a href="#">0.64Km</a></li> -->
                </ul>
			</div>
            
			
            <div class="col-xs-12 col-sm-8 col-md-6 resume-info">
				<section id="introduction" class="resume-info-section">
                <h2>About Teacher</h2>
                <p class="lead text-justify"> 
                 <?php echo $info->about_me;?>          	
					
                </p>
                </section>

                <section id="education" class="resume-info-section" style="margin-top:-8%;">
                <h2>Qualification of Teacher</h2><div class="resume-info-section-block">

                    <h4><?php echo $info->degree_name;?></h4>

                        <!-- <p> <small>2004 → 2006</small></p> -->
                        <p>
                           <?php echo $info->description;?>  
                        </p>
                    </div>
                </section>

                <section class="resume-info-section" style="margin-top:-8%;">
                    <h2 id="experience"> Teacher Experience</h2>
                    <div class="resume-info-section-block">
                        <h4 id="experience-web-designer-and-trainee-web-developer">
                            <?php echo $info->total_exp;?>
                           
                            
                        </h4>
                        <p>
                            <small>
                               <?php echo $info->teaching_since;?>
                            </small>
                        </p>
						<p>
                             <?php echo $info->description;?>
                        </p>
                    </div>
                  
                </section>

                <section class="resume-info-section tools-and-tech" style="margin-top:-8%;">
                    <h2 id="tools-and-technologies">Class &amp; Subject</h2>

                    <div class="resume-info-section-block">
                        <h4>Class</h4>
                        <ul class="list-unstyled tag-list">

                             <li><?php echo $info->class_name;?></li>
                           <!--  <li>I-V</li>
                            <li>VI-X</li>
                            <li>XI-XII</li>
                            <li>Demo Class</li>
                            <li>Demo Class</li>
                            <li>Demo Class</li>
                            <li>Demo Class</li> -->
                        </ul>
                    </div>

                    <div class="resume-info-section-block" style="margin-top:-5%;">
                        <h4>Subject</h4>
                        <ul class="list-unstyled tag-list">
                             <li><?php echo $info->subject_name;?></li>
                            <!-- <li>Demo Course</li>
							<li>Demo Course</li>
							<li>Demo Course</li>
							<li>Demo Course</li>
                            <li>Demo Course</li> -->
                        </ul>
                    </div>
                </section>


<!-- 
                <section class="resume-info-section" style="margin-top:-8%;">
                    <h2 id="skills">Teacher Skills</h2>
                    <ul class="list-unstyled skill-list">
                        <li>
                           English
                            <div class="progress">
                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:90%">
                                    <span class="sr-only">90%</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            Math
                            <div class="progress">
                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:90%">
                                    <span class="sr-only">90%</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            Science
                            <div class="progress">
                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width:75%">
                                    <span class="sr-only">75%</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            Genral Knowledge
                            <div class="progress">
                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:90%">
                                    <span class="sr-only">90%</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            Communication Skill
                            <div class="progress">
                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:90%">
                                    <span class="sr-only">90%</span>
                                </div>
                            </div>
                        </li>
                    </ul>

                </section> -->

                <section class="resume-info-section" style="margin-top:-8%;">
                    <h2 id="work-case-studies">Institute's Location</h2><?php echo $info->inst_address;?>
                    <div class="resume-info-section-block">
                        <div class="media">
                            <div class="media-body">
                                  <h2 id="work-case-studies">Institute's Name</h2><?php echo $info->institute_name;?>
                               
                               <!--  <p>
                                    About And Address of Institute text here  About And Address of Institute text here
									 About And Address of Institute text here  About And Address of Institute text here
                                </p> -->
                            </div>
                            <div class="media-right">
                                <a href="#">
                                    <img src="https://taktii.live/kZD0rgbzHk/api/institute_image/inst_508_2775_1.jpg" height="200" width="200">
                                </a>
                            </div>
                        </div>

                    </div>
                </section>
				<!-- <section class="resume-info-section" style="margin-top:-8%;">
                    <h2 id="hobbies-and-interests">Hobbies &amp; Interests</h2>
                    <ul class="list-unstyled tag-list">
                        <li>Good Character &amp; Human Interactions</li>
                        <li>History &amp; Culture</li>
                        <li>Current Events</li>
                        <li>Science &amp; Technology</li>
                    </ul>

                </section> -->

            </div>
            <!-- /.resume-info -->

            <div id="resumeNavigationScrollSpy" class="col-md-3" style="background-color:#fff9f1;">
                <ul class="nav nav nav-pills nav-stacked resume-navigation hidden-print hidden-sm hidden-xs">
                    <li>
                        <a href="#introduction">About Teacher</a>
                    </li>
                    <li>
                        <a href="#education">Teacher Qualification</a>
                    </li>
                    <li>
                        <a href="#experience">Teacher  Experience</a>
                    </li>
                    <li>
                        <a href="#tools-and-technologies">Class &amp; Skills</a>
                    </li>
                    <!-- <li>
                        <a href="#skills">Teacher Skills</a>
                    </li> -->
                    <li>
                         <li>
                            <a href="#work-case-studies">Work Case Studies</a>
                        </li>
                        <!-- <li>
                            <a href="#hobbies-and-interests">Hobbies &amp; Interests</a>
                        </li> -->
                       
                </ul>
                
            </div> 
        </div>
       
    </div>