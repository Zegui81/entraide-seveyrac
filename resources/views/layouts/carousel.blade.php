@if (count($carousel) > 0)
    <header>
    	<div id="carousel" class="carousel slide" data-ride="carousel">
    		<ol class="carousel-indicators">
    			@foreach ($carousel as $photo)
    				<li data-target="#carousel" data-slide-to="{{ $loop->index }}" 
    							{{ $loop->index == 0 ? 'class=active' : '' }} ></li>
    			@endforeach
    		</ol>
    		<div class="carousel-inner" role="listbox">
    			@foreach ($carousel as $photo)
        			<div class="carousel-item {{ $loop->index == 0 ? 'active' : '' }}" 
        				style="background-image: url('{{ asset('public/img/carousel').'/'.$photo['id'].'.'.$photo['ext'] }}')">
        				<div class="carousel-caption d-none d-md-block">
        					<h3>{{ $photo['titre'] }}</h3>
        					<p>{{ $photo['description'] }}</p>
        				</div>
        			</div>
    			@endforeach
    		</div>
    		<a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev"> 
    			<span class="carousel-control-prev-icon" aria-hidden="true"></span> 
    			<span class="sr-only">Previous</span>
    		</a> 
    		<a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
    			<span class="carousel-control-next-icon" aria-hidden="true"></span> 
    			<span class="sr-only">Next</span>
    		</a>
    	</div>
    </header>
@endif