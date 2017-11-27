<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="banner_box">
    <div class="slider01 wow bounceInLeft">
        <div class="slider-container" id="slider-container">
            <div class="slider">
                <div class="slide"><img src="<?php echo base_url();?>assets/common/images/banner1.png" alt=""></div>
            </div>
            <!--<div class="container"><div class="switch" id="prev"><span></span></div><div class="switch" id="next"><span></span></div></div>-->
        </div>
    </div>
    <div class="home_tag"><h3>Open For Businesses only</h3></div>
    <div class="slider_search">
        <!--<div class="container">
            <div class="slider_search1 wow fadeInUp">
                <input type="text" placeholder="Search your service.." class="service_search" />
                <input type="text" placeholder="Search by location" class="service_location" />
                <button><i class="fa fa-search" aria-hidden="true"></i> Get Quotes</button>
            </div>
        </div>-->
    </div>
</div>

<div class="best_expert">
    <div class="container">
        <div class="row wow fadeInUp">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="expert_left">
                    <h3>The <span>best Experience</span> from the experts</h3>
                    <p>There is extraordinary chemistry that exists in long-term relationships.</p>
                    <p>ProYourWay aims to provide their consumers with the best experience and advice from the experts across the world. We aim to create a long term relationship between our clients. </p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="exprt_right_service">
                    <h3>IT and <span>Web services</span></h3>
                    <img src="<?php echo base_url();?>assets/common/images/web_its.jpg" />
                    <p>The expert team takes incredible mind in amending your solicitations and plans utilizing their experiences to make an impeccable customized website.</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="exprt_right_service">
                    <h3>Accountants</h3>
                    <img src="<?php echo base_url();?>assets/common/images/accout_ant.jpg" />
                    <p>Hire the well qualified accounting service providers to serve in your electronic payments and in bookkeeping needs.</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="exprt_right_service">
                    <h3>Lawyers & <span>Solicitors</span></h3>
                    <img src="<?php echo base_url();?>assets/common/images/lawyers_01.jpg" />
                    <p>The well–knowledgeable solicitors are proficient to offer you with advice on a broad range of legal issues.</p>
                    <!---<p><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i> LEARN MORE</a></p>-->
                </div>
            </div>
        </div>
    </div>
</div> 

 <div class="about_section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 co-sm-6 col-xs-12 wow bounceInLeft">
                <h3>About Pro Your Way</h3>
                <?php /*?><?php echo $aboutUs;?><?php */?>
                <p>ProYourWay  solves the problem of finding, comparing and negotiating with Professional service providers locally and  globally. ProYourWay is a complete solution to end the struggles for companies in Asia who would like to expand in Western Countries and it is also the solution for the Businesses in Western Countries who wants to outsource their activities.</p> 
                <p>We are online Multivendor marketplace platform, which aim to give our consumers more buying and negotiating  power while dealing with Professional service providers. Through our marketplace, they can request quotes online nationally and globally, compare them , negotiate with them online and hire them as well.</p>
                <p><a href="<?php echo base_url();?>about"><button>know more</button></a></p>
            </div>
            <div class="col-md-6 co-sm-6 col-xs-12 wow bounceInRight"><img src="<?php echo base_url();?>assets/common/images/graph.png" /></div>
        </div>
    </div>
</div>

