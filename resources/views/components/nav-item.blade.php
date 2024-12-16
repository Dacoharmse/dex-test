<li>
    <a href="{{ $href ?? '#' }}"
        class="block py-2 pr-4 pl-3 font-semibold uppercase text-base ease-in-out duration-500 {{ $active ? 'text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 ' : ' rounded  md:p-0 text-gray-400 md:hover:text-white hover:bg-gray-700 hover:text-white md:hover:bg-transparent border-gray-700' }}">
        {{ $slot }}
    </a>
</li>
