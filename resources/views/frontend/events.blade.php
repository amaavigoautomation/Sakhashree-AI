@extends('layouts.frontend')

@section('content')

<main class="mainwrapper"> 
 
<div class="innercontbg">
<!-- Top header start -->
<!-- Middle section start here -->
<section class="innermidcontarea">
  <div class="container">
    <!--Breadcrumb start here-->
    <div class="breadcrumbarea">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item active" aria-current="page">Events</li>
        </ol>
      </nav>
    </div>
    <!--Breadcrumb end here-->

    <div class="mainheading topmargin5"><h1 class="text-uppercase"><span class="second-color">Sacred Events</span><br>divine Transformations</h1></div>
    <div class="innercolinfotext">Join our powerful events, workshops and pujas <br class="hidemob">designed to uplift your energy, bring clarity <br class="hidemob">and invite divine blessings.</div>
    
    <div class="innerheadarea topmargin40">
      <div class="innerheadcont">
        <div class="ornament" aria-hidden="true"><img src="{{ asset('dist/img/sidebarhead.svg') }}"></div>
        <div class="mainheading text-center"><h2 class="mb-0">Upcoming Events</h2></div>          
        <div class="ornament" aria-hidden="true"><img src="{{ asset('dist/img/sidebarhead.svg') }}"></div>
      </div>
    </div>
    
    <div class="topmargin30">
      <div id="AboutSlider" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="uebox">
              <div class="row align-items-center">
                <div class="col-lg-7">
                  <div class="ueboxcont">
                    <h2>Shravan Maas Mahapuja</h2>
                    <div class="ueboxinfo"><span>Shravan Maas Mahapuja Benefits:</span><br><br>
                    <ul>
                      <li>For Removal of malefic effects of various planets</li>
                      <li>For relief and protection against various diseases and ailments</li>
                      <li>For early marriage with suitable partner</li>
                      <li>For success in career and attraction of suitable opportunities</li>
                      <li>For cleansing of consciousness and for spiritual growth</li>
                      <li>For divine grace and blessings of Lord Shiva</li>
                    </ul>
                    </div>
                    <div class="pointsiconinfoarea topmargin20">
                      <div class="pointsiconinfo">
                        <div><img src="{{ asset('dist/img/calendar_icon1.svg') }}"></div>
                        <div>12 Aug 2026</div>
                      </div>
                      <div class="pointsiconinfo">
                        <div><img src="{{ asset('dist/img/time_icon.svg') }}"></div>
                        <div>9:00 am to 5:00 pm</div>
                      </div>
                      <div class="pointsiconinfo">
                        <div><img src="{{ asset('dist/img/location_icon.svg') }}"></div>
                        <div>Mumbai</div>
                      </div>
                    </div>
                    <div class="topmargin40"><button class="primarybtn btnmd" data-bs-toggle="modal" data-bs-target="#EnquireNow">Enquire Now</button></div>
                  </div>
                </div>
                <div class="col-lg-5">
                  <div class="ueboximg"><img src="{{ asset('dist/img/ue_img01.jpg') }}"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="uebox">
              <div class="row align-items-center">
                <div class="col-lg-7">
                  <div class="ueboxcont">
                    <h2>Shravan Maas Mahapuja</h2>
                    <div class="ueboxinfo"><span>Shravan Maas Mahapuja Benefits:</span><br><br>
                    <ul>
                      <li>For Removal of malefic effects of various planets</li>
                      <li>For relief and protection against various diseases and ailments</li>
                      <li>For early marriage with suitable partner</li>
                      <li>For success in career and attraction of suitable opportunities</li>
                      <li>For cleansing of consciousness and for spiritual growth</li>
                      <li>For divine grace and blessings of Lord Shiva</li>
                    </ul>
                    </div>
                    <div class="pointsiconinfoarea topmargin20">
                      <div class="pointsiconinfo">
                        <div><img src="{{ asset('dist/img/calendar_icon1.svg') }}"></div>
                        <div>12 Aug 2026</div>
                      </div>
                      <div class="pointsiconinfo">
                        <div><img src="{{ asset('dist/img/time_icon.svg') }}"></div>
                        <div>9:00 am to 5:00 pm</div>
                      </div>
                      <div class="pointsiconinfo">
                        <div><img src="{{ asset('dist/img/location_icon.svg') }}"></div>
                        <div>Mumbai</div>
                      </div>
                    </div>
                    <div class="topmargin40"><button class="primarybtn btnmd" data-bs-toggle="modal" data-bs-target="#EnquireNow">Enquire Now</button></div>
                  </div>
                </div>
                <div class="col-lg-5">
                  <div class="ueboximg"><img src="{{ asset('dist/img/ue_img01.jpg') }}"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="uebox">
              <div class="row align-items-center">
                <div class="col-lg-7">
                  <div class="ueboxcont">
                    <h2>Shravan Maas Mahapuja</h2>
                    <div class="ueboxinfo"><span>Shravan Maas Mahapuja Benefits:</span><br><br>
                    <ul>
                      <li>For Removal of malefic effects of various planets</li>
                      <li>For relief and protection against various diseases and ailments</li>
                      <li>For early marriage with suitable partner</li>
                      <li>For success in career and attraction of suitable opportunities</li>
                      <li>For cleansing of consciousness and for spiritual growth</li>
                      <li>For divine grace and blessings of Lord Shiva</li>
                    </ul>
                    </div>
                    <div class="pointsiconinfoarea topmargin20">
                      <div class="pointsiconinfo">
                        <div><img src="{{ asset('dist/img/calendar_icon1.svg') }}"></div>
                        <div>12 Aug 2026</div>
                      </div>
                      <div class="pointsiconinfo">
                        <div><img src="{{ asset('dist/img/time_icon.svg') }}"></div>
                        <div>9:00 am to 5:00 pm</div>
                      </div>
                      <div class="pointsiconinfo">
                        <div><img src="{{ asset('dist/img/location_icon.svg') }}"></div>
                        <div>Mumbai</div>
                      </div>
                    </div>
                    <div class="topmargin40"><button class="primarybtn btnmd" data-bs-toggle="modal" data-bs-target="#EnquireNow">Enquire Now</button></div>
                  </div>
                </div>
                <div class="col-lg-5">
                  <div class="ueboximg"><img src="{{ asset('dist/img/ue_img01.jpg') }}"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="uebox">
              <div class="row align-items-center">
                <div class="col-lg-7">
                  <div class="ueboxcont">
                    <h2>Shravan Maas Mahapuja</h2>
                    <div class="ueboxinfo"><span>Shravan Maas Mahapuja Benefits:</span><br><br>
                    <ul>
                      <li>For Removal of malefic effects of various planets</li>
                      <li>For relief and protection against various diseases and ailments</li>
                      <li>For early marriage with suitable partner</li>
                      <li>For success in career and attraction of suitable opportunities</li>
                      <li>For cleansing of consciousness and for spiritual growth</li>
                      <li>For divine grace and blessings of Lord Shiva</li>
                    </ul>
                    </div>
                    <div class="pointsiconinfoarea topmargin20">
                      <div class="pointsiconinfo">
                        <div><img src="{{ asset('dist/img/calendar_icon1.svg') }}"></div>
                        <div>12 Aug 2026</div>
                      </div>
                      <div class="pointsiconinfo">
                        <div><img src="{{ asset('dist/img/time_icon.svg') }}"></div>
                        <div>9:00 am to 5:00 pm</div>
                      </div>
                      <div class="pointsiconinfo">
                        <div><img src="{{ asset('dist/img/location_icon.svg') }}"></div>
                        <div>Mumbai</div>
                      </div>
                    </div>
                    <div class="topmargin40"><button class="primarybtn btnmd" data-bs-toggle="modal" data-bs-target="#EnquireNow">Enquire Now</button></div>
                  </div>
                </div>
                <div class="col-lg-5">
                  <div class="ueboximg"><img src="{{ asset('dist/img/ue_img01.jpg') }}"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="uebox">
              <div class="row align-items-center">
                <div class="col-lg-7">
                  <div class="ueboxcont">
                    <h2>Shravan Maas Mahapuja</h2>
                    <div class="ueboxinfo"><span>Shravan Maas Mahapuja Benefits:</span><br><br>
                    <ul>
                      <li>For Removal of malefic effects of various planets</li>
                      <li>For relief and protection against various diseases and ailments</li>
                      <li>For early marriage with suitable partner</li>
                      <li>For success in career and attraction of suitable opportunities</li>
                      <li>For cleansing of consciousness and for spiritual growth</li>
                      <li>For divine grace and blessings of Lord Shiva</li>
                    </ul>
                    </div>
                    <div class="pointsiconinfoarea topmargin20">
                      <div class="pointsiconinfo">
                        <div><img src="{{ asset('dist/img/calendar_icon1.svg') }}"></div>
                        <div>12 Aug 2026</div>
                      </div>
                      <div class="pointsiconinfo">
                        <div><img src="{{ asset('dist/img/time_icon.svg') }}"></div>
                        <div>9:00 am to 5:00 pm</div>
                      </div>
                      <div class="pointsiconinfo">
                        <div><img src="{{ asset('dist/img/location_icon.svg') }}"></div>
                        <div>Mumbai</div>
                      </div>
                    </div>
                    <div class="topmargin40"><button class="primarybtn btnmd" data-bs-toggle="modal" data-bs-target="#EnquireNow">Enquire Now</button></div>
                  </div>
                </div>
                <div class="col-lg-5">
                  <div class="ueboximg"><img src="{{ asset('dist/img/ue_img01.jpg') }}"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#AboutSlider" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#AboutSlider" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#AboutSlider" data-bs-slide-to="2" aria-label="Slide 3"></button>
          <button type="button" data-bs-target="#AboutSlider" data-bs-slide-to="3" aria-label="Slide 4"></button>
          <button type="button" data-bs-target="#AboutSlider" data-bs-slide-to="4" aria-label="Slide 5"></button>
        </div>
      </div>
    </div>

    <div class="innerheadarea topmargin40">
      <div class="innerheadcont">
        <div class="ornament" aria-hidden="true"><img src="{{ asset('dist/img/sidebarhead1.svg') }}"></div>
        <div class="mainheading text-center"><h2 class="mb-0">Past Events</h2></div>          
        <div class="ornament" aria-hidden="true"><img src="{{ asset('dist/img/sidebarhead.svg') }}"></div>
      </div>
    </div>
    <div class="pecardarea topmargin30">
      <div class="pecard">
        <div class="pecardimg"><img src="{{ asset('dist/img/evets_img01.jpg') }}"></div>
        <div class="pecardcont">
          <h6>Heal Diseases with Chakra Balancing</h6>
          <div class="d-flex gap-2 flex-column">
            <div class="pointsiconinfo">
              <div><img src="{{ asset('dist/img/calendar_icon1.svg') }}"></div>
              <div>29th May, 2021 (Sat)</div>
            </div>
            <div class="pointsiconinfo">
              <div><img src="{{ asset('dist/img/time_icon.svg') }}"></div>
              <div>IST - 06:00 pm - 08:00 pm</div>
            </div>
          </div>
          <div class="pecardinfoarea topmargin20">A disease manifests in your body due to some darkness of ignorance in your consciousness. By throwing light of self awareness, one can self heal. The laws of chakras help you tune to this nature of the self. Allow Sakshashree to guide you to good health through Chakra Yog.</div>
          <div class="topmargin20"><button class="primarybtn btnmd" data-bs-toggle="modal" data-bs-target="#EventVideos">View Event</button></div>
        </div>
      </div>
      <div class="pecard">
        <div class="pecardimg"><img src="{{ asset('dist/img/evets_img02.jpg') }}"></div>
        <div class="pecardcont">
          <h6>Journey from materialism to Spirituality</h6>
          <div class="d-flex gap-2 flex-column">
            <div class="pointsiconinfo">
              <div><img src="{{ asset('dist/img/calendar_icon1.svg') }}"></div>
              <div>29th May, 2021 (Sat)</div>
            </div>
            <div class="pointsiconinfo">
              <div><img src="{{ asset('dist/img/time_icon.svg') }}"></div>
              <div>IST - 06:00 pm - 08:00 pm</div>
            </div>
          </div>
          <div class="pecardinfoarea topmargin20">Lakshya-Me meaning the One who takes you to your goals is the true meaning of the Goddess of Wealth- Lakshmi. She takes you on path of the four Purushartha which are Dharma, Artha Kama and Moksha.</div>
          <div class="topmargin20"><button class="primarybtn btnmd" data-bs-toggle="modal" data-bs-target="#EventVideos">View Event</button></div>
        </div>
      </div>
      <div class="pecard">
        <div class="pecardimg"><img src="{{ asset('dist/img/evets_img03.jpg') }}"></div>
        <div class="pecardcont">
          <h6>Dealing with Covid Anxiety</h6>
          <div class="d-flex gap-2 flex-column">
            <div class="pointsiconinfo">
              <div><img src="{{ asset('dist/img/calendar_icon1.svg') }}"></div>
              <div>29th May, 2021 (Sat)</div>
            </div>
            <div class="pointsiconinfo">
              <div><img src="{{ asset('dist/img/time_icon.svg') }}"></div>
              <div>IST - 06:00 pm - 08:00 pm</div>
            </div>
          </div>
          <div class="pecardinfoarea topmargin20">The fear of Covid is everywhere. But does it lead you anywhere? Without fear you are more intelligent and healthy and able to deal with physical, emotional and other challenges. More people are dying of anxiety rather than the Virus itself.</div>
          <div class="topmargin20"><button class="primarybtn btnmd" data-bs-toggle="modal" data-bs-target="#EventVideos">View Event</button></div>
        </div>
      </div>
      <div class="pecard">
        <div class="pecardimg"><img src="{{ asset('dist/img/evets_img01.jpg') }}"></div>
        <div class="pecardcont">
          <h6>Heal Diseases with Chakra Balancing</h6>
          <div class="d-flex gap-2 flex-column">
            <div class="pointsiconinfo">
              <div><img src="{{ asset('dist/img/calendar_icon1.svg') }}"></div>
              <div>29th May, 2021 (Sat)</div>
            </div>
            <div class="pointsiconinfo">
              <div><img src="{{ asset('dist/img/time_icon.svg') }}"></div>
              <div>IST - 06:00 pm - 08:00 pm</div>
            </div>
          </div>
          <div class="pecardinfoarea topmargin20">A disease manifests in your body due to some darkness of ignorance in your consciousness. By throwing light of self awareness, one can self heal. The laws of chakras help you tune to this nature of the self. Allow Sakshashree to guide you to good health through Chakra Yog.</div>
          <div class="topmargin20"><button class="primarybtn btnmd" data-bs-toggle="modal" data-bs-target="#EventVideos">View Event</button></div>
        </div>
      </div>
      <div class="pecard">
        <div class="pecardimg"><img src="{{ asset('dist/img/evets_img02.jpg') }}"></div>
        <div class="pecardcont">
          <h6>Journey from materialism to Spirituality</h6>
          <div class="d-flex gap-2 flex-column">
            <div class="pointsiconinfo">
              <div><img src="{{ asset('dist/img/calendar_icon1.svg') }}"></div>
              <div>29th May, 2021 (Sat)</div>
            </div>
            <div class="pointsiconinfo">
              <div><img src="{{ asset('dist/img/time_icon.svg') }}"></div>
              <div>IST - 06:00 pm - 08:00 pm</div>
            </div>
          </div>
          <div class="pecardinfoarea topmargin20">Lakshya-Me meaning the One who takes you to your goals is the true meaning of the Goddess of Wealth- Lakshmi. She takes you on path of the four Purushartha which are Dharma, Artha Kama and Moksha.</div>
          <div class="topmargin20"><button class="primarybtn btnmd" data-bs-toggle="modal" data-bs-target="#EventVideos">View Event</button></div>
        </div>
      </div>
      <div class="pecard">
        <div class="pecardimg"><img src="{{ asset('dist/img/evets_img03.jpg') }}"></div>
        <div class="pecardcont">
          <h6>Dealing with Covid Anxiety</h6>
          <div class="d-flex gap-2 flex-column">
            <div class="pointsiconinfo">
              <div><img src="{{ asset('dist/img/calendar_icon1.svg') }}"></div>
              <div>29th May, 2021 (Sat)</div>
            </div>
            <div class="pointsiconinfo">
              <div><img src="{{ asset('dist/img/time_icon.svg') }}"></div>
              <div>IST - 06:00 pm - 08:00 pm</div>
            </div>
          </div>
          <div class="pecardinfoarea topmargin20">The fear of Covid is everywhere. But does it lead you anywhere? Without fear you are more intelligent and healthy and able to deal with physical, emotional and other challenges. More people are dying of anxiety rather than the Virus itself.</div>
          <div class="topmargin20"><button class="primarybtn btnmd" data-bs-toggle="modal" data-bs-target="#EventVideos">View Event</button></div>
        </div>
      </div>
    </div>

    <!-- Pagination Start Here -->
    <div class="topmargin30">
      <nav aria-label="Page navigation example">
        <ul class="pagination">
          <li class="page-item">
            <a class="page-link" href="#" aria-label="Previous">
              <span aria-hidden="true">«</span>
            </a>
          </li>
          <li class="page-item active"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item">
            <a class="page-link" href="#" aria-label="Next">
              <span aria-hidden="true">»</span>
            </a>
          </li>
        </ul>
      </nav>
    </div>
    <!-- Pagination End Here -->

  </div>