<!-- <div class="most_popular">
    <div class="container">
        <div class="row wow fadeInUp">
            <div class="heading1">
                <h3>Most <span>Popular</span></h3>
            </div>
        </div>
        <div class="row wow fadeInUp">
            <div class="filter01">
                <button data-toggle="portfilter" data-target="all">All</button>
                <button data-toggle="portfilter" data-target="Lawyers">Lawyers</button>
                <button data-toggle="portfilter" data-target="Accountants">Accountants</button>
                <button data-toggle="portfilter" data-target="Marketing">Marketing Professionals</button>
                <button data-toggle="portfilter" data-target="IT">IT Services</button>
                <button data-toggle="portfilter" data-target="Consultants">Consultants</button>
            </div>
            <div class="filter_deta">
                <ul>
                <li class="col-md-3 col-sm-4 col-xs-12 clearfix wow fadeInUp" data-tag='Lawyers'>
                    <div class="profile_box">
                        <img src="<?php echo base_url();?>assets/common/images/service01.png" />
                        <h3>Regal Account Firms 
                            <div class="for_hire">For Hire</div>
                        </h3>
                        <div class="rating01">Avg. Rating :<br /><span>3.7 <i class="fa fa-star" aria-hidden="true"></i></span></div>
                        <div class="hiring">No of Hiring<br /><span>07</span></div>
                        <div class="for_book"><button>Book</button></div>
                    </div>
                </li>
                <li class="col-md-3 col-sm-4 col-xs-12 wow fadeInUp" data-tag='Accountants'>
                    <div class="profile_box">
                        <img src="<?php echo base_url();?>assets/common/images/service02.png" />
                        <h3>Regal Account Firms 
                            <div class="for_hire">For Hire</div>
                        </h3>
                        <div class="rating01">Avg. Rating :<br /><span>3.7 <i class="fa fa-star" aria-hidden="true"></i></span></div>
                        <div class="hiring">No of Hiring<br /><span>07</span></div>
                        <div class="for_book"><button>Book</button></div>
                    </div>
                </li>
                <li class="col-md-3 col-sm-4 col-xs-12 wow fadeInUp" data-tag='Accountants'>
                    <div class="profile_box">
                        <img src="<?php echo base_url();?>assets/common/images/service03.png" />
                        <h3>Regal Account Firms 
                            <div class="for_hire">For Hire</div>
                        </h3>
                        <div class="rating01">Avg. Rating :<br /><span>3.7 <i class="fa fa-star" aria-hidden="true"></i></span></div>
                        <div class="hiring">No of Hiring<br /><span>07</span></div>
                        <div class="for_book"><button>Book</button></div>
                    </div>
                </li>
                <li class="col-md-3 col-sm-4 col-xs-12 wow fadeInUp" data-tag='Lawyers'>
                    <div class="profile_box">
                        <img src="<?php echo base_url();?>assets/common/images/service01.png" />
                        <h3>Regal Account Firms 
                            <div class="for_hire">For Hire</div>
                        </h3>
                        <div class="rating01">Avg. Rating :<br /><span>3.7 <i class="fa fa-star" aria-hidden="true"></i></span></div>
                        <div class="hiring">No of Hiring<br /><span>07</span></div>
                        <div class="for_book"><button>Book</button></div>
                    </div>
                </li>
                <li class="col-md-3 col-sm-4 col-xs-12 wow fadeInUp" data-tag='Marketing'>
                    <div class="profile_box">
                        <img src="<?php echo base_url();?>assets/common/images/service02.png" />
                        <h3>Regal Account Firms 
                            <div class="for_hire">For Hire</div>
                        </h3>
                        <div class="rating01">Avg. Rating :<br /><span>3.7 <i class="fa fa-star" aria-hidden="true"></i></span></div>
                        <div class="hiring">No of Hiring<br /><span>07</span></div>
                        <div class="for_book"><button>Book</button></div>
                    </div>
                </li>
                <li class="col-md-3 col-sm-4 col-xs-12 wow fadeInUp" data-tag='Accountants'>
                    <div class="profile_box">
                        <img src="<?php echo base_url();?>assets/common/images/service03.png" />
                        <h3>Regal Account Firms 
                            <div class="for_hire">For Hire</div>
                        </h3>
                        <div class="rating01">Avg. Rating :<br /><span>3.7 <i class="fa fa-star" aria-hidden="true"></i></span></div>
                        <div class="hiring">No of Hiring<br /><span>07</span></div>
                        <div class="for_book"><button>Book</button></div>
                    </div>
                </li>
                <li class="col-md-3 col-sm-4 col-xs-12 wow fadeInUp clearfix" data-tag='Lawyers'>
                    <div class="profile_box">
                        <img src="<?php echo base_url();?>assets/common/images/service01.png" />
                        <h3>Regal Account Firms 
                            <div class="for_hire">For Hire</div>
                        </h3>
                        <div class="rating01">Avg. Rating :<br /><span>3.7 <i class="fa fa-star" aria-hidden="true"></i></span></div>
                        <div class="hiring">No of Hiring<br /><span>07</span></div>
                        <div class="for_book"><button>Book</button></div>
                    </div>
                </li>
                <li class="col-md-3 col-sm-4 col-xs-12 wow fadeInUp" data-tag='Lawyers'>
                    <div class="profile_box">
                        <img src="<?php echo base_url();?>assets/common/images/service02.png" />
                        <h3>Regal Account Firms 
                            <div class="for_hire">For Hire</div>
                        </h3>
                        <div class="rating01">Avg. Rating :<br /><span>3.7 <i class="fa fa-star" aria-hidden="true"></i></span></div>
                        <div class="hiring">No of Hiring<br /><span>07</span></div>
                        <div class="for_book"><button>Book</button></div>
                    </div>
                </li>
                <li class="col-md-3 col-sm-4 col-xs-12 wow fadeInUp" data-tag='Marketing'>
                    <div class="profile_box">
                        <img src="<?php echo base_url();?>assets/common/images/service03.png" />
                        <h3>Regal Account Firms 
                            <div class="for_hire">For Hire</div>
                        </h3>
                        <div class="rating01">Avg. Rating :<br /><span>3.7 <i class="fa fa-star" aria-hidden="true"></i></span></div>
                        <div class="hiring">No of Hiring<br /><span>07</span></div>
                        <div class="for_book"><button>Book</button></div>
                    </div>
                </li>
                <li class="col-md-3 col-sm-4 col-xs-12 wow fadeInUp"  data-tag='IT'>
                    <div class="profile_box">
                        <img src="<?php echo base_url();?>assets/common/images/service01.png" />
                        <h3>Regal Account Firms 
                            <div class="for_hire">For Hire</div>
                        </h3>
                        <div class="rating01">Avg. Rating :<br /><span>3.7 <i class="fa fa-star" aria-hidden="true"></i></span></div>
                        <div class="hiring">No of Hiring<br /><span>07</span></div>
                        <div class="for_book"><button>Book</button></div>
                    </div>
                </li>
                <li class="col-md-3 col-sm-4 col-xs-12 wow fadeInUp"  data-tag='IT'>
                    <div class="profile_box">
                        <img src="<?php echo base_url();?>assets/common/images/service02.png" />
                        <h3>Regal Account Firms 
                            <div class="for_hire">For Hire</div>
                        </h3>
                        <div class="rating01">Avg. Rating :<br /><span>3.7 <i class="fa fa-star" aria-hidden="true"></i></span></div>
                        <div class="hiring">No of Hiring<br /><span>07</span></div>
                        <div class="for_book"><button>Book</button></div>
                    </div>
                </li>
                <li class="col-md-3 col-sm-4 col-xs-12 wow fadeInUp" data-tag='Consultants'>
                    <div class="profile_box">
                        <img src="<?php echo base_url();?>assets/common/images/service03.png" />
                        <h3>Regal Account Firms 
                            <div class="for_hire">For Hire</div>
                        </h3>
                        <div class="rating01">Avg. Rating :<br /><span>3.7 <i class="fa fa-star" aria-hidden="true"></i></span></div>
                        <div class="hiring">No of Hiring<br /><span>07</span></div>
                        <div class="for_book"><button>Book</button></div>
                    </div>
                </li>
            </ul>
            </div>
        </div>
    </div>
