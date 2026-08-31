@extends('layouts.frontend')

@section('content')
    <div class="maincontarea">
        <!-- Breadcrumb section start -->
        <section class="breadcrumbarea">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Shop Products</li>
                    </ol>
                </nav>
            </div>
        </section>
        <!-- Breadcrumb section end -->
        <!-- Shop Products content section start -->
        <section class="productscontarea">
            <div class="container">
                <div class="topmargin10">
                    <h2>Experience the Power of Rudraksha Ratna Chakra Therapy (RRCT)</h2>
                </div>
                <div class="proinfotext">A scientifically structured healing system that harmonizes your chakras through the
                    combined energies of Rudraksha beads and natural gemstones.</div>
                <div class="row topmargin30">
                    <div class="col-lg-4">
                        <h5>Rudraksha Ratna Chakra Therapy (RRCT)</h5>
                        <div class="proinfotext">Founder and Facilitator <span>Sakhashree Neeta</span> after over 21 years
                            of
                            research, RRCT integrates ancient wisdom from the Upanishads and Puranas with modern insights
                            into
                            bioenergy, electromagnetic resonance, and vibrational medicine. By using a patented stringing
                            method, RRCT combinations resonate directly with your energy field, helping restore balance,
                            clarity, and well-being from within.</div>
                    </div>
                    <div class="col-lg-4">
                        <div class="whychooserrct">
                            <h5>Why Choose RRCT Combinations?</h5>
                            <div class="proinfotext">
                                <ul>
                                    <li>Uses only authentic, natural Rudraksha and untreated gemstones</li>
                                    <li>Based on a patented, scientifically structured stringing method</li>
                                    <li>Targets root causes through chakra alignment, not surface symptoms</li>
                                    <li>Works continuously when worn, without rituals or lifestyle changes</li>
                                    <li>Trusted by over 100,000 individuals worldwide</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <h5>Experience transformation in</h5>
                        <div class="proinfotext">
                            <ul>
                                <li>Emotional Resilience: Greater calm, clarity, and inner peace</li>
                                <li>Physical Vitality: Improved energy flow and overall well-being</li>
                                <li>Life Success: Growth in career, finances, and opportunities</li>
                                <li>Harmonious Relationships: Deeper connection and better </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Shop Products content section end -->

        <!-- Shop Products section start -->
        <section class="productsarea">
            <div class="container">
                <div class="productsection">
                    <div class="productsbanner">
                        <div class="productcontarea">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="productinfoarea productinfobg1">
                                        <h4>The Power of Sacred Rudraksha</h4>
                                        <div class="productinfotext">Rudraksha beads act as natural bio-capacitors with
                                            electromagnetic properties. When worn against the skin, they interact with your
                                            body’s energy field and begin to stabilize and harmonize the chakras.<br><br>
                                            Each bead (mukhi) is associated with a specific chakra, planets and diety,
                                            allowing
                                            precise correction of imbalances.
                                        </div>
                                        <div class="topmargin30">
                                            <h6>They help to</h6>
                                        </div>
                                        <div class="productinfotext">
                                            <ul>
                                                <li>Calm overactive energy and reduce stress</li>
                                                <li>Restore vitality to underactive chakras</li>
                                                <li>Stabilize emotional and mental states</li>
                                                <li>Harmonize the body’s overall energy system</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="productsbannerimg01"><img src="{{ asset('dist/img/productscol_img01.jpg') }}"></div>
                    </div>
                    <div class="productsgridarea">
                        <div class="productsbox">
                            <a href="javascript:void(0)">
                                <div class="productsboximg"><img src="{{ asset('dist/img/products_img01.jpg') }}"></div>
                                <div class="productsboxbtnarea"><button class="productsboxbtn">Wisdom Pendant</button></div>
                            </a>
                        </div>
                        <div class="productsbox">
                            <a href="javascript:void(0)">
                                <div class="productsboximg"><img src="{{ asset('dist/img/products_img02.jpg') }}"></div>
                                <div class="productsboxbtnarea"><button class="productsboxbtn">Supreme Kavacham
                                        Bracelet</button></div>
                            </a>
                        </div>
                        <div class="productsbox">
                            <a href="javascript:void(0)">
                                <div class="productsboximg"><img src="{{ asset('dist/img/products_img03.jpg') }}"></div>
                                <div class="productsboxbtnarea"><button class="productsboxbtn">Garbh Sanskar
                                        Combination</button></div>
                            </a>
                        </div>
                        <div class="productsbox">
                            <a href="javascript:void(0)">
                                <div class="productsboximg"><img src="{{ asset('dist/img/products_img04.jpg') }}"></div>
                                <div class="productsboxbtnarea"><button class="productsboxbtn">Healing Heart
                                        Pendant</button>
                                </div>
                            </a>
                        </div>
                        <div class="productsbox">
                            <a href="javascript:void(0)">
                                <div class="productsboximg"><img src="{{ asset('dist/img/products_img05.jpg') }}"></div>
                                <div class="productsboxbtnarea"><button class="productsboxbtn">Surya Power Mala</button>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="topmargin30 text-center"><button class="primarybtn btnmd">Shop Products</button></div>
                </div>
                <div class="productsection">
                    <div class="productsbanner">
                        <div class="productcontarea">
                            <div class="row justify-content-end">
                                <div class="col-lg-6">
                                    <div class="productinfoarea productinfobg2">
                                        <h4>Power of Natural Gemstones</h4>
                                        <div class="productinfotext">Natural, untreated gemstones act as powerful conduits
                                            of
                                            energy. Referenced in ancient texts like the Garuda Purana, they are known to
                                            influence both spiritual and physical well-being.<br><br>
                                            Gemstones work by absorbing and radiating specific light frequencies, which
                                            nourish
                                            and activate the chakras.</div>
                                        <div class="topmargin30">
                                            <h6>How they work</h6>
                                        </div>
                                        <div class="productinfotext">
                                            <ul>
                                                <li>Cosmic Energy: Gemstones channel sunlight into potent healing
                                                    frequencies
                                                </li>
                                                <li>Energy Alignment: They dissolve blockages and restore natural energy
                                                    flow
                                                </li>
                                                <li>Direct Contact: Continuous skin contact ensures steady vibrational
                                                    resonance
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="productsbannerimg02"><img src="{{ asset('dist/img/productscol_img02.jpg') }}"></div>
                    </div>
                    <div class="productsgridarea">
                        <div class="productsbox">
                            <a href="javascript:void(0)">
                                <div class="productsboximg"><img src="{{ asset('dist/img/products_img06.jpg') }}"></div>
                                <div class="productsboxbtnarea"><button class="productsboxbtn">Agate Bracelets</button>
                                </div>
                            </a>
                        </div>
                        <div class="productsbox">
                            <a href="javascript:void(0)">
                                <div class="productsboximg"><img src="{{ asset('dist/img/products_img07.jpg') }}"></div>
                                <div class="productsboxbtnarea"><button class="productsboxbtn">Ruby Zoisite Necklace
                                        Mala</button></div>
                            </a>
                        </div>
                        <div class="productsbox">
                            <a href="javascript:void(0)">
                                <div class="productsboximg"><img src="{{ asset('dist/img/products_img08.jpg') }}"></div>
                                <div class="productsboxbtnarea"><button class="productsboxbtn">Green Jade Bracelets</button>
                                </div>
                            </a>
                        </div>
                        <div class="productsbox">
                            <a href="javascript:void(0)">
                                <div class="productsboximg"><img src="{{ asset('dist/img/products_img09.jpg') }}"></div>
                                <div class="productsboxbtnarea"><button class="productsboxbtn">Navratna Set</button></div>
                            </a>
                        </div>
                        <div class="productsbox">
                            <a href="javascript:void(0)">
                                <div class="productsboximg"><img src="{{ asset('dist/img/products_img10.jpg') }}"></div>
                                <div class="productsboxbtnarea"><button class="productsboxbtn">Blue Sapphire Necklace
                                        Mala</button></div>
                            </a>
                        </div>
                    </div>
                    <div class="topmargin30 text-center"><button class="primarybtn btnmd">Shop Products</button></div>
                </div>
            </div>
        </section>
        <!-- Shop Products section end -->

        <!-- Benefits of RRCT section start -->
        <section class="benefitsrrct">
            <div class="container">
                <div class="mainheading">
                    <h2>Benefits of RRCT</h2>
                </div>
                <div class="textblack14bold">RRCT supports transformation across every dimension of life:</div>
                <div class="row topmargin15">
                    <div class="col-lg-6">
                        <div class="benefitsrrctbox">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="benefitsrrctimg"><img
                                            src="{{ asset('dist/img/benefitsrrct_img01.jpg') }}"></div>
                                </div>
                                <div class="col-md-8">
                                    <div class="benefitsrrctcont">
                                        <h4>Physical</h4>
                                        <ul>
                                            <li>Improves sleep, energy, and immunity</li>
                                            <li>Supports heart, digestion, and hormonal balance</li>
                                            <li>Relieves pain, migraines, and fatigue</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="benefitsrrctbox">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="benefitsrrctimg"><img
                                            src="{{ asset('dist/img/benefitsrrct_img02.jpg') }}"></div>
                                </div>
                                <div class="col-md-8">
                                    <div class="benefitsrrctcont">
                                        <h4>Emotional & Mental</h4>
                                        <ul>
                                            <li>Reduces stress, anxiety, and overthinking</li>
                                            <li>Improves focus, clarity, and confidence</li>
                                            <li>Enhances emotional stability</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="benefitsrrctbox">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="benefitsrrctimg"><img
                                            src="{{ asset('dist/img/benefitsrrct_img03.jpg') }}"></div>
                                </div>
                                <div class="col-md-8">
                                    <div class="benefitsrrctcont">
                                        <h4>Life & Success</h4>
                                        <ul>
                                            <li>Attracts career and financial opportunities</li>
                                            <li>Strengthens leadership and decision-making</li>
                                            <li>Supports goal manifestation</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="benefitsrrctbox">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="benefitsrrctimg"><img
                                            src="{{ asset('dist/img/benefitsrrct_img04.jpg') }}"></div>
                                </div>
                                <div class="col-md-8">
                                    <div class="benefitsrrctcont">
                                        <h4>Physical</h4>
                                        <ul>
                                            <li>Deepens meditation and awareness</li>
                                            <li>Enhances intuition and inner peace</li>
                                            <li>Aligns with higher purpose</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Benefits of RRCT section end -->
    </div>
@endsection
