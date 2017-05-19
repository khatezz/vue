@extends('layout.master')
@section('content')
<div id="app">
	<header-view></header-view>
	<section id="main">
		<sidebar-view></sidebar-view>
		<transition name="fade">
			<router-view></router-view>
		</transition>
	</section>
</div>
@endsection