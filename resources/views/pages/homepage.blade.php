@extends('layouts.default')

@section('introduction_text')
    <p>{{ __('introduction_texts.homepage_line_1') }}</p>
    <p>{{ __('introduction_texts.homepage_line_2') }}</p>
    <p>{{ __('introduction_texts.homepage_line_3') }}</p>
@endsection

@section('content')
<!-- Nieuwe div voor styling op lijsten in homepagina (Ticket 1c) -->
<div class="list">
    <h1>
        @section('title')
            {{ __('misc.all_brands') }}
        @show
    </h1>


    <?php
    $size = count($brands);
    $columns = 3;
    $chunk_size = ceil($size / $columns);
    ?>

    <div class="container">
        
        <!-- Example row of columns -->
            <div class="row">

                @foreach($brands->chunk($chunk_size) as $chunk)
                    <div class="col-md-4">

                        <ul>
                            @foreach($chunk as $brand)

                                <?php
                                $current_first_letter = strtoupper(substr($brand->name, 0, 1));

                                if (!isset($header_first_letter) || (isset($header_first_letter) && $current_first_letter != $header_first_letter)) {
                                    echo '</ul>
                            <h2>' . $current_first_letter . '</h2>
                            <ul>';
                                }
                                $header_first_letter = $current_first_letter
                                ?>
                                    <li class="list-button-li">
                                        <!-- Links krijgen een nieuwe styling (Ticket 1c) -->
                                        <a href="/{{ $brand->id }}/{{ $brand->name_url_encoded }}/">{{ $brand->name }}</a>
                                    </li>
                                
                            @endforeach
                        </ul>

                    </div>
                    <?php
                    unset($header_first_letter);
                    ?>
                @endforeach

            </div>
        

    </div>
</div>
@endsection
