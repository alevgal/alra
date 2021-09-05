<ul class="social-links-menu list-unstyled d-flex flex-wrap">
  @hasoption('contact-linkedin')
    <li>
      <a href="{!! esc_url( get_field('contact-linkedin', 'option')) !!}" class="text-decoration-none" target="_blank" rel="noopener norefferer">
        <i class="icon-linkedin" aria-hidden="true"></i>
        <span class="sr-only">LinkedIn</span>
      </a>
    </li>
  @endoption
  @hasoption('contact-linkedin')
    <li>
      <a href="{!! esc_url( get_field('contact-facebook', 'option')) !!}" class="text-decoration-none" target="_blank" rel="noopener norefferer">
        <i class="icon-facebook" aria-hidden="true"></i>
        <span class="sr-only">Facebook</span>
      </a>
    </li>
  @endoption
  @hasoption('contact-twitter')
    <li>
      <a href="{!! esc_url( get_field('contact-twitter', 'option')) !!}" class="text-decoration-none" target="_blank" rel="noopener norefferer">
        <i class="icon-twitter" aria-hidden="true"></i>
        <span class="sr-only">Twitter</span>
      </a>
    </li>
  @endoption
  @hasoption('contact-twitter')
    <li>
      <a href="mailto:{!! get_field('contact-email', 'option') !!}" class="text-decoration-none">
        <i class="icon-envelope" aria-hidden="true"></i>
        <span class="sr-only">Email</span>
      </a>
    </li>
  @endoption
</ul>
