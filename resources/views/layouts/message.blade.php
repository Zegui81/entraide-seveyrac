@if (session('message'))
    <div class="alert alert-{{ session('message')['type'] }} mt-2 text-center" role="alert">
    	<i class="fa fa-{{ session('message')['icon'] }} fa-2x" aria-hidden="true"></i>&nbsp;<sapn>{{ session('message')['content'] }}</sapn>
    </div>
@endif