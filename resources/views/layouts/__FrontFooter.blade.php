<footer class="footer">
    <nav class="is-centered  tabs">
        <ul>
            @foreach($categories as $category)
                @if($category->isActive($category->id) == true)
                    <li class="is-active"><a href="{{route('front.category.photos', $category->id)}}">{{$category->title}}</a></li>
                @else
                    <li><a href="{{route('front.category.photos', $category->id)}}">{{$category->title}}</a></li>
                @endif
            @endforeach
        </ul>
    </nav>

    <div class="content has-text-centered">
        <br>
            <p>
                <strong>MyGallery</strong> by <a href="#">Ali.Ru.</a>
            </p>
            <p>
                <strong>Ali.Ru.</strong> - Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit expedita consequatur, et. Unde, nulla, dicta.
            </p>
            <p class="is-size-7">
            All rights reserved. 2019.
            </p>
    </div>
</footer>