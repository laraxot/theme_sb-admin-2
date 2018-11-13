{{--  
<script src="{{ asset("/theme/js/frontend.js") }}" type="text/javascript"></script>
--}}
<script>
lang = "{{ \App::getLocale() }}";
base_url="{{ url('/')  }}";
</script>

{{-- Theme::addScript('/theme/js/frontend.js') --}}


{{ Theme::add("/theme/bc/jquery/dist/jquery.min.js",1) }}
{{-- Theme::add("/theme/bc/tether/dist/js/tether.min.js") --}}
{{ Theme::add("/theme/bc/bootstrap/dist/js/bootstrap.min.js") }}
{{ Theme::add("/theme/bc/metisMenu/dist/metisMenu.min.js") }}


<!-- Custom Theme JavaScript -->
{{ Theme::add("/theme/bc/startbootstrap-sb-admin-2/dist/js/sb-admin-2.js")  }}

{{ Theme::add('/theme/js/xot.js') }}

{!! Theme::showScripts(false) !!}
@stack('scripts')