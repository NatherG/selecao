@php
$authors = [];
foreach($posts as $post){
    if(!in_array($post->author, $authors)) {
        array_push($authors, $post->author);
    }
}
@endphp
<!-- ======= Portfolio Section ======= -->
<section id="portfolio" class="portfolio">
    <div class="container">

        <div class="section-title" data-aos="zoom-out">
            <h2>@lang("theme::selecao.portfolio.title")</h2>
            <p>@lang("theme::selecao.portfolio.subtitle")</p>
        </div>

        <ul id="portfolio-flters" class="d-flex justify-content-end" data-aos="fade-up">
            <li data-filter="*" class="filter-active">All</li>
            @foreach($authors as $author)
                <li data-filter=".filter-{{ $author->name }}">{{ $author->name }}</li>
            @endforeach
        </ul>

        <div class="row portfolio-container" data-aos="fade-up">
            @foreach($posts as $post)
                <div class="col-lg-4 col-md-6 portfolio-item filter-{{ $post->author->name }}">
                    @if($post->hasImage())
                        <div class="portfolio-img"><img src="{{ $post->imageUrl() }}" class="img-fluid" alt="{{ $post->title }}"></div>
                        <div class="portfolio-info">
                            <h4>{{ $post->title }}</h4>
                            <p>{{ Str::limit(strip_tags($post->content), 75) }}</p>
                            <a href="{{ $post->imageUrl() }}" data-gall="portfolioGallery" class="venobox preview-link" title="{{ $post->title }}"><i class="bx bx-plus"></i></a>
                            <a href="{{ route('posts.show', $post->slug) }}" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                        </div>
                    @else
                        <div class="portfolio-img"><img src="{{ site_logo() }}" class="img-fluid" alt="{{ $post->title }}"></div>
                        <div class="portfolio-info">
                            <h4>{{ $post->title }}</h4>
                            <p>{{ Str::limit(strip_tags($post->content), 150) }}</p>
                            <a href="{{ site_logo() }}" data-gall="portfolioGallery" class="venobox preview-link" title="{{ $post->title }}"><i class="bx bx-plus"></i></a>
                            <a href="{{ route('posts.show', $post->slug) }}" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                        </div>
                    @endif
                </div>
            @endforeach

        </div>

    </div>
</section><!-- End Portfolio Section -->
