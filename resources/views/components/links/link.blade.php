@props(['active' => false])

<a {{ $attributes->class([
  'font-semibold transition-colors duration-300',
  'text-blue-900' => $active,
  'hover:text-blue-600 text-gray-700' => !$active,
]) }}>
  {{ $slot }}
</a>