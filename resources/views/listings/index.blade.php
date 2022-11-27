<x-layout>
  <!-- including partials -->
@include('partials._hero')
@include('partials._search')
<div
class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4"
>

@if (count($listings)==0)
     <p>No Listings Found </p>     
@endif

@foreach ($listings as $listing )
{{-- calling the listing component --}}
<x-listing-card :listing="$listing" />
@endforeach
</div>
<div class="mt-6 p-4">
  {{-- pagination  --}}
  {{$listings->links()}}
</div>
</x-layout>