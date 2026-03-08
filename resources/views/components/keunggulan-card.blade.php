@props(['icon', 'title', 'description'])

<div class="card-hover bg-white rounded-2xl p-6 border border-gray-100 shadow-sm text-center">
    <div class="w-14 h-14 rounded-xl flex items-center justify-center mx-auto mb-4" style="background-color: #e8f0fb;">
        {!! $icon !!}
    </div>
    <h3 class="font-semibold text-gray-900 text-base mb-2">{{ $title }}</h3>
    <p class="text-gray-500 text-sm leading-relaxed">{{ $description }}</p>
</div>