</div> -->

<!-- <div class="testimonial">
    <div class="container">
        <div class="row wow fadeInUp">
            <h3>Clients <span>Say</span></h3>
        </div>
        <div class="testimonail01">
            <ul id="flexiselDemo3">
                <li>
                    <div class="testi01 wow fadeInUp">
                        <img src="<?php echo base_url();?>assets/common/images/testi01.jpg" alt="client03"> 
                        <p>I booked a trip for Ibiza . All arrangements were good specially the hotels in Munnar and takkedey . Only the house boat was not good enough . Try to go some different vendor for houseboat.</p>
                        <h2>David Dunn<span>Coboldt Dental, MA</span></h2>
                    </div>
                </li>
                <li>
                    <div class="testi01 wow fadeInUp">
                        <img src="<?php echo base_url();?>assets/common/images/testi02.jpg" alt="client03"> 
                        <p>I booked a trip for Ibiza . All arrangements were good specially the hotels in Munnar and takkedey . Only the house boat was not good enough . Try to go some different vendor for houseboat.</p>
                        <h2>David Dunn<span>Coboldt Dental, MA</span></h2>
                    </div>
                </li>
                <li>
                    <div class="testi01 wow fadeInUp">
                        <img src="<?php echo base_url();?>assets/common/images/testi03.jpg" alt="client03"> 
                        <p>I booked a trip for Ibiza . All arrangements were good specially the hotels in Munnar and takkedey . Only the house boat was not good enough . Try to go some different vendor for houseboat.</p>
                        <h2>David Dunn<span>Coboldt Dental, MA</span></h2>
                    </div>
                </li>
                <li>
                    <div class="testi01 wow fadeInUp">
                        <img src="<?php echo base_url();?>assets/common/images/testi04.jpg" alt="client03"> 
                        <p>I booked a trip for Ibiza . All arrangements were good specially the hotels in Munnar and takkedey . Only the house boat was not good enough . Try to go some different vendor for houseboat.</p>
                        <h2>David Dunn<span>Coboldt Dental, MA</span></h2>
                    </div>
                </li>                                           
            </ul>   
        </div>
    </div>
