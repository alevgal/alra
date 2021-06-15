<button {{ $attributes->merge(['class' => implode(' ', $base_classes), 'type' => 'button', 'data-bs-toggle' => 'modal', 'data-bs-target' => '#job_application-' . get_the_ID()]) }}>
  {!! $slot !!}
</button>
