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
                                <img src="images/apple-devices.png" alt="Professional interface" />
                            </div>
                            <div class="columns col-5 feature-desc">
                                <h2>Professional interface</h2>
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                    laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis.</p>
                            </div>
                        </li>
                        <!-- end: slide -->
                        <!-- start: slide -->
                        <li>
                            <div class="columns col-7 feature-image">
                                <img src="images/apple-devices-1.png" alt="Professional interface" />
                            </div>
                            <div class="columns col-5 feature-desc">
                                <h2>2 Professional interface</h2>
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                    laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis.</p>
                            </div>
                        </li>
                        <!-- end: slide -->
                        <!-- start: slide -->
                        <li>
                            <div class="columns col-7 feature-image">
                                <img src="images/apple-devices-2.png" alt="Professional interface" />
                            </div>
                            <div class="columns col-5 feature-desc">
                                <h2>3 Professional interface</h2>
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                    laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis.</p>
                            </div>
                        </li>
                        <!-- end: slide -->
                        <!-- start: slide -->
                        <li>
                            <div class="columns col-7 feature-image">
                                <img src="images/apple-devices-3.png" alt="Professional interface" />
                            </div>
                            <div class="columns col-5 feature-desc">
                                <h2>4 Professional interface</h2>
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                    laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis.</p>
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
                    <!-- {{ $post->created_at->diffForHumans() }} -->
                </div>
                <div class="columns col-5 feature-desc">
                    <h2>{{ $post->title }}</h2>
                    <p>{{ $post->content }}</p>
                    <p><a href="#" title="Learn more" class="btn">Learn more</a></p>
                </div>
            </div>
        </div>

    </section>
</div>
@endsection