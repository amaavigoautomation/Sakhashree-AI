<?php 
foreach ($menuLinks as $key => $menuLink) { 
	$hasChildren = $menuLink->children->isNotEmpty();
	$routeKey = $menuLink->link;
	$url = ($routeKey != '#') ? route($routeKey) : '#';

	$menuTitle = $menuLink->title;
	// Remove special characters and split the words
	$words = Str::of($menuTitle)->split('/\s+/')
	    ->map(fn($word) => preg_replace('/[^A-Za-z]/', '', $word)) // Remove special characters
	    ->filter(); // Remove empty values after filtering special characters

	// Get initials
	$initials = $words->map(fn($word) => Str::substr($word, 0, 1))->join('');

	// Limit to first two characters
	$finalTitle = Str::substr($initials, 0, 2);
?>
<li class="nav-item {{ $hasChildren ? 'nav-item-has-children' : '' }}">
@if ($hasChildren)
<a href="{{ $url }}" class="collapsed" 
	data-bs-toggle="collapse" 
	data-bs-target="#ddmenu_{{ $menuLink->id }}" 
	aria-controls="ddmenu_{{ $menuLink->id }}" 
	aria-expanded="false" 
	aria-label="Toggle navigation">
	<div class="text"><i><?php echo $finalTitle;?></i>{{ $menuTitle }}</div>
</a>

<ul id="ddmenu_{{ $menuLink->id }}" class="collapse dropdown-nav">
	@foreach ($menuLink->children as $childLink)
		@php
			$routeKey1 = $childLink->link;
			$url1 = ($routeKey1 != '#') ? route($routeKey1) : '#';
		@endphp
		<li>
			<a href="{{ $url1 }}"><div class="text"><i class="fa fa-angle-right" aria-hidden="true"></i><?php echo $childLink->title;?></div></a>
		</li>
	@endforeach
</ul>
@else
<a href="{{ $url }}" aria-expanded="false" aria-label="Toggle navigation">
<div class="text"><i><?php echo $finalTitle;?></i>{{ $menuTitle }}</div>
</a>
@endif
</li>
<?php }  ?>
