@php
$containerFooter = !empty($containerNav) ? $containerNav : 'container-fluid';
@endphp

<!-- Footer-->
<footer class="content-footer footer bg-footer-theme">
  <div class="{{ $containerFooter }}">
    <div class="footer-container d-flex align-items-center justify-content-between py-4 flex-md-row flex-column">
      <div class="text-body w-100 text-center">
        © <script>document.write(new Date().getFullYear())</script>, made with ❤️ by Avishka
      </div>
    </div>
  </div>
</footer>
<!--/ Footer-->
