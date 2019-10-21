{{--{{session('status')}}--}}

@if (session('status'))
    <section class="container">
                <div class="box-header right-side  alert-info">
                    <h3 class="box-title">{{ session('status') }}</h3>
                </div>
    </section>
@endif