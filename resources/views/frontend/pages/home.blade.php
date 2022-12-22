@extends('frontend.master')


@section('content')

<!-- start banner Area -->
<section class="banner-area relative" id="home">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row fullscreen align-items-center justify-content-start" style="height: 915px;">
            <div class="banner-content col-lg-9 col-md-12">
                <h1 style="font-size: 40px; color:#3bc138;">
                    Your Donation <br>
                    is Others Inspiration
                </h1>
                <a href="{{route('donate.view')}}" class="head-btn btn text-uppercase">Donate Now</a>
            </div>
        </div>
    </div>
</section>
<!-- End banner Area -->




<!-- Start project Area -->
<section class="project-area section-gap" id="project">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8  header-text">
                <h1 style="font-size: 40px;">Waiting for Help</h1>

            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-4 project-wrap">
                <div class="single-project">
                    <div class="content">
                        <a href="#" target="_blank">
                            <div class="content-overlay"></div>
                            <img class="content-image img-fluid d-block mx-auto" src="{{url('frontend/img/p1.jpg')}}"
                                alt="">

                        </a>
                    </div>
                </div>
                <div class="details">
                    <a href="#">
                        <h2>Donate for Winter Dress</h2>
                    </a>
                    <p>It is that time of the year where winter is a curse on Bangladesh underprivileged people.
                        Survival is difficult for the poor, but winter creates additional burden on them. It is a
                        desperate struggle for the homeless and poor to survive the winter season. This winter, charity
                        blankets donations will help us to provide warm clothes to homeless. .</p>

                </div>

            </div>
            <div class="col-lg-4 col-md-4 project-wrap">
                <div class="single-project">
                    <div class="content">
                        <a href="#" target="_blank">
                            <div class="content-overlay"></div>
                            <img class="content-image img-fluid d-block mx-auto" src="{{url('/frontend/img/p2.jpg')}}"
                                alt="">

                        </a>
                    </div>
                </div>
                <div class="details">
                    <a href="#">
                        <h2>Donate for Education</h2>
                    </a>
                    <p>Education transforms lives and breaks the cycle of poverty that traps so many children. Education
                        for girls is essential — an educated mother will make sure her children go to and stay in
                        school.Only half of refugee children have attended primary school, and less than a quarter have
                        attended secondary school; girls being particularly at risk..</p>

                </div>
            </div>
            <div class="col-lg-4 col-md-4 project-wrap">
                <div class="single-project">
                    <div class="content">
                        <a href="#" target="_blank">
                            <div class="content-overlay"></div>
                            <img class="content-image img-fluid d-block mx-auto" src="{{url('frontend/img/p3.jpg')}}"
                                alt="">

                        </a>
                    </div>
                </div>
                <div class="details">
                    <a href="#">
                        <h2>Donate for Child Food</h2>
                    </a>
                    <p>Donating to the needy not just benefits the recipient, it also benefits the donor in improving
                        the physical, psychological, emotional and spiritual well-being. However, you need to do your
                        research about the charitable organizations that share the same interest as yours.</p>

                </div>
            </div>

        </div>
    </div>
</section>
<!-- End project Area -->

<!-- Start about Area -->
<section class="about-area" id="about">
    <div class="container-fluid">
        <div class="row d-flex justify-content-end align-items-center">
            <div class="col-lg-6 col-md-12 about-left no-padding">
                <img class="img-fluid" src="{{url('/frontend/img/b2.png')}}" alt="">
            </div>
            <div class="col-lg-6 col-md-12 about-right">
                <h1>A very Lovely Welcome <br>
                    to our Company</h1>
                <p>
                    An orphanage is a residential institution, total institution or group home, devoted to the care of
                    orphans and children who, for various reasons, cannot be cared for by their biological families. The
                    parents may be deceased, absent, or abusive.
                </p>
               
            </div>
        </div>
    </div>
</section>
<!-- End about Area -->

<!-- Start volunteer Area -->
<section class="volunteer-area section-gap">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8  header-text">
                <h1 style="font-size: 40px;">Our Staffs</h1>

            </div>
        </div>
        <div class="row">
            @foreach($staffs as $data)
            <div class="col-lg-3 col-md-3 vol-wrap">
                <div class="single-vol">
                    <div class="content">
                        <a href="#" target="_blank">
                            <div class="content-overlay"></div>
                            <img class="content-image img-fluid d-block mx-auto" src="{{url('/uploads/',$data->image)}}"
                                alt="">
                            <div class="content-details fadeIn-bottom">
                                <h4>{{($data->name)}}</h4>

                            </div>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>
<!-- End volunteer Area -->
@endsection
