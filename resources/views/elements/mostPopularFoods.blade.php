@inject('topfoods', 'App\TopFoods')

<div class="slider related-product-slider mb-35">
    <div class="container q-card">
        <div class="row">
            <div class="col-lg-12">
                <div class="q-section-title">
                    <h3>{{$lang->get(145)}}</h3>  {{--Most popular products--}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="banner-slider-container">
                    @include('elements.topfoods', array('products' => $topfoods->mostPopular(), 'type' => 1))
                </div>
            </div>
        </div>
    </div>
</div>