</section>
<!-- Middle section end here -->
</div>   

</main>
<!-- Enquire Now Modal start -->
<div class="modal fade" id="EnquireNow" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Enquire Now</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
          <input class="form-control form-control-lg" placeholder="Your Full Name">
        </div>
        <div class="mb-3">
          <input class="form-control form-control-lg" placeholder="Enter Your Email ID">
        </div>
        <div class="mb-3">
          <div class="row padding5pxarea">
						<div class="col-5 padding5px">
							<select class="form-select form-select-lg">
  							<option value="">USA (+1)</option>
  						</select>
						</div>
						<div class="col-7 padding5px"><input class="form-control form-control-lg" placeholder="Mobile / Telephone"></div>
					</div>
        </div>
        <div class=""><textarea class="form-control" rows="5">Tell us about your challenges or concerns</textarea></div>
        <div class="topmargin20"><button class="secondrybtn btnmdfullwidth">Send</button></div>
      </div>
    </div>
  </div>
</div>
<!-- Enquire Now Modal end -->

<!-- Event Videos Modal start -->
<div class="modal fade" id="EventVideos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Event Videos</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <iframe width="100%" height="315" src="https://www.youtube.com/embed/nlBqht22MOM?si=k-WDv9euCoNe1y-w" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
      </div>
    </div>
  </div>
</div>
<!-- Event Videos Modal end -->

@endsection