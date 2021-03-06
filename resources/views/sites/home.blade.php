@extends('layouts.frontend')

@section('content')
<div class="main">
    <section class="features-listing">

        <div class="row feature">
            <div class="max-inner">

                <div class="flexslider">
                    <ul class="slides">
                        <!-- start: slide -->
                        <li>
                            <div class="columns col-7 feature-image">
                                <img src="{{ asset('frontend') }}/images/apple-devices.png"
                                    alt="Professional interface" />
                            </div>
                            <div class="columns col-5 feature-desc">
                                <h2>Professional interface</h2>
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                                    doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore
                                    veritatis.</p>
                            </div>
                        </li>
                        <!-- end: slide -->
                        <!-- start: slide -->
                        <li>
                            <div class="columns col-7 feature-image">
                                <img src="{{ asset('frontend') }}/images/apple-devices-1.png"
                                    alt="Professional interface" />
                            </div>
                            <div class="columns col-5 feature-desc">
                                <h2>2 Professional interface</h2>
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                                    doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore
                                    veritatis.</p>
                            </div>
                        </li>
                        <!-- end: slide -->
                        <!-- start: slide -->
                        <li>
                            <div class="columns col-7 feature-image">
                                <img src="{{ asset('frontend') }}/images/apple-devices-2.png"
                                    alt="Professional interface" />
                            </div>
                            <div class="columns col-5 feature-desc">
                                <h2>3 Professional interface</h2>
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                                    doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore
                                    veritatis.</p>
                            </div>
                        </li>
                        <!-- end: slide -->
                        <!-- start: slide -->
                        <li>
                            <div class="columns col-7 feature-image">
                                <img src="{{ asset('frontend') }}/images/apple-devices-3.png"
                                    alt="Professional interface" />
                            </div>
                            <div class="columns col-5 feature-desc">
                                <h2>4 Professional interface</h2>
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                                    doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore
                                    veritatis.</p>
                            </div>
                        </li>
                        <!-- end: slide -->
                    </ul>
                </div>


            </div>
        </div>


        <div class="row feature">
            <div class="max-inner">
                <div class="columns col-7 feature-image">
                    <img src="{{ asset('frontend') }}/images/ipad.png" alt="A lot of options" />
                </div>
                <div class="columns col-5 feature-desc">
                    <h2>A lot of options</h2>
                    <p>
                        At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis molestias <a
                            href="#">excepturi sint occaecati cupiditate non provident</a>, similique sunt in
                        culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum
                        quidem rerum facilis
                    </p>
                    <p>
                        Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus
                        id quod maxime placeat facere.
                    </p>
                    <p><a href="#" title="Learn more" class="btn">Learn more</a></p>
                </div>
            </div>
        </div>
        <div class="row feature alt-style">
            <div class="max-inner">

                <div class="columns col-4">
                    <div class="feature-desc">
                        <h2>Easy navigation</h2>
                        <p>
                            Perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                            laudantium, totam rem aperiam, eaque ipsa quae.
                        </p>
                    </div>
                    <figure class="rounded easy-nav">
                        <img src="{{ asset('frontend') }}/images/easy-nav.png" alt="Easy Navigation" />
                        <span class="indicator-line"></span>
                    </figure>
                </div>

                <div class="columns col-4">
                    <figure class="iphone-wrapper"><img src="{{ asset('frontend') }}/images/iphone.png"
                            alt="Easy Navigation" />
                    </figure>
                </div>

                <div class="columns col-4">
                    <figure class="rounded smart-charts">
                        <img src="{{ asset('frontend') }}/images/smart-charts.png" alt="Smart charts" />
                        <span class="indicator-line"></span>
                    </figure>
                    <div class="feature-desc">
                        <h2>Smart charts</h2>
                        <p>Doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore
                            veritatis.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <section class="reviews-block">
        <div class="row">
            <div class="max-inner">
                <div class="columns col-8 col-centered reviews-slider">

                    <div class="flexslider">
                        <ul class="slides">
                            <!-- start: slide -->
                            <li>
                                <div class="row review">
                                    <div class="columns col-2">
                                        <img src="{{ asset('frontend') }}/images/avatar.png" alt="Jason Howard"
                                            class="avatar" />
                                    </div>
                                    <div class="columns col-10">
                                        <blockquote>
                                            <p>
                                                Dignissimos ducimus qui blanditiis praesentium voluptatum
                                                deleniti atque corrupti quos dolores et quas molestias excepturi
                                                sint occaecati.
                                            </p>
                                            <cite>Jason Howard</cite>
                                        </blockquote>
                                    </div>
                                </div>
                            </li>
                            <!-- end: slide -->
                            <!-- start: slide -->
                            <li>
                                <div class="row review">
                                    <div class="columns col-2">
                                        <img src="{{ asset('frontend') }}/images/avatar.png" alt="Jason Howard"
                                            class="avatar" />
                                    </div>
                                    <div class="columns col-10">
                                        <blockquote>
                                            <p>
                                                2 Dignissimos ducimus qui blanditiis praesentium voluptatum
                                                deleniti atque corrupti quos dolores et quas molestias excepturi
                                                sint occaecati.
                                            </p>
                                            <cite>Bobby Dobby</cite>
                                        </blockquote>
                                    </div>
                                </div>
                            </li>
                            <!-- end: slide -->
                            <!-- start: slide -->
                            <li>
                                <div class="row review">
                                    <div class="columns col-2">
                                        <img src="{{ asset('frontend') }}/images/avatar.png" alt="Jason Howard"
                                            class="avatar" />
                                    </div>
                                    <div class="columns col-10">
                                        <blockquote>
                                            <p>
                                                3 Dignissimos ducimus qui blanditiis praesentium voluptatum
                                                deleniti atque corrupti quos dolores et quas molestias excepturi
                                                sint occaecati.
                                            </p>
                                            <cite>Jane Awesome</cite>
                                        </blockquote>
                                    </div>
                                </div>
                            </li>
                            <!-- end: slide -->
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>
@endsection