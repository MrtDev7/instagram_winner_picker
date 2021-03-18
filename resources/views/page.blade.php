@extends('layout.app')


@section('content')

    <main data-spy="scroll" data-target="#navbar-example2" data-offset="0">
        <!-- Start Banner Section -->
        <section class="demo_1 banner_section" id="home">
            <div class="container p-4">

                @if (LaravelLocalization::getCurrentLocaleName() === 'English')
                <?php echo $page->description_en?>

                @else
                <?php echo $page->description_ar?>
                @endif

            </div>
        </section>
        <!-- End Banner -->




    </main>

@endsection
