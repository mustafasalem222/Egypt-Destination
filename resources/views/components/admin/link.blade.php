@props(['active' => false])

<a {{ $attributes->class([
  'flex items-center py-3 px-6 transition-all duration-300 border-r-4',
  'text-gray-300 border-transparent hover:bg-gray-700 hover:text-white hover:border-blue-500' => !$active,
  'bg-gray-700 text-white border-blue-500' => $active,
]) }}>
  {{ $slot }}
</a>