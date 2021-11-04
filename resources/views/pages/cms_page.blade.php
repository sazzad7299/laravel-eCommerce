@extends('layouts.frontLayout.front_design')
@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Category</h2>
                    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                        <div class="panel panel-default">
                            <?php echo $categories_menu ?>
                        </div>
                    </div><!--/category-products-->
                </div>
            </div>
            <div class="col-md-9 padding-right">
                <div class="card">
                    <div class="card-title"><h1 align="center">{{ $cmsPageDetails->title }}</h1></div>
                    <div class="card-body">
                        {{ $cmsPageDetails->description }}
                    </div>
                </div>
                

            </div>
            
        </div>
    </div>
</section>
    
@endsection