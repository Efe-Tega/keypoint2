<a
    {{ $attributes->merge([
        'href' => $attributes->get('href'),
        'class' =>
            'flex flex-row justify-center items-center gap-1 lg:gap-2 rounded w-full sm:w-full md:w-32 lg:w-48 py-2 bg-backgroundLight font-semibold shadow-md shadow-primaryDark/30',
    ]) }}>
    {{ $slot }}

</a>
