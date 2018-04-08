@extends('layouts.app')

@section ('content')

<div id="app">
<h1>{{ message }}</h1>
</div>

<script src="https://cdn.jsdelivr.net/npm/vue@2.5.13/dist/vue.js"></script>

<script>
new Vue({

	el: '#app',
	data:{

		message: 'Hello World'
	}
});

</script>

@endsection