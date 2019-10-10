@if (session('status'))
    <section class="container">
        <div class="info-box-content">
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        </div>
    </section>
@endif