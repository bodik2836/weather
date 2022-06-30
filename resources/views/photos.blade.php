@extends('layout.app')

@section('title', 'Photos')
@section('photos-active', 'current-menu-item')

@section('content')

    <main class="main-content">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html">Home</a>
                <span>Photos</span>
            </div>
        </div>

        <div class="fullwidth-block">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="photo">
                            <div class="photo-preview photo-detail" data-bg-image="storage/images/photo-1.jpg"></div>
                            <div class="photo-details">
                                <h3 class="photo-title"><a href="#">Neque porro quisquam</a></h3>
                                <p>Atatem accusantium aperiam eaque quae quasi architecto beatae vitae dicta sunt explicabo nemo enim.</p>
                                <div class="star-rating" title="Rated 1 out of 5"><span style="width:60%"><strong class="rating">1</strong> out of 5</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="photo">
                            <div class="photo-preview photo-detail" data-bg-image="storage/images/photo-2.jpg"></div>
                            <div class="photo-details">
                                <h3 class="photo-title"><a href="#">Neque porro quisquam</a></h3>
                                <p>Atatem accusantium aperiam eaque quae quasi architecto beatae vitae dicta sunt explicabo nemo enim.</p>
                                <div class="star-rating" title="Rated 1 out of 5"><span style="width:60%"><strong class="rating">1</strong> out of 5</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="photo">
                            <div class="photo-preview photo-detail" data-bg-image="storage/images/photo-3.jpg"></div>
                            <div class="photo-details">
                                <h3 class="photo-title"><a href="#">Neque porro quisquam</a></h3>
                                <p>Atatem accusantium aperiam eaque quae quasi architecto beatae vitae dicta sunt explicabo nemo enim.</p>
                                <div class="star-rating" title="Rated 1 out of 5"><span style="width:60%"><strong class="rating">1</strong> out of 5</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="photo">
                            <div class="photo-preview photo-detail" data-bg-image="storage/images/photo-4.jpg"></div>
                            <div class="photo-details">
                                <h3 class="photo-title"><a href="#">Neque porro quisquam</a></h3>
                                <p>Atatem accusantium aperiam eaque quae quasi architecto beatae vitae dicta sunt explicabo nemo enim.</p>
                                <div class="star-rating" title="Rated 1 out of 5"><span style="width:60%"><strong class="rating">1</strong> out of 5</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="photo">
                            <div class="photo-preview photo-detail" data-bg-image="storage/images/photo-5.jpg"></div>
                            <div class="photo-details">
                                <h3 class="photo-title"><a href="#">Neque porro quisquam</a></h3>
                                <p>Atatem accusantium aperiam eaque quae quasi architecto beatae vitae dicta sunt explicabo nemo enim.</p>
                                <div class="star-rating" title="Rated 1 out of 5"><span style="width:60%"><strong class="rating">1</strong> out of 5</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="photo">
                            <div class="photo-preview photo-detail" data-bg-image="storage/images/photo-4.jpg"></div>
                            <div class="photo-details">
                                <h3 class="photo-title"><a href="#">Neque porro quisquam</a></h3>
                                <p>Atatem accusantium aperiam eaque quae quasi architecto beatae vitae dicta sunt explicabo nemo enim.</p>
                                <div class="star-rating" title="Rated 1 out of 5"><span style="width:60%"><strong class="rating">1</strong> out of 5</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="photo">
                            <div class="photo-preview photo-detail" data-bg-image="storage/images/photo-4.jpg"></div>
                            <div class="photo-details">
                                <h3 class="photo-title"><a href="#">Neque porro quisquam</a></h3>
                                <p>Atatem accusantium aperiam eaque quae quasi architecto beatae vitae dicta sunt explicabo nemo enim.</p>
                                <div class="star-rating" title="Rated 1 out of 5"><span style="width:60%"><strong class="rating">1</strong> out of 5</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main> <!-- .main-content -->

@endsection