</div> -->

<!-- <div class="latest_news">
    <div class="container">
        <div class="row wow fadeInUp">
            <h3>Most  <span>Visited</span></h3>
            <h4>All Latest Update is Here</h4>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12 wow bounceInLeft">
            <div class="blog01">
                <img src="<?php echo base_url();?>assets/common/images/blog1.jpg" />
                <div class="blog_detail">
                    <div class="date_cal">21<br />Aug</div>
                    <h5>Retail banks wake up to digital</h5>
                    <p>Know how to pursue pleasure rationally seds our encounter consequences complete account of the system and expound works.</p>
                    <p><a href="#">Read More</a> <span><i class="fa fa-user" aria-hidden="true"></i> By Antony</span> <span><i class="fa fa-comments" aria-hidden="true"></i> 22 Comments</span></p>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="blog01">
                <img src="<?php echo base_url();?>assets/common/images/blog2.jpg" />
                <div class="blog_detail">
                    <div class="date_cal">21<br />Aug</div>
                    <h5>Retail banks wake up to digital</h5>
                    <p>Know how to pursue pleasure rationally seds our encounter consequences complete account of the system and expound works.</p>
                    <p><a href="#">Read More</a> <span><i class="fa fa-user" aria-hidden="true"></i> By Antony</span> <span><i class="fa fa-comments" aria-hidden="true"></i> 22 Comments</span></p>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12 wow bounceInRight">
            <div class="blog01">
                <img src="<?php echo base_url();?>assets/common/images/blog3.jpg" />
                <div class="blog_detail">
                    <div class="date_cal">21<br />Aug</div>
                    <h5>Retail banks wake up to digital</h5>
                    <p>Know how to pursue pleasure rationally seds our encounter consequences complete account of the system and expound works.</p>
                    <p><a href="#">Read More</a> <span><i class="fa fa-user" aria-hidden="true"></i> By Antony</span> <span><i class="fa fa-comments" aria-hidden="true"></i> 22 Comments</span></p>
                </div>
            </div>
        </div>
    </div>
</div> -->





               
    
   
            