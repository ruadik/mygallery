{{--{{session('status')}}--}}

@if (session('status'))
    <section class="container">
        <div class="info-box-content">
            <div class="notification is-success">
                {{ session('status') }}
            </div>
        </div>
    </section>
@endif