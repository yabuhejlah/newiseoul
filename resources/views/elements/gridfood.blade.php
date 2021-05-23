@inject('currency', 'App\Currency')
@inject('lang', 'App\Lang')

{{--13.02.2021--}}
@isset ($data)
    @include('elements.oneItem', array('data' => $data, 'type' => 1))
@endisset

