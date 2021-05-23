@inject('currency', 'App\Currency')
@inject('topfoods', 'App\TopFoods')

{{--13.02.2021--}}
@foreach($products as $key => $data)
    @include('elements.oneItem', array('data' => $data, 'type' => $type))
@endforeach
